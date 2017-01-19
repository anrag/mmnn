<?php
function cs_products_carousel_render($atts) {
    extract(shortcode_atts(array(
        'style'             => 'default',
        'product_cat'       => '',
        'show'              => '',
        'number'            => -1,
        'rows'              => 1,
        'width_item'        => 150,
        'margin_item'       => 20,
        'speed'             => 500,
        'auto_scroll'       => 0,
        'same_height'       => 0,
        'show_nav'          => 0,
        'show_title'        => 0,
        'show_price'        => 0,
        'show_rating'       => 0,
        'show_category'     => 0,
        'show_add_to_cart'  => 0,
        'orderby'           => 'none',
        'order'             => 'none',
        'hide_free'         => 0,
        'show_hidden'       => 0
    ), $atts));

    $query_args = array(
            'posts_per_page' => $number,
            'post_status' 	 => 'publish',
            'post_type' 	 => 'product',
            'no_found_rows'  => 1,
            'order'          => $order == 'asc' ? 'asc' : 'desc'
    );

    $query_args['meta_query'] = array();

    if ( empty( $show_hidden ) ) {
                    $query_args['meta_query'][] = WC()->query->visibility_meta_query();
                    $query_args['post_parent']  = 0;
            }

            if ( ! empty( $hide_free ) ) {
            $query_args['meta_query'][] = array(
                        'key'     => '_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'DECIMAL',
                    );
    }

    $query_args['meta_query'][] = WC()->query->stock_status_meta_query();
    $query_args['meta_query']   = array_filter( $query_args['meta_query'] );

    if (isset($product_cat) && $product_cat != '') {
        $cats = explode(',', $product_cat);
        $product_cat = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;

        $query_args['tax_query'] = array(
                    array(
                            'taxonomy' 		=> 'product_cat',
                            'terms' 		=> $category,
                            'field' 		=> 'term_id',
                            'operator' 		=> 'IN'
                    )
        );
    }
    switch ( $show ) {
            case 'featured' :
                    $query_args['meta_query'][] = array(
                                    'key'   => '_featured',
                                    'value' => 'yes'
                            );
                    break;
            case 'onsale' :
                    $product_ids_on_sale = wc_get_product_ids_on_sale();
                            $product_ids_on_sale[] = 0;
                            $query_args['post__in'] = $product_ids_on_sale;
                    break;
    }

    switch ( $orderby ) {
                    case 'price' :
                            $query_args['meta_key'] = '_price';
                    $query_args['orderby']  = 'meta_value_num';
                            break;
                    case 'rand' :
                    $query_args['orderby']  = 'rand';
                            break;
                    case 'sales' :
                            $query_args['meta_key'] = 'total_sales';
                    $query_args['orderby']  = 'meta_value_num';
                            break;
                    default :
                            $query_args['orderby']  = 'date';
    }

    $products = new WP_Query( $query_args );
    
    ob_start();
    $date = time() . '_' . uniqid(true);
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
    wp_enqueue_script('jm-bxslider', get_template_directory_uri() . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);
    $classes = array();
    if ($show_nav) $classes[] = 'show-nav';
    if ($same_height) $classes[] = 'sameheight';
    if ($style) $classes[] = $style;
    if ($products->have_posts()){
        require get_template_directory()."/framework/shortcodes/shopcarousel/styles/{$style}.php";
    }
    wp_reset_postdata();
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('cs-products-carousel', 'cs_products_carousel_render'); }
