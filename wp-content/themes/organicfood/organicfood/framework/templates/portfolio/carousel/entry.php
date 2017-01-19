<?php $post_id = get_the_ID(); ?>
<article id="post_<?php echo esc_attr($post_id); ?>" <?php post_class();?>>
    <div class="ww-carousel-portfolio-header">               
        <?php
        $options = get_option(OPTIONS);
        if (has_post_thumbnail()) {
            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full', false);
            $image_resize = matthewruddy_image_resize( $attachment_image[0], 600, 400, true, false );
            echo '<img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize['url']) .'" />';            
        } else {
            $attachment_image = ww_get_theme_option('default_portfolio_image_feature');
            if($attachment_image != ''){
                echo '<img src="' . esc_attr($attachment_image) . '" />';
            }            
        }
        ?>
        <div class="ww-carousel-portfolio-info">
            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" rel=""><i class="fa fa-share"></i></a>
        </div>
    </div>
    <div class="ww-carousel-portfolio-content">
         <h3 class="ww-carousel-portfolio-title"><?php the_title(); ?></h3>
         <?php echo get_the_term_list($post_id, 'portfolio_category', '', ', ', ''); ?>
    </div>
</article>