<?php 
    require_once "Models/Conexao.class.php";
    require_once "Models/Embarcacao.class.php";
    class EmbarcacaoDAO extends Conexao {
        public function __construct() {
            // pegando o constructor da classe Conexao
            parent:: __construct();
        }
        public function insert(Embarcacao $embarcacao) {
            $sql = "INSERT INTO embarcacoes (estaleiro_id, nome, comprimento_total, boca_moldada, pontal_moldado, calado_maximo, calado_leve, arqueacao_bruta, arqueacao_liquida, tpb, contorno, lastro, area_navegacao_tipo_servico, tipo_embarcacao, material_casco, motorizacao_max, motorizacao_min,	num_tripulantes, num_passageiros, num_inscricao) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)";
            try {
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $embarcacao->getEstaleiro_id());
                $stm->bindValue(2, $embarcacao->getNome());
                $stm->bindValue(3, $embarcacao->getComprimento_total());
                $stm->bindValue(4, $embarcacao->getBoca_moldada());
                $stm->bindValue(5, $embarcacao->getPontal_moldado());
                $stm->bindValue(6, $embarcacao->getCalado_maximo());
                $stm->bindValue(7, $embarcacao->getCalado_leve());
                $stm->bindValue(8, $embarcacao->getArqueacao_bruta());
                $stm->bindValue(9, $embarcacao->getArqueacao_liquida());
                $stm->bindValue(10, $embarcacao->getTpb());
                $stm->bindValue(11, $embarcacao->getContorno());
                $stm->bindValue(12, $embarcacao->getLastro());
                $stm->bindValue(13, $embarcacao->getArea_navegacao_tipo_servico());
                $stm->bindValue(14, $embarcacao->getTipo_embarcacao());
                $stm->bindValue(15, $embarcacao->getMaterial_casco());
                $stm->bindValue(16, $embarcacao->getMotorizacao_max());
                $stm->bindValue(17, $embarcacao->getMotorizacao_min());
                $stm->bindValue(18, $embarcacao->getNum_tripulantes());
                $stm->bindValue(19, $embarcacao->getNum_passageiros());
                $stm->bindValue(20, $embarcacao->getNum_inscricao());
                $stm->execute();
                $this->db = null;
                return "Embarcação cadastrado com sucesso!";              
            } catch(PDOException $e) {
                $this->db = null;
                return "Erro";
            }
        }
    }
?>