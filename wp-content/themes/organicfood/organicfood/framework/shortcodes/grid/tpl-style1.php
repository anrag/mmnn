<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <div class="content center feature-delivery slider-blog">
        <?php if(has_post_thumbnail()){ ?>
            <div class="feature-delivery-image">
                <?php
                $attachment_full_image = '';
                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                $attachment_full_image = $attachment_image[0];
                if($crop_image){
                    $image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
                    echo '<img class="cropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
                }else{
                   echo get_the_post_thumbnail(get_the_ID());
                }
                ?>
                <a class="colorbox" href="<?php echo esc_url($attachment_full_image) ?>" title="<?php the_title(); ?>">
                    <span class="mosaic-hover"><i class="fa fa-plus-circle"></i></span>
                </a>

            </div>
        <?php } ?>
        <?php if($show_title){ ?>
            <h3 class="feature-delivery-title ns2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php } ?>
        <?php if($show_description){ ?>
            <div class="feature-delivery-description">
                <?php echo custom_excerpt($excerpt_length, $excerpt_more); ?>
            </div>
        <?php } ?>
    </div>
</article>
