{extends file="views/layout.tpl"}

{block name="title" append}Me connecter{/block}
{block name="h2"}Me connecter{/block}
{block name="p"}Connexion au site{/block}

{block name="content"}

<section aria-label="Se connecter">
	<form method="post">
		<p>
			<label>Mail:</label>
			<input name="mail" value="{$strMail}" 
				class="form-control {if (isset($arrError['mail'])) } is-invalid {/if} " type="email" >
		</p>
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control {if (isset($arrError['pwd'])) } is-invalid {/if} " type="password" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>
{/block}