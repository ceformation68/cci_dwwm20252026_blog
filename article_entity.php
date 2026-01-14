<?php
	require_once("mother_entity.php");
	
	/**
	* Classe d'un objet Article
	* @author Christel
	*/
	class Article extends Entity{
		// Attributs 
		private string $_title;
		private string $_img;
		private string $_content;
		private string $_createdate;
		private int $_creator;
		private string $_creatorname;
		
		// Méthodes - getters et setters

		/**
		* Récupération du titre
		* @return string le titre de l'objet
		*/
		public function getTitle():string{
			return $this->_title;
		}
		/**
		* Mise à jour du titre
		* @param string le nouveau titre
		*/
		public function setTitle(string $strTitle){
			$this->_title = $this->nettoyer($strTitle);
		}
		
		/**
		* Récupération de l'image
		* @return string l'image de l'objet
		*/
		public function getImg():string{
			return $this->_img;
		}
		/**
		* Mise à jour de l'image
		* @param string la nouvelle image
		*/
		public function setImg(string $strImg){
			$this->_img = $strImg;
		}
		
		/**
		* Récupération du contenu
		* @return string le contenu de l'objet
		*/
		public function getContent():string{
			return $this->_name;
		}
		/**
		* Mise à jour du contenu
		* @param string le nouveau contenu
		*/
		public function setContent(string $strContent){
			$this->_content = $this->nettoyer($strContent);
		}
		
		/** 
		* Récupérer le résumé du contenu 
		* @return string le résumé du contenu
		*/
		public function getSummary(int $intNbCar = 70):string{
			return mb_strimwidth($this->_content, 0, $intNbCar, "...");
		}
		
		/**
		* Récupération de la date de création
		* @return string la date de création de l'objet
		*/
		public function getCreatedate():string{
			return $this->_createdate;
		}
		/**
		* Mise à jour de la date de création
		* @param string la nouvelle date de création
		*/
		public function setCreatedate(string $strCreatedate){
			$this->_createdate = $strCreatedate;
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
		
		/**
		* Récupération de l'identifiant du créateur
		* @return int l'identifiant du créateur de l'objet
		*/
		public function getCreator():int{
			return $this->_creator;
		}
		/**
		* Mise à jour de l'identifiant du créateur
		* @param int le nouvel identifiant du créateur
		*/
		public function setCreator(int $intCreator){
			$this->_creator = $intCreator;
		}		
		
		/**
		* Récupération du nom du créateur
		* @return string le nom du créateur de l'objet
		*/
		public function getCreatorname():string{
			return $this->_creatorname;
		}
		/**
		* Mise à jour du nom du créateur
		* @param string le nouveau nom du créateur
		*/
		public function setCreatorname(string $strCreatorname){
			$this->_creatorname = $strCreatorname;
		}	
		
	}