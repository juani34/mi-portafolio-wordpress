<?php
// Cargar el CSS del tema padre + hijo
add_action('wp_enqueue_scripts', 'cargar_estilos_tema_hijo');
function cargar_estilos_tema_hijo() {
    wp_enqueue_style('generatepress-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('generatepress-child-style', get_stylesheet_uri());
}
?>
