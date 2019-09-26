<?php /*Template Name: About Template */ ?>
<?php get_header('new'); ?>
		<?php get_template_part('partials/content', 'inner-page-header'); ?>
		<section class="about-transform-companies">
			<div class="container">
				<h2><?php echo get_field('about_section_1_heading');?></h2>
				<p><?php echo get_field('about_section_1_intro_paragraph');?></p>
				<?php if(have_rows('about_section_1_items')): ?>
					<ul>
						<?php while(have_rows('about_section_1_items')): the_row();?>	
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
		<section class="about-locations">
			<div class="container">
				<div class="main-office">
					<div class="map">
						<?php
							$address = ''.get_field('about_corporate_street_address').' '.get_field('about_corporate_city').' '.get_field('about_corporate_state_letters').' '.get_field('about_corporate_zip_code').'';
							$address = rawurlencode(strtolower(str_replace(',','', $address)));
						?>
						<a href="https://maps.google.com/maps?q=<?php echo $address;?>" target="_blank">
							<img src="<?php echo get_field('about_corporate_office_map_image');?>" />
						</a>
					</div>
					<div class="office-info">
						<p>Corporate HQ</p>
						<p><?php echo get_field('about_corporate_street_address');?></p>
						<p><?php echo get_field('about_corporate_city');?>, <?php echo get_field('about_corporate_state_letters');?> <?php echo get_field('about_corporate_zip_code');?></p>
						<p class="phone"><a href="tel:+1<?php echo get_field('about_corporate_contact_phone_number');?>"><i class="fas fa-phone-alt"></i> <?php echo get_field('about_corporate_contact_phone_number');?></a></p>
					</div>
				</div>
				<?php if(have_rows('about_regional_offices')): ?>
					<ul>
						<?php while(have_rows('about_regional_offices')): the_row();?>	
							<?php
								$r_address = get_sub_field('office_street_address').' '.get_sub_field('office_city_name').' '.get_sub_field('office_state_letters').' '.get_sub_field('office_zip_code');
								$r_address = rawurlencode(strtolower(str_replace(',','', $r_address)));
							?>
							<li>
								<a href="https://maps.google.com/maps?q=<?php echo $r_address;?>" target="_blank">
									<div class="city-view">
										<img src="<?php echo the_sub_field('office_background_image');?>" />
										<div class="city-name"><?php echo the_sub_field('office_city_name');?>, <?php echo the_sub_field('office_state_letters');?></div>
									</div>
									<div class="city-info">
										<p><?php echo the_sub_field('office_title');?></p>
										<p><?php echo the_sub_field('office_street_address');?></p>
										<p><?php echo the_sub_field('office_city_name');?>, <?php echo the_sub_field('office_state_letters');?> <?php echo the_sub_field('office_zip_code');?></p>
									</div>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="about-press-room">
			<div class="container">
				<h2>Press Room</h2>
				<ul>
					<li>
						<div class="title">Title</div>
						<div class="date">October 1st, 2020</div>
						<p>Description dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<a href="#">Read More</a>
					</li>
					<li>
						<div class="title">Title</div>
						<div class="date">October 1st, 2020</div>
						<p>Description dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<a href="#">Read More</a>
					</li>
					<li>
						<div class="title">Title</div>
						<div class="date">October 1st, 2020</div>
						<p>Description dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
						<a href="#">Read More</a>
					</li>
				</ul>
				<a class="btn" href="#">Seel All News</a>
				<div class="about-leadership">
					<div class="leader-image"><img src="<?php echo get_field('about_leadership_team_image');?>" /></div>
					<div class="leader-info">
						<p><?php echo get_field('about_leadership_team_description');?></p>
						<div class="name"><?php echo get_field('about_leadership_team_name');?>,</div>
						<div class="position"><?php echo get_field('about_leadership_team_position');?></div>
						<a class="btn" href="<?php echo get_field('about_leadership_button_url');?>"><?php echo get_field('about_leadership_button_text');?></a>
					</div>
				</div>
			</div>
		</section>
		<section class="about-join">
			<div class="container">
				<h2><?php echo get_field('about_join_section_title');?></h2>
				<div class="about-flex">
					<div class="section-image"><img src="<?php echo get_field('about_join_image');?>" /></div>
					<div class="section-info">
						<p><?php echo get_field('about_join_description');?></p>
						<a class="btn" href="<?php echo get_field('about_join_button_url');?>"><?php echo get_field('about_join_button_text');?></a>
					</div>
				</div>
			</div>
		</section>
		<section class="about-foundation">
			<div class="container">
				<h2><?php echo get_field('about_foundation_section_title');?></h2>
					<div class="about-flex">
					<div class="section-info">
						<p><?php echo get_field('about_foundation_description');?></p>
						<a class="btn" href="<?php echo get_field('about_foundation_button_url');?>"><?php echo get_field('about_foundation_button_text');?></a>
					</div>
					<div class="section-image"><img src="<?php echo get_field('about_foundation_image');?>" /></div>
				</div>
			</div>
		</section>
		<?php get_template_part('partials/content', 'demo'); ?>
<?php get_footer('new'); ?>