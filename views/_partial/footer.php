    </main>
    <footer class="py-3 mt-3 text-center text-body-secondary bg-body-tertiary" >
        <p>Créé par <a href="https://ce-formation.com/" rel="noopener">CE FORMATION</a></p>
        <nav aria-label="Navigation pied de page">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="index.php?ctrl=page&action=mentions">Mentions légales</a>
                </li>
                <li class="list-inline-item" aria-hidden="true">|</li>
                <li class="list-inline-item">
                    <a href="index.php?ctrl=page&action=contact">Contact</a>
                </li>
            </ul>
        </nav>
        <p class="mb-0">
            <a href="#" aria-label="Retour en haut de la page">Retour en haut</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<?php if ($strPage == "blog") { ?>
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
	<?php } ?>
	
	<?php if ($strPage == "mentions") { ?>
	<!-- Smooth scroll pour les ancres -->
    <script>
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
    </script>
	<?php } ?>	
</body>
</html>