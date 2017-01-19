<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

//Set columns when active sidebar
$columns = 4;
if (is_active_sidebar('cshero-woo-sidebar'))
    $columns = 3;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $columns );

$class_columns = null;
switch ($woocommerce_loop['columns']) {
    case 1: $class_columns = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
        break;
    case 2: $class_columns = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
        break;
    case 3: $class_columns = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
        break;
    case 4: $class_columns = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
        break;
    default: $class_columns = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
        break;
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

$start_row = $end_row = '';

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ){
    $classes[] = 'first';
    $start_row = 1;
}

if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ){
    $classes[] = 'last';
    $end_row = 1;
}

?>
<?php if($start_row) echo '<div class="row">' ?>
<div class="<?php echo $class_columns; ?>">
    <article <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
                <div class="woo-image">
                    <a href="<?php the_permalink() ?>">
                    <?php
                        /**
                         * woocommerce_before_shop_loop_item_title hook
                         *
                         * @hooked woocommerce_show_product_loop_sale_flash - 10
                         * @hooked woocommerce_template_loop_product_thumbnail - 10
                         */
                    
                        do_action( 'woocommerce_before_shop_loop_item_title' );
                        
                    ?>
                    </a>
                    <div class="woo-add-to-cart">
                        <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                    </div>
                </div>
                <div class="woo-decriptions">
                    <div class="woo-info">
                        <h3 class="woo-title"> 
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                    <?php
                            /**
                             * woocommerce_after_shop_loop_item_title hook
                             *
                             * @hooked woocommerce_template_loop_rating - 5
                             * @hooked woocommerce_template_loop_price - 10
                             */
                            //do_action( 'woocommerce_after_shop_loop_item_title' );
                    ?>
                    <div class="woo-rating"><?php do_action( 'woocommerce_template_loop_rating' );?></div>
                    <div class="woo-price"><?php do_action( 'woocommerce_template_loop_price' );?></div>
                    </div>
                </div>

    </article>
</div>
<?php if($end_row) echo '</div>' ?>