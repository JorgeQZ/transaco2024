<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

</head>

<body>

    <header>

        <div class="contenedor-header">
            <img src="<?php echo get_template_directory_uri(); ?>/imgs/Logo owens.png" alt="Logo Owens">

            <!-- Botón de menú hamburguesa -->
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                &#9776;
            </button>

            <div class="menu-web">
                <?php
                $args = array(
                    "theme_location" => "header",
                    "container" => "nav",
                    "container_class" => "header"
                );
                wp_nav_menu($args);
                ?>
            </div>
        </div>

        <div class="menu-movil">
            <?php
            $args = array(
                "theme_location" => "header",
                "container" => "nav",
                "container_class" => "header"
            );
            wp_nav_menu($args);
            ?>
        </div>

    </header>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('.menu-movil');

        menuToggle.addEventListener('click', function() {
            menuToggle.classList.toggle('active');

            if (mobileMenu.classList.contains('show')) {
                mobileMenu.classList.remove('show');
                setTimeout(() => {
                    mobileMenu.style.display = 'none';
                }, 500); // Espera a que termine la transición
            } else {
                mobileMenu.style.display = 'block';
                setTimeout(() => {
                    mobileMenu.classList.add('show');
                }, 10); // Delay pequeño para permitir que display: block; tome efecto antes de añadir 'show'
            }
            });
        });
    </script>
