<?php
	session_start();
	/*session_destroy();
	session_start();*/
	
	// on supprime l'utilisateur en session
	unset($_SESSION['user']);
	
	$_SESSION['success'] 	= "Vous êtes bien déconnecté";
	
	header("Location:index.php");
	exit;