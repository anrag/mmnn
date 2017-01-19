<?php

add_action('init', 'block_integrateWithVC');

function block_integrateWithVC() {
    vc_map(array(
        "name" => __("Block", 'organicfood'),
        "base" => "block",
        "class" => "block",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "style",
				"std" => "style1",
                "value" => array(
                    "Style 1" => "style1",
                    "Style 2" => "style2",
                ),
                "description" => __('Style', 'organicfood')
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
                "type" => "textfield",
                "class" => "",
                "heading" => __("Link", 'organicfood'),
                "param_name" => "link",
                "value" => "",
                "description" => __("Link.", 'organicfood')
            ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Image", 'organicfood'),
                "param_name" => "image",
                "value" => "",
                "description" => __("Image.", 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "heading" => __('Show Mosaic Hover', 'organicfood'),
                "param_name" => "mosaic_hover",
                "value" => array(
                    __("Yes, please", 'organicfood') => true
                ),
                "description" => __('Show or hide mosaic hover.', 'organicfood')
            ),
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Content", 'organicfood'),
                "param_name" => "content",
                "value" => "",
                "description" => __("Content.", 'organicfood')
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
