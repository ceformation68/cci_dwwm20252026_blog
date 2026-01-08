<?php
	function findAll(int $intLimit=0, string $strKeywords='', int $intAuthor=0, 
					 int $intPeriod=0, string $strDate='', string $strStartDate='', 
					 string $strEndDate=''):array{
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
			$strWhere	= " AND ";
		}
		
		// Recherche par dates
		if ($intPeriod == 0){
			// Par date exacte
			if ($strDate != ''){
				$strRq .= $strWhere." article_createdate = '".$strDate."'";
			}
		}else{
			// Par période de dates
			if ($strStartDate != '' && $strEndDate != ''){
			//if ( ($strStartDate != '') && ($strEndDate != '') ){ Parethèses selon le développeur - pas de changement si que des && - Attention ||
				$strRq .= $strWhere." article_createdate BETWEEN '".$strStartDate."' AND '".$strEndDate."'";
			}else{
				if ($strStartDate != ''){
					// A partir de
					$strRq .= $strWhere." article_createdate >= '".$strStartDate."'";
				}else if ($strEndDate != ''){
					// Avant le
					$strRq .= $strWhere." article_createdate <= '".$strEndDate."'";
				}
			}
		}
		
		$strRq .= " ORDER BY article_createdate DESC";
		
		if ($intLimit > 0){
			$strRq  .= " LIMIT ".$intLimit;
		}

		// Lancer la requête et récupérer les résultats
		return $db->query($strRq)->fetchAll();
	}