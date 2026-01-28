<?php
	require("models/user_model.php");
	require("entities/user_entity.php");
	
	/** 
	* Le contrôleur des utilisateurs
	* @author Christel
	*/
	class UserCtrl{
		
		/** 
		* Page de création d'un compte
		*/
		public function create_account(){
			// Variables d'affichage
			$strH2		= "Créer un compte";
			$strP		= "Inscrivez-vous";
			// Variables technique
			$strPage	= "create_account";
			
			// inclusion du header
			include("views/_partial/header.php");
			
			// Traitement du formulaire
			//var_dump($_POST);
			$strName 		= $_POST['name']??"";
			$strFirstname 	= $_POST['firstname']??"";
			$strMail 		= $_POST['mail']??"";
			$strPwd 		= $_POST['pwd']??"";
			$strPwdConfirm	= $_POST['pwd_confirm']??"";
			
			$objUser	= new User;
			$objUser->hydrate($_POST);

			// Tester le formulaire
			$arrError = [];
			if (count($_POST) > 0) {
				if ($objUser->getName() == ""){
					$arrError['name'] = "Le nom est obligatoire";
				}	
				if ($objUser->getFirstname() == ""){
					$arrError['firstname'] = "Le prénom est obligatoire";
				}	
				if ($objUser->getMail() == ""){
					$arrError['mail'] = "Le mail est obligatoire";
				}else if (!filter_var($objUser->getMail(), FILTER_VALIDATE_EMAIL)){
					$arrError['mail'] = "Le format du mail n'est pas correct";
				}
				$strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
				if ($objUser->getPwd() == ""){
					$arrError['pwd'] = "Le mot de passe est obligatoire";
				}else if (!preg_match($strRegex, $objUser->getPwd())){
					$arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
				}else if($objUser->getPwd() != $strPwdConfirm){
					$arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
				}
				// Ajouter la vérification du mot de passe par regex
				
				// Si le formulaire est rempli correctement
				if (count($arrError) == 0){
					// => Ajout dans la base de données 
					$objUserModel	= new UserModel;
					//$intNbInsert 	= $objUserModel->insert($strName, $strFirstname, $strMail, $strPwd);
					$boolInsert 	= $objUserModel->insert($objUser);
					if ($boolInsert === true){
						$_SESSION['success'] 	= "Le compte a bien été créé";
						//header("Location:index.php");
						//exit;
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
					//var_dump("tout est ok");
				}
			}	
			
			include("views/create_account.php");
			include("views/_partial/footer.php");
		}
		
		/**
		* Page de connexion 
		*/
		public function login(){
			// Variables d'affichage
			$strH2		= "Me connecter";
			$strP		= "Connexion au site";
			// Variables technique
			$strPage	= "login";
			
			// inclusion du header
			include("views/_partial/header.php");
			
			// Traitement du formulaire
			//var_dump($_POST);
			$strMail 		= $_POST['mail']??"";
			$strPwd 		= $_POST['pwd']??"";
			
			// Tester le formulaire
			$arrError = [];
			if (count($_POST) > 0) {
				// Vérifier le formulaire
				if ($strMail == ""){
					$arrError['mail'] = "Le mail est obligatoire";
				}	
				if ($strPwd == ""){
					$arrError['pwd'] = "Le mot de passe est obligatoire";
				}
				
				// Si le formulaire est rempli correctement
				if (count($arrError) == 0){
					// Vérifier l'utilisateur en BDD
					$objUserModel 	= new UserModel;
					$arrResult 		= $objUserModel->verifUser($strMail, $strPwd);
					//var_dump($arrResult);
					if ($arrResult === false){ // Si la base de données ne renvoie rien
						$arrError[] = "Mail ou mot de passe invalide";
					}else{
						// Ajoute l'utilisateur en session
						/*$_SESSION['firstname']	= $arrResult['user_firstname'];
						$_SESSION['name']			= $arrResult['user_name'];
						$_SESSION['id']				= $arrResult['user_id'];*/
						// j'enlève le mot de passe avant la session
						//unset($arrResult['user_pwd']);
						$_SESSION['user']		= $arrResult;
						$_SESSION['success'] 	= "Bienvenue, vous êtes bien connecté";
						
						header("Location:index.php");
						exit;
						//var_dump($_SESSION);
						//var_dump("Connecté");
					}
				}
			}
			include("views/login.php");
			include("views/_partial/footer.php");
		}
		
		/**
		* Page de déconnexion
		*/
		public function logout(){
			//session_start();
			/*session_destroy();
			session_start();*/
			
			// on supprime l'utilisateur en session
			unset($_SESSION['user']);
			
			$_SESSION['success'] 	= "Vous êtes bien déconnecté";
			
			header("Location:index.php");
			exit;
		}
		
		
		/** 
		* Page modifier son compte
		*/
		public function edit_account(){
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:index.php?ctrl=error&action=error_403");
				exit;
			}
			
			echo "je suis la page de modification";
		}
	}