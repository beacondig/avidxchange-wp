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
$(".integrations-wrapper .integration-item").slice(0, 4).show();
$("#load-int").on('click', function (e) {
	e.preventDefault();
	$(".integrations-wrapper .integration-item:hidden").slice(0, 4).show();
	if ($(".integrations-wrapper .integration-item:hidden").length == 0) {
		$("#load-int").fadeOut('slow');
	}
});
});
