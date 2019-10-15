<?php /* Template Name: Industry Detail */?>
<?php get_header( 'new' ); ?>
		<section class="industry-detail-opening opening">
			<div class="container">
				<div class="type"><?php echo get_field('industry_type');?></div>
				<h1><?php echo get_field('industry_h1_title');?></h1>
			</div>
		</section>
		<section class="industry-detail-benefit-values">
			<div class="container">
				<h2><?php the_field( 'benefit_title' ); ?></h2>
				<p><?php the_field( 'benefit_description' ); ?></p>
				<?php if ( have_rows( 'benefit_values' ) ) : ?>
					<ul>
						<?php
						while ( have_rows( 'benefit_values' ) ) :
							the_row();
							?>
							<li>
								<div class="benefit">
									<img src="<?php the_sub_field( 'icon' ); ?>" alt="Icon" class="icon">
									<h3 class="item-title"><?php the_sub_field( 'title' ); ?></h3>
									<?php the_sub_field( 'description' ); ?>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="industry-detail-logos">
			<div class="container">	
				<h2><?php echo get_field('accounting_system_title');?></h2>
				<?php if(have_rows('accounting_system_logos')): ?>
					<ul>
						<?php while(have_rows('accounting_system_logos')): the_row();?>	
							<li><img src="<?php echo the_sub_field('logo');?>" /></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
				<a class="btn" href="<?php echo get_field('accounting_system_link_custom_url');?>"><?php echo get_field('accounting_system_link_text');?></a>
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

		<!--<section class="industry-detail-solutions solutions-streamline">
			<div class="container"> 
				<?php //get_template_part('partials/content', 'tabs-module'); ?>
			</div>
		</section>-->
		<section class="industry-detail-testimony-videos">
			<div class="container">
				<?php if ( have_rows( 'testimony_videos' ) ) : ?>
					<ul class="videos">
						<?php while ( have_rows( 'testimony_videos' ) ) : the_row(); ?>
							<li class="item">
								<iframe data-src="<?php echo the_sub_field('video_url');?>" title="AvidXchange" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen width="100%" height="100%" style="background:#404041;" ></iframe>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="industry-detail-customer-logos">
			<div class="container">
				<div class="pager-selector"></div>
				<h2 class="section-title is-white"><?php the_field( 'customers_title' ); ?></h2>
				<?php if ( have_rows( 'customers' ) ) : ?>
					<ul class="row customers">
						<?php
						while ( have_rows( 'customers' ) ) :
							the_row();
							$logo = get_sub_field( 'logo' );
							$logo = isset( $logo['sizes'] ) && isset( $logo['sizes']['medium'] ) ? $logo['sizes']['medium'] : '';
							?>
							<li>
								<div class="customer">
									<img alt="" src="<?php echo esc_url( $logo ); ?>" class="logo">
									<h3 class="item-title is-white"><?php the_sub_field( 'name' ); ?></h3>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</section>
		<section class="resource-post-outer">
			<div class="container"> 
				<div class="post-outer-wrap">
					<?php 
						$var_cat = get_field('post1_category_wrap');
						$var_read_min = get_field('post1_blog_read_mintute');
						$var_read_more = get_field('post1_button_text');
                		$category_id = get_cat_ID($var_cat);
						$counter1 = 0;
                		$catquery = new WP_Query( 'cat=' .$category_id. '&posts_per_page=1' );
                		while($catquery->have_posts()) : $catquery->the_post();
							if($counter1 == 0) { 
						?> 
								<div class="post-item-out">
									<div class="post-item-in">
										<div class="post-item-title"> 
											<h2><?php the_title(); ?></h2>
										</div>				
										<div class="post-item-content">
											<div class="post-cat-date">
												<?php $catObj = get_category_by_slug($var_cat);  ?>
												<p><?php echo $catName = $catObj->name; ?>, <?php echo $var_read_min;?>min</p>
											</div>
											<div class="line"></div>
											<?php $content = get_the_content(); ?>
											<?php preg_match('/^([^.!?\s]*[\.!?\s]+){0,30}/', strip_tags($content), $abstract);?>
											<p><?php echo $abstract[0] . '...'; ?></p>
											<div class="post-btn-link">
												<a href="<?php echo get_permalink($post->ID);?>"><?php echo $var_read_more; ?> ></a>
											</div>
										</div>
									</div>
								</div> 
								<?php $counter1= counter1 + 1; } ?>
						<?php endwhile; 		wp_reset_postdata();?>

						<?php 
							$var_cat2 = get_field('post2_category_wrap');
							$var_read_min2 = get_field('post2_blog_read_mintute');
							$var_read_more2 = get_field('post2_button_text');
							$category_id = get_cat_ID($var_cat2);
							$counter1 = 0;
							$catquery = new WP_Query( 'cat=' .$category_id. '&posts_per_page=1' );
							while($catquery->have_posts()) : $catquery->the_post();
								if($counter1 == 0) { 
						?> 
								<div class="post-item-out">
									<div class="post-item-in">
										<div class="post-item-title"> 
											<h2><?php the_title(); ?></h2>
										</div>				
										<div class="post-item-content">
											<div class="post-cat-date">
												<?php $catObj = get_category_by_slug($var_cat2);  ?>
												<p><?php echo $catName = $catObj->name; ?>, <?php echo $var_read_min2;?>min</p>
											</div>
											<div class="line"></div>
											<?php $content = get_the_content(); ?>
											<?php preg_match('/^([^.!?\s]*[\.!?\s]+){0,30}/', strip_tags($content), $abstract);?>
											<p><?php echo $abstract[0] . '...'; ?></p>
											<div class="post-btn-link">
												<a href="<?php echo get_permalink($post->ID);?>"><?php echo $var_read_more2; ?> ></a>
											</div>
										</div>
									</div>
								</div> 
								<?php $counter1= counter1 + 1; } ?>
							<?php endwhile; 		wp_reset_postdata();?>

							<?php 
								$var_cat3 = get_field('post3_category_wrap');
								$var_read_min3 = get_field('post3_blog_read_mintute');
								$var_read_more3 = get_field('post3_button_text');
								$category_id = get_cat_ID($var_cat3);
								$counter1 = 0;
								$catquery = new WP_Query( 'cat=' .$category_id. '&posts_per_page=1' );
								while($catquery->have_posts()) : $catquery->the_post();
									if($counter1 == 0) { 
							?> 
									<div class="post-item-out">
										<div class="post-item-in">
											<div class="post-item-title"> 
												<h2><?php the_title(); ?></h2>
											</div>				
											<div class="post-item-content">
												<div class="post-cat-date">
													<?php $catObj = get_category_by_slug($var_cat3);  ?>
													<p><?php echo $catName = $catObj->name; ?>, <?php echo $var_read_min3;?>min</p>
												</div>
												<div class="line"></div>
												<?php $content = get_the_content(); ?>
												<?php preg_match('/^([^.!?\s]*[\.!?\s]+){0,30}/', strip_tags($content), $abstract);?>
												<p><?php echo $abstract[0] . '...'; ?></p>
												<div class="post-btn-link">
													<a href="<?php echo get_permalink($post->ID);?>"><?php echo $var_read_more3; ?> ></a>
												</div>
											</div>
										</div>
									</div> 
									<?php $counter1= counter1 + 1; } ?>
								<?php endwhile; 		wp_reset_postdata();?>
							</div>
						</div>
		</section>

<div class="new-form-design">
		<?php get_template_part( 'partials/sections/section', 'request-demo' ); ?>
</div>
<?php get_footer( 'new' );?>