<?php
/*
 * Template Name: Page No Title Bar
 * Description: A Page Template page no title bar.
 *
 * @package cshero
 */

get_header(); ?>
<?php global $post; ?>
	<div id="primary" class="content-area">
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
