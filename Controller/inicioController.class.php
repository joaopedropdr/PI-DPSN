<?php
    class inicioController {
		public function inicio()
		{
			require_once "Views/menu.php";
		}

		public function inicioEstaleiro()
		{
			require_once "Views/pag_principal_estaleiro.php";
		}
		
		public function meusDados()
		{
			require_once "Views/pag_dados_estaleiro.php";
		}

		public function inicioAdm()
		{
			require_once "Views/pag_principal_adm.php";
		}

		public function todosEstaleiros() {
            require_once "Views/pagina_estaleiro_adm.php";
        } // Fim metodo todosEstalieros
	}
?>