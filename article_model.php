<?php
	function findAll($intLimit=0){
		// inclure la connexion
		require_once("connexion.php");
		
		// Ecrire la requête
		$strRq	= "SELECT articles.*, 
					CONCAT(user_firstname, ' ', user_name) AS 'article_creatorname'
					FROM articles
						INNER JOIN users ON article_creator = user_id
					ORDER BY article_createdate DESC";
		if ($intLimit > 0){
			$strRq  .= " LIMIT ".$intLimit;
		}
		var_dump($strRq);
		// Lancer la requête et récupérer les résultats
		return $db->query($strRq)->fetchAll();
	}