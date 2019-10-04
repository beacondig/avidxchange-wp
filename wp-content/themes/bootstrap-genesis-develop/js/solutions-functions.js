jQuery(function() {
		
		// Solutions Tabs Change
		jQuery('.tabs-module ul.headers li').on('click', function() {
			var item = jQuery(this).data('item');
			jQuery('.tabs-module ul.headers li.active').removeClass('active');
			jQuery('.tabs-module ul.info li.active').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.tabs-module ul.info li.'+item).addClass('active');
		});
		
		// Streamline Mobile Slider
		jQuery('.tabs-module .mobile > ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.solutions-streamline .mobile .next',
			prevSelector:'.solutions-streamline .mobile .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			touchEnabled:false
		});
});