(function ($) {
	var $window = $(window);
	var $industriesList = $('.avid-industries .industries');

	function init() {
		setupHeroImage();
		checkIndustriesList();
		setupAvidTabs();

		window.addEventListener('load', function () {
			setTimeout(setupTestimonyVideos, 250);
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

	function setupAvidTabs() {
		$tabMenuLinks = $('.avid-tabs .tab-menu-item a');
		$tabContent = $('.avid-tabs .tab-content');
		$tabContentItems = $('.avid-tabs .tab-content-item');

		if (!$tabMenuLinks.length || !$tabContentItems.length) return;

		switchTab(getActiveLink());

		function getActiveLink() {
			var $activeMenu = $('.avid-tabs .tab-menu').find('is-active');
			var activeLink;

			if ($activeMenu.length) {
				activeLink = $activeMenu.find('a')[0];
			} else {
				activeLink = $tabMenuLinks[0];
			}

			return activeLink;
		}

		function getHashValue(link) {
			var href = link.href;
			var hash = href.substr(href.indexOf("#"));

			return hash.replace('#', '');
		}

		window.addEventListener('resize', function () {
			var hash = getHashValue(getActiveLink());
			var $activeTab = $tabContent.find('[data-id="' + hash + '"]');

			$tabContent.height($activeTab.height());
		});

		$tabMenuLinks.on('click', function (e) {
			e.preventDefault();
			switchTab(this);
		});

		function switchTab(link) {
			var hash = getHashValue(link);
			var $activeTab = $tabContent.find('[data-id="' + hash + '"]');

			$('.avid-tabs .tab-menu-item').removeClass('is-active');
			link.parentNode.classList.add('is-active');

			$tabContentItems.hide();
			$tabContent.height($activeTab.height());
			$activeTab.stop().fadeIn(500);
		}
	}

	init();
})(jQuery);
