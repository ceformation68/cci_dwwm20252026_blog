{extends file="views/layout.tpl"}

{block name="title" append}Erreur 403{/block}
{block name="h2"}Erreur 403{/block}
{block name="p"}Vous n'êtes pas autorisé à accéder à cette page, vous êtes une erreur 030<br>
				Allez vous <a href='index.php?ctrl=user&action=login'>connecter</a>{/block}

{block name="content"}
<img src="assets/images/error-403.jpg" />
{/block}