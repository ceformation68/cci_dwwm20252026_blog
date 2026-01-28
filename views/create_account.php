<section aria-label="Créer un compte">
	<form method="post">
		<p>
			<label>Nom:</label>
			<input name="name" value="<?php echo($objUser->getName()); ?>" 
				class="form-control <?php if (isset($arrError['name'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<label>Prénom:</label>
			<input name="firstname" value="<?php echo($objUser->getFirstname()); ?>" 
				class="form-control <?php if (isset($arrError['firstname'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<label>Mail:</label>
			<input name="mail" value="<?php echo($objUser->getMail()); ?>" 
				class="form-control <?php if (isset($arrError['mail'])) { echo 'is-invalid'; } ?> " type="text" >
		</p>
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control <?php if (isset($arrError['pwd'])) { echo 'is-invalid'; } ?> " type="password" >
		</p>
		<p>
			<label>Confirmation du mot de passe:</label>
			<input name="pwd_confirm" class="form-control <?php if (isset($arrError['pwd_confirm'])) { echo 'is-invalid'; } ?> " type="password" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>