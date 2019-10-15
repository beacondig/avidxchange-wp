<?php /*Template Name: Solutions Template */ ?>
<?php get_header('new'); ?>
		<?php get_template_part('partials/content', 'inner-page-header'); ?>
		<section class="solutions-outdated-processes">
			<div class="container">
				<h2><?php echo get_field('processes_heading');?></h2>
				<?php if(have_rows('processes_items')): ?>
					<ul>
						<?php while(have_rows('processes_items')): the_row();?>
							<li>
								<div class="img-c"><img src="<?php echo the_sub_field('icon');?>" /></div>
								<div class="stat"><?php echo the_sub_field('stat');?></div>
								<p><?php echo the_sub_field('description');?></p>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="home-details selections-outer-wrap"> 
			<div class="b-container">
				<h2><?php echo get_field('solution_tabs_header01');?></h2>
				<div class="selections">
					<?php if(have_rows('homepage_automate_your_ap_items')): ?>
						<ul>
							<?php while(have_rows('homepage_automate_your_ap_items')): the_row();?>
								<li data-img="<?php echo the_sub_field('item_image');?>">
									<div class="heading"><?php echo the_sub_field('title');?></div>
									<div class="info">

										<h3><?php echo the_sub_field('content_title');?></h3>

										<?php if(have_rows('button_repeator')): ?>
										<ul>
										<?php while(have_rows('button_repeator')): the_row();?>
										    <li><?php echo the_sub_field('list_content');?></li>
										<?php endwhile; ?>
										</ul>
										<?php endif; ?>

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
																				<h3><?php echo the_sub_field('content_title');?></h3>

										<?php if(have_rows('button_repeator')): ?>
										<ul>
										<?php while(have_rows('button_repeator')): the_row();?>
										    <li><?php echo the_sub_field('list_content');?></li>
										<?php endwhile; ?>
										</ul>
										<?php endif; ?>

										<a href="<?php echo the_sub_field('learn_more_link');?>" class="link">Learn More <i class="fas fa-arrow-right"></i></a>
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<!--<section class="solutions-streamline">
			<div class="container">
				<?php //get_template_part('partials/content', 'tabs-module'); ?>
			</div>
		</section>-->
		<section class="solutions-find-success">
			<div class="container">
				<h2>Find Success With Avidxchange</h2>
				<?php if(have_rows('success_items')): ?>
					<ul>
						<?php while(have_rows('success_items')): the_row();?>	
							<li>
								<div class="video-container">
									<div class="video-spacer">
										<iframe src="<?php echo the_sub_field('wistia_video_iframe_url');?>" title="<?php echo the_sub_field('name');?> - <?php echo the_sub_field('position');?>" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" ></iframe>
									</div>
								</div>
								<div class="text">
									<div class="name"><?php echo the_sub_field('name');?></div>
									<div class="company"><?php echo the_sub_field('position');?></div>
									<p><?php echo the_sub_field('short_description');?></p>
									<?php if(get_field('button_link_url')) { ?>
										<a class="btn" href="<?php echo the_sub_field('button_link_url');?>"><?php echo the_sub_field('button_text');?></a>
									<?php } ?>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="solutions-accounting-systems">
			<div class="container">
				<h2>Accounting Systems Integrations</h2>
				<?php if(have_rows('solutions_accounting_systems_items')): ?>
					<ul>
						<?php while(have_rows('solutions_accounting_systems_items')): the_row();?>	
							<li>
								<a href="<?php echo the_sub_field('logo_page_link');?>">
									<img src="<?php echo the_sub_field('logo_image');?>" />
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<a class="btn" href="<?php echo get_page_link(6164);?>">View All </a>
			</div>
		</section>
		<section class="solutions-beginners-guide">
			<div class="container">
				<h2>Check Out Our Beginners Guide to AP Automation</h2>
				<p>Whether you are brand new to accounts payable or a long-time industry veteran, this guide contains useful insights to help you reach for industry-leading levels of productivity and cost-savings for your business. Check out the chapters below to start learning everything you need to know to become an AP guru.</p>
				<?php if(have_rows('solutions_guide_chapter_links')): ?>
					<?php $c = 1;?>
					<ul>
						<?php while(have_rows('solutions_guide_chapter_links')): the_row();?>	
							<li>
								<a href="<?php echo the_sub_field('chapter_link');?>">
									<div class="num"><?php echo $c;?></div>
									<div class="title"><?php echo the_sub_field('box_title');?></div>
								</a>
							</li>
							<?php $c++;?>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<?php get_template_part('partials/content', 'requestdemo'); ?>
<?php get_footer('new'); ?>