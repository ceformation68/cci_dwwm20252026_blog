<?php
	namespace Cricri\Blog\Entities; //< Création d'un espace de noms pour les entités
	
	use DateTime;
	
	/**
	* Classe d'un objet qui correspond à une demande de reset de Pwd
	* @author Mark
	*/
	class PasswordRequest extends Entity
	{
		private int $_creator; //< ID de l'utilsateur qui fait la requête
		private string $_token; //< Jeton unique pour reset le pwd
		private string $_expiresat; //< La date de fin de validité du jeton (+1 jour)
		
		/**
		* Constructeur
		*/
		public function __construct(){
			// Préfixe de la table pour hydratation
			$this->_prefixe = 'pwdreq_';
		}
		
		public function getCreator(): int
		{
			return $this->_creator;
		}
		
		public function setCreator(int $intCreator){
			$this->_creator = $intCreator;
		}
		
		
		/**
		* Récupération de la date de création
		* @return string la date de création de l'objet
		*/
		public function getExpiresat():string{
			return $this->_expiresat;
		}
		/**
		* Mise à jour de la date de création
		* @param string la nouvelle date de création
		*/
		public function setExpiresat(string $strCreatedate){
			$this->_expiresat = $strCreatedate;
		}	

		/**
		* Récupérer la date selon un format
		*/
		public function getDateFormat(string $strFormat = "fr_FR"){
			// Traiter l'affichage de la date
			$objDate	= new DateTime($this->_createdate);
			//$strDate	= $objDate->format("d/m/Y"); // en anglais
			
			// Version avec configuration pour l'avoir en français
			$objDateFormatter	= new IntlDateFormatter(
                $strFormat, // langue
                IntlDateFormatter::LONG,  // format de date
                IntlDateFormatter::NONE, // format heure
            );
			$strDate	= $objDateFormatter->format($objDate);
			return $strDate;
		}
		
		public function getToken(): string
		{
			return $this->_token;
		}
		
		public function setToken(string $strToken): void
		{
			$this->_token = $strToken;
		}
	}