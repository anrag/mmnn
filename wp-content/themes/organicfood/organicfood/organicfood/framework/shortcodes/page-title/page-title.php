<?php
function page_title_func($atts) {
    $type = $custom_title = $heading = $color = $color_style = $el_class = '';
    extract(shortcode_atts(array( 
        'type' => 'default',
        'custom_title' => '',
        'color' => '#666666',
        'padding' => '0',
        'margin' => '0',
        'el_class' => ''
    ), $atts));
    $style = array();
    $style[] = "color:{$color}";
    $style[] = "padding:{$padding}";
    $style[] = "margin:{$margin}";
    $classes[] = 'cs-page-title';
    $classes[] = $el_class;
    ob_start();
    ?>
    <div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
        <h2 class="page-title" style="<?php echo implode(';',$style);?>">
            <?php
            if($type == 'default'){
                echo cshero_page_title();
            }else{
                echo $custom_title;
            }
            
            ?>
        </h2>
    </div>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('page-title', 'page_title_func'); }