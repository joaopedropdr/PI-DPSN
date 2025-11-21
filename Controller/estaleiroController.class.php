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
                } else {
                    // verifica se esse cnpj já está cadastrado
                    $Estaleiro = new Estaleiro(cnpj:$_POST["cnpj"]);
                    $EstaleiroDAO = new EstaleiroDAO();
                    $retorno = $EstaleiroDAO->verificarCnpj($Estaleiro);
                    if(is_array($retorno)) {
                        if(count($retorno) > 0) {
                            $msg[4] = "Esse cnpj já está cadastrado";
                            $erro = true;                           
                        }
                    }
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

        public function login() {
            $msg = array("", "", "");
            $erro = false;
            if($_POST) {
                if(empty($_POST["email_login"])) {
                    $msg[0] = "Digite seu e-mail!";
                    $erro = true;
                }

                if(empty($_POST["senha_login"])) {
                    $msg[1] = "Digite a sua senha!";
                    $erro = true;
                }
                if(!$erro) {
                    $Estaleiro = new Estaleiro(email:$_POST["email_login"]);
                    $EstaleiroDAO = new EstaleiroDAO();
                    $retorno = $EstaleiroDAO->login($Estaleiro);
                    if(is_array($retorno)) {
                        if(count($retorno) > 0) {
                            // Verifica se a senha corresponde
                            if(password_verify($_POST["senha_login"], $retorno[0]->senha)) {
                                if(!isset($_SESSION)) {
                                    session_start();
                                }
                                $_SESSION["id_estaleiro"] = $retorno[0]->id_estaleiro;
                                $_SESSION["nome"] = $retorno[0]->nome;
                                header("location:index.php?controle=inicioController&metodo=inicioEstaleiro");
                            } else {
                                $msg[2] = "Dados incorreto, verifique os dados digitados";
                            }
                        } else {
                            $msg[2] = "Dados incorreto, verifique os dados digitados";
                        } 
                    }
                }
            }
            require_once "Views/entrar.estaleiro.php";
        } // Fim do método login

        public function logout() {
            if(!isset($_SESSION)) session_start();
            $_SESSION = array();
			session_destroy();
			header("location:index.php");
        } // Fim do método logout

        public function update() {
            // Chamando o selectAll para exibir nos dados na tela
            if(!isset($_SESSION)) session_start();
            $Estaleiro = new Estaleiro(id_estaleiro:$_SESSION["id_estaleiro"]);
            $estaleiroDAO = new EstaleiroDAO();
            $retornoDados = $estaleiroDAO->selectALL($Estaleiro);
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
                }

                if(empty($_POST["cnpj"])) {
                    $msg[3] = "Digite o cnpj do estaleiro";
                    $erro = true;
                }

                if(empty($_POST["telefone"])) {
                    $msg[4] = "Digite o telefone";
                    $erro = true;
                }

                if(empty($_POST["cep"])) {
                    $msg[5] = "Digite o cep";
                    $erro = true;
                }

                if(empty($_POST["logradouro"])) {
                    $msg[6] = "Digite o logradouro";
                    $erro = true;
                }

                if(empty($_POST["numero"])) {
                    $msg[7] = "Digite o numero";
                    $erro = true;
                }

                if(empty($_POST["bairro"])) {
                    $msg[8] = "Digite o bairro";
                    $erro = true;
                }

                if(empty($_POST["cidade"])) {
                    $msg[9] = "Digite a cidade";
                    $erro = true;
                }

                if(empty($_POST["estado"]) && $_POST["estado"] == "Estado") {
                    $msg[10] = "Selecione o estado";
                    $erro = true;
                }
                if(!$erro) {
                    // Se o complemento for opcional, garanta que ele exista antes de passar                  
                    $Estaleiro = new Estaleiro(0, $_POST["nome_empresa"], $_POST["nome"], $_POST["cnpj"], $_POST["telefone"], $_POST["cep"], $_POST["logradouro"], 
                    $_POST["numero"], $_POST["complementos"], $_POST["bairro"], $_POST["cidade"], $_POST["estado"], $_POST["email"]);
                    $EstaleiroDAO = new EstaleiroDAO();
                    $retorno = $EstaleiroDAO->update($Estaleiro); 
                    header("location:index.php?controle=estaleiroController&metodo=selectAll");                   
                }
            }
            require_once "Views/form_update_estaleiro.php";
        } // Fim método update

        public function delete() {
            if(isset($_POST["id_estaleiro"])) {
                $Estaleiro = new Estaleiro(id_estaleiro:$_POST["id_estaleiro"]);
                $estaleiroDAO = new EstaleiroDAO();
                $retorno = $estaleiroDAO->delete($Estaleiro);               
                header("location:index.php?controle=administradorController&metodo=selectNome"); 
            }         
        } // Fim método delete

        public function selectAll() {
            if(!isset($_SESSION)) session_start();
            $Estaleiro = new Estaleiro(id_estaleiro:$_SESSION["id_estaleiro"]);
            $estaleiroDAO = new EstaleiroDAO();
            $retorno = $estaleiroDAO->selectALL($Estaleiro);
            require_once "Views/pag_dados_estaleiro.php";
        } // FIm método selectAll


    }
?>