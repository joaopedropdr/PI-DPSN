<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Cliente.class.php";
    require_once "Models/ClienteDAO.class.php";
    require_once "Models/Documento.class.php";
    require_once "Models/DocumentoDAO.class.php";
    require_once "Models/Embarcacao.class.php";
    require_once "Models/EmbarcacaoDAO.class.php";
    require_once "Models/Cliente_estaleiro.class.php";
    require_once "Models/Cliente_estaleiroDAO.class.php";
    class clienteController {
        public function insert() {  
            if(!isset($_SESSION)) session_start();
            if(isset($_SESSION["id_estaleiro"])) {
                $Embarcacao = new Embarcacao(estaleiro_id:$_SESSION["id_estaleiro"]);
                $EmbarcacaoDAO = new EmbarcacaoDAO();
                $retornoEmb = $EmbarcacaoDAO->select($Embarcacao);  
            }
            $msg = array("", "", "", "", "", "", "", "", "", "", "");
            $erro = false;
            if($_POST) {
                if(empty($_POST["embarcacao"])) {
                    $msg[0] = "Selecione a embarcação do cliente";
                    $erro = true;
                }
                if(empty($_POST["ano_construcao_emb"])) {
                    $msg[1] = "Digite o ano de construção da embarcação";
                    $erro = true;
                }
                if(empty($_POST["chassi_emb"])) {
                    $msg[2] = "Digite o chassi da embarcação";
                    $erro = true;
                }
                if(empty($_POST["nome"])) {
                    $msg[3] = "Digite o nome do cliente";
                    $erro = true;
                }

                if(empty($_POST["cpf_cnpj"])) {
                    $msg[4] = "Digite o CPF ou CNPJ do cliente";
                    $erro = true;
                }
                if(empty($_POST["cep"])) {
                    $msg[5] = "Digite o CEP do cliente";
                    $erro = true;
                }
                if(empty($_POST["logradouro"])) {
                    $msg[6] = "Digite o logradouro do cliente";
                    $erro = true;
                }
                if(empty($_POST["numero"])) {
                    $msg[7] = "Digite o numero";
                    $erro = true;
                }
                if(empty($_POST["bairro"])) {
                    $msg[8] = "Digite o bairro do cliente";
                    $erro = true;
                }
                if(empty($_POST["cidade"])) {
                    $msg[9] = "Digite a cidade do cliente";
                    $erro = true;
                }
                if(empty($_POST["estado"])) {
                    $msg[10] = "Selecione o estado do cliente";
                    $erro = true;
                }
                if(!$erro) {                     
                    $Cliente = new Cliente(0, $_POST["embarcacao"], $_POST["nome"], $_POST["cpf_cnpj"], $_POST["ano_construcao_emb"], 
                    $_POST["chassi_emb"], $_POST["cep"], $_POST["logradouro"], $_POST["numero"], $_POST["bairro"], $_POST["complementos"],
                    $_POST["cidade"], $_POST["estado"]);
                    $ClienteDAO = new ClienteDAO();
                    $retorno = $ClienteDAO->insert($Cliente);
                    if($retorno !== "Erro") {
                        // Fazendo a relação N:N no banco
                        $CE = new Cliente_estaleiro(0, $_SESSION["id_estaleiro"], $retorno);
                        $CEDAO = new ClienteEstaleiroDAO();
                        $retornoCE = $CEDAO->insertCE($CE);
                        // inserindo os dados no documento
                        $documento = new Documento(0, $_POST["embarcacao"], $retorno);
                        $documentoDAO = new DocumentoDAO();
                        $retornoDoc = $documentoDAO->insert($documento);
                        header("location:index.php?controle=documentoController&metodo=select&id=$retorno");           
                    }                    
                }
            }         
            require_once "Views/form_dados_cliente.php";
        } // Fim método insert

        public function update() {
            if(!isset($_SESSION)) session_start();
            if(isset($_SESSION["id_estaleiro"])) {
                $Embarcacao = new Embarcacao(estaleiro_id:$_SESSION["id_estaleiro"]);
                $EmbarcacaoDAO = new EmbarcacaoDAO();
                $retornoEmb = $EmbarcacaoDAO->select($Embarcacao);  
            }
            $id_cli = (int)$_GET["id"];
            $Cliente = new Cliente(id_cliente:$id_cli);
            $CliDAO = new ClienteDAO();
            $retorno = $CliDAO->getById($Cliente);
            $msg = array("", "", "", "", "", "", "", "", "", "", "");
            $erro = false;
            if($_POST) {
                if(empty($_POST["embarcacao"])) {
                    $msg[0] = "Selecione a embarcação do cliente";
                    $erro = true;
                }
                if(empty($_POST["ano_construcao_emb"])) {
                    $msg[1] = "Digite o ano de construção da embarcação";
                    $erro = true;
                }
                if(empty($_POST["chassi_emb"])) {
                    $msg[2] = "Digite o chassi da embarcação";
                    $erro = true;
                }
                if(empty($_POST["nome"])) {
                    $msg[3] = "Digite o nome do cliente";
                    $erro = true;
                }

                if(empty($_POST["cpf_cnpj"])) {
                    $msg[4] = "Digite o CPF ou CNPJ do cliente";
                    $erro = true;
                }
                if(empty($_POST["cep"])) {
                    $msg[5] = "Digite o CEP do cliente";
                    $erro = true;
                }
                if(empty($_POST["logradouro"])) {
                    $msg[6] = "Digite o logradouro do cliente";
                    $erro = true;
                }
                if(empty($_POST["numero"])) {
                    $msg[7] = "Digite o numero";
                    $erro = true;
                }
                if(empty($_POST["bairro"])) {
                    $msg[8] = "Digite o bairro do cliente";
                    $erro = true;
                }
                if(empty($_POST["cidade"])) {
                    $msg[9] = "Digite a cidade do cliente";
                    $erro = true;
                }
                if(empty($_POST["estado"])) {
                    $msg[10] = "Selecione o estado do cliente";
                    $erro = true;
                }
                if(!$erro) {
                    $cliente = new Cliente(0, $_POST["embarcacao"], $_POST["nome"], $_POST["cpf_cnpj"], $_POST["ano_construcao_emb"], 
                    $_POST["chassi_emb"], $_POST["cep"], $_POST["logradouro"], $_POST["numero"], $_POST["bairro"], $_POST["complementos"],
                    $_POST["cidade"], $_POST["estado"]);
                    $CliDAO = new ClienteDAO();
                    $retornoCli = $CliDAO->update($cliente);                
                }
            }

            require_once "Views/form_update_cliente.php";          
        } // Fim método select 
    }
?>