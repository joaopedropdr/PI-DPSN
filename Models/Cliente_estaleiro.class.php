<?php 
    class Cliente_estaleiro {
        public function __construct(private int $id_cliente_estaleiro =0, private int $estaleiro_id =0, private int $cliente_id =0){}

        public function getIdClienteEstaleiro() {
            return $this->id_cliente_estaleiro;
        }

        public function getEstaleiroId() {
            return $this->estaleiro_id;
        }

        public function getClienteId() {
            return $this->cliente_id;
        }

        // --- Métodos Setters ---

        public function setIdClienteEstaleiro($id_cliente_estaleiro) {
            $this->id_cliente_estaleiro = $id_cliente_estaleiro;
            return $this; 
        }
        public function setEstaleiroId($estaleiro_id) {
            $this->estaleiro_id = $estaleiro_id;
            return $this; 
        }
        public function setClienteId($cliente_id) {
            $this->cliente_id = $cliente_id;
            return $this; 
        }
    }
?>