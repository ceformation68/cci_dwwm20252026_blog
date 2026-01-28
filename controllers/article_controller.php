<?php
	require("models/article_model.php");
	require("entities/article_entity.php");
	
	/** 
	* Le contrôleur des articles
	* @author Christel
	*/
	class ArticleCtrl{
		
		/**
		* Page d'accueil 
		* @todo Optimiser l'affichage
		*/
		public function home(){
			// Variables d'affichage
			$strH2		= "Accueil";
			$strP		= "Découvrez nos derniers articles sur le développement web";
			// Variables technique
			$strPage	= "home";
			
			// inclusion du header
			include("views/_partial/header.php");
			
			// Récupération des articles 
			
			$objArticleModel 	= new ArticleModel;
			$arrArticle 		= $objArticleModel->findAll(4);
			
			
			// Initialisation d'un tableau => objets
			$arrArticleToDisplay	= array(); 
			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrArticle as $arrDetArticle){
				$objArticle = new Article;
				$objArticle->hydrate($arrDetArticle);
				
				$arrArticleToDisplay[]	= $objArticle;
			}
			include("views/home.php");
			include("views/_partial/footer.php");
		}
		
		public function blog(){
			// Variables d'affichage
			$strH2		= "Blog";
			$strP		= "Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse";
			// Variables technique
			$strPage	= "blog";
			
			// inclusion du header
			include("views/_partial/header.php");

			//Récupérer les informations du Formulaire
			$strKeywords 	= $_POST['keywords']??'';
			$intAuthor		= $_POST['author']??0;
			$intPeriod		= $_POST['period']??0;
			$strDate		= $_POST['date']??'';
			$strStartDate	= $_POST['startdate']??'';
			$strEndDate		= $_POST['enddate']??'';

			// Récupération des articles 
			$objArticleModel 	= new ArticleModel;
			//$arrArticle = findAll(0, $strKeywords, $intAuthor, $intPeriod, $strDate, $strStartDate, $strEndDate);
			// Depuis PHP 8 - accès direct aux paramètres
			$arrArticle 		= $objArticleModel->findAll(intAuthor:$intAuthor, intPeriod:$intPeriod, strDate:$strDate, 
									strKeywords:$strKeywords, strStartDate:$strStartDate, strEndDate:$strEndDate);

			// Initialisation d'un tableau => objets
			$arrArticleToDisplay	= array(); 
			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrArticle as $arrDetArticle){
				$objArticle = new Article;
				$objArticle->hydrate($arrDetArticle);
				
				$arrArticleToDisplay[]	= $objArticle;
			}

			// Récupération des utilisateurs
			require("models/user_model.php");
			$objUserModel 	= new UserModel;
			$arrUser 		= $objUserModel->findAllUsers();
			
			include("views/blog.php"); // Partie affichage 
			
			include("views/_partial/footer.php");
		}
		
	}