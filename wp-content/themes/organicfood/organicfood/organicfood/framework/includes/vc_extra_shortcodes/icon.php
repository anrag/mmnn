<?php

add_action('init', 'icon_integrateWithVC');

function icon_integrateWithVC() {
    vc_map(array(
        "name" => __("Icon", 'organicfood'),
        "base" => "icon",
        "class" => "icon",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
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
                "heading" => __("Font size", 'organicfood'),
                "param_name" => "fontsize",
                "value" => "",
                "description" => __("Font size.", 'organicfood')
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
                "type" => "textfield",
                "class" => "",
                "heading" => __("Class", 'organicfood'),
                "param_name" => "class",
                "value" => "",
                "description" => __("Class.", 'organicfood')
            ),
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Text", 'organicfood'),
                "param_name" => "content",
                "value" => "",
                "description" => __("Text.", 'organicfood')
            )
        )
    ));
}
