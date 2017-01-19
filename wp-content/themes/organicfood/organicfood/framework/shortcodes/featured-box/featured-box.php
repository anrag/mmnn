<?php
function featured_box_func($atts, $content=null) {
    $style = $title = $icon = $animation = $el_class = '';
    extract(shortcode_atts(array(
        'box_type' => 'text',
        'box_position' => '',
        'box_style' => '',
        'box_inner_type' => '',
        'box_text' => '',
        'box_icon' => '',
        'box_image' => '',
        'box_title' => '',
        'animation' => '',
        'el_class' => ''
    ), $atts));

    $class = array();
    $class[] = 'dexp-shortcodes-box';
    $class[] = $box_type;
    $class[] = $box_position;
    $class[] = $box_style;
    $class[] = $box_inner_type;
    $class[] = getCSSAnimation($animation);
    $class[] = $el_class;
    ob_start();
    
    include "tpl-$box_type.php";
    
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('featured-box', 'featured_box_func'); }
