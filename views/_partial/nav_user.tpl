<nav class="col-4 d-flex justify-content-end align-items-center" aria-label="Connexion utilisateur">
	{if (!isset($smarty.session.user)) }
	<!--- Utilisateur non connecté -->
	<a class="btn btn-sm" href="index.php?ctrl=user&action=create_account" title="Créer un compte" aria-label="Créer un compte">
		<i class="fas fa-user" aria-hidden="true"></i>
		<span class="visually-hidden">Créer un compte</span>
	</a>
	<span aria-hidden="true">|</span>
	<a class="btn btn-sm" href="index.php?ctrl=user&action=login" title="Se connecter" aria-label="Se connecter">
		<i class="fas fa-sign-in-alt" aria-hidden="true"></i>
		<span class="visually-hidden">Se connecter</span>
	</a>
	{else}
	<!--- Utilisateur connecté -->
	<a class="btn btn-sm" href="index.php?ctrl=user&action=edit_account" title="Modifier mon compte" aria-label="Modifier mon  compte">
		Bonjour 
		{if isset($smarty.cookies.pseudo)}
			{$smarty.cookies.pseudo}
		{else}
			{$smarty.session.user.user_firstname|cat:' '|cat:$smarty.session.user.user_name}
		{/if}
	</a>
	<span aria-hidden="true">|</span>
	<a class="btn btn-sm" href="index.php?ctrl=user&action=logout" title="Se déconnecter" aria-label="Se déconnecter">
		<i class="fas fa-sign-out-alt" aria-hidden="true"></i>
		<span class="visually-hidden">Se déconnecter</span>
	</a>
	{/if}
</nav>