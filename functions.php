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
        "before_widget" => "<div class='widget'>",
        "after_widget"  => "</div>",
        "before_title"  => "<h3>",
        "after_title"   => "</h3>",
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