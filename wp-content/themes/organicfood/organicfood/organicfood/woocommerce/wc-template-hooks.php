<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * After Single Products Summary Div
 *
 * @see woocommerce_output_product_data_tabs()
 * @see woocommerce_upsell_display()
 * @see woocommerce_output_related_products()
 */
add_action( 'woocommerce_output_product_data_tabs', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_upsell_display', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_output_related_products', 'woocommerce_output_related_products', 20 );

/**
 * Product Loop Items
 *
 * @see woocommerce_template_loop_price()
 * @see woocommerce_template_loop_rating()
 */
add_action( 'woocommerce_template_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_template_loop_rating', 'woocommerce_template_loop_rating', 5 );