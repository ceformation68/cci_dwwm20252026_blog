<?php
	// Variables d'affichage
	$strH2		= "Accueil";
	$strP		= "Découvrez nos derniers articles sur le développement web";
	// Variables technique
	$strPage	= "home";
	
	// inclusion du header
	include("_partial/header.php");
	
	// Récupération des articles 
	require("article_model.php");
	$objArticleModel 	= new ArticleModel;
	$arrArticle 		= $objArticleModel->findAll(4);
?>
<section aria-label="Articles récents">
	<h2 class="visually-hidden">Les 4 derniers articles</h2>
	<div class="row mb-2">
	<?php
		foreach($arrArticle as $arrDetArticle){
			//var_dump($arrDetArticle);
			// Traiter le résumé
			$strSummary = mb_strimwidth($arrDetArticle['article_content'], 0, 70, "...");
			
			// Traiter l'affichage de la date
			$objDate	= new DateTime($arrDetArticle['article_createdate']);
			//$strDate	= $objDate->format("d/m/Y"); // en anglais
			
			// Version avec configuration pour l'avoir en français
			$objDateFormatter	= new IntlDateFormatter(
                "fr_FR", // langue
                IntlDateFormatter::LONG,  // format de date
                IntlDateFormatter::NONE, // format heure
            );
			$strDate	= $objDateFormatter->format($objDate);
			
			include("_partial/article.php");
		} ?>
	</div>
</section>
<?php 
	include("_partial/footer.php");
