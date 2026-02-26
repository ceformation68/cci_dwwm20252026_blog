<?php

	use Smarty\Smarty;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
	
	class MotherCtrl {
		
		protected array $_arrData = array(); // ou = []
		protected object $_objMail;
		
		/**
		* Constructeur 
		*/
		public function __construct(){
			$this->_objMail = new PHPMailer(); // Nouvel objet Mail
		}
		
		/** 
		* Méthode d'affichage des pages 
		* @param string $strView le template à afficher
		* @param bool $boolDisplay par défaut true est-ce que j'affiche la vue ?
		*/
		protected function _display(string $strView, bool $boolDisplay = true){
			// Création de l'objet Smarty
			$objSmarty	= new Smarty();
			// Ajouter le var_dump au modificateur de smarty : vardump est le nom appelé après le |
			$objSmarty->registerPlugin('modifier', 'vardump', 'var_dump');
			$objSmarty->registerPlugin('modifier', 'is_null', 'is_null');

			// Récupérer les variables
			foreach($this->_arrData as $key=>$value){
				//$$key = $value;
				$objSmarty->assign($key, $value);
			}
			// Message de succès
			$objSmarty->assign("success_message", $_SESSION['success']??'');
			unset($_SESSION['success']);
			// Message d'erreur en session
			if (isset($_SESSION['error'])){
				$objSmarty->assign("arrError", array($_SESSION['error']));
				unset($_SESSION['error']);
			}
			
			if ($boolDisplay){
				$objSmarty->display("views/".$strView.".tpl");
			}else{
				return $objSmarty->fetch("views/".$strView.".tpl");
			}
			
			// inclusion du header
			/*include("views/_partial/header.php");
			include("views/".$strView.".php");
			include("views/_partial/footer.php");*/
		}
		
		
		/** 
		* Générer et stocker le token CSRF dans la session avec une expiration
		* @return string $token le jeton généré
		*/
		protected function _generateCsrfToken():string {
			$token = bin2hex(random_bytes(32)); // Génère un token aléatoire
			$_SESSION['csrf_token'] = $token;
			// Définir une expiration (par exemple, 30 minutes à partir de maintenant)
			$_SESSION['csrf_token_expiration'] = time() + (30 * 60); // 30 minutes en secondes
			return $token;
		}
		
		/**
		* Vérifier le token CSRF et son expiration
		* @param string $token Le token à vérifier
		* @return boolean le token est ok ou pas
		*/
		protected function _verifyCsrfToken(string $token):bool {
			if ($_ENV['CSRF_TOKEN'] == 1){
				return isset($_SESSION['csrf_token'])
					&& $_SESSION['csrf_token'] === $token
					&& isset($_SESSION['csrf_token_expiration'])
					&& $_SESSION['csrf_token_expiration'] >= time(); // Vérifie si le token n'a pas expiré
			}else{
				return true;
			}
		}

		
		/** 
		* Envoyer le mail
		* 
		*/
		protected function _sendMail(){
			//$this->_objMail 			= new PHPMailer(); // Nouvel objet Mail
			$this->_objMail->IsSMTP();
			$this->_objMail->Mailer 	= "smtp";
			$this->_objMail->CharSet	= PHPMailer::CHARSET_UTF8;

			// Si on veut afficher les messages de debug
			$this->_objMail->SMTPDebug  = 0;

			// Connection au serveur de mail
			$this->_objMail->SMTPAuth   	= TRUE;
			$this->_objMail->SMTPSecure 	= "tls";
			$this->_objMail->Port       	= 587;
			$this->_objMail->Host       	= "smtp.gmail.com";
			$this->_objMail->Username 		= 'christel.ceformation@gmail.com';
			$this->_objMail->Password 		= 'cdbk mrjr aiqo tndi';

			// Comment envoyer le mail
			$this->_objMail->IsHTML(true); // en HTML
			$this->_objMail->setFrom('no-reply@blog.fr', 'Mon BLOG'); // Expéditeur

			// Envoyer le mail
			$this->_objMail->Send();
		}



	}