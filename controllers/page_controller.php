<?php
	/** 
	* Le contrôleur des pages
	* @author Christel
	*/
	class PageCtrl extends MotherCtrl{
		
		/**
		* Page A propos
		*/
		public function about(){
			// Rempli le tableau des variables pour donner à maman
			$this->_arrData['strH2'] 	= "À propos";
			$this->_arrData['strPage'] 	= "about";
			$this->_arrData['strP'] 	= "Découvrez notre histoire, notre équipe et notre passion pour le développement web";
			// Afficher
			$this->_display("about");
		}
		
		/** 
		* Page contact 
		*/
		public function contact(){
			// Variables d'affichage
			$this->_arrData['strH2']	= "Contact";
			$this->_arrData['strP']		= "Contactez-nous pour toute question";
			// Variables technique
			$this->_arrData['strPage']	= "contact";
			// Afficher
			$this->_display("contact");
		}
		
		/** 
		* Page mentions légales 
		*/
		public function mentions(){
			// Variables d'affichage
			$this->_arrData['strH2']	= "Mentions légales";
			$this->_arrData['strP']		= "Informations légales et politique de confidentialité";
			// Variables technique
			$this->_arrData['strPage']	= "mentions";			
			// Afficher
			$this->_display("mentions");
		}
				
		
	}