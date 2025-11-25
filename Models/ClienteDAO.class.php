<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Cliente.class.php";
    class ClienteDAO extends Conexao {
        public function __construct() {
            // pegando o constructor da classe Conexao
            parent:: __construct();
        }

        public function insert(Cliente $Cliente) {
            $sql = "INSERT INTO clientes (embarcacao_id, nome, cpf_cnpj, ano_construcao_emb, chassi_emb, cep, logradouro, numero, bairro, complementos, cidade, estado) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $Cliente->getEmbarcacaoId());
                $stm->bindValue(2, $Cliente->getNome());
                $stm->bindValue(3, $Cliente->getCpfCnpj());
                $stm->bindValue(4, $Cliente->getAnoConstrucaoEmb());
                $stm->bindValue(5, $Cliente->getChassiEmb());
                $stm->bindValue(6, $Cliente->getCep());
                $stm->bindValue(7, $Cliente->getLogradouro());
                $stm->bindValue(8, $Cliente->getNumero());
                $stm->bindValue(9, $Cliente->getBairro());
                $stm->bindValue(10, $Cliente->getComplementos());
                $stm->bindValue(11, $Cliente->getCidade());
                $stm->bindValue(12, $Cliente->getEstado());
                $stm->execute();
                $last_id = $this->db->lastInsertId();
                $this->db = null;
                return (int)$last_id;              
            } catch(PDOException $e) {
                $this->db = null;
                return $e->getMessage();
            }
        } // Fim método insert

        public function getById(Cliente $cliente) {
            $sql = "SELECT * FROM clientes WHERE id_cliente = ?";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $cliente->getIdCliente());
                $stm->execute();
                $this->db = null;
                $cliente = $stm->fetchAll(PDO::FETCH_OBJ);
                return $cliente;              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro";
            }
        }// Fim método getById

        public function update(Cliente $cliente) {
            $sql = "UPDATE clientes SET embarcacao_id = ?, nome= ?, cpf_cnpj = ?, ano_construcao_emb = ?, chassi_emb = ?, cep = ?, logradouro = ?,
            numero = ?, bairro = ?, complementos = ?, cidade = ?, estado = ? WHERE cpf_cnpj = ?";
            try{
                $stm=$this->db->prepare($sql);
                $stm->bindValue(1, $cliente->getEmbarcacaoId());
                $stm->bindValue(2, $cliente->getNome());
                $stm->bindValue(3, $cliente->getCpfCnpj());
                $stm->bindValue(4, $cliente->getAnoConstrucaoEmb());
                $stm->bindValue(5, $cliente->getChassiEmb());
                $stm->bindValue(6, $cliente->getCep());
                $stm->bindValue(7, $cliente->getLogradouro());
                $stm->bindValue(8, $cliente->getNumero());
                $stm->bindValue(9, $cliente->getBairro());
                $stm->bindValue(10, $cliente->getComplementos());
                $stm->bindValue(11, $cliente->getCidade());
                $stm->bindValue(12, $cliente->getEstado());
                $stm->bindValue(13, $cliente->getCpfCnpj());
                $stm->execute();
                $this->db = null;
                return true;
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro no update do cliente";
            }
        }// Fim método update

    }
?>