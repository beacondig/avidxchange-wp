<?php /* Template Name: Resources 2 */ ?>
<?php get_header(); ?>
<?php get_template_part('partials/content', 'inner-page-header');?>
		<div class="filters">
			<div class="container">
				<div class="col-md-3 col-sm-3 resource-type">
					<span>Filter by Type:</span>
					<select>
						<option data-filter=" ">Show All</option>
						<option data-filter="webinars">Webinars</option>
						<option data-filter="product-info">Product Info</option>
						<option data-filter="short-videos">Short Videos</option>
						<option data-filter="ebook">eBooks</option>
						<option data-filter="whitepaper">Whitepapers</option>
						<option data-filter="testimonial">Testimonials</option>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 industry-type">
					<span>Filter by Industry:</span>
					<select>
						<option data-filter=" ">Show All</option>
						<?php
								$child_categories=get_categories(
									array( 'parent' => 22 )
								);
							?>
							<?php
								foreach ( $child_categories as $child ) {
									echo'<option data-filter="'.$child->category_nicename.'">'.$child->cat_name.'</option>';
								}
							?>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 topic">
					<span>Filter by Topic:</span>
					<select>
						<option data-filter=" ">Show All</option>
						<?php
								$child_categories=get_categories(
									array( 'parent' => 24)
								);
							?>
							<?php
								foreach ( $child_categories as $child ) {
									echo'<option data-filter="'.$child->category_nicename.'">'.$child->cat_name.'</option>';
								}
							?>
					</select>
				</div>
				<div class="col-md-3 col-sm-3 job-title">
					<span>Filter by Job Title:</span>
					<select>
						<option data-filter=" ">Show All</option>
						<?php
								$child_categories=get_categories(
									array( 'parent' => 26)
								);
							?>
							<?php
								foreach ( $child_categories as $child ) {
									echo'<option data-filter="'.$child->category_nicename.'">'.$child->cat_name.'</option>';
								}
							?>
					</select>
				</div>
			</div>
		</div>
		<div class="resource-top-blog">
			<div class="container">
				<?php
					// the query
					$wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 5)); 
					if ($wpb_all_query->have_posts()) : 
						while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); 
				?>
							<div class="resource-top-blog-inner">
								<div class="row">
									<div class="col-md-6 col-sm-6"><?php the_post_thumbnail();  ?></div>
									<div class="col-md-6 col-sm-6">
										<h5>Blog</h5>
										<h2><?php the_title(); ?></h2>
										<p><?php $content = get_the_content(); $content = strip_tags($content); echo substr($content, 0, 150); echo "..."; ?></p>
										<a href="<?php the_permalink(); ?>" class="learnmore">LEARN MORE</a>
										<a href="/blog" class="blog-link">See all Thought Leadership from AvidXchange <span>></span></a>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
			</div>
		</div>
		<div class="mix-post-outer resource-post-outer">
			<div class="container">
				<div class="mix-post-inner">
					<?php $counter = 0 ?>
					<?php $wp_query = new WP_Query(array('post_type' => 'resources', 'post_status' => 'publish', 'posts_per_page' => 5)); ?>
					<?php if ($wp_query->have_posts()) : ?>
						<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
							<?php if ($counter == 2) { ?>
								<div class="mix-post-inner1 all custom-post">
									<div class="custom-post-inner">
										<div class="telegram-image">
											<img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/10/telegram-icon.png">
										</div>
										<p>GET UPDATES FROM US TO YOUR INBOX </p>
										<a href="#demoRequest">Sign me Up</a>
									</div>
								</div>
							<?php } ?>
							<div class="mix-post-inner1 all <?php 
								$terms = get_the_terms($post->ID, 'category');
								$len = count($terms);
								foreach ($terms as $index => $term) {
									if ($index == $len - 1) {
										echo $term->slug . "  ";
									} else {
										echo $term->slug . " ";
									}
								} 
								?> resource-post-<?php echo $counter ?>">
								<div class="top-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>) !important;"></div>
								<div class="mix-post-inner-desc">
									<h2><?php echo get_the_title(); ?></h2>
									<p class="cat"> 
										<?php the_field('resource_type');?> | <?php the_time('F Y');?>
									</p>
									<p><?php the_field('mini_description'); ?></p>
									<a href="<?php the_permalink(); ?>" class="learnmore">READ MORE > </a>
								</div>
							</div>
							<?php $counter = $counter + 1; ?>
						<?php endwhile; ?><!-- end of the loop -->
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
					<?php endif; ?>
					<div class="no-posts" style="display:none;">No Resources Match the selected filters. Please try another option.</div>
				</div>
				<div class="loadmore-wrap loadmore-header-style">
					<a class="loadmore">VIEW MORE RESOURCES</a>
				</div>
			</div>
		</div>
		<div class="request-demo-out">
			<div class="bottom-design"></div>
			<section class="section request-demo" id="demoRequest">
				<div class="container">
					<h2 class="section-title is-white has-smaller-gap center">GET UPDATES FROM US TO YOUR INBOX</h2>
					<div class="form-outer-wrap">
						<?php echo do_shortcode('[gravityform id="39" title="true" description="true"]'); ?>
					</div>
				</div>
			</section>
		</div>
		<script> 
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>"; 
			var loadMoreSecurity = '<?php echo wp_create_nonce("load_more_posts"); ?>';
			var filterLoadSecurity = '<?php echo wp_create_nonce("filter_load"); ?>';
		</script>
<?php get_footer(); ?>