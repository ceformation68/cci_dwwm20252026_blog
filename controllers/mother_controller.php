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
			// Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
			$objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');

			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				//$$key = $value;
				$objSmarty->assign($key, $value);
			}
			// Message de succès
			$objSmarty->assign("success_message", $_SESSION['success']??'');
			unset($_SESSION['success']);
			// Message d'erreur en session
			$objSmarty->assign("arrError", isset($_SESSION['error'])?array($_SESSION['error']):array());
			unset($_SESSION['error']);
			
			
			$objSmarty->display("views/".$strView.".tpl");
			
			// inclusion du header
			/*include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");*/
		}
		
		
	}