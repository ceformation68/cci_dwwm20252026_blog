<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contactez-nous pour toute question sur nos articles et formations en développement web. Formulaire de contact et localisation.">
    <meta name="author" content="CE FORMATION">
   
    <title>Contact - Mon Blog de Développement Web</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
                    <a class="nav-link link-body-emphasis" href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link-body-emphasis active" href="contact.html" aria-current="page">Contact</a>
                </li>
            </ul>
        </nav>
    </div>

    <main id="main-content" class="container">
        <section class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary" aria-labelledby="page-title">
            <div class="col-lg-6 px-0">
                <h2 id="page-title" class="display-4 fst-italic">Contact</h2>
                <p class="lead my-3">Contactez-nous pour toute question</p>
            </div>
        </section>
		<section aria-label="Contactez-nous">
            <h2 class="visually-hidden">Contactez-nous</h2>
			<div class="row g-5">
            <aside class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <h3 class="h4 mb-3">Notre localisation</h3>
                    <div id="map">
                        <iframe 
                            height="500" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d85245.75141192738!2d7.322364206894916!3d48.11159122156081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479165dff670c1cf%3A0xe35d7e3e616ce966!2s68000+Colmar!5e0!3m2!1sfr!2sfr!4v1539164589375" 
                            allowfullscreen
                            loading="lazy"
                            title="Carte de localisation - Colmar"
                            aria-label="Carte Google Maps montrant Colmar">
                        </iframe>
                    </div>
                </div>
            </aside>

            <section class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">Contactez-nous</h3>

                <form name="contactForm" action="#" method="post" novalidate id="contact-form" aria-label="Formulaire de contact">
                    <div class="row g-3">
                        <div class="col-12">
                            <p class="text-muted">
                                <abbr title="obligatoire" >*</abbr> 
                                Champs obligatoires
                            </p>
                        </div>

                        <div id="message" role="alert" aria-live="polite" class="d-none"></div>

                        <fieldset class="col-12 my-3">
                            <legend class="form-label">Civilité</legend>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="civ" 
                                    id="civ_mlle" 
                                    value="mlle">
                                <label class="form-check-label" for="civ_mlle">
                                    Mademoiselle
                                </label>
                            </div>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="civ" 
                                    id="civ_mme" 
                                    value="mme">
                                <label class="form-check-label" for="civ_mme">
                                    Madame
                                </label>
                            </div>
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="radio" 
                                    name="civ" 
                                    id="civ_m" 
                                    value="m">
                                <label class="form-check-label" for="civ_m">
                                    Monsieur
                                </label>
                            </div>
                        </fieldset>

                        <div class="col-sm-6">
                            <label for="name" class="form-label">
                                Nom <abbr title="obligatoire" >*</abbr>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                name="name"
                                required
                                autocomplete="family-name"
                                aria-required="true"
                                aria-describedby="name-error">
                            <div id="name-error" class="invalid-feedback">
                                Veuillez saisir votre nom
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="firstname" class="form-label">
                                Prénom <abbr title="obligatoire" >*</abbr>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="firstname" 
                                name="firstname"
                                required
                                autocomplete="given-name"
                                aria-required="true"
                                aria-describedby="firstname-error">
                            <div id="firstname-error" class="invalid-feedback">
                                Veuillez saisir votre prénom
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">
                                Adresse e-mail <abbr title="obligatoire" >*</abbr>
                            </label>
                            <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email"
                                placeholder="vous@exemple.com"
                                required
                                autocomplete="email"
                                aria-required="true"
                                aria-describedby="email-error">
                            <div id="email-error" class="invalid-feedback">
                                Veuillez saisir une adresse e-mail valide
                            </div>
                        </div>

                        <div class="col-12 form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                id="sendmail"
                                name="sendmail"
                                value="1">
                            <label class="form-check-label" for="sendmail">
                                Recevoir une copie du message
                            </label>
                        </div>

                        <div class="col-sm-6">
                            <label for="tel" class="form-label">Numéro de téléphone</label>
                            <input 
                                type="tel" 
                                class="form-control" 
                                name="tel" 
                                id="tel"
                                autocomplete="tel"
                                aria-describedby="tel-help">
                            <small id="tel-help" class="form-text text-muted">
                                Optionnel
                            </small>
                        </div>

                        <div class="col-sm-12">
                            <label for="subject" class="form-label">
                                Sujet du message <abbr title="obligatoire" >*</abbr>
                            </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="subject" 
                                id="subject"
                                required
                                aria-required="true"
                                aria-describedby="subject-error">
                            <div id="subject-error" class="invalid-feedback">
                                Veuillez saisir un sujet
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="content" class="form-label">
                                Contenu du message <abbr title="obligatoire" >*</abbr>
                            </label>
                            <textarea 
                                class="form-control" 
                                name="content" 
                                id="content"
                                rows="5"
                                required
                                aria-required="true"
                                aria-describedby="content-error content-help"></textarea>
                            <small id="content-help" class="form-text text-muted">
                                Minimum 10 caractères
                            </small>
                            <div id="content-error" class="invalid-feedback">
                                Veuillez saisir un message d'au moins 10 caractères
                            </div>
                        </div>

                        <div class="col-12 form-check">
                            <input 
                                type="checkbox" 
                                class="form-check-input" 
                                name="rgpd" 
                                id="rgpd"
                                required
                                aria-required="true"
                                aria-describedby="rgpd-error">
                            <label for="rgpd" class="form-check-label">
                                J'accepte le traitement de mes données conformément au 
                                <a href="mentions.html#rgpd" target="_blank">RGPD</a>
                                <abbr title="obligatoire" >*</abbr>
                            </label>
                            <div id="rgpd-error" class="invalid-feedback">
                                Vous devez accepter les conditions RGPD
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>
                                Envoyer le message
                            </button>
                            <button type="reset" class="btn btn-secondary ms-2">
                                <i class="fas fa-redo me-2" aria-hidden="true"></i>
                                Réinitialiser
                            </button>
                        </div>
                    </div>
                </form>
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

</body>
</html>