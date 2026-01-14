<?php
	require("article_model.php");
	require("article_entity.php");
	
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
			include("_partial/header.php");
			
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
			include("_partial/footer.php");
		}
		
		public function blog(){
			echo "je suis la page blog";
			
		}
		
	}