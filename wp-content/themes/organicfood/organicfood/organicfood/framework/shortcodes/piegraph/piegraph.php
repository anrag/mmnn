<?php
function ww_shortcode_piegraph_render($atts, $content = null) {
    global $post, $wp_query;
    extract(shortcode_atts(array(
            'title' => '',
            'percent' => 0,
            'radius' => 100,
            'stroke_color' => '#FFF',
            'el_class' => ''
    ), $atts));
    $date = 'd'. time() . '_' . uniqid(true);
    ob_start();
    ?>
        <div class="pie-graph <?php echo $el_class;?>" data-id="percent_loader<?php echo $date; ?>" data-percent="<?php echo $percent;?>" data-radius="<?php echo $radius;?>" data-color="<?php echo $stroke_color;?>">
            <canvas id="percent_loader<?php echo $date; ?>" class="percent_loader" width="<?php print $radius*2; ?>" height="<?php print $radius*2; ?>"></canvas>
            <h3><?php echo $title;?></h3>
        </div>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('ww-shortcode-piegraph', 'ww_shortcode_piegraph_render'); }
