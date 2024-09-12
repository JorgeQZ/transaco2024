<?php

add_theme_support('post-thumbnails');

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

function load_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');

function noticias_busqueda_ajax() {
    $paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
    $s = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : ''; // Obtiene el término de búsqueda

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'paged' => $paged,
        's' => $s, // Realiza la búsqueda interna pero no muestra el parámetro en la URL
    );

    $entradas = new WP_Query($args);

    ob_start();

    if ($entradas->have_posts()) :
        echo '<div class="contenedor-noticias">';
        while ($entradas->have_posts()) : $entradas->the_post(); ?>
            <div class="contenedor-noticia">
                <img class="imagen" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                <p class="titulo"><?php the_title(); ?></p>
                <p class="fecha"><?php echo get_the_date(); ?></p>
                <p class="descripcion"><?php the_excerpt(); ?></p>
                <a class="vermas" href="<?php the_permalink(); ?>">VER MÁS</a>
            </div>
        <?php endwhile;
        echo '</div>'; // Cierra el contenedor de noticias

        // Genera la paginación
        echo '<div class="contenedor-paginacion">';
        $total_pages = $entradas->max_num_pages;
        if ($total_pages > 1) {
            $current_page = max(1, $paged);
            echo paginate_links(array(
                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                'format'    => '?paged=%#%',
                'current'   => $current_page,
                'total'     => $total_pages,
                'prev_text' => __('&lsaquo; Anterior'),
                'next_text' => __('Siguiente &rsaquo;'),
                'mid_size'  => 2,
                'end_size'  => 1,
            ));
        }
        echo '</div>';
    else :
        echo '<p>No se encontraron resultados.</p>';
    endif;

    $response = ob_get_clean();
    echo $response;

    wp_die();
}
add_action('wp_ajax_noticias_busqueda', 'noticias_busqueda_ajax');
add_action('wp_ajax_nopriv_noticias_busqueda', 'noticias_busqueda_ajax');