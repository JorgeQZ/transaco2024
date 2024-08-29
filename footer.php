    <footer>

        <div class="contenedor-footer">

            <div class="menus-footer-superior">
                <?php
                if ( is_active_sidebar( 'footer_1' ) ) {
                    dynamic_sidebar( 'footer_1' );
                }
                ?>
                <div class="contenedor1">
                    <?php
                    if ( is_active_sidebar( 'footer_2' ) ) {
                        dynamic_sidebar( 'footer_2' );
                    }
                    ?>
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
                <?php
                if ( is_active_sidebar( 'footer_3' ) ) {
                    dynamic_sidebar( 'footer_3' );
                }
                ?>
                <?php
                if ( is_active_sidebar( 'footer_4' ) ) {
                    dynamic_sidebar( 'footer_4' );
                }
                ?>
                <?php
                if ( is_active_sidebar( 'footer_5' ) ) {
                    dynamic_sidebar( 'footer_5' );
                }
                ?>
            </div>

            <div class="menus-footer-medio">
                <hr>
                <div class="p-footer-medio">
                    <?php
                    if ( is_active_sidebar( 'footer_6' ) ) {
                        dynamic_sidebar( 'footer_6' );
                    }
                    ?>
                </div>
                <hr>
            </div>

            <div class="menus-footer-inferior">
                <div class="p-footer-inferior">
                    <?php
                    if ( is_active_sidebar( 'footer_7' ) ) {
                        dynamic_sidebar( 'footer_7' );
                    }
                    ?>
                </div>
            </div>

        </div>

    </footer>

    <?php wp_footer(); ?>

</body>
</html>