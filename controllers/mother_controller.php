<?php

	use Smarty\Smarty;
	
	class MotherCtrl {
		
		protected array $_arrData = array(); // ou = []
		
		/** 
		* Méthode d'affichage des pages 
		*/
		protected function _display($strView){
			// Création de l'objet Smarty
			$objSmarty	= new Smarty();

			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				//$$key = $value;
				$objSmarty->assign($key, $value);
			}
			
			$objSmarty->display("views/".$strView.".tpl");
			
			// inclusion du header
			/*include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");*/
		}
		
		
	}