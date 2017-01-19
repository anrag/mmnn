<?php
function ww_shortcode_stats_render($atts, $content = null) {
    global $post, $wp_query;
    extract(shortcode_atts(array(
            'timer' => 0,
            'number' => 0,
            'el_class' => ''
    ), $atts));
    $date = 'd'. time() . '_' . uniqid(true);
    ob_start();
    ?>
        <div id ="stats<?php echo $date;?>" class="stats <?php echo $el_class;?>">
            <div data-id="stats<?php echo $date;?>" data-num="<?php echo $timer;?>" data-content="<?php echo $number;?>" class="num"><?php echo $number;?></div>
            <?php if ($content):?>
            <div class="type"><?php echo $content;?></div>
            <?php endif; ?>
        </div>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('ww-shortcode-stats', 'ww_shortcode_stats_render'); }
