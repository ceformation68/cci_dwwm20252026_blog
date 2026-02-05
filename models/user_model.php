<?php
	require_once("mother_model.php");

	/**
	* Traitement des requêtes pour les utilisateurs
	* @author : Christel
	* @version : V0.5
	* ALTER TABLE users ADD COLUMN user_created_at DATETIME NULL;
	* ALTER TABLE users ADD COLUMN user_updated_at DATETIME NULL;
	*/
	class UserModel extends Connect{
		// Attributs
		
		
		// Méthodes
		public function __construct(){
			parent::__construct();
		}

        /**
		 * Fonction qui permet de récupérer tous les utilisateurs
         * @return array
         */
		public function findAllUsers():array{
			// Ecrire la requête
			$strRq	= "SELECT user_id, user_firstname, user_name
						FROM users 
						WHERE user_deleted_at IS NULL";
			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetchAll();
		}

        /**
		 * Fonciton qui vérifie l'utilisateur en BDD pour login
         * @param string $strMail
         * @param string $strPwd
         * @return array|bool
         */
		public function verifUser(string $strMail, string $strPwd):array|bool{
			// 2. Construire la requête
			$strRq	= "SELECT user_id, user_name, user_firstname, user_pwd
						FROM users
						WHERE user_mail = '".$strMail."'
							AND user_deleted_at IS NULL";
			// Récupère mon utilisateur
			// Executer la requête et récupérer les résultats
			$arrUser 	= $this->_db->query($strRq)->fetch();
			// Vérification du mot de passe haché
			if ($arrUser !== false && password_verify($strPwd, $arrUser['user_pwd'])){
				// Renvoi l'utilisateur 
				unset($arrUser['user_pwd']); // on enlève le pwd
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
			$strRq 	= "INSERT INTO users (user_name, user_firstname, user_mail, user_pwd, user_created_at)
						VALUES (:name, :firstname, :mail, :pwd, NOW())";
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
		
		
        /**
		 * Fonction qui permet de récupérer un utilisateur en fonction de son identifiant
		 * @param int intId L'identifiant de l'utilisateur à chercher
         * @return array
         */
		public function findUser(int $intId):array{
			// Ecrire la requête
			$strRq	= "SELECT user_id, user_firstname, user_name, user_mail
						FROM users 
						WHERE user_id = ".$intId."
							AND user_deleted_at IS NULL";
			// Lancer la requête et récupérer les résultats
			return $this->_db->query($strRq)->fetch();
		}


		/**
		* Fonction de mise à jour d'un utilisateur en BDD
		* @param object $objUser L'objet utilisateur
		* @return bool Est-ce que la requête s'est bien passée (true/false)
		*/
		public function update(object $objUser):bool{
			// Construire la requête
			$strRq 	= "UPDATE users 
						SET user_name = :name, 
							user_firstname = :firstname, 
							user_mail = :mail,
							user_updated_at = NOW()
						WHERE user_id = :id";
			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);
			// Donne les informations
			$rqPrep->bindValue(":name", $objUser->getName(), PDO::PARAM_STR);
			$rqPrep->bindValue(":firstname", $objUser->getFirstname(), PDO::PARAM_STR);
			$rqPrep->bindValue(":mail", $objUser->getMail(), PDO::PARAM_STR);
			$rqPrep->bindValue(":id", $objUser->getId(), PDO::PARAM_INT);

			// Executer la requête
			return $rqPrep->execute();
		}
		
		/**
		* Fonction de mise à jour du mot de passe d'un utilisateur en BDD
		* @param object $objUser L'objet utilisateur
		* @return bool Est-ce que la requête s'est bien passée (true/false)
		*/
		public function updatePwd(object $objUser):bool{
			// Construire la requête
			$strRq 	= "UPDATE users 
						SET user_pwd = :pwd
						WHERE user_id = :id";
			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);
			// Donne les informations
			$rqPrep->bindValue(":pwd", $objUser->getPwdHash(), PDO::PARAM_STR);
			$rqPrep->bindValue(":id", $objUser->getId(), PDO::PARAM_INT);

			// Executer la requête
			return $rqPrep->execute();
		}
		
		
		/**
		* Fonction permettant de supprimer définitivement un utilisateur
		* @param int $intId L'identifiant de l'utilisateur
		* @return bool Suppression ok ou pas
		*/
		public function delete(int $intId):bool{
			// Construire la requête
			$strRq 	= "DELETE FROM users 
						WHERE user_id = :id";
			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);
			// Donne les informations
			$rqPrep->bindValue(":id", $intId, PDO::PARAM_INT);

			// Executer la requête
			return $rqPrep->execute();
		}
		
		/**
		* Fonction permettant de supprimer un utilisateur avec une date de suppression
		* Attention prévoir le champ : 
		* ALTER TABLE users ADD COLUMN user_deleted_at DATETIME NULL;
		* @param int $intId L'identifiant de l'utilisateur
		* @return bool Suppression ok ou pas
		*/
		public function delete_soft(int $intId):bool{
			// Construire la requête
			$strRq 	= "UPDATE users 
						SET user_deleted_at = NOW()
						WHERE user_id = :id";
			// Préparer la requête
			$rqPrep	= $this->_db->prepare($strRq);
			// Donne les informations
			$rqPrep->bindValue(":id", $intId, PDO::PARAM_INT);

			// Executer la requête
			return $rqPrep->execute();
		}		
		
	}