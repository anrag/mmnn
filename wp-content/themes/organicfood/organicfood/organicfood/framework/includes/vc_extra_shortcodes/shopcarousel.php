<?php
if (class_exists ( 'Woocommerce' )) {
	vc_map ( array (
			"name" => 'Products Carousel',
			"base" => "cs-products-carousel",
			"icon" => "of-icon-for-vc",
			"category" => __ ( 'Organic Food', 'organicfood' ),
			"params" => array (
					array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Style", 'organicfood' ),
							"param_name" => "style",
							"value" => array (
									"Default" => "default",
							),
							"std" => "default",
							"description" => __ ( "", 'organicfood' )
					),
					array (
							"type" => "pro_taxonomy",
							"taxonomy" => "product_cat",
							"heading" => __ ( "Categories", 'organicfood' ),
							"param_name" => "product_cat",
							"description" => __ ( "Note: By default, all your projects will be displayed. <br>If you want to narrow output, select category(s) above. Only selected categories will be displayed.", 'organicfood' )
					),
                                        array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Show", 'organicfood' ),
							"param_name" => "show",
							"value" => array (
									"All Products" => "",
									"Featured Products" => "featured",
									"On-sale Products" => "onsale",
							),
							"std" => "",
							"description" => __ ( "", 'organicfood' )
					),
                                        array (
							"type" => "textfield",
							"heading" => __ ( 'Number of products to show', 'organicfood' ),
							"param_name" => "number",
							'value' => 12,
							"description" => __ ( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'organicfood' )
					),
                                        array (
							"type" => "dropdown",
							"class" => "",
							"heading" => __ ( "Rows", 'organicfood' ),
							"param_name" => "rows",
							"value" => array (
									"1 Row" => 1,
									"2 Rows" => 2,
									"3 Rows" => 3,
									"4 Rows" => 4
							),
							"std" => 1,
							"description" => __ ( "", 'organicfood' )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Width Item', 'organicfood' ),
							"param_name" => "width_item",
							"description" => __ ( 'Enter the width of item. Default: 150.', 'organicfood' )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Margin Item', 'organicfood' ),
							"param_name" => "margin_item",
							"description" => __ ( 'Enter the margin of item. Default: 20.', 'organicfood' )
					),
					array (
							"type" => "textfield",
							"heading" => __ ( 'Speed Scroll', 'organicfood' ),
							"param_name" => "speed",
							"description" => __ ( 'Enter the speed of carousel. Default: 500.', 'organicfood' )
					),
					array (
							"type" => "checkbox",
							"heading" => __ ( 'Auto Scroll', 'organicfood' ),
							"param_name" => "auto_scroll",
							"value" => array (
									__ ( "Yes, please", 'organicfood' ) => 1
							),
							"description" => __ ( 'Auto scroll.', 'organicfood' )
					),
                                        array (
							"type" => "checkbox",
							"heading" => __ ( 'Same Height', 'organicfood' ),
							"param_name" => "same_height",
							"value" => array (
									__ ( "Yes, please", 'organicfood' ) => 1
							),
							"description" => __ ( 'Same height item.', 'organicfood' )
					),
					array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Navigation', 'organicfood' ),
							"param_name" => "show_nav",
							"value" => array (
									__ ( "Yes, please", 'organicfood' ) => 1
							),
							"description" => __ ( 'Show or hidden navigation.', 'organicfood' )
					),
					array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Title', 'organicfood' ),
							"param_name" => "show_title",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden title on your Product.', 'organicfood' )
					),
                                        array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Price', 'organicfood' ),
							"param_name" => "show_price",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden price on your Product.', 'organicfood' )
					),
                                        array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Rating', 'organicfood' ),
							"param_name" => "show_rating",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden rating on your Product.', 'organicfood' )
					),
					array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Category', 'organicfood' ),
							"param_name" => "show_category",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden category on your Product.', 'organicfood' )
					),
					array (
							"type" => "checkbox",
							"heading" => __ ( 'Show Add To Cart', 'organicfood' ),
							"param_name" => "show_add_to_cart",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden add to cart on your Product.', 'organicfood' )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Order by', 'organicfood' ),
							"param_name" => "orderby",
							"value" => array (
									"None" => "none",
									"Date" => "date",
                                                                        "Price" => "price",
									"Random" => "rand",
                                                                        "Sales" => "sales",
							),
							"std" => "none",
							"description" => __ ( 'Order by ("none", "date", "price", "rand", "sales").', 'organicfood' )
					),
					array (
							"type" => "dropdown",
							"heading" => __ ( 'Order', 'organicfood' ),
							"param_name" => "order",
							"value" => array (
									"None" => "none",
									"Ascending" => "asc",
									"Descending" => "desc"
							),
							"std" => "none",
							"description" => __ ( 'Order ("none", "asc", "desc").', 'organicfood' )
					),
                                        array (
							"type" => "checkbox",
							"heading" => __ ( 'Hide free products', 'organicfood' ),
							"param_name" => "hide_free",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden free products.', 'organicfood' )
					),
                                        array (
							"type" => "checkbox",
							"heading" => __ ( 'Show hidden products', 'organicfood' ),
							"param_name" => "show_hidden",
							"value" => array (
									__ ( "Yes, please", "organicfood" ) => 1
							),
							"description" => __ ( 'Show or hidden products.', 'organicfood' )
					),
			)
	) );
}