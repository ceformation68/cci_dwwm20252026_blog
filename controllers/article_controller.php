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
		
		/**
		* Page d'ajout / edition d'un Article
		*/
		public function addedit(){
			
			var_dump($_POST);
			var_dump($_FILES);
			
			$objArticle	= new Article;
			$objArticle->hydrate($_POST);
			
			// Tester le formulaire
			$arrError = [];
			if (count($_POST) > 0) {
				if ($objArticle->getTitle() == ""){
					$arrError['title'] = "Le titre est obligatoire";
				}	
				if ($objArticle->getContent() == ""){
					$arrError['content'] = "Le contenu est obligatoire";
				}	
				$arrTypeAllowed	= array('image/jpeg', 'image/png');
				if ($_FILES['img']['error'] == 4){ // Est-ce que le fichier existe ?
					$arrError['img'] = "L'image est obligatoire";
				}else if (!in_array($_FILES['img']['type'], $arrTypeAllowed)){
					$arrError['img'] = "Le type de fichier n'est pas autorisé";
				}
				// Si le formulaire est rempli correctement
				if (count($arrError) == 0){
					$strImageName	= uniqid();
					switch ($_FILES['img']['type']){
						case 'image/jpeg' :
							$strImageName .= '.jpg';
							break;
						case 'image/png' :
							$strImageName .= '.png';
							break;
					}
					
					// => Ajout dans la base de données 
					$objArticleModel	= new ArticleModel;
					$objArticle->setImg($strImageName);

					$boolInsert 		= $objArticleModel->insert($objArticle);
					if ($boolInsert === true){
						$strDest = 'assets/images/'.$strImageName;
						
						// TODO 
							// => Redimensionner l'image
							// => Ajouter un logo (option)
						
						
						if (move_uploaded_file($_FILES['img']['tmp_name'], $strDest)){
							$_SESSION['success'] 	= "L'article a bien été créé";
							header("Location:index.php");
							exit;
						}else{
							$arrError['img'] = "Erreur dans le traitement de l'image";
						}
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
				}
			}				
			var_dump($arrError);
			// Afficher
			$this->_arrData['arrError'] = $arrError;
			$this->_arrData['objArticle'] 	= $objArticle;
			$this->_display("addedit_article");
		}
		
	}