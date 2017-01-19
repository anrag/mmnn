<?php
function wp_custom_style() {
    global $smof_data, $post;
    $c_pageID = null;
    if($post){
        $c_pageID = $post->ID;
    }
    $custom_style = null;
    if ($smof_data['custom_css']) {
        $custom_style .= "{$smof_data["custom_css"]}";
    }
    $path = URI_PATH;
    $bg_image = $smof_data['bg_image'];
    $bg_pattern_option = $smof_data['bg_pattern_option'];
    $bg_title_bar_blog = $smof_data['background_title_bar_blog'];
    $footer_top_bg_image = $smof_data['footer_top_bg_image'];
    wp_enqueue_style('wp_custom_style', $path . '/css/wp_custom_style.css');
    /*Start Font*/
    $body_font_options = setVariable($smof_data['body_font_options'],'','');
    $custom_bd_font = setVariable($smof_data['custom_body_font_family'],'','');
    $google_bd_font = setVariable($smof_data['google_body_font_family'],'','');
    $standard_bd_font = setVariable($smof_data['standard_body_font_family'],'','');
    $body_font_family_selector = setVariable($smof_data['body_font_family_selector'],'','');
    switch ($body_font_options) {
        case 'Google Font':
            $custom_style .= "{$body_font_family_selector}{ font-family:{$google_bd_font}}";
            break;
        case 'Standard Font':
            $custom_style .= "{$body_font_family_selector}{ font-family:{$standard_bd_font}}";
            break;
        case 'Custom Font':
            $custom_style .= "@font-face {
            font-family: {$custom_bd_font};
            src: url({$path}/fonts/{$custom_bd_font}.eot);
            src: url({$path}/fonts/{$custom_bd_font}.eot?#iefix) format('embedded-opentype'),
            url({$path}/fonts/{$custom_bd_font}.woff) format('woff'),
            url({$path}/fonts/{$custom_bd_font}.ttf) format('truetype'),
            url({$path}/fonts/{$custom_bd_font}.svg#{$custom_bd_font}) format('svg');
            font-weight: normal;
            font-style: normal;
            }
            {$body_font_family_selector}{ font-family:{$custom_bd_font}}
            ";
            break;
    }
    
    $other_font_options = setVariable($smof_data['other_font_options_0'],'','');
    $custom_other_font = setVariable($smof_data['custom_other_font_family_0'],'','');
    $google_other_font = setVariable($smof_data['google_other_font_family_0'],'','');
    $standard_other_font = setVariable($smof_data['standard_other_font_family_0'],'','');
    $other_font_selector = setVariable($smof_data['other_font_family_selector_0'],'','');
    switch ($other_font_options) {
        case 'Google Font':
            $custom_style .= "{$other_font_selector}{ font-family:{$google_other_font}}";
            break;
        case 'Standard Font':
            $custom_style .= "{$other_font_selector}{ font-family:{$standard_other_font}}";
            break;
        case 'Custom Font':
            $custom_style .= "@font-face {
            font-family: {$custom_other_font};
            src: url({$path}/fonts/{$custom_other_font}.eot);
            src: url({$path}/fonts/{$custom_other_font}.eot?#iefix) format('embedded-opentype'),
            url({$path}/fonts/{$custom_other_font}.woff) format('woff'),
            url({$path}/fonts/{$custom_other_font}.ttf) format('truetype'),
            url({$path}/fonts/{$custom_other_font}.svg#{$custom_other_font}) format('svg');
            font-weight: normal;
            font-style: normal;
            }
            {$other_font_selector}{ font-family:{$custom_other_font}}
            ";
            break;
    }
    if($bg_pattern_option){
        $bg_pattern = $smof_data['bg_pattern'];
        $custom_style .= "body.csbody{
            background-image: url('{$bg_pattern}');
        }
        ";
    }elseif($bg_image){
        $custom_style .= "body.csbody{
            background-image: url('{$bg_image}');
        }
        ";
    }
    if($bg_title_bar_blog){
        $custom_style .= ".header-site-wrap{
            background-image: url('{$bg_title_bar_blog}');
        }
        ";
    }
    if($footer_top_bg_image){
        $custom_style .= "#footer-top{
            background-image: url('{$footer_top_bg_image}');
        }
        ";
    }
    wp_add_inline_style( 'wp_custom_style', $custom_style );
    /*End Font*/
}
add_action( 'wp_enqueue_scripts', 'wp_custom_style' );