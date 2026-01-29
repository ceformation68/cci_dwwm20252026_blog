{extends file="views/layout.tpl"}

{block name="title" append}Mentions légales{/block}
{block name="h2"}Mentions légales{/block}
{block name="p"}Informations légales et politique de confidentialité{/block}

{block name="date_maj"}
	<p class="text-muted small mb-0">
		<i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>
		Dernière mise à jour : <time datetime="2025-01-15">15 janvier 2025</time>
	</p>
{/block}

{block name="js_footer" append}
	<!-- Smooth scroll pour les ancres -->
    <script>
	{literal}
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Focus sur la section pour l'accessibilité
                    target.focus();
                }
            });
        });
	{/literal}
    </script>
{/block}

{block name="content"}
		<section aria-label="Mentions légales">
            <h2 class="visually-hidden">Mentions légales</h2>
			<div class="row g-5">
            <div class="col-md-12">
                <!-- Table des matières -->
                <nav class="table-of-contents" aria-labelledby="toc-heading">
                    <h3 id="toc-heading" class="h5 mb-3">
                        <i class="fas fa-list me-2" aria-hidden="true"></i>
                        Sommaire
                    </h3>
                    <ul class="list-unstyled ms-3">
                        <li class="mb-2"><a href="#editeur">1. Éditeur du site</a></li>
                        <li class="mb-2"><a href="#hebergeur">2. Hébergement</a></li>
                        <li class="mb-2"><a href="#propriete">3. Propriété intellectuelle</a></li>
                        <li class="mb-2"><a href="#rgpd">4. Protection des données personnelles (RGPD)</a></li>
                        <li class="mb-2"><a href="#cookies">5. Cookies</a></li>
                        <li class="mb-2"><a href="#responsabilite">6. Limitation de responsabilité</a></li>
                        <li class="mb-2"><a href="#liens">7. Liens hypertextes</a></li>
                        <li class="mb-2"><a href="#droit">8. Droit applicable</a></li>
                    </ul>
                </nav>

                <!-- Section 1 : Éditeur -->
                <section id="editeur" class="legal-section" aria-labelledby="editeur-heading">
                    <h3 id="editeur-heading" class="h4">
                        <i class="fas fa-building me-2 text-primary" aria-hidden="true"></i>
                        1. Éditeur du site
                    </h3>
                    <dl class="row">
                        <dt class="col-sm-3">Raison sociale</dt>
                        <dd class="col-sm-9">CE FORMATION</dd>
                        
                        <dt class="col-sm-3">Forme juridique</dt>
                        <dd class="col-sm-9">[À compléter : SARL, SAS, etc.]</dd>
                        
                        <dt class="col-sm-3">Capital social</dt>
                        <dd class="col-sm-9">[À compléter]</dd>
                        
                        <dt class="col-sm-3">Adresse</dt>
                        <dd class="col-sm-9">[À compléter]</dd>
                        
                        <dt class="col-sm-3">Téléphone</dt>
                        <dd class="col-sm-9">[À compléter]</dd>
                        
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">
                            <a href="mailto:contact@ce-formation.com">contact@ce-formation.com</a>
                        </dd>
                        
                        <dt class="col-sm-3">Directeur de publication</dt>
                        <dd class="col-sm-9">Christel Ehrhart</dd>
                        
                        <dt class="col-sm-3">SIRET</dt>
                        <dd class="col-sm-9">[À compléter]</dd>
                    </dl>
                </section>

                <!-- Section 2 : Hébergeur -->
                <section id="hebergeur" class="legal-section" aria-labelledby="hebergeur-heading">
                    <h3 id="hebergeur-heading" class="h4">
                        <i class="fas fa-server me-2 text-primary" aria-hidden="true"></i>
                        2. Hébergement
                    </h3>
                    <p>Le site est hébergé par :</p>
                    <dl class="row">
                        <dt class="col-sm-3">Hébergeur</dt>
                        <dd class="col-sm-9">[Nom de l'hébergeur]</dd>
                        
                        <dt class="col-sm-3">Adresse</dt>
                        <dd class="col-sm-9">[Adresse de l'hébergeur]</dd>
                        
                        <dt class="col-sm-3">Téléphone</dt>
                        <dd class="col-sm-9">[Téléphone de l'hébergeur]</dd>
                    </dl>
                </section>

                <!-- Section 3 : Propriété intellectuelle -->
                <section id="propriete" class="legal-section" aria-labelledby="propriete-heading">
                    <h3 id="propriete-heading" class="h4">
                        <i class="fas fa-copyright me-2 text-primary" aria-hidden="true"></i>
                        3. Propriété intellectuelle
                    </h3>
                    <p>
                        L'ensemble du contenu de ce site (textes, images, vidéos, logos, icônes, etc.) est la propriété 
                        exclusive de CE FORMATION ou de ses partenaires, sauf mention contraire.
                    </p>
                    <p>
                        Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des 
                        éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation 
                        écrite préalable de CE FORMATION.
                    </p>
                    <p>
                        Toute exploitation non autorisée du site ou de l'un quelconque des éléments qu'il contient sera 
                        considérée comme constitutive d'une contrefaçon et poursuivie conformément aux dispositions des 
                        articles L.335-2 et suivants du Code de Propriété Intellectuelle.
                    </p>
                </section>

                <!-- Section 4 : RGPD -->
                <section id="rgpd" class="legal-section" aria-labelledby="rgpd-heading">
                    <h3 id="rgpd-heading" class="h4">
                        <i class="fas fa-shield-alt me-2 text-primary" aria-hidden="true"></i>
                        4. Protection des données personnelles (RGPD)
                    </h3>
                    
                    <h4 class="h5 mt-4">4.1 Responsable du traitement</h4>
                    <p>
                        Le responsable du traitement des données est CE FORMATION, représenté par Christel Ehrhart.
                    </p>

                    <h4 class="h5 mt-4">4.2 Données collectées</h4>
                    <p>Les données personnelles collectées sur ce site sont :</p>
                    <ul>
                        <li>Nom et prénom</li>
                        <li>Adresse email</li>
                        <li>Numéro de téléphone (optionnel)</li>
                        <li>Contenu des messages envoyés via le formulaire de contact</li>
                    </ul>

                    <h4 class="h5 mt-4">4.3 Finalité du traitement</h4>
                    <p>Les données personnelles sont collectées pour les finalités suivantes :</p>
                    <ul>
                        <li>Répondre à vos demandes d'information</li>
                        <li>Gérer les commentaires sur les articles</li>
                        <li>Améliorer nos services</li>
                        <li>Envoyer des newsletters (avec votre consentement explicite)</li>
                    </ul>

                    <h4 class="h5 mt-4">4.4 Durée de conservation</h4>
                    <p>
                        Vos données personnelles sont conservées pendant une durée de 3 ans à compter de votre dernier 
                        contact avec nous, sauf obligation légale de conservation plus longue.
                    </p>

                    <h4 class="h5 mt-4">4.5 Vos droits</h4>
                    <p>Conformément au RGPD, vous disposez des droits suivants :</p>
                    <ul>
                        <li><strong>Droit d'accès</strong> : obtenir la confirmation que des données vous concernant sont traitées</li>
                        <li><strong>Droit de rectification</strong> : corriger vos données inexactes ou incomplètes</li>
                        <li><strong>Droit à l'effacement</strong> : supprimer vos données dans certaines conditions</li>
                        <li><strong>Droit à la limitation</strong> : limiter le traitement de vos données</li>
                        <li><strong>Droit à la portabilité</strong> : recevoir vos données dans un format structuré</li>
                        <li><strong>Droit d'opposition</strong> : vous opposer au traitement de vos données</li>
                    </ul>
                    <p>
                        Pour exercer ces droits, contactez-nous à : 
                        <a href="mailto:contact@ce-formation.com">contact@ce-formation.com</a>
                    </p>
                    <p>
                        Vous avez également le droit d'introduire une réclamation auprès de la CNIL 
                        (<a href="https://www.cnil.fr" target="_blank" rel="noopener">www.cnil.fr</a>).
                    </p>
                </section>

                <!-- Section 5 : Cookies -->
                <section id="cookies" class="legal-section" aria-labelledby="cookies-heading">
                    <h3 id="cookies-heading" class="h4">
                        <i class="fas fa-cookie-bite me-2 text-primary" aria-hidden="true"></i>
                        5. Cookies
                    </h3>
                    <p>
                        Le site peut utiliser des cookies pour améliorer l'expérience utilisateur et analyser l'utilisation du site.
                    </p>
                    
                    <h4 class="h5 mt-4">5.1 Qu'est-ce qu'un cookie ?</h4>
                    <p>
                        Un cookie est un petit fichier texte déposé sur votre terminal (ordinateur, smartphone, tablette) 
                        lors de la visite d'un site web. Il permet de collecter des informations relatives à votre navigation.
                    </p>

                    <h4 class="h5 mt-4">5.2 Types de cookies utilisés</h4>
                    <ul>
                        <li><strong>Cookies techniques</strong> : nécessaires au fonctionnement du site</li>
                        <li><strong>Cookies de mesure d'audience</strong> : pour analyser l'utilisation du site (Google Analytics, etc.)</li>
                        <li><strong>Cookies de préférence</strong> : pour mémoriser vos choix (langue, etc.)</li>
                    </ul>

                    <h4 class="h5 mt-4">5.3 Gérer les cookies</h4>
                    <p>
                        Vous pouvez à tout moment configurer votre navigateur pour refuser les cookies. Cependant, cela peut 
                        limiter certaines fonctionnalités du site.
                    </p>
                </section>

                <!-- Section 6 : Limitation de responsabilité -->
                <section id="responsabilite" class="legal-section" aria-labelledby="responsabilite-heading">
                    <h3 id="responsabilite-heading" class="h4">
                        <i class="fas fa-exclamation-triangle me-2 text-primary" aria-hidden="true"></i>
                        6. Limitation de responsabilité
                    </h3>
                    <p>
                        CE FORMATION s'efforce de fournir des informations aussi précises que possible. Toutefois, il ne 
                        pourra être tenu responsable des omissions, des inexactitudes et des carences dans la mise à jour, 
                        qu'elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.
                    </p>
                    <p>
                        CE FORMATION ne pourra être tenu responsable de dommages directs ou indirects résultant de l'accès 
                        au site ou de l'utilisation de celui-ci, y compris l'inaccessibilité, les pertes de données, 
                        détériorations, destructions ou virus qui pourraient affecter l'équipement informatique de 
                        l'utilisateur, et/ou de la présence de virus sur son site.
                    </p>
                </section>

                <!-- Section 7 : Liens hypertextes -->
                <section id="liens" class="legal-section" aria-labelledby="liens-heading">
                    <h3 id="liens-heading" class="h4">
                        <i class="fas fa-link me-2 text-primary" aria-hidden="true"></i>
                        7. Liens hypertextes
                    </h3>
                    <p>
                        Le site peut contenir des liens hypertextes vers d'autres sites. CE FORMATION n'exerce aucun 
                        contrôle sur ces sites et décline toute responsabilité quant à leur contenu.
                    </p>
                    <p>
                        La mise en place d'un lien hypertexte vers le présent site nécessite une autorisation préalable 
                        écrite de CE FORMATION.
                    </p>
                </section>

                <!-- Section 8 : Droit applicable -->
                <section id="droit" class="legal-section" aria-labelledby="droit-heading">
                    <h3 id="droit-heading" class="h4">
                        <i class="fas fa-gavel me-2 text-primary" aria-hidden="true"></i>
                        8. Droit applicable et juridiction compétente
                    </h3>
                    <p>
                        Les présentes mentions légales sont régies par le droit français. En cas de litige, et à défaut 
                        d'accord amiable, les tribunaux français seront seuls compétents.
                    </p>
                </section>

                <!-- Contact -->
                <section class="mt-5 p-4 bg-light rounded" aria-labelledby="contact-legal">
                    <h3 id="contact-legal" class="h4 mb-3">
                        <i class="fas fa-envelope me-2 text-primary" aria-hidden="true"></i>
                        Questions ou réclamations
                    </h3>
                    <p>
                        Pour toute question concernant ces mentions légales ou pour exercer vos droits, 
                        vous pouvez nous contacter :
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2" aria-hidden="true"></i>
                            Par email : <a href="mailto:contact@ce-formation.com">contact@ce-formation.com</a>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-paper-plane me-2" aria-hidden="true"></i>
                            Via le <a href="contact.html">formulaire de contact</a>
                        </li>
                    </ul>
                </section>
            </div>
        </div>
		</section>
{/block}