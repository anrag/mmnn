<?php
vc_map ( array (
		"name" => 'Post Carousel',
		"base" => "ww-shortcode-carousel-post",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ), 
                'admin_enqueue_js' => array(ADMIN_DIR.'assets/js/customvc.js'),
		"params" => array (
                                array (
                                    "type" => "dropdown",
                                    "holder" => "div",
                                    "class" => "",
                                    "heading" => __ ( "Post Type", 'organicfood' ),
                                    "param_name" => "post_type",
                                    "value" => array (
                                                    "Post" => "post",
                                                    "Testimonial" => "testimonial",
                                                    "Client" => "myclients",
                                                    "Produce" => "produce",
                                        ),
									"std" => 'post',
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
                                                "class" => "post_category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
				),
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "testimonial_category",
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=>"testimonial"
                                                    )
                                                ,
                                                "class" => "testimonial_category",
						"heading" => __ ( "Categories", 'organicfood' ),
						"param_name" => "testimonial_category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
				),
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "clientscategory",
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=>"myclients"
                                                    )
                                                ,
						"heading" => __ ( "Categories", 'organicfood' ),
						"param_name" => "clientscategory",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
				),
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "produce_category",
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=>"produce"
                                                    )
                                                ,
						"heading" => __ ( "Categories", 'organicfood' ),
						"param_name" => "produce_category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Styles", 'organicfood' ),
						"param_name" => "styles",
						"std" => 'style-1-organicfood',
						"value" => array (
                                                                "Style 1 Organicfood" => "style-1-organicfood"
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post")
                                                    )
                                                ,
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Styles", 'organicfood' ),
						"param_name" => "testimonial_styles",
						"std" => 'style-1-consilium',
						"value" => array (
								"Default 1 Consilium" => "style-1-consilium",
								"With Avatar" => "testimonial-avatar",
								"With Avatar Center" => "testimonial-avatar-center",
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("testimonial")
                                                    )
                                                ,
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Styles", 'organicfood' ),
						"param_name" => "client_styles",
						"std" => 'style-1',
						"value" => array (
								"Style 1" => "style-1",
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("myclients")
                                                    )
                                                ,
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Styles", 'organicfood' ),
						"param_name" => "produce_styles",
						"std" => 'style-1',
						"value" => array (
								"Style 1" => "style-1",
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("produce")
                                                    )
                                                ,
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Crop image', 'organicfood' ),
						"param_name" => "crop_image",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Crop or not crop image on your Post.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width image', 'organicfood' ),
						"param_name" => "width_image",
						"description" => __ ( 'Enter the width of image. Default: 300.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Height image', 'organicfood' ),
						"param_name" => "height_image",
						"description" => __ ( 'Enter the height of image. Default: 200.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Width item', 'organicfood' ),
						"param_name" => "width_item",
						"description" => __ ( 'Enter the width of item. Default: 150.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Margin item', 'organicfood' ),
						"param_name" => "margin_item",
						"description" => __ ( 'Enter the margin of item. Default: 20.', 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Rows", 'organicfood' ),
						"param_name" => "rows",
						"std" => '1',
						"value" => array (
								"1 row" => "1",
								"2 rows" => "2",
								"3 rows" => "3",
								"4 rows" => "4"
						),
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Auto scroll', 'organicfood' ),
						"param_name" => "auto_scroll",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Auto scroll.', 'organicfood' )
				),
                                array (
						"type" => "textfield",
						"heading" => __ ( 'Speed scroll', 'organicfood' ),
						"param_name" => "speed_scroll",
						"value" => "",
						"description" => __ ( 'Speed scroll.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Same height', 'organicfood' ),
						"param_name" => "same_height",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Same height.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show navigation', 'organicfood' ),
						"param_name" => "show_nav",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Show or hide navigation on your carousel post.', 'organicfood' )
				),
                                array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Navigation Position", 'organicfood' ),
						"param_name" => "nav_position",
						"value" => array (
								"None" => "",
								"Left" => "text-left",
								"Center" => "text-center",
								"Right" => "text-right"
						),
						"std" => '',
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show Pager', 'organicfood' ),
						"param_name" => "show_pager",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Show or hide pager on your carousel post.', 'organicfood' )
				),
                                array (
						"type" => "checkbox",
						"heading" => __ ( 'Show image', 'organicfood' ),
						"param_name" => "show_image",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("testimonial")
                                                ),
						"description" => __ ( 'Show or hide image on your carousel post.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show Title', 'organicfood' ),
						"param_name" => "show_title",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial", "produce")
                                                ),
						"description" => __ ( 'Show or hide title on your post.', 'organicfood' )
				),
                                array (
						"type" => "checkbox",
						"heading" => __ ( 'Show Tooltip', 'organicfood' ),
						"param_name" => "show_tooltip",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("myclients")
                                                ),
						"description" => __ ( 'Show or hide tooltip on your post.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show Information', 'organicfood' ),
						"param_name" => "show_info",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial")
                                                ),
						"description" => __ ( 'Show or hide Information of your post.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show description', 'organicfood' ),
						"param_name" => "show_description",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial")
                                                ),
						"description" => __ ( 'Show or hide description of your post.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt Length', 'organicfood' ),
						"param_name" => "excerpt_length",
						"value" => '',
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial")
                                                ),
						"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt. Default: 20.', 'organicfood' )
				),
                                array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt More', 'organicfood' ),
						"param_name" => "excerpt_more",
						"value" => '',
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial")
                                                ),
						"description" => __ ( 'The more of the excerpt, character of words to display. Default: "..."', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Read More', 'organicfood' ),
						"param_name" => "read_more",
						"value" => '',
                                                "dependency" => array(
                                                    "element"=>"post_type",
                                                    "value"=> array("post", "testimonial")
                                                ),
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', 'organicfood' ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order by', 'organicfood' ),
						"param_name" => "orderby",
						"value" => array (
								"None" => "none",
								"Title" => "title",
								"Date" => "date",
								"ID" => "ID"
						),
						"std" => 'none',
						"description" => __ ( 'Order by ("none", "title", "date", "ID").', 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Order', 'organicfood' ),
						"param_name" => "order",
						"value" => Array (
								"None" => "none",
								"ASC" => "ASC",
								"DESC" => "DESC"
						),
						"std" => 'none',
						"description" => __ ( 'Order ("None", "Asc", "Desc").', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( "Extra class name", "organicfood" ),
						"param_name" => "el_class",
						"description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "organicfood" )
				)
		)
) );