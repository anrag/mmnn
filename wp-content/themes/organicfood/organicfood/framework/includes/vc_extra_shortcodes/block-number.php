<?php

add_action('init', 'block_number_integrateWithVC');

function block_number_integrateWithVC() {
    vc_map(array(
        "name" => __("Block Number", 'organicfood'),
        "base" => "block-number",
        "class" => "block-number",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Type", 'organicfood'),
                "param_name" => "type",
				"std" => "square",
                "value" => array(
                    "Square" => "square",
                    "Circle" => "circle",
                    "Rounded" => "rounded",
                ),
                "description" => __('Type', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Text", 'organicfood'),
                "param_name" => "text",
                "value" => "",
                "description" => __("Text.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title", 'organicfood'),
                "param_name" => "title",
                "value" => "",
                "description" => __("Title.", 'organicfood')
            ),
            array(
                "type" => "textarea",
                "class" => "",
                "heading" => __("Content", 'organicfood'),
                "param_name" => "block_number_content",
                "value" => "",
                "description" => __("content.", 'organicfood')
            ),          
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Color", 'organicfood'),
                "param_name" => "color",
                "value" => "",
                "description" => __("Color.", 'organicfood')
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Background", 'organicfood'),
                "param_name" => "background",
                "value" => "",
                "description" => __("background.", 'organicfood')
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
