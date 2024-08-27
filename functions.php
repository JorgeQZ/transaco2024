<?php

function transaco_menus()
{
    register_nav_menus(array(
        'header' => __('Header', 'Transaco 2024')
    ));
}

add_action('init', 'transaco_menus');
