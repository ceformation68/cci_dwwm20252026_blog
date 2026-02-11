<?php

	use Smarty\Smarty;
	
	class MotherCtrl {
		
		protected array $_arrData = array(); // ou = []
		
		/** 
		* Méthode d'affichage des pages 
		* @param string $strView le template à afficher
		* @param bool $boolDisplay par défaut true est-ce que j'affiche la vue ?
		*/
		protected function _display(string $strView, bool $boolDisplay = true){
			// Création de l'objet Smarty
			$objSmarty	= new Smarty();
			// Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
			$objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');
			$objSmarty->registerPlugin('modifier', 'is_null', 'is_null');

			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				//$$key = $value;
				$objSmarty->assign($key, $value);
			}
			// Message de succès
			$objSmarty->assign("success_message", $_SESSION['success']??'');
			unset($_SESSION['success']);
			// Message d'erreur en session
			if (isset($_SESSION['error'])){
				$objSmarty->assign("arrError", array($_SESSION['error']));
				unset($_SESSION['error']);
			}
			
			if ($boolDisplay){
				$objSmarty->display("views/".$strView.".tpl");
			}else{
				return $objSmarty->fetch("views/".$strView.".tpl");
			}
			
			// inclusion du header
			/*include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");*/
		}
		
		
	}