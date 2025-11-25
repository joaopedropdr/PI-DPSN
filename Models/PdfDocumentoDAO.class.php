<?php
require_once __DIR__ . "/Conexao.class.php";
require_once __DIR__ . "/Documento.class.php";
require_once __DIR__ . "/DocumentoDAO.class.php";

class PdfDocumentoDAO extends Conexao {
    public function __construct() {
        parent:: __construct();
    }

    public function insert(PdfDocumento $pdf) {
        $sql = "INSERT INTO pdf_documentos (documento_id, pdf, assinado) VALUES(?, ?, ?)";
        try {
            // Preparando a frase SQL 
            $stm = $this->db->prepare($sql);
            // Substituindo os ? pelos valores
            $stm->bindValue(1, $pdf->getDocumentoId());
            $stm->bindValue(2, $pdf->getPdf());
            $stm->bindValue(3, $pdf->getAssinado());
            $stm->execute();
            $this->db = null;
            return "Pdf inserido com sucesso!";
        } catch(PDOException $e) {
            $this->db = null;
            return "Problema para inserir os dados no banco";
            
        }
    }
    // Método para pegar os pdfs que não estão assinados
    public function select(PdfDocumento $pdf) {
        $sql = "SELECT * FROM pdf_documentos WHERE documento_id = ? AND assinado = 0";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pdf->getDocumentoId());
            $stm->execute();

            $pdf = $stm->fetchAll(PDO::FETCH_OBJ);
            return $pdf;              
        } catch(PDOException $e) {
            $this->db = null;
            return "Erro";
        }
    }

    // Método para pegar os pdfs que  estão assinados
    public function selectAss(PdfDocumento $pdf) {
        $sql = "SELECT * FROM pdf_documentos WHERE documento_id = ? AND assinado = 1";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pdf->getDocumentoId());
            $stm->execute();

            $pdf = $stm->fetchAll(PDO::FETCH_OBJ);
            return $pdf;              
        } catch(PDOException $e) {
            $this->db = null;
            return "Erro";
        }
    }
    public function update(PdfDocumento $pdf) {
        $sql = "UPDATE pdf_documentos SET pdf= ?, assinado = ? WHERE id_pdf_documento = ?";
        try{
            $stm=$this->db->prepare($sql);
            $stm->bindValue(1, $pdf->getPdf(), PDO::PARAM_LOB);
            $stm->bindValue(2, $pdf->getAssinado());
            $stm->bindValue(3, $pdf->getIdPdfDocumentos());
            $stm->execute();
            $this->db = null;
            return true;
        } catch(PDOException $e) {
            $this->db = null;
            return "Erro no update do pdf";
        }
    }// Fim método update

    public function getById(PdfDocumento $pdf) {
        $sql = "SELECT * FROM pdf_documentos WHERE id_pdf_documento = ?";
        try {
            $stm = $this->db->prepare($sql);
            $stm->bindValue(1, $pdf->getIdPdfDocumentos());
            $stm->execute();
            $this->db = null;
            $pdf = $stm->fetchAll(PDO::FETCH_OBJ);
            return $pdf;              
        } catch(PDOException $e) {
            $this->db = null;
            return "Erro";
        }
    }// Fim método getById

}
?>
