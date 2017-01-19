<?php

add_action('init', 'grid_integrateWithVC');

function grid_integrateWithVC() {
    vc_map(array(
        "name" => __("Grid", 'organicfood'),
        "base" => "grid",
        "class" => "grid",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Post Type", 'organicfood'),
                "param_name" => "post_type",
                "value" => array(
                    "Post" => "post",
                    "Portfolio" => "portfolio",
                ),
				"std" => "post",
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Filter', 'organicfood'),
                "param_name" => "show_filter",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
                ),
                "description" => __('Show or hide filter on your grid.', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Columns Extra Screen", 'organicfood'),
                "param_name" => "col_xs",
				"std" => "col-sx-12",
                "value" => array(
                    "1 Column" => "col-sx-12",
                    "2 Columns" => "col-sx-6",
                    "3 Columns" => "col-sx-4",
                    "4 Columns" => "col-sx-3",
                    "6 Columns" => "col-sx-2",
                ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Columns Small Screen", 'organicfood'),
                "param_name" => "col_sm",
				"std" => "col-sx-12",
                "value" => array(
                    "1 Column" => "col-sm-12",
                    "2 Columns" => "col-sm-6",
                    "3 Columns" => "col-sm-4",
                    "4 Columns" => "col-sm-3",
                    "6 Columns" => "col-sm-2",
                ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Columns Medium Screen", 'organicfood'),
                "param_name" => "col_md",
				"std" => "col-sx-12",
                "value" => array(
                    "1 Column" => "col-md-12",
                    "2 Columns" => "col-md-6",
                    "3 Columns" => "col-md-4",
                    "4 Columns" => "col-md-3",
                    "6 Columns" => "col-md-2",
                ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Columns Large Screen", 'organicfood'),
                "param_name" => "col_lg",
				"std" => "col-sx-12",
                "value" => array(
                    "1 Column" => "col-lg-12",
                    "2 Columns" => "col-lg-6",
                    "3 Columns" => "col-lg-4",
                    "4 Columns" => "col-lg-3",
                    "6 Columns" => "col-lg-2",
                ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "style",
				"std" => "style1",
                "value" => array(
                    "Style 1" => "style1",
                ),
                "description" => __('Style', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Crop image', 'organicfood'),
                "param_name" => "crop_image",
                "value" => array(
                    __("Yes, please", 'organicfood') => true
                ),
                "description" => __('Crop or not crop image on your Post.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Width image', 'organicfood'),
                "param_name" => "width_image",
                "description" => __('Enter the width of image. Default: 300.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Height image', 'organicfood'),
                "param_name" => "height_image",
                "description" => __('Enter the height of image. Default: 200.', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Title', 'organicfood'),
                "param_name" => "show_title",
                "value" => array(
                    __("Yes, please", 'organicfood') => true
                ),
                "description" => __('Show or hide title of post on your grid.', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Description', 'organicfood'),
                "param_name" => "show_description",
                "value" => array(
                    __("Yes, please", 'organicfood') => true
                ),
                "description" => __('Show or hide description of post on your grid.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Excerpt Length', 'organicfood'),
                "param_name" => "excerpt_length",
                "value" => '',
                "description" => __('The length of the excerpt, number of words to display.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Excerpt More', 'organicfood'),
                "param_name" => "excerpt_more",
                "value" => "",
                "description" => __('Excerpt More', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order by', 'organicfood'),
                "param_name" => "orderby",
				"std" => "none",
                "value" => array(
                    "None" => "none",
                    "Title" => "title",
                    "Date" => "date",
                    "ID" => "ID"
                ),
                "description" => __('Order by ("none", "title", "date", "ID").', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order', 'organicfood'),
                "param_name" => "order",
				"std" => "none",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
                "description" => __('Order ("None", "Asc", "Desc").', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'organicfood'),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra Class.", 'organicfood')
            ),
        )
    ));
}
