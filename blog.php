<?php
	// Variables d'affichage
	$strH2		= "Blog";
	$strP		= "Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse";
	// Variables technique
	$strPage	= "blog";
	
	// inclusion du header
	include("_partial/header.php");

	//Récupérer les informations du Formulaire
	$strKeywords 	= $_GET['keywords']??'';
	$intAuthor		= $_GET['author']??0;
	$intPeriod		= $_GET['period']??0;
	$strDate		= $_GET['date']??'';
	$strStartDate	= $_GET['startdate']??'';
	$strEndDate		= $_GET['enddate']??'';

	// Récupération des articles 
	require("article_model.php");
	$objArticleModel 	= new ArticleModel;
	//$arrArticle = findAll(0, $strKeywords, $intAuthor, $intPeriod, $strDate, $strStartDate, $strEndDate);
	// Depuis PHP 8 - accès direct aux paramètres
	$arrArticle 		= $objArticleModel->findAll(intAuthor:$intAuthor, intPeriod:$intPeriod, strDate:$strDate, 
							strKeywords:$strKeywords, strStartDate:$strStartDate, strEndDate:$strEndDate);

	// Récupération des utilisateurs
	require("user_model.php");
	$objUserModel 	= new UserModel;
	$arrUser 		= $objUserModel->findAllUsers();
?>
        <!-- Formulaire de recherche -->
		<section aria-label="Blog">
			<h2 class="visually-hidden">Rechercher parmi les articles</h2>
            <div class="row mb-2">
				<section class="mb-5" aria-labelledby="search-heading">
					<form name="formSearch" method="get" action="#" class="border rounded p-4 bg-light">
						<h3 id="search-heading" class="h4 mb-4">
							<i class="fas fa-search me-2" aria-hidden="true"></i>
							Rechercher des articles
						</h3>
						
						<div class="row g-3">
							<div class="col-md-6">
								<label for="keywords" class="form-label">Mots-clés</label>
								<input 
									value="<?php echo $strKeywords; ?>"
									type="text" 
									class="form-control" 
									id="keywords" 
									name="keywords"
									placeholder="Ex: JavaScript, CSS..."
									aria-describedby="keywords-help">
								<small id="keywords-help" class="form-text text-muted">
									Recherchez dans les titres et contenus
								</small>
							</div>
							
							<div class="col-md-6">
								<label for="author" class="form-label">Auteur</label>
								<select class="form-select" id="author" name="author">
									<option value="0" <?php echo ($intAuthor == 0)?'selected':''; ?> >Tous les auteurs</option>
									<!-- Faire une boucle sur les users de la base de données -->
									<?php
									foreach($arrUser as $arrDetUser){
									?>
										<option value="<?php echo $arrDetUser['user_id']; ?>" 
											<?php echo ($intAuthor == $arrDetUser['user_id'])?'selected':''; ?> 
										>
											<?php echo $arrDetUser['user_firstname'].' '.$arrDetUser['user_name']; ?>
										</option>
									<?php
									}
									?>
								</select>
							</div>

							
							<div class="col-12">
								<fieldset>
									<legend class="form-label">Type de recherche par date</legend>
									<div class="form-check form-check-inline">
										<input 
											class="form-check-input" 
											type="radio" 
											name="period" 
											id="period-exact" 
											value="0" 
											<?php echo ($intPeriod == 0)?'checked':'' ; ?>
											aria-controls="date-exact date-range">
										<label class="form-check-label" for="period-exact">
											Date exacte
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input 
											class="form-check-input" 
											type="radio" 
											name="period" 
											id="period-range" 
											value="1"
											<?php echo ($intPeriod == 1)?'checked':'' ; ?>
											aria-controls="date-exact date-range">
										<label class="form-check-label" for="period-range">
											Période
										</label>
									</div>
								</fieldset>
							</div>
							
							<div class="col-md-6" id="date-exact">
								<label for="date" class="form-label">Date</label>
								<input 
									type="date" 
									class="form-control" 
									id="date" 
									name="date"
									aria-describedby="date-help"
									value="<?php echo $strDate; ?>" >
								<small id="date-help" class="form-text text-muted">
									Format: JJ/MM/AAAA
								</small>
							</div>
							
							<div id="date-range" style="display: none;">
								<div class="row g-3">
									<div class="col-md-6">
										<label for="startdate" class="form-label">Date de début</label>
										<input 
											type="date" 
											class="form-control" 
											id="startdate" 
											name="startdate"
											value="<?php echo $strStartDate; ?>" >
									</div>
									<div class="col-md-6">
										<label for="enddate" class="form-label">Date de fin</label>
										<input 
											type="date" 
											class="form-control" 
											id="enddate" 
											name="enddate"
											value="<?php echo $strEndDate; ?>" >
									</div>
								</div>
							</div>
							
							<div class="col-12">
								<button type="submit" class="btn btn-primary">
									<i class="fas fa-search me-2" aria-hidden="true"></i>
									Rechercher
								</button>
								<button type="reset" class="btn btn-secondary ms-2">
									<i class="fas fa-redo me-2" aria-hidden="true"></i>
									Réinitialiser
								</button>
							</div>
						</div>
					</form>
				</section>

				<!-- Liste des articles -->
				<section aria-labelledby="articles-heading">
            <h3 id="articles-heading" class="visually-hidden">Liste des articles</h3>
            <div class="row mb-2">
			<?php
			if (count($arrArticle) == 0){
			?>
				<div class="alert alert-warning">
					<p>Pas de résultats</p>
				</div>
			<?php
			}
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
			</div>
		</section>
<?php 
	include("_partial/footer.php");
