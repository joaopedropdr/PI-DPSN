<?php 
    class Cliente {
        public function __construct(private int $id_cliente =0, private int $embarcacao_id =0, private string $nome = "", private string $cpf_cnpj="", 
        private int $ano_construcao_emb=0, 
        private string $chassi_emb = "", private string $cep = "", private string $logradouro = "", private string $numero = "", 
        private string $bairro = "", private string $complementos = "", private string $cidade = "", private string $estado = ""){}

        public function getIdCliente() {
            return $this->id_cliente;
        }

        public function getEmbarcacaoId() {
            return $this->embarcacao_id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getCpfCnpj() {
            return $this->cpf_cnpj;
        }

        public function getAnoConstrucaoEmb() {
            return $this->ano_construcao_emb;
        }

        public function getChassiEmb() {
            return $this->chassi_emb;
        }

        public function getCep() {
            return $this->cep;
        }

        public function getLogradouro() {
            return $this->logradouro;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function getComplementos() {
            return $this->complementos;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function getEstado() {
            return $this->estado;
        }
        // --- Métodos Setters ---

        public function setIdCliente($id_cliente) {
            $this->id_cliente = $id_cliente;
            return $this; 
        }
        public function setEmbarcacaoId($embarcacao_id) {
            $this->embarcacao_id = $embarcacao_id;
            return $this; 
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        public function setCpfCnpj($cpf_cnpj) {
            $this->cpf_cnpj = $cpf_cnpj;
            return $this;
        }

        public function setAnoConstrucaoEmb($ano_construcao_emb) {
            $this->ano_construcao_emb = $ano_construcao_emb;
            return $this;
        }

        public function setChassiEmb($chassi_emb) {
            $this->chassi_emb = $chassi_emb;
            return $this;
        }

        public function setCep($cep) {
            $this->cep = $cep;
            return $this;
        }

        public function setLogradouro($logradouro) {
            $this->logradouro = $logradouro;
            return $this;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
            return $this;
        }

        public function setBairro($bairro) {
            $this->bairro = $bairro;
            return $this;
        }

        public function setComplementos($complementos) {
            $this->complementos = $complementos;
            return $this;
        }
    }
?>