<?php
function title_func($atts) {
    $title = $color = $align = $underline =$animation = $el_class = '';
    extract(shortcode_atts(array(
        'title' => '',
        'color' => '#666666',
        'align' => '',
        'underline' => '',
        'animation' => '',
        'el_class' => ''
    ), $atts));

    $class = $style = array();
    $class[] = 'headline';
    $class[] = $align;
    if($underline == 1){
        $class[] = 'underline';
    }  
    if($color){
        $style[] = "color: $color";
    }       
    $class[] = getCSSAnimation($animation);
    $class[] = $el_class;
    ob_start();
    ?>
        <h3 class="<?php echo esc_attr(implode(' ', $class)); ?>" <?php if($style)echo 'style="'.esc_attr(implode('; ', $style)).'"'; ?>>
            <?php echo $title;?>
        </h3>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('title', 'title_func'); }
