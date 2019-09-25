<?php /*Template Name: Integrations Template */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
<?php get_header('new'); ?>
		<?php get_template_part('partials/content', 'inner-page-header'); ?>
		<section class="integrations">
			<div class="container">
				<div class="left-side">
					<div class="intgmag"><i class="fa fa-search" aria-hidden="true"></i></div>
						<input type="text" id="intg-search-input" style="width:100%; padding:13px 13px 13px 47px; font-size:24px;" placeholder="Search 100+ integrations">
					</div>
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
				<div class="right-side">
				    <div id="content-sidebar-wrap">
						<div id="content" class="hfeed">
							<div class="site-inner container">
								<div class="row rowpaddingbottom integrations-wrapper">
									<?php $ict = 0;
									$modid = 1;
									while ( $loop->have_posts() ) : $loop->the_post(); ?>
										<div class="col-md-3 col-sm-4 integration-item threecrunch" data-letter="<?php echo strtoupper(substr(get_the_title(),0,1)); ?>" data-integration="<?php echo get_the_title(); ?>">
											<?php if(get_field('display_as_popup') == "yes"){ ?> 
												<a class="loopintg" data-toggle="modal" data-target="#pop<?php echo $modid; ?>" style="cursor:pointer;">
												<?php $modid++; ?>
											<?php } else { ?>
												<a class="loopintg" href="<?php the_permalink(); ?>">
											<?php } ?>
												<div class="intgbg">
													<?php if(get_field('avid_partner') == "yes") { ?>
														<div class="ibanner"><img width="235" src="/wp-content/uploads/bannergray.svg" /></div>
														<div class="ibanner ibtop"><img width="235" src="/wp-content/uploads/bannergreen.svg" /></div>
														<div class="ibannertext"><span style="color:#4a4a4a; font-size: 17px;">AvidXchange Partner</span></div>
														<div class="ibannertext ibtop"><span style="font-size: 17px;">AvidXchange Partner</span></div>
													<?php } ?>
													<div class="intgcover" style="background-color:transparent;opacity: 1;filter: alpha(opacity=100);color: #231f20;">
														<div class="vsp" style="padding-top:65%;">
															<div class="stsz">View Details&nbsp;&raquo;</div>
														</div>
													</div>
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