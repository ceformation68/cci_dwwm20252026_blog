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
			$objSmarty->registerPlugin('modifier', 'var_dump', 'var_dump');

			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				//$$key = $value;
				$objSmarty->assign($key, $value);
			}
			// Message de succès
			$objSmarty->assign("success_message", $_SESSION['success']??'');
			unset($_SESSION['success']);
			
			$objSmarty->display("views/".$strView.".tpl");
			
			// inclusion du header
			/*include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");*/
		}
		
		
	}