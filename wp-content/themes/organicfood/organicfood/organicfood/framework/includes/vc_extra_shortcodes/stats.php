<?php

add_action('init', 'stats_integrateWithVC');

function stats_integrateWithVC() {
    vc_map(array(
        "name" => __("Stats", 'organicfood'),
        "base" => "ww-shortcode-stats",
        "class" => "stats",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Timer", 'organicfood'),
                "param_name" => "timer",
                "value" => "",
                "description" => __("Timer.", 'organicfood')
            ),         
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Number", 'organicfood'),
                "param_name" => "number",
                "value" => "",
                "description" => __("Number.", 'organicfood')
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
