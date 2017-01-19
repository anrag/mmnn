<?php

add_action('init', 'breadcrumb_integrateWithVC');

function breadcrumb_integrateWithVC() {
    vc_map(array(
        "name" => __("Breadcrumb", 'organicfood'),
        "base" => "breadcrumb",
        "class" => "breadcrumb",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Delimiter", 'organicfood'),
                    "param_name" => "delimiter",
                    "value" => "",
                    "description" => __("Enter delimiter page breadcrumb.", 'organicfood')
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
                    "type" => "textfield",
                    "class" => "",
                    "heading" => __("Extra Class", 'organicfood'),
                    "param_name" => "el_class",
                    "value" => "",
            ),
        )
    ));
}
