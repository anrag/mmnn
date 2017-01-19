<?php
function autoCompileLessPresets($inputFile) {
    require_once ( ABS_PATH . '/framework/lib/lessc.inc.php' );
    $options = of_get_options();
    $colorScheme = $options['preset_color_scheme'];
    if (isset($_COOKIE['preset_color_scheme'])) {
        $colorScheme = $_COOKIE['preset_color_scheme'];
    }
    /* preset color*/
    $preset = get_option($colorScheme);
    $primary_color = setVariable($preset['primary_color'],'#69bd43','#69bd43');
    $heading_color = setVariable($preset['heading_color'],'#666666','#666666');
    $link_color = setVariable($preset['link_color'],'#69bd43','#69bd43');
    $link_color_hover = setVariable($preset['link_color_hover'],'#3f7228','#3f7228');
    $button_text_color = setVariable($preset['button_text_color'],'#FFF','#FFF');
    $bg_color = setVariable($preset['bg_color'],'#FFF','#FFF');
    $body_text_color = setVariable($preset['body_text_color'],'#666666','#666666');
    /* end preset color*/
    $less = new lessc;
    $less->setFormatter("classic");
    $less->setPreserveComments(false);   
    $variables = array(
        "primary_color" => $primary_color,
        "heading_color" => $heading_color,
        "link_color" => $link_color,
        "link_color_hover" => $link_color_hover,
        "button_text_color" => $button_text_color,
        "bg_color" => $bg_color,
        "body_text_color" => $body_text_color
    );
    $outputFile = ABS_PATH.'/css/presets/'.$colorScheme.'.css';
    $src = URI_PATH.'/css/presets/'.$colorScheme.'.css';
    $tmp_color_scheme = get_option('tmp_color_scheme');
    $less->setVariables($variables);
    $compile = $less->checkedCompile($inputFile, $outputFile);
    if ($compile==true){
        wp_enqueue_style('preset', $src); return;
    }else{
        foreach($variables as $k=>$v){
            $tmp = isset($tmp_color_scheme[$k])?$tmp_color_scheme[$k]:'';
            if($v != $tmp){
                update_option('tmp_color_scheme',$variables);
                $less->compileFile($inputFile, $outputFile);
                break;
            }
        }
        wp_enqueue_style('preset', $src);
    }
}
function autoCompileLess($inputFile, $outputFile) {
    require_once ( ABS_PATH . '/framework/lib/lessc.inc.php' );
    global $post;
    $pageID = null;
    if($post){
        $pageID = $post->ID;
    }
    $options = of_get_options();
    /* main */
    $primary_color = setVariable($options['primary_color'],'#69bd43','#69bd43');
    $body_text_color = $options['body_text_color'];
    $body_font_size = $options['body_font_size'];
    $link_color = $options['link_color'];
    $link_color_hover = $options['link_color_hover'];
    $header_padding = $options['header_padding'];
    $header_margin = $options['header_margin'];
    $bg_color = $options['bg_color'];
    $bg_pattern_option = $options['bg_pattern_option'];
    $bg_full = $options['bg_full']?'100% auto':'auto';
    $bg_repeat = $options['bg_repeat'];
    $bg_pos = $options['bg_pos'];
    if($bg_pattern_option){
        $bg_full = 'auto';
        $bg_repeat = 'repeat';
        $bg_pos = 'top left';
    }
    
    /*menu*/
    $nav_padding = $options['nav_padding'];
    $menu_fontsize_first_level = $options['menu_fontsize_first_level'];
    $menu_fontsize_sub_level = $options['menu_fontsize_sub_level'];
    $menu_hover_first_color = $options['menu_hover_first_color'];
    $menu_first_color = $options['menu_first_color'];
    $menu_sub_bg_color = $options['menu_sub_bg_color'];
    $menu_bg_hover_color = $options['menu_bg_hover_color'];
    $menu_sub_color = $options['menu_sub_color'];
    $menu_sub_hover_color = $options['menu_sub_hover_color'];
    $menu_sub_sep_color = $options['menu_sub_sep_color'];
    /*end menu*/
    /*Header*/
    $header_transparent = $options['header_transparent'];
    $header_sticky_bg_color = $options['header_sticky_bg_color'];
    $header_sticky_opacity = $options['header_sticky_opacity'];
    $header_bg_color = $options['header_bg_color'];
    $header_fixed = $options['header_fixed'];
    $cs_header_fixed_top = get_post_meta($pageID, 'cs_header_fixed_top', true)?get_post_meta($pageID, 'cs_header_fixed_top', true):0;
    $cs_header_bg_color = get_post_meta($pageID, 'cs_header_bg_color', true)?get_post_meta($pageID, 'cs_header_bg_color', true):$header_bg_color;
    $cs_header_bg_opacity = get_post_meta($pageID, 'cs_header_bg_opacity', true)?get_post_meta($pageID, 'cs_header_bg_opacity', true):$header_transparent;
    /*End Header*/
    /*Title Bar*/
    $title_bar_bg_color = $options['title_bar_bg_color'];
    $title_bar_heading_color = $options['title_bar_heading_color'];
    $title_bar_text_color = $options['title_bar_text_color'];
    $title_bar_link_color = $options['title_bar_link_color'];
    $title_bar_link_color_hover = $options['title_bar_link_color_hover'];
    $bg_size_title_bar_blog = $options['background_size_title_bar_blog'];
    $bg_repeat_title_bar_blog = $options['background_repeat_title_bar_blog'];
    $bg_position_title_bar_blog = $options['background_position_title_bar_blog'];
    $padding_title_bar_blog = $options['padding_title_bar_blog'];
    $margin_title_bar_blog = $options['margin_title_bar_blog'];
    
    /*End Title Bar*/
    /*Footer*/
    $footer_top_bg_color = $options['footer_top_bg_color'];
    $footer_bottom_bg_color = $options['footer_bottom_bg_color'];
    $footer_headings_color = $options['footer_headings_color'];
    $footer_text_color = $options['footer_text_color'];
    $footer_link_color = $options['footer_link_color'];
    $footer_link_hover_color = $options['footer_link_hover_color'];
    $footer_top_padding = $options['footer_top_padding'];
    $footer_top_margin = $options['footer_top_margin'];
    $footer_bottom_padding = $options['footer_bottom_padding'];
    $footer_bottom_margin = $options['footer_bottom_margin'];
    $footer_top_bg_full = $options['footer_top_bg_full']?'100% auto':'auto';
    $footer_top_bg_repeat = $options['footer_top_bg_repeat'];
    $footer_top_bg_pos = $options['footer_top_bg_pos'];
    /*End Footer*/
    $padding_logo = $options['padding_logo'];
    $margin_logo = $options['margin_logo'];
    $path = URI_PATH;
    $less = new lessc;
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
    $variables = array(
        "body_text_color" => $body_text_color,
        "body_font_size" => $body_font_size,
        "link_color" => $link_color,
        "link_color_hover" => $link_color_hover,
        "header_padding" => $header_padding,
        "header_margin" => $header_margin,
        "primary_color" => $primary_color,
        "bg_color" => $bg_color,
        "bg_full" => $bg_full,
        "bg_repeat" => $bg_repeat,
        "bg_pos" => $bg_pos,
        
        "nav_padding" => $nav_padding,
        "menu_first_color" => $menu_first_color,
        "menu_sub_bg_color" => $menu_sub_bg_color,
        "menu_bg_hover_color" => $menu_bg_hover_color,
        "menu_hover_first_color" => $menu_hover_first_color,
        "menu_sub_color" => $menu_sub_color,
        "menu_sub_hover_color" => $menu_sub_hover_color,
        "menu_sub_sep_color" => $menu_sub_sep_color,
        "menu_fontsize_first_level" => $menu_fontsize_first_level,
        "menu_fontsize_sub_level" => $menu_fontsize_sub_level,
        
        "footer_top_bg_color" => $footer_top_bg_color,
        "footer_bottom_bg_color" => $footer_bottom_bg_color,
        "footer_headings_color" => $footer_headings_color,
        "footer_text_color" => $footer_text_color,
        "footer_link_color" => $footer_link_color,
        "footer_link_hover_color" => $footer_link_hover_color,
        "footer_top_padding" => $footer_top_padding,
        "footer_top_margin" => $footer_top_margin,
        "footer_bottom_padding" => $footer_bottom_padding,
        "footer_bottom_margin" => $footer_bottom_margin,
        "footer_top_bg_full" => $footer_top_bg_full,
        "footer_top_bg_repeat" => $footer_top_bg_repeat,
        "footer_top_bg_pos" => $footer_top_bg_pos,
        
        "header_transparent" => $header_transparent,
        "header_sticky_bg_color" => $header_sticky_bg_color,
        "header_bg_color" => $header_bg_color,
        "header_fixed" => $header_fixed,
        "cs_header_fixed_top" => $cs_header_fixed_top,
        "cs_header_bg_color" => $cs_header_bg_color,
        "cs_header_bg_opacity" => $cs_header_bg_opacity,
        "header_sticky_opacity" => $header_sticky_opacity,
        "padding_logo" => $padding_logo,
        "margin_logo" => $margin_logo,
        "path" => "$path",
        
        "title_bar_bg_color" => $title_bar_bg_color,
        "title_bar_heading_color" => $title_bar_heading_color,
        "title_bar_text_color" => $title_bar_text_color,
        "title_bar_link_color" => $title_bar_link_color,
        "title_bar_link_color_hover" => $title_bar_link_color_hover,
        "bg_size_title_bar_blog" => $bg_size_title_bar_blog,
        "bg_repeat_title_bar_blog" => $bg_repeat_title_bar_blog,
        "bg_position_title_bar_blog" => $bg_position_title_bar_blog,
        "padding_title_bar_blog" => $padding_title_bar_blog,
        "margin_title_bar_blog" => $margin_title_bar_blog,
        
    );
    $tmp_variables = get_option('tmp_variables');
    $cacheFile = $inputFile.".cache";
    foreach($variables as $k=>$v){
        $tmp = isset($tmp_variables[$k])?$tmp_variables[$k]:'';
        if($v != $tmp){
            update_option('tmp_variables',$variables);
            if (file_exists($cacheFile)) {
                unlink($cacheFile);break;
            }
        }
    }
    $less->setVariables($variables);
    if (file_exists($cacheFile)) {
            $cache = unserialize(file_get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($cache);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            file_put_contents($cacheFile, serialize($newCache));
            file_put_contents($outputFile, $newCache['compiled']);
    }
}
function addLessStyle() {
    try {
        $enable_less_style = isset($options['enable_less_style'])?$options['enable_less_style']:1;
        $inputFile = ABS_PATH.'/css/less/presets.less';
        autoCompileLessPresets($inputFile);
        if ($enable_less_style == 1) {
                $inputFile = ABS_PATH.'/css/less/style.less';
                $outputFile = ABS_PATH.'/style.css';
                autoCompileLess($inputFile, $outputFile);
        }
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}
function converStringSelector($string){
    if(empty($string)) return;
    $string_array = explode(',', $string);
    $string_convert = array();
    if($string_array){
        foreach($string_array as $tr){
            if (strpos($tr,'.')) {
                $string_convert['class'][] = substr(trim($tr),1);
            }else if(strpos($tr,'#')){
                $string_convert['id'][] = substr(trim($tr),1);
            }else{
                $string_convert['element'][] = trim($tr);
            }
        }
    }
    return $string_convert;
}
add_action('wp_enqueue_scripts', 'addLessStyle');
/* End less*/