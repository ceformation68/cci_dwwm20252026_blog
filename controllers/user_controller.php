<?php
	require("models/user_model.php");
	require("entities/user_entity.php");
	
	/** 
	* Le contrôleur des utilisateurs
	* @author Christel
	*/
	class UserCtrl extends MotherCtrl{
		
		/** 
		* Page de création d'un compte
		*/
		public function create_account(){
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
				// Fonction commune de vérification des infos utilisateur + mdp
				$arrError	= array_merge($this->_verifInfos($objUser), 
										  $this->_verifPwd($objUser, $strPwdConfirm));
				
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
			
			$this->_arrData['arrError'] = $arrError;
			$this->_arrData['objUser'] 	= $objUser;
			// Afficher
			$this->_display("create_account");
		}
		
		/**
		* Page de connexion 
		*/
		public function login(){
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
			
			$this->_arrData['arrError'] = $arrError;
			$this->_arrData['strMail'] 	= $strMail;
			// Afficher
			$this->_display("login");
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
			
			// Récupérer l'utilisateur à partir de la fonction findUser dans user_model
			$objUserModel	= new UserModel;
			$arrUser		= $objUserModel->findUser($_SESSION['user']['user_id']);
			
			// Création d'un objet User et hydratation avec les infos BDD
			$objUser	= new User;
			$objUser->hydrate($arrUser);
			
			$arrError = [];
			if (count($_POST) > 0) {
				$objUser->hydrate($_POST); // Mise à jour en fonction du formulaire
				// Fonction commune de vérification des infos utilisateur
				$arrError	= $this->_verifInfos($objUser);
				// Traitement du mot de passe, si renseigné
				if ($objUser->getPwd() != ""){
					$strPwdConfirm	= $_POST['pwd_confirm'];
					$arrError		= array_merge($arrError, $this->_verifPwd($objUser, $strPwdConfirm));
				}

				// Si le formulaire est rempli correctement
				if (count($arrError) == 0){
					// Mise à jour des infos de l'utilisateur
					$boolUpdate 	= $objUserModel->update($objUser);
					// Si mise à jour ok et pwd => Mise à jour du mot de passe
					if ($boolUpdate === true && $objUser->getPwd() != ""){
						$boolUpdate 	= $objUserModel->updatePwd($objUser);
					}
					// Si tout ok
					if ($boolUpdate === true){
						// Mise à jour des infos en session (nom et prénom)
						$_SESSION['user']['user_name']		= $objUser->getName();
						$_SESSION['user']['user_firstname']	= $objUser->getFirstname();
						$_SESSION['success'] 	= "Le compte a bien été modifié";
						header("Location:index.php");
						exit;
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
				}
			}
			
			// Afficher
			$this->_arrData['arrError'] = $arrError;
			$this->_arrData['objUser'] 	= $objUser;
			$this->_display("edit_account");
			//echo "je suis la page de modification";
		}
		
		/**
		* Méthode permettant de vérifier les informations de l'utilisateur
		* @param object $objUser L'utilisateur à vérifier
		* @return array Le tableau des erreurs
		*/
		private function _verifInfos(object $objUser):array{
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
			
			return $arrError??array();			
		}
		
		/**
		* Méthode permettant de vérifier le mot de passe de l'utilisateur
		* @param object $objUser L'utilisateur à vérifier
		* @param string $strPwdConfirm Confirmation du mot de passe
		* @return array Le tableau des erreurs
		*/
		private function _verifPwd(object $objUser, string $strPwdConfirm):array{
			$strRegex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{16,}$/";
			if ($objUser->getPwd() == ""){
				$arrError['pwd'] = "Le mot de passe est obligatoire";
			}else if (!preg_match($strRegex, $objUser->getPwd())){
				$arrError['pwd'] = "Le mot de passe ne correspond pas aux règles";
			}else if($objUser->getPwd() != $strPwdConfirm){
				$arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
			}
			
			return $arrError??array();			
		}
	}