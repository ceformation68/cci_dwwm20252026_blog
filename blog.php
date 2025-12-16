<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tous nos articles sur le développement web : JavaScript, HTML, CSS, PHP, MySQL. Recherchez par mots-clés, date ou auteur.">
    <meta name="author" content="CE FORMATION">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Blog - Tous les articles">
    <meta property="og:description" content="Retrouvez tous nos articles sur le développement web">
    
    <title>Mon Blog - Tous les articles</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="assets/css/blog.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>
<body>
    <a href="#main-content" class="visually-hidden-focusable">Aller au contenu principal</a>
    
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1"></div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="index.html" aria-label="Retour à l'accueil">
                        <h1 class="h3 mb-0">Mon Blog</h1>
                    </a>
                </div>
                <nav class="col-4 d-flex justify-content-end align-items-center" aria-label="Connexion utilisateur">
                    <a class="btn btn-sm" href="create_account.html" title="Créer un compte" aria-label="Créer un compte">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        <span class="visually-hidden">Créer un compte</span>
                    </a>
                    <span aria-hidden="true">|</span>
                    <a class="btn btn-sm" href="login.html" title="Se connecter" aria-label="Se connecter">
                        <i class="fas fa-sign-in-alt" aria-hidden="true"></i>
                        <span class="visually-hidden">Se connecter</span>
                    </a>
                </nav>
            </div>
        </header>

        <nav class="nav-scroller py-1 mb-3 border-bottom" aria-label="Navigation principale">
            <ul class="nav nav-underline justify-content-between">
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="about.html">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis active" href="blog.html" aria-current="page">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

    <main id="main-content" class="container">
        <section class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" aria-labelledby="page-title">
            <div class="col-lg-8 px-0">
                <h2 id="page-title" class="display-4 fst-italic">Blog</h2>
                <p class="lead my-3">Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse</p>
            </div>
        </section>

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
	</main>

    <footer class="py-3 mt-3 text-center text-body-secondary bg-body-tertiary">
        <p>Créé par <a href="https://ce-formation.com/" rel="noopener">CE FORMATION</a></p>
        <nav aria-label="Navigation pied de page">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="mentions.html">Mentions légales</a>
                </li>
                <li class="list-inline-item" aria-hidden="true">|</li>
                <li class="list-inline-item">
                    <a href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
        <p class="mb-0">
            <a href="#" aria-label="Retour en haut de la page">Retour en haut</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Gestion de l'affichage des champs de date
        const periodRadios = document.querySelectorAll('input[name="period"]');
        const dateExact = document.getElementById('date-exact');
        const dateRange = document.getElementById('date-range');
        
        function toggleDateFields() {
            const selectedPeriod = document.querySelector('input[name="period"]:checked').value;
            
            if (selectedPeriod === '0') {
                dateExact.style.display = 'block';
                dateRange.style.display = 'none';
            } else {
                dateExact.style.display = 'none';
                dateRange.style.display = 'block';
            }
        }
        
        periodRadios.forEach(radio => {
            radio.addEventListener('change', toggleDateFields);
        });
        
        // Initialisation au chargement
        toggleDateFields();
    </script>
</body>
</html>