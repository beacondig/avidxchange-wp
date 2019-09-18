jQuery(function() {
		
		// Animate in form
		function displayForm() {
			jQuery('.home-opening .opening-demo-form').addClass('visible');
		};
		
		// Opening FadeIn
		window.onload  = setTimeout(displayForm, 1500);
		
		// Home Details click
		jQuery('.home-details .selections ul li').on('click', function() {
			var imgSrc = jQuery(this).data('img');
			jQuery('.home-details .selections ul li').removeClass('open');
			jQuery('.home-details .selection-image img').attr('src', imgSrc);
			jQuery(this).addClass('open');
		});
		
		jQuery('.home-details .selections ul li:first-child').click();
		
		// BX Slider Industries
		jQuery('.home-industries ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.home-industries .next',
			prevSelector:'.home-industries .prev',
			speed:1000,
			minSlides:3,
			maxSlides:5,
			moveSlides:1,
			shrinkItems:true,
			slideWidth:450,
			slideMargin:15,
			pager:false,
			randomStart:false, 
			nextText: '',
			prevText: '',
			hideControlOnEnd:false,
			touchEnabled:false,
			useCSS:false,
			useTransform:false
		});
		
		// Selections Mobile Slider
		jQuery('.home-details .mobile-selections ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			controls:false,
			speed:1000,
			pager:true,
			randomStart:false, 
			touchEnabled:false,
		});
		
		// BX Slider Testimonials
		jQuery('.home-testimonials ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.home-testimonials .next',
			prevSelector:'.home-testimonials .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			nextText: '',
			prevText: '',
			hideControlOnEnd:false,
			touchEnabled:true,
			useCSS:false,
			useTransform:false,
			onSliderLoad:function(currentIndex) {
				jQuery('.home-testimonials ul li').eq(currentIndex +1).addClass('active');
			},
			onSlideNext:function($slideElement, oldIndex, newIndex) {
				jQuery('.home-testimonials ul').children().removeClass('active');
				$slideElement.addClass('active');
			},
			onSlidePrev:function($slideElement, oldIndex, newIndex) {
				jQuery('.home-testimonials ul').children().removeClass('active');
				$slideElement.addClass('active');
			}
		});
		
		//jQuery('.home-testimonials ul li:first-child').addClass('active');
});