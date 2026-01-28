<article class="col-md-6 mb-4">
	<div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
		<div class="col p-4 d-flex flex-column position-static">
			<h3 class="mb-2"><?php echo $objArticle->getTitle(); ?></h3>
			<div class="mb-2 text-body-secondary">
				<time datetime="2017-05-11"><?php echo $objArticle->getDateFormat(); ?></time>
				<span> - <?php echo $objArticle->getCreatorname(); ?></span>
			</div>
			<p class="mb-auto"><?php echo $objArticle->getSummary(); ?></p>
			<a href="article-javascript.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur le devenir du JavaScript">
				Lire la suite
				<i class="fas fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>
		<div class="col-auto d-none d-lg-block">
			<img class="bd-placeholder-img" width="200" height="250" src="assets/images/<?php echo $objArticle->getImg(); ?>" alt="Logo JavaScript - Article sur l'évolution du JavaScript" loading="lazy">
		</div>
	</div>
</article>