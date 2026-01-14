<section aria-label="Articles récents">
	<h2 class="visually-hidden">Les 4 derniers articles</h2>
	<div class="row mb-2">
	<?php
		// Tableau d'affichage
		foreach($arrArticleToDisplay as $objArticle){
			include("_partial/article.php");
		} 
	?>
	</div>
</section>