<?php

namespace includes;
use Walker_Nav_Menu;

class NavWalker extends Walker_Nav_Menu
{
    // Début d'un élément
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $output .= '<div>';
        $title = $item->title;
        $url = $item->url;

        // Exemple : on ajoute une div cachée qui s'affiche au survol via CSS/JS
        $output .= '<a href="' . esc_url($url) . '">' . esc_html($title) . '</a>';
        $output .= '<div class="overlay"></div>';
    }

    function end_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $output .= '</div>';
    }
}