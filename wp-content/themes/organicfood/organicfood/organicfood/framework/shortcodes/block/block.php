<?php
function block_func($atts, $content = null) {
    $style = $image = $title = $el_class = '';
    extract(shortcode_atts(array(
        'style' => 'style1',
        'image' => '',
        'mosaic_hover' => 0,
        'title' => '',
        'link' => '',
        'el_class' => ''
    ), $atts));

    $content = wpb_js_remove_wpautop($content, true);

    $class = array();
    $class[] = $style;
    $class[] = $el_class;
    ob_start();
    
    include "tpl-$style.php";
    
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('block', 'block_func'); }
