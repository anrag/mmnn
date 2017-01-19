<?php

add_action('init', 'title_integrateWithVC');

function title_integrateWithVC() {
    vc_map(array(
        "name" => __("Title", 'organicfood'),
        "base" => "title",
        "class" => "title",
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
                "description" => __("Content.", 'organicfood')
            ),
            array (
                "type" => "colorpicker",
                "heading" => __ ( 'Color', 'organicfood' ),
                "param_name" => "color",
                "value" => '',
                "description" => __ ( 'Color', 'organicfood' ),
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Align", 'organicfood'),
                "param_name" => "align",
                "value" => array(
                    "None" => "",
                    "Left" => "text-left",
                    "Right" => "text-right",
                    "Center" => "text-center"
                ),
				"std" => "",
                "description" => __("Align", 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Underline", 'organicfood'),
                "param_name" => "underline",
                "value" => array (
                                __ ( "Yes, please", 'organicfood' ) => 1
                ),
                "description" => __("Underline.", 'organicfood')
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
