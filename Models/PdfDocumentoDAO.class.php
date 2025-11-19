<?php
// Models/PdfDocumentoDAO.class.php
require_once __DIR__ . '/../config/Database.php';

class PdfDocumentoDAO {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function criar($documento_id, $pdfBinary, $assinado = null) {
        $sql = "INSERT INTO pdf_documentos (documento_id, pdf, assinado) VALUES (:docid, :pdf, :assinado)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':docid', $documento_id, PDO::PARAM_INT);
        $stmt->bindValue(':pdf', $pdfBinary, PDO::PARAM_LOB);
        $stmt->bindValue(':assinado', $assinado === null ? null : (int)$assinado, PDO::PARAM_INT);
        $stmt->execute();
        return $this->pdo->lastInsertId();
    }

    public function buscarPorDocumentoId($documento_id) {
        $sql = "SELECT * FROM pdf_documentos WHERE documento_id = :docid ORDER BY criado_em DESC LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':docid' => $documento_id]);
        return $stmt->fetch();
    }
}
