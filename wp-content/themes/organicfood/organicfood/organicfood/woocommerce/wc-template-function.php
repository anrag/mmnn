<?php
add_theme_support( 'organicfood' );

/** Template pages ********************************************************/

if (!function_exists('cs_woocommerce_content')) {
    
    function cs_woocommerce_content() {

        if (is_singular('product')) {
            wc_get_template_part('single', 'product');
        } else {
            wc_get_template_part('archive', 'product');
        }
    }

}

/** Custom share button **************************************************/
add_action('woocommerce_share', 'woocommerce_share_func');
function woocommerce_share_func(){
    
    ?>
    <div class="woo-share">
        <span>Share: </span>
        <ul>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="https://twitter.com/home?status=https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
            </li>
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://plus.google.com/share?url=<?php the_permalink(); ?>&title=&summary=&source="><i class="fa fa-linkedin"></i></a>
            </li>
        </ul>
    </div>
    <?php
    return;
}
/**
* Change number of related products on product page
* Set your own value for 'posts_per_page'
*/ 
add_filter( 'woocommerce_output_related_products_args', 'cs_related_products_args' );
function cs_related_products_args( $args ) {
    $columns = 4;
    if (is_active_sidebar('cshero-woo-sidebar'))
        $columns = 3;
    $args['posts_per_page'] = $columns; // 4 related products
    $args['columns'] = $columns; // arranged in 4 columns
    return $args;
}
/*Add custom money*/
add_filter( 'woocommerce_currencies', 'add_my_currency' );
 
function add_my_currency( $currencies ) {
    $currencies['USh'] = __( 'Uganda Shillings', 'organicfood' );
    return $currencies;
}
 
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
 
function add_my_currency_symbol( $currency_symbol, $currency ) {
    switch( $currency ) {
        case 'USh': $currency_symbol = 'USh'; break;
    }
    return $currency_symbol;
} 
