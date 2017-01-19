<?php

add_action('init', 'box_feature_figure_integrateWithVC');

function box_feature_figure_integrateWithVC() {
    vc_map(array(
        "name" => __("Box Feature Figure", 'organicfood'),
        "base" => "box-feature-figure",
        "class" => "box-feature-figure",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Style", 'organicfood'),
                "param_name" => "style",
				"std" => "box-feature",
                "value" => array(
                    "Feature Box" => "box-feature",
                    "Service Box" => "service-box"
                ),
            	"std" => 'box-feature'
            ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => __("Image", 'organicfood'),
                "param_name" => "image",
                "value" => "",
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Title", 'organicfood'),
                "param_name" => "title",
                "value" => "",
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Icon", 'organicfood'),
                "param_name" => "icon",
                "value" => "",
            ),
            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => __("Content", 'organicfood'),
                "param_name" => "content",
                "value" => "",
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
