<!-- Sökformulär som fungerar med WordPress -->
<form action=<?= home_url(); ?> role="search" method="get" id="searchform">
    <label for="s" class="screen-reader-text">Sök efter:</label>
    <input class="search-input" type="search" id="s" name="s" placeholder="Sök..." aria-label="Skriv in sökord">
    <button type="submit" class="search-btn" id="searchsubmit" aria-label="Sök">
        <em class="fas fa-search"></em>
    </button>
</form>