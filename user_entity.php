<?php
	class User{
		// Attributs 
		private string $_name;
		private string $_firstname;
		private string $_mail;
		private string $_pwd;	
		
		
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
		
		// Méthodes 
		private function nettoyer(string $strText){
			$strText	= trim($strText);
			$strText	= str_replace("<script>", "", $strText);
			$strText	= str_replace("</script>", "", $strText);
			return $strText;
		}
		
		
		
	}