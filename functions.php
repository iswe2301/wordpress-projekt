<?php

// Registrera dynamiska menyer
add_action("init", "register_my_menus");

function register_my_menus()
{
    register_nav_menus(array(
        "main-nav" => "Huvudmeny"
    ));
}

// Aktivera stöd för utvalda bilder
add_theme_support("post-thumbnails");

// Aktivera widgetar
add_action("widgets_init", "aurora_widget_init");

function aurora_widget_init()
{
    // Widget för puff på startsidan
    register_sidebar(array(
        "name"          => "Puff på startsidan",
        "id"            => "front-page-puff",
        "before_widget" => "<div class='highlight-content'>",
        "after_widget"  => "</div>",
        "before_title"  => "<h3>",
        "after_title"   => "</h3>",
    ));

    // Widget för puff i header
    register_sidebar(array(
        "name"          => "Puff i header",
        "id"            => "header-puff",
        "before_widget" => "",
        "after_widget"  => "",
        "before_title"  => "<h3>",
        "after_title"   => "</h3>",
    ));

    // Widget för puff i sidebar
    register_sidebar(array(
        "name"          => "Puff i sidebar",
        "id"            => "sidebar-puff",
        "before_widget" => "<div class='sidebar-puff'>",
        "after_widget"  => "</div>",
        "before_title"  => "<h3>",
        "after_title"   => "</h3>",
    ));

    // Widget för footer
    register_sidebar(array(
        "name"          => "Footer Widget",
        "id"            => "footer-widget",
        "before_widget" => "<div class='footer-widget'>",
        "after_widget"  => "</div>",
        "before_title"  => "<h2>",
        "after_title"   => "</h2>",
    ));
}

// Inaktivera blockeditorn för widgetar
add_filter("use_widgets_block_editor", "__return_false");

// Anpassa headerbild
$args = array(
    "default-image" => get_template_directory_uri() . "/img/hero.jpg",
    "width" => 1920,
    "height" => 1080,
    "uploads" => true, // Ladda upp egna bilder
    "flex-height" => true, // Dynamisk höjd
    "flex-width" => true, // Dynamisk bredd
    "video" => true, // Aktivera stöd för video
);

// Aktivera stöd för dynamisk headerbild
add_theme_support("custom-header", $args);

// Aktivera stöd för dynamiska texter i WP Customizer
function theme_customize_register($wp_customize)
{
    // Lägg till en inställning för hero-text
    $wp_customize->add_setting("hero_text", array(
        "default"           => "Oförglömliga upplevelser i en arktisk miljö", // Standardtext
        "sanitize_callback" => "sanitize_text_field", // Rensa bort skadlig kod
    ));

    // Lägg till en kontroll för hero-text i Header Media-sektionen
    $wp_customize->add_control("hero_text_control", array(
        "label"    => "Hero Text", // Namn på inställningen
        "section"  => "header_image", // Sektionen för headerbild
        "settings" => "hero_text", // Inställning för texten
        "type"     => "text", // Textfält
        "active_callback" => "is_front_page", // Visa bara på startsidan
        "priority" => 1, // Placering i sektionen
    ));
}

// Aktivera stöd för dynamiska texter
add_action("customize_register", "theme_customize_register");

// Ta bort kommentarer i admin
add_action("admin_menu", "remove_menus");
function remove_menus()
{
    remove_menu_page("edit-comments.php");
}

// Aktivera stöd för dynamisk titel
add_theme_support("title-tag");

// Lägg till filter - skapa div runt formulär
add_filter("wpcf7_form_elements", function ($content) {
    // Omge formuläret med en div med ID
    $content = "<div class='contact-form'>" . $content . "</div>";
    return $content;
});