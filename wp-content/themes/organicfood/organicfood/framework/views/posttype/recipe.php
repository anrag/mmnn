<?php
// Register Custom Post Type
function cs_add_post_type_recipe() {
    // Register taxonomy
    $labels = array(
            'name'              => __( 'Recipe Category', 'organicfood' ),
            'singular_name'     => __( 'Recipe Category', 'organicfood' ),
            'search_items'      => __( 'Search Recipe Category', 'organicfood' ),
            'all_items'         => __( 'All Recipe Category', 'organicfood' ),
            'parent_item'       => __( 'Parent Recipe Category', 'organicfood' ),
            'parent_item_colon' => __( 'Parent Recipe Category:', 'organicfood' ),
            'edit_item'         => __( 'Edit Recipe Category', 'organicfood' ),
            'update_item'       => __( 'Update Recipe Category', 'organicfood' ),
            'add_new_item'      => __( 'Add New Recipe Category', 'organicfood' ),
            'new_item_name'     => __( 'New Recipe Category Name', 'organicfood' ),
            'menu_name'         => __( 'Recipe Category', 'organicfood' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'recipe_category' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy('recipe_category', array( 'recipe' ), $args );
    }
    
    //Register tags
    $labels = array(
            'name'              => __( 'Recipe Tag', 'organicfood' ),
            'singular_name'     => __( 'Recipe Tag', 'organicfood' ),
            'search_items'      => __( 'Search Recipe Tag', 'organicfood' ),
            'all_items'         => __( 'All Recipe Tag', 'organicfood' ),
            'parent_item'       => __( 'Parent Recipe Tag', 'organicfood' ),
            'parent_item_colon' => __( 'Parent Recipe Tag:', 'organicfood' ),
            'edit_item'         => __( 'Edit Recipe Tag', 'organicfood' ),
            'update_item'       => __( 'Update Recipe Tag', 'organicfood' ),
            'add_new_item'      => __( 'Add New Recipe Tag', 'organicfood' ),
            'new_item_name'     => __( 'New Recipe Tag Name', 'organicfood' ),
            'menu_name'         => __( 'Recipe Tag', 'organicfood' ),
    );

    $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'recipe_tag' ),
    );
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy( 'recipe_tag', array( 'recipe' ), $args );
    }
    
    //Register post type portfolio
    $labels = array(
            'name'                => _x( 'Recipe', 'Post Type General Name', 'organicfood' ),
            'singular_name'       => _x( 'Recipe Item', 'Post Type Singular Name', 'organicfood' ),
            'menu_name'           => __( 'Recipe', 'organicfood' ),
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
            'label'               => __( 'Recipe', 'organicfood' ),
            'description'         => __( 'Recipe Description', 'organicfood' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments' ),
            'taxonomies'          => array( 'recipe_category', 'recipe_tag' ),
            'hierarchical'        => true,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'menu_icon'           => 'dashicons-pressthis',
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type( 'recipe', $args );
    }

}

// Hook into the 'init' action
add_action( 'init', 'cs_add_post_type_recipe', 0 );
