<?php
function cshero_icon($params, $content = null) {
    extract(shortcode_atts(array(
        'type' => '',
        'color'=>'',
        'link' => '',
        'class' => '',
        'fontsize'=>''
    ), $params));
    if($color!=''){
        $color='color:'.$color.';';
    }
    if($fontsize!=''){
        $fontsize=' font-size:'.$fontsize.';';
    }
    if($content){
    	$content = '<span class="cs_icons"> '.esc_attr($content).'</span>';
    }
    ob_start();
    ?>
    <?php if($link): ?>
    	<a class="cs_icons" target="_blank" href="<?php echo esc_url($link); ?>">
    		<i class=" <?php echo esc_attr($type) . ' ' . esc_attr($class);?>" style="<?php echo esc_attr($color).esc_attr($fontsize);?>">
    			<?php echo $content; ?>
    		</i>
    	</a>
    <?php else : ?>
        <i class=" <?php echo esc_attr($type) . ' ' . esc_attr($class);?>" style="<?php echo esc_attr($color).esc_attr($fontsize);?>">
            <?php echo $content; ?>
    	</i>
    <?php endif; ?>
    <?php
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('icon', 'cshero_icon'); }
