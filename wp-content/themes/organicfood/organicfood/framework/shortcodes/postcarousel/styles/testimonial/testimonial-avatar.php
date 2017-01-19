<?php
    $same_height = ($same_height) ? 1 : 0;$onload = $same_height?"sameHeight()":"";
?>
<div id="ww_carousel_tesimonial<?php echo esc_attr($date); ?>" class="cs-carousel-tesimonial <?php echo $same_height?'sameheight':'';?> <?php echo esc_attr($cl_show).' '.esc_attr($el_class).' '.esc_attr($styles); ?>">
        <div class="cs-content">
            <div class="cs-carousel-list">
                <div id="cs_carousel_tesimonial_<?php echo esc_attr($date); ?>" data-moveslides="1" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-pagerselector="#ww_carousel_tesimonial<?php echo esc_attr($date); ?> .wp-controls" data-prevselector="#ww_carousel_tesimonial<?php echo esc_attr($date); ?> .bx-prev" data-nextselector="#ww_carousel_tesimonial<?php echo esc_attr($date); ?> .bx-next" data-onsliderload="<?php echo esc_attr($onload);?>" data-touchenabled="1" data-controls="true" data-pager="<?php echo esc_attr($show_pager);?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_scroll); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="4" data-minslides="1" data-slidewidth="<?php echo esc_attr($width_item);?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                    <?php
                    $counter =0;
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                    $counter++;
                    if($rows == 1){
                            echo '<div class="cs-carousel-item-wrap">';
                        }else{
                            if($counter % $rows == 1){
                                echo '<div class="cs-carousel-item-wrap">';
                            }
                        }
                    ?>
                        <div class="cs-carousel-item" <?php if(!$counter % $rows == 0) echo 'style="margin-bottom:'.esc_attr($margin_item).'px;"'; ?>>
                            <article id="post-<?php echo the_ID() ?>" <?php  post_class(); ?>>
                                <div class="cs-carousel-container">
                                    <div class="row">
                                    <?php if($show_image):?>
                                    <div class="cs-carousel-header col-md-3">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            if($crop_image){
                                                $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                                $image_resize = matthewruddy_image_resize( $attachment_image[0], $width_image, $height_image, true, false );
                                                echo '<img class="attachment-featuredImageCropped" src="'. esc_attr($image_resize['url']) .'" alt="">';
                                            }else{
                                               echo get_the_post_thumbnail($post->ID);
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="cs-carousel-body <?php echo $show_image?'col-md-9':'col-md-12'?>">
                                        <div class="cs-carousel-inner">
                                            <?php if ($show_description) { ?>
                                            <div class="cs-carousel-post-description">
                                                 <?php
                                                    if ($excerpt_length != -1) { 
                                                        echo custom_excerpt($excerpt_length, $excerpt_more);
                                                    } else {
                                                        the_content(); 
                                                    }
                                                ?>
                                            </div>
                                            <?php } ?>
                                            
                                            <?php if ($show_title) { ?>
                                            <div class="cs-carousel-post-title">
                                                <?php the_title(); ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if($show_info):?>
                                        <div class="cs-carousel-meta">
                                            <span><i class="fa fa-clock-o"></i> <?php echo get_the_date('d.m.Y'); ?></span>
                                            <span class="cs-carousel-category"><i class="fa fa-comment-o"></i>
                                                <?php
                                                $comments = (int)get_comments_number();
                                                echo $comments > 0 ? $comments." Comments" :_e("No Comments",'organicfood') ;
                                                ?>
                                            </span>
                                            <span><i class="fa fa-pencil"></i> <?php the_author(); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if($read_more): ?>
                                        <div class="cs-carousel-footer">
                                            <div class="cs-carousel-post-read-more">
                                                <a href="<?php the_permalink(); ?>"><?php echo esc_attr($read_more); ?></a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    </div>
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
                    <div class=" <?php echo $show_image?'col-md-offset-3':''?> wp-controls"></div>
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
        </div>
    </div>