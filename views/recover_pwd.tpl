{extends file="views/layout.tpl"}

{block name="title" append}Changer le mot de passe{/block}
{block name="h2"}Changer le mot de passe{/block}
{block name="p"}Redéfinissez votre mot de passe{/block}

{block name="content"}
<section aria-label="Se connecter">
	{if $arrUser === false}
		<p class="alert alert-danger">Le lien n'est plus valable</p>
	{else}
	<form method="post">
		<p>
			<label>Mot de passe:</label>
			<input name="pwd" class="form-control {if (isset($arrError['pwd'])) } is-invalid {/if} " type="password" >
		</p>
		<p>
			<label>Confirmation du mot de passe:</label>
			<input name="confirm_pwd" class="form-control {if (isset($arrError['pwd'])) } is-invalid {/if} " type="password" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
	{/if}
</section>
{/block}