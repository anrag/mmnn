<?php
function block_text_render($params, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'color' => '',
        'background' => '',
        'border_width' => '',
        'border_style' => '',
        'border_color' => '',
        'padding' => 0,
    ), $params));
    $style = array();
    if($color) $style[] = "color:{$color}";
    if($background) $style[] = "background:{$background}";
    if($border_width) $style[] = "border-width:{$border_width}";
    if($border_style) $style[] = "border-style:{$border_style}";
    if($border_color) $style[] = "border-color:{$border_color}";
    if($padding||$padding==0) $style[] = "padding:{$padding}";
    ob_start();
    ?>
    <div style="<?php echo implode(';',$style);?>" class="exp-block-text <?php echo $type;?>">
        <?php echo $content; ?>
    </div>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('block-text', 'block_text_render'); }
