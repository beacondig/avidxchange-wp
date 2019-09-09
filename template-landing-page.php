<?php /*Template Name: Landing Page */ ?>
<?php get_header('lp'); ?>
		<section class="lp-split-plugin">
			<?php echo do_shortcode('[rev_slider alias="beforeafterslider-1"][/rev_slider]');?>
		</section>
		<section class="lp-intro" id="makeachoice">
			<div class="container">
				<div class="fadein">
					<?php echo get_field('opening_content');?>
					<a class="btn" href="#demoRequest">Let's Talk</a>
				</div>
			</div>
		</section>
		<section class="lp-choices">
			<div class="container">
				<div class="fadein">
					<h1>What Do You Hate Most About Manual AP?</h1>
					<?php if(have_rows('three_choices')): ?>
						<ul class="choices">
							<?php while(have_rows('three_choices')): the_row();?>
								<li data-heading="<?php echo the_sub_field('heading');?>" data-info="<?php echo the_sub_field('info_and_bullets');?>">
									<img src="<?php echo the_sub_field('image');?>" />
									<div class="title"><?php echo the_sub_field('title');?></div>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php if(have_rows('three_choices')): ?>
						<ul class="choices-mobile">
							<?php while(have_rows('three_choices')): the_row();?>
								<li data-heading="<?php echo the_sub_field('heading');?>" data-info="<?php echo the_sub_field('info_and_bullets');?>">
									<img src="<?php echo the_sub_field('image');?>" />
									<div class="title"><?php echo the_sub_field('title');?></div>
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
					<?php echo do_shortcode('[gravityform id=37 title=false description=false ajax=true tabindex=49]');?>
				</div>
			</div>
		</section>
		<section class="lp-spotlight">
			<div class="container">
				<div class="fadein">
					<h1>Customer Spotlight</h1>
					<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/right-arrow.png" /></div>
					<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/left-arrow.png" /></div>
					<ul>
						<li><iframe data-src="https://fast.wistia.net/embed/iframe/qgbxgg370o?seo=false&videoFoam=true" src="" title="AvidXchange Strongroom - Lead Inc. Video" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="background:url('<?php echo get_stylesheet_directory_uri();?>/img/video-background1.png') no-repeat;background-size:cover;background-position:center;"></iframe></li>
						<li><iframe data-src="https://fast.wistia.net/embed/iframe/t39v5txa12?seo=false&videoFoam=true" src="" title="AvidXchange Strongroom - KRJ Cares Video" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="background:url('<?php echo get_stylesheet_directory_uri();?>/img/video-background2.png') no-repeat;background-size:cover;background-position:center;"></iframe></li>
						<li><iframe data-src="https://fast.wistia.net/embed/iframe/7huv1z8nei?seo=false&videoFoam=true" src="" title="Testimonial: Colliers International - Marcel Williams Video" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="background:url('<?php echo get_stylesheet_directory_uri();?>/img/video-background3.png') no-repeat;background-size:cover;background-position:center;"></iframe></li>
					</ul>
				</div>
			</div>
		</section>
		<section class="lp-demo-form" id="demoRequest">
			<div class="container">
				<div class="fadein">
					<h1>Ready to Liberate Your Ap?</h1>
					<?php echo do_shortcode('[gravityform id=38 title=false description=false ajax=true tabindex=49]');?>
				</div>
			</div>
		</section>
<?php get_footer('lp'); ?>