<?php /* Template Name: Industries */
get_header( 'new' );
?>
	<?php get_template_part('partials/content', 'inner-page-header'); ?>
	<section class="avid-industries">
		<div class="container">
			<h2><?php the_field( 'industries_heading' ); ?>Featured Industries</h2>
			<div class="desktop">
				<?php $pages = get_pages(array('parent'=>5851, 'sort_order'=>'ASC', 'sort_column'=>'menu_order'));?>
				<?php if (!empty($pages)): ?>
					<ul class="industries">
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
				<form role="search" method="get" id="searchform" class="form-inline searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="label" for="s"><?php the_field( 'search_label' ); ?></label>
					<div class="field">
						<div class="input-group">
							<input type="search" value="" name="s" class="form-control search-input" placeholder="<?php esc_attr_e( 'Search', 'avidxchange' ); ?>" />
						</div>
						<button type="submit" form="searchform" class="btn btn-primary search-submit">
							<?php esc_html_e( 'Search', 'avidxchange' ); ?>
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php get_template_part( 'partials/sections/section', 'request-demo' ); ?>
<?php get_footer( 'new' ); ?>
