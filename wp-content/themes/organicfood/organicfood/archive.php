<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cshero
 */

get_header(); ?>
<?php global $smof_data; ?>
	<section id="primary" class="content-area">
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
        <div class="container">
            <div class="row">
            	<?php if ( is_active_sidebar( 'cshero-blog-sidebar' ) && $smof_data['blog_layout'] == 'left-fixed' ): ?>
                	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
                <div class="<?php if (!is_active_sidebar( 'cshero-blog-sidebar' ) || $smof_data['blog_layout'] == 'full-fixed'){ echo "col-md-12"; }else { echo "col-xs-12 col-sm-8 col-md-8 col-lg-8"; } ?>">

                    <main id="main" class="site-main" role="main">

                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="archive de-blog">
                                <?php
                                /* Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'framework/templates/blog/blog',get_post_format());
                                ?>
                                </div>
                            <?php endwhile; ?>

                            <?php cshero_paging_nav(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'framework/templates/blog/blog', 'none' ); ?>

                        <?php endif; ?>

                    </main><!-- #main -->

                </div>
                <?php if ( is_active_sidebar( 'cshero-blog-sidebar' ) && $smof_data['blog_layout'] == 'right-fixed' ): ?>
                	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
            </div>
        </div>

	</section><!-- #primary -->
<?php get_footer(); ?>
