<?php
vc_map ( array (
		"name" => 'Bubble',
		"base" => "bubble",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ),
		"params" => array (
				array (
						"type" => "textfield",
                                                "holder" => "div",
						"heading" => __ ( 'Author', 'organicfood' ),
						"param_name" => "author",
						"value" => '',
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Color', 'organicfood' ),
						"param_name" => "color",
						"value" => '',
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Background', 'organicfood' ),
						"param_name" => "background",
						"value" => '',
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Border Width', 'organicfood' ),
						"param_name" => "border_width",
						"value" => '',
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Border Color', 'organicfood' ),
						"param_name" => "border_color",
						"value" => '',
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Border Style', 'organicfood' ),
						"param_name" => "border_style",
						"std" => "solid",
						"value" => array('none','hidden','dotted','dashed','solid','double','groove','ridge','inset','outset','initial','inherit'),
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Padding', 'organicfood' ),
						"param_name" => "padding",
						"value" => '',
				),
				array (
						"type" => "textarea_html",
						"heading" => __ ( 'Content', 'organicfood' ),
						"param_name" => "content",
						"value" => '',
				)
		)
) );