<?php
/**
 * List products. One widget to rule them all.
 */

//if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CS_Widget_Posts_Carousel extends Exp_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'posts widget_posts carousel';
		$this->widget_description = __( 'Display a list of your posts on your site.', 'organicfood' );
		$this->widget_id          = 'cs_posts_carousel';
		$this->widget_name        = __( 'Posts Carousel', 'organicfood' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'Posts Carousel', 'organicfood' ),
				'label' => __( 'Title', 'organicfood' )
			),
                        'post_type' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Post Type', 'organicfood' ),
				'options' => array(
					'post'         => __( 'Post', 'organicfood' ),
					'testimonial'  => __( 'Testimonial', 'organicfood' ),
					'myclients'    => __( 'Client', 'organicfood' ),
					'produce'      => __( 'Produce', 'organicfood' ),
				)
			),
                        'category' => array(
				'type'   => 'pro_taxonomy',
				'std'    => '',
				'label'  => __( 'Categories', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'post'
                                )
			),
                        'testimonial_category' => array(
				'type'  => 'pro_taxonomy',
				'std'   => '',
				'label' => __( 'Categories', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'testimonial'
                                )
			),
                        'clientscategory' => array(
				'type'  => 'pro_taxonomy',
				'std'   => '',
				'label' => __( 'Categories', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'myclients'
                                )
			),
                        'produce_category' => array(
				'type'  => 'pro_taxonomy',
				'std'   => '',
				'label' => __( 'Categories', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'produce'
                                )
			),
                        'styles' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Styles', 'organicfood' ),
				'options' => array(
					'style-1-organicfood'       => __( 'Style 1 Organicfood', 'organicfood' ),
				),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'post'
                                )
			),
                        'testimonial_styles' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Styles', 'organicfood' ),
				'options' => array(
					'style-1-consilium'         => __( 'Default 1 Consilium', 'organicfood' ),
					'testimonial-avatar'        => __( 'With Avatar', 'organicfood' ),
					'testimonial-avatar-center' => __( 'With Avatar Center', 'organicfood' ),
				),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'testimonial'
                                )
			),
                        'client_styles' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Styles', 'organicfood' ),
				'options' => array(
					'style-1'         => __( 'Style 1', 'organicfood' ),
				),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'myclients'
                                )
			),
                        'produce_styles' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Styles', 'organicfood' ),
				'options' => array(
					'style-1'         => __( 'Style 1', 'organicfood' ),
				),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'produce'
                                )
			),
                        'rows' => array(
                                'type'  => 'number',
                                'step'  => 1,
                                'min'   => 1,
                                'max'   => 4,
                                'std'   => 1,
                                'label' => __( 'Rows', 'organicfood' )
                        ),
                        'crop_image' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Crop Image', 'organicfood' ),
			),
                        'width_image' => array(
                                'type'  => 'number',
                                'step'  => 50,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 300,
                                'label' => __( 'Width Image', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'crop_image',
                                    'value'   => 1
                                )
                        ),
                        'height_image' => array(
                                'type'  => 'number',
                                'step'  => 5,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 200,
                                'label' => __( 'Height Image', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'crop_image',
                                    'value'   => 1
                                )
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
                        'auto_scroll' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Auto Scroll', 'organicfood' )
			),
                        'speed_scroll' => array(
                                'type'  => 'number',
                                'step'  => 100,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 500,
                                'label' => __( 'Speed Scroll', 'organicfood' )
                        ),
                        'show_nav' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Navigation', 'organicfood' )
			),
                        'nav_position' => array(
				'type'  => 'select',
				'std'   => '',
				'label' => __( 'Navigation Postion', 'organicfood' ),
				'options' => array(
					'text-left'    => __( 'Left', 'organicfood' ),
					'text-center'  => __( 'Center', 'organicfood' ),
					'text-right'   => __( 'Right', 'organicfood' ),
				),
                                "hidden" => array(
                                    "element"=>"show_nav",
                                    "value"=> 1
                                ),
			),
                        'show_pager' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Pager', 'organicfood' )
			),
                        'same_height' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Same Height', 'organicfood' )
			),
                        'show_image' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Image', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'post_type',
                                    'value'   => 'testimonial'
                                )
			),
                        'show_title' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Title', 'organicfood' ),
                                "hidden" => array(
                                    "element"=>"post_type",
                                    "value"=> 'post,testimonial,produce'
                                ),
			),
                        'show_tooltip' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Tooltip', 'organicfood' ),
                                "hidden" => array(
                                    "element"=>"post_type",
                                    "value"=> 'myclients'
                                ),
			),
                        'show_info' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Info', 'organicfood' ),
                                "hidden" => array(
                                    "element"=>"post_type",
                                    "value"=> 'post,testimonial'
                                ),
			),
                        'show_description' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => __( 'Show Description', 'organicfood' ),
                                "hidden" => array(
                                    "element"=>"post_type",
                                    "value"=> 'post,testimonial'
                                ),
			),
                        'excerpt_length' => array(
                                'type'  => 'number',
                                'step'  => 5,
                                'min'   => 0,
                                'max'   => '',
                                'std'   => 20,
                                'label' => __( 'Excerpt Length', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'show_description',
                                    'value'   => 1
                                )
                        ),
                        'excerpt_more' => array(
                                'type'  => 'text',
                                'std'   => '...',
                                'label' => __( 'Excerpt More', 'organicfood' ),
                                'hidden' => array(
                                    'element' => 'show_description',
                                    'value'   => 1
                                )
                        ),
                        'read_more'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Read More', 'organicfood' ),
                                "hidden" => array(
                                    "element"=>"post_type",
                                    "value"=> 'post,testimonial'
                                ),
			),
                        'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 12,
				'label' => __( 'Number of posts to show', 'organicfood' )
			),
                        'meta_key'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Meta Key', 'organicfood' )
			),
                        'meta_value'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Meta Value', 'organicfood' )
			),
                        'orderby' => array(
				'type'  => 'select',
				'std'   => 'date',
				'label' => __( 'Order by', 'organicfood' ),
				'options' => array(
					'none'   => __( 'None', 'organicfood' ),
					'title'  => __( 'Title', 'organicfood' ),
					'date'   => __( 'Date', 'organicfood' ),
					'ID'  => __( 'ID', 'organicfood' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => _x( 'Order', 'Sorting order', 'organicfood' ),
				'options' => array(
					'none'  => __( 'None', 'organicfood' ),
					'asc'  => __( 'ASC', 'organicfood' ),
					'desc' => __( 'DESC', 'organicfood' ),
				)
			),
                        'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => __( 'Extra Class', 'organicfood' )
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
                global $post, $wp_query;
		extract( $args );
                
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$post_type              = sanitize_title( $instance['post_type'] );
                $category               = isset($instance['category'])? $instance['category'] : '';
                $testimonial_category   = isset($instance['testimonial_category'])? $instance['testimonial_category'] : '';
                $clientscategory        = isset($instance['clientscategory'])? $instance['clientscategory'] : '';
                $produce_category       = isset($instance['produce_category'])? $instance['produce_category'] : '';
                $styles                 = sanitize_title( $instance['styles'] );
                $testimonial_styles     = sanitize_title( $instance['testimonial_styles'] );
                $client_styles          = sanitize_title( $instance['client_styles'] );
                $produce_styles         = sanitize_title( $instance['produce_styles'] );
                $rows                   = absint( $instance['rows'] );
                $crop_image             = absint( $instance['crop_image'] );
                $width_image            = absint( $instance['width_image'] );
                $height_image           = absint( $instance['height_image'] );
                $width_item             = absint( $instance['width_item'] );
                $margin_item            = absint( $instance['margin_item'] );
                $auto_scroll            = absint( $instance['auto_scroll'] );
                $speed_scroll           = absint( $instance['speed_scroll'] );
                $show_nav               = absint( $instance['show_nav'] );
                $nav_position           = sanitize_title( $instance['nav_position'] );
                $show_pager             = absint( $instance['show_pager'] );
                $same_height            = absint( $instance['same_height'] );
                $show_title             = absint( $instance['show_title'] );
                $show_image             = absint( $instance['show_image'] );
                $show_info              = absint( $instance['show_info'] );
                $show_description       = absint( $instance['show_description'] );
                $excerpt_length         = absint( $instance['excerpt_length'] );
                $excerpt_more           = sanitize_title( $instance['excerpt_more'] );
                $read_more              = sanitize_title( $instance['read_more'] );
                $posts_per_page         = absint( $instance['posts_per_page'] );
                $meta_key               = absint( $instance['meta_key'] );
                $meta_value             = absint( $instance['meta_value'] );
                $orderby                = sanitize_title( $instance['orderby'] );
                $order                  = sanitize_title( $instance['order'] );
                $el_class               = sanitize_title( $instance['el_class'] );
                
                echo $before_widget;

                if ( $title )
                        echo $before_title . $title . $after_title;
                
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
                $query_args = array(
                    'posts_per_page' => $posts_per_page,
                    'orderby' => $orderby,
                    'order' => $order,
                    'post_type' => $post_type,
                    'post_status' => 'publish');
                if (isset($category) && $category != '') {
                    $cats = explode(',', $category);
                    $category = array();
                    foreach ((array) $cats as $cat) :
                    $category[] = trim($cat);
                    endforeach;
                    $query_args['tax_query'] = array(
                                            array(
                                                'taxonomy' => $taxonomy,
                                                'field' => 'id',
                                                'terms' => $category
                                            )
                                    );
                }
                if(!empty($meta_key)) {
                    $query_args['meta_query'] = array(
                        array(
                            'key' => $meta_key,
                            'value' => $meta_value
                        )
                    );
                }
                $wp_query = new WP_Query($query_args);
                $date = 'd'. time() . '_' . uniqid(true);
                
                wp_enqueue_script('bxslider', URI_PATH . '/js/jquery.bxslider.js', 'jquery', '1.0', TRUE);
                wp_enqueue_script('jm-bxslider', URI_PATH . '/js/jquery.jm-bxslider.js', 'jquery', '1.0', TRUE);
                $cl_show = '';
                if ($show_nav) {
                    $cl_show .= ' show-nav';
                }
                require get_template_directory()."/framework/shortcodes/postcarousel/styles/{$post_type}/{$styles}.php";
                wp_reset_postdata();

                echo $after_widget;
                
		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}

function register_posts_carousel_widget() {
    register_widget('CS_Widget_Posts_Carousel');
}

add_action('widgets_init', 'register_posts_carousel_widget');
