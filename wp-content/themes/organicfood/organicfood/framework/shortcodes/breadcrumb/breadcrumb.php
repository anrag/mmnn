<?php
function breadcrumb_func($atts) {
    $delimiter = $el_class = '';
    extract(shortcode_atts(array( 
        'delimiter' => '/',
        'color' => '#666666',
        'el_class' => ''
    ), $atts));
    
    $classes = array();
    $classes[] = 'cs-breadcrumb';
    $classes[] = $el_class;
    ob_start();
 
    echo '<div id="breadcrumb" class="'.esc_attr(implode(' ', $classes)).'" style="color: '.$color.';">'.cshero_page_breadcrumb($delimiter).'</div>';
    
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('breadcrumb', 'breadcrumb_func'); }
