<nav class="nav-scroller py-1 mb-3 border-bottom" aria-label="Navigation principale">
	<ul class="nav nav-underline justify-content-between">
		<li class="nav-item">
			<a class="nav-link link-body-emphasis <?php if ($strPage == "home") { echo("active"); } ?> " href="index.php" aria-current="page">Accueil</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis <?php if ($strPage == "about") { echo("active"); } ?>" href="about.php">À propos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis <?php echo ($strPage == "blog")?"active":""; ?>" href="blog.php">Blog</a>
		</li>
		<li class="nav-item">
			<a class="nav-link link-body-emphasis <?php echo ($strPage == "contact")?"active":""; ?>" href="contact.php">Contact</a>
		</li>
	</ul>
</nav>
