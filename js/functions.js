(function ($) {
	function init() {
		setupHeroImage();
		setupIndustriesHeight();

		window.addEventListener('resize', function () {
			setupIndustriesHeight();
		})
	}

	function setupHeroImage() {
		window.onload = setTimeout(function () {
			$('.avid-hero .hero-image').addClass('visible');
		}, 1500);
	}

	function setupIndustriesHeight() {
		$('.industries .industry').each(function (i, el) {
			var $el = $(el);
			$el.height($el.width() / 100 * 75);
		});
	}

	init();
})(jQuery);


























// Old script
jQuery(function () {
	// Sticky menu functionality
	function moveScroller() {
		var move = function () {
			var st = jQuery(window).scrollTop();
			var ot = jQuery('.avid-hero').height();
			var s = jQuery('.header-scroll');
			if (st >= ot) {
				s.addClass('active');
			} else {
				if (st < ot) {
					s.removeClass('active');
				}
			}
		};
		jQuery(window).scroll(move);
		move();
	}
	moveScroller();

	//Mobile Menu Functionailty
	jQuery('.navicon').on('click', function () {
		jQuery('.mobile-nav .m-nav-container').addClass('open');
	});

	jQuery('.mobile-close').on('click', function () {
		jQuery('.mobile-nav .m-nav-container').removeClass('open');
	});

	jQuery(document).mouseup(function (e) {
		var container = jQuery('.mobile-nav .m-nav-container.open');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			jQuery('.mobile-nav .m-nav-container').removeClass('open');
		}
	});

	jQuery(document).on('touchstart', function (e) {
		var container = jQuery('.mobile-nav .m-nav-container.open');
		if (!container.is(e.target) && container.has(e.target).length === 0) {
			jQuery('.mobile-nav .m-nav-container').removeClass('open');
		}
	});

});
