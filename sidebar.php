<aside class="sidebar">
    <h2>Nyhetsarkiv</h2>
    <div class="sidebar-list">
        <ul>
            <?php

            // Skapa en array med argument för frågan
            $args = array(
                "category_name" => "nyheter", // Kategori
                "posts_per_page" => 5, // Antal inlägg
                "offset" => 3 // Hoppa över de tre senaste inläggen
            );

            // Skapa en ny fråga med argumenten
            $news_query = new WP_Query($args);

            // Loopa igenom inlägg och visa dem
            if ($news_query->have_posts()) {
                while ($news_query->have_posts()) {
                    $news_query->the_post();
            ?>
                    <!-- Länk till inlägg med titel -->
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php
                }
                wp_reset_postdata(); // Återställ postdata
            }
            ?>
        </ul>
    </div>

    <!-- Länk till Boende -->
    <div class="sidebar-item">
        <?php
        // Hämta statiska sidan "Boende" baserat på slug
        $boende_page = get_page_by_path("boende");
        if ($boende_page) {
            // Hämta länken till kategorin "boende"
            $boende_category = get_category_by_slug("boende");
            $category_link = $boende_category ? get_category_link($boende_category->term_id) : "#";
        ?>
            <!-- Länk till kategorin -->
            <a href="<?= $category_link; ?>">
                <div class="image-container">
                    <!-- Kontrollera om det finns utvald bild på sidan och visa -->
                    <?php if (has_post_thumbnail($boende_page->ID)) { ?>
                        <img class="side-image" src="<?= get_the_post_thumbnail_url($boende_page->ID, 'thumbnail'); ?>" alt="<?= $boende_page->post_title; ?>">
                    <?php } ?>
                    <?php
                    // Hämta den anpassade rubriken från anpassat fält
                    $hero_title = get_post_meta($boende_page->ID, "hero_title", true);
                    // Använd anpassad rubrik om den finns, annars använd sidans titel
                    $display_title = $hero_title ? $hero_title : get_the_title($boende_page->ID);
                    ?>
                    <h2 class="image-title"><?= $display_title; ?></h2>
                </div>
            </a>
        <?php } ?>
    </div>

    <!-- Länk till Upplevelser -->
    <div class="sidebar-item">
        <?php
        // Hämta statiska sidan "Upplevelser" baserat på slug
        $upplevelser_page = get_page_by_path("upplevelser");
        if ($upplevelser_page) {
            // Hämta länken till kategorin "upplevelser"
            $upplevelser_category = get_category_by_slug("upplevelser");
            $category_link = $upplevelser_category ? get_category_link($upplevelser_category->term_id) : "#";
        ?>
            <!-- Länk till kategorin -->
            <a href="<?= $category_link; ?>">
                <div class="image-container">
                    <!-- Kontrollera om det finns utvald bild på sidan och visa -->
                    <?php if (has_post_thumbnail($upplevelser_page->ID)) { ?>
                        <img class="side-image" src="<?= get_the_post_thumbnail_url($upplevelser_page->ID, 'thumbnail'); ?>" alt="<?= $upplevelser_page->post_title; ?>">
                    <?php } ?>
                    <?php
                    // Hämta den anpassade rubriken från anpassat fält
                    $hero_title = get_post_meta($upplevelser_page->ID, "hero_title", true);
                    // Använd anpassad rubrik om den finns, annars använd sidans titel
                    $display_title = $hero_title ? $hero_title : get_the_title($upplevelser_page->ID);
                    ?>
                    <h2 class="image-title"><?= $display_title; ?></h2>
                </div>
            </a>
        <?php } ?>
    </div>

    <!-- Kontrollera om det finns ett aktivt widget-område -->
    <?php if (is_active_sidebar("sidebar-puff")) { ?>
        <!-- Visa puff-widget -->
        <?php dynamic_sidebar("sidebar-puff"); ?>
    <?php } ?>
</aside>