{extends file="views/layout.tpl"}

{block name="title" append}Accueil{/block}
{block name="h2"}Accueil{/block}

{block name="content"}
<section aria-label="Articles récents">
	<h2 class="visually-hidden">Les 4 derniers articles</h2>
	<div class="row mb-2">
	{* Tableau d'affichage *}
	{foreach from=$arrArticleToDisplay item=objArticle}
		{include file="views/_partial/article.tpl"}
	{/foreach} 
	</div>
</section>
{/block}