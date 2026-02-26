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
			$strPwdConfirm	= $_POST['pwd_confirm']??"";
			
			$objUser	= new User;
			$objUser->hydrate($_POST);

			// Tester le formulaire
			$arrError = [];
			if (count($_POST) > 0) {
				// Vérification du token du formulaire à l'aide de la fonction
				if (!$this->_verifyCsrfToken($_POST['crsf_token'])){
					// Si le token n'est pas valide (mauvais, inexistant ou expiré)
					header("Location:".$_ENV['BASE_URL']."error/error_403");
					exit;					
				}
				
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
						header("Location:".$_ENV['BASE_URL']);
						exit;
					}else{
						$arrError[] = "Erreur lors de l'ajout";
					}
					//var_dump("tout est ok");
				}
			}	
			$this->_arrData['arrError'] 	= $arrError;
			$this->_arrData['objUser'] 		= $objUser;

			// Token généré (en session) et passé dans la vue pour affichage
			$this->_arrData['form_token']	= $this->_generateCsrfToken();

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
						
						header("Location:".$_ENV['BASE_URL']);
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
			
			header("Location:".$_ENV['BASE_URL']);
			exit;
		}
		
		
		/** 
		* Page modifier son compte
		*/
		public function edit_account(){
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:".$_ENV['BASE_URL']."error/error_403");
				exit;
			}
			
			// Récupérer l'utilisateur à partir de la fonction findUser dans user_model
			$objUserModel	= new UserModel;
			$arrUser		= $objUserModel->findUser($_GET['id']??$_SESSION['user']['user_id']);
			
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
						// Mise à jour des infos en session (nom et prénom) - si utilisateur en cours
						//if ((isset($_GET['id']) && ($_GET['id'] == $_SESSION['user']['user_id'])){
						if (!isset($_GET['id'])){
							$_SESSION['user']['user_name']		= $objUser->getName();
							$_SESSION['user']['user_firstname']	= $objUser->getFirstname();
							// Mise à jour du pseudo
							$strPseudo = $_POST['pseudo'];
							setcookie('pseudo', $strPseudo, 
										array(	'expires' => time()+15*60,
												'secure' => true,
												'httponly' => true,
												'samesite' => 'Strict',
												'path'=>$_ENV['COOKIE_PATH'])
										);
						}
						$_SESSION['success'] 	= "Le compte a bien été modifié";
						if (!isset($_GET['id'])){
							header("Location:".$_ENV['BASE_URL']);
						}else{
							header("Location:".$_ENV['BASE_URL']."user/user_list");
						}
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
		* Page de gestion des utilisateurs
		*/
		public function user_list(){
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:".$_ENV['BASE_URL']."error/error_403");
				exit;
			}
			
			// Récupération des articles 
			$objUserModel 	= new UserModel;
			$arrUsers 		= $objUserModel->findAllUsers();
			
			// Initialisation d'un tableau => objets
			$arrUserToDisplay	= array(); 
			// Boucle de transformation du tableau de tableau en tableau d'objets
			foreach($arrUsers as $arrDetUser){
				$objUser = new User;
				$objUser->hydrate($arrDetUser);
				
				$arrUserToDisplay[]	= $objUser;
			}
			// Donner arrUsersToDisplay à maman pour l'affichage
			$this->_arrData['arrUserToDisplay']	= $arrUserToDisplay;
			
			$this->_display("user_list");
		}
		
		
		/**
		* 'Page' de suppression
		*/
		public function delete(){
			if (!isset($_SESSION['user'])){ // Pas d'utilisateur connecté
				header("Location:".$_ENV['BASE_URL']."error/error_403");
				exit;
			}

			// Ne pas se supprimer soi-même
			if ($_GET['id'] == $_SESSION['user']['user_id']){
				$_SESSION['error'] 	= "Vous ne pouvez pas vous supprimer vous-même";
				header("Location:".$_ENV['BASE_URL']."user/user_list");
				exit;
			}

			// Possibilité de vérifier l'existance de l'utilisateur
			
			// Appeler la méthode de supression dans le modèle
			$objUserModel	= new UserModel;
			$boolDelete		= $objUserModel->delete_soft($_GET['id']);
			
			if ($boolDelete){
				$_SESSION['success'] 	= "Le compte a bien été supprimé";
			}else{
				$_SESSION['error'] 		= "Erreur lors de la suppression";
			}
			
			header("Location:".$_ENV['BASE_URL']."user/user_list");
			exit;
			
		}
		
		/**
		* Page "Mot de passe oublié
		*/
		public function forgot_pwd(){
			
			if (count($_POST) >0) {
				$strMail 	= $_POST['mail'];
				
				$objModel	= new UserModel();
				$arrUser 	= $objModel->findUserByMail($strMail);
				
				if ($arrUser !== false){
					$strToken 	= bin2hex(random_bytes(64)); // Génère un token aléatoire
					$boolOk		= $objModel->updateForgotInfos($strToken, $arrUser['user_id']);
					if ($boolOk){
						// Destinataire(s)
						$this->_objMail->addAddress($arrUser['user_mail'], $arrUser['user_name'].' '.$arrUser['user_firstname']);

						// Mail
						$this->_objMail->Subject    = "Mot de passe oublié";
				
						$this->_arrData['token'] = $strToken;
						$this->_objMail->Body      	= $this->_display("mails/mail_forgot_pwd", false);
						
						$this->_sendMail();
					}
				}
				// A mettre après l'nvoi de mail, car sinon unset par la mère sur le display précédent
				$_SESSION['success'] = "Si vous êtes inscrit sur notre site, vous allez recevoir un mail contenant un lien pour redéfinir votre mot de passe.";
			}
			
			$this->_display("forgot_pwd");
		}
		
		/**
		* Page de modification du mot de passe si oublié
		*/
		public function recover_pwd(){
			$objModel	= new UserModel();
			$arrUser 	= $objModel->findUserByToken($_GET['token']);
			$arrError	= array();
			if (count($_POST) > 0){
				$objUser 	= new User();
				$objUser->setPwd($_POST['pwd']);
				$objUser->setId($arrUser['user_id']);
				$arrError 	= $this->_verifPwd($objUser, $_POST['confirm_pwd']);
				if (count($arrError) == 0){
					$boolOk	= $objModel->updatePwd($objUser);
					if ($boolOk){
						$_SESSION['success'] = "Votre mot de passe a bien été changé";
						header("Location:".$_ENV['BASE_URL']."user/login");
						exit;
					}else{
						$arrError[]	= "Erreur lors du changement de mot de passe.";
					}
				}
			}			
			
			$this->_arrData['arrError']	= $arrError;
			$this->_arrData['arrUser']	= $arrUser;
			
			$this->_display("recover_pwd");
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