<?php
/**
 * The Template for displaying all single portfolio.
 *
 * @package cshero
 */

get_header(); ?>
	<div id="primary" class="content-area">
        <div class="no-container"> 
            <main id="main" class="site-main" role="main">
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
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'framework/templates/portfolio/single', 'layout1' ); ?>
                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->
        </div>
	</div><!-- #primary -->
<?php get_footer(); ?>