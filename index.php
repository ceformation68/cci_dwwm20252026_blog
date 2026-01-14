<?php
	// Récupère les infos dans l'url
	$strCtrl	= $_GET['ctrl']??'article'; // quel contrôleur ?
	$strMethod	= $_GET['action']??'home'; // quel méthode ?
	
	$boolError		= false;
	$strFileName	= "controllers/".$strCtrl."_controller.php";
	if (file_exists($strFileName)){
		require($strFileName);
		$strClassName	= ucfirst($strCtrl)."Ctrl";
		if (class_exists($strClassName)){
			$objController 	= new $strClassName();
			if (method_exists($objController, $strMethod)){
				$objController->$strMethod();
			}else{
				$boolError	= true;
			}
		}else{
			$boolError	= true;
		}
	}else{
		$boolError	= true;
	}
	
	if($boolError){
		echo "error 404 - page introuvable"; 
		// remplacer par redirection vers controller error -> 404
	}