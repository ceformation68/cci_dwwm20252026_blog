<?php
	require_once("mother_model.php");
	/**
	* Traitement des requêtes pour les articles
	* @author : Christel
	* @version : V0.5
	*/
	class ArticleModel extends Connect{
		
		public string 	$strKeywords	= '';
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
		
	}