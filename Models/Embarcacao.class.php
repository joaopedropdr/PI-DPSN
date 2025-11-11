<?php
    class Embarcacao {
        public function __construct(private int $id_embarcacao = 0, private $estaleiro_id = null, private string $nome = "", 
        private string $comprimento_total = "", private string $boca_moldada = "", private string $pontal_moldado = "", private string $calado_maximo = "",
        private string $calado_leve = "", private string $arqueacao_bruta = "", private string $arqueacao_liquida = "", private string $tpb = "",
        private string $contorno = "", private string $lastro = "", private string $area_navegacao_tipo_servico	 = "", private string $tipo_embarcacao = "",
        private string $material_casco = "", private string $motorizacao_max = "", private string $motorizacao_min = "",) {}

        //  GETTERS 
        public function getId_embarcacao() {
            return $this->id_embarcacao;
        }

        public function getEstaleiro_id() {
            return $this->estaleiro_id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getComprimento_total() {
            return $this->comprimento_total;
        }

        public function getBoca_moldada() {
            return $this->boca_moldada;
        }

        public function getPontal_moldado() {
            return $this->pontal_moldado;
        }

        public function getCalado_maximo() {
            return $this->calado_maximo;
        }

        public function getCalado_leve() {
            return $this->calado_leve;
        }

        public function getArqueacao_bruta() {
            return $this->arqueacao_bruta;
        }

        public function getArqueacao_liquida() {
            return $this->arqueacao_liquida;
        }

        public function getTpb() {
            return $this->tpb;
        }

        public function getContorno() {
            return $this->contorno;
        }

        public function getLastro() {
            return $this->lastro;
        }

        public function getArea_navegacao_tipo_servico() {
            return $this->area_navegacao_tipo_servico;
        }

        public function getTipo_embarcacao() {
            return $this->tipo_embarcacao;
        }   

        public function getMaterial_casco() {
            return $this->material_casco;
        }

        public function getMotorizacao_max() {
                return $this->motorizacao_max;
            }

            public function getMotorizacao_min() {
                return $this->motorizacao_min;
            }

        //SETTERS    
        public function setId_embarcacao($id_embarcacao) {
            $this->id_embarcacao = $id_embarcacao;
            return $this;
        }

        public function setEstaleiro_id($estaleiro_id) {
            $this->estaleiro_id = $estaleiro_id;
            return $this;
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        public function setComprimento_total($comprimento_total) {
            $this->comprimento_total = $comprimento_total;
            return $this;
        }

        public function setBoca_moldada($boca_moldada) {
            $this->boca_moldada = $boca_moldada;
            return $this;
        }

        public function setPontal_moldado($pontal_moldado) {
             $this->pontal_moldado = $pontal_moldado;
            return $this;
        }

        public function setCalado_maximo($calado_maximo) {
            $this->calado_maximo = $calado_maximo;
            return $this;
        }

        public function setCalado_leve($calado_leve) {
            $this->calado_leve = $calado_leve;
            return $this;
        }

        public function setArqueacao_bruta($arqueacao_bruta) {
            $this->arqueacao_bruta = $arqueacao_bruta;
            return $this;
        }

        public function setArqueacao_liquida($arqueacao_liquida) {
            $this->arqueacao_liquida = $arqueacao_liquida;
            return $this;
        }

        public function setTpb($tpb) {
            $this->tpb = $tpb;
            return $this;
        }

        public function setContorno($contorno) {
            $this->contorno = $contorno;
            return $this;
        }

        public function setLastro($lastro) {
            $this->lastro = $lastro;
            return $this;
        }

        public function setArea_navegacao_tipo_servico($area_navegacao_tipo_servico) {
            $this->area_navegacao_tipo_servico = $area_navegacao_tipo_servico;
            return $this;
        }

        public function setTipo_embarcacao($tipo_embarcacao) {
            $this->tipo_embarcacao = $tipo_embarcacao;
            return $this;
        }

        public function setMaterial_casco($material_casco) {
            $this->material_casco = $material_casco;
            return $this;
        }

        public function setMotorizacao_max($motorizacao_max) {
            $this->motorizacao_max = $motorizacao_max;
            return $this;
        }

        public function setMotorizacao_min($motorizacao_min) {
            $this->motorizacao_min = $motorizacao_min;
            return $this;
        }
    }

    
?>