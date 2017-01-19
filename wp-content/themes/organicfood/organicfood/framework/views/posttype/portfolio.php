<?php
// Register Custom Post Type
function cs_add_post_type_portfolio() {
    // Register taxonomy
    $labels = array(
            'name'              => __( 'Portfolio Category', 'organicfood' ),
            'singular_name'     => __( 'Portfolio Category', 'organicfood' ),
            'search_items'      => __( 'Search Portfolio Category', 'organicfood' ),
            'all_items'         => __( 'All Portfolio Category', 'organicfood' ),
            'parent_item'       => __( 'Parent Portfolio Category', 'organicfood' ),
            'parent_item_colon' => __( 'Parent Portfolio Category:', 'organicfood' ),
            'edit_item'         => __( 'Edit Portfolio Category', 'organicfood' ),
            'update_item'       => __( 'Update Portfolio Category', 'organicfood' ),
            'add_new_item'      => __( 'Add New Portfolio Category', 'organicfood' ),
            'new_item_name'     => __( 'New Portfolio Category Name', 'organicfood' ),
            'menu_name'         => __( 'Portfolio Category', 'organicfood' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio_category' ),
    );
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );
    }
    //Register tags
    $labels = array(
            'name'              => __( 'Portfolio Tag', 'organicfood' ),
            'singular_name'     => __( 'Portfolio Tag', 'organicfood' ),
            'search_items'      => __( 'Search Portfolio Tag', 'organicfood' ),
            'all_items'         => __( 'All Portfolio Tag', 'organicfood' ),
            'parent_item'       => __( 'Parent Portfolio Tag', 'organicfood' ),
            'parent_item_colon' => __( 'Parent Portfolio Tag:', 'organicfood' ),
            'edit_item'         => __( 'Edit Portfolio Tag', 'organicfood' ),
            'update_item'       => __( 'Update Portfolio Tag', 'organicfood' ),
            'add_new_item'      => __( 'Add New Portfolio Tag', 'organicfood' ),
            'new_item_name'     => __( 'New Portfolio Tag Name', 'organicfood' ),
            'menu_name'         => __( 'Portfolio Tag', 'organicfood' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );
    }
    
    //Register post type portfolio
    $labels = array(
            'name'                => __( 'Portfolio', 'organicfood' ),
            'singular_name'       => __( 'Portfolio Item', 'organicfood' ),
            'menu_name'           => __( 'Portfolio', 'organicfood' ),
            'parent_item_colon'   => __( 'Parent Item:', 'organicfood' ),
            'all_items'           => __( 'All Items', 'organicfood' ),
            'view_item'           => __( 'View Item', 'organicfood' ),
            'add_new_item'        => __( 'Add New Item', 'organicfood' ),
            'add_new'             => __( 'Add New', 'organicfood' ),
            'edit_item'           => __( 'Edit Item', 'organicfood' ),
            'update_item'         => __( 'Update Item', 'organicfood' ),
            'search_items'        => __( 'Search Item', 'organicfood' ),
            'not_found'           => __( 'Not found', 'organicfood' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'organicfood' ),
    );
    $args = array(
            'label'               => __( 'portfolio', 'organicfood' ),
            'description'         => __( 'Portfolio Description', 'organicfood' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
            'taxonomies'          => array( 'portfolio_category', 'portfolio_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-welcome-view-site',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'portfolio', $args );
    }
    
}

// Hook into the 'init' action
add_action( 'init', 'cs_add_post_type_portfolio', 0 );
