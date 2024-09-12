<?php
/*
Template Name: Noticias
*/
?>

<?php
get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/noticias.css" type="text/css" />

<main>
    <div class="contenedor-general">

        <div class="contenedor-search">
            <form id="searchform" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input class="input-buscador" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Buscar noticiawdwdws..." autocomplete="off">
                <input type="hidden" name="post_type" value="post" />
                <button type="submit" class="boton-search"><?php _e('Buscar'); ?></button>
            </form>
        </div>

        <div class="contenedor-noticias">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => $paged,
            );

            $entradas = new WP_Query($args);

            if ( $entradas->have_posts() ) :
                while ( $entradas->have_posts() ) : $entradas->the_post(); ?>

                    <div class="contenedor-noticia">
                        <img class="imagen" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        <p class="titulo"><?php the_title(); ?></p>
                        <p class="fecha"><?php echo get_the_date(); ?></p>
                        <p class="descripcion"><?php the_content(); ?></p>
                        <a class="vermas" href="<?php the_permalink(); ?>">VER MÁS</a>
                    </div>

                <?php endwhile;
            else :
                echo '<p>No se encontraron resultados.</p>';
            endif;
            ?>
        </div>

        <!-- Contenedor vacío donde se insertará la paginación -->
        <div class="contenedor-paginacion">
            <?php
            // Paginación inicial
            $total_pages = $entradas->max_num_pages;
            if ($total_pages > 1) {
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
            }
            ?>
        </div>

    </div>
</main>

<script type="text/javascript">
jQuery(document).ready(function($) {
    function searchNoticias(page = 1) {
        var searchQuery = $('#s').val(); // Obtiene el valor del input de búsqueda
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>', // Usamos admin-ajax.php para la solicitud AJAX
            type: 'GET',
            data: {
                action: 'noticias_busqueda', // Acción AJAX registrada
                s: searchQuery, // Parámetro de búsqueda que se envía, pero no se muestra en la URL
                paged: page // Número de página
            },
            success: function(response) {
                var $response = $('<div>').html(response); // Convierte la respuesta en un objeto jQuery

                // Reemplaza el contenido de las noticias
                $('.contenedor-noticias').html($response.find('.contenedor-noticias').html());

                // Reemplaza la paginación
                $('.contenedor-paginacion').html($response.find('.contenedor-paginacion').html());

                // Actualiza la URL del navegador sin recargar la página (sin mostrar el término de búsqueda)
                var newUrl = '<?php echo home_url('/noticias/page/'); ?>' + page + '/';

                history.pushState(null, null, newUrl); // Actualiza la URL en la barra de direcciones (sin ?s=)
            }
        });
    }

    // Detecta cambios en el input de búsqueda y realiza la búsqueda en tiempo real
    $('#s').on('input', function() {
        searchNoticias(); // Realiza la búsqueda en la primera página
    });

    // Controla los clics en los enlaces de paginación
    $(document).on('click', '.paginacion a', function(e) {
        e.preventDefault(); // Previene el comportamiento por defecto de los enlaces
        var page = $(this).attr('href').split('/page/')[1].split('/')[0]; // Obtiene el número de página de la URL
        searchNoticias(page); // Realiza la búsqueda o paginación en la página seleccionada
    });
});
</script>

<?php
get_footer();
?>
