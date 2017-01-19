<?php

add_action('init', 'page_title_integrateWithVC');

function page_title_integrateWithVC() {
    vc_map(array(
        "name" => __("Page Title", 'organicfood'),
        "base" => "page-title",
        "class" => "page-title",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Type", 'organicfood'),
                "param_name" => "type",
                "value" => array(
                    "Default" => "default",
                    "Custom" => "custom",
                ),
				"std" => "default",
                "description" => __('Select type of page title.', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Custom Title", 'organicfood'),
                "param_name" => "custom_title",
                "value" => "",
                "dependency" => array(
                    "element"=>"type",
                    "value"=>"custom"
                ),
                "description" => __("Please, Enter custom text of page title.", 'organicfood')
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Color", 'organicfood'),
                "param_name" => "color",
                "value" => "",
                "description" => __("Select color of page title.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Padding", 'organicfood'),
                "param_name" => "padding",
                "value" => "",
                "description" => __('Please, Enter padding of page title. Default: 0', 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Margin", 'organicfood'),
                "param_name" => "margin",
                "value" => "",
                "description" => __('Please, Enter margin of page title. Default: 0', 'organicfood')
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
