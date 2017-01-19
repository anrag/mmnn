<?php
foreach (glob("".get_template_directory()."/framework/includes/vc_extra_shortcodes/*.php") as $filename)
{
	include $filename;
}
// intergrate VC
add_action ( 'init', 'cs_integrateWithVC' );
function cs_integrateWithVC() {
	$vc_is_wp_version_3_6_more = version_compare ( preg_replace ( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo ( 'version' ) ), '3.6' ) >= 0;
	/*
	 * Tabs ----------------------------------------------------------
	 */
	$tab_id_1 = time () . '-1-' . rand ( 0, 100 );
	$tab_id_2 = time () . '-2-' . rand ( 0, 100 );
	vc_map ( array (
			"name" => __ ( 'Tabs', 'organicfood' ),
			'base' => 'vc_tabs',
			'show_settings_on_create' => false,
			'is_container' => true,
			'icon' => 'icon-wpb-ui-tab-content',
			'category' => __ ( 'Content', 'organicfood' ),
			'description' => __ ( 'Tabbed content', 'organicfood' ),
			'params' => array (
					array (
							'type' => 'textfield',
							'heading' => __ ( 'Widget title', 'organicfood' ),
							'param_name' => 'title',
							'description' => __ ( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'organicfood' )
					),
					array (
							'type' => 'dropdown',
							'heading' => __ ( 'Auto rotate tabs', 'organicfood' ),
							'param_name' => 'interval',
							'value' => array (
									__ ( 'Disable', 'organicfood' ) => 0,
									3,
									5,
									10,
									15
							),
							'std' => 0,
							'description' => __ ( 'Auto rotate tabs each X seconds.', 'organicfood' )
					),
					array (
							'type' => 'textfield',
							'heading' => __ ( 'Extra class name', 'organicfood' ),
							'param_name' => 'el_class',
							'description' => __ ( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'organicfood' )
					),
					array (
							'type' => 'dropdown',
							'param_name' => 'style',
							'heading' => __ ( 'Style', 'organicfood' ),
							'value' => array (
									"Default" => "style2",
									"Square" => "style1",
									"Verticle Tab" => "style3"
							),
							'std' => 'style1',
							'description' => __ ( '', 'organicfood' )
					)
			),
			'custom_markup' => '
	<div class="wpb_tabs_holder wpb_holder vc_container_for_children">
	<ul class="tabs_controls">
	</ul>
	%content%
	</div>',
			'default_content' => '
	[vc_tab title="' . __ ( 'Tab 1', 'organicfood' ) . '" tab_id="' . $tab_id_1 . '"][/vc_tab]
	[vc_tab title="' . __ ( 'Tab 2', 'organicfood' ) . '" tab_id="' . $tab_id_2 . '"][/vc_tab]
	',
			'js_view' => $vc_is_wp_version_3_6_more ? 'VcTabsView' : 'VcTabsView35'
	) );
        vc_map( array(
            'name' => __( 'Tab', 'organicfood' ),
            'base' => 'vc_tab',
            'allowed_container_element' => 'vc_row',
            'is_container' => true,
            'content_element' => false,
            'params' => array(
                    array(
                            'type' => 'textfield',
                            'heading' => __( 'Title', 'organicfood' ),
                            'param_name' => 'title',
                            'description' => __( 'Tab title.', 'organicfood' )
                    ),
                    array(
                            'type' => 'textfield',
                            'heading' => __( 'Icon', 'organicfood' ),
                            'param_name' => 'icon',
                            'description' => __( 'Icon class.', 'organicfood' )
                    ),
                    array(
                            'type' => 'tab_id',
                            'heading' => __( 'Tab ID', 'organicfood' ),
                            'param_name' => "tab_id"
                    )
            ),
            'js_view' => $vc_is_wp_version_3_6_more ? 'VcTabView' : 'VcTabView35'
    ) );
	
}