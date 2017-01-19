<?php

add_action('init', 'google_pie_chart_integrateWithVC');

function google_pie_chart_integrateWithVC() {
    vc_map(array(
        "name" => __("Google Chart", 'organicfood'),
        "base" => "google-chart",
        "class" => "google-chart",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "style",
				"std" => "pie",
                "value" => array(
                    "Pie Chart" => "pie",
                    "Geo Chart" => "geo"
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
                "type" => "textarea",
                "class" => "",
                "heading" => __("Data", 'organicfood'),
                "param_name" => "data",
                "value" => "",
                "description" => __("Content.", 'organicfood')
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
