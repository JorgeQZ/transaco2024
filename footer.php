<footer>

<div class="contenedor-footer">

    <div class="container">
        <div class="column">
            <?php
            if ( is_active_sidebar( 'footer_1' ) ) {
                dynamic_sidebar( 'footer_1' );
            }
            ?>
        </div>
        <div class="column">
            <?php
            if ( is_active_sidebar( 'footer_2' ) ) {
                dynamic_sidebar( 'footer_2' );
            }
            ?>
            <?php
            $args = array(
                "theme_location" => "header",
                "container" => "nav",
                "container_class" => "header"
            );
            wp_nav_menu($args);
            ?>
        </div>
        <div class="column">
            <?php
            if ( is_active_sidebar( 'footer_3' ) ) {
                dynamic_sidebar( 'footer_3' );
            }
            ?>
            <?php
            $args = array(
                "theme_location" => "productos",
                "container" => "nav",
                "container_class" => "productos"
            );
            wp_nav_menu($args);
            ?>
        </div>
        <div class="column">
            <?php
            if ( is_active_sidebar( 'footer_4' ) ) {
                dynamic_sidebar( 'footer_4' );
            }
            ?>
        </div>
        <div class="column">
            <?php
            if ( is_active_sidebar( 'footer_5' ) ) {
                dynamic_sidebar( 'footer_5' );
            }
            ?>
        </div>
    </div>

    <div class="footer-medio">
        <hr>
            <?php
            if ( is_active_sidebar( 'footer_6' ) ) {
                dynamic_sidebar( 'footer_6' );
            }
            ?>
        <hr>
    </div>

    <div class="footer-inferior">
            <?php
            if ( is_active_sidebar( 'footer_7' ) ) {
                dynamic_sidebar( 'footer_7' );
            }
            ?>
    </div>

</div>

</footer>

<?php wp_footer(); ?>

</body>
</html>