<?php
    require_once "Conexao.class.php";
    require_once "Estaleiro.class.php";
    class EstaleiroDAO extends Conexao {
        public function __construct() {
            // pegando o constructor da classe Conexao
            parent:: __construct();
        }

        public function inserir(Estaleiro $Estaleiro) {
            $sql = "INSERT INTO estaleiros (nome_empresa, nome, cnpj, telefone, cep, logradouro, numero, complementos, bairro, cidade, estado, email, senha) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            try {
                // Preparando a frase SQL 
                $stm = $this->db->prepare($sql);
                // Substituindo os ? pelos valores
                $stm->bindValue(1, $Estaleiro->getNome_empresa());
                $stm->bindValue(2, $Estaleiro->getNome());
                $stm->bindValue(3, $Estaleiro->getCnpj());
                $stm->bindValue(4, $Estaleiro->getTelefone());
                $stm->bindValue(5, $Estaleiro->getCep());
                $stm->bindValue(6, $Estaleiro->getLogradouro());
                $stm->bindValue(7, $Estaleiro->getNumero());
                $stm->bindValue(8, $Estaleiro->getComplemento());
                $stm->bindValue(9, $Estaleiro->getBairro());
                $stm->bindValue(10, $Estaleiro->getCidade());
                $stm->bindValue(11, $Estaleiro->getEstado());
                $stm->bindValue(12, $Estaleiro->getEmail());
                $stm->bindValue(13, $Estaleiro->getSenha());
                $stm->execute();
                $this->db = null;
                return "Estaleiro cadastrado com sucesso!";
            } catch(PDOException $e) {
                $this->db = null;
                return "Problema para inserir os dados no banco";
            
            }
        } // Fim método inserir

        public function verificarEmail(Estaleiro $Estaleiro) {
            // Preparando a frase sql
            $sql = "SELECT email, nome, id_estaleiro FROM estaleiros WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                // Substituindo o ? pelo email que vai ser buscado
                $stm->bindValue(1, $Estaleiro->getEmail());
                $stm->execute();
                $this->db = null;
                // Retornando o array com as informações buscadas
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
				$this->db = null; 
				return "Problema ao validar o e-mail";
            }
        } // Fim método verificarEmail

        public function login(Estaleiro $Estaleiro) {
            $sql = "SELECT * FROM estaleiros WHERE email = ?";
            try{
                $stm=$this->db->prepare($sql);
                $stm->bindValue(1, $Estaleiro->getEmail());
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
                $this->db = null;
                return "Problema ao realizar o login";
            }
        } // Fim método login

        public function update(Estaleiro $Estaleiro) {
            $sql = "UPDATE estaleiros SET nome_empresa = ?, nome= ?, cnpj = ?, telefone = ?, cep = ?, logradouro = ?, numero = ?,
            complementos = ?, bairro = ?, cidade = ?, estado = ?, email = ?  WHERE email = ?";
            try{
                $stm=$this->db->prepare($sql);
                $stm->bindValue(1, $Estaleiro->getNome_empresa());
                $stm->bindValue(2, $Estaleiro->getNome());
                $stm->bindValue(3, $Estaleiro->getCnpj());
                $stm->bindValue(4, $Estaleiro->getTelefone());
                $stm->bindValue(5, $Estaleiro->getCep());
                $stm->bindValue(6, $Estaleiro->getLogradouro());
                $stm->bindValue(7, $Estaleiro->getNumero());
                $stm->bindValue(8, $Estaleiro->getComplemento());
                $stm->bindValue(9, $Estaleiro->getBairro());
                $stm->bindValue(10, $Estaleiro->getCidade());
                $stm->bindValue(11, $Estaleiro->getEstado());
                $stm->bindValue(12, $Estaleiro->getEmail());
                $stm->bindValue(13, $Estaleiro->getEmail());
                $stm->execute();
                $this->db = null;
                return true;
            } catch(PDOException $e) {
                $this->db = null;
                return "Problema ao realizar o update";
            }
        } // Fim método update

    } 
?>