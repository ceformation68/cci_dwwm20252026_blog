{extends file="views/layout.tpl"}

{block name="title" append}Gérer les utilisateurs{/block}
{block name="h2"}Gérer les utilisateurs{/block}
{block name="p"}Liste des utilisateurs{/block}

{block name="content"}
	<table class="table">
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Actions</th>
		</tr>
		{foreach from=$arrUserToDisplay item=objUser}
		<tr>
			<td>{$objUser->getName()}</td>
			<td>{$objUser->getFirstname()}</td>
			<td><a href="index.php?ctrl=user&action=edit_account&id={$objUser->getId()}">Modifier</a></td>
		</tr>
		{/foreach} 
	</table>
{/block}