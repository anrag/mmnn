<?php

add_action('init', 'piegraph_integrateWithVC');

function piegraph_integrateWithVC() {
    vc_map(array(
        "name" => __("Pie Graph", 'organicfood'),
        "base" => "ww-shortcode-piegraph",
        "class" => "piegraph",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
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
                "heading" => __("Percent", 'organicfood'),
                "param_name" => "percent",
                "value" => "",
                "description" => __("Percent.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Radius", 'organicfood'),
                "param_name" => "radius",
                "value" => "",
                "description" => __("Radius.", 'organicfood')
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Stroke color", 'organicfood'),
                "param_name" => "color",
                "value" => '#FFFFFF',
                "description" => __("Choose stroke color", 'organicfood')
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
