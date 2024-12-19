</main>

<!-- Footer -->
<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h2>Snabblänkar</h2>
            <ul>
                <!-- Dynamiska länkar till sidor och kategorier -->
                <li><em class="fas fa-home"></em><a href="<?= home_url(); ?>"> Hem</a></li>
                <li><em class="fas fa-bed"></em><a href="<?= get_category_link(get_category_by_slug("boende")->term_id); ?>"> Boende</a></li>
                <li><em class="fas fa-mountain"></em><a href="<?= get_category_link(get_category_by_slug("upplevelser")->term_id); ?>"> Upplevelser</a></li>
                <li><em class="fas fa-newspaper"></em><a href="<?= get_category_link(get_category_by_slug("nyheter")->term_id); ?>"> Nyheter</a></li>
                <li><em class="fas fa-info-circle"></em><a href="<?= get_permalink(get_page_by_path("om-oss")->ID); ?>"> Om oss</a></li>
                <li><em class="fas fa-envelope"></em><a href="<?= get_permalink(get_page_by_path("kontakt")->ID); ?>"> Kontakt</a></li>
                <li><em class="fas fa-calendar-plus"></em><a href="<?= get_permalink(get_page_by_path("boka")->ID); ?>"> Boka</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h2>Hitta hit</h2>
            <address>
                <em class="fas fa-map-marker-alt"></em> AurorAdventures<br>
                Gatuvägen 123<br>
                123 45 Staden<br>
                Sverige
            </address>
        </div>
        <div class="footer-section">
            <h2>Kontakt</h2>
            <ul>
                <li><em class="fas fa-phone"></em> <a href="tel:+46123456789">012-345 67 89</a></li>
                <li><em class="fas fa-envelope"></em> <a href="mailto:info@auroradventures.com">info@auroradventures.com</a></li>
                <li><em class="fas fa-comments"></em> <a href="<?= get_permalink(get_page_by_path("kontakt")->ID) . '#contact-form'; ?>">Skicka meddelande</a></li>
                <li><em class="fas fa-question-circle"></em> <a href="<?= get_permalink(get_page_by_path("kontakt")->ID) . '#sp-ea-141'; ?>">Vanliga frågor</a></li>
            </ul>
        </div>
    </div>
    <div class="footer-search">
        <!-- Hämta sökformulär -->
        <?php get_search_form(); ?>
    </div>
    <div class="footer-social">
        <a href="https://www.instagram.com" aria-label="Instagram" target="_blank"><em class="fab fa-instagram"></em></a>
        <a href="https://www.facebook.com" aria-label="Facebook" target="_blank"><em class="fab fa-facebook"></em></a>
        <a href="https://www.tiktok.com" aria-label="TikTok" target="_blank"><em class="fab fa-tiktok"></em></a>
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