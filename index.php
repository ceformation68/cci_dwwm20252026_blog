<?php
	// Variables d'affichage
	$strH2		= "Accueil";
	$strP		= "Découvrez nos derniers articles sur le développement web";
	// Variables technique
	$strPage	= "home";
	
	// inclusion du header
	include("_partial/header.php");
?>
<section aria-label="Articles récents">
	<h2 class="visually-hidden">Les 4 derniers articles</h2>
	<div class="row mb-2">
		<article class="col-md-6 mb-4">
			<div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-2">Le devenir du JavaScript</h3>
					<div class="mb-2 text-body-secondary">
						<time datetime="2017-05-11">11 mai 2017</time>
						<span> - test</span>
					</div>
					<p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
					<a href="article-javascript.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur le devenir du JavaScript">
						Lire la suite
						<i class="fas fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<img class="bd-placeholder-img" width="200" height="250" src="assets/images/js.png" alt="Logo JavaScript - Article sur l'évolution du JavaScript" loading="lazy">
				</div>
			</div>
		</article>
		<article class="col-md-6 mb-4">
			<div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-2">Qu'est-ce que le HTML?</h3>
					<div class="mb-2 text-body-secondary">
						<time datetime="2017-04-04">4 avril 2017</time>
						<span> - christel</span>
					</div>
					<p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
					<a href="article-html.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur le HTML">
						Lire la suite
						<i class="fas fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<img class="bd-placeholder-img" width="200" height="250" src="assets/images/html.png" alt="Logo HTML5 - Introduction au langage HTML" loading="lazy">
				</div>
			</div>
		</article>

		<article class="col-md-6 mb-4">
			<div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-2">Utiliser le CSS correctement</h3>
					<div class="mb-2 text-body-secondary">
						<time datetime="2017-05-08">8 mai 2017</time>
						<span> - christel</span>
					</div>
					<p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
					<a href="article-css.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur l'utilisation du CSS">
						Lire la suite
						<i class="fas fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<img class="bd-placeholder-img" width="200" height="250" src="assets/images/CSS.png" alt="Logo CSS3 - Guide d'utilisation des feuilles de style" loading="lazy">
				</div>
			</div>
		</article>

		<article class="col-md-6 mb-4">
			<div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
				<div class="col p-4 d-flex flex-column position-static">
					<h3 class="mb-2">Utiliser PhpMyAdmin</h3>
					<div class="mb-2 text-body-secondary">
						<time datetime="2017-05-21">21 mai 2017</time>
						<span> - christel</span>
					</div>
					<p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
					<a href="article-phpmyadmin.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur PhpMyAdmin">
						Lire la suite
						<i class="fas fa-arrow-right" aria-hidden="true"></i>
					</a>
				</div>
				<div class="col-auto d-none d-lg-block">
					<img class="bd-placeholder-img" width="200" height="250" src="assets/images/mysql.png" alt="Logo MySQL - Tutoriel PhpMyAdmin" loading="lazy">
				</div>
			</div>
		</article>
	</div>
</section>
<?php 
	include("_partial/footer.php");
