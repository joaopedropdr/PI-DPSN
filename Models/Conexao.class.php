<?php
    abstract class Conexao {
        public function __construct(protected $db = null) {
            $parametros = ("mysql:host=localhost;dbname=pi_dpsn;charset=utf8mb4");
            try {
                $this->db = new PDO($parametros, "root", "");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo $e->getMessage();
                echo $e->getCode();
                die("Problema na conexão");
            }
        }
    }
?>