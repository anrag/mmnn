<?php

add_action('init', 'featured_box_integrateWithVC');

function featured_box_integrateWithVC() {
    vc_map(array(
        "name" => __("Featured Box", 'organicfood'),
        "base" => "featured-box",
        "class" => "featured-box",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Box Type", 'organicfood'),
                "param_name" => "box_type",
                "value" => array(
                    "Text" => "text",
                    "Icon" => "icon",
                    "Image" => "image",
                ),
				"std" => "text",
                "description" => __('Box Type', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Box Position", 'organicfood'),
                "param_name" => "box_position",
                "value" => array(
                    "Box Left" => "box-left",
                    "Box Right" => "box-right",
                    "Box Center" => "box-center",
                ),
				"std" => "box-left",
                "description" => __('Box Position', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Box Inner Type", 'organicfood'),
                "param_name" => "box_inner_type",
                "value" => array(
                    "None" => "box-none",
                    "Square" => "box-square",
                    "Circle" => "box-circle",
                    
                ),
				"std" => "box-none",
                "dependency" => array(
                    "element"=>"box_type",
                    "value"=> array("text", "icon")
                ),
                "description" => __('Box Inner Type', 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Box Style", 'organicfood'),
                "param_name" => "box_style",
                "value" => array(
                    "None" => "",
                    "Background" => "box-background",
                    "Border" => "box-border",
                    
                ),
				"std" => "",
                "dependency" => array(
                    "element"=>"box_inner_type",
                    "value"=> array("box-square", "box-circle")
                ),
                "description" => __('Box Style.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Box Text", 'organicfood'),
                "param_name" => "box_text",
                "value" => "",
                "dependency" => array(
                    "element"=>"box_type",
                    "value"=>"text"
                ),
                "description" => __("Box Text.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Box Icon", 'organicfood'),
                "param_name" => "box_icon",
                "value" => "",
                "dependency" => array(
                    "element"=>"box_type",
                    "value"=>"icon"
                ),
                "description" => __("Box Icon.", 'organicfood')
            ),
            array(
                "type" => "attach_image",
                "holder" => "",
                "class" => "",
                "heading" => __("Box Image", 'organicfood'),
                "param_name" => "box_image",
                "value" => "",
                "dependency" => array(
                    "element"=>"box_type",
                    "value"=>"image"
                ),
                "description" => __("Box Image.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Box Title", 'organicfood'),
                "param_name" => "box_title",
                "value" => "",
                "description" => __("Box Title.", 'organicfood')
            ), 
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Box Content", 'organicfood'),
                "param_name" => "content",
                "value" => "",
                "description" => __("Box Content.", 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation", 'organicfood'),
                "param_name" => "animation",
                "value" => array(
                    "No" => "",
                    "Top to bottom" => "top-to-bottom",
                    "Bottom to top" => "bottom-to-top",
                    "Left to right" => "left-to-right",
                    "Right to left" => "right-to-left",
                    "Appear from center" => "appear"
                ),
				"std" => "",
                "description" => __("Animation", 'organicfood')
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
