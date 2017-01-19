<?php
#-----------------------------------------------------------------#
# Create admin team section
#-----------------------------------------------------------------#
function ww_add_post_type_team() {
    $team_labels = array(
        'name' => __('Team', 'organicfood'),
        'singular_name' => __('Team Item', 'organicfood'),
        'search_items' => __('Search Team Items', 'organicfood'),
        'all_items' => __('Team', 'organicfood'),
        'parent_item' => __('Parent Team Item', 'organicfood'),
        'edit_item' => __('Edit Team Item', 'organicfood'),
        'update_item' => __('Update Team Item', 'organicfood'),
        'add_new_item' => __('Add New Team Item', 'organicfood'),
        'not_found' => __('No team found', 'organicfood')
    );
    $options = get_option('cshero');
    $custom_slug = null;
    if (!empty($options['team_rewrite_slug']))
        $custom_slug = $options['team_rewrite_slug'];
    $args = array(
        'labels' => $team_labels,
        'rewrite' => array('slug' => $custom_slug, 'with_front' => false),
        'singular_label' => __('Project', 'organicfood'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'hierarchical' => false,
        'menu_position' => 9,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );
    
    if(function_exists('custom_reg_post_type')) {
        custom_reg_post_type('team', $args);
    }
    
    if(function_exists('custom_reg_taxonomy')) {
        custom_reg_taxonomy("team_category", array("team"), array("hierarchical" => true, "label" => __('Team Categories', 'organicfood'), 'query_var' => true, 'rewrite' => true));
    }
    
}
add_action('init', 'ww_add_post_type_team');