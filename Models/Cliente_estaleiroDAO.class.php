<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Cliente.class.php";
    require_once "Models/Estaleiro.class.php";
    require_once "Models/EstaleiroDAO.class.php";
    require_once "Models/ClienteDAO.class.php";
    class ClienteEstaleiroDAO extends Conexao {
        public function __construct() {
            // pegando o constructor da classe Conexao
            parent:: __construct();
        }

        public function insertCE(Cliente_estaleiro $CE) {
            $sql = "INSERT INTO clientes_estaleiros (estaleiro_id, cliente_id) VALUE(?, ?)";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $CE->getEstaleiroId());
                $stm->bindValue(2, $CE->getClienteId());
                $stm->execute();
                $this->db = null;
                return "Relação feita com sucesso!";              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro";
            }
        } // Fim método insert

    }
?>