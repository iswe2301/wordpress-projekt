<?php
// Inkludera header
get_header();
?>

<?php
// Loopa igenom inlägg och visa innehållet
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <section class="single-content">
            <!-- Skriv ut titel och innehåll -->
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </section>
<?php
    }
}
?>

<?php
// Inkludera footer
get_footer();
?>