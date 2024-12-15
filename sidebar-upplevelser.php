<aside class="sidebar">
    <h2>Boende</h2>
    <?php

    // Skapa en array med argument för frågan
    $args = array(
        "category_name" => "boende", // Kategori
        "posts_per_page" => 3, // Antal inlägg
    );

    // Skapa en ny fråga med argumenten
    $boende_query = new WP_Query($args);

    // Loopa igenom inlägg och visa dem
    if ($boende_query->have_posts()) {
        while ($boende_query->have_posts()) {
            $boende_query->the_post();
    ?>
            <div class="sidebar-item">
                <!-- Länk till inlägg -->
                <a href="<?php the_permalink(); ?>">
                    <!-- Visa utvald bild och titel -->
                    <div class="image-container">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        ?>
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