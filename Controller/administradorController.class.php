<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Administrador.class.php";
    require_once "Models/AdministradorDAO.class.php";
    class administradorController {
        public function inserir() {
            $msg = array("", "");
            $erro = false;
            if($_POST) {
                if(empty($_POST["email"])) {
                    $msg[0] = "Digite o email";
                    $erro = true;
                } else {
                    // verifica se esse email já está cadastrado
                    $Administrador = new Administrador(email:$_POST["email"]);
                    $AdministradorDAO = new AdministradorDAO();
                    $retorno = $AdministradorDAO->verificarEmail($Administrador);
                    if(is_array($retorno)) {
                        if(count($retorno) > 0) {
                            $msg[0] = "Esse e-mail já está cadastrado";
                            $erro = true;                           
                        }
                    }
                }

                if(empty($_POST["senha"])) {
                    $msg[1] = "Digite a senha";
                    $erro = true;
                }
                // Insere os dados no banco se $erro não for igual a true
                if(!$erro) {                   
                    $Administrador = new Administrador(0, $_POST["email"], password_hash($_POST["senha"], PASSWORD_DEFAULT));
                    $AdministradorDAO = new AdministradorDAO();
                    $retorno = $AdministradorDAO->inserir($Administrador);
                }
            } 
            require_once "Views/insert_adm.php";
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
                    $Administrador = new Administrador(email:$_POST["email_login"]);
                    $AdministradorDAO = new AdministradorDAO();
                    $retorno = $AdministradorDAO->login($Administrador);
                    if(is_array($retorno)) {
                        if(count($retorno) > 0) {
                            // Verifica se a senha corresponde
                            if(password_verify($_POST["senha_login"], $retorno[0]->senha)) {
                                if(!isset($_SESSION)) {
                                    session_start();
                                }
                                $_SESSION["id_administrador"] = $retorno[0]->id_administrador;
                                $_SESSION["email"] = $retorno[0]->email;
                                header("location:index.php?controle=inicioController&metodo=inicioAdm");
                            } else {
                                $msg[2] = "Dados incorreto, verifique os dados digitados";
                            }
                        } else {
                            $msg[2] = "Dados incorreto, verifique os dados digitados";
                        } 
                    }
                }
            }
            require_once "Views/entrar.admin.php";
        } // Fim do método login    

        public function logout() {
            if(!isset($_SESSION)) session_start();
            $_SESSION = array();
			session_destroy();
			header("location:index.php");
        } // Fim do método logout

        public function todosEstaleiros() {
            require_once "Views/pagina_estaleiro_adm.php";
        } 
    }
?>