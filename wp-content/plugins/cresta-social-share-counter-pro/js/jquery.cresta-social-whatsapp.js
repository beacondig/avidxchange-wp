(function($) {
	"use strict";
	$(document).ready(function() {
		// Only Mobile Share Button
		if( /Android|webOS|iPhone|BlackBerry|Opera Mini/i.test(navigator.userAgent) ) {
			$('#crestashareiconincontent .whatsapp-cresta-share, #crestashareiconincontent .telegram-cresta-share').attr('style','display:block !important');
		}
	});
})(jQuery);