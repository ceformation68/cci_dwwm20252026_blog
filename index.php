<?php
	// Variables d'affichage
	$strH2		= "Accueil";
	$strP		= "Découvrez nos derniers articles sur le développement web";
	// Variables technique
	$strPage	= "home";
	
	// inclusion du header
	include("_partial/header.php");
	
	// inclure la connexion
	require_once("connexion.php");
	// Ecrire la requête
	/*$strRq	= "SELECT *
				FROM articles
				ORDER BY article_createdate DESC
				LIMIT 4;";
				*/
	// Requête avec le nom du créateur
	$strRq	= "SELECT articles.*, 
				CONCAT(user_firstname, ' ', user_name) AS 'article_creatorname'
				FROM articles
					INNER JOIN users ON article_creator = user_id
				ORDER BY article_createdate DESC
				LIMIT 4";
	// Lancer la requête et récupérer les résultats
	$arrArticle = $db->query($strRq)->fetchAll();
	
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
