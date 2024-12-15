<!DOCTYPE html>
<!-- Dynamiskt språk -->
<html <?php language_attributes(); ?>>

<head>
    <!-- Dynamisk charset och titel -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title("|", true, "right"); ?><?php bloginfo("name"); ?></title>

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
        <!-- Puff ovanför navigationen -->
        <div class="header-puff" id="header-puff">
            <p id="animated-text">Upptäck våra nya vintererbjudanden! Just nu 10 % rabatt på utvalda boenden och upplevelser.</p>
        </div>
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
                        <i class="fas fa-pause"></i>
                    </button>
                <?php endif; ?>

                <!-- Dynamisk slogan för startsidan -->
                <p><?= esc_html(get_theme_mod("hero_text", "Oförglömliga upplevelser i en arktisk miljö")); ?></p>

                <!-- Knapp med länk till upplevelsesidan -->
                <a href="<?= get_category_link(get_category_by_slug("upplevelser")->term_id); ?>" class="btn bg-btn">BOKA DITT ÄVENTYR <i class="fas fa-arrow-right"></i></a>

                <!-- Scrolla ner-knapp -->
                <div class="scroll-down">
                    <a href="#intro" aria-label="Scrolla ner för att läsa mer">
                        <i class="fas fa-chevron-down"></i>
                    </a>
                </div>

                <!-- Kontroll om headerbild finns -->
            <?php elseif (has_header_image()): ?>
                <!-- Bild för andra sidor -->
                <img class="hero-image" src="<?= get_header_image(); ?>">
                <!-- Rubrik för andra sidor -->
                <h1><?php the_title(); ?></h1>
            <?php endif; ?>

        </div>
    </header>

    <!-- Main-container med huvudinnehållet -->
    <main class="container">