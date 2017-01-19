<?php

function ww_add_post_type_my_client() {
    $labels = array(
        'name' => _x('Clients', 'Post type general name', 'organicfood'),
        'singular_name' => _x('Pro Clients', 'Post type singular name', 'organicfood'),
        'add_new' => _x('Add new client', 'Client Item', 'organicfood'),
        'add_new_item' => __('Add new client', 'organicfood'),
        'edit_item' => __('Edit client', 'organicfood'),
        'new_item' => __('New client', 'organicfood'),
        'all_items' => __('All clients', 'organicfood'),
        'view_item' => __('View', 'organicfood'),
        'search_items' => __('Search', 'organicfood'),
        'not_found' => __('No clients found.', 'organicfood'),
        'not_found_in_trash' => __('No clients found.', 'organicfood'),
        'parent_item_colon' => '',
        'menu_name' => 'Clients'
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
        'menu_icon' => 'dashicons-networking',
        'supports' => array('title', 'thumbnail')
    );
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type('myclients', $args);
    }
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy(
            'clientscategory', array('myclients'), array(
            'hierarchical' => true,
            'labels' => array(
                'name' => 'Client Categories',
                'add_new_item' =>
                'Add New Category',
                'parent_item' => 'Parent Category'),
            'query_var' => true,
            'rewrite' => array('slug' => 'clientscategory')
            )
        );
    }
}
add_action('init', 'ww_add_post_type_my_client');