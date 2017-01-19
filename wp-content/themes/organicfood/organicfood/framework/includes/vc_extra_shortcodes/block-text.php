<?php
vc_map ( array (
		"name" => 'Block Text',
		"base" => "block-text",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ),
		"params" => array (
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Type', 'organicfood' ),
						"param_name" => "type",
						"std" => "default",
						"value" => array(
                                                    "Default" => "default",
                                                    "Rounded" => "rounded",
                                                ),
						"description" =>  __ ( 'Type', 'organicfood' )
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Color', 'organicfood' ),
						"param_name" => "color",
						"value" => '',
						"description" => __ ( 'Color', 'organicfood' ),
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Background', 'organicfood' ),
						"param_name" => "background",
						"value" => '',
						"description" => __ ( 'Background', 'organicfood' ),
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Border Width', 'organicfood' ),
						"param_name" => "border_width",
						"value" => '',
						"description" => __( 'Border Width', 'organicfood' ),
				),
				array (
						"type" => "colorpicker",
						"heading" => __ ( 'Border Color', 'organicfood' ),
						"param_name" => "border_color",
						"value" => '',
						"description" => __ ( 'Border Color', 'organicfood' ),
				),
				array (
						"type" => "dropdown",
						"heading" => __ ( 'Border Style', 'organicfood' ),
						"param_name" => "border_style",
						"std" => "solid",
						"value" => array('none','hidden','dotted','dashed','solid','double','groove','ridge','inset','outset','initial','inherit'),
						"description" => __ ( 'Border Style', 'organicfood' ),
				),
				array (
						"type" => "textfield",
						"heading" => __ ( 'Padding', 'organicfood' ),
						"param_name" => "padding",
						"value" => '',
						"description" =>  __ ( 'Padding', 'organicfood' ),
				),
				array (
						"type" => "textarea_html",
                                                "holder" => "div",
						"heading" => __ ( 'Content', 'organicfood' ),
						"param_name" => "content",
						"value" => '',
						"description" => __ ( 'Content', 'organicfood' ),
				)
		)
) );