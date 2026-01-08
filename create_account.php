<?php
	// Variables d'affichage
	$strH2		= "Créer un compte";
	$strP		= "Inscrivez-vous";
	// Variables technique
	$strPage	= "create_account";
	
	// inclusion du header
	include("_partial/header.php");
	
	// Traitement du formulaire
	//var_dump($_POST);
	$strName 		= $_POST['name']??"";
	$strFirstname 	= $_POST['firstname']??"";
	$strMail 		= $_POST['mail']??"";
	$strPwd 		= $_POST['pwd']??"";
	$strPwdConfirm	= $_POST['pwd_confirm']??"";
	
	// Tester le formulaire
	$arrError = [];
	if (count($_POST) > 0) {
		if ($strName == ""){
			$arrError['name'] = "Le nom est obligatoire";
		}	
		if ($strFirstname == ""){
			$arrError['firstname'] = "Le prénom est obligatoire";
		}	
		if ($strMail == ""){
			$arrError['mail'] = "Le mail est obligatoire";
		}	
		if ($strPwd == ""){
			$arrError['pwd'] = "Le mot de passe est obligatoire";
		}else if($strPwd != $strPwdConfirm){
			$arrError['pwd_confirm'] = "Le mot de passe et sa confirmation ne sont pas identiques";
		}
		
		// Si le formulaire est rempli correctement
		if (count($arrError) == 0){
			// => Ajout dans la base de données 
			require("user_model.php");
			$intNbInsert = insert($strName, $strFirstname, $strMail, $strPwd);
			if ($intNbInsert === 1){
				$_SESSION['success'] 	= "Le compte a bien été créé";
				header("Location:index.php");
				exit;
			}else{
				$arrError[] = "Erreur lors de l'ajout";
			}
			//var_dump("tout est ok");
		}
	}	
?>
<section aria-label="Créer un compte">
	<?php if (count($arrError) > 0) {?>
		<div class="alert alert-danger">
		<?php foreach ($arrError as $strError){ ?>
			<p><?php echo $strError; ?></p>
		<?php }	?>
		</div>
	<?php } ?>
	<form method="post">
		<p>
			<label>Nom:</label>
			<input name="name" value="<?php echo($strName); ?>" 
				class="form-control <?php if (isset($arrError['name'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<label>Prénom:</label>
			<input name="firstname" value="<?php echo($strFirstname); ?>" 
				class="form-control <?php if (isset($arrError['firstname'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
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
			<label>Confirmation du mot de passe:</label>
			<input name="pwd_confirm" class="form-control <?php if (isset($arrError['pwd_confirm'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>
<?php 
	include("_partial/footer.php");
