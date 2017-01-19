<?php
function ww_shortcode_carousel_post_render($atts, $content = null) {
	global $post, $wp_query;
	extract(shortcode_atts(array(
		'post_type' => 'post',
		'category' => '',
		'testimonial_category' => '',
		'clientscategory' => '',
		'produce_category' => '',
		'styles'=> 'style-1-organicfood',
		'testimonial_styles'=> 'style-1-consilium',
		'client_styles'=> 'style-1',
		'produce_styles'=> 'style-1',
		'crop_image' => 0,
		'width_image' => 300,
		'height_image' => 200,
		'width_item' => 150,
		'margin_item' => 20,
		'auto_scroll' => 0,
                'speed_scroll' => 500,
		'show_nav' => 0,
                'nav_position' => 'text-right',
		'show_pager' => 0,
		'same_height' => 0,
                'show_image' => 0,
		'show_title' => 0,
		'show_tooltip' => 0,
		'show_info' => 0,
		'show_description' => 0,
		'excerpt_length' => 20,
                'excerpt_more'  => '...',
		'read_more' => '',
		'rows' => 1,
		'posts_per_page' => 12,
		'meta_key' => '',
		'meta_value' => '',
		'orderby' => 'none',
		'order' => 'none',
		'el_class' => ''
	), $atts));
        switch ($post_type) {
            case 'post':
                $category = $category;
                $taxonomy = 'category';
                $styles = $styles;
                break;
            case 'testimonial':
                $category = $testimonial_category;
                $taxonomy = 'testimonial_category';
                $styles = $testimonial_styles;
                break;
            case 'myclients':
                $category = $clientscategory;
                $taxonomy = 'clientscategory';
                $styles = $client_styles;
                break;
            case 'produce':
                $category = $produce_category;
                $taxonomy = 'produce_category';
                $styles = $produce_styles;
                break;
        }

        /* query. */
        $args = array(
        		'posts_per_page' => $posts_per_page,
        		'orderby' => $orderby,
        		'order' => $order,
        		'post_type' => $post_type,
        		'post_status' => 'publish'
        );
        
        if (isset($category) && $category != '') {
        
        	$cats = explode(',', $category);
        
        	$args['tax_query'] = array(
        			array(
        					'taxonomy' => $taxonomy,
        					'field' => 'term_id',
        					'terms' => $cats
        			)
        	);
        }
        
	$wp_query = new WP_Query($args);
	$date = 'd'. time() . '_' . uniqid(true); 
	ob_start();
	
	wp_enqueue_script('bxslider', URI_PATH . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
	wp_enqueue_script('jm-bxslider', URI_PATH . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);
	$cl_show = '';
	if ($show_nav) {
            $cl_show .= ' show-nav';
	}
        require get_template_directory()."/framework/shortcodes/postcarousel/styles/{$post_type}/{$styles}.php";
    wp_reset_postdata();
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('ww-shortcode-carousel-post', 'ww_shortcode_carousel_post_render'); }
