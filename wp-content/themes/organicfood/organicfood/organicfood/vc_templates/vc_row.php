<?php
$output = $el_class = null;
extract(shortcode_atts(array(
            'el_class' => '',
            'dt_id' => '',
            'type' => 'ww-default',
            'css' => '',
            'row_responsive_large'=>'',
            'row_responsive_medium'=>'',
            'row_responsive_small'=>'',
            'row_responsive_extra_small'=>'',
            'font_color' => '',
            'row_link_color' => '',
            'row_head_color' => '',
            'row_link_color_hover' => '',
            'full_width' => false,
            'same_height' => '',
            'bg_video_color' => '#FFF',
            'bg_video_transparent' => '0',
            'bg_video_src_mp4' => '',
            'bg_video_src_ogv' => '',
            'bg_video_src_webm' => '',
            'animation' => '',
            'parallax_speed' => '',
            'enable_parallax' => ''
                ), $atts));
/* one page id */
$dt_id = $dt_id?" id='$dt_id'":'';
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
preg_match($reg_exUrl, $css , $url);
$img_info = $data_image_height = null;
/* image_height */
if(isset($url[0])){
    $img_info = @getimagesize($url[0]);
    $data_image_height = " data-background-height='{$img_info[1]}' data-background-width='{$img_info[0]}'";
}
$el_class = $this->getExtraClass($el_class);
/* Responsive */
    $responsive = '';
    if($row_responsive_large){
        $responsive .= ' hidden-lg';
    }
    if($row_responsive_medium){
        $responsive .= ' hidden-md';
    }
    if($row_responsive_small){
        $responsive .= ' hidden-sm';
    }
    if($row_responsive_extra_small){
        $responsive .= ' hidden-xs';
    }
/* row class */
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG,'wpb_row clearfix ' . $el_class . $responsive . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($animation);
/* Link Color */
$link_style = "";
$class_link = vc_shortcode_custom_css_class( $css, '.' );
if($row_link_color || $row_link_color_hover || $row_head_color){
    $link_style .= '<style type="text/css" croped>';
    if($row_head_color){
        $link_style .= "".$class_link." h1,".$class_link." h2,".$class_link." h3,".$class_link." h4,".$class_link." h5,".$class_link." h6 {color: $row_head_color}";
    }
    if($row_link_color){
            $link_style .= "".$class_link." a{color: $row_link_color}";
    }
    if($row_link_color_hover){
            $link_style .= "".$class_link." a:hover{color: $row_link_color_hover}";
    }
    $link_style .= '</style>';
}
/* Text Color */
$style = "";
if($font_color){
    $style = " style='color: $font_color'";
}
/* Full Container */
global $post;
$post_full_width = get_post_meta($post->ID, 'cs_blog_layout', true);
$cl_full_width = 'no-container';
if($post_full_width != 'boxed'){
    if ($full_width == true) {
            $cl_full_width = 'no-container stripe-video-content';
    } else {
            $cl_full_width = 'ww-container';
    }
}
$output = null;
$stripe_classes = array();
$stripe_classes[] = $type;
$data_attr = null;
if ($enable_parallax) {
    $parallax_speed = floatval($parallax_speed);
    if (!$parallax_speed) {
        $parallax_speed = 0.5;
    }
    $stripe_classes[] = $type=='ww-default'?'stripe-parallax-bg':'stripe-parallax-video';
    $data_attr = ' data-parallax-speed="' . $parallax_speed . '"' .$data_image_height;
}
if (!empty($css_class)) {
    $stripe_classes[] = $css_class;
}
if ($same_height) {
    $stripe_classes[] = 'ww-same-height';
}
/* Custom BG */
if ($type=='ww-custom-bg-video') {
    /* video BG */
    $bg_video = null;
    $bg_video_args = array();
    $stripe_classes[] = 'stripe-video-wrap';
    $cl_full_width .= '  stripe-video-content';
    if ($bg_video_src_mp4) {
        $bg_video_args['mp4'] = $bg_video_src_mp4;
    }
    if ($bg_video_src_ogv) {
        $bg_video_args['ogv'] = $bg_video_src_ogv;
    }
    if ($bg_video_src_webm) {
        $bg_video_args['webm'] = $bg_video_src_webm;
    }
    if (!empty($bg_video_args)) {
        $attr_strings = array(
            'loop',
            'muted',
            'preload="auto"',
            'autoplay'
        );
        $bg_video .= sprintf('<div class="stripe-video-bg"><video data-ratio="1.7777777777777777" onloadeddata="javascript:{jQuery(this).attr(\'data-ratio\',this.videoWidth/this.videoHeight)}" class="video-parallax" %s controls="controls">', join(' ', $attr_strings));
        $source = '<source type="%s" src="%s" />';
        foreach ($bg_video_args as $video_type => $video_src) {
            $video_type = wp_check_filetype($video_src, wp_get_mime_types());
            $bg_video .= sprintf($source, $video_type['type'], esc_url($video_src));
        }
        $bg_video .= '</video></div>';
    }
    $output .= '<div'.$dt_id.' class="' . esc_attr(implode(' ', $stripe_classes)) . '"' . $data_attr  . '>';
    $output .= $bg_video;
} else {
    $output .= '<div'.$dt_id.' class="' . esc_attr(implode(' ', $stripe_classes)) . '"' . $data_attr  . '>';
}

/* div parallax */
$output .= '<div class="'. esc_attr($cl_full_width) . '" '.$style.'>';
/* add div row if rows = container*/
if($cl_full_width == 'ww-container'){ $output .= '<div class="row">'; }
/* content */
$output .= wpb_js_remove_wpautop($content);
/* end div row */
if($cl_full_width == 'ww-container'){ $output .= '</div>'; }

$output .= '</div>';
$output .= '</div>' . $this->endBlockComment('row');
$output .= $link_style;
echo $output;
