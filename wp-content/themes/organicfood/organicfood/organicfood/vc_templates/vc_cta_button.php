<?php
$output = $color = $icon = $size = $target = $href = $title = $call_text = $position = $el_class = '';
extract(shortcode_atts(array(
    'button_type' => 'btn-default',
    'size' => '',
    'target' => '',
    'href' => '',
    'title' => __('Text on the button', "organicfood"),
    'call_text' => '',
    'position' => 'cta_align_right',
    'el_class' => '',
    'css_animation' => ''
), $atts));

$el_class = $this->getExtraClass($el_class);

if ( $target == 'same' || $target == '_self' ) { $target = ''; }
if ( $target != '' ) { $target = ' target="'.$target.'"'; }


$button_type = ( $button_type != '' ) ? ' btn '.$button_type : '';
$size = ( $size != '' && $size != '' ) ? ' '.$size : ' '.$size;

$a_class = '';
if ( $el_class != '' ) {
    $tmp_class = explode(" ", $el_class);
    if ( in_array("prettyphoto", $tmp_class) ) {
        wp_enqueue_script( 'prettyphoto' );
        wp_enqueue_style( 'prettyphoto' );
        $a_class .= ' prettyphoto'; $el_class = str_ireplace("prettyphoto", "", $el_class);
    }
}

if ( $href != '' ) {
    $button = '<span class=" '.$button_type.$size.'">'.$title.'</span>';
    $button = '<a class="wpb_button_a cs-button-call'.$a_class.'" href="'.$href.'"'.$target.'>' . $button . '</a>';
} else {
    //$button = '<button class=" '.$button_type.$size.$icon.'">'.$title.$i_icon.'</button>';
    $button = '';
    $el_class .= ' cta_no_button';
}
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'cs_call_to_action wpb_content_element vc_clearfix ' . $position . $el_class, $this->settings['base'], $atts );
$css_class .= $this->getCSSAnimation($css_animation);

$output .= '<div class="'.$css_class.'">';
if ( $position != 'cta_align_bottom' ) $output .= $button;
$output .= apply_filters('wpb_cta_text', '<span class="wpb_call_text">'. $call_text . '</span>', array('content'=>$call_text));
//$output .= '<span class="wpb_call_text">'. $call_text . '</span>';
if ( $position == 'cta_align_bottom' ) $output .= $button;
$output .= '</div> ' . $this->endBlockComment('.cs_call_to_action') . "\n";

echo $output;