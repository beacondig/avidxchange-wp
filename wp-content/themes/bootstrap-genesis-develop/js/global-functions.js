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
		jQuery('.mobile-nav .m-nav-container ul li.menu-item-has-children').on('touchstart',function(e) {
			e.preventDefault();
			if (jQuery(this).hasClass('tap')) {
				jQuery(this).removeClass('tap');
			}else{
				jQuery('.mobile-nav .m-nav-container ul li').each(function() {
					jQuery(this).removeClass('tap');
				});
				jQuery(this).addClass('tap');
				
			}
		});
		
		// Sticky menu functionality
		function moveScroller() {
			var move = function() {
				var st = jQuery(window).scrollTop();
				var ot = jQuery('.opening').height();
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