<?php
	require("models/article_model.php");
	require("entities/article_entity.php");
	
	/** 
	* Le contrôleur des articles
	* @author Christel
	*/
	class ArticleCtrl extends MotherCtrl{
		
		/**
		* Page d'accueil 
		*/
		public function home(){
			// Variables d'affichage
			$this->_arrData['strH2']	= "Accueil";
			$this->_arrData['strP']		= "Découvrez nos derniers articles sur le développement web";
			// Variables technique
			$this->_arrData['strPage']	= "home";
			
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
			// Donner arrArticleToDisplay à maman pour l'affichage
			$this->_arrData['arrArticleToDisplay']	= $arrArticleToDisplay;

			// Afficher
			$this->_display("home");
		}
		
		public function blog(){
			// Variables d'affichage
			$this->_arrData['strH2']	= "Blog";
			$this->_arrData['strP']		= "Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse";
			// Variables technique
			$this->_arrData['strPage']	= "blog";
			
			// Récupération des articles 
			$objArticleModel 	= new ArticleModel;

			//Récupérer les informations du Formulaire
			$objArticleModel->strKeywords 	= $_POST['keywords']??'';
			$objArticleModel->intAuthor		= $_POST['author']??0;
			$objArticleModel->intPeriod		= $_POST['period']??0;
			$objArticleModel->strDate		= $_POST['date']??'';
			$objArticleModel->strStartDate	= $_POST['startdate']??'';
			$objArticleModel->strEndDate	= $_POST['enddate']??'';

			//$arrArticle = findAll(0, $strKeywords, $intAuthor, $intPeriod, $strDate, $strStartDate, $strEndDate);
			// Depuis PHP 8 - accès direct aux paramètres
			$arrArticle 		= $objArticleModel->findAll();

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
			
			$this->_arrData['arrUser']		= $arrUser;
			
			$this->_arrData['strKeywords']	= $objArticleModel->strKeywords;
			$this->_arrData['intAuthor']	= $objArticleModel->intAuthor;
			$this->_arrData['intPeriod']	= $objArticleModel->intPeriod;
			$this->_arrData['strDate']		= $objArticleModel->strDate;
			$this->_arrData['strStartDate']	= $objArticleModel->strStartDate;
			$this->_arrData['strEndDate']	= $objArticleModel->strEndDate;

			// Donner arrArticleToDisplay à maman pour l'affichage
			$this->_arrData['arrArticleToDisplay']	= $arrArticleToDisplay;
			
			// Afficher
			$this->_display("blog");
		}
		
	}