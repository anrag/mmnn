<?php
function cs_zoomimg_render($atts) {
		extract(shortcode_atts(array(
		'image' => ''
                ), $atts));
                if(is_numeric($image)) {
                    $image_src = wp_get_attachment_url( $image );
                }else {
                    $image_src = $image;
                }
            ob_start();
            ?>
            <div class="magnify">
                <div style="background: url(<?php echo $image_src;?>) repeat scroll 50% 50%" class="large"></div>
                <img class="small" src="<?php echo $image_src;?>" alt="">
            </div>
            <?php
        return '<div class="content">' . ob_get_clean() . '</div>';
}

if(function_exists('insert_shortcode')) { insert_shortcode('cs-zoomimg', 'cs_zoomimg_render'); }
