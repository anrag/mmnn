<?php
function ww_shortcode_plan_render($atts, $content = null) {
    global $post, $wp_query;
    extract(shortcode_atts(array(
            'name' => '',
            'featured' => 0,
            'price' => '',
            'url' => '#',
            'target' => '_self',
			'btn_text' => 'Order Now',
            'el_class' => ''
    ), $atts));
    $plan_class = 'plan';
    $featured_text = $featured==1?'<span class="uk-badge uk-badge-danger">Popular</span>':'';
    $plan_class .= $featured==1?' featured':'';
    $plan_class .= $el_class!=''?' '.$el_class:'';
    ob_start();
    ?>
        <ul class="<?php echo $plan_class;?>"><li class="plan-name"><?php echo $name;?> <?php echo $featured_text;?></li>
            <li class="plan-price"><strong><?php echo $price;?></strong></li>
            <?php echo $content;?>
            <li><a target="<?php echo $target;?>" href="<?php echo $url;?>" class="btn"><?php echo $btn_text; ?></a></li>
        </ul>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('ww-shortcode-plan', 'ww_shortcode_plan_render'); }
