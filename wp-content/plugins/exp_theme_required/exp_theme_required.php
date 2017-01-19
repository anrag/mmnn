<?php
/**
 * Plugin Name: Exp Theme Required
 * Plugin URI: http://joomlaman.com
 * Description: Exp Theme Required Plugin.
 * Version: 1.0.0
 * Author: JoomExp
 * Author URI: http://joomlaman.com
 * License: GPL2
 */
define( 'EXP_CUSTOM_URL', plugin_dir_url( __FILE__ ) );
define( 'EXP_CUSTOM_DIR', plugin_dir_path( __FILE__ ) );
function insert_shortcode($tag, $func){
 add_shortcode($tag, $func);
}

function custom_reg_post_type( $post_type, $args = array() ) {
    register_post_type( $post_type, $args );
}

function custom_reg_taxonomy( $taxonomy, $object_type, $args = array() ) {
    register_taxonomy( $taxonomy, $object_type, $args );
}
