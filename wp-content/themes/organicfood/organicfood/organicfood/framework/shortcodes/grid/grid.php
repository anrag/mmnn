<?php
function grid_func($atts) {
    $image = $heading = $title = $icon = $el_class = '';
    extract(shortcode_atts(array(
        'post_type' => 'portfolio',//post, portfolio
        'show_filter' => 0,
        'col_xs' => 'col-xs-12',
        'col_sm' => 'col-sm-6',
        'col_md' => 'col-md-4',
        'col_lg' => 'col-lg-3',
        'style' => 'style1',
        'crop_image' => 0,
        'width_image' => 300,
        'height_image' => 200,
        'show_title' => 0,
        'show_description' => 0,
        'excerpt_length' => 5,
        'excerpt_more' => '...',
        'orderby' => 'none',
        'order' => 'none',
        'el_class' => ''
    ), $atts));
    
    switch ($post_type) {
        case 'post':
            $taxonomy = 'category';
            break;
        case 'portfolio':
            $taxonomy = 'portfolio_category';
            break;
        default :
            $taxonomy = 'portfolio_category';
            break;
    }
    $column_class =array();
    $column_class[] = $col_xs;
    $column_class[] = $col_sm;
    $column_class[] = $col_md;
    $column_class[] = $col_lg;
    
    $class = array();
    $class[] = 'grid';
    $class[] = $el_class;
    
    
    
    $args = array(
        'posts_per_page' => -1,
        'post_type' => $post_type,
        'orderby' => $orderby,
        'order' => $order,
        'post_status' => 'publish'
    );
    
    $the_query = new WP_Query($args);
    
    wp_enqueue_style('colorbox', get_template_directory_uri() . "/framework/shortcodes/grid/colorbox.css",array(),"");
    wp_enqueue_style('grid-style', get_template_directory_uri() . "/framework/shortcodes/grid/grid-style.css",array(),"");
    
    wp_enqueue_script('jquery.mixitup.min', get_template_directory_uri() . "/framework/shortcodes/grid/jquery.mixitup.min.js",array(),"2.1.5");
    wp_enqueue_script('jquery.colorbox', get_template_directory_uri() . "/framework/shortcodes/grid/jquery.colorbox.js",array(),"1.5.5");
    wp_enqueue_script('grid', get_template_directory_uri() . "/framework/shortcodes/grid/grid.js",array(),"");
    
    ob_start();
    if ( $the_query->have_posts() ) {
    ?>
    <div class="<?php echo esc_attr(implode(' ', $class)); ?>">
        <?php if($show_filter == 1){ ?>
        <ul class="controls-filter">
            <li class="filter" data-filter="all"><a href="javascript:void(0);"><?php _e('Show All', 'organicfood');?></a></li>
            <?php
            $terms = get_terms($taxonomy);
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                    foreach ( $terms as $term ) {
                    ?>
                        <li class="filter" data-filter=".<?php echo esc_attr($term->slug); ?>"><a href="javascript:void(0);"><?php echo $term->name; ?></a></li>
                    <?php
                    }
                }
            ?>
        </ul>
        <?php } ?>
        <div id="Container" class="row">
            <?php while ( $the_query->have_posts() ) { $the_query->the_post(); ?>
                <?php
                $terms = wp_get_post_terms(get_the_ID(), $taxonomy);
                if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                    $term_list = array();
                    foreach ( $terms as $term ) {
                        $term_list[] = $term->slug;
                    }
                }
                ?>
                <div class="mix <?php echo esc_attr(implode(' ', $term_list)); ?> <?php echo esc_attr(implode(' ', $column_class)); ?>" data-myorder="<?php echo get_the_ID(); ?>" style="margin-bottom: 20px">
                    <?php include "tpl-$style.php"; ?> 
                </div>
            <?php } ?>
        </div>
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

if(function_exists('insert_shortcode')) { insert_shortcode('grid', 'grid_func'); }