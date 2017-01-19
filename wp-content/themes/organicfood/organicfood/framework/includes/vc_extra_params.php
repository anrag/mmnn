<?php
// Adding stripes to rows
vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Row style", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "type",
		"value" => array (
				"Default" => "ww-default",
				"Background Video" => "ww-custom-bg-video" 
		),
		"description" => __ ( "", 'organicfood' ) 
) );

vc_add_param ( 'vc_row', array (
		'type' => 'dropdown',
		'heading' => __ ( "Full Width", 'organicfood' ),
		'param_name' => 'full_width',
		'value' => array (
				"No" => false,
				"Yes" => true 
		),
		'description' => __ ( "Row Content Full Width", 'organicfood' ) 
) );

vc_add_param ( "vc_row", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __ ( "Link color", 'organicfood' ),
		"param_name" => "row_link_color",
		"value" => "",
		"description" => __ ( "Select color for link.", 'organicfood' ) 
) );

vc_add_param ( "vc_row", array (
		"type" => "colorpicker",
		"class" => "",
		"heading" => __ ( "Link color hover", 'organicfood' ),
		"param_name" => "row_link_color_hover",
		"value" => "",
		"description" => __ ( "Select color for link hover.", 'organicfood' ) 
) );

vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __ ( "Same height", 'organicfood' ),
		"param_name" => "same_height",
		"value" => array (
				__ ( "Yes, please", 'organicfood' ) => true 
		),
		"description" => __ ( "Set the same hight for all column in this row.", 'organicfood' ) 
) );

vc_add_param ( "vc_row", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Animation", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "animation",
		"value" => array (
				"No" => "",
				"Top to bottom" => "top-to-bottom",
				"Bottom to top" => "bottom-to-top",
				"Left to right" => "left-to-right",
				"Right to left" => "right-to-left",
				"Appear from center" => "appear" 
		),
		"description" => __ ( "", 'organicfood' ) 
) );

vc_add_param ( "vc_row", array (
		"type" => "checkbox",
		"class" => "",
		"heading" => __ ( "Enable parallax", 'organicfood' ),
		"param_name" => "enable_parallax",
		"value" => array (
				__ ( "Yes, please", 'organicfood' ) => true 
		) 
) );

vc_add_param ( "vc_row", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __ ( "Parallax speed", 'organicfood' ),
		"param_name" => "parallax_speed",
		"value" => "0.5" 
) );
vc_add_param ( "vc_row", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __ ( "Video background (mp4)", 'organicfood' ),
		"param_name" => "bg_video_src_mp4",
		"value" => "",
		"dependency" => array (
				"element" => "type",
				"value" => array (
						'ww-custom-bg-video' 
				) 
		) 
) );

vc_add_param ( "vc_row", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __ ( "Video background (ogv)", 'organicfood' ),
		"param_name" => "bg_video_src_ogv",
		"value" => "",
		"dependency" => array (
				"element" => "type",
				"value" => array (
						'ww-custom-bg-video' 
				) 
		) 
) );

vc_add_param ( "vc_row", array (
		"type" => "textfield",
		"class" => "",
		"heading" => __ ( "Video background (webm)", 'organicfood' ),
		"param_name" => "bg_video_src_webm",
		"value" => "",
		"dependency" => array (
				"element" => "type",
				"value" => array (
						'ww-custom-bg-video' 
				) 
		) 
) );

vc_add_param ( "vc_column", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Animation", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "animation",
		"value" => array (
				"No" => "",
				"Top to bottom" => "top-to-bottom",
				"Bottom to top" => "bottom-to-top",
				"Left to right" => "left-to-right",
				"Right to left" => "right-to-left",
				"Appear from center" => "appear" 
		),
		"description" => __ ( "", 'organicfood' ) 
) );

vc_add_param ( "vc_column", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Column Align", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "column_align",
		"value" => array (
				"None" => "",
				"Left" => "left",
				"Right" => "right",
				"Center" => "center" 
		),
		"description" => __ ( "", 'organicfood' ) 
) );
/*
 * Progress bar
 */
vc_add_param ( "vc_progress_bar", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Style", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "style",
		"value" => array (
				"Default" => "default",
				"Style 1" => "style1" 
		),
		"std" => "default",
		"description" => __ ( "", 'organicfood' ) 
) );
vc_add_param ( "vc_progress_bar", array (
		"type" => "dropdown",
		"class" => "",
		"heading" => __ ( "Size", 'organicfood' ),
		"admin_label" => true,
		"param_name" => "size",
		"value" => array (
				"Small" => "small",
				"Medium" => "medium",
				"Large" => "large" 
		),
		"std" => 'small',
		"dependency" => array (
				"element" => "style",
				"value" => "style1" 
		),
		"description" => __ ( "", 'organicfood' ) 
) );
