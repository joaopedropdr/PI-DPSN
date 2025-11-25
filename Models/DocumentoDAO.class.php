<?php
    // Models/DocumentoDAO.class.php
    require_once "Models/Conexao.class.php";
    require_once "Models/Embarcacao.class.php";
    require_once "Models/Estaleiro.class.php";
    require_once __DIR__ . '/../config/Database.php';

    class DocumentoDAO extends Conexao {
        private $pdo;
        public function __construct() {
            parent:: __construct();
            $this->pdo = Database::connect();
        }

        public function insert(Documento $documento) {
            $sql = "INSERT INTO documentos (embarcacao_id, cliente_id) VALUE(?, ?)";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $documento->getEmbarcacaoId());
                $stm->bindValue(2, $documento->getClienteId());
                $stm->execute();
                $this->db = null;
                return "Documento cadastrado com sucesso!";              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro";
            }
        } // Fim método insert

        public function select(Documento $documento) {
            $sql = "SELECT * FROM documentos WHERE cliente_id = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $documento->getClienteId());
                $stm->execute();
                $this->db = null;
                $documento = $stm->fetchAll(PDO::FETCH_OBJ);
                return $documento;              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro no select do documento";
            }
        } // Fim método insert

        public function selectEmb(Documento $documento) {
            $sql = "SELECT * FROM documentos WHERE embarcacao_id = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $documento->getEmbarcacaoId());
                $stm->execute();
                $this->db = null;
                $documento = $stm->fetchAll(PDO::FETCH_OBJ);
                return $documento;              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro no select do documento";
            }
        } // Fim método insert


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
?>
