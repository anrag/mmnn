<?php
/**
 * List products. One widget to rule them all.
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class CS_Widget_Woocommerce_My_Account extends Exp_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_account';
		$this->widget_description = __( 'Display info account on your site.', 'organicfood' );
		$this->widget_id          = 'woocommerce_my_account';
		$this->widget_name        = __( 'WooCommerce My Account', 'organicfood' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => __( 'My Account', 'organicfood' ),
				'label' => __( 'Title', 'organicfood' )
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
                
    	

                echo $before_widget;

                if ( $title )
                        echo $before_title . $title . $after_title;
                ?>
                        
                <div class="cs-account">
                <?php if (!is_user_logged_in()) { ?>
                    <a class="cs-login" href="<?php echo get_permalink(woocommerce_get_page_id('myaccount')); ?>"><?php _e( 'Login', 'organicfood' ); ?></a>
                <?php } else { 
                    $current_user = wp_get_current_user();
                ?>
                    <div class="cs-status">
                        <span class="ww-status"><?php _e( 'Welcome, ', 'organicfood' ); echo $current_user->user_login; ?> </span><?php _e( ' / ', 'organicfood' ); ?>
                        <a class="cs-logout" href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"><?php _e( 'Account', 'organicfood' ); ?></a><?php _e( ' / ', 'organicfood' ); ?>
                        <a class="cs-logout" href="<?php echo esc_url(wp_logout_url(get_permalink(woocommerce_get_page_id('myaccount')))); ?>"><?php _e( 'Logout', 'organicfood' ); ?></a>
                    </div>
                <?php } ?>
                </div>

                <?php
			

                echo $after_widget;

		wp_reset_postdata();

		$content = ob_get_clean();

		echo $content;

		$this->cache_widget( $args, $content );
	}
}

function register_woocommerce_my_account_widget() {
    register_widget('CS_Widget_Woocommerce_My_Account');
}

add_action('widgets_init', 'register_woocommerce_my_account_widget');
