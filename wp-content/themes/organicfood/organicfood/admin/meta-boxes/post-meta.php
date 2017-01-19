<?php

add_action('add_meta_boxes', 'iz_metabox_posts');

function iz_metabox_posts() {
    $wp_version = floatval(get_bloginfo('version'));
    
    #-----------------------------------------------------------------#
    # Post type recipe setting
    #-----------------------------------------------------------------#
    $meta_box = array(
        'id' => 'iz-metabox-post-recipe',
        'title' => __('Recipe Setting', 'organicfood'),
        'description' => __('', 'organicfood'),
        'post_type' => 'recipe',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Extra Excerpt', 'organicfood'),
                'desc' => __('Enter extra excerpt of post recipe.', 'organicfood'),
                'id' => 'recipe_extra_excerpt',
                'type' => 'editor',
                'std' => ''
            )
        )
    );
    $callback = create_function('$post, $meta_box', 'iz_create_meta_box( $post, $meta_box["args"] );');
    add_meta_box($meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box);
    
    #-----------------------------------------------------------------#
    # Post type team setting
    #-----------------------------------------------------------------#
    $meta_box = array(
        'id' => 'iz-metabox-post-team',
        'title' => __('Team Setting', 'organicfood'),
        'description' => __('', 'organicfood'),
        'post_type' => 'team',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Team Position', 'organicfood'),
                'desc' => __('Enter team position of post team.', 'organicfood'),
                'id' => 'team_position',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Team Skill', 'organicfood'),
                'desc' => __('Enter team skill of post team.', 'organicfood'),
                'id' => 'team_skill',
                'type' => 'textarea',
                'std' => ''
            ),
            array(
                'name' => __('Facebook Link', 'organicfood'),
                'desc' => __('Enter facebook link of post team.', 'organicfood'),
                'id' => 'team_facebook_link',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Twitter Link', 'organicfood'),
                'desc' => __('Enter twitter link of post team.', 'organicfood'),
                'id' => 'team_twiter_link',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Google Plus Link', 'organicfood'),
                'desc' => __('Enter google plust link of post team.', 'organicfood'),
                'id' => 'team_google_plus_link',
                'type' => 'text',
                'std' => ''
            ),
            array(
                'name' => __('Linkedin Link', 'organicfood'),
                'desc' => __('Enter linkedin link of post team.', 'organicfood'),
                'id' => 'team_linkedin_link',
                'type' => 'text',
                'std' => ''
            )
        )
    );
    $callback = create_function('$post, $meta_box', 'iz_create_meta_box( $post, $meta_box["args"] );');
    add_meta_box($meta_box['id'], $meta_box['title'], $callback, $meta_box['post_type'], $meta_box['context'], $meta_box['priority'], $meta_box);
    
}
