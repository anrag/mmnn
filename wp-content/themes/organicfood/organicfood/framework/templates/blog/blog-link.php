<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog">
		<header class="cs-blog-header">
			<div class="cs-blog-media">
			<?php
                        $cs_link = get_post_meta($post->ID, 'cs_post_link', true);
                        if($cs_link){ 
                            ?>
                                <a href="<?php echo get_post_meta($post->ID, 'cs_post_link', true); ?>"><?php echo get_post_meta($post->ID, 'cs_post_link', true); ?></a>
                            <?php 
                        
                        }else{ 
                           the_content(); 
                        }
                        ?>
			</div>
			<div class="cs-blog-meta cs-itemBlog-meta">
				<?php echo cshero_title_render(); ?>
				<?php echo cshero_info_bar_render(); ?>
			</div>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php cshero_content_render(); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

