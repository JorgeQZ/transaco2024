<?php
get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/noticias.css" type="text/css" />

<main>
    <div class="contenedor-general">
        <h1><?php printf( __( 'Resultados de búsqueda para: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

        <div class="contenedor-noticias">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <div class="contenedor-noticia">
                    <img class="imagen" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <p class="titulo"><?php the_title(); ?></p>
                    <p class="fecha"><?php echo get_the_date(); ?></p>
                    <p class="descripcion"><?php the_excerpt(); ?></p> <!-- Usa the_excerpt en lugar de the_content para una descripción corta -->
                    <a class="vermas" href="<?php the_permalink(); ?>">VER MÁS</a>
                </div>

            <?php endwhile; else : ?>
                <p><?php _e('No se encontraron resultados para tu búsqueda.'); ?></p>
            <?php endif; ?>
        </div>

        <div class="paginacion">
            <?php
            global $wp_query;
            $total_pages = $wp_query->max_num_pages;
            $current_page = max(1, get_query_var('paged'));

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
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
?>
