<?php /* Template Name: Homepage Page New */ ?>
<?php get_header('new'); ?>
		<section class="home-opening opening">
			<div class="opening-video">
				<video  poster="<?php echo get_stylesheet_directory_uri();?>/img/home/header_bg.png" height="480" width="100%" loop="true" autobuffer autoplay preload="auto" muted="true" src="<?php echo get_stylesheet_directory_uri();?>/img/home/home-video1920.mp4" type="video/mp4"></video>
			</div>
			<div class="opening-content">
				<div class="form-cut">
					<h1><?php echo get_field('opening_title');?></h1>
					<p><?php echo get_field('opening_description');?></p>
					<a class="btn" href="#demoRequest">Let's Talk</a>
					<?php if(get_field('opening_button_2_link_url')) { ?>
						<a class="btn second" href="<?php echo get_field('opening_button_2_link_url');?>"><?php echo get_field('opening_button_2_text');?></a>
					<?php } ?>
				</div>
			</div>
			<div class="opening-demo-form">
				<div class="heading">Focus On What Matters</div>
				<form action="#" method="post" id="homeDemo">
					<ul>
						<li>
							<input type="text" name="first_name" placeholder="First Name" />
						</li>
						<li>
							<input type="text" name="last_name" placeholder="Last Name" />
						</li>
						<li>
							<input type="email" name="email_address" placeholder="Email Address" />
						</li>
						<li>
							<input type="text" name="industry" placeholder="Industry" />
						</li>
						<li>
							<input type="submit" value="Let's Talk" />
						</li>
					</ul>
				</form>
			</div>
		</section>
		<section class="home-details">
			<div class="b-container">
				<div class="selections">
					<?php if(have_rows('homepage_automate_your_ap_items')): ?>
						<ul>
							<?php while(have_rows('homepage_automate_your_ap_items')): the_row();?>
								<li data-img="<?php echo the_sub_field('item_image');?>">
									<div class="heading"><?php echo the_sub_field('title');?></div>
									<div class="info">
										<p><?php echo the_sub_field('description');?></p>
										<a href="<?php echo the_sub_field('learn_more_link');?>" class="link">Learn More <i class="fas fa-arrow-right"></i></a>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="selection-image">
					<img src="<?php echo get_stylesheet_directory_uri();?>/img/home/browser.png" />
				</div>
				<div class="mobile-selections">
					<?php if(have_rows('homepage_automate_your_ap_items')): ?>
						<ul>
							<?php while(have_rows('homepage_automate_your_ap_items')): the_row();?>	
								<li>
									<img src="<?php echo the_sub_field('item_image');?>" />
									<div class="heading"><?php echo the_sub_field('title');?></div>
									<div class="info">
										<p><?php echo the_sub_field('description');?></p>
										<a href="<?php echo the_sub_field('learn_more_link');?>" class="link">Learn More <i class="fas fa-arrow-right"></i></a>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<section class="home-search">
			<div class="container">	
				<h2><?php echo get_field('homepage_accounting_systems_heading');?></h2>
				<?php if(have_rows('homepage_accounting_systems_logos')): ?>
					<ul>
						<?php while(have_rows('homepage_accounting_systems_logos')): the_row();?>	
							<li><img src="<?php echo the_sub_field('logo_image');?>" /></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<div class="searchbox">
					<div class="heading"><?php echo get_field('homepage_accounting_systems_search_heading');?></div>
					<form role="search" method="get" id="searchbox" action="<?php echo home_url( '/' ); ?>">
						<label>Enter Your Search Term Here<br />
							<input type="search" value="" name="s" />
						</label>
						<button type="submit" form="searchbox" class="search-submit">Search  <i class="fas fa-search"></i></button>
					</form>
				</div>
			</div>
		</section>
		<section class="home-industries">
			<h2>Transforming Industries</h2>
			<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/left-arrow-blue.png" /></div>
			<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/right-arrow-blue.png" /></div>
			<?php if(have_rows('transforming_industries_items')): ?>
				<ul>
					<?php while(have_rows('transforming_industries_items')): the_row();?>	
						<li>
							<div class="title"><?php echo the_sub_field('title');?></div>
							<img src="<?php echo the_sub_field('image');?>" />
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</section>
		<section class="home-new-study">
			<div class="container">
				<div class="close">X</div>
				<div class="title"><?php echo get_field('featured_article_title');?></div>
				<a class="btn" href="<?php echo get_field('featured_article_link');?>">Read More</a>
			</div>
		</section>
		<section class="home-testimonials">
			<div class="container">
				<?php if(have_rows('homepage_testimonials_items')): ?>
					<ul>
						<?php while(have_rows('homepage_testimonials_items')): the_row();?>	
							<li>
								<div class="img-container"><img src="<?php echo the_sub_field('testimonial_logo');?>" /></div>
								<div class="quote"><?php echo the_sub_field('testimonial_description');?>”</div>
								<div class="person">- <?php echo the_sub_field('testimonial_speaker');?></div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/left-arrow-green.png" /></div>
				<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/right-arrow-green.png" /></div>
			</div>
		</section>
		<?php get_template_part('partials/content', 'demo'); ?>
<?php get_footer('new'); ?>