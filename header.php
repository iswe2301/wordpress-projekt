<!DOCTYPE html>
<!-- Dynamiskt språk -->
<html <?php language_attributes(); ?>>

<head>
    <!-- Dynamisk charset och titel -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= get_bloginfo("stylesheet_url"); ?>">

    <!-- Google Fonts Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" type="image/png">

    <!-- JavaScript -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js" defer></script>

    <!-- Inkludera head-elementet i WordPress -->
    <?php wp_head(); ?>

</head>

<!-- Body-klass för WordPress-funktioner -->

<body <?php body_class(); ?>>

    <!-- Inkludera body-elementet i WordPress -->
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header>

        <!-- Kontrollera om det finns ett aktivt widget-område -->
        <?php if (is_active_sidebar("header-puff")) { ?>
            <div class="header-puff" id="header-puff">
                <!-- Visa puff-widget för header -->
                <?php dynamic_sidebar("header-puff"); ?>
            </div>
        <?php } ?>

        <div class="header-container">
            <div class="logo">
                <a href="<?= get_home_url(); ?>" aria-label="Gå till startsidan">
                    <img src="<?= get_template_directory_uri(); ?>/img/small_logo_AA.svg" alt="AurorAdventures logotyp">
                </a>
            </div>

            <!-- Desktop navigation -->
            <nav id="main-nav" class="desktop-nav">
                <!-- Dynamisk meny -->
                <?php wp_nav_menu(array("theme_location" => "main-nav")); ?>
            </nav>
        </div>

        <!-- Hamburger-meny för mobilen -->
        <div class="hamburger-menu" aria-label="Öppna mobilmeny" role="button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <!-- Mobilnavigering -->
        <div class="mobile-menu">
            <?php wp_nav_menu(array("theme_location" => "main-nav")); ?>
        </div>

        <!-- Overlay för mobilmenyn -->
        <div class="mobile-menu-overlay"></div>

        <!-- Hero -->
        <div class="hero <?php echo is_front_page() ? '' : 'small-hero'; ?>">
            <div class="image-overlay"></div>

            <!-- Logotyp för startsidan -->
            <img class="big-logo" src="<?= get_template_directory_uri(); ?>/img/big_logo_AA.png" alt="Logotyp för AurorAdventures">

            <!-- Kontroll om startsida -->
            <?php if (is_front_page()): ?>

                <!-- Kontroll om video finns -->
                <?php if (has_header_video()): ?>

                    <!-- Video för startsidan -->
                    <video class="hero-video" autoplay muted loop playsinline>
                        <source src="<?= get_header_video_url(); ?>" type="video/mp4">
                        Din webbläsare stöder inte videouppspelning.
                    </video>

                    <!-- Play/Pause-knapp för videon -->
                    <button id="video-control" class="video-control" aria-label="Pausa video">
                        <em class="fas fa-pause"></em>
                    </button>
                <?php endif; ?>

                <!-- Dynamisk slogan för startsidan -->
                <p><?= esc_html(get_theme_mod("hero_text", "Oförglömliga upplevelser i en arktisk miljö")); ?></p>

                <!-- Knapp med länk till boka-sidan -->
                <a href="<?= get_permalink(get_page_by_path("boka")); ?>" class="btn bg-btn">BOKA DITT ÄVENTYR <em class="fas fa-arrow-right"></em></a>

                <!-- Scrolla ner-knapp -->
                <div class="scroll-down">
                    <a href="#intro" aria-label="Scrolla ner för att läsa mer">
                        <em class="fas fa-chevron-down"></em>
                    </a>
                </div>

            <?php else: ?>

                <?php
                // Hämta ID för aktuell sida/kategori
                $id = get_the_ID();

                // Kontrollera om sidan är en kategori och hämta matchande statisk sida
                if (is_category()) {
                    // Hämta kategorins slug
                    $category_slug = get_query_var("category_name");

                    // Hämta statisk sida med samma slug
                    $page = get_page_by_path($category_slug);

                    // Om en sådan sida finns, använd dess ID istället
                    if ($page) {
                        $id = $page->ID;
                    }
                }
                ?>
                <!-- Kontrollera om sidan har en utvald bild eller custom header-bild -->
                <?php if (has_post_thumbnail($id)): ?>
                    <!-- Hämta alt-text från utvald bild -->
                    <?php $alt = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true); ?>
                    <!-- Utvald bild används som header-bild -->
                    <img class="hero-image" src="<?= get_the_post_thumbnail_url($id); ?>" alt="<?= $alt; ?>">

                <?php elseif (has_header_image()): ?>
                    <!-- Hämta alt-text från custom header-bild -->
                    <?php $alt = get_post_meta(get_post_thumbnail_id(get_custom_header()->attachment_id), '_wp_attachment_image_alt', true); ?>
                    <img class="hero-image" src="<?= get_header_image(); ?>" alt="<?= $alt; ?>">
                <?php endif; ?>

                <?php
                // Hämta titel från custom field om det finns
                $hero_title = get_post_meta(get_the_ID(), "hero_title", true);
                ?>

                <?php if ($hero_title): ?>
                    <!-- Visa custom hero titel om det finns -->
                    <h1><?php echo $hero_title; ?></h1>

                    <!-- Rubrik för andra sidor -->
                <?php elseif (is_page()): ?>
                    <!-- Visa sidans titel om det är en huvudsida -->
                    <h1><?php echo get_the_title(); ?></h1>

                <?php elseif (is_singular("post")): ?>
                    <!-- Visa inläggstiteln om det är en specifik nyhet -->
                    <h1><?php echo get_the_title(); ?></h1>

                <?php elseif (is_category()): ?>
                    <!-- Visa kategorinamnet om det är en kategori -->
                    <h1><?php echo single_cat_title(); ?></h1>

                <?php elseif (is_search()): ?>
                    <!-- Visa sökresultatrubriken -->
                    <h1>Sökresultat för: "<?php echo get_search_query(); ?>"</h1>

                    <!-- Standardrubrik för andra sidor -->
                <?php else: ?>
                    <h1><?php echo get_the_title(); ?></h1>

                <?php endif; ?>

            <?php endif; ?>

        </div>
    </header>

    <!-- Main-container med huvudinnehållet -->
    <main class="container">

        <!-- Breadcrumbs, visa på alla sidor utom startsidan -->
        <?php if (!is_front_page()) : ?>
            <div class="breadcrumbs">
                <?php if (function_exists("rank_math_the_breadcrumbs")) rank_math_the_breadcrumbs(); ?>
            </div>
        <?php endif; ?>