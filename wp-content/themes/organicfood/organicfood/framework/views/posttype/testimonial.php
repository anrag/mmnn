<?php

#-----------------------------------------------------------------#
# Create admin testimonial section
#-----------------------------------------------------------------#

function ww_add_post_type_testimonial() {
    $testimonial_labels = array(
        'name' => __('Testimonials', 'organicfood'),
        'singular_name' => __('Testimonial Item', 'organicfood'),
        'search_items' => __('Search Testimonial Items', 'organicfood'),
        'all_items' => __('Testimonial', 'organicfood'),
        'parent_item' => __('Parent Testimonial Item', 'organicfood'),
        'edit_item' => __('Edit Testimonial Item', 'organicfood'),
        'update_item' => __('Update Testimonial Item', 'organicfood'),
        'add_new_item' => __('Add New Testimonial Item', 'organicfood'),
        'not_found' => __('No testimonial found', 'organicfood')
    );

    $options = get_option('cshero');
    $custom_slug = null;

    if (!empty($options['testimonial_rewrite_slug']))
        $custom_slug = $options['testimonial_rewrite_slug'];

    $args = array(
        'labels' => $testimonial_labels,
        'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
        'singular_label' => __('Project', 'organicfood'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-yes',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );

    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type('testimonial', $args);
    }

    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy('testimonial_category', 'testimonial', array('hierarchical' => true, 'label' => __('Testimonial Categories', 'organicfood'), 'query_var' => true, 'rewrite' => true));
    }
    $labels = array(
        'name' => __('Testimonial Tags', 'organicfood'),
        'singular_name' => __('Tag', 'organicfood'),
        'search_items' => __('Search Tags', 'organicfood'),
        'popular_items' => __('Popular Tags', 'organicfood'),
        'all_items' => __('All Tags', 'organicfood'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag', 'organicfood'),
        'update_item' => __('Update Tag', 'organicfood'),
        'add_new_item' => __('Add New Tag', 'organicfood'),
        'new_item_name' => __('New Tag Name', 'organicfood'),
        'separate_items_with_commas' => __('Separate tags with commas', 'organicfood'),
        'add_or_remove_items' => __('Add or remove tags', 'organicfood'),
        'choose_from_most_used' => __('Choose from the most used tags', 'organicfood'),
        'menu_name' => __('Testimonial Tags', 'organicfood'),
    );

    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy('testimonial_tag', 'testimonial', array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'tag'),
        ));
    }
}

add_action('init', 'ww_add_post_type_testimonial');