<?php
function cineni_enqueue_styles()
{
    wp_enqueue_style(
        'style-principal',
        get_stylesheet_uri()
    );

    wp_enqueue_style(
        'titles',
        get_template_directory_uri() . '/assets/css/titles.css', array('style-principal')
    );

    wp_enqueue_style(
        'front-page',
        get_template_directory_uri() . '/assets/css/front-page.css', array('style-principal')
    );

    wp_enqueue_style(
        'salles',
        get_template_directory_uri() . '/assets/css/salles.css', array('style-principal')
    );

    wp_enqueue_style(
        'mag',
        get_template_directory_uri() . '/assets/css/mag.css', array('style-principal')
    );

    wp_enqueue_style(
        'page-about',
        get_template_directory_uri() . '/assets/css/about.css', array('style-principal')

    wp_enqueue_style(
        'contact-forms',
        get_template_directory_uri() . '/assets/css/contact-forms.css', array('style-principal')

    );
}

add_action('wp_enqueue_scripts', 'cineni_enqueue_styles');

function theme_setup()
{

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');

register_nav_menus([
    'main' => 'Menu principal',
]);