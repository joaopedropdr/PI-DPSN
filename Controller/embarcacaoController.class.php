<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Embarcacao.class.php";
    require_once "Models/EmbarcacaoDAO.class.php";
    class embarcacaoController {
        public function insert() {
            $msg = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
            $erro = false;
            if($_POST) {
                if(empty($_POST["estaleiro"])) {
                    $msg[0] = "Selecione o estaleiro";
                    $erro = true;
                }

                if(empty($_POST["nome"])) {
                    $msg[1] = "Digite o nome da embarcação";
                    $erro = true;
                }
                if(empty($_POST["comp_total"])) {
                    $msg[2] = "Digite o comprimento total da embarcação";
                    $erro = true;
                }
                if(empty($_POST["boca_mold"])) {
                    $msg[3] = "Digite o valor da boca moldada";
                    $erro = true;
                }
                if(empty($_POST["pontal_mold"])) {
                    $msg[4] = "Digite o valor do pontal moldada";
                    $erro = true;
                }
                if(empty($_POST["calado_max"])) {
                    $msg[5] = "Digite o valor do calado maxímo";
                    $erro = true;
                }
                if(empty($_POST["calado_leve"])) {
                    $msg[6] = "Digite o valor do calado leve";
                    $erro = true;
                }
                if(empty($_POST["arq_bruta"])) {
                    $msg[7] = "Digite o valor da arqueação bruta";
                    $erro = true;
                }
                if(empty($_POST["arq_liquida"])) {
                    $msg[8] = "Digite o valor da arqueação liquida";
                    $erro = true;
                }
                if(empty($_POST["tpb"])) {
                    $msg[9] = "Digite o valor do tpb";
                    $erro = true;
                }
                if(empty($_POST["contorno"])) {
                    $msg[10] = "Digite o valor do contorno";
                    $erro = true;
                }
                if(empty($_POST["an_ts"])) {
                    $msg[11] = "Digite o tipo de serviço da embarcação";
                    $erro = true;
                }
                if(empty($_POST["tipo_emb"])) {
                    $msg[12] = "Digite o tipo da embarcação";
                    $erro = true;
                }
                if(empty($_POST["material_casco"])) {
                    $msg[13] = "Digite o material do casco";
                    $erro = true;
                }
                if(empty($_POST["mot_max"])) {
                    $msg[14] = "Digite o motorização maxima da embarcação";
                    $erro = true;
                }
                if(empty($_POST["tripulantes"])) {
                    $msg[15] = "Digite o numero de tripulantes";
                    $erro = true;
                }
                if(empty($_POST["passageiros"])) {
                    $msg[16] = "Digite o numero de passageiros";
                    $erro = true;
                }
                if(!$erro) {
                    $Embarcacao = new Embarcacao(0, 1, $_POST["nome"], $_POST["comp_total"], $_POST["boca_mold"], $_POST["pontal_mold"], $_POST["calado_max"], $_POST["calado_leve"], $_POST["arq_bruta"], $_POST["arq_liquida"], $_POST["tpb"], $_POST["contorno"], $_POST["lastro"], $_POST["an_ts"], $_POST["tipo_emb"], $_POST["material_casco"], $_POST["mot_max"], $_POST["mot_min"], $_POST["tripulantes"], $_POST["passageiros"], $_POST["inscricao"]);
                    $EmbarcacaoDAO = new EmbarcacaoDAO();
                    $retorno = $EmbarcacaoDAO->insert($Embarcacao);
                }
            } 
            require_once "Views/cadastrar_embarcacao.php";          
        } // Fim método insert
    }
?>