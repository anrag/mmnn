(function ($) { "use strict";
	/*client custom js*/
	if(typeof client_date != 'undefined'){
		var client_func_name='jmnewspro'+client_date.date;
		var client_func = new Function(
			 "return " + client_func_name + " = function(){}"
		)();
		client_func();
	}
	/*produce custom js*/
	if(typeof produce_date != 'undefined'){
		var produce_func_name='jmnewspro'+produce_date.date;
		var produce_func = new Function(
			 "return " + produce_func_name + " = function(){}"
		)();
		produce_func();
	}
	/*testimonial custom js
	if(typeof testimonial_var != 'undefined'){
			x = testimonial_var; delete x ;alert(typeof(x));
		var testimonial_func_name='jmnewspro'+testimonial_var.date;
		var testimonial_func = new Function(
			 "return " + testimonial_func_name + " = function(){ delete this.testimonial_var; alert(this.testimonial_var.date)}"
		)();
		testimonial_func();
	}*/
	/*post carousel custom js*/
	if(typeof postcarousel_var != 'undefined'){
		var postcarousel_func_name='jmnewspro'+postcarousel_var.date;
		var postcarousel_func = new Function(
			"return " + postcarousel_func_name + " = function(){\
				if((postcarousel_var.same_height==true)||(postcarousel_var.same_height==1)){\
					var biggestHeight = 0;\
					jQuery('#ww_carousel_post'+postcarousel_var.date+' article').each(function(){\
						if(jQuery(this).height() > biggestHeight){\
							biggestHeight = jQuery(this).height();\
						}\
					});\
					jQuery('#ww_carousel_post<?php echo $date; ?> article').height(biggestHeight);\
					jQuery('.gallery-style-1').colorbox();\
					jQuery('.colorbox').colorbox({rel:'colorbox'});\
				}\
			}"
		)();
		postcarousel_func();
	}
	/*post carousel 2 custom js*/
	if(typeof postcarousel_var2 != 'undefined'){
		var postcarousel_func_name2='jmnewspro'+postcarousel_var2.date;
		var postcarousel_func2 = new Function(
			"return " + postcarousel_func_name2 + " = function(){\
				if((postcarousel_var2.same_height==true)||(postcarousel_var2.same_height==1)){\
					var biggestHeight = 0;\
					jQuery('#ww_carousel_post'+postcarousel_var2.date+' article').each(function(){\
						if(jQuery(this).height() > biggestHeight){\
							biggestHeight = jQuery(this).height();\
						}\
					});\
					jQuery('#ww_carousel_post<?php echo $date; ?> article').height(biggestHeight);\
					jQuery('.gallery-style-2').colorbox();\
				}\
			}"
		)();
		postcarousel_func2();
	}
	/*post carousel 3 custom js*/
	if(typeof postcarousel_var3 != 'undefined'){
		var postcarousel_func_name3='jmnewspro'+postcarousel_var3.date;
		var postcarousel_func3 = new Function(
			"return " + postcarousel_func_name3 + " = function(){\
				if((postcarousel_var3.same_height==true)||(postcarousel_var3.same_height==1)){\
					var biggestHeight = 0;\
					jQuery('#ww_carousel_post'+postcarousel_var2.date+' article').each(function(){\
						if(jQuery(this).height() > biggestHeight){\
							biggestHeight = jQuery(this).height();\
						}\
					});\
					jQuery('#ww_carousel_post<?php echo $date; ?> article').height(biggestHeight);\
					jQuery('.gallery-style-3').colorbox();\
				}\
			}"
		)();
		postcarousel_func3();
	}
	/*event carousel custom js*/
	if(typeof eventcarousel_var != 'undefined'){
		var eventcarousel_func_name='jmnewspro'+eventcarousel_var.date;
		var eventcarousel_func = new Function(
			"return " + eventcarousel_func_name + " = function(){\
				if((eventcarousel_var.same_height==true)||(eventcarousel_var.same_height==1)){\
					var biggestHeight = 0;\
					jQuery('#ww_carousel_event'+eventcarousel_var.date+' article').each(function(){\
						if(jQuery(this).height() > biggestHeight){\
							biggestHeight = jQuery(this).height();\
						}\
					});\
					jQuery('#ww_carousel_event<?php echo $date; ?> article').height(biggestHeight);\
					jQuery('.gallery-style-1').colorbox();\
				}\
			}"
		)();
		eventcarousel_func();
	}
	/*twitter slider*/
	if(typeof twitter_slider !='undefined'){
		var slider = jQuery('#cs-latest-twitter'+twitter_slider.id_widget+' .tp_recent_tweets').bxSlider({
			mode: twitter_slider.transition,
			slideMargin: 5,
			auto: twitter_slider.auto,
			moveSlides:1,
			minSlides:twitter_slider.minslide,
			maxSlides:twitter_slider.minslide,
			autoHover:twitter_slider.pause,
			touchEnabled:twitter_slider.touch,
			speed:twitter_slider.tweetscroll,
			pause:twitter_slider.timeout,
			pager: false,
			controls: twitter_slider.showcontrol
		});
	}
})(jQuery);