<?php

function transaco_menus() {
    register_nav_menus(array(
        'header' => __('Header', 'Transaco 2024')
    ));
}

add_action('init', 'transaco_menus');

function add_theme_scripts() {
    wp_enqueue_style( 'generals', get_template_directory_uri(  ). '/css/generals.css');
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts');