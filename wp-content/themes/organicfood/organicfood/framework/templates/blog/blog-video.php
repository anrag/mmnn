<?php
/**
 * @package cshero
 */
?>
<?php global $smof_data,$post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cs-blog">
		<header class="cs-blog-header">
                        <div class="cs-blog-meta cs-itemBlog-meta">
                                <?php echo cshero_title_render(); ?>
                                <?php echo cshero_info_bar_render(); ?>
                        </div>
			<?php
				$video_source = get_post_meta($post->ID, 'cs_post_video_source', true);
                                if(empty($video_source)) $video_source = 'post';
				$video_height = get_post_meta($post->ID, 'cs_post_video_height', true);
				if($video_source){
					?>
					<div class="cs-blog-media">
					<?php
					switch ($video_source) {
						case 'post':
							$shortcode = cshero_get_shortcode_from_content('wpvideo');
							if(!$shortcode){
                                                                the_content();
							}
							if($shortcode):
								echo do_shortcode('[wpvideo tFnqC9XQ w=680]');
							endif;
							break;
						case 'youtube':
							$video_youtube = get_post_meta($post->ID, 'cs_post_video_youtube', true);
							if($video_youtube){
								echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_youtube.'[/cs-video]');
							}
							break;
						case 'vimeo':
							$video_vimeo = get_post_meta($post->ID, 'cs_post_video_vimeo', true);
							if($video_vimeo){
								echo do_shortcode('[cs-video height="'.$video_height.'"]'.$video_vimeo.'[/cs-video]');
							}
							break;
						case 'media':
							$video_type = get_post_meta($post->ID, 'cs_post_audio_type', true);
							$preview_image = get_post_meta($post->ID, 'cs_post_preview_image', true);
							$video_file = get_post_meta($post->ID, 'cs_post_video_url', true);
							if($video_file){
								echo do_shortcode('[video height="'.$video_height.'" '.$video_type.'="'.$video_file.'" poster="'.$preview_image.'"][/video]');
							}
							break;
					}
					?>
					</div>
					<?php
				}
			?>
		</header><!-- .entry-header -->
		<div class="cs-blog-content">
			<?php echo cshero_content_render(); ?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
