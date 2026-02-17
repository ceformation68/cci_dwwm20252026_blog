<?php
	namespace Cricri\Blog\Controllers;
	
	/** 
	* Le contrôleur de gestion du mot de passe oublié
	* @author Mark
	*/
	class PasswordCtrl extends MotherCtrl 
	{
		/**
		* La méthode/route qui génère le mail/URL de réinitialisation
		*/
		function request_reset()
		{
			// Afficher le formulaire de reset
			$this->_display("request_pwd");
		}
		
		/**
		* La méthode qui correspond à l'URL du lien 
		* dans le mail pour définir un nouveau mot de passe
		*/
		function validate_reset()
		{
			
		}
	}
