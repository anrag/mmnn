<?php

add_action('init', 'plan_integrateWithVC');

function plan_integrateWithVC() {
    vc_map(array(
        "name" => __("Plan", 'organicfood'),
        "base" => "ww-shortcode-plan",
        "class" => "plan",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Name", 'organicfood'),
                "param_name" => "name",
                "value" => "",
                "description" => __("Name.", 'organicfood')
            ),
            array(
                "type" => "checkbox",
                "class" => "",
                "heading" => __("Featured", 'organicfood'),
                "param_name" => "featured",
                "value" => array (
                    __ ( "Yes, please", 'organicfood' ) => true
                ),
                "description" => __("Featured.", 'organicfood')
            ),            
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Price", 'organicfood'),
                "param_name" => "price",
                "value" => "",
                "description" => __("Price.", 'organicfood')
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
                "heading" => __("Url", 'organicfood'),
                "param_name" => "url",
                "value" => "#",
                "description" => __("Url.", 'organicfood')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Target", 'organicfood'),
                "param_name" => "target",
                "value" => array (
                    "_self" => "_self",
                    "_blank" => "_blank",
                ),
				"std" => "_self",
                "description" => __("Target.", 'organicfood')
            ),
			array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Button Text", 'organicfood'),
                "param_name" => "btn_text",
                "value" => "",
                "description" => __("Button Text", 'organicfood')
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
