<?php
// Hämta header
get_header();
?>

<!-- Intro-sektion -->
<section class="intro" id="intro">
    <div class="intro-header">
        <?php
        // Loopa igenom inlägg och visa innehållet
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <!-- Skriv ut titel och innehåll -->
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
                <div class="divider"></div>
        <?php
            }
        }
        ?>
    </div>
</section>

<?php
// Hämta footer
get_footer();
?>