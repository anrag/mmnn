<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php 
                global $smof_data, $post;
                $responsive = $smof_data['responsive'];
                if($responsive):
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php endif; ?>
        <?php
        if ($smof_data['space_head']) {
            echo $smof_data["space_head"];
        }
        ?>
    <?php require_once ( get_template_directory() . '/framework/includes/header-extend.php' ); ?>
    <?php wp_head(); ?>
    </head>
    <?php
    $body_class = 'csbody';
    $layout = $smof_data['layout'];
    if (isset($_COOKIE['layout'])) {
        $layout = $_COOKIE['layout'];
    }
    $layout_class = $layout=='boxed'? $body_class .= ' boxed':$body_class .= ' wide';
    ?>
    <body <?php body_class($body_class); ?>>
        <div id="wrapper">
            <div class="header-wrapper">
            <?php cshero_header(); ?>
            </div>