<?php /*Template Name: Solutions Template */ ?>
<?php get_header('new'); ?>
		<?php get_template_part('partials/content', 'inner-page-header'); ?>
		<section class="solutions-outdated-processes">
			<div class="container">
				<h2>Outdated Processes Are Dragging Down Your Business</h2>
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
		<section class="solutions-streamline">
			<div class="container">
				<h2>Solutions That Help You Streamline</h2>
				<div class="desktop">
					<?php if(have_rows('solution_items')): ?>
						<ul class="headers">
							<?php $h = 1; ?>
							<?php while(have_rows('solution_items')): the_row();?>
								<?php if($h == 1) { ?>
									<li data-item="solution<?php echo $h;?>" class="active">Solution <?php echo $h;?></li>
								<?php }else{ ?>
									<li data-item="solution<?php echo $h;?>">Solution <?php echo $h;?></li>
								<?php } ?>
								<?php $h++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php if(have_rows('solution_items')): ?>
						<ul class="info">
							<?php $i = 1; ?>
							<?php while(have_rows('solution_items')): the_row();?>
								<?php if($i == 1) { ?>
									<li class="solution<?php echo $h;?> active">
										<div class="img-container">
											<img src="<?php echo the_sub_field('solution_image');?>" />
										</div>
										<div class="text">
											<div class="text-spacer">
												<div class="title"><?php echo the_sub_field('solution_title');?></div>
												<?php if(have_rows('solutions_bullets')): ?>
													<ul>
														<?php while(have_rows('solutions_bullets')): the_row();?>
															<li><?php echo the_sub_field('bullet');?></li>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
												<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
											</div>
										</div>
									</li>
								<?php }else{ ?>
									<li class="solution<?php echo $h;?>">
										<div class="img-container">
											<img src="<?php echo the_sub_field('solution_image');?>" />
										</div>
										<div class="text">
											<div class="text-spacer">
												<div class="title"><?php echo the_sub_field('solution_title');?></div>
												<?php if(have_rows('solutions_bullets')): ?>
													<ul>
														<?php while(have_rows('solutions_bullets')): the_row();?>
															<li><?php echo the_sub_field('bullet');?></li>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
												<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
											</div>
										</div>
									</li>
								<?php } ?>
								<?php $i++; ?>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
				<div class="mobile">
					<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-right-arrow.png" /></div>
					<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-left-arrow.png" /></div>
					<?php if(have_rows('solution_items')): ?>
						<ul>
								<li>
									<div class="img-container">
											<img src="<?php echo the_sub_field('solution_image');?>" />
										</div>
										<div class="text">
											<div class="text-spacer">
												<div class="title"><?php echo the_sub_field('solution_title');?></div>
												<?php if(have_rows('solutions_bullets')): ?>
													<ul>
														<?php while(have_rows('solutions_bullets')): the_row();?>
															<li><?php echo the_sub_field('bullet');?></li>
														<?php endwhile; ?>
													</ul>
												<?php endif; ?>
												<a class="btn" href="<?php echo the_sub_field('solution_link_url');?>"><?php echo the_sub_field('solution_link_button_text');?></a>
											</div>
										</div>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
		</section>
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
									<a class="btn" href="<?php echo the_sub_field('button_link_url');?>"><?php echo the_sub_field('button_text');?></a>
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
				<a class="btn" href="#">View All </a>
			</div>
		</section>
		<?php get_template_part('partials/content', 'demo'); ?>
<?php get_footer('new'); ?>