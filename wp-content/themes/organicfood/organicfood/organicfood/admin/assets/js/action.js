(function ($) { "use strict";
	jQuery.noConflict();
	jQuery(document).ready(function($) {
		var colorschemes = new Array();
		colorschemes['preset1'] = new Array();
		colorschemes['preset1']['primary_color']='#69bd43';
		colorschemes['preset1']['link_color']='#69bd43';
		colorschemes['preset1']['link_color_hover']='#3f7228';
		colorschemes['preset1']['button_text_color']='#FFFFFF';
		colorschemes['preset1']['bg_color']='#FFFFFF';
		colorschemes['preset1']['heading_color']='#666666';
		colorschemes['preset1']['body_text_color']='#666666';
		colorschemes['preset2'] = new Array();
		colorschemes['preset2']['primary_color']='#008dff';
		colorschemes['preset2']['link_color']='#008dff';
		colorschemes['preset2']['link_color_hover']='#005599';
		colorschemes['preset2']['button_text_color']='#FFFFFF';
		colorschemes['preset2']['bg_color']='#FFFFFF';
		colorschemes['preset2']['heading_color']='#666666';
		colorschemes['preset2']['body_text_color']='#666666';
		colorschemes['preset3'] = new Array();
		colorschemes['preset3']['primary_color']='#ff8d00';
		colorschemes['preset3']['link_color']='#ff8d00';
		colorschemes['preset3']['link_color_hover']='#995500';
		colorschemes['preset3']['button_text_color']='#FFFFFF';
		colorschemes['preset3']['bg_color']='#FFFFFF';
		colorschemes['preset3']['heading_color']='#666666';
		colorschemes['preset3']['body_text_color']='#666666';
		colorschemes['preset4'] = new Array();
		colorschemes['preset4']['primary_color']='#cc2149';
		colorschemes['preset4']['link_color']='#cc2149';
		colorschemes['preset4']['link_color_hover']='#74132a';
		colorschemes['preset4']['button_text_color']='#FFFFFF';
		colorschemes['preset4']['bg_color']='#FFFFFF';
		colorschemes['preset4']['heading_color']='#666666';
		colorschemes['preset4']['body_text_color']='#666666';
		colorschemes['preset5'] = new Array();
		colorschemes['preset5']['primary_color']='#ff804e';
		colorschemes['preset5']['link_color']='#ff804e';
		colorschemes['preset5']['link_color_hover']='#e74100';
		colorschemes['preset5']['button_text_color']='#FFFFFF';
		colorschemes['preset5']['bg_color']='#FFFFFF';
		colorschemes['preset5']['heading_color']='#666666';
		colorschemes['preset5']['body_text_color']='#666666';
		colorschemes['preset6'] = new Array();
		colorschemes['preset6']['primary_color']='#6576c2';
		colorschemes['preset6']['link_color']='#6576c2';
		colorschemes['preset6']['link_color_hover']='#37468a';
		colorschemes['preset6']['button_text_color']='#FFFFFF';
		colorschemes['preset6']['bg_color']='#FFFFFF';
		colorschemes['preset6']['heading_color']='#666666';
		colorschemes['preset6']['body_text_color']='#666666';
		colorschemes['preset7'] = new Array();
		colorschemes['preset7']['primary_color']='#a2e000';
		colorschemes['preset7']['link_color']='#a2e000';
		colorschemes['preset7']['link_color_hover']='#587a00';
		colorschemes['preset7']['button_text_color']='#FFFFFF';
		colorschemes['preset7']['bg_color']='#FFFFFF';
		colorschemes['preset7']['heading_color']='#666666';
		colorschemes['preset7']['body_text_color']='#666666';
		colorschemes['preset8'] = new Array();
		colorschemes['preset8']['primary_color']='#a16a2a';
		colorschemes['preset8']['link_color']='#a16a2a';
		colorschemes['preset8']['link_color_hover']='#503515';
		colorschemes['preset8']['button_text_color']='#FFFFFF';
		colorschemes['preset8']['bg_color']='#FFFFFF';
		colorschemes['preset8']['heading_color']='#666666';
		colorschemes['preset8']['body_text_color']='#666666';
		colorschemes['preset9'] = new Array();
		colorschemes['preset9']['primary_color']='#4ec7aa';
		colorschemes['preset9']['link_color']='#4ec7aa';
		colorschemes['preset9']['link_color_hover']='#2a856f';
		colorschemes['preset9']['button_text_color']='#FFFFFF';
		colorschemes['preset9']['bg_color']='#FFFFFF';
		colorschemes['preset9']['heading_color']='#666666';
		colorschemes['preset9']['body_text_color']='#666666';
		colorschemes['preset10'] = new Array();
		colorschemes['preset10']['primary_color']='#d6d233';
		colorschemes['preset10']['link_color']='#d6d233';
		colorschemes['preset10']['link_color_hover']='#88851b';
		colorschemes['preset10']['button_text_color']='#FFFFFF';
		colorschemes['preset10']['bg_color']='#FFFFFF';
		colorschemes['preset10']['heading_color']='#666666';
		colorschemes['preset10']['body_text_color']='#666666';
		$('#preset_color_scheme').change(function() {
			var colorscheme = $(this).val();
			jQuery.ajax({
				type: 'POST',
				url: 'admin-ajax.php',
				data: {
					action: 'them_option_change_preset',
					colorscheme: colorscheme
				},
				success: function(data){
					if(data != ''){
						var arr_colorscheme = jQuery.parseJSON(data);
						for (var id in arr_colorscheme) {
							of_update_color(id, arr_colorscheme[id]);
						}
					}
					else{
						colorscheme = colorschemes[colorscheme];
						for (var id in colorscheme) {
							of_update_color(id, colorscheme[id]);
						}
					}
				}
			})
		});
		//This does the heavy lifting of updating all the colorpickers and text
		function of_update_color(id,hex) {
			$('#section-' + id).find('.of-color').val(hex).change();
		}
		onLoadFontBody($('#body_font_options').val());
		onLoadFontOther($('#other_font_options_0').val());
		setCollumnHeaderWitget($('#header_top_widgets_columns').val());
		setCollumnFooterWitget($('#footer_top_widgets_columns').val());
		setCollumnFooterBottomWitget($('#footer_bottom_widgets_columns').val());
		var body_font_type;
		$('#body_font_options').change(function() {
			body_font_type = $('#body_font_options').val();
			onLoadFontBody(body_font_type);
		});
		$('#other_font_options_0').change(function() {
			body_font_type = $('#other_font_options_0').val();
			onLoadFontOther(body_font_type);
		});
		$('#header_top_widgets_columns').change(function() {
			setCollumnHeaderWitget($('#header_top_widgets_columns').val());
		});
		$('#footer_top_widgets_columns').change(function() {
			setCollumnFooterWitget($('#footer_top_widgets_columns').val());
		});
		$('#footer_bottom_widgets_columns').change(function() {
			setCollumnFooterBottomWitget($('#footer_bottom_widgets_columns').val());
		});
		function onLoadFontBody(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_body_font_family').css("display","block");
				$('#section-standard_body_font_family').css("display","none");
				$('#section-custom_body_font_family').css("display","none");
				$('#section-body_font_family_selector').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_body_font_family').css("display","none");
				$('#section-standard_body_font_family').css("display","block");
				$('#section-custom_body_font_family').css("display","none");
				$('#section-body_font_family_selector').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_body_font_family').css("display","none");
				$('#section-standard_body_font_family').css("display","none");
				$('#section-custom_body_font_family').css("display","block");
				$('#section-body_font_family_selector').css("display","block");
				break;
			default:
				$('#section-google_body_font_family').css("display","none");
				$('#section-standard_body_font_family').css("display","none");
				$('#section-custom_body_font_family').css("display","none");
				$('#section-body_font_family_selector').css("display","none");
			}
		}
		function onLoadFontMainMenu(main_menu_font_type){
			switch(main_menu_font_type){
			case 'Google Font':
				$('#section-google_main_menu_font_family').css("display","block");
				$('#section-standard_main_menu_font_family').css("display","none");
				$('#section-custom_main_menu_font_family').css("display","none");
				$('#section-main_menu_font_family_selector').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_main_menu_font_family').css("display","none");
				$('#section-standard_main_menu_font_family').css("display","block");
				$('#section-custom_main_menu_font_family').css("display","none");
				$('#section-main_menu_font_family_selector').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_main_menu_font_family').css("display","none");
				$('#section-standard_main_menu_font_family').css("display","none");
				$('#section-custom_main_menu_font_family').css("display","block");
				$('#section-main_menu_font_family_selector').css("display","block");
				break;
			default:
				$('#section-google_main_menu_font_family').css("display","none");
				$('#section-standard_main_menu_font_family').css("display","none");
				$('#section-custom_main_menu_font_family').css("display","none");
				$('#section-main_menu_font_family_selector').css("display","none");
			}
		}
		function onLoadFontHeader(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_header_font_family').css("display","block");
				$('#section-standard_header_font_family').css("display","none");
				$('#section-custom_header_font_family').css("display","none");
				$('#section-header_font_family_selector').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_header_font_family').css("display","none");
				$('#section-standard_header_font_family').css("display","block");
				$('#section-custom_header_font_family').css("display","none");
				$('#section-header_font_family_selector').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_header_font_family').css("display","none");
				$('#section-standard_header_font_family').css("display","none");
				$('#section-custom_header_font_family').css("display","block");
				$('#section-header_font_family_selector').css("display","block");
				break;
			default:
				$('#section-google_header_font_family').css("display","none");
				$('#section-standard_header_font_family').css("display","none");
				$('#section-custom_header_font_family').css("display","none");
				$('#section-header_font_family_selector').css("display","none");
			}
		}
		function onLoadFontOther(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_0').css("display","block");
				$('#section-standard_other_font_family_0').css("display","none");
				$('#section-custom_other_font_family_0').css("display","none");
				$('#section-other_font_family_selector_0').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_0').css("display","none");
				$('#section-standard_other_font_family_0').css("display","block");
				$('#section-custom_other_font_family_0').css("display","none");
				$('#section-other_font_family_selector_0').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_0').css("display","none");
				$('#section-standard_other_font_family_0').css("display","none");
				$('#section-custom_other_font_family_0').css("display","block");
				$('#section-other_font_family_selector_0').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_0').css("display","none");
				$('#section-standard_other_font_family_0').css("display","none");
				$('#section-custom_other_font_family_0').css("display","none");
				$('#section-other_font_family_selector_0').css("display","none");
			}
		}
		function onLoadFontOther1(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_1').css("display","block");
				$('#section-standard_other_font_family_1').css("display","none");
				$('#section-custom_other_font_family_1').css("display","none");
				$('#section-other_font_family_selector_1').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_1').css("display","none");
				$('#section-standard_other_font_family_1').css("display","block");
				$('#section-custom_other_font_family_1').css("display","none");
				$('#section-other_font_family_selector_1').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_1').css("display","none");
				$('#section-standard_other_font_family_1').css("display","none");
				$('#section-custom_other_font_family_1').css("display","block");
				$('#section-other_font_family_selector_1').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_1').css("display","none");
				$('#section-standard_other_font_family_1').css("display","none");
				$('#section-custom_other_font_family_1').css("display","none");
				$('#section-other_font_family_selector_1').css("display","none");
			}
		}
		function onLoadFontOther2(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_2').css("display","block");
				$('#section-standard_other_font_family_2').css("display","none");
				$('#section-custom_other_font_family_2').css("display","none");
				$('#section-other_font_family_selector_2').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_2').css("display","none");
				$('#section-standard_other_font_family_2').css("display","block");
				$('#section-custom_other_font_family_2').css("display","none");
				$('#section-other_font_family_selector_2').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_2').css("display","none");
				$('#section-standard_other_font_family_2').css("display","none");
				$('#section-custom_other_font_family_2').css("display","block");
				$('#section-other_font_family_selector_2').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_2').css("display","none");
				$('#section-standard_other_font_family_2').css("display","none");
				$('#section-custom_other_font_family_2').css("display","none");
				$('#section-other_font_family_selector_2').css("display","none");
			}
		}
		function onLoadFontOther3(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_3').css("display","block");
				$('#section-standard_other_font_family_3').css("display","none");
				$('#section-custom_other_font_family_3').css("display","none");
				$('#section-other_font_family_selector_3').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_3').css("display","none");
				$('#section-standard_other_font_family_3').css("display","block");
				$('#section-custom_other_font_family_3').css("display","none");
				$('#section-other_font_family_selector_3').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_3').css("display","none");
				$('#section-standard_other_font_family_3').css("display","none");
				$('#section-custom_other_font_family_3').css("display","block");
				$('#section-other_font_family_selector_3').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_3').css("display","none");
				$('#section-standard_other_font_family_3').css("display","none");
				$('#section-custom_other_font_family_3').css("display","none");
				$('#section-other_font_family_selector_3').css("display","none");
			}
		}
		function onLoadFontOther4(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_4').css("display","block");
				$('#section-standard_other_font_family_4').css("display","none");
				$('#section-custom_other_font_family_4').css("display","none");
				$('#section-other_font_family_selector_4').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_4').css("display","none");
				$('#section-standard_other_font_family_4').css("display","block");
				$('#section-custom_other_font_family_4').css("display","none");
				$('#section-other_font_family_selector_4').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_4').css("display","none");
				$('#section-standard_other_font_family_4').css("display","none");
				$('#section-custom_other_font_family_4').css("display","block");
				$('#section-other_font_family_selector_4').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_4').css("display","none");
				$('#section-standard_other_font_family_4').css("display","none");
				$('#section-custom_other_font_family_4').css("display","none");
				$('#section-other_font_family_selector_4').css("display","none");
			}
		}
		function onLoadFontOther5(body_font_type){
			switch(body_font_type){
			case 'Google Font':
				$('#section-google_other_font_family_5').css("display","block");
				$('#section-standard_other_font_family_5').css("display","none");
				$('#section-custom_other_font_family_5').css("display","none");
				$('#section-other_font_family_selector_5').css("display","block");
				break;
			case 'Standard Font':
				$('#section-google_other_font_family_5').css("display","none");
				$('#section-standard_other_font_family_5').css("display","block");
				$('#section-custom_other_font_family_5').css("display","none");
				$('#section-other_font_family_selector_5').css("display","block");
				break;
			case 'Custom Font':
				$('#section-google_other_font_family_5').css("display","none");
				$('#section-standard_other_font_family_5').css("display","none");
				$('#section-custom_other_font_family_5').css("display","block");
				$('#section-other_font_family_selector_5').css("display","block");
				break;
			default:
				$('#section-google_other_font_family_5').css("display","none");
				$('#section-standard_other_font_family_5').css("display","none");
				$('#section-custom_other_font_family_5').css("display","none");
				$('#section-other_font_family_selector_5').css("display","none");
			}
		}
		function setCollumnHeaderWitget(collumn) {
			switch (collumn) {
			case '1':
				$('#section-header_top_widgets_1').css("display","block");
				$('#header_top_widgets_1').val("col-xs-12 col-sm-12 col-md-12 col-lg-12");
				$('#section-header_top_widgets_2').css("display","none");
				break;
			case '2':
				$('#section-header_top_widgets_1').css("display","block");
				$('#header_top_widgets_1').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				$('#section-header_top_widgets_2').css("display","block");
				$('#header_top_widgets_2').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				break;
			}
		}
		function setCollumnFooterWitget(collumn) {
			switch (collumn) {
			case '1':
				$('#section-footer_top_widgets_1').css("display","block");
				$('#footer_top_widgets_1').val("col-xs-12 col-sm-12 col-md-12 col-lg-12");
				$('#section-footer_top_widgets_2').css("display","none");
				$('#section-footer_top_widgets_3').css("display","none");
				$('#section-footer_top_widgets_4').css("display","none");
				break;
			case '2':
				$('#section-footer_top_widgets_1').css("display","block");
				$('#footer_top_widgets_1').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				$('#section-footer_top_widgets_2').css("display","block");
				$('#footer_top_widgets_2').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				$('#section-footer_top_widgets_3').css("display","none");
				$('#section-footer_top_widgets_4').css("display","none");
				break;
			case '3':
				$('#section-footer_top_widgets_1').css("display","block");
				$('#footer_top_widgets_1').val("col-xs-12 col-sm-6 col-md-4 col-lg-4");
				$('#section-footer_top_widgets_2').css("display","block");
				$('#footer_top_widgets_2').val("col-xs-12 col-sm-6 col-md-4 col-lg-4");
				$('#section-footer_top_widgets_3').css("display","block");
				$('#footer_top_widgets_3').val("col-xs-12 col-sm-6 col-md-4 col-lg-4");
				$('#section-footer_top_widgets_4').css("display","none");
				break;
			case '4':
				$('#section-footer_top_widgets_1').css("display","block");
				$('#footer_top_widgets_1').val("col-xs-12 col-sm-6 col-md-3 col-lg-3");
				$('#section-footer_top_widgets_2').css("display","block");
				$('#footer_top_widgets_2').val("col-xs-12 col-sm-6 col-md-3 col-lg-3");
				$('#section-footer_top_widgets_3').css("display","block");
				$('#footer_top_widgets_3').val("col-xs-12 col-sm-6 col-md-3 col-lg-3");
				$('#section-footer_top_widgets_4').css("display","block");
				$('#footer_top_widgets_4').val("col-xs-12 col-sm-6 col-md-3 col-lg-3");
				break;
			}
		}
		function setCollumnFooterBottomWitget(collumn) {
			switch (collumn) {
			case '1':
				$('#section-footer_bottom_widgets_1').css("display","block");
				$('#footer_bottom_widgets_1').val("col-xs-12 col-sm-12 col-md-12 col-lg-12");
				$('#section-footer_bottom_widgets_2').css("display","none");
				break;
			case '2':
				$('#section-footer_bottom_widgets_1').css("display","block");
				$('#footer_bottom_widgets_1').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				$('#section-footer_bottom_widgets_2').css("display","block");
				$('#footer_bottom_widgets_2').val("col-xs-12 col-sm-6 col-md-6 col-lg-6");
				break;
			}
		}
		jQuery('#sample').click(function(e){
			var confirm = window.confirm('WARNING: Clicking this button will replace your current theme options, sliders and widgets.  It can also take a minute to complete. Importing data is recommended on fresh installs only once. Importing on sites with content or importing twice will duplicate menus, pages and all posts.');
			var loading_img = jQuery(this).parent().find('img');
			if(confirm == true) {			
				jQuery(this).attr('disabled','true');
				jQuery('#msg').html('&nbsp;Loading');
				jQuery.ajax({
					type: 'POST',
					url: ajaxurl,
					data: {
						'action': 'sample'
					},
					success: function(data, textStatus, XMLHttpRequest){
					if(data.indexOf('import_complete')!=-1)
						jQuery('#msg').html('&nbsp;Import is Completed');
					}
				});
			}
			e.preventDefault();
		});

	});
})(jQuery);

