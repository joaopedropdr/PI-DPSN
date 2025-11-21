<?php
    require_once "Models/Estaleiro.class.php";
    require_once "Models/EstaleiroDAO.class.php";
    class inicioController {
		public function inicio()
		{
			require_once "Views/menu.php";
		}

		public function inicioEstaleiro()
		{
			require_once "Views/pag_principal_estaleiro.php";
		}
		

		public function inicioAdm()
		{
			require_once "Views/pag_principal_adm.php";
		}


	}
?>