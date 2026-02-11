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
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=error_403");
				exit;
			}
			
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
				$arrTypeAllowed	= array('image/jpeg', 'image/png', 'image/webp');
				if ($_FILES['img']['error'] == 4){ // Est-ce que le fichier existe ?
					$arrError['img'] = "L'image est obligatoire";
				}else if (!in_array($_FILES['img']['type'], $arrTypeAllowed)){
					$arrError['img'] = "Le type de fichier n'est pas autorisé";
				}
				// Si le formulaire est rempli correctement
				if (count($arrError) == 0){
					// Renommage de l'image 
					$strImageName	= uniqid().".webp";
					
					/* uniquement si on veut garder l'extension du fichier originel */
					/*switch ($_FILES['img']['type']){
						case 'image/jpeg' :
							$strImageName .= '.jpg';
							break;
						case 'image/png' :
							$strImageName .= '.png';
							break;
					}*/
					
					// => Ajout dans la base de données 
					$objArticleModel	= new ArticleModel;
					// Mise à jour du nom de l'image dans l'objet
					$objArticle->setImg($strImageName);

					$boolInsert 		= $objArticleModel->insert($objArticle);
					if ($boolInsert === true){
						// Création du chemin de destination
						$strDest    = 'assets/images/'.$strImageName;
						// Récupération de la source de l'image
                        $strSource	= $_FILES['img']['tmp_name'];
                        // Récupération des dimensions de l'image source
                        list($intWidth, $intHeight) = getimagesize($strSource);
						// Dimensions de destination
						$intDestWidth 	= 200;
						$intDestHeight 	= 250;
						
						// Calcul du ratio de destination
						$fltDestRatio 	= $intDestWidth / $intDestHeight;
						// Calcul du ratio de la source
						$fltSourceRatio = $intWidth / $intHeight;
						
						// Détermination de la zone à cropper
						if ($fltSourceRatio > $fltDestRatio) {
							// L'image source est plus large → on crop en largeur
							$intCropHeight 	= $intHeight;
							$intCropWidth 	= round($intHeight * $fltDestRatio);
							$intCropX 		= ($intWidth - $intCropWidth) / 2; // Centrage horizontal
							$intCropY 		= 0;
						} else {
							// L'image source est plus haute → on crop en hauteur
							$intCropWidth 	= $intWidth;
							$intCropHeight 	= round($intWidth / $fltDestRatio);
							$intCropX 		= 0;
							$intCropY 		= ($intHeight - $intCropHeight) / 2; // Centrage vertical
						}

                        // Création d'une image 'vide'
                        $objDest		= imagecreatetruecolor($intDestWidth, $intDestHeight); 
						
						// Création d'un objet image à partir de la source (attention au type de fichier)
						switch ($_FILES['img']['type']){
							case 'image/jpeg' :
								$objSource		= imagecreatefromjpeg($strSource);
								break;
							case 'image/png' :
								$objSource		= imagecreatefrompng($strSource);
								break;
							case 'image/webp' :
								$objSource		= imagecreatefromwebp($strSource);
								break;
						}
						
						// Mise à jour de l'image 'vide' avec les informations de dimension
                        //imagecopyresized($objDest, $objSource, 0, 0, 0, 0, 200, 250, $intWidth, $intHeight);
						imagecopyresampled($objDest, $objSource, 
											0, 0, $intCropX, $intCropY, 
											$intDestWidth, $intDestHeight, $intCropWidth, $intCropHeight);
						
						// Si la copie de l'image a bien été effectuée à la destination voulue
                        if(imagewebp($objDest, $strDest)){
						//if (move_uploaded_file($_FILES['img']['tmp_name'], $strDest)){
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