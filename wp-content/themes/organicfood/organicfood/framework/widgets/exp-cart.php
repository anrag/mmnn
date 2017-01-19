<?php
/**
 * Shopping Cart Widget
 *
 * Displays shopping cart widget
 *
 * @author        WooThemes
 * @category      Widgets
 * @package       WooCommerce/Widgets
 * @version       2.0.0
 * @extends       WP_Widget
 */
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly

class Custom_WC_Widget_Cart extends WP_Widget {

    public function __construct() {
        parent::__construct(
                'widget_exp_cart', // Base ID
                __('Woocommerce Mini Cart', 'organicfood'), // Name
                array('description' => __("Display the user's Woocommerce Mini Cart form in the sidebar.", 'organicfood'),) // Args
        );
        add_action('wp_enqueue_scripts', array($this, 'widget_scripts'));
    }

    function widget_scripts() {
        wp_enqueue_script('widget_exp_cart_scripts', get_template_directory_uri() . '/framework/widgets/exp-cart-widgets.js');
    }

    function widget($args, $instance) {
        extract(shortcode_atts($instance, $args));
        if (is_cart() || is_checkout())
            return;
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $hide_if_empty = empty($instance['hide_if_empty']) ? 0 : 1;
        ob_start();
        echo isset($before_widget) ? $before_widget : '';
        $before_title = isset($before_title) ? $before_title : '';
        $after_title = isset($after_title) ? $after_title : '';
        if ($title)
            echo $before_title . $title . $after_title;
        $total = 0;
        global $woocommerce;
        $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;
        if ($cart_is_empty && $hide_if_empty)
            return;
        ?>
        <div class="widget_exp_cart_wrap woocommerce">
            <div class="header">
                <a href="javascript:void(0)" class="icon_cart_wrap" data-display=".shopping_cart_dropdown" data-no_display=".widget_searchform_content">
                    <i class="fa fa-shopping-cart cart-icon"></i>
                    <span class="cart_total"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
                </a>
            </div>
            <div class="shopping_cart_dropdown">
                <div class="shopping_cart_dropdown_inner">
                    <?php
                    $list_class = array('cart_list', 'product_list_widget');
                    ?>
                    <div class="<?php echo implode(' ', $list_class); ?>">

                        <?php if (!$cart_is_empty) : ?>
                            <?php
                            foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :

                                $_product = $cart_item['data'];

                                // Only display if allowed
                                if (!$_product->exists() || $cart_item['quantity'] == 0) {
                                    continue;
                                }

                                // Get price
                                $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                                $product_price = apply_filters('woocommerce_cart_item_price_html', woocommerce_price($product_price), $cart_item, $cart_item_key);
                                ?>

                                <div class="cart-item clearfix">
                                    <a href="<?php echo get_permalink($cart_item['product_id']); ?>">

                                                <?php echo $_product->get_image(); ?>
                                        <div class="cart-desc">
                                            <div class="title">
                                            <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product); ?>
                                            </div>
                <?php echo $woocommerce->cart->get_item_data($cart_item); ?>
                <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="cart-item clearfix"><?php _e('No products in the cart.', 'organicfood'); ?></div>
                            <?php endif; ?>
                        <div class="cart-item cart-total-wrap">
        <?php _e('Total', 'organicfood'); ?>: <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="wpb_button wpb_btn-primary wpb_regularsize"><?php _e('View Cart', 'organicfood'); ?></a>
                <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="wpb_button wpb_btn-primary wpb_regularsize"><?php _e('Checkout', 'organicfood'); ?></a>
            </div>
        </div>
        <?php
        echo isset($after_widget) ? $after_widget : '';
        echo ob_get_clean();
    }

    /**
     * update function.
     *
     * @see    WP_Widget->update
     * @access public
     *
     * @param array $new_instance
     * @param array $old_instance
     *
     * @return array
     */
    function update($new_instance, $old_instance) {
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['hide_if_empty'] = empty($new_instance['hide_if_empty']) ? 0 : 1;
        return $instance;
    }

    /**
     * form function.
     *
     * @see    WP_Widget->form
     * @access public
     *
     * @param array $instance
     *
     * @return void
     */
    function form($instance) {
        $hide_if_empty = empty($instance['hide_if_empty']) ? 0 : 1;
        $title = !empty($instance['title']) ? esc_attr($instance['title']) : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'organicfood') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <input type="checkbox" class="checkbox" id="<?php echo esc_attr($this->get_field_id('hide_if_empty')); ?>" name="<?php echo esc_attr($this->get_field_name('hide_if_empty')); ?>"<?php checked($hide_if_empty); ?> />
            <label for="<?php echo $this->get_field_id('hide_if_empty'); ?>"><?php _e('Hide if cart is empty', 'organicfood'); ?></label>
        </p>
        <?php
    }

}

function register_exp_cart_widget() {
    if (class_exists('WC_Widget_Cart')) {
        register_widget('Custom_WC_Widget_Cart');
    }
}

add_action('widgets_init', 'register_exp_cart_widget');
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_content');

function woocommerce_header_add_to_cart_fragment($fragments) {
    global $woocommerce; 
    ob_start();
    ?>
    <span class="cart_total"><?php echo $woocommerce->cart->get_cart_subtotal(); ?></span>
    <?php
    $fragments['span.cart_total'] = ob_get_clean();
    return $fragments;
}

function woocommerce_header_add_to_cart_content($fragments) {
    global $woocommerce;
    $cart_is_empty = sizeof($woocommerce->cart->get_cart()) <= 0;
    ob_start();
    ?>
    <div class="shopping_cart_dropdown">
        <div class="shopping_cart_dropdown_inner">
                <?php
                $list_class = array('cart_list', 'product_list_widget');
                ?>
            <div class="<?php echo implode(' ', $list_class); ?>">

                <?php if (!$cart_is_empty) : ?>
                    <?php
                    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item) :

                        $_product = $cart_item['data'];

                        // Only display if allowed
                        if (!$_product->exists() || $cart_item['quantity'] == 0) {
                            continue;
                        }

                        // Get price
                        $product_price = get_option('woocommerce_tax_display_cart') == 'excl' ? $_product->get_price_excluding_tax() : $_product->get_price_including_tax();

                        $product_price = apply_filters('woocommerce_cart_item_price_html', woocommerce_price($product_price), $cart_item, $cart_item_key);
                        ?>

                        <div class="cart-item clearfix">
                            <a href="<?php echo get_permalink($cart_item['product_id']); ?>">

                                    <?php echo $_product->get_image(); ?>
                                <div class="cart-desc">
                                    <div class="title">
            <?php echo apply_filters('woocommerce_widget_cart_product_title', $_product->get_title(), $_product); ?>
                                    </div>
                        <?php echo $woocommerce->cart->get_item_data($cart_item); ?>
                        <?php echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf('%s &times; %s', $cart_item['quantity'], $product_price) . '</span>', $cart_item, $cart_item_key); ?>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <div class="cart-item clearfix"><?php _e('No products in the cart.', 'organicfood'); ?></div>
    <?php endif; ?>
                <div class="cart-item cart-total-wrap">
    <?php _e('Total', 'organicfood'); ?>: <?php echo $woocommerce->cart->get_cart_subtotal(); ?>
                </div>
            </div>
        </div>
        <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" class="wpb_button wpb_btn-primary wpb_regularsize"><?php _e('View Cart', 'organicfood'); ?></a>
        <a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>" class="wpb_button wpb_btn-primary wpb_regularsize"><?php _e('Checkout', 'organicfood'); ?></a>
    </div>
    <?php
    $fragments['div.shopping_cart_dropdown'] = ob_get_clean();
    return $fragments;
}
