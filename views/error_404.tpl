{extends file="views/layout.tpl"}

{block name="title" append}Erreur 404{/block}
{block name="h2"}Erreur 404{/block}
{block name="p"}La page n'existe pas{/block}

{block name="content"}
<img src="{$smarty.env.BASE_URL}{$smarty.env.IMG_PATH}/error-404.png" />
{/block}