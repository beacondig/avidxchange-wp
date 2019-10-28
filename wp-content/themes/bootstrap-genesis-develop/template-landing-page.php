<?php /*Template Name: Landing Page */ ?>
<?php get_header('lp'); ?>
<section class="lp-split-plugin">
	<?php echo do_shortcode('[rev_slider alias="beforeafterslider-1"][/rev_slider]'); ?>
</section>
<section class="lp-intro" id="makeachoice">
	<div class="container">
		<div class="fadein">
			<?php echo get_field('opening_content'); ?>
			<a class="btn" href="#demoRequest">Let's Talk</a>
		</div>
	</div>
</section>
<section class="lp-choices">
	<div class="container">
		<div class="fadein">
			<h1>What Do You Hate Most About Manual AP?</h1>
			<?php if (have_rows('three_choices')) : ?>
				<ul class="choices">
					<?php while (have_rows('three_choices')) : the_row(); ?>
						<li data-heading="<?php echo the_sub_field('heading'); ?>" data-info="<?php echo the_sub_field('info_and_bullets'); ?>">
							<img src="<?php echo the_sub_field('image'); ?>" />
							<div class="title"><?php echo the_sub_field('title'); ?></div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			<?php if (have_rows('three_choices')) : ?>
				<ul class="choices-mobile">
					<?php while (have_rows('three_choices')) : the_row(); ?>
						<li data-heading="<?php echo the_sub_field('heading'); ?>" data-info="<?php echo the_sub_field('info_and_bullets'); ?>">
							<img src="<?php echo the_sub_field('image'); ?>" />
							<div class="title"><?php echo the_sub_field('title'); ?></div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
		<!-- Insert clicked info here -->
		<div class="choices-info">
			<div class="choice-img">
				<img src="" />
			</div>
			<div class="choice-info">
				&nbsp;
			</div>
		</div>
	</div>
</section>
<section class="lp-roi">
	<div class="container">
		<div class="fadein">
			<h1>Calculate Your Potential Savings With Avidxchange</h1>
			<p>Automating your AP saves dollars and days. Exactly how much? Enter your company's information below to get started.</p>
			<?php echo do_shortcode('[gravityform id=37 title=false description=false ajax=true tabindex=49]'); ?>
		</div>
	</div>
</section>
<section class="lp-spotlight">
	<div class="container">
		<div class="fadein">
			<h1>Customer Spotlight</h1>
			<script src="https://fast.wistia.com/embed/medias/a33ljkn9u0.jsonp" async></script>
			<script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
			<div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
				<div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
					<div class="wistia_embed wistia_async_a33ljkn9u0 videoFoam=true" style="height:100%;position:relative;width:100%">
						<div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/a33ljkn9u0/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="lp-demo-form" id="demoRequest">
	<div class="container">
		<div class="fadein">
			<h1>Ready to Liberate Your Ap?</h1>
			<?php echo do_shortcode('[gravityform id=38 title=false description=false ajax=true tabindex=49]'); ?>
		</div>
	</div>
</section>
<style>
	.wistia_responsive_padding {
		max-width: 900px;
		margin: 0 auto
	}
</style>
<?php get_footer('lp'); ?>