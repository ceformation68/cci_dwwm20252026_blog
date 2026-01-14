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
	
	require("article_entity.php");
	// Initialisation d'un tableau => objets
	$arrArticleToDisplay	= array(); 
	// Boucle de transformation du tableau de tableau en tableau d'objets
	foreach($arrArticle as $arrDetArticle){
		$objArticle = new Article;
		$objArticle->hydrate($arrDetArticle);
		
		/*
		$objArticle->setId($arrDetArticle['article_id']); 
		$objArticle->setTitle($arrDetArticle['article_title']); 
		$objArticle->setImg($arrDetArticle['article_img']); 
		$objArticle->setContent($arrDetArticle['article_content']); 
		$objArticle->setCreatedate($arrDetArticle['article_createdate']); 
		$objArticle->setCreatorname($arrDetArticle['article_creatorname']); 
		*/
		
		$arrArticleToDisplay[]	= $objArticle;
	}
	
?>
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
<?php 
	include("_partial/footer.php");
