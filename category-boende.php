<?php get_header(); ?>

<div class="page-layout">
    <!-- Huvudinnehåll -->
    <div class="main-content">
        <?php
        // Hämta statiska sidan "Boende"
        $page = get_page_by_path("Boende");
        if ($page) {
            // Skriv ut sidans titel och innehåll
            echo "<h2>{$page->post_title}</h2>";
            echo apply_filters("the_content", $page->post_content);
        }
        ?>
        
        <?php
        // Kontrollera om det finns inlägg och loopa igenom dem
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
                        <p><?php the_excerpt(); ?></p>
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

    <!-- Inkludera sidebar för boende -->
    <?php get_sidebar("boende"); ?>
</div>

<!-- Inkludera footer -->
<?php get_footer(); ?>