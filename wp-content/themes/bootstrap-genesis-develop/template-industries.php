<?php /* Template Name: Industries */ ?>
<?php $loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
<?php get_header( 'new' ); ?>
	<?php get_template_part('partials/content', 'inner-page-header'); ?>
	<section class="avid-industries">
		<div class="container">
			<h2><?php the_field( 'industries_title' ); ?></h2>
			<div class="desktop">
				<?php $pages = get_pages(array('parent'=>5851, 'sort_order'=>'ASC', 'sort_column'=>'menu_order'));?>
				<?php if (!empty($pages)): ?>
					<ul class="industries" style="justify-content: flex-start !important;">
						<?php foreach ($pages as $key => $page_item): ?>
							<li>
								<a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>">
									<div class="industry height-equal-width" style="background: url(<?php echo get_field('industry_preview_image', $page_item->ID);?>); background-size: cover;">
										<div class="overlay"></div>
										<h3 class="item-title"><?php echo get_field( 'industry_type', $page_item->ID); ?></h3>
									</div>
								</a>
							</li>
						<?php endforeach ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				<?php endif ?>	
			</div>
			<div class="mobile">
				<div class="next"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-right-arrow.png" /></div>
				<div class="prev"><img src="<?php echo get_stylesheet_directory_uri();?>/img/solutions/solutions-left-arrow.png" /></div>
				<?php $pages2 = get_pages(array('parent'=>5851, 'sort_order'=>'ASC', 'sort_column'=>'menu_order'));?>
				<?php if (!empty($pages2)): ?>
					<ul class="industries">
						<?php foreach ($pages2 as $key => $page_item): ?>
							<li>
								<a href="<?php echo esc_url(get_permalink($page_item->ID)); ?>">
									<div class="industry height-equal-width" style="background-image: url(<?php echo get_field('industry_preview_image', $page_item->ID);?>); background-size: cover;">
										<div class="overlay"></div>
										<h3 class="item-title"><?php echo get_field( 'industry_type', $page_item->ID); ?></h3>
									</div>
								</a>
							</li>
						<?php endforeach ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				<?php endif ?>	
			</div>
		</div>
	</section>
	<section class="section is-medium bottom-is-gapless avid-search">
		<div class="container">	
			<div class="searchbox">
				<h2 class="section-title"><?php the_field( 'search_title' ); ?></h2>
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
<div class="new-form-design new-form-design2">
	<?php get_template_part( 'partials/sections/section', 'request-demo' ); ?>
</div>
<?php get_footer( 'new' ); ?>
