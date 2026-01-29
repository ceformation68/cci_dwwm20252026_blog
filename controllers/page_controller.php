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
			$this->_arrData['strPage'] 	= "about";
			// Afficher
			$this->_display("about");
		}
		
		/** 
		* Page contact 
		*/
		public function contact(){
			// Variables technique
			$this->_arrData['strPage']	= "contact";
			// Afficher
			$this->_display("contact");
		}
		
		/** 
		* Page mentions légales 
		*/
		public function mentions(){
			// Variables technique
			$this->_arrData['strPage']	= "mentions";			
			// Afficher
			$this->_display("mentions");
		}
				
		
	}