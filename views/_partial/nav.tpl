<nav class="nav-scroller py-1 mb-3 border-bottom" aria-label="Navigation principale">
	<ul class="nav nav-underline justify-content-between">
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'home')} active {/if} " href="{$smarty.env.BASE_URL}index.php" aria-current="page">Accueil</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'about')} active {/if}" href="{$smarty.env.BASE_URL}page/about">À propos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'blog')} active {/if}" href="{$smarty.env.BASE_URL}article/blog">Blog</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'contact')} active {/if}" href="{$smarty.env.BASE_URL}page/contact">Contact</a>
		</li>
		{if (isset($smarty.session.user)) }
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'user_list')} active {/if}" href="{$smarty.env.BASE_URL}user/user_list">Liste des utilisateurs</a>
		</li>
		{/if}
	</ul>
</nav>
