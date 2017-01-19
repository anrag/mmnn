<?php

function ww_add_post_type_produce() {
    // Register taxonomy
    $labels = array(
            'name'              => __( 'Produce Category', 'organicfood' ),
            'singular_name'     => __( 'Produce Category', 'organicfood' ),
            'search_items'      => __( 'Search Produce Category', 'organicfood' ),
            'all_items'         => __( 'All Produce Category', 'organicfood' ),
            'parent_item'       => __( 'Parent Produce Category', 'organicfood' ),
            'parent_item_colon' => __( 'Parent Produce Category:', 'organicfood' ),
            'edit_item'         => __( 'Edit Produce Category', 'organicfood' ),
            'update_item'       => __( 'Update Produce Category', 'organicfood' ),
            'add_new_item'      => __( 'Add New Produce Category', 'organicfood' ),
            'new_item_name'     => __( 'New Produce Category Name', 'organicfood' ),
            'menu_name'         => __( 'Produce Category', 'organicfood' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'produce_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'produce_category', array( 'produce' ), $args );
    }
    //Register post type
    $labels = array(
        'name' => _x('Produce', 'Post type general name', 'organicfood'),
        'singular_name' => _x('Produce', 'Post type singular name', 'organicfood'),
        'add_new' => _x('Add New', 'Produce Item', 'organicfood'),
        'add_new_item' => __('Add New Item', 'organicfood'),
        'edit_item' => __('Edit Item', 'organicfood'),
        'new_item' => __('New Item', 'organicfood'),
        'all_items' => __('All Items', 'organicfood'),
        'view_item' => __('View Item', 'organicfood'),
        'search_items' => __('Search Items', 'organicfood'),
        'not_found' => __('No produces found.', 'organicfood'),
        'not_found_in_trash' => __('No produces found.', 'organicfood'),
        'parent_item_colon' => '',
        'menu_name' => __('Produce', 'organicfood')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'produce', $args );
    }
    
}
add_action('init', 'ww_add_post_type_produce');