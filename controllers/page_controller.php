<?php

	/** 
	* Le contrôleur des pages
	* @author Christel
	*/
	class PageCtrl{
		
		/**
		* Page A propos
		*/
		public function about(){
			// Variables d'affichage
			$strH2	= "À propos";
			$strP	= "Découvrez notre histoire, notre équipe et notre passion pour le développement web";
			// Variables technique
			$strPage	= "about";

			// inclusion du header
			include("views/_partial/header.php");
			include("views/about.php");
			include("views/_partial/footer.php");
		}
		
		
		/** 
		* Page contact 
		*/
		public function contact(){
			// Variables d'affichage
			$strH2		= "Contact";
			$strP		= "Contactez-nous pour toute question";
			// Variables technique
			$strPage	= "contact";
			
			// inclusion du header
			include("views/_partial/header.php");
			include("views/contact.php");
			include("views/_partial/footer.php");
		}
		
		/** 
		* Page mentions légales 
		*/
		public function mentions(){
			// Variables d'affichage
			$strH2		= "Mentions légales";
			$strP		= "Informations légales et politique de confidentialité";
			// Variables technique
			$strPage	= "mentions";			

			// inclusion du header
			include("views/_partial/header.php");
			include("views/mentions.php");
			include("views/_partial/footer.php");
		}
				
		
	}