<?php

// Registrera dynamiska menyer
add_action("init", "register_my_menus");

function register_my_menus()
{
    register_nav_menus(array(
        "main-nav" => "Huvudmeny"
    ));
}