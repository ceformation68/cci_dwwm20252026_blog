<?php
	function findAllUsers():array{
		// inclure la connexion
		require("connexion.php");
		// Ecrire la requête
		$strRq	= "SELECT user_id, user_firstname, user_name
					FROM users ";
		// Lancer la requête et récupérer les résultats
		return $db->query($strRq)->fetchAll();
	}