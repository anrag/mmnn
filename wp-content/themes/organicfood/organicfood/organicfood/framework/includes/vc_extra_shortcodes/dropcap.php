<?php
vc_map ( array (
		"name" => 'Drop Caps',
		"base" => "cs-dropcap",
		"icon" => "of-icon-for-vc",
		"category" => __ ( 'Organic Food', 'organicfood' ),
		"params" => array (
				array (
						"type" => "textarea_html",
                                                "holder" => "div",
						"heading" => __ ( 'Content', 'organicfood' ),
						"param_name" => "content",
						"value" => '',
				)
		)
) );