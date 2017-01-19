<?php 
global $smof_data;
/* Define Tempalte Path */
if (!defined('URI_PATH')) define('URI_PATH', get_template_directory_uri());
if (!defined('ABS_PATH')) define('ABS_PATH', get_template_directory());
require_once ('admin/index.php'); 

add_filter('widget_text', 'do_shortcode');
/*
 * Css
 */
add_action('wp_enqueue_scripts', 'cshero_google_font');
add_action('wp_enqueue_scripts', 'cshero_css');
/*
 * Js
 */
add_action('wp_enqueue_scripts', 'googleAnalytic');
add_action('wp_enqueue_scripts', 'cshero_js');
/*
 * Header
 */
add_action('wp_head', 'cshero_favicon');
/*
 * VC Template
 */
if (function_exists("vc_set_shortcodes_templates_dir")) {
    vc_set_shortcodes_templates_dir(get_template_directory() . "/vc_templates/");
}
/*
 * TGM
 */
require_once(ADMIN_PATH . 'tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(ADMIN_PATH . 'tgm-plugin-activation/plugin-options.php');

/**
 * Preset
 */
if(isset($smof_data['use_less'])&&$smof_data['use_less']==1){
    require ABS_PATH.'/framework/presets.php';
}
/**
 * Function for Framework
 */
require ABS_PATH . '/framework/functions.php';

/**
 * Custom template tags for this theme.
 */
require ABS_PATH . '/inc/template-tags.php';
/**
 * Customizer additions.
 */
require ABS_PATH . '/inc/customizer.php';
/**
 * Load Meta Boxes for post formart.
 */
require ABS_PATH . '/admin/meta-boxes/load.php';

/* Woo commerce function */
if (class_exists('Woocommerce')) {
    require ABS_PATH . '/woocommerce/wc-template-function.php';
    require ABS_PATH . '/woocommerce/wc-template-hooks.php';
}
/*
 * Favicon
 */
/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */

add_action( 'after_setup_theme', 'organicfood_setup' );

function organicfood_setup() {
	// Register Navigation
	register_nav_menu('main_navigation', __('Main Navigation', 'organicfood'));
	
	add_theme_support('custom-header');
	add_theme_support('custom-background');
	add_theme_support( "title-tag" );
	// Default RSS feed links
	add_theme_support('automatic-feed-links');
	// Post Formats
	add_theme_support('post-formats', array('gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat'));
	#-----------------------------------------------------------------#
	# Add post thumbnail functionality
	# T_add
	#-----------------------------------------------------------------#
	add_theme_support('post-thumbnails');
}

function cshero_favicon() {
    global $smof_data;
    $icon = get_stylesheet_directory_uri() . "/favicon.ico";
    if ($smof_data["favicon"]) {
        $icon = $smof_data["favicon"];
    }
    echo '<link type="image/x-icon" href="' . esc_url($icon) . '" rel="shortcut icon">';
}
/* Start set variable */
function setVariable(&$var, $var_default, $var_empty) {
    $var = isset($var) ? (empty($var) ? $var_empty : $var) : $var_default;
    return $var;
}
/* End set variable */
/*
 * Google Font
 */
function cshero_google_font() {
    global $smof_data;
    if ($smof_data['body_font_options'] == 'google-font' && $smof_data['google_body_font_family'] && $smof_data['body_font_family_selector']) {
        wp_enqueue_style('google-body-font-family', 'http://fonts.googleapis.com/css?family=' . urlencode($smof_data["google_body_font_family"]) . ':400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
    }
    if ($smof_data["other_font_options_0"] == 'google-font' && $smof_data["google_other_font_family_0"] && $smof_data["other_font_family_selector_0"]) {
        wp_enqueue_style("google-other-font-family_0", 'http://fonts.googleapis.com/css?family=' . urlencode($smof_data["google_other_font_family_0"]) . ':400,400italic,700,700italic&amp;subset=latin,greek-ext,cyrillic,latin-ext,greek,cyrillic-ext,vietnamese');
    }
}
/*
 * Cshero CSS
 */
function cshero_css() {
    global $smof_data;
    if ($smof_data["responsive"]) {
        wp_enqueue_style('bootstrap', URI_PATH . '/css/bootstrap.min.css', array(), '3.2.0');
    } else {
        wp_enqueue_style('bootstrap-no-responsive', URI_PATH . '/css/bootstrap-no-responsive.css', array(), '3.2.0');
    }
    if(!$smof_data['use_less']){
        wp_enqueue_style('preset', URI_PATH.'/css/presets/'.$smof_data['preset_color_scheme'].'.css');
    }
    if ($smof_data["use_font_awesome"]) {
        wp_enqueue_style('font-awesome', URI_PATH . '/css/font-awesome.min.css', array(), '4.1.0');
    }
    if ($smof_data["use_font_ionicons"]) {
        wp_enqueue_style('font-ionicons', URI_PATH . '/css/ionicons.min.css', array(), '1.5.2');
    }
    if(class_exists('WooCommerce')){
        wp_enqueue_style( 'organicfood', URI_PATH . '/css/woocommerce.css', array(), '1.0.0');
    }
    wp_enqueue_style('fonts', URI_PATH . "/css/fonts.css", array(), '1.0.0');
    wp_enqueue_style('style.min', URI_PATH . "/css/style.min.css", array(), '1.0.0');
    wp_enqueue_style('style-rtl', URI_PATH . "/style-rtl.css", array(), '1.0.0');
    wp_enqueue_style('shortcodes', URI_PATH.'/framework/shortcodes/shortcodes.css', array(), '1.0.0');
    wp_enqueue_style('uikit.gradient.min', URI_PATH.'/css/uikit.gradient.min.css', array(), '1.0.0');
    wp_enqueue_style('uikit.almost-flat.min', URI_PATH.'/css/uikit.almost-flat.min.css', array(), '1.0.0');
    wp_enqueue_style('uikit.min', URI_PATH.'/css/uikit.min.css', array(), '1.0.0');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    
}

/*
 * Cshero JS
 */

function cshero_js() {
    global $smof_data;
    wp_enqueue_script("jquery");
    wp_enqueue_script('bootstrap-min-js', URI_PATH . '/js/bootstrap.min.js', array(), '3.2.0');
    wp_deregister_script('jquery-cookie');
    wp_enqueue_script('jquery-cookie', URI_PATH . '/js/jquery_cookie.min.js');
    wp_enqueue_script('jsapi', URI_PATH.'/js/jsapi.js', array('jquery'), '1.0.0');
    wp_enqueue_script('shortcodes', URI_PATH.'/framework/shortcodes/shortcodes.js', array('jsapi','jquery'), '1.0.0');
    wp_enqueue_script('uikit.min', URI_PATH . '/js/uikit.min.js', array('jquery'), '1.0.0');
    wp_enqueue_script('exp.parallax', URI_PATH . '/js/exp.parallax.js', array('jquery'), '1.0.0');
    if($smof_data['smoothscroll']){
        wp_enqueue_script('cs.smoothscroll', URI_PATH . '/js/cs-smoothscroll.min.js', array('jquery'), '1.0.0');
    }
    wp_enqueue_script('main', URI_PATH . '/js/main.js', array('jquery'), '1.0.0');
}

/*
 * Google Analytic
 */

function googleAnalytic() {
    global $smof_data;
    if ($smof_data["google_analytic"]) {
        wp_register_script('google-analytic', URI_PATH . "/js/googleanalytic.js");
        $analytic = array('id' => esc_attr($smof_data["hidden_tracking_id"]), 'home' => esc_url(home_url()));
        wp_localize_script('google-analytic', 'analytic', $analytic);
        wp_enqueue_script('google-analytic');
    }
}

if (is_singular()) {
    wp_enqueue_script("comment-reply");
}
#-----------------------------------------------------------------#
# Content Width
# T_add
#-----------------------------------------------------------------#
if (!isset( $content_width )) $content_width = '669px';
#-----------------------------------------------------------------#
# Load Header
#-----------------------------------------------------------------#

function cshero_header() {
    global $smof_data,$post;
    $header_layout = $smof_data["header_layout"];
    if($post){
        $cs_header = get_post_meta($post->ID, 'cs_header', true)?get_post_meta($post->ID, 'cs_header', true):'global';
        $header_layout = $cs_header=='global'?$header_layout:$cs_header;
    }
    switch ($header_layout) {
        case 'v1':
            get_template_part('framework/headers/header', 'v1');
            break;
        case 'v2':
            get_template_part('framework/headers/header', 'v2');
            break;
        case 'v3':
            get_template_part('framework/headers/header', 'v3');
            break;
        case 'shop':
            get_template_part('framework/headers/header', 'shop');
            break;
    }
}

if(!function_exists('cshero_generetor_blog_layout')){
	function cshero_generetor_blog_layout() {
		global $smof_data,$cat;
		$layout = new stdClass();
		$layout->blog = 'col-md-12';
		$layout->left_col = null;
		$layout->right_col = null;
		$cat_data = get_option("category_".$cat);
		$category_layout = $smof_data['blog_layout'];

		if(is_category() && !empty($cat_data)){
			if($cat_data['category_layout'] && $cat_data['category_layout'] != 'default'){
				$category_layout = $cat_data['category_layout'];
			}
		}
		$main = 'col-xs-12 col-sm-8 col-md-8 col-lg-8';
		$sidebar_col = 'col-xs-12 col-sm-4 col-md-4 col-lg-4';
		if($category_layout){
			if ( is_active_sidebar( 'cshero-blog-sidebar' ) && $category_layout == 'left-fixed' ){
				$layout->blog = $main;
				$layout->left_col = $sidebar_col;
				$layout->right_col = null;
			} elseif (is_active_sidebar( 'cshero-blog-sidebar' ) && $category_layout == 'right-fixed'){
				$layout->blog = $main;
				$layout->left_col = null;
				$layout->right_col = $sidebar_col;
			} else {
				$layout->blog = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				$layout->left_col = null;
				$layout->right_col = null;
			}
		}
		return $layout;
	}
}
// Register widgetized locations
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'organicfood'),
        'id' => 'cshero-blog-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="heading"><h2 class="wg-title"><span>',
        'after_title' => '<span></h2></div>',
    ));
    register_sidebar(array(
        'name' => __('Menu Food', 'organicfood'),
        'id' => 'cshero-menu-food-sidebar',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => __('Single Blog Sidebar Left','organicfood'),
        'id' => 'cshero-widget-left',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title"><span>',
        'after_title' => '</span></h2>',
    ));
    register_sidebar(array(
        'name' => __('Single Blog Sidebar Right', 'organicfood'),
        'id' => 'cshero-widget-right',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title"><span>',
        'after_title' => '</span></h2>',
    ));
    register_sidebars(2,array(
        'name' => __('Header Top Widget %d', 'organicfood'),
        'id' => 'cshero-header-top-widget',
        'before_widget' => '<div id="%1$s" class="header-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));    
    register_sidebars(2,array(
        'name' => __('Header 2 Top Widget %d', 'organicfood'),
        'id' => 'cshero-header2-top-widget',
        'before_widget' => '<div id="%1$s" class="header2-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));
    register_sidebars(2,array(
        'name' => __('Header 3 Top Widget %d', 'organicfood'),
        'id' => 'cshero-header3-top-widget',
        'before_widget' => '<div id="%1$s" class="header3-top-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));
    register_sidebars(4,array(
        'name' => __('Footer Widget %d', 'organicfood'),
        'id' => 'cshero-footer-widget',
        'before_widget' => '<div id="%1$s" class="footer-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));
    register_sidebars(2,array(
        'name' => __('Footer Bottom Widget %d', 'organicfood'),
        'id' => 'cshero-slidingbar-bottom-widget',
        'before_widget' => '<div id="%1$s" class="slidingbar-widget-col %2$s">',
        'after_widget' => '<div style="clear:both;"></div></div>',
        'before_title' => '<h2 class="wg-title">',
        'after_title' => '</h2>',
    ));
    if (class_exists ( 'Woocommerce' )) {
        register_sidebars(2,array(
            'name' => __('Header Shop Top Widget %d', 'organicfood'),
            'id' => 'cshero-header-woo-top-widget',
            'before_widget' => '<div id="%1$s" class="header-woo-top-widget-col %2$s">',
            'after_widget' => '<div style="clear:both;"></div></div>',
            'before_title' => '<h2 class="wg-title">',
            'after_title' => '</h2>',
        ));
        register_sidebar(array(
            'name' => __('Woocommerce Sidebar', 'organicfood'),
            'id' => 'cshero-woo-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="wg-title"><span>',
            'after_title' => '</span></h2>',
        ));
        register_sidebar(array(
            'name' => __('Single Product Sidebar', 'organicfood'),
            'id' => 'cshero-woo-single-product-sidebar',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="wg-title">',
            'after_title' => '</h2>',
        ));
    }
}
#-----------------------------------------------------------------#
# register widget footer bottom
# T_add
#-----------------------------------------------------------------#

function cshero_sidebar_header_top() {
    global $smof_data;
    if ($smof_data['header_top_widgets']) {
        for ($i = 1; $i <= (int) $smof_data['header_top_widgets_columns']; $i++) {
            echo "<div class='header-top-" . $i . " " . esc_attr($smof_data['header_top_widgets_' . $i . '']) . "'>";
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Widget $i")):
            endif;
            echo "</div>";
        }
    }
}

#-----------------------------------------------------------------#
# register widget footer top
# T_add
#-----------------------------------------------------------------#

function cshero_sidebar_footer_top() {
    global $smof_data;
    if ($smof_data['footer_top_widgets']) {
        for ($i = 1; $i <= (int) $smof_data['footer_top_widgets_columns']; $i++) {
            echo "<div class='footer-top-" . $i . " " . esc_attr($smof_data['footer_top_widgets_' . $i . '']) . "'>";
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Widget $i")):
            endif;
            echo "</div>";
        }
    }
}

#-----------------------------------------------------------------#
# register widget footer bottom
# T_add
#-----------------------------------------------------------------#

function cshero_sidebar_footer_bottom() {
    global $smof_data;
    if ($smof_data['footer_bottom_widgets']) {
        $no_active = true;
        for ($i = 1; $i <= (int) $smof_data['footer_bottom_widgets_columns']; $i++) {
            //if(is_active_sidebar("Footer Bottom Widget $i")){
                $no_active = false;
                echo "<div class='footer-bottom-" . $i . " " . esc_attr($smof_data['footer_bottom_widgets_' . $i . '']) . "'>";
                if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Bottom Widget $i")):
                endif;
                echo "</div>";
            //}
        }
    }
}

#-----------------------------------------------------------------#
# Get page Id
# T_add
#-----------------------------------------------------------------#

function pageId() {
    if ((get_option('show_on_front') && get_option('page_for_posts') && is_home()) ||
            (get_option('page_for_posts') && is_archive() && !is_post_type_archive()) && !(is_tax('product_cat') || is_tax('product_tag')) || (get_option('page_for_posts') && is_search())) {
        return $c_pageID = get_option('page_for_posts');
    } else {
        if (isset($post)) {
            return $c_pageID = $post->ID;
        }
        if (class_exists('Woocommerce')) {
            if (is_shop() || is_tax('product_cat') || is_tax('product_tag')) {
                return $c_pageID = get_option('woocommerce_shop_page_id');
            }
        }
    }
}

/*
 * Layout Control
 */
function cshero_generetor_layout() {
    global $smof_data, $post;
    /* Layout */
    $layout = new stdClass();
    $layout->blog = 'col-md-12';
    $layout->left1_col = null;
    $layout->left1_sidebar = null;
    $layout->left2_col = null;
    $layout->left2_sidebar = null;
    $layout->right1_col = null;
    $layout->right1_sidebar = null;
    $layout->right2_col = null;
    $layout->right2_sidebar = null;
    
    /* Type */
    $option = null;
    if (is_page()) {
        $option = $smof_data["page_layout"];
    } elseif (is_single()) {
        $option = $smof_data["post_layout"];
    } elseif (is_archive()) {
        $option = $smof_data["blog_layout"];
    }
    switch ($option) {
        case 'full-fixed':
            $layout->blog = 'col-md-12';
            break;
        case 'right-fixed':
            if ( is_active_sidebar( 'cshero-widget-right' )){
                $layout->blog = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
                $layout->right1_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->right1_sidebar = array('cshero-widget-right');
            }else{
                $layout->blog = 'col-md-12';
            }
            break;
        case 'left-fixed':
            if ( is_active_sidebar( 'cshero-widget-left' )){
                $layout->blog = 'col-xs-12 col-sm-9 col-md-9 col-lg-9';
                $layout->left2_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->left2_sidebar = array('cshero-widget-left');
            }else{
                $layout->blog = 'col-md-12';
            }
            break; 
        case '3column-fixed':
            if ( is_active_sidebar( 'cshero-widget-right' )&&is_active_sidebar( 'cshero-widget-left' )){
                $layout->blog = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
                $layout->left2_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->left2_sidebar = array('cshero-widget-left');
                $layout->right1_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->right1_sidebar = array('cshero-widget-right');
            }else{
                $layout->blog = 'col-md-12';
            }
            break;
        case '3column-right-fixed':
            if ( is_active_sidebar( 'cshero-widget-right' )&&is_active_sidebar( 'cshero-widget-left' )){
                $layout->blog = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
                $layout->right1_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->right1_sidebar = array('cshero-widget-left');
                $layout->right2_col = 'col-xs-12 col-sm-3 col-md-3 col-lg-3';
                $layout->right2_sidebar = array('cshero-widget-right');
            }else{
                $layout->blog = 'col-md-12';
            }
            break;
    }
    return $layout;
}

/*
 * Custom excerpt
 */
function custom_excerpt($limit, $more) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . $more;
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

/*
 * Remove shortcode gallery
 */
function no_gallery($atts) {
    return null;
}
if(function_exists('insert_shortcode')) { insert_shortcode('gallery', 'no_gallery'); }
/*
 * Get Options Show Comments
 */
if (!function_exists('cshero_show_comments')) {

    function cshero_show_comments($type = 'page') {
        global $smof_data;
        $defualt = '1';
        $custom;
        if (comments_open() || '0' != get_comments_number()) {
            $custom = true;
        } else {
            $custom = false;
        }
        switch ($type) {
            case 'page':
                $defualt = $smof_data["show_comments_page"];
                break;
            case 'post':
                $defualt = $smof_data["show_comments_post"];
                break;
        }
        switch ($defualt) {
            case '1':
                return true;
                break;
            case '0':
                return false;
                break;
            default:
                if ($custom) {
                    return true;
                } else {
                    return false;
                }
                break;
        }
    }

}

/**
 * Set home page.
 *
 * get home title and update options.
 *
 * @return Home page title.
 * @author FOX
 */
function theme_framework_set_home_page(){

	$home_page = 'Organic Home';

	$page = get_page_by_title($home_page);

	if(!isset($page->ID))
		return ;
		 
		update_option('show_on_front', 'page');
		update_option('page_on_front', $page->ID);
}

add_action('cms_import_finish', 'theme_framework_set_home_page');

/**
 * Set menu locations.
 *
 * get locations and menu name and update options.
 *
 * @return string[]
 * @author FOX
 */
function theme_framework_set_menu_location(){

	$setting = array(
			'Main Menu' => 'main_navigation'
	);

	$navs = wp_get_nav_menus();

	$new_setting = array();

	foreach ($navs as $nav){

		if(!isset($setting[$nav->name]))
			continue;

			$id = $nav->term_id;
			$location = $setting[$nav->name];

			$new_setting[$location] = $id;
	}

	set_theme_mod('nav_menu_locations', $new_setting);
}

add_action('cms_import_finish', 'theme_framework_set_menu_location');
