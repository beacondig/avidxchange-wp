<?php /* Template Name: Homepage Page New */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
<?php get_header('new'); ?>
		<section class="home-opening opening">
			<div class="opening-video">
				<video height="480" width="100%" loop="true" autobuffer autoplay playsinline preload="auto" muted="true" src="<?php echo get_stylesheet_directory_uri();?>/img/home/home-video1920.mp4" type="video/mp4" style="background:#404041;"></video>
			</div>
			<div class="opening-content">
				<div class="form-cut">
					<h1><?php echo get_field('opening_title');?></h1>
					<p><?php echo get_field('opening_description');?></p>
					<a class="btn talk" href="#demoRequest">Let's Talk</a>
					<?php if(get_field('opening_button_2_link_url')) { ?>
						<a class="btn second" href="<?php echo get_field('opening_button_2_link_url');?>"><?php echo get_field('opening_button_2_text');?></a>
					<?php } ?>
				</div>
			</div>
			<div class="opening-demo-form">
				<div class="heading">Focus On What Matters</div>
				<?php echo do_shortcode('[gravityform id=41 title=false description=false ajax=true]');?>
			</div>
		</section>
		<section class="home-details">
			<div class="b-container">
				<h2>Automation = Liberation</h2>
				<p>Our software solutions completely automate your accounts payable and payment process, liberating your AP from the endless paper chase that’s eating up time and money and replacing it with a digital application that provides you with 24/7 on-demand access.</p>
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
				<p><?php echo get_field('homepage_accounting_systems_intro');?></p>
				<?php if(have_rows('homepage_accounting_systems_logos')): ?>
					<ul>
						<?php while(have_rows('homepage_accounting_systems_logos')): the_row();?>	
							<li><img src="<?php echo the_sub_field('logo_image');?>" /></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
				<div class="searchbox">
					<div class="heading"><?php echo get_field('homepage_accounting_systems_search_heading');?></div>
					<form role="search" method="get" id="searchbox" action="#">
						<label>Does AvidXchange integrate with…<br />
							<input type="search" value="" id="intg-search-input" />
						</label>
						<button type="button" class="search-submit" disabled>Search  <i class="fas fa-search"></i></button>
					</form>
					<div id="content-sidebar-wrap">
						<div id="content" class="hfeed">
							<div class="integrations-wrapper">
								<?php $ict = 0;
								$modid = 1;
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div class="integration-item" data-letter="<?php echo strtoupper(substr(get_the_title(),0,1)); ?>" data-integration="<?php echo get_the_title(); ?>" style="display:none;">
										<?php if(get_field('display_as_popup') == "yes"){ ?> 
											<a class="loopintg" data-toggle="modal" data-target="#pop<?php echo $modid; ?>" style="cursor:pointer;">
											<?php $modid++; ?>
										<?php } else { ?>
											<a class="loopintg" href="<?php the_permalink(); ?>">
										<?php } ?>
											<div class="intgbg">
												<div class="intgcover">
													<div class="vsp">
														<h5><?php echo get_the_title(); ?></h5>
														<div class="separatorsm"></div>
														<div class="stsz">View Details&nbsp;&raquo;</div>
													</div>
												</div>
												<div class="intimg">
													<?php $thumb_id = get_post_thumbnail_id();
													$thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
													echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
												</div>
											</div>
										</a>
										<div class="thirtyspacer"></div>
									</div>
									<?php $ict++; ?>
								<?php endwhile; wp_reset_query(); ?>
							</div>
<div class="show-all-integration"><a>see all integrations</a></div>
							<div class="container-fluid noresultsdiv hnores" style="margin:0px 0px 40px;">
								<div class="container" style="width:100%;">
									<div class="clearfix"></div>
										<div class="col-md-12 center">
											<div class="row">
												<p>Sorry, we couldn't find any accounting systems to match your search.</p>
												<p><a href="/contact/">Contact Us</a> today to see if we can help.</p>
											</div>
										</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/integrations_script.js';?>"></script>
				</div>
			</div>
		</section>
		<section class="home-industries">
			<h2><?php echo get_field('transforming_industries_header');?></h2>
			<p><?php echo get_field('transforming_industries_intro');?></p>
			<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/left-arrow-blue.png" /></div>
			<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/right-arrow-blue.png" /></div>
			<?php $pages = get_pages(array('parent'=>5851, 'sort_order'=>'ASC', 'sort_column'=>'menu_order'));?>
			<?php if (!empty($pages)): ?>
				<ul>
					<?php foreach ($pages as $key => $page_item): ?>
						<li>
							<a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>">
								<div class="title" ><?php echo get_field( 'industry_type', $page_item->ID); ?></div>
								<img src="<?php echo get_field('industry_preview_image', $page_item->ID);?>" />
							</a>
						</li>
					<?php endforeach ?>
					<?php wp_reset_postdata(); ?>
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
				<h2><?php echo get_field('homepage_testimonials_header');?></h2>
				<p><?php echo get_field('homepage_testimonials_intro');?></p>
				<?php if(have_rows('homepage_testimonials_items')): ?>
					<ul>
						<?php while(have_rows('homepage_testimonials_items')): the_row();?>	
							<li>
								<div class="video-container">
									<div class="video-spacer">
										<iframe data-src="<?php echo the_sub_field('testimonial_video');?>" title="AvidXchange" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" ></iframe>
									</div>
								</div>
								<div class="text-container">
									<div class="quote"><?php echo the_sub_field('testimonial_description');?>”</div>
									<div class="person">- <?php echo the_sub_field('testimonial_speaker');?> <?php if(the_sub_field('testimonial_speaker_company')) {?>, <?php echo the_sub_field('testimonial_speaker_company');}?></div>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/left-arrow-green.png" /></div>
				<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/home/right-arrow-green.png" /></div>
			</div>
		</section>
		<?php get_template_part('partials/content', 'requestdemo'); ?>
<?php get_footer('new'); ?>