<?php
vc_map ( array (
		"name" => 'Portfolio',
		"base" => "cs-portfolio",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ),
		"params" => array (
				array (
						"type" => "pro_taxonomy",
						"taxonomy" => "portfolio_category",
						"heading" => __ ( "Categories", 'organicfood' ),
						"param_name" => "category",
						"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Appearance", 'organicfood' ),
						"param_name" => "type",
						"value" => array (
								"Grid" => "grid",
						),
						"std" => "grid",
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Columns", 'organicfood' ),
						"param_name" => "columns",
						"std" => "1",
						"value" => array (
								"1 column" => "1",
								"2 columns" => "2",
								"3 columns" => "3",
								"4 columns" => "4",
								"5 columns" => "5"
						),
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Crop image', 'organicfood' ),
						"param_name" => "crop_image",
						"value" => array (
								__ ( "Yes, please", 'organicfood' ) => true
						),
						"description" => __ ( 'Crop or not crop image on your Portfolio.', 'organicfood' )
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
						"type" => "dropdown",
						"class" => "",
						"heading" => __ ( "Layout", 'organicfood' ),
						"param_name" => "layout",
						"value" => array (
								"Layout 1" => "style-1",
						),
						"std" => "style-1",
						"description" => __ ( "", 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Filter', 'organicfood' ),
						"param_name" => "filter",
						"value" => array (
								__ ( "Yes, please", "organicfood" ) => "true"
						),
						"description" => __ ( 'Would you like your portfolio items to be filter?', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show title', 'organicfood' ),
						"param_name" => "show_title",
						"value" => array (
								__ ( "Yes, please", "organicfood" ) => "true"
						),
						"description" => __ ( 'Show or hide title on your Portfolio.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show category', 'organicfood' ),
						"param_name" => "show_category",
						"value" => array (
								__ ( "Yes, please", "organicfood" ) => "true"
						),
						"description" => __ ( 'Show or hide category on your Portfolio.', 'organicfood' )
				),
				array (
						"type" => "checkbox",
						"heading" => __ ( 'Show description', 'organicfood' ),
						"param_name" => "show_description",
						"value" => array (
								__ ( "Yes, please", "organicfood" ) => "true"
						),
						"description" => __ ( 'Show or hide description on your Portfolio.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Number of posts to show per page', 'organicfood' ),
						"param_name" => "posts_per_page",
						'value' => '12',
						"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Max of posts to show per page', 'organicfood' ),
						"param_name" => "max_posts_per_page",
						'value' => '',
						"description" => __ ( 'The number of posts load more on each page. Set to "-1" for display all posts on the page or empty not load more.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Excerpt Length', 'organicfood' ),
						"param_name" => "excerpt_length",
						'value' => '100',
						"description" => __ ( 'The length of the excerpt, number of words to display. Set to "-1" for no excerpt.', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Show Enlarge', 'organicfood' ),
						"param_name" => "enlarge",
						"value" => 'Enlarge',
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Show Read More', 'organicfood' ),
						"param_name" => "read_more",
						"value" => 'Read More',
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', 'organicfood' )
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Show View Online', 'organicfood' ),
						"param_name" => "view_online",
						"value" => 'View Online',
						"description" => __ ( 'Enter desired text for the link or for no link, leave blank or set to \"-1\".', 'organicfood' )
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
						"std" => "none",
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
						"std" => "none",
						"description" => __ ( 'Order ("None", "Asc", "Desc").', 'organicfood' )
				)
		)
) );