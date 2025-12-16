<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez qui nous sommes : notre équipe passionnée de développement web, notre mission et nos valeurs. Formations et expertise en programmation.">
    <meta name="author" content="CE FORMATION">
    <title>Mon Blog - À propos</title>
    
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
                    <a class="nav-link link-body-emphasis" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis active" href="about.html" aria-current="page">À propos</a>
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

    <main id="main-content" class="container" >
        <section class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" aria-labelledby="page-title">
            <div class="col-lg-8 px-0">
                <h2 id="page-title" class="display-4 fst-italic">À propos</h2>
                <p class="lead my-3">Découvrez notre histoire, notre équipe et notre passion pour le développement web</p>
            </div>
        </section>
		<section aria-label="Qui sommes-nous ?">
            <h2 class="visually-hidden">Qui sommes-nous ?</h2>
			<div class="col-md-12">
                <section aria-labelledby="qui-sommes-nous">
                    <h3 id="qui-sommes-nous" class="h4 mb-3">Qui sommes-nous ?</h3>
                    <p>
                        Nous sommes une équipe passionnée de développeurs et formateurs spécialisés dans les technologies web. 
                        Notre mission est de partager nos connaissances et notre expertise à travers des articles de qualité, 
                        des tutoriels pratiques et des formations complètes.
                    </p>
                    <p>
                        Depuis notre création, nous nous engageons à produire du contenu accessible, pertinent et à jour 
                        pour accompagner les développeurs de tous niveaux dans leur apprentissage et leur évolution professionnelle.
                    </p>
                </section>

                <section aria-labelledby="notre-expertise" class="mt-4">
                    <h3 id="notre-expertise" class="h4 mb-3">Notre expertise</h3>
                    <p>
                        Notre équipe possède une solide expérience dans de nombreux domaines du développement web, notamment :
                    </p>
                    <ul class="list-unstyled ms-3">
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                            <strong>JavaScript moderne</strong> : ES6+, frameworks et bibliothèques
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                            <strong>HTML5 et CSS3</strong> : sémantique, accessibilité et responsive design
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                            <strong>PHP et bases de données</strong> : développement backend et MySQL
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-check-circle text-success me-2" aria-hidden="true"></i>
                            <strong>Bonnes pratiques</strong> : SEO, performance et sécurité
                        </li>
                    </ul>
                </section>

                <section aria-labelledby="notre-mission" class="mt-4">
                    <h3 id="notre-mission" class="h4 mb-3">Notre mission</h3>
                    <p>
                        Nous croyons fermement que la technologie doit être accessible à tous. C'est pourquoi nous nous efforçons 
                        de créer du contenu clair, structuré et pédagogique qui permet à chacun de progresser à son rythme.
                    </p>
                    <p>
                        Que vous soyez débutant cherchant à comprendre les fondamentaux ou développeur expérimenté souhaitant 
                        approfondir vos connaissances, vous trouverez ici des ressources adaptées à vos besoins.
                    </p>
                </section>

                <section aria-labelledby="nos-valeurs" class="mt-4">
                    <h3 id="nos-valeurs" class="h4 mb-3">Nos valeurs</h3>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title h5">
                                        <i class="fas fa-book-reader text-primary me-2" aria-hidden="true"></i>
                                        Pédagogie
                                    </h4>
                                    <p class="card-text">
                                        Nous privilégions des explications claires avec des exemples concrets pour faciliter la compréhension.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title h5">
                                        <i class="fas fa-star text-warning me-2" aria-hidden="true"></i>
                                        Qualité
                                    </h4>
                                    <p class="card-text">
                                        Chaque article est rédigé avec soin et vérifié pour garantir l'exactitude de l'information.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title h5">
                                        <i class="fas fa-users text-info me-2" aria-hidden="true"></i>
                                        Communauté
                                    </h4>
                                    <p class="card-text">
                                        Nous encourageons les échanges et sommes à l'écoute de notre communauté de lecteurs.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h4 class="card-title h5">
                                        <i class="fas fa-sync-alt text-success me-2" aria-hidden="true"></i>
                                        Innovation
                                    </h4>
                                    <p class="card-text">
                                        Nous restons à jour avec les dernières tendances et technologies du développement web.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section aria-labelledby="rejoignez-nous" class="mt-5 p-4 bg-light rounded">
                    <h3 id="rejoignez-nous" class="h4 mb-3">Rejoignez notre communauté</h3>
                    <p>
                        Vous souhaitez être informé de nos derniers articles et bénéficier de conseils exclusifs ? 
                        N'hésitez pas à <a href="contact.html">nous contacter</a> ou à consulter régulièrement 
                        notre <a href="blog.html">blog</a> pour découvrir de nouveaux contenus.
                    </p>
                    <div class="mt-3">
                        <a href="blog.html" class="btn btn-primary me-2">
                            <i class="fas fa-newspaper me-2" aria-hidden="true"></i>
                            Voir le blog
                        </a>
                        <a href="contact.html" class="btn btn-outline-primary">
                            <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                            Nous contacter
                        </a>
                    </div>
                </section>
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