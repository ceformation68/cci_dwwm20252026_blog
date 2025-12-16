<?php
	// Variables d'affichage
	$strH2		= "Blog";
	$strP		= "Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse";
	// Variables technique
	$strPage	= "blog";
	
	// inclusion du header
	include("_partial/header.php");
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
									<option value="">Tous les auteurs</option>
									<option value="christel">Christel</option>
									<option value="test">Test</option>
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
											checked
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
									aria-describedby="date-help">
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
											name="startdate">
									</div>
									<div class="col-md-6">
										<label for="enddate" class="form-label">Date de fin</label>
										<input 
											type="date" 
											class="form-control" 
											id="enddate" 
											name="enddate">
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
                <article class="col-md-6 mb-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-2">Le devenir du JavaScript</h4>
                            <div class="mb-2 text-body-secondary">
                                <time datetime="2017-05-11">11 mai 2017</time>
                                <span> - test</span>
                            </div>
                            <p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            <a href="article-javascript.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur le JavaScript">
                                Lire la suite
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" width="200" height="250" src="assets/images/js.png" alt="Logo JavaScript" loading="lazy">
                        </div>
                    </div>
                </article>
                
                <article class="col-md-6 mb-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-2">Qu'est-ce que le HTML?</h4>
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
                            <img class="bd-placeholder-img" width="200" height="250" src="assets/images/html.png" alt="Logo HTML5" loading="lazy">
                        </div>
                    </div>
                </article>

                <article class="col-md-6 mb-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-2">Utiliser le CSS correctement</h4>
                            <div class="mb-2 text-body-secondary">
                                <time datetime="2017-05-08">8 mai 2017</time>
                                <span> - christel</span>
                            </div>
                            <p class="mb-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                            <a href="article-css.html" class="icon-link gap-1 icon-link-hover stretched-link" aria-label="Lire l'article complet sur le CSS">
                                Lire la suite
                                <i class="fas fa-arrow-right" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" width="200" height="250" src="assets/images/CSS.png" alt="Logo CSS3" loading="lazy">
                        </div>
                    </div>
                </article>

                <article class="col-md-6 mb-4">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <h4 class="mb-2">Utiliser PhpMyAdmin</h4>
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
                            <img class="bd-placeholder-img" width="200" height="250" src="assets/images/mysql.png" alt="Logo MySQL" loading="lazy">
                        </div>
                    </div>
                </article>
            </div>
        </section>
			</div>
		</section>
<?php 
	include("_partial/footer.php");
