<?php
function cs_dropcap_render($params, $content = null) {
	extract(shortcode_atts(array(
        ), $params));
        ob_start();
        ?>
        <div class="exp-dropcap"><?php echo $content;?></div>
        <?php
	return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('cs-dropcap', 'cs_dropcap_render'); }
