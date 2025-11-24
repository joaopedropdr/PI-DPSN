<?php 
    class Documento {
        public function __construct(private int $id_documento =0, private int $embarcacao_id =0, private int $cliente_id=0){}

        public function getIdDocumento() {
            return $this->id_documento;
        }
        public function getEmbarcacaoId() {
            return $this->embarcacao_id;
        }
        public function getClienteID() {
            return $this->cliente_id;
        }

        public function setIddocumento($id_documento) {
            $this->id_documento = $id_documento;
            return $this; 
        }
        public function setEmbarcacaoId($embarcacao_id) {
            $this->embarcacao_id = $embarcacao_id;
            return $this; 
        }
        public function setClienteId($cliente_id) {
            $this->cliente_id = $cliente_id;
            return $this; 
        }
    }
?>