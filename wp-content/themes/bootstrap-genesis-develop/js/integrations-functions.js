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

jQuery(function ($) {
$(".integrations-wrapper .integration-item").hide();
$(".integrations-wrapper .integration-item").slice(0, 12).show();
$("#load-int").on('click', function (e) {
	e.preventDefault();
	$(".integrations-wrapper .integration-item:hidden").show();
	if ($(".integrations-wrapper .integration-item:hidden").length == 0) {
		$("#load-int").fadeOut('slow');
	}
});
});



jQuery(document).ready(function ($) {
if($('body').find('.bottom-design').length > 0 ){
	var nani = $(window).width();
	$('.bottom-design').css("border-right-width",nani+80);
	$('.bottom-design').css("border-top-width",((nani)/15));  
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
		$('.bottom-design').css("border-right-width",nani+80);  
		$('.bottom-design').css("border-top-width",((nani)/15));  
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

