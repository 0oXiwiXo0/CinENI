<?php
function cineni_enqueue_styles()
{
    wp_enqueue_style(
        'cineni',
        get_stylesheet_uri() // ça pointe sur style.css à la racine du thème
    );
}
add_action('wp_enqueue_scripts', 'cineni_enqueue_styles');

function theme_setup()
{

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');

register_nav_menus( [
    'main' => 'Menu principal',
] );