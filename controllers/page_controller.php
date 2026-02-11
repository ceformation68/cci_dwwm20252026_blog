<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

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
                $objMail = new PHPMailer(); // Nouvel objet Mail
                $objMail->IsSMTP();
                $objMail->Mailer 		= "smtp";
                $objMail->CharSet 		= PHPMailer::CHARSET_UTF8;

                // Si on veut afficher les messages de debug
                $objMail->SMTPDebug  	= 0;

                // Connection au serveur de mail
                $objMail->SMTPAuth   	= TRUE;
                $objMail->SMTPSecure 	= "tls";
                $objMail->Port       	= 587;
                $objMail->Host       	= "smtp.gmail.com";
                $objMail->Username 		= 'christel.ceformation@gmail.com';
                $objMail->Password 		= 'cdbk mrjr aiqo tndi';

                // Comment envoyer le mail
                $objMail->IsHTML(true); // en HTML
                $objMail->setFrom('no-reply@blog.fr', 'Mon BLOG'); // Expéditeur

                // Destinataire(s)
                $objMail->addAddress('contact@ce-formation.com', 'Christel');

                // Mail
                $objMail->Subject    = "Contact Form";
				
				$this->_arrData['strName'] = $_POST['name']??'';
                $objMail->Body       = $this->_display("mail_message", false);

                // Envoyer le mail
                $objMail->Send();
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