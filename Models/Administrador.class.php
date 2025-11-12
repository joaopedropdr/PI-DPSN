<?php 
    class Administrador {
        public function __construct(private int $id_administrador =0, private string $email = "", private string $senha=""){}

        public function getId_administrador() {
            return $this->id_administrador;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getSenha() {
            return $this->senha;
        }

        public function setId_administrador($id_administrador) {
            return $this->id_administrador = $id_administrador;
        }
        public function setEmail($email) {
           return $this->email = $email;
        }
        public function seSenha($senha) {
            return $this->senha = $senha;
        }
         
    }
?>