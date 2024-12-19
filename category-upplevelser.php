<?php get_header(); ?>

<div class="page-layout">
    <!-- Huvudinnehåll -->
    <div class="main-content">
        <section class="intro">
            <?php
            // Hämta statiska sidan "Upplevelser" baserat på slug
            $upplevelser_page = get_page_by_path("upplevelser");
            if ($upplevelser_page) {
                // Skriv ut titel och innehåll från sidan
                echo "<h2>" . $upplevelser_page->post_title . "</h2>";
                echo apply_filters("the_content", $upplevelser_page->post_content);
            }
            ?>
            <!-- Skiljelinje mellan inlägg -->
            <div class="divider"></div>
        </section>

        <?php

        // Skapa argument för att hämta alla inlägg från kategorin "upplevelser"
        $args = array("category_name" => "upplevelser", "posts_per_page" => -1);

        // Skapa en ny fråga med argumenten
        $upplevelser_query = new WP_Query($args);

        // Kontrollera om det finns inlägg i kategorin och loopa igenom dem
        if ($upplevelser_query->have_posts()) {
            while ($upplevelser_query->have_posts()) {
                $upplevelser_query->the_post();
        ?>
                <div class="content-item">
                    <!-- Kontrollera om det finns utvald bild och visa -->
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    }
                    ?>
                    <div class="content-details">
                        <!-- Skriv ut dynamisk titel -->
                        <h3><?php the_title(); ?></h3>
                        <!-- Skriv ut excerpt -->
                        <?php the_content(); ?>
                        <div class="content-button">
                            <!-- Länk till boka sida -->
                            <a href="<?= get_permalink(get_page_by_path("boka")); ?>" class="btn">Boka nu</a>
                        </div>
                    </div>
                </div>

                <!-- Skiljelinje mellan inlägg -->
                <div class="divider"></div>
        <?php
            }
            // Återställ postdata
            wp_reset_postdata();
        }
        ?>
    </div>

    <!-- Inkludera sidebar för upplevelser -->
    <?php get_sidebar("upplevelser"); ?>
</div>

<!-- Inkludera footer -->
<?php get_footer(); ?>