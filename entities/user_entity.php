<?php
	require_once("mother_entity.php");
	
	class User extends Entity{
		// Attributs 
		private string $_name = '';
		private string $_firstname = '';
		private string $_mail = '';
		private string $_pwd;	
		
		/**
		* Constructeur
		*/
		public function __construct(){
			// Préfixe de la table pour hydratation
			$this->_prefixe = 'user_';
		}
		
		// Méthodes - getters et setters
		public function getName():string{
			return $this->_name;
		}
		public function setName(string $strNewName){
			$this->_name = $this->nettoyer($strNewName);
		}
		public function getFirstname():string{
			return $this->_firstname;
		}
		public function setFirstname(string $strFirstname){
			$this->_firstname = $this->nettoyer($strFirstname);
		}
		public function getMail():string{
			return $this->_mail;
		}
		public function setMail(string $strMail){
			$this->_mail = strtolower($this->nettoyer($strMail));
		}
		public function getPwd():string{
			return $this->_pwd;
		}
		public function getPwdHash():string{
			return password_hash($this->_pwd, PASSWORD_DEFAULT);
		}
		public function setPwd(string $strPwd){
			$this->_pwd = $strPwd;
		}		
		
		
		
		
	}