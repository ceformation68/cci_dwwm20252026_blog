<?php
	/** 
	* Le contrôleur des erreurs
	* @author Christel
	*/
	class ErrorCtrl extends MotherCtrl{
		
		/**
		* Page erreur 404
		*/
		public function error_404(){
			// Afficher
			$this->_display("error_404");
		}
		
		/**
		* Page erreur 403
		*/
		public function error_403(){
			// Afficher
			$this->_display("error_403");
		}
		
	}