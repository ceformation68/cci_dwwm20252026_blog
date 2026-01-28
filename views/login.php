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
				class="form-control <?php if (isset($arrError['mail'])) { echo 'is-invalid'; } ?> " type="email" >
		</p>
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control <?php if (isset($arrError['pwd'])) { echo 'is-invalid'; } ?> " type="password" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>