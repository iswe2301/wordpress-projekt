<?php get_header(); ?>

<?php
// Loopa igenom och visa innehåll
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <section class="single-content">
            <!-- Visa inläggets titel -->
            <h2><?php the_title(); ?></h2>
            <!-- Kontrollera om kategorin är nyheter -->
            <?php if (in_category("nyheter")) { ?>
                <!-- Visa metadata för nyheter -->
                <div class="meta">
                    <span class="date"><?php the_time("Y-m-d \k\l. H:i"); ?></span> |
                    <span class="author"><?php the_author(); ?></span>
                </div>
            <?php } ?>
            <!-- Inläggets innehåll -->
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </section>
        <div class="single-content-img">
            <!-- Utvald bild -->
            <?php if (has_post_thumbnail()) { ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php } ?>
        </div>
<?php
    }
}
?>

<?php get_footer(); ?>