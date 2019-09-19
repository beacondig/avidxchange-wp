	<section class="partial-inner-page-header opening">
		<div class="container">
			<div class="text">
				<h1><?php echo get_field('opening_heading');?></h1>
				<p><?php echo get_field('opening_text');?></p>
				<a class="btn" href="#demoRequest">Request a Demo</a>
				<a class="btn second" href="#">Learn More</a>
			</div>
			<div class="header-image">
				<img src="<?php the_post_thumbnail_url('full'); ?>" />
			</div>
		</div>
	</section>