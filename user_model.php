<?php
	require_once("connexion.php");

	/**
	* Traitement des requêtes pour les utilisateurs
	* @author : Christel
	* @version : V0.5
	*/
	class UserModel extends Connect{
		// Attributs
		
		
		// Méthodes
		public function __construct(){
			parent::__construct();
		}

        /**
         * @return array
         */
		public function findAllUsers():array{
			// Ecrire la requête
			$strRq	= "SELECT user_id, user_firstname, user_name
						FROM users ";
			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetchAll();
		}

        /**
         * @param string $strMail
         * @param string $strPwd
         * @return array|bool
         */
		public function verifUser(string $strMail, string $strPwd):array|bool{
			// 2. Construire la requête
			$strRq	= "SELECT user_id, user_name, user_firstname, user_pwd
						FROM users
						WHERE user_mail = '".$strMail."'";
			// Récupère mon utilisateur
			// Executer la requête et récupérer les résultats
			$arrUser 	= $this->_db->query($strRq)->fetch();
			// Vérification du mot de passe haché
			if (password_verify($strPwd, $arrUser['user_pwd'])){
				// Renvoi l'utilisateur 
				unset($arrResult['user_pwd']); // on enlève le pwd
				return $arrUser;
			}else{
				return false;
			}
		}
		
		//public function insert(string $strName, string $strFirstname, string $strMail, string $strPwd):int{
		/**
		* Fonction d'insertion d'un utilisateur en BDD
		* @param object $objUser L'objet utilisateur
		* @return bool Est-ce que la requête s'est bien passée (true/false)
		*/
		public function insert(object $objUser):bool{

			// 2. Construire la requête
			/*$strRq	= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd)
						VALUES ('".$objUser->getName()."', 
								'".$objUser->getFirstname()."', 
								'".$objUser->getMail()."', 
								'".$objUser->getPwdHash()."')";*/
			$strRq 	= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd)
						VALUES (:name, :firstname, :mail, :pwd)";
			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);
			// Donne les informations
			$rqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
			$rqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
			$rqPrep->bindValue(":mail", $objUser->getMail(), PDO::PARAM_STR);
			$rqPrep->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);

			// 3. Executer la requête
			//var_dump($strRq);die;
			//return $db->exec($strRq);
			return $rqPrep->execute();
		}
	}