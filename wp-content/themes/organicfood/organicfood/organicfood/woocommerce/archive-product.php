<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.2.2
 */
if (!defined('ABSPATH')) exit; // Exit if accessed directly
global $smof_data;
$smof_data["header_layout"] = 'shop';
$smof_data["header_top_widgets"] = true;
get_header('shop');
?>
<?php if($smof_data['show_page_title_blog'] || $smof_data['show_page_breadcrumb_blog']) { ?>
    <div class="header-site-wrap">
        <div class="container container-md-height">
            <div class="row row-md-height cs-titile-bar">
                <div class="col-sx-12 col-sm-12 col-md-6 col-lg-6 col-md-height col-middle cs-page-title">
                    <h2 class="page-title">
                        <?php if($smof_data['show_page_title_blog']) echo cshero_page_title(); ?>
                    </h2>
                </div>
                <div class="col-sx-12 col-sm-12 col-md-6 col-lg-6 col-md-height col-middle cs-breadcrumb">
                    <div id="breadcrumb" class="cs-breadcrumb">
                        <?php if($smof_data['show_page_breadcrumb_blog']) echo cshero_page_breadcrumb($smof_data['delimiter_page_breadcrumb_blog']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
$cl_content = 'col-sx-12 col-sm-12 col-md-12 col-lg-12';
$cl_sidebar = '';
if (is_active_sidebar('cshero-woo-sidebar')) {
    $cl_content = 'col-sx-12 col-sm-12 col-md-9 col-lg-9';
    $cl_sidebar = 'col-sx-12 col-sm-12 col-md-3 col-lg-3';
}
?>
<div class="container archive-products"> 
    <div class="row">
        <div class="<?php echo esc_attr($cl_content); ?>">

            <?php do_action('woocommerce_archive_description'); ?>

            <?php if (have_posts()) : ?>

                <?php
                /**
                 * woocommerce_before_shop_loop hook
                 *
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */
                do_action('woocommerce_before_shop_loop');
                ?>

                <?php woocommerce_product_loop_start(); ?>

                <?php woocommerce_product_subcategories(); ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php wc_get_template_part('content', 'product'); ?>

                <?php endwhile; ?>

                <?php woocommerce_product_loop_end(); ?>

                <?php
                /**
                 * woocommerce_after_shop_loop hook
                 *
                 * @hooked woocommerce_pagination - 10
                 */
                do_action('woocommerce_after_shop_loop');
                ?>

            <?php elseif (!woocommerce_product_subcategories(array('before' => woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) : ?>

                <?php wc_get_template('loop/no-products-found.php'); ?>

            <?php endif; ?>

        </div>
        <?php if ($cl_sidebar) { ?>
            <div class="<?php echo esc_attr($cl_sidebar); ?>">
                <?php
                /**
                 * woocommerce_sidebar hook
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                do_action('woocommerce_sidebar');
                ?>
            </div>
        <?php } ?>
        <?php
        /**
         * woocommerce_after_main_content hook
         *
         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
         */
        do_action('woocommerce_after_main_content');
        ?>
    </div>
</div>
</div>

<?php get_footer('shop'); ?>