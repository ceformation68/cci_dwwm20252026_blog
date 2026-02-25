{extends file="views/layout.tpl"}

{block name="title" append}Archives{/block}

{block name="h2"}Tous les articles{/block}

{block name="p"}Affichage de tous les articles, même ceux de plus de 20 jours{/block}

{block name="content"}
<section>
	<div class="row mb-2">
		{foreach from=$arrArticlesToDisplay item=objArticle}
			{include file="views/_partial/article.tpl"}
		{/foreach}
	</div>
</section>
{/block}