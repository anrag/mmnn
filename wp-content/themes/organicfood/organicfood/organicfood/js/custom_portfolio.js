(function($) { "use strict";
    var ajaxurl = ww_custom_portfolio_ajaxurl.url;
    var max_posts_per_page = ww_custom_portfolio.max_posts_per_page;
    var category = ww_custom_portfolio.category;
    var posts_per_page = ww_custom_portfolio.posts_per_page;
    var filter_item = jQuery('#ww_portfolio_filters a');
    var ww_portfolio = $('#ww_portfolio');
    var total_post = $('#ww-count-post-portfolio');
    var columns = ww_portfolio.attr('control-columns');
    var type = ww_portfolio.attr('control-type');
    var post_ids = '';
    var count_port = ww_portfolio.children('.ww-portfolio-item').length;

    var _p = {
        state: true,
        height: 0,
    }

    function post_id_has() {
        post_ids = '';
        if (ww_portfolio.children('.ww-portfolio-item').length == 0) {
            return;
        }
        ww_portfolio.children('.ww-portfolio-item').each(function() {
            var pid = $(this).attr('post-id');
            post_ids += pid + ',';
        })
        post_ids = post_ids += "@@";
        post_ids = post_ids.replace(',@@', '');
    }

    function set_style_onload() {
        if ($(window).width() >= 768) {
            if (columns == '2') {
                $('.ww-portfolio-col2 .ww-portfolio-item')
                        .css({'margin': '10px 1.2% 1.2% 1.2%', 'width': '47.5%'});
            }
            if (columns == '3') {
                $('.ww-portfolio-col3 .ww-portfolio-item')
                        .css({'margin': '10px 1.13% 1.13% 1.13%', 'width': '31%'});
            }
            if (columns == '4') {
                $('.ww-portfolio-col4 .ww-portfolio-item')
                        .css({'margin': '10px 1.11%', 'width': '22.7%'});
            }
            if (columns == '5') {
                $('.ww-portfolio-col5 .ww-portfolio-item')
                        .css({'width': '20%'});
            }
            if (type == 'grid') {
                ww_portfolio.isotope({
                    itemSelector: '.ww-portfolio-item',
                    layoutMode: 'fitRows'
                });
            } else if (type == 'masonry') {
                ww_portfolio.isotope({
                    itemSelector: '.ww-portfolio-item'
                });
            }
        }
        else {
            $('.ww-portfolio-item')
                    .css({width: '100%'});
        }
    }

    function choose_filter() {
        filter_item.unbind('click').bind('click', function(e) {
            e.preventDefault();
            var selector = jQuery(this).attr('data-filter');
            var max_items = jQuery(this).attr('max-items');
            ww_portfolio.isotope({
                filter: selector
            });
            jQuery(this).parents('ul').find('li').removeClass('active');
            jQuery(this).parent().addClass('active');

            // set parameter
            _p.height = ww_portfolio.offset().top + ww_portfolio.height();

            // hidden total
            total_post.fadeOut();

            // handle scroll load ajax
            $(window).trigger('scroll');

        })
    }

    function update_total_post(max_post, max_posts_per_page) {
        var filter_class = jQuery('#ww_portfolio_filters li.active a').attr('data-filter');
        var post_count = 0;
        var max = max_post;
        if (filter_class == "*") {
            post_count = ww_portfolio.children('.ww-portfolio-item').length;
        } else {
            post_count = ww_portfolio.children(filter_class).length;
        }

        if (max_posts_per_page != '-1') {
            var num_all_port = $('#ww_portfolio .ww-portfolio-item').length;
            var port_rest = max_posts_per_page - num_all_port + post_count;

            if (port_rest <= max_post) {
                max = port_rest;
            }
        }

        total_post.html(post_count + " / " + max);
    }

    function add_color_box_and_() {
        jQuery(".ww-portfolio-colorbox").colorbox({rel: 'ww-portfolio-colorbox', maxWidth: '700px', maxHeight: '700px'});
        jQuery('.ww-portfolio-style-2 .ww-portfolio-header').jmDeriction();
        jQuery('.ww-portfolio-button').hover(function() {
            var item_width = jQuery(this).parent().outerWidth();
            var item_height = jQuery(this).parent().outerHeight();
            var button_width = jQuery(this).outerWidth();
            var button_height = jQuery(this).outerHeight();

            var button = jQuery(this).position();
            var top = button.top;
            var left = button.left;
            var right = item_width - (button_width + button.left);
            var bottom = item_height - (button_height + button.top);

            if (top < 30 && right < 30) {
                jQuery('.ww-portfolio-style-2 [rel=tooltip]').tooltip({placement: 'left'});
            }
            if (top < 30 && left < 30) {
                jQuery('.ww-portfolio-style-2 [rel=tooltip]').tooltip({placement: 'right'});
            }
            if (bottom < 30 && left < 30 || bottom < 30 && right < 30) {
                jQuery('.ww-portfolio-style-2 [rel=tooltip]').tooltip({placement: 'top'});
            }
        });
    }

    function count_item_on_page(max_port, number_load_more, set_state) {
        if (max_port == '-1') {
            (set_state == true) ? _p.state = true : "";
            return number_load_more;
        }

        post_count = ww_portfolio.children('.ww-portfolio-item').length;
        if (post_count >= max_port) {
            _p.state = false;
            return;
        }

        var more = max_port - post_count,
                result_more = number_load_more;

        (more <= number_load_more) ? result_more = more : "";
        if (set_state == true) {
            (post_count >= max_port) ? _p.state = false : _p.state = true;
        }

        return result_more;
    }

    $(function() {
        add_color_box_and_();

        // filter
        choose_filter();

        // post id has
        post_id_has();
    })

    $(window).load(function() {
        set_style_onload();
        ww_portfolio.isotope({});

        // set parameter
        _p.height = ww_portfolio.offset().top + ww_portfolio.height();

        if (max_posts_per_page && count_port < max_posts_per_page || max_posts_per_page == -1) {
            $(this).scroll(function() {
                var scroll_top = $(this).scrollTop(),
                        w_height = $(this).height();

                if (_p.state == true && (scroll_top + w_height) >= _p.height) {
                    _p.state = false;
                    var cat_id = $('#ww_portfolio_filters .active a').attr('term-id');
                    (!cat_id) ? cat_id = category : "";
                    var posts = count_item_on_page(max_posts_per_page, posts_per_page, false);
                    var _data = ww_custom_portfolio;
                    _data.action = "get_items_portfolio";
                    _data.post_has = post_ids;
                    _data.category = cat_id;
                    _data.posts_per_page = posts;
                    _data.position_top = scroll_top + w_height;

                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: _data,
                        success: function(data) {
                            console.log(data);
                            var json_data = JSON.parse(data);
                            ww_portfolio.append(json_data.html);

                            set_style_onload();
                            ww_portfolio.isotope('reloadItems').isotope();

                            // check image load complete then re-function
                            ww_portfolio.imagesLoaded(function() {
                                ww_portfolio.isotope('reloadItems').isotope();

                                //
                                add_color_box_and_();

                                // update parameter
                                _p.height = ww_portfolio.offset().top + ww_portfolio.height();

                                //set parameter _p.state
                                count_item_on_page(max_posts_per_page, posts_per_page, true);

                                // update post has
                                post_id_has();

                                // update total post
                                update_total_post(json_data.count_max_post, max_posts_per_page);

                                // show total
                                (json_data.html != '') ? total_post.fadeIn() : "";

                            })
                        }
                    })
                }
            })
        }
    })

    jQuery(window).resize(function() {
        set_style_onload();
        _p.height = ww_portfolio.offset().top + ww_portfolio.height();
    });
})(jQuery);