<?php
    $same_height = ($same_height) ? 1 : 0;$onload = $same_height?"sameHeight()":"";
?>
<div id="ww_carousel_post<?php echo esc_attr($date); ?>" class="ww-carousel <?php echo $same_height?'sameheight':'';?> slider-post <?php echo esc_attr($cl_show).' '.esc_attr($el_class); ?>">
    <div class="ww-content">
        <?php if($wp_query->have_posts()): ?>
            <div class="ww-carousel-list">
                <div id="ww_carousel_post_<?php echo esc_attr($date); ?>" data-moveslides="1" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#ww_carousel_post<?php echo esc_attr($date); ?> .bx-prev" data-nextselector="#ww_carousel_post<?php echo esc_attr($date); ?> .bx-next" data-onsliderload="<?php echo esc_attr($onload);?>" data-touchenabled="1" data-controls="true" data-pagerselector="#ww_carousel_post<?php echo esc_attr($date); ?> .wp-controls" data-pager="<?php echo esc_attr($show_pager);?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_scroll); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="4" data-minslides="1" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                    <?php
                    $counter =0;
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    $counter++;
                    if($rows == 1){
                            echo '<div class="ww-carousel-item-wrap">';
                        }else{
                            if($counter % $rows == 1){
                                echo '<div class="ww-carousel-item-wrap">';
                            }
                        }
                    ?>
                        <div class="ww-carousel-item" <?php if(!$counter % $rows == 0) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                            <article id="post-<?php echo the_ID() ?>" <?php  post_class(); ?>>
                                <div class="slider-blog">
                                    <?php if ($show_info) { ?>
                                        <div class="ns2-date-blog">
                                            <span class="ns2_date_day"><?php echo get_the_time('d'); ?></span>
                                            <div class="ns2_date_month_year">
                                                <span class="ns2_date_month"><?php echo get_the_time('M'); ?></span>
                                                <span class="ns2_date_year"><?php echo get_the_time('Y'); ?></span>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($show_title) { ?>
                                        <h4 class="ns2-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                    <?php } ?>
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="ns2-image">
                                            <?php
                                            $attachment_full_image = "";
                                            $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                            $attachment_full_image = $attachment_image[0];
                                            if($crop_image == true || $crop_image == 1){
                                                $image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
                                                echo '<a href="'.esc_url(get_the_permalink()).'"><img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize['url']) .'" alt=""></a>';
                                            }else{
                                               echo '<a href="'.esc_url(get_the_permalink()).'">'.get_the_post_thumbnail($post->ID).'</a>';
                                            }
                                            ?>
                                        </div>
                                    <?php } ?>
                                    <?php if($show_description){ ?>
                                    <div class="ns2-introtext slider-post-content">
                                         <?php
                                            if ($excerpt_length != -1) { 
                                                echo custom_excerpt($excerpt_length, $excerpt_more);
                                            } else {
                                                the_content(); 
                                            }
                                        ?>
                                    </div>
                                    <?php } ?>
                                    <?php if($read_more): ?>
                                        <div class="ns2-links">
                                            <a class="wpb_button wpb_btn-primary wpb_regularsize" href="<?php the_permalink(); ?>"><?php echo esc_attr($read_more); ?></a>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </article>
                        </div>
                    <?php
                    if($rows == 1){
                        echo '</div>';
                    }else{
                        if($counter % $rows == 0){
                            echo '</div>';
                        }
                    }
                    endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
            <?php if($show_pager){ ?>
                <div class="row">
                    <div class="wp-controls"></div>
                </div>
            <?php } ?>
            <?php if($show_nav){ ?>
                <div class="ww-nav <?php echo esc_attr($nav_position); ?>">
                    <ul>
                        <li class="bx-prev"></li>
                        <li class="bx-next"></li>
                    </ul>
                </div>
            <?php } ?>
            <?php
                    else :
                            echo 'Post not found!';
                    endif;
            ?>
    </div>
</div>