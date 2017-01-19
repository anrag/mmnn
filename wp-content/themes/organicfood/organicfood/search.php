<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package cshero
 */

get_header(); ?>
<?php global $smof_data,$breadcrumb; $blog_layout = cshero_generetor_blog_layout(); ?>
	<section id="primary" class="content-area<?php if($breadcrumb == '0'){ echo ' no_breadcrumb';} ?>">
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
                <?php if ($blog_layout->left_col): ?>
                	<div class="<?php echo $blog_layout->left_col; ?>">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
                <div class="<?php echo $blog_layout->blog; ?>">

                    <main id="main" class="site-main" role="main">

                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                            <div class="de-blog">
                                <?php
                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
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
                <?php if ($blog_layout->right_col): ?>
                	<div class="<?php echo $blog_layout->right_col; ?>">
                		<?php get_sidebar(); ?>
                	</div>
                <?php endif; ?>
            </div>
        </div>

	</section><!-- #primary -->
<?php get_footer(); ?>
