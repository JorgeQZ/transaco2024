<?php

function transaco_menus() {
    register_nav_menus(array(
        'header' => __('Header', 'Transaco 2024'),
        'productos' => __('Productos', 'Transaco 2024')
    ));
}

add_action('init', 'transaco_menus');

function add_theme_scripts() {
    wp_enqueue_style( 'generals', get_template_directory_uri(  ). '/css/generals.css');
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts');

function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 45,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true,
	);
	add_theme_support( 'custom-logo', $defaults );

    add_theme_support( 'post-thumbnails' );

}

add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

function menus_footer() {
    register_sidebar( array(
        'name'          => 'Footer 1',
        'id'            => 'footer_1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 2',
        'id'            => 'footer_2',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 3',
        'id'            => 'footer_3',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 4',
        'id'            => 'footer_4',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 5',
        'id'            => 'footer_5',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 6',
        'id'            => 'footer_6',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Footer 7',
        'id'            => 'footer_7',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'menus_footer' );