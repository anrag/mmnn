<?php

add_action('init', 'newsletter_integrateWithVC');

function newsletter_integrateWithVC() {
    vc_map(array(
        "name" => __("Newsletter", 'organicfood'),
        "base" => "newsletter",
        "class" => "newsletter",
        "category" => __('Organic Food', 'organicfood'),
        "icon" => "of-icon-for-vc",
        "params" => array(
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => __("Extra Class", 'organicfood'),
                "param_name" => "el_class",
                "value" => "",
                "description" => __("Extra Class.", 'organicfood')
            )
        )
    ));
}
