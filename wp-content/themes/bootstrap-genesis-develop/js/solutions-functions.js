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

jQuery(document).ready(function ($) {
if($('body').find('.bottom-design').length > 0 ){
	var nani = $(window).width();
	$('.bottom-design').css("border-right-width",nani+50); 
	$('.bottom-design').css("border-top-width",((nani)/16));  
	if(nani>4000){
		$('.bottom-design').css("border-top-width",180); 
	}
	else if(nani>3000){
		$('.bottom-design').css("border-top-width",150); 
	}
	else if(nani>2000 && nani>1700){
		$('.bottom-design').css("border-top-width",130); 
	}
}
$(window).resize(function () {
	if($('body').find('.bottom-design').length > 0 ){
		var nani = $(window).width();
		$('.bottom-design').css("border-right-width",nani+50);  
		$('.bottom-design').css("border-top-width",((nani)/16));  
		if(nani>4000){
			$('.bottom-design').css("border-top-width",180); 
		}
		else if(nani>3000){
			$('.bottom-design').css("border-top-width",150); 
		}
		else if(nani>2000 && nani>1500){
			$('.bottom-design').css("border-top-width",130); 
		}
	}
});
}); 



jQuery(function() {
	// Home Details click
	jQuery('.home-details .selections>ul>li').on('click', function() {
		var imgSrc = jQuery(this).data('img');
		jQuery('.home-details .selections>ul>li').removeClass('open');
		jQuery('.home-details .selection-image img').css({'opacity':0, 'visibility':'hidden'});
		jQuery(this).addClass('open');
		setTimeout(function() {
			jQuery('.home-details .selection-image img').attr('src', imgSrc);
			jQuery('.home-details .selection-image img').css({'opacity':1, 'visibility':'visible'});
		}, 800);
	});
	
	jQuery('.home-details .selections>ul>li:first-child').click();
	
	// BX Slider Industries
	jQuery('.home-industries>ul').bxSlider({
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
	jQuery('.home-details .mobile-selections>ul').bxSlider({
		auto:false,
		infiniteLoop:true,
		controls:false,
		speed:1000,
		pager:true,
		randomStart:false, 
		touchEnabled:false,
	});
	
});
