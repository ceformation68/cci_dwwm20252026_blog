{extends file="views/layout.tpl"}

{block name="title" append}Contact{/block}
{block name="h2"}Contact{/block}
{block name="p"}Contactez-nous pour toute question{/block}

{block name="content"}

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

{/block}