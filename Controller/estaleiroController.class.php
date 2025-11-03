<?php
    require_once "Models/Conexao.class.php";
    require_once "Models/Estaleiro.class.php";
    require_once "Models/EstaleiroDAO.class.php";
    class estaleiroController {
        // Método para inserir os dados no banco
        public function inserir() {
            $msg = array("", "", "", "", "", "", "", "", "", "", "", "", "");
            $erro = false;
            if($_POST) {
                // Verifica se o que foi recebido via post está vazio 
                if(empty($_POST["nome"])) {
                    $msg[0] = "Digite o nome";
                    $erro = true;
                }

                if(empty($_POST["nome_empresa"])) {
                    $msg[1] = "Digite o nome da empresa";
                    $erro = true;
                }

                if(empty($_POST["email"])) {
                    $msg[2] = "Digite o email";
                    $erro = true;
                } else {
                    // verifica se esse email já está cadastrado
                    $Estaleiro = new Estaleiro(email:$_POST["email"]);
                    $EstaleiroDAO = new EstaleiroDAO();
                    $retorno = $EstaleiroDAO->verificarEmail($Estaleiro);
                    if(is_array($retorno)) {
                        if(count($retorno) > 0) {
                            $msg[2] = "Esse e-mail já está cadastrado";
                            $erro = true;                           
                        }
                    }
                }

                if(empty($_POST["senha"])) {
                    $msg[3] = "Digite a senha";
                    $erro = true;
                }

                if(empty($_POST["cnpj"])) {
                    $msg[4] = "Digite o cnpj do estaleiro";
                    $erro = true;
                }

                if(empty($_POST["telefone"])) {
                    $msg[5] = "Digite o telefone";
                    $erro = true;
                }

                if(empty($_POST["cep"])) {
                    $msg[6] = "Digite o cep";
                    $erro = true;
                }

                if(empty($_POST["logradouro"])) {
                    $msg[7] = "Digite o logradouro";
                    $erro = true;
                }

                if(empty($_POST["numero"])) {
                    $msg[8] = "Digite o numero";
                    $erro = true;
                }

                if(empty($_POST["bairro"])) {
                    $msg[9] = "Digite o bairro";
                    $erro = true;
                }

                if(empty($_POST["cidade"])) {
                    $msg[10] = "Digite a cidade";
                    $erro = true;
                }

                if(empty($_POST["estado"])) {
                    $msg[11] = "Digite o estado";
                    $erro = true;
                }
                // Insere os dados no banco se $erro não for igual a true
                if(!$erro) {
                    // Se o complemento for opcional, garanta que ele exista antes de passar
                    $complemento = $_POST["complemento"] ?? '';
                    
                    $Estaleiro = new Estaleiro(0, $_POST["nome_empresa"], $_POST["nome"], $_POST["cnpj"], $_POST["telefone"], $_POST["cep"], $_POST["logradouro"], 
                    $_POST["numero"], $complemento, $_POST["bairro"], $_POST["cidade"], $_POST["estado"], $_POST["email"], password_hash($_POST["senha"], PASSWORD_DEFAULT));
                    $EstaleiroDAO = new EstaleiroDAO();
                    $retorno = $EstaleiroDAO->inserir($Estaleiro);
                }
            } // Fim if($post)
            require_once "Views/cadastrar_estaleiro.php";
        } // Fim do método inserir
    }
?>