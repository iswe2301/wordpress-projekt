</main>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h2>Snabblänkar</h2>
            <ul>
                <!-- Dynamiska länkar till sidor och kategorier -->
                <li><i class="fas fa-home"></i><a href="<?= home_url(); ?>"> Hem</a></li>
                <li><i class="fas fa-bed"></i><a href="<?= get_category_link(get_category_by_slug("boende")->term_id); ?>"> Boende</a></li>
                <li><i class="fas fa-mountain"></i><a href="<?= get_category_link(get_category_by_slug("upplevelser")->term_id); ?>"> Upplevelser</a></li>
                <li><i class="fas fa-newspaper"></i><a href="<?= get_category_link(get_category_by_slug("nyheter")->term_id); ?>"> Nyheter</a></li>
                <li><i class="fas fa-info-circle"></i><a href="<?= get_permalink(get_page_by_path("om-oss")->ID); ?>"> Om oss</a></li>
                <li><i class="fas fa-envelope"></i><a href="<?= get_permalink(get_page_by_path("kontakt")->ID); ?>"> Kontakt</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Hitta hit</h2>
            <address>
                <i class="fas fa-map-marker-alt"></i> AurorAdventures<br>
                Gatuvägen 123<br>
                123 45 Staden<br>
                Sverige
            </address>
        </div>
        <div class="footer-section">
            <h2>Kontakt</h2>
            <ul>
                <li><i class="fas fa-phone"></i> <a href="tel:+46123456789">012-345 67 89</a></li>
                <li><i class="fas fa-envelope"></i> <a href="mailto:info@auroradventures.com">info@auroradventures.com</a></li>
                <li><i class="fas fa-comments"></i> <a href="<?= get_permalink(get_page_by_path("kontakt")->ID); ?>">Skicka meddelande</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-search">
        <!-- Hämta sökformulär -->
        <?php get_search_form(); ?>
    </div>
    <div class="footer-social">
        <a href="https://www.instagram.com" aria-label="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com" aria-label="Facebook" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://www.tiktok.com" aria-label="TikTok" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
    <div class="footer-lang">
        <!-- Kontrollera om det finns ett aktivt widget-område -->
        <?php if (is_active_sidebar("footer-widget")) { ?>
            <!-- Visa widget -->
            <?php dynamic_sidebar("footer-widget"); ?>
        <?php } ?>
    </div>
    <div class="footer-bottom">
        <!-- Hämta årtal dynamiskt -->
        <p>&copy; <?= date("Y"); ?> AurorAdventures</p>
    </div>
</footer>

<!-- Inkludera footer-elementet i WordPress -->
<?php wp_footer(); ?>
</body>

</html>