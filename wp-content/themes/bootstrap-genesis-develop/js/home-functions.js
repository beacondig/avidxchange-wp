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
			jQuery('.home-details .selection-image img').css({'opacity':0, 'visibility':'hidden'});
			jQuery(this).addClass('open');
			setTimeout(function() {
				jQuery('.home-details .selection-image img').attr('src', imgSrc);
				jQuery('.home-details .selection-image img').css({'opacity':1, 'visibility':'visible'});
			}, 800);
		});
		
		jQuery('.home-details .selections ul li:first-child').click();
		
		// BX Slider Industries
		jQuery('.home-industries ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			speed:200,
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
			mode:'fade',
			speed:300,
			infiniteLoop:true,
			nextSelector:'.home-testimonials .next',
			prevSelector:'.home-testimonials .prev',
			pager:false,
			randomStart:false, 
			nextText: '',
			prevText: '',
			hideControlOnEnd:false,
			touchEnabled:true,
			onSlideBefore:function($slideElement, oldIndex, newIndex) {
				var iSrc = $slideElement.find('iframe').data('src');
				jQuery('.home-testimonials ul').children().find('iframe').attr('src', '');
				$slideElement.find('iframe').attr('src', iSrc);
			}
		});
		
		var loadFirst = jQuery('.home-testimonials ul li:first-child').find('iframe').data('src');
		jQuery('.home-testimonials ul li:first-child').find('iframe').attr('src', loadFirst);
		
		//jQuery('.home-testimonials ul li:first-child').addClass('active');
});