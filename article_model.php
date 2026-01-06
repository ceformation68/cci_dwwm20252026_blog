<?php
	function findAll($intLimit=0, $strKeywords='', $intAuthor=0 ){
		// inclure la connexion
		require_once("connexion.php");
		
		// Ecrire la requête
		$strRq	= "SELECT articles.*, 
					CONCAT(user_firstname, ' ', user_name) AS 'article_creatorname'
					FROM articles
						INNER JOIN users ON article_creator = user_id";
		// Pour le where (un seul)
		//$boolWhere	= false; // flag
		$strWhere	= " WHERE ";
		// Recherche par mot clé
		if ($strKeywords != '') {
			$strRq .= " WHERE (article_title LIKE '%".$strKeywords."%'
							OR article_content LIKE '%".$strKeywords."%') ";
			//$boolWhere	= true;
			$strWhere	= " AND ";
		}
		
		// Recherche par auteur
		if ($intAuthor > 0){
			/*if ($boolWhere){
				$strRq .= " AND ";
			}else{
				$strRq .= " WHERE ";
			}*/
			$strRq .= $strWhere." article_creator = ".$intAuthor;
		}
		
		$strRq .= " ORDER BY article_createdate DESC";
		
		if ($intLimit > 0){
			$strRq  .= " LIMIT ".$intLimit;
		}
		var_dump($strRq);
		// Lancer la requête et récupérer les résultats
		return $db->query($strRq)->fetchAll();
	}