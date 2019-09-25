<?php
/**
 * Template Name: Microsite - Resource Center 
 * Description: The resource center for the real estate microsite
 */
 ?>

<?php get_header(); ?>
</div>


<style>
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.micro-hero {
	position:relative;
	width:100%;
	min-height:700px;
	padding:100px 0 300px;
	color:#FFF;
	overflow-x:hidden;
	background: url('https://www.avidxchange.com/wp-content/uploads/2018/08/microsite-graphics-header-4.jpg');
	background-size:cover;
	background-position:center center;
}
	
</style>


<div class="container-fluid micro-hero">
	
					<div class="container">
						<div class="row">
							<div class="col-sm-5">
								<div class="cat-block hero-cat"><span>Upcoming Webinar</span></div>
								<h1 class="thin-title webinar-title"><?php the_field('webinar_name'); ?></h1>
								<p class="webinar-date"><?php the_field('webinar_date') ?> ET</p>
								<div class="twentyspacer"></div>
								<a class="ctabutton mediumbutton" href="<?php the_field('webinar_link'); ?>" title="<?php the_field('webinar_name'); ?>" target="_blank">Register for Webinar</a>
							</div>
							<div class="col-sm-6 col-sm-offset-1">
								<div class="hero-webinar-img">
								<?php $intimg = get_field('webinar_image');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img src="<?php echo $int1img[0]; ?>" />
								
								</div>
							</div>
						</div>
					</div>
																				   
				
<div class="micro-wave"></div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">	
	<div class="container int-padding">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 center">
				<h2 class="thin-title">Real Estate Resource Center</h2>
			</div>
		</div>
		<div class="fiftyspacer"></div>
		<div class="wrapper">
		<div class="masonry">
			<?php	// WP_Query arguments
				$args = array (
					'post_type'              => array( 'real_estate' ),
					'post_status'            => array( 'publish' ),
					'nopaging'               => true,
					'cat'                    => array( '257,255,254,253,252,259' ),
				);

					// The Query
				$realestate = new WP_Query( $args );

					// The Loop
				if ( $realestate->have_posts() ) { while ( $realestate->have_posts() ) { $realestate->the_post(); ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<div class="re-item">
						<div class="re-featured-image">
						<?php if ( has_post_thumbnail() ) : ?>
    						<?php the_post_thumbnail(); ?>
						<?php endif; ?>
						</div>
						<div class="re-item-content center">
						<div class="cat-block"><span><?php $categories = get_the_category();
                				$separator = ', ';
                				$output = '';
                			if ( ! empty( $categories ) ) {
                    			foreach( $categories as $category ) {
                        			$output .= esc_html( $category->name ) . $separator;
                    			}
                    		echo trim( $output, $separator );
							}?></span></div>
						<h2 class="thin-title"><?php the_title(); ?></h2>
						</div>
					</div>
					</a>
						
																				   
				<?php }
				} else {
					// no posts found
				}

				// Restore original Post Data
				wp_reset_postdata(); ?>
		</div>
		</div>
	</div>

	<div class="container-fluid micro-resource-bg">
	<div class="micro-wave-alt"></div>
	<div class="container">
		<div class="row re-cta-block">
			<div class="col-sm-8 col-sm-offset-2 center">
				<h3 class="thin-title">See AvidXchange for yourself and get the answers to all your tough questions.</h3>
				<p>Join over 6,500 midsize companies who won’t ever go back!</p>
				<div class="twentyspacer"></div>
				<a id="footerDemoBtn" title="Schedule a Demo" class="ctabutton mediumbutton" href="https://www.avidxchange.com/real-estate/demo/">Schedule a Demo</a>
			</div>
		</div>
	</div>
</div>
	

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>


<?php get_footer(); ?>