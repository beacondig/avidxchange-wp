jQuery(function() {
		// Featured Slider
		jQuery('ul.featured').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.slider-container .next',
			prevSelector:'.slider-container .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			touchEnabled:false
		});
		
		
});