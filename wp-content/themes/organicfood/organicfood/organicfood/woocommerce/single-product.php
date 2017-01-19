<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     20.2.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $smof_data;
$smof_data["header_layout"] = 'shop';
$smof_data["header_top_widgets"] = true;
get_header( 'shop' ); ?>
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
            if(is_active_sidebar( 'cshero-woo-sidebar' )){
                $cl_content = 'col-sx-12 col-sm-12 col-md-9 col-lg-9';
                $cl_sidebar = 'col-sx-12 col-sm-12 col-md-3 col-lg-3';
            }
        ?>
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($cl_content); ?>">
                    
                    <?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

                    <?php endwhile; // end of the loop. ?>
                    
                </div>
                <?php if($cl_sidebar) { ?>
                <div class="<?php echo esc_attr($cl_sidebar); ?>">
                    <?php
                        /**
                         * woocommerce_sidebar hook
                         *
                         * @hooked woocommerce_get_sidebar - 10
                         */
                        do_action( 'woocommerce_sidebar' );
                    ?>
                </div>
                <?php } ?>
                <?php
                    /**
                     * woocommerce_after_main_content hook
                     *
                     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                     */
                    do_action( 'woocommerce_after_main_content' );
                ?>
            </div>
        </div>

<?php get_footer( 'shop' ); ?>