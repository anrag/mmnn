<?php
    $same_height = ($same_height) ? 1 : 0;$onload = $same_height?"sameHeight()":"";
?>
<div class="woocommerce">
    <div id="ww_carousel_product<?php echo esc_attr($date); ?>" class="ww-carousel ww-carousel-product <?php echo esc_attr(implode(' ', $classes)); ?> ww-shopcarousel-default">
        <div class="ww-content">
            <div class="ww-carousel-product-list">
                <div data-moveslides="1" data-auto="<?php echo esc_attr($auto_scroll); ?>" data-prevselector="#ww_carousel_product<?php echo esc_attr($date); ?> .bx-prev" data-nextselector="#ww_carousel_product<?php echo esc_attr($date); ?> .bx-next" data-onsliderload="<?php echo esc_attr($onload);?>" data-touchenabled="1" data-controls="true" data-pager="false" data-pause="4000" data-auto="false" data-infiniteloop="true" data-adaptiveheight="true" data-speed="<?php echo esc_attr($speed); ?>" data-autohover="true" data-slidemargin="<?php echo esc_attr($margin_item); ?>" data-maxslides="4" data-minslides="1" data-slidewidth="<?php echo esc_attr($width_item); ?>" data-slideselector="" data-easing="swing" data-usecss="" data-resize="1" class="slider jm-bxslider">
                    <?php
                    $counter = 0;
                    while ($products->have_posts()) : $products->the_post();
                        $counter++;
                        ?>
                        <?php
                        global $product;
                        // Ensure visibility
                        if (!$product || !$product->is_visible())
                            return;

                        // Extra post classes
                        $classes = array();

                        $classes[] = 'ww-carouselt-item';
                        if ($rows == 1) {
                            echo '<div class="ww-carousel-item-wrap">';
                        } else {
                            if ($counter % $rows == 1) {
                                echo '<div class="ww-carousel-item-wrap">';
                            }
                        }
                        ?>
                        <article <?php post_class($classes); ?> <?php if (!$counter % $rows == 0) echo 'style="margin-bottom:' . $margin_item . 'px;"'; ?>>

                            <?php do_action('woocommerce_before_shop_loop_item'); ?>
                            <div class="woo-image">
                                <a href="<?php the_permalink(); ?>">
                                <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
                                <?php if ($show_add_to_cart): ?>
                                    <div class="woo-add-to-cart">
                                        <?php do_action('woocommerce_after_shop_loop_item'); ?>
                                    </div>
                                <?php endif; ?>
                                </a>
                            </div>
                            <div class="woo-decriptions">
                                <div class="woo-info">
                                    <?php if ($show_title): ?>
                                    <h3 class="woo-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <?php endif; ?>
                                    <?php if ($show_price || $show_rating): ?>
                                        <?php if ($show_price): ?>
                                            <div class="woo-rating"><?php do_action( 'woocommerce_template_loop_rating' );?></div>
                                        <?php endif;?>
                                        <?php if ($show_price): ?>
                                            <div class="woo-price"><?php do_action( 'woocommerce_template_loop_price' );?></div>
                                        <?php endif;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="woo-category">
                                <?php if ($show_category): ?>
                                    <?php $categories = get_the_term_list(get_the_ID(), 'product_cat', '', ', ', ''); ?>
                                    <span><?php print_r($categories); ?></span>
                                <?php endif; ?>
                            </div>
                        </article>
                        <?php
                        if ($rows == 1) {
                            echo '</div>';
                        } else {
                            if ($counter % $rows == 0) {
                                echo '</div>';
                            }
                        }
                    endwhile; // end of the loop.
                    ?>
                </div>
            </div>
            <?php if($show_nav){ ?>
                <div class="ww-nav text-right">
                <ul>
                    <li class="bx-prev"></li>
                    <li class="bx-next"></i></li>
                </ul>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
