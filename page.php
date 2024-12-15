<!-- Hämta header -->
<?php get_header(); ?>

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
<div class="single-content-img">
    <!-- Utvald bild -->
    <?php if (has_post_thumbnail()) { ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
    <?php } ?>
</div>

<!-- Hämta footer -->
<?php get_footer(); ?>