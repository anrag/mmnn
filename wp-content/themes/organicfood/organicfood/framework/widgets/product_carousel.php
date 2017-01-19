<?php
/**
 * List products. One widget to rule them all.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CS_Widget_Products_Carousel extends Exp_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_products carousel';
		$this->widget_description = __( 'Display a list of your products on your site.', 'organicfood' );
		$this->widget_id          = 'woocommerce_products_carousel';
		$this->widget_name        = __( 'WooCommerce Products Carousel', 'organicfood' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Products Carousel', 'organicfood' ),
				'label' => __( 'Title', 'organicfood' )
			),
                        'style' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Styles', 'organicfood' ),
				'options' => array(
					'default'         => __( 'Default', 'organicfood' ),
				)
			),
                        'product_cat' => array(
				'type'  => 'pro_taxonomy',
				'std'   => '',
				'label' => __( 'Categories', 'organicfood' )
			),
                        'show' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Show', 'organicfood' ),
				'options' => array(
					''         => __( 'All Products', 'organicfood' ),
					'featured' => __( 'Featured Products', 'organicfood' ),
					'onsale'   => __( 'On-sale Products', 'organicfood' ),
				)
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 12,
				'label' => __( 'Number of products to show', 'organicfood' )
			),
                        'rows' => array(
                                'type'  => 'number',
                                'step'  => 1,
                                'min'   => 1,
                                'max'   => 4,
                                'std'   => 1,
                                'label' => __( 'Rows', 'organicfood' )
                        ),
                        'width_item' => array(
                                'type'  => 'number',
                                'step'  => 50,
                                'min'   => 50,
                                'max'   => '',
                                'std'   => 150,
                                'label' => __( 'Width Item', 'organicfood' )
                        ),
                        'margin_item' => array(
                                'type'  => 'number',
                                'step'  => 5,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 20,
                                'label' => __( 'Margin Item', 'organicfood' )
                        ),
                        'speed' => array(
                                'type'  => 'number',
                                'step'  => 100,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 500,
                                'label' => __( 'Speed Scroll', 'organicfood' )
                        ),
                        'auto_scroll' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Auto Scroll', 'organicfood' )
			),
                        'same_height' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Same Height', 'organicfood' )
			),
                        'show_nav' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Navigation', 'organicfood' )
			),
                        'show_title' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Title', 'organicfood' )
			),
                        'show_price' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Price', 'organicfood' )
			),
                        'show_rating' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Rating', 'organicfood' )
			),
                        'show_category' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Cateogry', 'organicfood' )
			),
                        'show_add_to_cart' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Add To Cart', 'organicfood' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'date',
				'label' => __( 'Order by', 'organicfood' ),
				'options' => array(
					'date'   => __( 'Date', 'organicfood' ),
					'price'  => __( 'Price', 'organicfood' ),
					'rand'   => __( 'Random', 'organicfood' ),
					'sales'  => __( 'Sales', 'organicfood' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'desc',
				'label' => _x( 'Order', 'Sorting order', 'organicfood' ),
				'options' => array(
					'asc'  => __( 'ASC', 'organicfood' ),
					'desc' => __( 'DESC', 'organicfood' ),
				)
			),
			'hide_free' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Hide free products', 'organicfood' )
			),
			'show_hidden' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show hidden products', 'organicfood' )
			)
                        
		);
		parent::__construct();
                add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}
        
        public function widget_scripts() {
            wp_enqueue_script('widget_scripts', URI_PATH . '/framework/widgets/widgets.js');
        }

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	public function widget( $args, $instance ) {

		if ( $this->get_cached_widget( $args ) )
			return;

		ob_start();
		extract( $args );
                
		$title              = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$style              = sanitize_title( $instance['style'] );
                $product_cat        = isset($instance['product_cat'])? $instance['product_cat'] : '';
                $show               = sanitize_title( $instance['show'] );
                $number             = absint( $instance['number'] );
		$rows               = absint( $instance['rows'] );
                $width_item         = absint( $instance['width_item'] );
                $margin_item        = absint( $instance['margin_item'] );
                $speed              = absint( $instance['speed'] );
                $auto_scroll        = absint( $instance['auto_scroll'] );
                $same_height        = absint( $instance['same_height'] );
                $show_nav           = absint( $instance['show_nav'] );
                $show_title         = absint( $instance['show_title'] );
                $show_price         = absint( $instance['show_price'] );
                $show_rating        = absint( $instance['show_rating'] );
                $show_category      = absint( $instance['show_category'] );
                $show_add_to_cart   = absint( $instance['show_add_to_cart'] );
		$orderby            = sanitize_title( $instance['orderby'] );
		$order              = sanitize_title( $instance['order'] );
                
    	$query_args = array(
    		'posts_per_page' => $number,
    		'post_status' 	 => 'publish',
    		'post_type' 	 => 'product',
    		'no_found_rows'  => 1,
    		'order'          => $order == 'asc' ? 'asc' : 'desc'
    	);

    	$query_args['meta_query'] = array();

    	if ( empty( $instance['show_hidden'] ) ) {
			$query_args['meta_query'][] = WC()->query->visibility_meta_query();
			$query_args['post_parent']  = 0;
		}

		if ( ! empty( $instance['hide_free'] ) ) {
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

            $args['tax_query'] = array(
                        array(
                                'taxonomy' 		=> 'product_cat',
                                'terms' 		=> $category,
                                'field' 		=> 'id',
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

                $date = time() . '_' . uniqid(true);
                wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
                wp_enqueue_script('jm-bxslider', get_template_directory_uri() . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);
                $classes = array();
                if ($show_nav) $classes[] = 'show-nav';
                if ($same_height) $classes[] = 'sameheight';
                if ($style) $classes[] = $style;
                
		if ( $products->have_posts() ) {

			echo $before_widget;

			if ( $title )
				echo '<h3 class="headline align-center underline">' . $title . '</h3>';
                        ?>
                        
                        <div class="product_list_widget">
                            <?php
                                if ($products->have_posts()){
                                    require get_template_directory()."/framework/shortcodes/shopcarousel/styles/{$style}.php";
                                }
                            ?>
                        </div>

                        <?php
			

			echo $after_widget;
		}

		wp_reset_postdata();

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}

function register_products_carousel_widget() {
    register_widget('CS_Widget_Products_Carousel');
}

add_action('widgets_init', 'register_products_carousel_widget');
