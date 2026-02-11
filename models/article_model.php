<?php
	require_once("mother_model.php");
	/**
	* Traitement des requêtes pour les articles
	* @author Christel
	* @version V0.5
	*/
	class ArticleModel extends Connect{
		
		public string 	$strKeywords	= ''; /**< Mots clés */
		public int 		$intAuthor		= 0;
		public int 		$intPeriod		= 0; 
		public string 	$strDate		= ''; 
		public string 	$strStartDate	= '';
		public string 	$strEndDate		= '';
		
		/**
		* Fonction de recherche des articles
		* @param int $intLimit Nb de résultats demandés, par défaut 0 = tous
		* @return array Tableau des articles provenant de la base de données 
		*/		
		public function findAll(int $intLimit=0):array{
			
			// Ecrire la requête
			$strRq	= "SELECT articles.*, 
						CONCAT(user_firstname, ' ', user_name) AS 'article_creatorname'
						FROM articles
							INNER JOIN users ON article_creator = user_id";
			// Pour le where (un seul)
			//$boolWhere	= false; // flag
			$strWhere	= " WHERE ";
			// Recherche par mot clé
			if ($this->strKeywords != '') {
				$strRq .= " WHERE (article_title LIKE '%".$this->strKeywords."%'
								OR article_content LIKE '%".$this->strKeywords."%') ";
				//$boolWhere	= true;
				$strWhere	= " AND ";
			}
			
			// Recherche par auteur
			if ($this->intAuthor > 0){
				/*if ($boolWhere){
					$strRq .= " AND ";
				}else{
					$strRq .= " WHERE ";
				}*/
				$strRq .= $strWhere." article_creator = ".$this->intAuthor;
				$strWhere	= " AND ";
			}
			
			// Recherche par dates
			if ($this->intPeriod == 0){
				// Par date exacte
				if ($this->strDate != ''){
					$strRq .= $strWhere." article_createdate = '".$this->strDate."'";
				}
			}else{
				// Par période de dates
				if ($this->strStartDate != '' && $this->strEndDate != ''){
				//if ( ($strStartDate != '') && ($strEndDate != '') ){ Parethèses selon le développeur - pas de changement si que des && - Attention ||
					$strRq .= $strWhere." article_createdate BETWEEN '".$this->strStartDate."' AND '".$this->strEndDate."'";
				}else{
					if ($this->strStartDate != ''){
						// A partir de
						$strRq .= $strWhere." article_createdate >= '".$this->strStartDate."'";
					}else if ($this->strEndDate != ''){
						// Avant le
						$strRq .= $strWhere." article_createdate <= '".$this->strEndDate."'";
					}
				}
			}
			
			$strRq .= " ORDER BY article_createdate DESC";
			
			if ($intLimit > 0){
				$strRq  .= " LIMIT ".$intLimit;
			}

			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetchAll();
		}
		
		
		/**
		* Fonction de recherche d'un article en fonction de son id
		* @param int $intId identifiant de l'article à rechercher
		* @return array Tableau d'un article
		*/
		public function find(int $intId):array{
			// Ecrire la requête
			$strRq	= "SELECT article_id, article_title, article_content, article_img, 
							article_creator, article_createdate
						FROM articles
						WHERE article_id = ".$intId;
			
			// Lancer la requête et récupérer le résultat 
			return $this->_db->query($strRq)->fetch(); // fecth car recherche sur clé primaire = unique
		}
		
		/**
		* Fonction d'insertion d'un article en BDD
		* @param object $objArticle L'objet article
		* @return bool Est-ce que la requête s'est bien passée (true/false)
		*/
		public function insert(object $objArticle):bool{

			// Construire la requête
			$strRq 	= "INSERT INTO articles (article_title, article_content, 
											article_createdate, article_creator,
											article_img)
						VALUES (:title, :content, NOW(), :creator, :img)";

			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);

			// Donne les informations
			$rqPrep->bindValue(":title", $objArticle->getTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":content", $objArticle->getContent(), PDO::PARAM_STR);
			$rqPrep->bindValue(":creator", $_SESSION['user']['user_id'], PDO::PARAM_INT);
			$rqPrep->bindValue(":img", $objArticle->getImg(), PDO::PARAM_STR);

			// Executer la requête
			return $rqPrep->execute();
		}
		
		/**
		* Fonction de mise à jour d'un article en BDD
		* ALTER TABLE articles ADD COLUMN article_updated_at DATETIME NULL;
		* @param object $objArticle L'objet article
		* @return bool Est-ce que la requête s'est bien passée (true/false)
		*/
		public function update(object $objArticle):bool{

			// Construire la requête
			$strRq 	= "UPDATE articles 
						SET article_title = :title,
							article_content = :content, 
							article_updated_at = NOW(), 
							article_img = :img
						WHERE article_id = :id";

			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);

			// Donne les informations
			$rqPrep->bindValue(":title", $objArticle->getTitle(), PDO::PARAM_STR);
			$rqPrep->bindValue(":content", $objArticle->getContent(), PDO::PARAM_STR);
			$rqPrep->bindValue(":img", $objArticle->getImg(), PDO::PARAM_STR);
			$rqPrep->bindValue(":id", $objArticle->getId(), PDO::PARAM_INT);

			// Executer la requête
			return $rqPrep->execute();
		}		
	}