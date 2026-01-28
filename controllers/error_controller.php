<?php
	/** 
	* Le contrôleur des erreurs
	* @author Christel
	*/
	class ErrorCtrl{
		
		/**
		* Page erreur 404
		*/
		public function error_404(){
			//echo "error 404 - page introuvable";
			// Variables d'affichage
			$strH2	= "Erreur 404";
			$strP	= "La page n'existe pas";
			// Variables technique
			$strPage	= "error_404";

			// inclusion du header
			include("views/_partial/header.php");
			include("views/error_404.php");
			include("views/_partial/footer.php");			
		}
		
		/**
		* Page erreur 403
		*/
		public function error_403(){
			// Variables d'affichage
			$strH2	= "Erreur 403";
			$strP	= "Vous n'êtes pas autorisé à accéder à cette page, vous êtes une erreur 030<br>
						Allez vous <a href='index.php?ctrl=user&action=login'>connecter</a>";
			// Variables technique
			$strPage	= "error_403";

			// inclusion du header
			include("views/_partial/header.php");
			include("views/error_403.php");
			include("views/_partial/footer.php");			
		}
		
	}