<?php

	class MotherCtrl {
		
		protected array $_arrData = array(); // ou = []
		
		/** 
		* Méthode d'affichage des pages 
		*/
		protected function _display($strView){
			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				$$key = $value;
			}
			
			// inclusion du header
			include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");
		}
		
		
	}