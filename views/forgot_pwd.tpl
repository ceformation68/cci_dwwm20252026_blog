{extends file="views/layout.tpl"}

{block name="title" append}Mot de passe oublié{/block}
{block name="h2"}Mot de passe oublié{/block}
{block name="p"}Renseigner son mail pour changer son mot de passe{/block}

{block name="content"}

<section aria-label="Se connecter">
	<form method="post">
		<p>
			<label>Mail:</label>
			<input name="mail" value="{$strMail}" 
				class="form-control {if (isset($arrError['mail'])) } is-invalid {/if} " type="email" >
		</p>
		<p>
			<input class="form-control btn btn-primary" type="submit" >
		</p>
	</form>
</section>
{/block}