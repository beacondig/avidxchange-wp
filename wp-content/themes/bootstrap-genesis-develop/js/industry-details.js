jQuery(function() {
		// Industry Video Slider
		jQuery('.industry-detail-testimony-videos ul').bxSlider({
			auto:false,
			infiniteLoop:false,
			controls:false,
			speed:1000,
			pager:(jQuery('.industry-detail-testimony-videos ul >li').length > 1) ? true:false,
			randomStart:false, 
			touchEnabled:false,
			video:true,
			pagerSelector:jQuery('.industry-detail-customer-logos .pager-selector'),
			onSlideBefore:function($slideElement, oldIndex, newIndex) {
				var iSrc = $slideElement.find('iframe').data('src');
				jQuery('.industry-detail-testimony-videos ul').children().find('iframe').attr('src', '');
				$slideElement.find('iframe').attr('src', iSrc);
				console.log('Slide Changed!');
			}
		});
		
		var loadFirst = jQuery('.industry-detail-testimony-videos ul li:first-child').find('iframe').data('src');
		jQuery('.industry-detail-testimony-videos ul li:first-child').find('iframe').attr('src', loadFirst);
		
		
		jQuery('.avid-industries .mobile ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			speed:200,
			nextSelector:'.avid-industries .mobile .next',
			prevSelector:'.avid-industries .mobile .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			nextText: '',
			prevText: '',
			hideControlOnEnd:false,
			touchEnabled:false,
			useCSS:false,
			useTransform:false
		});
		
		
		
});