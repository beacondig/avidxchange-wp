jQuery(function() {
		
		function showImages(el) {
			var windowHeight = jQuery(window).height();
			jQuery(el).each(function() {
				var thisPos = jQuery(this).offset().top;
				var topOfWindow = jQuery(window).scrollTop();
				if(topOfWindow + windowHeight - 100 > thisPos) {
					jQuery(this).addClass('go');
				}
			});
		}
		showImages('.fadein');
		jQuery(window).scroll(function() {
			showImages('.fadein');
		});
		
		
		// BX Slider
		jQuery('.lp-spotlight ul').bxSlider({
			auto:false,
			infiniteLoop:true,
			nextSelector:'.lp-spotlight .next',
			prevSelector:'.lp-spotlight .prev',
			speed:1000,
			pager:false,
			randomStart:false, 
			nextText: '',
			prevText: '',
			hideControlOnEnd:false,
			touchEnabled:false,
			video:true,
			useCSS:false,
			useTransform:false,
			onSlideNext:function($slideElement, oldIndex, newIndex) {
				var iSrc = $slideElement.find('iframe').data('src');
				jQuery('.lp-spotlight ul').children().find('iframe').attr('src', '');
				$slideElement.find('iframe').attr('src', iSrc);
			},
			onSlidePrev:function($slideElement, oldIndex, newIndex) {
				var iSrc = $slideElement.find('iframe').data('src');
				jQuery('.lp-spotlight ul').children().find('iframe').attr('src', '');
				$slideElement.find('iframe').attr('src', iSrc);
			}
			
		});
		
		var loadFirst = jQuery('.lp-spotlight ul li:first-child').find('iframe').data('src');
		jQuery('.lp-spotlight ul li:first-child').find('iframe').attr('src', loadFirst);
		
		// Choices Mobile Slider
		jQuery('ul.choices-mobile').bxSlider({
			auto:false,
			infiniteLoop:true,
			contorls:false,
			speed:1000,
			pager:true,
			randomStart:false, 
			touchEnabled:false,
		});
		
		
		// demo form selects
		
		
		// Jump to target function
		jQuery('a[href^="#"]').on('click',function (e) {
			e.preventDefault();
			var target = this.hash,
			$target = jQuery(target);
			jQuery('html, body').stop().animate({
				'scrollTop': $target.offset().top - 83}, 900, 'swing', function () {
			});
		});
		
		// Choice Select
		jQuery('ul.choices li, ul.choices-mobile li').on('click', function() {
			var choiceImg = jQuery(this).find('img').attr('src');
			var choiceData = jQuery(this).data('info');
			var choiceHeading = jQuery(this).data('heading');
			var choiceInfo = '<div class="heading">'+choiceHeading+'</div>'+choiceData+'<a class="btn" href="#demoRequest">Let\'s Talk</a>';
			jQuery('.choices-info .choice-img img').attr('src', choiceImg);
			jQuery('.choice-info').html(choiceInfo);
			jQuery('.choices-info').addClass('open');
			$target = jQuery('.choices-info');
			jQuery('html, body').stop().animate({
				'scrollTop': $target.offset().top - 15}, 900, 'swing', function () {
			});
		});
		
});