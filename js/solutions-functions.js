jQuery(function() {
		
		// Solutions Tabs Change
		jQuery('.solutions-streamline ul.headers li').on('cilck', function() {
			var item = jQuery(this).data('item');
			console.log(item);
			jQuery('.solutions-streamline ul.headers li.active').removeClass('active');
			jQuery('.solutions-streamline ul.info li.active').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.solutions-streamline ul.info li.'+item).addClass('active');
		});
});