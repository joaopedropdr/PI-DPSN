<?php
    require_once "Models/Documento.class.php";
    require_once "Models/DocumentoDAO.class.php";
    require_once "Models/Cliente.class.php";
    require_once "Models/ClienteDAO.class.php";
    require_once "Models/Estaleiro.class.php";
    require_once "Models/EstaleiroDAO.class.php";
    require_once "Models/Embarcacao.class.php";
    require_once "Models/EmbarcacaoDAO.class.php";
    class documentoController {
        public function select() {
            // Pegando os dados do documento
            $id_cliente = (int)$_GET["id"];
            $documento = new Documento(cliente_id:$id_cliente);
            $docDAO = new DocumentoDAO();
            $retornoDoc = $docDAO->select($documento);
            // Pegando os dados do cliente
            $cliente = new Cliente(id_cliente:$id_cliente);
            $clienteDAO = new ClienteDAO();
            $retornoCli = $clienteDAO->getById($cliente);
            // Pegando os dados da embarcação
            $emb = new Embarcacao(id_embarcacao:$retornoDoc[0]->embarcacao_id);
            $embDAO = new EmbarcacaoDAO();
            $retornoEmb = $embDAO->getById($emb);
            // Pegando os dados do estaleiro
            $est = new Estaleiro(id_estaleiro:$retornoEmb[0]->estaleiro_id);
            $estDAO = new EstaleiroDAO();
            $retornoEst = $estDAO->getById($est);
            require_once "Views/form_documento.php";
        }
    }
?>