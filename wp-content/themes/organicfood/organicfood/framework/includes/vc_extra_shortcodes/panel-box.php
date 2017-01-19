<?php

add_action('init', 'panel_box_integrateWithVC');

function panel_box_integrateWithVC() {
    vc_map(array(
        "name" => __("Panel Box", 'organicfood'),
        "base" => "panel-box",
        "class" => "panel-box",
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
                "heading" => __("Icon", 'organicfood'),
                "param_name" => "icon",
                "value" => "fa fa-plus-circle",
                "description" => __("Icon.", 'organicfood')
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Tooltip Title", 'organicfood'),
                "param_name" => "tooltip_title",
                "value" => "",
                "description" => __("Tooltip Title.", 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Tooltip Position", 'organicfood'),
                "param_name" => "tooltip_pos",
                "value" => array(
                    "Top" => 'top',
                    "Right" => 'right',
                    "Bottom" => 'bottom',
                    "Left" => 'left'
                ),
				"std" => "top",
                "description" => __("Tooltip Position.", 'organicfood'),
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
