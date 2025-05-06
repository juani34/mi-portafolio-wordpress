<?php
/*
Plugin Name: Team Manager
Description: Añade un CPT para miembros del equipo.
Version: 1.0
*/

function crear_cpt_team() {
    register_post_type('team_member',
        array(
            'labels' => array(
                'name' => 'Miembros del Equipo',
                'add_new_item' => 'Añadir Nuevo Miembro',
            ),
            'public' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-groups',
        )
    );
}
add_action('init', 'crear_cpt_team');
?>