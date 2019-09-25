<?php /*Template Name: Integrations Template */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
<?php get_header('new'); ?>
		<?php get_template_part('partials/content', 'inner-page-header'); ?>
		<section class="integrations">
			<div class="container">
				<div class="left-side">
					<div class="search-container">	
						<div class="search-title">Search</div>
						<div class="intgmag"><i class="fa fa-search" aria-hidden="true"></i></div>
						<input type="text" id="intg-search-input" />
						<div class="alphalist">
							<?php $intgArray = array(); 
							$intgLArray = array();
							$alphas = range('A', 'Z');
							?>
							<?php //$loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php
									$intgArray[] = get_the_title();
									$intgLArray[] = strtoupper(substr(get_the_title(),0,1));
								?>
							<?php endwhile; wp_reset_query();   ?>
							<a data-letter="ALL" class="alphachosen" >ALL</a>
							<?php foreach($alphas as $item) :
								if (in_array($item, $intgLArray)) {
									echo '<a id="allB" data-letter="'.$item.'" >'.$item.'</a> ';
								} else {
									echo '<span class="alphapad">'.$item.'</span> ';
								} 
							endforeach; wp_reset_postdata(); ?>
						</div>
					</div>
					<div class="a-container">
						<div class="a-image"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/sidebar-image@2x.png" /></div>
						<div class="title">Lorem Ipsum</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ullamco</p>
						<a class="btn" href="#">Learn More</a>
					</div>
				</div>
				<div class="right-side">
					<div class="slider-container">
						<ul class="featured">
							<li>
								<div class="featured-logo">
									<div class="banner">Featured</div>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/solutions/quickbooks-logo-black.png" />
								</div>
								<div class="featured-info">
									<div class="title">Intuit Quickbooks</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ullamco laboris nisi ut aliquip ex. ea commodo conseq. Duis aute irure dolor in rep rehenderit in vo</p>
									<a class="btn" href="#">Learn More</a>
								</div>
							</li>
							<li>
								<div class="featured-logo">
									<div class="banner">Featured</div>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/solutions/quickbooks-logo-black.png" />
								</div>
								<div class="featured-info">
									<div class="title">Intuit Quickbooks</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ullamco laboris nisi ut aliquip ex. ea commodo conseq. Duis aute irure dolor in rep rehenderit in vo</p>
									<a class="btn" href="#">Learn More</a>
								</div>
							</li>
							<li>
								<div class="featured-logo">
									<div class="banner">Featured</div>
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/solutions/quickbooks-logo-black.png" />
								</div>
								<div class="featured-info">
									<div class="title">Intuit Quickbooks</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incidi ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ullamco laboris nisi ut aliquip ex. ea commodo conseq. Duis aute irure dolor in rep rehenderit in vo</p>
									<a class="btn" href="#">Learn More</a>
								</div>
							</li>
						</ul>
						<div class="prev"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home/left-arrow-blue.png" /></div>
						<div class="next"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home/right-arrow-blue.png" /></div>
					</div>
				   <div id="content-sidebar-wrap">
						<div id="content" class="hfeed">
							<div class="integrations-wrapper">
								<?php $ict = 0;
								$modid = 1;
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<div class="integration-item threecrunch" data-letter="<?php echo strtoupper(substr(get_the_title(),0,1)); ?>" data-integration="<?php echo get_the_title(); ?>">
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
		<?php get_template_part('partials/content', 'demo'); ?>
<?php get_footer('new'); ?>