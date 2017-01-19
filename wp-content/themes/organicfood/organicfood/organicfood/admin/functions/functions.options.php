<?php
add_action('init', 'of_options');

if (!function_exists('of_options')) {
    function of_options()
    {
        //Access the WordPress Categories via an Array
        $of_categories = array();
        $of_categories_obj = get_categories('hide_empty=0');
        foreach ($of_categories_obj as $of_cat) {
            $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;
        }
        $categories_tmp = array_unshift($of_categories, "Select a category:");

        //Access the WordPress Pages via an Array
        $of_pages = array();
        $of_pages_obj = get_pages('sort_column=post_parent,menu_order');
        foreach ($of_pages_obj as $of_page) {
            $of_pages[$of_page->ID] = $of_page->post_name;
        }
        $of_pages_tmp = array_unshift($of_pages, "Select a page:");

        //Testing
        $of_options_select = array("one", "two", "three", "four", "five");
        $of_options_radio = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");
        $of_options_fontsize = array("8px" => "8px", "9px" => "9px", "10px" => "10px", "11px" => "11px", "12px" => "12px", "13px" => "13px", "14px" => "14px", "15px" => "15px", "16px" => "16px", "17px" => "17px", "18px" => "18px", "19px" => "19px", "20px" => "20px", "21px" => "21px", "22px" => "22px", "23px" => "23px", "24px" => "24px", "25px" => "25px", "26px" => "26px", "27px" => "27px", "28px" => "28px", "29px" => "29px", "30px" => "30px", "31px" => "31px", "32px" => "32px", "33px" => "33px", "34px" => "34px", "35px" => "35px", "36px" => "36px", "37px" => "37px", "38px" => "38px", "39px" => "39px", "40px" => "40px");
        $of_options_font = array("" => "None", "1" => "Google Font", "2" => "Standard Font", "3" => "Custom Font");
        //Sample Homepage blocks for the layout manager (sorter)
        $of_options_homepage_blocks = array
        (
            "disabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_one" => "Block One",
                "block_two" => "Block Two",
                "block_three" => "Block Three",
            ),
            "enabled" => array(
                "placebo" => "placebo", //REQUIRED!
                "block_four" => "Block Four",
            ),
        );


        //Stylesheets Reader
        $alt_stylesheet_path = LAYOUT_PATH;
        $alt_stylesheets = array();

        if (is_dir($alt_stylesheet_path)) {
            if ($alt_stylesheet_dir = opendir($alt_stylesheet_path)) {
                while (($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false) {
                    if (stristr($alt_stylesheet_file, ".css") !== false) {
                        $alt_stylesheets[] = $alt_stylesheet_file;
                    }
                }
            }
        }


        //Background Images Reader
        $bg_images_path = get_stylesheet_directory() . '/images/bg/'; // change this to where you store your bg images
        $bg_images_url = URI_PATH . '/images/bg/'; // change this to where you store your bg images
        $bg_images = array();

        if ( is_dir($bg_images_path) ) {
            if ($bg_images_dir = opendir($bg_images_path) ) {
                while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
                    if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
                        natsort($bg_images); //Sorts the array into a natural order
                        $bg_images[] = $bg_images_url . $bg_images_file;
                    }
                }
            }
        }


        /*-----------------------------------------------------------------------------------*/
        /* TO DO: Add options/functions that use these */
        /*-----------------------------------------------------------------------------------*/

        //More Options
        $uploads_arr = wp_upload_dir();
        $all_uploads_path = $uploads_arr['path'];
        $all_uploads = get_option('of_uploads');
        $other_entries = array("Select a number:", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19");
        $body_size = array("auto auto", "contain", "cover");     
        $body_repeat = array("no-repeat", "repeat-x", "repeat-y", "repeat");
        $body_pos = array("top left", "top center", "top right", "center left", "center center", "center right", "bottom left", "bottom center", "bottom right");

        // Image Alignment radio box
        $of_options_thumb_align = array("alignleft" => "Left", "alignright" => "Right", "aligncenter" => "Center");

        // Image Links to Options
        $of_options_image_link_to = array("image" => "The Image", "post" => "The Post");

        //Google font API
        $of_options_google_font = array();
        if (is_admin()) {
        	$results = '';
        	$whitelist = array('127.0.0.1','::1');
            if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	            $results = wp_remote_get('https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=AIzaSyAbKpJA3ueqmTCu3PUfGLbJdoE-CLaMjhs');
	            if(!is_wp_error($results)){
	                $results = json_decode($results['body']);
                        if(isset($results->items)){
                            foreach ($results->items as $font) {
                                $of_options_google_font[$font->family] = $font->family;
                            }
                        }
	            }
            }
        }
        //Standard Fonts
        $of_options_standard_fonts = array(
            '0' => 'Select Font',
            'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
            "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
            "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
            "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
            "Courier, monospace" => "Courier, monospace",
            "Garamond, serif" => "Garamond, serif",
            "Georgia, serif" => "Georgia, serif",
            "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
            "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
            "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
            "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
            "'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
            "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
            "Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
            "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
            "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
            "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
        );
        // Custom Font
        $fonts = array();
        $of_options_custom_fonts = array();
        $of_options_custom_fonts[''] = 'Select Font';
        $font_path = get_template_directory() . "/fonts";
        if (!$handle = opendir($font_path)) {
            $fonts = array();
        } else {
            while (false !== ($file = readdir($handle))) {
                if (strpos($file, ".ttf") !== false ||
                    strpos($file, ".eot") !== false ||
                    strpos($file, ".svg") !== false ||
                    strpos($file, ".woff") !== false
                ) {
                    $fonts[] = $file;
                }
            }
        }
        closedir($handle);

        foreach ($fonts as $font) {
            $font_name = str_replace(array('.ttf', '.eot', '.svg', '.woff'), '', $font);
            $of_options_custom_fonts[$font_name] = $font_name;
        }
        /* remove dup item */
        $of_options_custom_fonts = array_unique($of_options_custom_fonts);

        /*-----------------------------------------------------------------------------------*/
        /* The Options Array */
        /*-----------------------------------------------------------------------------------*/
        global $of_options;
        $of_options = array();
/*Section General Settings*/
        $of_options[] = array("name" => __("General Settings", 'organicfood'),
            "type" => "heading"
        );

        $of_options[] = array("name" => __("Demo Content", 'organicfood'),
            "desc" => "<input type='button' name='sample' id='sample' value='Import Now' /><span id='msg'></span>",
            "id" => "code",
            "std" => __("<h3>Demo Content</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Responsive", 'organicfood'),
            "desc" => "",
            "id" => "responsive",
            "std" => __("<h3>Responsive Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Responsive Design", 'organicfood'),
            "desc" => __("Use the responsive design features.", 'organicfood'),
            "id" => "responsive",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Less", 'organicfood'),
            "desc" => "",
            "id" => "use_less",
            "std" => __("<h3>Less Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Use Less", 'organicfood'),
            "desc" => __("Use the less.", 'organicfood'),
            "id" => "use_less",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        // begin Layout
        $of_options[] = array("name" => __("Smoothscroll", 'organicfood'),
            "desc" => "",
            "id" => "smoothscroll",
            "std" => __("<h3>Smoothscroll Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        
        $of_options[] = array("name" => __("Smoothscroll", 'organicfood'),
            "desc" => __("Smoothscroll", 'organicfood'),
            "id" => "smoothscroll",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Layout", 'organicfood'),
            "desc" => "",
            "id" => "layout",
            "std" => __("<h3>Layout Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Layout", 'organicfood'),
            "desc" => __("Select boxed or wide layout.", 'organicfood'),
            "id" => "layout",
            "std" => "full",
            "type" => "select",
            "options" => array(
                'full' => 'Wide',
                'boxed' => 'Boxed'
            ));
        // end Layout
        $of_options[] = array("name" => __("Boxed Mode Only", 'organicfood'),
            "desc" => "",
            "id" => "boxed_mode_only",
            "std" => __("<h3>Background options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Background Image", 'organicfood'),
            "desc" => __("Select an image or insert an image url to use for the backgroud.", 'organicfood'),
            "id" => "bg_image",
            "std" => "",
            "mod" => "",
            "type" => "media");

        $of_options[] = array("name" => __("100% Background Image", 'organicfood'),
            "desc" => __("The background image display at 100% in width and height and scale according to the browser size.", 'organicfood'),
            "id" => "bg_full",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Background Repeat", 'organicfood'),
            "desc" => __("Select how the background image repeats.", 'organicfood'),
            "id" => "bg_repeat",
            "std" => "repeat",
            "type" => "select",
            "options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));
        $of_options[] = array("name" => __("Background Position", 'organicfood'),
            "desc" => __("Select the position from where background image starts.", 'organicfood'),
            "id" => "bg_pos",
            "std" => "center center",
            "type" => "select",
            "options" => $body_pos);
        
        $of_options[] = array("name" => __("Background Pattern", 'organicfood'),
            "desc" => __("Display a pattern in the background. If Yes, select the pattern from below.", 'organicfood'),
            "id" => "bg_pattern_option",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Select a Background Pattern", 'organicfood'),
            "desc" => __("Select a background pattern.", 'organicfood'),
            "id" => "bg_pattern",
            "std" => $bg_images_url . "bg0.png",
            "type" => "tiles",
            "fold" => "bg_pattern_option",
            "options" => $bg_images,
        );
        $of_options[] = array("name" => __("Code", 'organicfood'),
            "desc" => "",
            "id" => "code",
            "std" => __("<h3>Tracking / Space Before Head / Space Before Body Code</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        // begin Google Analytic
        $of_options[] = array("name" => __("Google Analytic", 'organicfood'),
            "desc" => __("Google Analytic", 'organicfood'),
            "id" => "google_analytic",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch"
        );
        $of_options[] = array("name" => __("Tracking ID", 'organicfood'),
            "desc" => "Tracking ID",
            "id" => "hidden_tracking_id",
            "std" => "",
            "fold" => "google_analytic", /* the switch hook */
            "type" => "text"
        );
        // end Google Analytic
        $of_options[] = array("name" => __("Space before &lt;/head&gt;", 'organicfood'),
            "desc" => __("Add code before the &lt;/head&gt; tag.", 'organicfood'),
            "id" => "space_head",
            "std" => "",
            "type" => "textarea");

        $of_options[] = array("name" => __("Space before &lt;/body&gt;", 'organicfood'),
            "desc" => __("Add code before the &lt;/body&gt; tag.", 'organicfood'),
            "id" => "space_body",
            "std" => "",
            "type" => "textarea");

/*Section Logo*/
        $of_options[] = array("name" => __("Logo", 'organicfood'),
            "type" => "heading");

        $of_options[] = array("name" => __("Logo Info", 'organicfood'),
            "desc" => "",
            "id" => "header_info",
            "std" => __("<h3>Logo Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");

        $of_options[] = array("name" => __("Logo", 'organicfood'),
            "desc" => __("Select an image file for your logo.", 'organicfood'),
            "id" => "logo",
            "std" => URI_PATH . "/images/logo.png",
            "mod" => "",
            "type" => "media");
        $of_options[] = array("name" => __("Logo Max Height", 'organicfood'),
            "desc" => __("Enter logo width, In pixels, ex: 40px", 'organicfood'),
            "id" => "logo_width",
            "std" => "45px",
            "type" => "text");
        $of_options[] = array("name" => __("Logo Margin", 'organicfood'),
            "desc" => __("In pixels, top right bottom left, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "margin_logo",
            "std" => "0px",
            "type" => "text");

        $of_options[] = array("name" => __("Logo Padding", 'organicfood'),
            "desc" => __("In pixels, top right bottom left, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "padding_logo",
            "std" => "0px",
            "type" => "text");
        $of_options[] = array("name" => __("Favicon Options", 'organicfood'),
            "desc" => "",
            "id" => "favicons",
            "std" => __("<h3>Favicon Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");

        $of_options[] = array("name" => __("Favicon", 'organicfood'),
            "desc" => __("Favicon for your website (16px x 16px).", 'organicfood'),
            "id" => "favicon",
            "std" => "",
            "type" => "upload");
/*Section Header*/
        $of_options[] = array("name" => __("Header", 'organicfood'),
            "type" => "heading");

        $of_options[] = array("name" => __("Header Info", 'organicfood'),
            "desc" => "",
            "id" => "header_info",
            "std" => __("<h3>Header Content Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $headers = array(
                        "v1" => URI_PATH . "/images/header/header1.jpg",
                        "v2" => URI_PATH . "/images/header/header2.jpg",
                        "v3" => URI_PATH . "/images/header/header3.jpg"
                    );
        if (class_exists('Woocommerce')) {
            $headers['shop'] = URI_PATH . "/images/header/shop.jpg";
        }
        $of_options[] = array("name" => __("Select a Header Layout", 'organicfood'),
            "desc" => "",
            "id" => "header_layout",
            "std" => "v1",
            "type" => "images",
            "options" => $headers);
        $of_options[] = array("name" => __("Transparent Header", 'organicfood'),
            "desc" => __("Transparent Header.<br /> Min: 0, max: 100, step: 1, default value: 100", 'organicfood'),
            "id" => "header_transparent",
            "std" => "0",
            "min" => "0",
            "step" => "1",
            "max" => "100",
            "type" => "sliderui"
        );
        $of_options[] = array("name" => __("Header Top Widgets", 'organicfood'),
            "desc" => __("Display header top widgets.", 'organicfood'),
            "id" => "header_top_widgets",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Header Fixed", 'organicfood'),
            "desc" => __("Header Fixed", 'organicfood'),
            "id" => "header_fixed",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Header Margin", 'organicfood'),
            "desc" => __("Header Margin, In pixels, top left botton right, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "header_margin",
            "std" => "0px",
            "type" => "text");
        $of_options[] = array("name" => __("Header Padding", 'organicfood'),
            "desc" => __("Header Padding, In pixels, top left botton right, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "header_padding",
            "std" => "0px",
            "type" => "text");
        $of_options[] = array("name" => __("Sticky Header Info", 'organicfood'),
            "desc" => "",
            "id" => "sticky_header_info",
            "std" => __("<h3>Sticky Header Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");

        $of_options[] = array("name" => __("Enable Sticky Header", 'organicfood'),
            "desc" => __("Enable a fixed header when scrolling.", 'organicfood'),
            "id" => "header_sticky",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array("name" => __("Sticky Header Opacity", 'organicfood'),
            "desc" => __("Set the opacity of background.<br /> Min: 0, max: 100, step: 1, default value: 45", 'organicfood'),
            "id" => "header_sticky_opacity",
            "id" => "header_sticky_opacity",
            "std" => "0",
            "min" => "0",
            "step" => "1",
            "max" => "100",
            "fold" => "header_sticky",  
            "type" => "sliderui"
        );
// end header

/*Section Main Menu*/
        $of_options[] = array("name" => __("Main Menu", 'organicfood'),
            "type" => "heading");

        $of_options[] = array("name" => __("Menu Info", 'organicfood'),
            "desc" => "",
            "id" => "header_info",
            "std" => __("<h3>Menu Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Menu Item Padding", 'organicfood'),
            "desc" => __("Use a number without 'px', default is 5px 15px. ex: 5px 15px", 'organicfood'),
            "id" => "nav_padding",
            "std" => "5px 15px",
            "type" => "text");
        $of_options[] = array("name" => __("Menu Font Size First Level", 'organicfood'),
            "desc" => __("Use a number without 'px', default is 13px. ex: 13px", 'organicfood'),
            "id" => "menu_fontsize_first_level",
            "std" => "13px",
            "type" => "text");
        $of_options[] = array("name" => __("Menu Font Size First Sublevel", 'organicfood'),
            "desc" => __("Use a number without 'px', default is 12px. ex: 12px", 'organicfood'),
            "id" => "menu_fontsize_sub_level",
            "std" => "12px",
            "type" => "text");
/*Section Footer*/
        $of_options[] = array("name" => __("Footer", 'organicfood'),
            "type" => "heading");
        $of_options[] = array("name" => __("Footer Top Info", 'organicfood'),
            "desc" => "",
            "id" => "footer_top_info",
            "std" => __("<h3>Footer Top Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Footer Top Widgets", 'organicfood'),
            "desc" => __("Display footer top widgets.", 'organicfood'),
            "id" => "footer_top_widgets",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");

        $of_options[] = array("name" => __("Number of Footer Top Columns", 'organicfood'),
            "desc" => __("Select the number of columns to display in the footer top.", 'organicfood'),
            "id" => "footer_top_widgets_columns",
            "std" => "4",
            "options" => array('1' => '1', '2' => '2', '3' => '3', '4' => '4'),
            "type" => "select");
        $of_options[] = array("name" => __("Class Footer Widget 1", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_top_widgets_1",
            "std" => "col-xs-12 col-sm-6 col-md-3 col-lg-3",
            "type" => "text");
        $of_options[] = array("name" => __("Class Footer Widget 2", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_top_widgets_2",
            "std" => "col-xs-12 col-sm-6 col-md-3 col-lg-3",
            "type" => "text");
        $of_options[] = array("name" => __("Class Footer Widget 3", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_top_widgets_3",
            "std" => "col-xs-12 col-sm-6 col-md-3 col-lg-3",
            "type" => "text");
        $of_options[] = array("name" => __("Class Footer Widget 4", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_top_widgets_4",
            "std" => "col-xs-12 col-sm-6 col-md-3 col-lg-3",
            "type" => "text");

        $of_options[] = array("name" => __("Background Image", 'organicfood'),
            "desc" => __("Select an image or insert an image url to use for the footer top area backgroud.", 'organicfood'),
            "id" => "footer_top_bg_image",
            "std" => "",
            "mod" => "",
            "type" => "media");

        $of_options[] = array("name" => __("100% Background Image", 'organicfood'),
            "desc" => __("The footer top background image display at 100% in width and height and scale according to the browser size.", 'organicfood'),
            "id" => "footer_top_bg_full",
            "std" => 0,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");

        $of_options[] = array("name" => __("Background Repeat", 'organicfood'),
            "desc" => __("Select how the background image repeats.", 'organicfood'),
            "id" => "footer_top_bg_repeat",
            "std" => "repeat",
            "type" => "select",
            "options" => array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat'));

        $of_options[] = array("name" => __("Background Position", 'organicfood'),
            "desc" => __("Select the position from where background image starts.", 'organicfood'),
            "id" => "footer_top_bg_pos",
            "std" => "center center",
            "type" => "select",
            "options" => $body_pos);
        $of_options[] = array("name" => __("Footer Top Padding", 'organicfood'),
            "desc" => __("In pixels, top left botton right, ex: 35px 0px", 'organicfood'),
            "id" => "footer_top_padding",
            "std" => "35px 0px",
            "type" => "text");
        $of_options[] = array("name" => __("Footer Top Margin", 'organicfood'),
            "desc" => __("In pixels, top left botton right, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "footer_top_margin",
            "std" => "0px",
            "type" => "text");
        // Footer Bottom
        $of_options[] = array("name" => __("Footer Bottom Info", 'organicfood'),
            "desc" => "",
            "id" => "footer_bottom_info",
            "std" => __("<h3>Footer Bottom Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Footer Bottom Widgets", 'organicfood'),
            "desc" => __("Check the box to display footer bottom widgets.", 'organicfood'),
            "id" => "footer_bottom_widgets",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");

        $of_options[] = array("name" => __("Number of Footer Bottom Columns", 'organicfood'),
            "desc" => __("Select the number of columns to display in the footer bottom.", 'organicfood'),
            "id" => "footer_bottom_widgets_columns",
            "std" => "2",
            "options" => array('1' => '1', '2' => '2'),
            "type" => "select");
        $of_options[] = array("name" => __("Class Footer Bottom Widget 1", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_bottom_widgets_1",
            "std" => "col-xs-12 col-sm-6 col-md-6 col-lg-6",
            "type" => "text");
        $of_options[] = array("name" => __("Class Footer Bottom Widget 2", 'organicfood'),
            "desc" => __("Class follow the Bootstrap 3", 'organicfood'),
            "id" => "footer_bottom_widgets_2",
            "std" => "col-xs-12 col-sm-6 col-md-6 col-lg-6",
            "type" => "text");

        $of_options[] = array("name" => __("Footer Bottom Padding", 'organicfood'),
            "desc" => __("In pixels, top left botton right, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "footer_bottom_padding",
            "std" => "35px 0",
            "type" => "text");
        $of_options[] = array("name" => __("Footer Bottom Margin", 'organicfood'),
            "desc" => __("In pixels, top left botton right, ex: 10px 10px 10px 10px", 'organicfood'),
            "id" => "footer_bottom_margin",
            "std" => "0",
            "type" => "text");
/*Section Styling Options*/
        $of_options[] = array("name" => __("Styling Options", 'organicfood'),
            "type" => "heading"
        );

        $of_options[] = array("name" => __("Main Color", 'organicfood'),
            "desc" => "",
            "id" => "main_color",
            "std" => __("<h3>Main Color</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Preset Color Scheme", 'organicfood'),
            "desc" => __("Select a scheme, all color options will automatically change to the defined scheme.", 'organicfood'),
            "id" => "preset_color_scheme",
            "std" => "preset1",
            "type" => "select",
            "options" => array('preset1' => 'Preset1', 'preset2' => 'Preset2', 'preset3' => 'Preset3', 'preset4' => 'Preset4', 'preset5' => 'Preset5', 'preset6' => 'Preset6', 'preset7' => 'Preset7', 'preset8' => 'Preset8', 'preset9' => 'Preset9', 'preset10' => 'Preset10'));
        $of_options[] = array("name" => __("Primary Color", 'organicfood'),
            "desc" => __("Controls several items, ex: link hovers, highlights, and more.", 'organicfood'),
            "id" => "primary_color",
            "std" => "#69bd43",
            "type" => "color");
        $of_options[] = array("name" => __("Heading Color", 'organicfood'),
            "desc" => __("Heading Color.", 'organicfood'),
            "id" => "heading_color",
            "std" => "#666666",
            "type" => "color");
        $of_options[] = array("name" => __("Link Color", 'organicfood'),
            "desc" => __("Controls the color of all text links.", 'organicfood'),
            "id" => "link_color",
            "std" => "#69bd43",
            "type" => "color");
        $of_options[] = array("name" => __("Link Color Hover", 'organicfood'),
            "desc" => __("Link Color Hover.", 'organicfood'),
            "id" => "link_color_hover",
            "std" => "#3f7228",
            "type" => "color");

        $of_options[] = array("name" => __("Button Text Color", 'organicfood'),
            "desc" => __("Controls the text color of buttons.", 'organicfood'),
            "id" => "button_text_color",
            "std" => "#fff",
            "type" => "color");
        $of_options[] = array("name" => __("Background Color", 'organicfood'),
            "desc" => __("Select a background color.", 'organicfood'),
            "id" => "bg_color",
            "std" => "#fff",
            "type" => "color");
        $of_options[] = array("name" => __("Body Text Color", 'organicfood'),
            "desc" => __("Controls the text color of body font.", 'organicfood'),
            "id" => "body_text_color",
            "std" => "#666666",
            "type" => "color");
        $of_options[] = array("name" => __("Main Menu Colors", 'organicfood'),
            "desc" => "",
            "id" => "main_menu_colors",
            "std" => __("<h3>Main Menu Colors</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Main Menu Font Color - First Level", 'organicfood'),
            "desc" => __("Controls the text color of first level menu items.", 'organicfood'),
            "id" => "menu_first_color",
            "std" => "#999999",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Font Hover Color - First Level", 'organicfood'),
            "desc" => __("Controls the main menu hover, hover border & dropdown border color.", 'organicfood'),
            "id" => "menu_hover_first_color",
            "std" => "#ffffff",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Background Color - Sublevels", 'organicfood'),
            "desc" => __("Controls the color of the menu sublevel background.", 'organicfood'),
            "id" => "menu_sub_bg_color",
            "std" => "#ffffff",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Background Hover Color - Sublevels", 'organicfood'),
            "desc" => __("Controls the hover color of the menu sublevel background.", 'organicfood'),
            "id" => "menu_bg_hover_color",
            "std" => "#f5f7f9",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Font Color - Sublevels", 'organicfood'),
            "desc" => __("Controls the color of the menu font sublevels.", 'organicfood'),
            "id" => "menu_sub_color",
            "std" => "#afb4b9",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Font Hover Color - Sublevels", 'organicfood'),
            "desc" => __("Controls the color of the menu font sublevels.", 'organicfood'),
            "id" => "menu_sub_hover_color",
            "std" => "#999",
            "type" => "color");

        $of_options[] = array("name" => __("Main Menu Separator - Sublevels", 'organicfood'),
            "desc" => __("Controls the color of the menu separator sublevels.", 'organicfood'),
            "id" => "menu_sub_sep_color",
            "std" => "#eff4f7",
            "type" => "color");
        // end menu
    // begin header color option
        $of_options[] = array("name" => __("Header Color Option", 'organicfood'),
            "desc" => "",
            "id" => "header_color_option",
            "std" => __("<h3>Header Color Option</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Header Background Color", 'organicfood'),
            "desc" => __("Header Background Color.", 'organicfood'),
            "id" => "header_bg_color",
            "std" => "#FFFFFF",
            "type" => "color");
        $of_options[] = array("name" => __("Header Sticky Background Color", 'organicfood'),
            "desc" => __("Header Sticky Background Color.", 'organicfood'),
            "id" => "header_sticky_bg_color",
            "std" => "#FFFFFF",
            "type" => "color");
    //begin title bar color option
    $of_options[] = array("name" => __("Title Bar Color Option", 'organicfood'),
            "desc" => "",
            "id" => "title_bar_color_option",
            "std" => __("<h3>Title Bar Color Option</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
    $of_options[] = array("name" => __("Title Bar Background Color", 'organicfood'),
            "desc" => __("Title Bar Background Color.", 'organicfood'),
            "id" => "title_bar_bg_color",
            "std" => "#f2f2f2",
            "type" => "color");
    $of_options[] = array("name" => __("Title Bar Heading Color", 'organicfood'),
            "desc" => __("Heading Color.", 'organicfood'),
            "id" => "title_bar_heading_color",
            "std" => "#666666",
            "type" => "color");
    $of_options[] = array("name" => __("Title Bar Text Color", 'organicfood'),
            "desc" => __("Controls the color of all text.", 'organicfood'),
            "id" => "title_bar_text_color",
            "std" => "#666666",
            "type" => "color");
    $of_options[] = array("name" => __("Title Bar Link Color", 'organicfood'),
            "desc" => __("Controls the color of all text links.", 'organicfood'),
            "id" => "title_bar_link_color",
            "std" => "#69bd43",
            "type" => "color");
    $of_options[] = array("name" => __("Title Bar Link Color Hover", 'organicfood'),
            "desc" => __("Controls the color of all text links hover.", 'organicfood'),
            "id" => "title_bar_link_color_hover",
            "std" => "#3f7228",
            "type" => "color");
    // begin footer color option
        $of_options[] = array("name" => __("Footer Color Option", 'organicfood'),
            "desc" => "",
            "id" => "footer_color_option",
            "std" => __("<h3>Footer Color Option</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Footer Top Background Color", 'organicfood'),
            "desc" => __("Footer Top Background Color.", 'organicfood'),
            "id" => "footer_top_bg_color",
            "std" => "#000000",
            "type" => "color");
        $of_options[] = array("name" => __("Footer Bottom Background Color", 'organicfood'),
            "desc" => __("Footer Bottom Background Color.", 'organicfood'),
            "id" => "footer_bottom_bg_color",
            "std" => "#000000",
            "type" => "color");
        $of_options[] = array("name" => __("Footer Headings Color", 'organicfood'),
            "desc" => __("Controls the text color of the footer heading font.", 'organicfood'),
            "id" => "footer_headings_color",
            "std" => "#666666",
            "type" => "color");
        $of_options[] = array("name" => __("Footer Font Color", 'organicfood'),
            "desc" => __("Controls the text color of the footer font.", 'organicfood'),
            "id" => "footer_text_color",
            "std" => "#fff",
            "type" => "color");
        $of_options[] = array("name" => __("Footer Link Color", 'organicfood'),
            "desc" => __("Controls the text color of the footer link font.", 'organicfood'),
            "id" => "footer_link_color",
            "std" => "#00c3b6",
            "type" => "color");
        $of_options[] = array("name" => __("Footer Link Hover Color", 'organicfood'),
            "desc" => __("Footer Link Hover Color.", 'organicfood'),
            "id" => "footer_link_hover_color",
            "std" => "#fff",
            "type" => "color");
        // end footer color option

/*Section Typography*/
        $of_options[] = array("name" => __("Typography", 'organicfood'),
            "type" => "heading"
        );

        $of_options[] = array("name" => __("Body Options", 'organicfood'),
            "desc" => "",
            "id" => "body_options",
            "std" => __("<h3>Body Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Body Font Options", 'organicfood'),
            "desc" => __("Body Font Options.", 'organicfood'),
            "id" => "body_font_options",
            "std" => "Standard Font",
            "type" => "select",
            "options" => $of_options_font
        );
        $of_options[] = array("name" => __("Google Body Font Family", 'organicfood'),
            "desc" => __("Google body font family.", 'organicfood'),
            "id" => "google_body_font_family",
            "std" => "",
            "type" => "select",
            "options" => $of_options_google_font
        );
        $of_options[] = array("name" => __("Standard Body Font Family", 'organicfood'),
            "desc" => __("Standard Body Font Family.", 'organicfood'),
            "id" => "standard_body_font_family",
            "std" => "Arial, Helvetica, sans-serif",
            "type" => "select",
            "options" => $of_options_standard_fonts
        );
        $of_options[] = array("name" => __("Custom Body Font Family", 'organicfood'),
            "desc" => __("Custom Body Font Family.", 'organicfood'),
            "id" => "custom_body_font_family",
            "std" => "",
            "type" => "select",
            "options" => $of_options_custom_fonts
        );

        $of_options[] = array("name" => __("Body Font Family Selector", 'organicfood'),
            "desc" => __("Body Font Family Selector", 'organicfood'),
            "id" => "body_font_family_selector",
            "std" => "body",
            "type" => "textarea"
        );
        $of_options[] = array("name" => __("Body Font Size", 'organicfood'),
            "desc" => __("Body Font Size", 'organicfood'),
            "id" => "body_font_size",
            "std" => "14px",
            "type" => "select",
            "options" => $of_options_fontsize
        );

        $of_options[] = array("name" => __("Other Options", 'organicfood'),
            "desc" => "",
            "id" => "other_options",
            "std" => __("<h3>Other Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        /* Other Font 0 */
        $of_options[] = array("name" => __("Other Font Options", 'organicfood'),
            "desc" => __("Other Font Options.", 'organicfood'),
            "id" => "other_font_options_0",
            "std" => "Custom Font",
            "type" => "select",
            "options" => $of_options_font
        );
        $of_options[] = array("name" => __("Google Other Font Family", 'organicfood'),
            "desc" => __("Google Other font family.", 'organicfood'),
            "id" => "google_other_font_family_0",
            "std" => "",
            "type" => "select",
            "options" => $of_options_google_font
        );
        $of_options[] = array("name" => __("Standard Other Font Family", 'organicfood'),
            "desc" => __("Standard Other Font Family.", 'organicfood'),
            "id" => "standard_other_font_family_0",
            "std" => "",
            "type" => "select",
            "options" => $of_options_standard_fonts
        );
        $of_options[] = array("name" => __("Custom Other Font Family", 'organicfood'),
        		"desc" => __("Custom Other Font Family.", 'organicfood'),
        		"id" => "custom_other_font_family_0",
        		"std" => "Custom Font",
        		"type" => "select",
        		"options" => $of_options_custom_fonts
        );
        $of_options[] = array("name" => __("Other Font Family Selector", 'organicfood'),
        		"desc" => __("Other Font Family Selector", 'organicfood'),
        		"id" => "other_font_family_selector_0",
        		"std" => ".page-title-style .page-title, h3.cs-pricing-title, .comment-body .fn, .home .ww-fancy-box .ww-title-main",
        		"type" => "textarea"
        );
        /* End Other Font*/
// end Typography

/*Section Blog*/
        $of_options[] = array("name" => __("Blog", 'organicfood'),
            "type" => "heading"
        );
        $of_options[] = array("name" => __("Blog Title Bar Options", 'organicfood'),
            "desc" => "",
            "id" => "blog_title_bar_options",
            "std" => __("<h3>Blog Title Bar Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array("name" => __("Background", 'organicfood'),
            "desc" => __("Select an image file for your background title bar.", 'organicfood'),
            "id" => "background_title_bar_blog",
            "std" => URI_PATH . "/images/TitleBarbg3.jpg",
            "mod" => "",
            "type" => "media");
        $of_options[] = array(  "name" => __("Background Size", 'organicfood'),
            "desc"      => __("Select background size for your background title bar.", 'organicfood'),
            "id"        => "background_size_title_bar_blog",
            "std"       => "auto auto",
            "type" => "select",
            "options" => $body_size);
        $of_options[] = array(  "name" => __("Background Position", 'organicfood'),
            "desc"      => __("Select background position for your background title bar.", 'organicfood'),
            "id"        => "background_position_title_bar_blog",
            "std"       => "top left",
            "type" => "select",
            "options" => $body_pos);
        $of_options[] = array(  "name" => __("Background Repeat", 'organicfood'),
            "desc"      => __("Select background repeat for your background title bar.", 'organicfood'),
            "id"        => "background_repeat_title_bar_blog",
            "std"       => "repeat",
            "type" => "select",
            "options" => $body_repeat);
        $of_options[] = array( "name" => __("Padding", 'organicfood'),
            "desc" => __("Padding of title bar.", 'organicfood'),
            "id" => "padding_title_bar_blog",
            "std" => "40px 0",
            "type" => "text");
        $of_options[] = array( "name" => __("Margin", 'organicfood'),
            "desc" => __("margin of title bar.", 'organicfood'),
            "id" => "margin_title_bar_blog",
            "std" => "0 0 20px 0",
            "type" => "text");
        $of_options[] = array( "name" => __("Show Page Title", 'organicfood'),
            "desc" => __("Show Page Title", 'organicfood'),
            "id" => "show_page_title_blog",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Show Page Breadcrumb", 'organicfood'),
            "desc" => __("Show Page Breadcrumb", 'organicfood'),
            "id" => "show_page_breadcrumb_blog",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Delimiter", 'organicfood'),
            "desc" => __("Delimiter of page breadcrumb.", 'organicfood'),
            "id" => "delimiter_page_breadcrumb_blog",
            "std" => "/",
            "type" => "text",
            "fold" => "show_page_breadcrumb_blog");
        $of_options[] = array("name" => __("Blog Options", 'organicfood'),
            "desc" => "",
            "id" => "blog_options",
            "std" => __("<h3>Blog Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array( "name" => __("Show Info Blog", 'organicfood'),
            "desc" => __("Show Info Blog", 'organicfood'),
            "id" => "show_info_blog",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $url =  ADMIN_DIR . 'assets/images/';
        $of_options[] = array(  "name"      => __("Blog Layout", 'organicfood'),
            "desc"      => __("Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.", 'organicfood'),
            "id"        => "blog_layout",
            "std"       => "right-fixed",
            "type"      => "images",
            "options"   => array(
                    'full-fixed'    => $url . '1col.png',
                    'right-fixed'   => $url . '2cr.png',
                    'left-fixed'    => $url . '2cl.png'
            )
        );
        $of_options[] = array( "name" => __("Excerpt Length", 'organicfood'),
            "desc" => __("Insert the number of words you want to show in the post excerpts.", 'organicfood'),
            "id" => "blog_excerpt_length_blog",
            "std" => "50",
            "type" => "text");
        $of_options[] = array( "name" => __("Excerpt More", 'organicfood'),
            "desc" => __("Insert the character of words you want to show in the post excerpts.", 'organicfood'),
            "id" => "blog_excerpt_more_blog",
            "std" => "...",
            "type" => "text");
        $of_options[] = array("name" => __("Post Options", 'organicfood'),
            "desc" => "",
            "id" => "post_options",
            "std" => __("<h3>Post Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array( "name" => __("Show Title Post", 'organicfood'),
            "desc" => __("Show Title Post", 'organicfood'),
            "id" => "show_title_post",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Show Info Post", 'organicfood'),
            "desc" => __("Show Info Post", 'organicfood'),
            "id" => "show_info_post",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Show Comments Post", 'organicfood'),
            "desc" => __("Show Comments Post", 'organicfood'),
            "id" => "show_comments_post",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Show Tags", 'organicfood'),
            "desc" => __("Show Tags Post", 'organicfood'),
            "id" => "show_tags_post",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Previous/Next Pagination", 'organicfood'),
            "desc" => __("Previous/Next Pagination", 'organicfood'),
            "id" => "show_navigation_post",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array(  "name"      => __("Post Layout", 'organicfood'),
            "desc"      => __("Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.", 'organicfood'),
            "id"        => "post_layout",
            "std"       => "right-fixed",
            "type"      => "images",
            "options"   => array(
                'full-fixed'    => $url . '1col.png',
                'right-fixed'   => $url . '2cr.png',
                'left-fixed'    => $url . '2cl.png',
                '3column-fixed'         => $url . '3cm.png',
                '3column-right-fixed'   => $url . '3cr.png'
            )
        );
        $of_options[] = array("name" => __("Page Options", 'organicfood'),
            "desc" => "",
            "id" => "page_options",
            "std" => __("<h3>Page Options</h3>", 'organicfood'),
            "icon" => true,
            "type" => "info");
        $of_options[] = array( "name" => __("Show Comments Page", 'organicfood'),
            "desc" => __("Show Comments Page", 'organicfood'),
            "id" => "show_comments_page",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
/*Section Icon Font*/
        $of_options[] = array("name" => __("Icon Font", 'organicfood'),
            "type" => "heading"
        );
        $of_options[] = array("name" => __("Icon Font", 'organicfood'),
                "desc" => "",
                "id" => "icon_font",
                "std" => __("<h3>Icon Font</h3>", 'organicfood'),
                "icon" => true,
                "type" => "info");
        $of_options[] = array( "name" => __("Use Font Awesome", 'organicfood'),
            "desc" => __("Use Font Awesome.", 'organicfood'),
            "id" => "use_font_awesome",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
        $of_options[] = array( "name" => __("Use Font Ionicons", 'organicfood'),
            "desc" => __("Use Font Ionicons.", 'organicfood'),
            "id" => "use_font_ionicons",
            "std" => 1,
            "on" => "Yes",
            "off" => "No",
            "type" => "switch");
/*Section Custom CSS*/
        $of_options[] = array("name" => __("Custom CSS", 'organicfood'),
            "type" => "heading"
        );
        $of_options[] = array("name" => __("Custom CSS", 'organicfood'),
            "desc" => __("Quickly add some CSS to your theme by adding it to this block.", 'organicfood'),
            "id" => "custom_css",
            "std" => "",
            "type" => "textarea"
        );
/*Section Backup Options*/
        $of_options[] = array("name" => __("Backup Options", 'organicfood'),
            "type" => "heading",
            "icon" => ADMIN_IMAGES . "icon-slider.png"
        );
        $of_options[] = array("name" => __("Backup and Restore Options", 'organicfood'),
            "id" => "of_backup",
            "std" => "",
            "type" => "backup",
            "desc" => __('You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.', 'organicfood'),
        );

        $of_options[] = array("name" => __("Transfer Theme Options Data", 'organicfood'),
            "id" => "of_transfer",
            "std" => "",
            "type" => "transfer",
            "desc" => __('You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".', 'organicfood'),
        );

    }
}
?>
