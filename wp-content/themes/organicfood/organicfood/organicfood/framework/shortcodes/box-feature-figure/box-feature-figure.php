<?php
function box_feature_figure_func($atts, $content = null) {
    $style = $image = $heading = $title = $icon = $el_class = '';
    extract(shortcode_atts(array(
        'style' => 'box-feature',
        'image' => '',
        'title' => '',
        'icon' => '',
        'animation' => '',
        'el_class' => ''
    ), $atts));
    $class = array();
    $class[] = 'box-feature-figure';
    $class[] = getCSSAnimation($animation);
    $class[] = $el_class;
    ob_start();
    require get_template_directory()."/framework/shortcodes/box-feature-figure/styles/{$style}.php";
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('box-feature-figure', 'box_feature_figure_func'); }
