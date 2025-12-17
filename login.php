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
			require_once("connexion.php");
			// 2. Construire la requête
			$strRq	= "SELECT user_id, user_name, user_firstname, user_pwd
						FROM users
						WHERE user_mail = '".$strMail."' AND user_pwd = '".$strPwd."'";
			//var_dump($strRq);
			// 3. Executer la requête et récupérer les résultats
			$arrResult = $db->query($strRq)->fetch();
			//var_dump($arrResult);
			if ($arrResult === false){ // Si la base de données ne renvoie rien
				$arrError[] = "Mail ou mot de passe invalide";
			}else{
				// Ajoute l'utilisateur en session
				/*$_SESSION['firstname']	= $arrResult['user_firstname'];
				$_SESSION['name']			= $arrResult['user_name'];
				$_SESSION['id']				= $arrResult['user_id'];*/
				// j'enlève le mot de passe avant la session
				unset($arrResult['user_pwd']);
				$_SESSION['user']		= $arrResult;
				$_SESSION['success'] 	= "Bienvenue, vous êtes bien connecté";
				
				header("Location:index.php");
				exit;
				//var_dump($_SESSION);
				//var_dump("Connecté");
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
			