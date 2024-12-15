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

    <!-- Intro-sektion med länkar till boende och upplevelser -->
    <div class="intro-content">
        <?php
        // Skapa en array med argument för att hämta sidor
        $args = array(
            "post_type" => "page", // Hämta sidor
            "post_name__in" => array("boende", "upplevelser"), // Postnamn för boende och upplevelser
            "posts_per_page" => 2 // Max 2 sidor
        );
        // Skapa en ny query med argumenten
        $page_query = new WP_Query($args);
        // Kontrolelra om det finns innehåll, loopa igenom och skriv ut
        if ($page_query->have_posts()) {
            while ($page_query->have_posts()) {
                $page_query->the_post();

                // Hämta anpassat fält för hero-titel
                $hero_title = get_post_meta(get_the_ID(), "hero_title", true);

                // Fallback till sidans titel om anpassat fält saknas
                $display_title = $hero_title ? $hero_title : get_the_title();

                // Hämta länk till kategorin baserat på postnamn
                $slug = get_post_field("post_name", get_the_ID()); // Hämta postnamn
                $category = get_category_by_slug($slug); // Hämta kategori baserat på postnamn
                $category_link = get_category_link($category->term_id); // Hämta länk till kategorin
        ?>
                <div class="card">
                    <!-- Kontrollera om det finns en utvald bild och visa isåfall -->
                    <?php if (has_post_thumbnail()) { ?>
                        <?php the_post_thumbnail(); ?>
                    <?php } ?>
                    <!-- Skriv ut dynamisk hero-titel -->
                    <h2><?php echo $display_title; ?></h2>
                    <!-- Skriv ut excerpt -->
                    <?php the_excerpt(); ?>
                    <div class="card-buttons">
                        <!-- Länka till kategorin -->
                        <a href="<?php echo $category_link; ?>" class="btn btn-blue">Boka nu</a>
                        <a href="<?php echo $category_link; ?>" class="btn btn-green">Läs mer</a>
                    </div>
                </div>
        <?php
            }
            // Återställ postdata
            wp_reset_postdata();
        }
        ?>
    </div>
</section>

<?php
// Hämta sidan Om oss
$about_page = get_page_by_path("om-oss");
// Kontrollera om sidan finns
if ($about_page) {
    // Hämta innehållet från sidan
    $content = $about_page->post_content;
    $first_sentence = strtok($content, "."); // Hämta första meningen från innehållet
}
?>

<!-- Om oss sektion -->
<div class="about">
    <!-- Kontrollera om sidan Om oss finns och skriv ut innehåll -->
    <?php if ($about_page) { ?>
        <!-- Skriv ut dynamisk länk och första meningen från innehållet -->
        <a class="btn btn-pink" href="<?= get_permalink($about_page->ID); ?>">Om AurorAdventures</a>
        <?= $first_sentence; ?>.
    <?php } ?>
</div>

<!-- Puff-sektion -->
<?php
// Kontrollera om widget-området finns och skriv ut innehåll
if (is_active_sidebar("front-page-puff")) { ?>
    <section class="highlight">
        <div class="highlight-content">
            <!-- Hämta widget -->
            <?php dynamic_sidebar("front-page-puff"); ?>
        </div>
    </section>
<?php } ?>

<!-- Divider för att skilja sektioner -->
<div class="divider"></div>

<!-- News Section -->
<section class="news">
    <?php
    // Skapa en array med argument för att hämta inlägg
    $args = array(
        "category_name" => "nyheter", // Kategorins slug
        "posts_per_page" => 1 // Hämta ett inlägg
    );
    // Skapa en ny query med argumenten
    $news_query = new WP_Query($args);
    // Kontrollera om det finns innehåll, loopa igenom och skriv ut
    if ($news_query->have_posts()) {
        while ($news_query->have_posts()) {
            $news_query->the_post();
    ?>
            <div class="news-card">
                <!-- Kontrollera om det finns en utvald bild och visa isåfall -->
                <?php if (has_post_thumbnail()) { ?>
                    <?php the_post_thumbnail(); ?>
                <?php } ?>
                <div class="news-content">
                    <h2>Senaste nytt</h2>
                    <!-- Skriv ut titel och excerpt -->
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <!-- Länka till inlägget -->
                    <a href="<?php the_permalink(); ?>" class="btn btn-green">Läs mer</a>
                </div>
            </div>
    <?php
        }
        wp_reset_postdata(); // Återställ postdata
    }
    ?>
</section>

<?php
// Hämta footer
get_footer();
?>