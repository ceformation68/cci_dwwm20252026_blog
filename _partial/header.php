<?php
	// Activer la session sur toutes les pages qui incluent le header
	session_start();
	//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les derniers articles sur le développement web : JavaScript, HTML, CSS, PHP et bases de données. Tutoriels et conseils pour développeurs.">
    <meta name="author" content="Christel Ehrhart - CE FORMATION">
    
	<?php if ($strPage == "blog") { ?>
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Blog - Tous les articles">
    <meta property="og:description" content="Retrouvez tous nos articles sur le développement web">
	<?php } ?>
	
    <title>Mon Blog - <?php echo $strH2; ?></title>
    
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
				
				<?php require("_partial/nav_user.php"); ?>
            </div>
        </header>

		<?php require("_partial/nav.php"); ?>
    </div>

    <main id="main-content" class="container">
        <section class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" aria-labelledby="page-title">
            <div class="col-lg-8 px-0">
                <h2 id="page-title" class="display-4 fst-italic"><?php echo $strH2; ?></h2>
                <p class="lead my-3"><?php echo $strP; ?></p>
				<?php if ($strPage == "mentions") { ?>
				<p class="text-muted small mb-0">
                    <i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>
                    Dernière mise à jour : <time datetime="2025-01-15">15 janvier 2025</time>
                </p>
				<?php } ?>
            </div>
        </section>