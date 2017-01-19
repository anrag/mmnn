<?php

$font_color = $output = $el_class = $width = $animationcss = '';
extract(shortcode_atts(array(
            'font_color' => '',
            'el_class' => '',
            'width' => '1/1',
            'css'=>'',
            'animation' => '',
            'column_border' => false,
            'column_style' => '',
            'column_align' => ''
                ), $atts));

$el_class = $this->getExtraClass($el_class);
$width = wpb_translateColumnWidthToSpan($width);

$border_class = "";
if ($column_border) {
    $border_class = " ww-border-radius";
}

$align = "";
if (!empty($column_align)) {
    $align = "text-align: $column_align;";
}

$el_class .= ' wpb_column column_container ' . $animationcss . $border_class.' '.$column_style;

$style = $this->buildStyle( $font_color );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $width . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$css_class .= $this->getCSSAnimation($animation);

$output .= "\n\t".'<div class="'.$css_class.'"'.$style.'';
if (!empty($align))
    $output .= ' style="' . $align . '"';
$output .= '>';
$output .= "\n\t\t".'<div class="wpb_wrapper">';
$output .= "\n\t\t\t".wpb_js_remove_wpautop($content);
$output .= "\n\t\t".'</div> '.$this->endBlockComment('.wpb_wrapper');
$output .= "\n\t".'</div> '.$this->endBlockComment($el_class) . "\n";

echo $output;