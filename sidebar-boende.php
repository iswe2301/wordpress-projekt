<aside class="sidebar">
    <h2>Upplevelser</h2>
    <?php

    // Skapa en array med argument för frågan
    $args = array(
        "category_name" => "upplevelser", // Kategori
        "posts_per_page" => 3, // Antal inlägg
    );

    // Skapa en ny fråga med argumenten
    $experience_query = new WP_Query($args);

    // Loopa igenom inlägg och visa dem
    if ($experience_query->have_posts()) {
        while ($experience_query->have_posts()) {
            $experience_query->the_post();
    ?>
            <div class="sidebar-item">
                <!-- Länk till inlägg -->
                <a href="<?php the_permalink(); ?>">
                    <div class="image-container">
                        <!-- Kontrollera om det finns utvald bild och visa -->
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        ?>
                        <!-- Dynamisk titel -->
                        <h3 class="image-title"><?php the_title(); ?></h3>
                    </div>
                </a>
            </div>
    <?php
        }
        wp_reset_postdata(); // Återställ postdata efter loopen
    }
    ?>
</aside>