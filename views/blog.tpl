{extends file="views/layout.tpl"}

{assign var='strPage' value='blog'}

{block name="title" append}Blog{/block}
{block name="h2"}Blog{/block}
{block name="p"}Découvrez tous nos articles et utilisez la recherche pour trouver ce qui vous intéresse{/block}

{block name="og"}
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Blog - Tous les articles">
    <meta property="og:description" content="Retrouvez tous nos articles sur le développement web">
{/block}	

{block name="js_footer" append}
	<script>
	{literal}
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
	{/literal}
    </script>
{/block}

{block name="content"}
<!-- Formulaire de recherche -->
<section aria-label="Blog">
	<h2 class="visually-hidden">Rechercher parmi les articles</h2>
	<div class="row mb-2">
		<section class="mb-5" aria-labelledby="search-heading">
			<form name="formSearch" method="post" action="index.php?ctrl=article&action=blog" class="border rounded p-4 bg-light">
				<h3 id="search-heading" class="h4 mb-4">
					<i class="fas fa-search me-2" aria-hidden="true"></i>
					Rechercher des articles
				</h3>
				
				<div class="row g-3">
					<div class="col-md-6">
						<label for="keywords" class="form-label">Mots-clés</label>
						<input 
							value="{$strKeywords}"
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
							<option value="0" {if ($intAuthor == 0)} selected {/if} >Tous les auteurs</option>
							<!-- Faire une boucle sur les users de la base de données -->
							{*foreach $arrUser as $arrDetUser*}
							{foreach from=$arrUser item=arrDetUser}
								<option value="{$arrDetUser['user_id']}" 
									{if ($intAuthor == $arrDetUser['user_id'])} selected {/if} 
								>
									{$arrDetUser['user_firstname']|cat:' '|cat:$arrDetUser['user_name']}
								</option>
							{/foreach}
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
									{if ($intPeriod == 0)} checked {/if}
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
									{if ($intPeriod == 1)} checked {/if}
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
							value="{$strDate}" >
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
									value="{$strStartDate}" >
							</div>
							<div class="col-md-6">
								<label for="enddate" class="form-label">Date de fin</label>
								<input 
									type="date" 
									class="form-control" 
									id="enddate" 
									name="enddate"
									value="{$strEndDate}" >
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
			{foreach $arrArticleToDisplay as $objArticle}
				{include file="views/_partial/article.tpl"}
			{foreachelse}
				<div class="alert alert-warning">
					<p>Pas de résultats</p>
				</div>
			{/foreach}
			</div>
		</section>
	</div>
</section>

{/block}