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
		<section class="solutions-streamline">
			<div class="container">
				<?php get_template_part('partials/content', 'tabs-module'); ?>
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
			<?php echo the_sub_field('solutions_beginners_guide_heading');?>
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