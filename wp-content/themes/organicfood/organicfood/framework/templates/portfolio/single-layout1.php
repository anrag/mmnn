<?php
global $smof_data;
?>
<article id="cs_post_<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="row cs-single-portfolio">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cs-media">
                <?php
                if (has_post_thumbnail()){
                    the_post_thumbnail('full');
                }
                ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cs-info">
                <h3 class="headline align-left underline"><?php the_title(); ?></h3>
                <p class="category-name"><?php the_terms(get_the_ID(), 'portfolio_category', __('Category: ', 'organicfood') , ', ' ); ?></p>
                <p class="cs-decs"><?php the_excerpt(); ?></p>
            </div>
        </div>
    </div>
    <?php echo do_shortcode(get_the_content()); ?>
</article>