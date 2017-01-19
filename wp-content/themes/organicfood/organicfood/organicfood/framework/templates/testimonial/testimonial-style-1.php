<?php
    global $testimonial_options;
    extract($testimonial_options);
?>
<?php if ($title != "" || $description != "") { ?>
    <div class="cs-header cs-testimonial-header title-<?php echo $layout;?>">
        <?php if ($title != "") { ?>
            <h3 class="cs-title cs-testimonial-title"><?php echo $title; ?></h3>
        <?php } ?>
        <?php if ($description != "") { ?>
            <p class="cs-testimonial-desc"><?php echo $description; ?></p>
        <?php } ?>
    </div>
<?php } ?>
<div class="cs-testimonial-wrapper <?php echo $layout;?>">            
    <div class="cs-testimonial-content-main">
        <div id="cs_testimonial_<?php echo $date; ?>">
            <?php
            $counter =0;
            while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>
                <div id="post-<?php the_ID() ?>" <?php  post_class($columns); ?>>
                    <?php if ($show_title == true || $show_title == 1 || $show_category == true || $show_category == 1) { ?>
                        <div class="cs-testimonial-description">
                            <?php if ($show_description == true || $show_description == 1) { ?>
                                <div class="cs-testimonial-text"><?php echo substr(get_the_content($read_more), 0, $excerpt_length); ?></div>
                            <?php } ?>
                            <div class="ArrowWrap"><span class="arrow"></span></div>
                        </div>
                    <?php } ?>
                    <?php
                    if (has_post_thumbnail()){
                        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                        if($crop_image == true || $crop_image == 1){                                            
                            $image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
                            echo '<div class="cs-testimonial-featured-img"><img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize['url']) .'" /><span class="circle-border"></span></div>';
                        }else{
                           echo '<div class="cs-testimonial-featured-img"><img src="'. esc_attr($attachment_image[0]) .'" /><span class="circle-border"></span></div>';
                        } 
                    } else {
                        $attachment_image = ww_get_theme_option('default_image_feature');
                        if($attachment_image != ''){
                            if($crop_image == true || $crop_image == 1){                                            
                                $image_resize = matthewruddy_image_resize( $attachment_image, $width_image, $height_image, true, false );
                                echo '<div class="cs-testimonial-featured-img"><img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize['url']) .'" /><span class="circle-border"></span></div>';
                            }else{
                               echo '<div class="cs-testimonial-featured-img"><img src="' . esc_attr($attachment_image) . '" /><span class="circle-border"></span></div>';
                            } 
                        }                                            
                    }
                    ?>
                    <?php if ($show_title == true || $show_title == 1 || $show_category == true || $show_category == 1) { ?>
                        <div class="cs-testimonial-content">
                            <?php if ($show_title == true || $show_title == 1) { ?>
                                <h3 class="cs-title cs-testimonial-title"><?php the_title() ?></h3>
                            <?php } ?>
                            <?php if ($show_category == true || $show_category == 1) { ?>
                                <div class="cs-testimonial-category"><?php echo strip_tags (get_the_term_list($post->ID, 'testimonial_category', '', ', ', '')); ?></div>
                            <?php } ?>
                           
                        </div>
                    <?php } ?>
                </div>
                <?php
            ?>                            
            <?php 
            endwhile;
            wp_reset_query();
            ?> 
        </div>
    </div>
</div>