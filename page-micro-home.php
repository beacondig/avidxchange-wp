<?php
/**
 * Template Name: Microsite - Home 
 * Description: The main homepage for the real estate microsite
 */
 ?>

<?php get_header(); ?>
</div>

<?php if( get_field('hero_bg') ): ?>
	<?php $bnimg = get_field('hero_bg');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>


<style>
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.micro-hero {
	background-image:url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	position:relative;
	width:100%;
	min-height:700px;
	padding:100px 0;
	color:#FFF;
	overflow-x:hidden;
	}
	
</style>

<div class="modal fade" id="demoModal1" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">

			
			<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
                portalId: "430000",
                formId: "4dec9e51-cf5b-416d-9aab-574656c4bc45",
                sfdcCampaignId: "7011O000002PEpMQAW",
	  			target: ".modal-body"
});
</script>
		
		
      </div>
    </div>
    
  </div>
</div>

<div class="container-fluid micro-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1><?php the_field('hero_title'); ?></h1>
				<p><?php the_field('hero_content'); ?></p>
				<div class="twentyspacer"></div>
				<a id="heroDemoBtn" title="Schedule a Demo" class="ctabutton mediumbutton" href="https://www.avidxchange.com/real-estate/demo/">Schedule a Demo</a>
			</div>
		</div>
	</div>
	<div class="hero-laptop hidden-xs"></div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	

	
					<a class="home-webinar-link" href="<?php the_field('webinar_link'); ?>" title="<?php the_field('webinar_name'); ?>" target="_blank">
						<div class="container-fluid micro-webinar-bar">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 center">
									<p><span class="event-bubble">Upcoming Webinar</span>&nbsp;&nbsp;&nbsp;<strong><?php the_field('webinar_name'); ?></strong></p>
								</div>
							</div>
						</div>	
					</div>
					</a>					
				
				
<div class="container-fluid micro-sol-bg">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h2 class="thin-title"><?php the_field('solution_title'); ?></h2>
				<?php $intimg = get_field('resol_image');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
					<img class="re-intlogo hidden-xs" src="<?php echo $int1img[0]; ?>" />
				<div class="twentyspacer"></div>
				<a id="solutionsBtn" title="AvidXchange Real Estate Solutions" class="secondarybutton mediumbutton" href="/real-estate/solutions/">Our Solutions</a>
			</div>
			<div class="col-sm-6 col-sm-offset-1">
				<?php if( have_rows('solutions') ): while ( have_rows('solutions') ) : the_row();?>
					<div class="row">
					<div class="col-sm-2">
						<?php $intimg = get_sub_field('solution_icon');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
						<img class="solIcon hidden-xs" src="<?php echo $int1img[0]; ?>" />
					</div>
					<div class="col-sm-10">
						<p class="sol-title"><?php the_sub_field('solutions_title'); ?></p>
						<p><?php the_sub_field('solutions_content'); ?></p>
					</div>
					</div>
					<div class="fiftyspacer"></div>
				<?php endwhile; wp_reset_query();  ?>
        	 	<?php else :
             		// no rows found
            	endif;
         	 	?>
			</div>
		</div>
	</div>
<div class="micro-wave"></div>
</div>
	<div class="container int-padding">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 center">
				<h2 class="thin-title"><?php the_field('int_title'); ?></h2>
				<a href="/integrations/" title="Real Estate Accounting Systems">View All Accounting System Partners <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
		<div class="row introw">
			<div class="col-md-10 col-md-offset-1">
				<?php $int = 1;
						
					if( have_rows('integrations') ): while ( have_rows('integrations') ) : the_row();?>
					
					<div class="col-sm-4">
						<?php $intimg = get_sub_field('int_image');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
						<a href="<?php the_sub_field('int_url'); ?>"><img class="re-intlogo" src="<?php echo $int1img[0]; ?>" /></a>
					</div>
					
					<?php if( $int == 3 ) { ?>
						<div class="clearfix"></div>
					<?php } ?>
					
				<?php $int++; ?>
             	<?php endwhile; wp_reset_query();  ?>
        	 	<?php else :
             		// no rows found
            	endif;
         	 	?>
			</div>
		</div>
	</div>
<div class="container-fluid micro-resource-bg">
	<div class="micro-wave-alt"></div>
	<div class="container">
		<div class="resource-content-block">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 center re-resource-center-title-block">
				<h2 class="thin-title"><?php the_field('resource_title'); ?></h2>
				<a href="/real-estate/resources/" title="Real Estate Resource Center">View All Resources <i class="fa fa-angle-double-right"></i></a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 center">
					<div class="wrapper">
					<div class="masonry">
			<?php	// WP_Query arguments
				$args = array (
					'posts_per_page'          => 4,
					'post_type'              => array( 'real_estate' ),
					'post_status'            => array( 'publish' ),
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
						<div class="re-item-content">
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
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 center">
				<h3 class="thin-title"><?php the_field('cta_title'); ?></h3>
				<p><?php the_field('cta_copy'); ?></p>
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