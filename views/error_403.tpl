{extends file="views/layout.tpl"}

{block name="title" append}Erreur 403{/block}
{block name="h2"}Erreur 403{/block}
{block name="p"}Vous n'êtes pas autorisé à accéder à cette page, vous êtes une erreur 030<br>
				Allez vous <a href='{$smarty.env.BASE_URL}user/login'>connecter</a>{/block}

{block name="content"}
<img src="{$smarty.env.BASE_URL}{$smarty.env.IMG_PATH}/error-403.jpg" />
{/block}