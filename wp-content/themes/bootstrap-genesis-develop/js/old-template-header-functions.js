jQuery(function() {
		
	//Mobile Menu Functionailty
	jQuery('.navicon').on('click', function() {
		jQuery('.mobile-nav .m-nav-container').addClass('open');
	});
	
	jQuery('.mobile-close').on('click', function() {
		jQuery('.mobile-nav .m-nav-container').removeClass('open');
	});
	
	jQuery(document).mouseup(function (e) {
		var container = jQuery('.mobile-nav .m-nav-container.open');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			jQuery('.mobile-nav .m-nav-container').removeClass('open');
		}
	});

	jQuery(document).on('touchstart', function(e) {
		var container = jQuery('.mobile-nav .m-nav-container.open');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			jQuery('.mobile-nav .m-nav-container').removeClass('open');
		}
	});
	
	// Mobile Nav Touch Functionality
	jQuery('.mobile-nav .m-nav-container ul li a').on('touchstart',function(e) {
		e.preventDefault();
		var submenu = jQuery(this).parent('li').children('ul');
		if(submenu.length) {
			if (jQuery(this).parent('li').hasClass('tap')) {
				jQuery(this).parent('li').removeClass('tap');
			}else{
				jQuery('.mobile-nav .m-nav-container ul li').each(function() {
					jQuery(this).removeClass('tap');
				});
				jQuery(this).parent('li').addClass('tap');
			}
		}else{
			location.href = this.href;
		}
	});
	
	// Sticky menu functionality
	function moveScroller() {
		var move = function() {
			var st = jQuery(window).scrollTop();
			var ot;
			if(jQuery('.headerbluebg').length) {
				ot = jQuery('.headerbluebg').height();
			}else if(jQuery('.res-banner-in').length){
				ot = jQuery('.res-banner-in').height();
			}else if(jQuery('.res-banner-in').length){
				ot = jQuery('.res-banner-in').height();
			}else if(jQuery('.new-header-banner').length) {
				ot = jQuery('.new-header-banner').height();
			}else{
				ot = jQuery('.elementor-top-section').height();
			}
			var s = jQuery('.header-scroll'); 
			if(st >= ot) {
				s.addClass('active');
			} else {
				if(st < ot) {
					s.removeClass('active');
				}
			}
		};
		jQuery(window).scroll(move);
		move();
	}
	moveScroller();
	
	// Change out Logo
	if(jQuery('header').hasClass('light')) {
		jQuery('header.light .logo object').attr('data', 'https://avidxdev.wpengine.com/wp-content/uploads/color-logo.svg');
	}
	
	// Jump to target
	jQuery('a[href^="#"]').on('click',function (e) {
		e.preventDefault();
		var target = this.hash,
		$target = jQuery(target);
		jQuery('html, body').stop().animate({
			'scrollTop': $target.offset().top - 83}, 900, 'swing', function () {
		});
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

