<?php
/*
Plugin Name: Gestion salles
Description: Plugin permettant de configurer la gestion des salles
Version: 0.0.1
Author: Glizdöf
*/

//Pour autoriser l'exécution de ce fichier uniquement depuis le back office de WordPress
if(!defined('ABSPATH')) {
    exit();
}

function gestion_salles_init()
{
    register_post_type('gestion_salles', array(
        'labels' => array(
            'name' => __('Salles', 'gestion_salles'),
            'singular_name' => __('Salle', 'gestion_salles'),
            'menu_name' => __('Salles', 'gestion_salles'),
            'name_singular' => __('Salle', 'gestion_salles'),
            'all_items' => __('Tous les Salles', 'gestion_salles'),
            'add_new' => __('Ajouter', 'gestion_salles'),
            'add_new_item' => __('Ajouter Salle', 'gestion_salles'),
            'edit' => __('Editer', 'gestion_salles'),
            'edit_item' => __('Editer Salle', 'gestion_salles'),
            'new_item' => __('Nouvelle Salle', 'gestion_salles'),
            'view' => __('Afficher', 'gestion_salles'),
            'view_item' => __('Afficher', 'gestion_salles'),
            'search_items' => __('Rechercher', 'gestion_salles'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 3,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_icon' => 'dashicons-video-alt2',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'gestion-salles'),
    ));
}
add_action('init', 'gestion_salles_init');


function gestion_salles_taxonomy_init() {
    register_taxonomy('gestion_salles',
    'gestion_salles',
    array(
        'labels' => array(
            'name' => __('Salles', 'gestion_salles'),
           'add_new_item' => __('Ajouter Salle', 'gestion_salles'),
            )
    ));
}
add_action('init', 'gestion_salles_taxonomy_init');

function gestion_salles_metabox(){
    add_meta_box(
        'gestion_salles_infos',
        __('Informations de la salle', 'gestion_salles'),
        'gestion_salles_metabox_callback',
        'gestion_salles',
        'normal',
        'high'

    );
}
add_action('add_meta_boxes', 'gestion_salles_metabox');



function gestion_salles_metabox_callback($post){
    $fields = [
        'ville' => 'Ville',
        'places_total' => 'Nombre total de places',
        'places_balcon' => 'Places en balcon',
        'places_ab' => 'Places en zone A&B',
        'places_pmr' => 'Places PMR',
        'prix_balcon' => 'Prix en balcon',
        'prix_ab' => 'Prix zone A&B',
        'prix_pmr' => 'Prix PMR',
        'url' => 'URL Tarif/disponibilité'
    ];

    wp_nonce_field(basename(__FILE__), 'gestion_salles_nonce');

    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        echo "<p><label for='{$key}'><strong>{$label}</strong></label><br />";
        echo "<input type='text' name='{$key}' value='" . esc_attr($value) . "' class='widefat' /></p>";
    }
}

function gestion_salles_save_postdata($post_id){
    if (!isset($_POST['gestion_salles_nonce']) || !wp_verify_nonce($_POST['gestion_salles_nonce'], basename(__FILE__))) {
        return;
    }

    $fields = ['ville', 'places_total', 'places_balcon', 'places_ab', 'places_pmr', 'prix_balcon', 'prix_ab', 'prix_pmr', 'url'];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'gestion_salles_save_postdata');


