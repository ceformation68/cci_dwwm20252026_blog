{extends file="views/layout.tpl"}

{if ($objArticle->getId()|is_null)}
	{block name="title" append}Ajouter un article{/block}
	{block name="h2"}Ajouter un article{/block}
	{block name="p"}Ajouter un article{/block}
{else}
	{block name="title" append}Modifier un article{/block}
	{block name="h2"}Modifier un article{/block}
	{block name="p"}Modifier l'article {$objArticle->getTitle()}{/block}
{/if}
{block name="content"}
	<section>
		<form method="post" enctype="multipart/form-data" >
			<p>
				<label>Titre:</label>
				<input name="title" value="{$objArticle->getTitle()}" 
					class="form-control {if (isset($arrError['title'])) } is-invalid {/if} " type="text" >
			</p>
			<p>
				<label>Contenu:</label>
				<textarea name="content" class="form-control {if (isset($arrError['content'])) } is-invalid {/if} " >{$objArticle->getContent()}</textarea>
			</p>
			<p>
				<label>Image:</label>
				{if (!$objArticle->getId()|is_null)}
				<img src="assets/images/{$objArticle->getImg()}">
				{/if}
				<input name="img" class="form-control {if (isset($arrError['img'])) } is-invalid {/if}" type="file">
			</p>
			<p>
				<input class="form-control btn btn-primary" type="submit" >
			</p>
		</form>
	</section>
{/block}