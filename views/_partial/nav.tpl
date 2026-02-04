<nav class="nav-scroller py-1 mb-3 border-bottom" aria-label="Navigation principale">
	<ul class="nav nav-underline justify-content-between">
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'home')} active {/if} " href="index.php" aria-current="page">Accueil</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'about')} active {/if}" href="index.php?ctrl=page&action=about">À propos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'blog')} active {/if}" href="index.php?ctrl=article&action=blog">Blog</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'contact')} active {/if}" href="index.php?ctrl=page&action=contact">Contact</a>
		</li>
		{if (isset($smarty.session.user)) }
		<li class="nav-item">
			<a class="nav-link link-body-emphasis {if ($strPage == 'user_list')} active {/if}" href="index.php?ctrl=user&action=user_list">Liste des utilisateurs</a>
		</li>
		{/if}
	</ul>
</nav>
