<?php
vc_map ( array (
		"name" => 'Zoom Image',
		"base" => "cs-zoomimg",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ),
		"params" => array (
                    array (
                        "type" => "attach_image",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __ ( "Image", 'organicfood' ),
                        "param_name" => "image"
                    ),
		)
) );