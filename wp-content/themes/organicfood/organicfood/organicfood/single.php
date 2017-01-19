<?php
/**
 * The Template for displaying all single posts.
 *
 * @package cshero
 */



get_header(); ?>
<?php global $smof_data; $layout = cshero_generetor_layout(); ?>
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
            <div class="container">
                <div class="row">
                    <?php if($layout->left1_col):?>
                            <div class="<?php echo $layout->left1_col; ?>">
                                 <div id="secondary" class="widget-area" role="complementary">
                                                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                                                    <?php
                                                                    foreach ($layout->left1_sidebar as $sidebar){
                                                                            dynamic_sidebar($sidebar);
                                                                    }
                                                                    ?>
                                                            </div>
                                                     </div>
                            </div>
                    <?php endif; ?>
                    <?php if($layout->left2_col):?>
                            <div class="<?php echo $layout->left2_col; ?>">
                                 <div id="secondary" class="widget-area" role="complementary">
                                                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                                                    <?php
                                                                    foreach ($layout->left2_sidebar as $sidebar){
                                                                            dynamic_sidebar($sidebar);
                                                                    }
                                                                    ?>
                                                            </div>
                                                     </div>
                            </div>
                    <?php endif; ?>
                    <div class="<?php echo $layout->blog; ?>">
                        <main id="main" class="site-main" role="main">

                            <?php while ( have_posts() ) : the_post(); ?>
                                <div class="de-blog">
                                    <?php get_template_part( 'framework/templates/blog/blog', get_post_format()); ?>
                                </div>
                                <?php
                                    if($smof_data['show_navigation_post'] == '1'){
                                            cshero_post_nav();
                                    }
                                ?>
                                <?php if($smof_data['show_tags_post'] == '1'): ?>
                                <div class="cs_tags clearfix">
                                        <h4><?php echo _e('TAGS:','organicfood'); ?></h4>
                                                                    <div class="tagcloud">
                                                                    <?php
                                                                    // Tags from post
                                                                    foreach (wp_get_post_tags(get_the_ID()) as $tag){
                                                                            echo '<a class="tag-link-'.$tag->term_id.'" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                            </div>
                                                            <?php endif; ?>

                                <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if (cshero_show_comments('post')) :
                                    comments_template();
                                endif;
                                ?>

                            <?php endwhile; // end of the loop. ?>

                        </main><!-- #main -->
                    </div>
                    <?php if($layout->right1_col):?>
                            <div class="<?php echo $layout->right1_col; ?>">
                                 <div id="secondary" class="widget-area" role="complementary">
                                                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                                                    <?php
                                                                    foreach ($layout->right1_sidebar as $sidebar){
                                                                            dynamic_sidebar($sidebar);
                                                                    }
                                                                    ?>
                                                            </div>
                                                     </div>
                            </div>
                    <?php endif; ?>
                    <?php if($layout->right2_col):?>
                            <div class="<?php echo $layout->right2_col; ?>">
                                 <div id="secondary" class="widget-area" role="complementary">
                                                            <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                                                                    <?php
                                                                    foreach ($layout->right2_sidebar as $sidebar){
                                                                            dynamic_sidebar($sidebar);
                                                                    }
                                                                    ?>
                                                            </div>
                                                     </div>
                            </div>
                    <?php endif; ?>
                </div>
            </div>
	</div><!-- #primary -->
<?php get_footer(); ?>