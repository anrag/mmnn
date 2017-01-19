<?php
function block_number_func($atts) {
    $type = $text = $title = $block_number_content = $color = $background = $el_class = $text_attr = '';
    extract(shortcode_atts(array(
        'type' => '',
        'text' => '',
        'title' => '',
        'block_number_content' => '',
        'color' => '',
        'background' => '',
        'el_class' => ''
    ), $atts));

    $class = array();
    $class[] = 'de-blocknumber';
    $class[] = $el_class;
    
    if($color != '' || $background != ''){
        $text_attr .= ' style="';
        if($color != ''){ $text_attr .= 'color:'.esc_attr($color).';'; }
        if($background != ''){ $text_attr .= 'background:'.esc_attr($background).';'; }
        $text_attr .= '"';
    }
    ob_start();
    
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
        <span class="<?php echo esc_attr($type); ?>" <?php echo $text_attr; ?>><?php echo $text; ?></span>
        <?php if(!empty($title)){ ?>
            <h4 class="box-title"><strong><?php echo $title; ?></strong></h4>
        <?php } ?>
        <?php echo $block_number_content; ?>
    </div>
    <?php
    
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('block-number', 'block_number_func'); }
