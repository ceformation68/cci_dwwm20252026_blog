{extends file="views/layout.tpl"}

{block name="title" append}Créer un compte{/block}
{block name="h2"}Créer un compte{/block}
{block name="p"}Inscrivez-vous{/block}

{block name="content"}
<section aria-label="Créer un compte">
	<form method="post">
		<p>
			<label>Nom:</label>
			<input name="name" value="{$objUser->getName()}" 
				class="form-control {if (isset($arrError['name'])) } is-invalid {/if} " type="text" >
		</p>
		<p>
			<label>Prénom:</label>
			<input name="firstname" value="{$objUser->getFirstname()}" 
				class="form-control {if (isset($arrError['firstname']))} is-invalid {/if} " type="text" >
		</p>
		<p>
			<label>Mail:</label>
			<input name="mail" value="{$objUser->getMail()}" 
				class="form-control {if (isset($arrError['mail'])) } is-invalid {/if} " type="text" >
		</p>
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control {if (isset($arrError['pwd'])) }is-invalid {/if} " type="password" >
		</p>
		<p>
			<label>Confirmation du mot de passe:</label>
			<input name="pwd_confirm" class="form-control {if (isset($arrError['pwd_confirm'])) } is-invalid {/if}" type="password" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>
{/block}