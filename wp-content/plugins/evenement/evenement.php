


<?php
/*
Plugin Name: Création d'évènement
Description: Plugin permettant de créer de nouveaux évènements
Version: 0.0.1
Author: Glizdöf
*/

// Sécurité : interdiction d'accès direct
if (!defined('ABSPATH')) {
    exit();
}

// Enregistrement du Custom Post Type "evenement"
function creation_evenement_init() {
    register_post_type('evenement', array(
        'labels' => array(
            'name' => __('Évènements', 'creation_evenement'),
            'singular_name' => __('Évènement', 'creation_evenement'),
            'menu_name' => __('Évènements', 'creation_evenement'),
            'all_items' => __('Tous les évènements', 'creation_evenement'),
            'add_new' => __('Ajouter', 'creation_evenement'),
            'add_new_item' => __('Ajouter un évènement', 'creation_evenement'),
            'edit_item' => __('Modifier l\'évènement', 'creation_evenement'),
            'new_item' => __('Nouvel évènement', 'creation_evenement'),
            'view_item' => __('Afficher l\'évènement', 'creation_evenement'),
            'search_items' => __('Rechercher des évènements', 'creation_evenement'),
            'not_found' => __('Aucun évènement trouvé', 'creation_evenement'),
            'not_found_in_trash' => __('Aucun évènement trouvé dans la corbeille', 'creation_evenement'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'menu_icon' => 'dashicons-megaphone',
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'evenement'),
    ));
}
add_action('init', 'creation_evenement_init');

// Enregistrement de la taxonomie "categorie_evenement"
function creation_evenement_taxonomy_init() {
    register_taxonomy('categorie_evenement', 'evenement', array(
        'labels' => array(
            'name' => __('Catégories Évènements', 'creation_evenement'),
            'add_new_item' => __('Ajouter une catégorie d\'évènement', 'creation_evenement'),
            'new_item_name' => __('Nouvelle catégorie d\'évènement', 'creation_evenement'),
            'menu_name' => __('Catégories Évènements', 'creation_evenement'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'creation_evenement_taxonomy_init');

// Ajout de la métabox personnalisée
function creation_evenement_add_metabox() {
    add_meta_box(
        'creation_evenement_infos',
        __('Informations de l\'évènement', 'creation_evenement'),
        'creation_evenement_metabox_callback',
        'evenement',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'creation_evenement_add_metabox');


function creation_evenement_metabox_callback($post) {
    $fields = [
        'jour_evenement' => "Jour de l'évènement",
        'titre_film' => "Titre du film",
        'type_film' => "Type du film",
        'contenu_film' => "Contenu du film",
        'url_film' => "URL du film",
    ];

    wp_nonce_field(basename(__FILE__), 'creation_evenement_nonce');

    foreach ($fields as $key => $label) {
        $value = get_post_meta($post->ID, $key, true);
        $type = ($key === 'url_film') ? 'url' : 'text';
        echo "<p><label for='{$key}'><strong>{$label}</strong></label><br />";
        echo "<input type='{$type}' id='{$key}' name='{$key}' value='" . esc_attr($value) . "' class='widefat' /></p>";
    }
}


function creation_evenement_save_postdata($post_id) {
    // Vérifications de sécurité
    if (!isset($_POST['creation_evenement_nonce']) || !wp_verify_nonce($_POST['creation_evenement_nonce'], basename(__FILE__))) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) !== 'evenement') {
        return;
    }

    // Champs à sauvegarder
    $fields = [
        'jour_evenement',
        'titre_evenement',
        'titre_film',
        'type_film',
        'contenu_film',
        'url_film',
    ];

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            if ($field === 'url_film') {
                $value = esc_url_raw($_POST[$field]);
            } else {
                $value = sanitize_text_field($_POST[$field]);
            }
            update_post_meta($post_id, $field, $value);
        }
    }
}
add_action('save_post', 'creation_evenement_save_postdata');
