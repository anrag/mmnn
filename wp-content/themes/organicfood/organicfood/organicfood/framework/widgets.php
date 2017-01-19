<?php

get_template_part('framework/widgets/social');

get_template_part('framework/widgets/post_carousel');

get_template_part('framework/widgets/new_tabs');

if (class_exists ( 'Woocommerce' )) {
    get_template_part('framework/widgets/product_carousel');
    get_template_part('framework/widgets/woo-my-account');
    get_template_part('framework/widgets/exp-cart');
}
