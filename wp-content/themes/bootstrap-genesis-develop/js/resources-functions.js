jQuery(function() {
		jQuery(window).on('load resize', function() {
			if (jQuery(window).width() <= 767) {
				var top_to_fix = $('.resource-top-blog-inner .row > .col-md-6:nth-child(1)').height();
				jQuery('.resource-top-blog ul.slick-dots').css('top', top_to_fix + 20);
			}
		});
		
		jQuery('.resource-top-blog .container').slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 8000,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 900,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});
		
		var filters = [];
	
		
		var page = 3;
		jQuery('body').on('click', '.loadmore', function() {
			var data = {
				'action': 'load_posts_by_ajax',
				'page': page,
				'cat_slug':jQuery.trim(filters.join('+')),
				'security': loadMoreSecurity
			};
			jQuery.post(ajaxurl, data, function(response) {
				if (response == "") {
					jQuery('.loadmore').hide();
				} else {
					var new_div = jQuery(response).hide();
					jQuery('.mix-post-inner').append(new_div);
					new_div.slideDown();
					page++;
				}
			});
		});
		
		jQuery('.filters select').on('change', function() {
			filters = [];
			page = 2;
			jQuery('.filters select').each(function() {
				var s = jQuery(this).children(':selected').data('filter');
				if(s != ' ') {
					filters.push(s);
				}
			});
			if(filters.length === 0) {
				jQuery('.mix-post-inner1.all').show();
				jQuery('.resource-top-blog').show();
				jQuery('.slick-dots li:nth-child(1) button').click();
				jQuery('.mix-post-inner .no-posts').hide();
				jQuery('.loadmore').show();
			}else{
				var data = {
					'action': 'filter_load',
					'cat_slug':jQuery.trim(filters.join('+')),
					'security': filterLoadSecurity
				};
				jQuery.post(ajaxurl, data, function(response) {
					if (response == "") {
						jQuery('.mix-post-inner1').hide(); 
						jQuery('.resource-top-blog').slideUp();
						jQuery('.mix-post-inner .no-posts').show();
						jQuery('.loadmore').hide();
					} else {
						jQuery('.resource-top-blog').slideUp();
						jQuery('.mix-post-inner1').hide(); 
						var new_div = jQuery(response).hide();
						jQuery('.mix-post-inner').append(new_div);
						new_div.slideDown();
						jQuery('.mix-post-inner .no-posts').hide();
						jQuery('.loadmore').hide();
					}
				});
			}
		});
		
		
	});