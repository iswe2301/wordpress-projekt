<?php get_header(); ?>

<div class="page-layout">
    <!-- Huvudinnehåll -->
    <div class="main-content">
        <section class="intro">
            <?php
            // Hämta statiska sidan "Nyheter" baserat på slug
            $nyheter_page = get_page_by_path("nyheter");
            if ($nyheter_page) {
                // Skriv ut titel och innehåll från sidan
                echo "<h2>" . $nyheter_page->post_title . "</h2>";
                echo apply_filters("the_content", $nyheter_page->post_content);
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
                        <!-- Skriv ut metadata -->
                        <div class="meta">
                            <span class="date"><?php the_time("Y-m-d \k\l. H:i"); ?></span> |
                            <span class="author"><?php the_author(); ?></span>
                        </div>
                        <!-- Skriv ut excerpt -->
                        <?php the_excerpt(); ?>
                        <div class="content-button">
                            <!-- Länk till inlägget -->
                            <a href="<?php the_permalink(); ?>" class="btn btn-green">Läs mer</a>
                        </div>
                    </div>
                </div>

                <!-- Skiljelinje mellan inlägg -->
                <div class="divider"></div>
        <?php
            }
        }
        ?>
        <!-- Pagination -->
        <div id="pagination">
            <div><?php next_posts_link("Äldre inlägg"); ?></div>
            <div><?php previous_posts_link("Nyare inlägg"); ?></div>
        </div>
    </div>

    <!-- Inkludera generell sidebar -->
    <?php get_sidebar(); ?>
</div>

<!-- Inkludera footer -->
<?php get_footer(); ?>