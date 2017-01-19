<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package cshero
 */

get_header(); ?>
<?php global $post; ?>
	<div id="primary" class="content-area">
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
        <div class="<?php if(get_post_meta($post->ID, 'cs_blog_layout', true) === "full"){ echo "no-container";} else { echo "container"; } ?>">
            <div class="row">
                <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
                    <main id="main" class="site-main" role="main">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php get_template_part( 'framework/templates/blog/content', 'page' ); ?>

                            <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if (cshero_show_comments()) :
                                    comments_template();
                                endif;
                            ?>

                        <?php endwhile; // end of the loop. ?>

                    </main><!-- #main -->
                </div>
            </div>
        </div>
	</div><!-- #primary -->

<?php get_footer(); ?>
