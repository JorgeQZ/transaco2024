<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <header>

        <?php
        $args = array(
            "theme_location" => "header",
            "container" => "nav",
            "container_class" => "header"
        );
        wp_nav_menu($args);
        wp
        ?>

    </header>