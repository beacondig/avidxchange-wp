jQuery(function() {
		
		// Solutions Tabs Change
		jQuery('.solutions-streamline ul.headers li').on('cilck', function() {
			alert('header clicked!');
			var item = jQuery(this).data('item');
			console.log(item);
			jQuery('.solutions-streamline ul.headers li.active').removeClass('active');
			jQuery('.solutions-streamline ul.info li.active').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.solutions-streamline ul.info li.'+item).addClass('active');
		});
		
		// Streamline Mobile Slider
		jQuery('.solutions-streamline .mobile > ul').bxSlider({
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