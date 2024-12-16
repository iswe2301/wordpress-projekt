<?php
/*
Template Name: Sida med sidebar
*/
?>

<!-- Hämta header -->
<?php get_header(); ?>

<div class="page-layout">
    <!-- Huvudinnehåll -->
    <div class="main-content">
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
                    <!-- Utvald bild -->
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php } ?>
                </section>
                <!-- Skiljelinje mellan inlägg -->
                <div class="divider"></div>
        <?php
            }
        }
        ?>
    </div>

    <!-- Hämta sidebar -->
    <?php get_sidebar(); ?>
</div>

<!-- Hämta footer -->
<?php get_footer(); ?>