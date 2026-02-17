<?php
	// ici plutôt que dans le header pour également les pages sans affichage
	session_start(); 
	
	// Définition de l'autoloader de notre application :
	// Comment on charge un fichier PHP en fonction du nom de la classe qu'on soihaite utiliser
	spl_autoload_register(function($class_name) {
		
		// On renomme les fichiers et les répertoires
		// C'est chiant les underscore dans les fichiers des classes :)
		
		// $class_name contient le nom complet de la classe qu'on souhaite utiliser (dans un use par exemple)
		// Cas #1 : charger la classe Blog\Models\ArticleModel
		// => $class_name = "Blog\Models\ArticleModel"
		// Objectif : require_once './Models/ArticleModel.php'
		
		$strClassFilename = str_replace('Blog', '.', $class_name);
		// $strClassFilename = ".\Models\ArticleModel"
		
		$strClassFilename = str_replace('\\', '/', $strClassFilename);
		// $strClassFilename = "./Models/ArticleModel"
		
		$strClassFilename .= '.php';
		// $strClassFilename = "./Models/ArticleModel.php"
		
		require_once $strClassFilename;		
	});
	
	require("vendor/autoload.php"); // PArce que j'utilise composer
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
	$dotenv->load();
	//var_dump($_ENV);
	
	// Le chargement des classes est délégué à l'autoloader
	//require("controllers/mother_controller.php");
	
	// Debug et test pour valider l'autoloader
	// $objController = new Blog\Controllers\PageCtrl();
	// $objController->about();
	
	// Récupère les infos dans l'url
	$strCtrl	= $_GET['ctrl']??'article'; // quel contrôleur ?
	$strMethod	= $_GET['action']??'home'; // quel méthode ?
	
	// Flag pour afficher le 404 si besoin
	$boolError		= false;
	
	// Construction du nom de fichier n'est plus à faire car l'autoloader s'en chargera
	
	// Construciton du nom du fichier du controller
	// $strFileName	= "controllers/".$strCtrl."_controller.php";
	
	// if (file_exists($strFileName)){
		// Si le fichier existe, on l'inclut
		// require($strFileName);
		// Construction du nom de la classe
		
		// On rajoute bien le "préfixe" de l'espace de nom des contrôleurs
		$strClassName	= "Blog\\Controllers\\" . ucfirst($strCtrl)."Ctrl";
		
		if (class_exists($strClassName)){
			// si la classe existe, on l'instancie
			$objController 	= new $strClassName();
			if (method_exists($objController, $strMethod)){
				// Si la méthode existe, on l'appelle
				$objController->$strMethod();
			}else{
				$boolError	= true;
			}
		}else{
			$boolError	= true;
		}
	/*
	}else{
		$boolError	= true;
	}*/
	
	if($boolError){
		//echo "error 404 - page introuvable"; 
		// remplacer par redirection vers controller error -> 404
		header("Location:index.php?ctrl=error&action=error_404");
		exit;
	}