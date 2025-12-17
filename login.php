<?php
	// Variables d'affichage
	$strH2		= "Me connecter";
	$strP		= "Connexion au site";
	// Variables technique
	$strPage	= "login";
	
	// inclusion du header
	include("_partial/header.php");
	
	// Traitement du formulaire
	//var_dump($_POST);
	$strMail 		= $_POST['mail']??"";
	$strPwd 		= $_POST['pwd']??"";
	
	// Tester le formulaire
	$arrError = [];
	if (count($_POST) > 0) {
		// Vérifier le formulaire
		if ($strMail == ""){
			$arrError['mail'] = "Le mail est obligatoire";
		}	
		if ($strPwd == ""){
			$arrError['pwd'] = "Le mot de passe est obligatoire";
		}
		
		// Si le formulaire est rempli correctement
		if (count($arrError) == 0){
			// Vérifier l'utilisateur en BDD
			// 1. Etablir la connexion
			try{
				// Connexion à la base de données
				$db= new PDO(
								"mysql:host=localhost;dbname=blog_php", // Serveur et BDD
								"root", //Nom d'utilisateur de la base de données
								"",// Mot de passe de la base de données
								array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC) // Mode de renvoi
				);
				// Pour résoudre les problèmes d’encodage
				$db->exec("SET CHARACTER SET utf8");
				// Configuration des exceptions
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
			} catch(PDOException$e) {
				echo "Échec : " . $e->getMessage();
			}
			// 2. Construire la requête
			$strRq	= "SELECT * FROM users
						WHERE user_mail = '".$strMail."' AND user_pwd = '".$strPwd."'";
			var_dump($strRq);
			// 3. Executer la requête et récupérer les résultats
			$arrResult = $db->query($strRq)->fetch();
			if ($arrResult === false){ // Si la base de données ne renvoie rien
				$arrError[] = "Mail ou mot de passe invalide";
			}else{
				var_dump("Connecté");
			}
		}
	}	
?>
<section aria-label="Se connecter">
	<?php if (count($arrError) > 0) {?>
		<div class="alert alert-danger">
		<?php foreach ($arrError as $strError){ ?>
			<p><?php echo $strError; ?></p>
		<?php }	?>
		</div>
	<?php } ?>
	<form method="post">
		<p>
			<label>Mail:</label>
			<input name="mail" value="<?php echo($strMail); ?>" 
				class="form-control <?php if (isset($arrError['mail'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control <?php if (isset($arrError['pwd'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>
<?php 
	include("_partial/footer.php");
			