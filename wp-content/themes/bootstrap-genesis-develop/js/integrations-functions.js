jQuery(function() {
		// Featured Slider
		jQuery('.slider-container.desktop ul.featured').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.slider-container.desktop .next',
			prevSelector:'.slider-container.desktop .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			touchEnabled:false
		});
		
		// Featured Slider Mobile
		jQuery('.slider-container.mobile ul.featured').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.slider-container.mobile .next',
			prevSelector:'.slider-container.mobile .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			touchEnabled:false
		});
		
		
});