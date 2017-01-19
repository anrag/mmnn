<?php
$cl_show = ''; 
$show_link = isset($show_link)?$show_link:0; 
if ($show_nav == true || $show_nav == 1) {
    $cl_show .= ' show-nav';
}
    $same_height = ($same_height) ? 1 : 0;$onload = $same_height?"sameHeight()":"";
?>
<div  id="ww_carousel_produce<?php echo esc_attr($date); ?>" class="cs-carousel <?php echo $same_height?'sameheight':'';?> slider-post <?php echo esc_attr($cl_show) . ' ' . esc_attr($el_class); ?>">             
    <div class="cs-content">
        <div class="cs-carousel-list">
            <div id="cs_carousel_produce_<?php echo esc_attr($date); ?>" data-moveslides="1" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#ww_carousel_produce<?php echo esc_attr($date); ?> .bx-prev" data-nextselector="#ww_carousel_produce<?php echo $date; ?> .bx-next" data-onsliderload="<?php echo esc_attr($onload);?>" data-touchenabled="1" data-controls="true" data-pagerselector="#ww_carousel_produce<?php echo esc_attr($date); ?> .wp-controls" data-pager="<?php echo esc_attr($show_pager);?>" data-pause="4000" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed_scroll); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="6" data-minslides="1" data-slidewidth="<?php echo esc_attr($width_item); ?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                <?php
                $counter = 0;
                while ($wp_query->have_posts()) : $wp_query->the_post();
                    $counter++;
                    if ($rows == 1) {
                        echo '<div class="cs-carousel-item-wrap">';
                    } else {
                        if ($counter % $rows == 1) {
                            echo '<div class="cs-carousel-item-wrap">';
                        }
                    }
                    ?>
                    <div class="cs-carousel-item" <?php if (!$counter % $rows == 0) echo 'style="margin-bottom:' . esc_attr($margin_item) . 'px;"'; ?>>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="cs-carousel-container center">
                                <?php if ($show_title) { ?>
                                    <div><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                <?php } ?>
                                <?php
                                if (has_post_thumbnail()) {
                                    $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false);
                                    if ($crop_image) {
                                        $image_resize = matthewruddy_image_resize($attachment_image[0], $width_image, $height_image, true, false);
                                        echo '<img class="attachment-featuredImageCropped" src="' . esc_attr($image_resize['url']) . '" alt="">';
                                    } else {
                                        echo '<img src="' . esc_attr($attachment_image[0]) . '" alt="">';
                                    }
                                }
                                ?>
                            </div>
                        </article>
                    </div>
                    <?php
                    if ($rows == 1) {
                        echo '</div>';
                    } else {
                        if ($counter % $rows == 0) {
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
        <?php if ($show_nav) { ?>
        <div class="ww-nav <?php echo esc_attr($nav_position); ?>">
                <ul>
                    <li class="bx-prev"></li>
                    <li class="bx-next"></li>
                </ul>
        </div>
        <?php } ?>
    </div>
</div>