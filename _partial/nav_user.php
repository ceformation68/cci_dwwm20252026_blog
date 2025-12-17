<nav class="col-4 d-flex justify-content-end align-items-center" aria-label="Connexion utilisateur">
	<?php if (!isset($_SESSION['user'])){ ?>
	<!--- Utilisateur non connecté -->
	<a class="btn btn-sm" href="create_account.php" title="Créer un compte" aria-label="Créer un compte">
		<i class="fas fa-user" aria-hidden="true"></i>
		<span class="visually-hidden">Créer un compte</span>
	</a>
	<span aria-hidden="true">|</span>
	<a class="btn btn-sm" href="login.php" title="Se connecter" aria-label="Se connecter">
		<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
		<span class="visually-hidden">Se connecter</span>
	</a>
	<?php }else{ ?>
	<!--- Utilisateur connecté -->
	<a class="btn btn-sm" href="edit_account.php" title="Modifier mon compte" aria-label="Modifier mon  compte">
		Bonjour <?php echo $_SESSION['user']['user_firstname'].' '.$_SESSION['user']['user_name']; ?>
	</a>
	<span aria-hidden="true">|</span>
	<a class="btn btn-sm" href="logout.php" title="Se déconnecter" aria-label="Se déconnecter">
		<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
		<span class="visually-hidden">Se déconnecter</span>
	</a>
	<?php } ?>
</nav>