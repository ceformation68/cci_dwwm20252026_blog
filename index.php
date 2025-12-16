<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les derniers articles sur le développement web : JavaScript, HTML, CSS, PHP et bases de données. Tutoriels et conseils pour développeurs.">
    <meta name="author" content="Christel Ehrhart - CE FORMATION">
    
    <title>Mon Blog - Accueil</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="assets/css/blog.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    
</head>
<body>
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="visually-hidden-focusable">Aller au contenu principal</a>
    
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <!-- Espace pour futur contenu -->
                </div>
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
                    <a class="nav-link link-body-emphasis active" href="index.html" aria-current="page">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="about.html">À propos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis" href="blog.html">Blog</a>
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
                <h2 id="page-title" class="display-4 fst-italic">Accueil</h2>
                <p class="lead my-3">Découvrez nos derniers articles sur le développement web</p>
            </div>
        </section>

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
    </main>

    <footer class="py-3 mt-3 text-center text-body-secondary bg-body-tertiary" >
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
</body>
</html>