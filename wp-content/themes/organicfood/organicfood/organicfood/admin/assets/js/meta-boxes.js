(function ($) { "use strict";
	jQuery(document).ready(function($){
		$('#post-formats-select input').change(checkFormat);
		$('.wp-post-format-ui .post-format-options > a').click(checkFormat);
		function checkFormat(){
			var format = $('#post-formats-select input:checked').attr('value');
			if(typeof format != 'undefined'){
				if(format == 'gallery'){
					$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeIn(500);
				}
				else {
					$('#poststuff div[id$=slide][id^=post]').stop(true,true).fadeOut(500);
				}

				$('#post-body div[id^=iz-metabox-post-]').hide();
				$('#post-body #iz-metabox-post-'+format+'').stop(true,true).fadeIn(500);

				$('#iz-metabox-post-user-team').css('display', 'block');
			}
			else {
				var format = $(this).attr('data-wp-format');

				if( typeof format == 'undefined' && $('a[data-wp-format="gallery"]').hasClass('active')){
					format = $('a[data-wp-format="gallery"]').attr('data-wp-format');
				}

				if(typeof format != 'undefined'){
					if(format == 'gallery'){
						$('#iz-metabox-post-gallery').stop(true,true).fadeIn(500);

					}
					else {
						$('#iz-metabox-post-gallery').stop(true,true).fadeOut(500);
					}

					$('#iz-metabox-post-user-team').css('display', 'block');
				}
			}
		}
		$(window).load(function(){
			checkFormat();
		});
	});
})(jQuery);