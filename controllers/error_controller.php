<?php
	/** 
	* Le contrôleur des erreurs
	* @author Christel
	*/
	class ErrorCtrl extends MotherCtrl{
		
		/**
		* Page erreur 404
		*/
		public function error_404(){
			//echo "error 404 - page introuvable";
			// Variables d'affichage
			$this->_arrData['strH2']	= "Erreur 404";
			$this->_arrData['strP']		= "La page n'existe pas";
			// Variables technique
			$this->_arrData['strPage']	= "error_404";

			// Afficher
			$this->_display("error_404");
		}
		
		/**
		* Page erreur 403
		*/
		public function error_403(){
			// Variables d'affichage
			$this->_arrData['strH2']	= "Erreur 403";
			$this->_arrData['strP']		= "Vous n'êtes pas autorisé à accéder à cette page, vous êtes une erreur 030<br>
											Allez vous <a href='index.php?ctrl=user&action=login'>connecter</a>";
			// Variables technique
			$this->_arrData['strPage']	= "error_403";

			// Afficher
			$this->_display("error_403");
		}
		
	}