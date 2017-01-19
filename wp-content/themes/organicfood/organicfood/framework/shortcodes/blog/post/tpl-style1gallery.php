<article id="post_<?php the_ID() ?>" <?php post_class(); ?>>
    <?php if ($show_title == 1) { ?>
        <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php } ?>
    <?php if ($show_info == 1) { ?>
        <div class="blog-info">
            <time class="publish-date" datetime="<?php echo get_the_date('Y-m-j') . ' ' . get_the_time('H:i:s'); ?>" pubdate="pubdate">
                <?php _e('Published on', 'organicfood'); ?> <?php echo get_the_date('l, j F Y') . ' ' . get_the_time('H:i'); ?>
            </time>
            <span class="category-name"><?php the_terms(get_the_ID(), $taxonomy, __('Category: ', 'organicfood') , ', ' ); ?></span>
        </div>
    <?php } ?>
    <div class="blog-image">
    <?php
        $date = time() . '_' . uniqid(true);
        $i = 0;
        $gallery = get_post_gallery( get_the_ID(), false );
        if(!empty($gallery)):
            $image_ids = explode(",", $gallery['ids']);
        ?>
            <div id="carousel-generic<?php echo $date; ?>" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($image_ids as $image_id){
                        $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                        ?>
                        <div class="item <?php if($i==0){ echo 'active'; } ?>">
                            <img style="width: 100%;" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                        </div>
                        <?php 
                        $i++;
                    }
                    ?>
                </div>
                <a class="left carousel-control" href="#carousel-generic<?php echo $date; ?>" role="button" data-slide="prev">
                    <span class="ion-ios7-arrow-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-generic<?php echo $date; ?>" role="button" data-slide="next">
                    <span class="ion-ios7-arrow-right"></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
    <?php if ($show_description == 1) { ?>
        <div class="blog-description">
            <?php echo custom_excerpt($excerpt_length, $excerpt_more); ?>
        </div>
    <?php } ?>
    <?php if (!empty($readmore_text)) { ?>
        <a class="readmore" href="<?php the_permalink(); ?>"><?php echo $readmore_text; ?>: <?php the_title(); ?></a>
    <?php } ?>
</article>
