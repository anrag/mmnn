<?php
/*-----------------------------POST TYPE------------------------------*/
/**
* Post Type Team
*/ 
require ABS_PATH.'/framework/views/posttype/team.php';
/**
* Post Type Our Client
*/
require ABS_PATH.'/framework/views/posttype/my_client.php';
/**
* Post Type Portfolio
*/
require ABS_PATH.'/framework/views/posttype/portfolio.php';
/**
* Post Type Testimonials
*/
require ABS_PATH.'/framework/views/posttype/testimonial.php';
/**
* Post Type Produce
*/
require ABS_PATH.'/framework/views/posttype/produce.php';
/**
* Post Type Recipe
*/
require ABS_PATH.'/framework/views/posttype/recipe.php';

/*-------------------------------LIB--------------------------------*/
/**
* Lib resize images
*/
require ABS_PATH.'/framework/includes/resize.php';

/*---------------------------------POST-------------------------------*/
/**
 * multiple-blog
 */
require_once ABS_PATH.'/framework/templates/multiple-blog.php';
/*---------------------------------VC-------------------------------*/
/**
 * Vc extra shorcodes
 */
if (function_exists("vc_map")){
	require ABS_PATH.'/framework/includes/vc_extra_shorcodes.php';
}
/**
* Vc extra Fields
*/
if (class_exists('Vc_Manager')) {
    function vc_add_extra_field( $name, $form_field_callback, $script_url = null ) {
            return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
    }
}
if (function_exists("vc_add_extra_field")){
	require ABS_PATH.'/framework/includes/vc_extra_fields.php';
}
/**
* Vc extra params
*/
if (function_exists("vc_add_param")){
	require ABS_PATH.'/framework/includes/vc_extra_params.php';
}
/*------------------------------Extra Fields----------------------------*/
/**
 * Metaboxes
 */
require ABS_PATH.'/framework/metaboxes.php';
/**
 * Category Extra Fields
 */
/*------------------------------Load Shortcodes Function-----------------*/
require ABS_PATH . '/framework/shortcodes/shortcode-functions.php';
/*------------------------------Load Shortcodes--------------------------*/
require ABS_PATH . '/framework/shortcodes/shortcodes.php';
/*-------------------------------Load Abs Widget-------------------------*/
require ABS_PATH . '/framework/widgets/abstract-exp-widget.php';
/*-------------------------------Load Widgets----------------------------*/
get_template_part('framework/widgets');