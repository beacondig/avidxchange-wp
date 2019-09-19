(function($) {
	"use strict";
	$(window).load(function() {
		var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		/*-----------------------------------------------------------------------------------*/
		/*  Stick the Floating Bar to content
		/*-----------------------------------------------------------------------------------*/ 
		if ( $( '.crestaStickButtons' ).length && !mobileDetect ) {
			var elems = {};
			elems.window = $(window);
			elems.topHorizontal = $('.crestaStickButtons');
			var crestaDistanceLeft = parseInt(crestaSetting.distanceLeft);
			if(elems.topHorizontal.length > 0) {
				elems.vertical = $('#crestashareicon');
				if (elems.topHorizontal.length) {
					var verticalLeftOffset = (elems.window.width() / 2) - elems.topHorizontal.offset().left - elems.vertical.width() + crestaDistanceLeft;
					elems.vertical.css({ right: '50%', marginRight: verticalLeftOffset, top: elems.topHorizontal.offset().top });
				}
				elems.share = $("#crestashareicon");
				elems.bottomHorizontal = $('.crestaStickButtonsEnd');
				elems.share_holder = $("#crestashareicon");
				elems.crestaHeight = $('#crestashareicon').outerHeight();
				var d = elems.share.offset().top;
				var b = elems.bottomHorizontal.offset().top;
				var crestaDistance = parseInt(crestaSetting.distanceTop);
				$(window).scroll(function() {
					if ($(window).scrollTop() + crestaDistance >= d && $(window).scrollTop() <= b - crestaDistance - elems.crestaHeight) {
						elems.share_holder.addClass("crestaFixed");
					} else {
						elems.share_holder.removeClass("crestaFixed");
					}			
				});
			}
		}
	});
})(jQuery);