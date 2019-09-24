	<section class="partial-inner-page-header opening">
		<div class="container">
			<div class="text">
				<h1><?php echo get_field('opening_heading');?></h1>
				<p><?php echo get_field('opening_text');?></p>
				<a class="btn" href="#demoRequest">Request a Demo</a>
				<?php if(get_field('opening_button_2_link_url')) { ?>
					<a class="btn second" href="<?php echo get_field('opening_button_2_link_url');?>"><?php echo get_field('opening_button_2_text');?></a>
				<?php } ?>
			</div>
			<div class="header-image">
				<img src="<?php the_post_thumbnail_url('full'); ?>" />
			</div>
		</div>
	</section>