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
			// Afficher
			$this->_display("about");
		}
		
		/** 
		* Page contact 
		*/
		public function contact(){
			// Afficher
			$this->_display("contact");
		}
		
		/** 
		* Page mentions légales 
		*/
		public function mentions(){
			// Afficher
			$this->_display("mentions");
		}
				
		
	}