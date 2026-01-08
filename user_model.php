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
	
	function verifUser(string $strMail, string $strPwd):array|bool{
		// 1. Etablir la connexion
		require("connexion.php");
		// 2. Construire la requête
		$strRq	= "SELECT user_id, user_name, user_firstname, user_pwd
					FROM users
					WHERE user_mail = '".$strMail."' AND user_pwd = '".$strPwd."'";
		// 3. Executer la requête et récupérer les résultats
		return $db->query($strRq)->fetch();
	}
	
	function insert(string $strName, string $strFirstname, string $strMail, string $strPwd):int{
		// 1. Etablir la connexion
		require("connexion.php");
		// 2. Construire la requête
		$strRq	= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd)
					VALUES ('".$strName."', '".$strFirstname."', '".$strMail."', '".$strPwd."')";
		// 3. Executer la requête
		return $db->exec($strRq);
	}