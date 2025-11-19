<?php
// Models/DocumentoDAO.class.php
require_once __DIR__ . '/../config/Database.php';

class DocumentoDAO {
    private $pdo;
    public function __construct() {
        $this->pdo = Database::connect();
    }

    public function criar($embarcacao_id, $cliente_id) {
        $sql = "INSERT INTO documentos (embarcacao_id, cliente_id) VALUES (:emb, :cli)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':emb' => $embarcacao_id, ':cli' => $cliente_id]);
        return $this->pdo->lastInsertId();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM documentos WHERE id_documento = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
}
