<?php
function blog_func($atts) {
    extract(shortcode_atts(array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'category' => '',
        'team_category' => '',
        'recipe_category' => '',
        'col_xs' => 'col-xs-12',
        'col_sm' => 'col-sm-6',
        'col_md' => 'col-md-4',
        'col_lg' => 'col-lg-3',
        'styles' => 'style1',
        'team_styles' => 'style1',
        'recipe_styles' => 'style1',
        'crop_image' => 0,
        'width_image' => 300,
        'height_image' => 200,
        'show_title' => 0,
        'show_info' => 0,
        'show_description' => 0,
        'show_pagination' => 0,
        'excerpt_length' => 5,
        'excerpt_more' => '',
        'readmore_text' => '',
        'show_extra_excerpt' => 0,
        'orderby' => 'none',
        'order' => 'none',
        'el_class' => ''
    ), $atts));

    switch ($post_type) {
        case 'post':
            $category = $category;
            $taxonomy = 'category';
            $styles = $styles;
            break;
        case 'testimonial':
            $category = $testimonial_category;
            $taxonomy = 'testimonial_category';
            $styles = $testimonial_styles;
            break;
        case 'myclients':
            $category = $clientscategory;
            $taxonomy = 'clientscategory';
            $styles = $client_styles;
            break;
        case 'produce':
            $category = $produce_category;
            $taxonomy = 'produce_category';
            $styles = $produce_styles;
            break;
        case 'recipe':
            $category = $recipe_category;
            $taxonomy = 'recipe_category';
            $styles = $recipe_styles;
            break;
        case 'team':
            $category = $team_category;
            $taxonomy = 'team_category';
            $styles = $team_styles;
            break;
    }
    
    $column_class =array();
    $column_class[] = $col_xs;
    $column_class[] = $col_sm;
    $column_class[] = $col_md;
    $column_class[] = $col_lg;
    
    $class = array();
    $class[] = 'blog';
    $class[] = $post_type;
    $class[] = $el_class;
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => $post_type,
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => $taxonomy,
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
    
    ob_start();
    if ( $wp_query->have_posts() ) {
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
        <div class="row">
            <?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
                <div class="de-blog <?php echo esc_attr(implode(' ', $column_class)); ?>">
                    <?php
						$format = '';
						$format = get_post_format();
						if( file_exists( ABS_PATH . "/framework/shortcodes/blog/$post_type/tpl-$styles$format.php") ) {
							include "$post_type/tpl-$styles$format.php";
						}else{
							include "$post_type/tpl-$styles.php";
						}
						
					?>
                </div>
            <?php } ?>
        </div>
        <?php if($show_pagination): ?>
        <div class="pagination">
            <?php
            $big = 999999999; // need an unlikely integer

            echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => __( '&larr; Previous', 'organicfood' ),
                    'next_text' => __( 'Next &rarr;', 'organicfood' ),
            ) );
            ?>
        </div>
        <?php endif; ?>
    </div>
    <?php
    }else {
            echo 'Post not found!';
    } 
    ?>
    
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('blog', 'blog_func'); }
