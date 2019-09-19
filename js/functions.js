(function ($) {
	var $window = $(window);
	var $industriesList = $('.avid-industries .industries');

	function init() {
		setupHeroImage();
		checkIndustriesList();

		window.addEventListener('load', function () {
			setupTestimonyVideos();
		});

		window.addEventListener('resize', function () {
			checkIndustriesList();
		});
	}

	function setupHeroImage() {
		window.onload = setTimeout(function () {
			$('.avid-hero .hero-image').addClass('visible');
		}, 1500);
	}

	function checkIndustriesList() {
		if ($industriesList.hasClass('slick-initialized')) {
			$industriesList.slick('unslick');
		}

		setupIndustriesHeight();

		if ($window.width() < 992) {
			if (!$industriesList.hasClass('slick-initialized')) {
				setupIndustriesSlider();
			}
		}
	}

	function setupIndustriesHeight() {
		$('.industries .industry').each(function (i, el) {
			var $el = $(el);
			$el.height($el.width() / 100 * 75);
		});
	}

	function setupIndustriesSlider() {
		$industriesList.slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 4000,
			prevArrow: '<img alt="Prev" src="' + themeObj.themeUrl + '/img/arrow-left-blue.png" class="slick-prev">',
			nextArrow: '<img alt="Next" src="' + themeObj.themeUrl + '/img/arrow-right-blue.png" class="slick-next">'
		});
	}

	function setupTestimonyVideos() {
		$('.testimony-videos .videos').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: false,
			arrows: false,
			dots: true
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
