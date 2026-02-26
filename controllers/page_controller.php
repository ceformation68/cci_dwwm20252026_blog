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

            if (count($_POST)>0){
                // Destinataire(s)
                $this->_objMail->addAddress('contact@ce-formation.com', 'Christel');

                // Mail
                $this->_objMail->Subject    = "Contact Form";
				
				$this->_arrData['strName'] 	= $_POST['name']??'';
                $this->_objMail->Body   	= $this->_display("mails/mail_message", false);

                // Envoyer le mail
                $this->_sendMail();
            }
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