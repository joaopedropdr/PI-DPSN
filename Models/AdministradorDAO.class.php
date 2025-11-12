<?php 
    require_once "Conexao.class.php";
    require_once "Administrador.class.php";
    class AdministradorDAO extends Conexao {
        public function __construct() {
            // pegando o constructor da classe Conexao
            parent:: __construct();
        }

        public function inserir(Administrador $Administrador) {
            $sql = "INSERT INTO administradores (email, senha) VALUES(?, ?)";

            try {
                // Preparando a frase SQL 
                $stm = $this->db->prepare($sql);
                // Substituindo os ? pelos valores
                $stm->bindValue(1, $Administrador->getEmail());
                $stm->bindValue(2, $Administrador->getSenha());
                $stm->execute();
                $this->db = null;
                return "Adm cadastrado com sucesso!";
            } catch(PDOException $e) {
                $this->db = null;
                return "Problema para inserir os dados no banco";
            
            }
        } // Fim método inserir

        public function verificarEmail(Administrador $Administrador) {
            // Preparando a frase sql
            $sql = "SELECT email, nome, id_administrador FROM administradores WHERE email = ?";
            try {
                $stm = $this->db->prepare($sql);
                // Substituindo o ? pelo email que vai ser buscado
                $stm->bindValue(1, $Administrador->getEmail());
                $stm->execute();
                $this->db = null;
                // Retornando o array com as informações buscadas
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
				$this->db = null; 
				return "Problema ao validar o e-mail";
            }
        } // Fim método verificarEmail

        public function login(Administrador $Administrador) {
            $sql = "SELECT * FROM administradores  WHERE email = ?";
            try{
                $stm=$this->db->prepare($sql);
                $stm->bindValue(1, $Administrador->getEmail());
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException $e) {
                $this->db = null;
                return "Problema ao realizar o login";
            }
        } // Fim método login
    }
?>