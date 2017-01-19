<?php

add_action('init', 'blog_integrateWithVC');

function blog_integrateWithVC() {
    vc_map(array(
        "name" => __("Blog", 'organicfood'),
        "base" => "blog",
        "class" => "blog",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "holder" => "div",
                "class" => "",
                "heading" => __("Post Type", 'organicfood'),
                "param_name" => "post_type",
				"std" => "post",
                "value" => array(
                    "Post" => "post",
                    "Recipe" => "recipe",
                    "Team" => "team",
                ),
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Post Count", 'organicfood'),
                "param_name" => "posts_per_page",
                "value" => "",
            ),
            array (
                "type" => "pro_taxonomy",
                "taxonomy" => "category",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"post"
                    )
                ,
                "heading" => __ ( "Categories", 'organicfood' ),
                "param_name" => "category",
                "class" => "",
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
            ),
            array (
                "type" => "pro_taxonomy",
                "taxonomy" => "team_category",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"team"
                    )
                ,
                "class" => "",
                "heading" => __ ( "Categories", 'organicfood' ),
                "param_name" => "team_category",
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
            ),
            array (
                "type" => "pro_taxonomy",
                "taxonomy" => "recipe_category",
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"recipe"
                    )
                ,
                "class" => "",
                "heading" => __ ( "Categories", 'organicfood' ),
                "param_name" => "recipe_category",
                "description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
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
                "param_name" => "styles",
				"std" => "style1",
                "value" => array(
                    "Style 1" => "style1",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"post"
                    )
                ,
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "team_styles",
				"std" => "style1",
                "value" => array(
                    "Style Image Left" => "style1",
                    "Style Image Right" => "style2",
                    "Style Image Top" => "style3",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"team"
                    )
                ,
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "recipe_styles",
				"std" => "style1",
                "value" => array(
                    "Style 1" => "style1",
                ),
                "dependency" => array(
                    "element"=>"post_type",
                    "value"=>"recipe"
                    )
                ,
            ),
            array(
                "type" => "checkbox", 
                "heading" => __('Crop image', 'organicfood'),
                "param_name" => "crop_image",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
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
                    __("Yes, please", 'organicfood') => 1
                ),
                "description" => __('Show or hide title of post on your blog.', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Info', 'organicfood'),
                "param_name" => "show_info",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
                ),
                "description" => __('Show or hide info of post on your blog.', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Description', 'organicfood'),
                "param_name" => "show_description",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
                ),
                "dependency" => array(
                    "element" => "post_type",
                    "value" => "post"
                ),
                "description" => __('Show or hide description of post on your blog.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Excerpt Length', 'organicfood'),
                "param_name" => "excerpt_length",
                "value" => '',
                "dependency" => array(
                    "element" => "post_type",
                    "value" => "post"
                ),
                "description" => __('The length of the excerpt, number of words to display.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "heading" => __('Excerpt More', 'organicfood'),
                "param_name" => "excerpt_more",
                "value" => "",
                "dependency" => array(
                    "element" => "post_type",
                    "value" => "post"
                ),
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Extra Excerpt', 'organicfood'),
                "param_name" => "show_extra_excerpt",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
                ),
                "dependency" => array(
                    "element" => "post_type",
                    "value" => "recipe"
                ),
                "description" => __('Show or hide extra recipt of post on your blog.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Read More Text", 'organicfood'),
                "param_name" => "readmore_text",
                "value" => "",
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order by', 'organicfood'),
                "param_name" => "orderby",
                "value" => array(
                    "None" => "none",
                    "Title" => "title",
                    "Date" => "date",
                    "ID" => "ID"
                ),
				"std" => "none",
                "description" => __('Order by ("none", "title", "date", "ID").', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "heading" => __('Order', 'organicfood'),
                "param_name" => "order",
                "value" => Array(
                    "None" => "none",
                    "ASC" => "ASC",
                    "DESC" => "DESC"
                ),
				"std" => "none",
                "description" => __('Order ("None", "Asc", "Desc").', 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Pagination', 'organicfood'),
                "param_name" => "show_pagination",
                "value" => array(
                    __("Yes, please", 'organicfood') => 1
                ),
                "description" => __('Show or hide pagination of post on your blog.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'organicfood'),
                "param_name" => "el_class",
                "value" => "",
            ),
        )
    ));
}
