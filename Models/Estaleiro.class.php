<?php
    class Estaleiro {
        public function __construct(private int $id_estaleiro = 0, private string $nome_empresa = "", private string $nome = "", private string $cnpj = "", private string $telefone = "", private string $cep = "", private string $logradouro = "", private string $numero = "", private string $complemento = "", private string $bairro = "", private string $cidade = "", private string $estado = "", private string $email = "", private string $senha = "") {}
        
        // Métodos Getters e Setters
        public function getId_estaleiro() {
            return $this->id_estaleiro;
        }
        
        public function getNome_empresa() {
            return $this->nome_empresa;
        }
        
        public function getNome() {
            return $this->nome;
        }
        
        public function getCnpj() {
            return $this->cnpj;
        }
        
        public function getTelefone() {
            return $this->telefone;
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
        
        public function getComplemento() {
            return $this->complemento;
        }
        
        public function getBairro() {
            return $this->bairro;
        }
        
        public function getCidade() {
            return $this->cidade;
        }
        
        public function getEstado() {
            return $this->estado;
        }
        
        public function getEmail() {
            return $this->email;
        }
        
        public function getSenha() {
            return $this->senha;
        }
        
        // Setters
        public function setId_estaleiro($id_estaleiro) {
            return $this->id_estaleiro = $id_estaleiro;
        }
    
        public function setNome_empresa($nome_empresa) {
            return $this->nome_empresa = $nome_empresa;
        }
    
        public function setNome($nome) {
            return $this->nome = $nome;
        }
    
        public function setCnpj($cnpj) {
            return $this->cnpj = $cnpj;
        }
    
        public function setTelefone($telefone) {
            return $this->telefone = $telefone;
        }
    
        public function setCep($cep) {
            return $this->cep = $cep;
        }
    
        public function setLogradouro($logradouro) {
            return $this->logradouro = $logradouro;
        }
    
        public function setNumero($numero) {
            return $this->numero = $numero;
        }
    
        public function setComplemento($complemento) {
            return $this->complemento = $complemento;
        }
    
        public function setBairro($bairro) {
            return $this->bairro = $bairro;
        }
    
        public function setCidade($cidade) {
            return $this->cidade = $cidade;
        }
    
        public function setEstado($estado) {
            return $this->estado = $estado;
        }
    
        public function setEmail($email) {
            return $this->email = $email;
        }
    
        public function setSenha($senha) {
            return $this->senha = $senha;
        }
    }
?>