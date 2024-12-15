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
        // Kontrollera om det finns inlägg i kategorin och loopa igenom dem
        if (have_posts()) {
            while (have_posts()) {
                the_post();
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
                            <!-- Länk till inlägget -->
                            <a href="<?php the_permalink(); ?>" class="btn">Boka nu</a>
                        </div>
                    </div>
                </div>

                <!-- Skiljelinje mellan inlägg -->
                <div class="divider"></div>
        <?php
            }
        }
        ?>
    </div>

    <!-- Inkludera sidebar för upplevelser -->
    <?php get_sidebar("upplevelser"); ?>
</div>

<!-- Inkludera footer -->
<?php get_footer(); ?>