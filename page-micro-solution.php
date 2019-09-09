<?php
/**
 * Template Name: Microsite - Solutions 
 * Description: The solutions page for the real estate microsite
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
	background:url('https://www.avidxchange.com/wp-content/uploads/2018/08/microsite-header-2.jpg');
	background-size:cover;
	background-position:center center;
}
	
</style>


<div class="container-fluid micro-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1><?php the_field('hero_title'); ?></h1>
				<p><?php the_field('hero_copy'); ?></p>
				<div class="twentyspacer"></div>
				<a id="heroDemoBtn" title="Schedule a Demo" class="ctabutton mediumbutton" href="https://www.avidxchange.com/real-estate/demo/">Schedule a Demo</a>
			</div>
		</div>
	</div>
<div class="resol-hero-img hidden-xs"></div>
<div class="micro-wave"></div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<div class="container">
		
		<?php $row = 1;
			
			if( have_rows('features') ): while ( have_rows('features') ) : the_row();?>
				<div class="row rowpadding prod-details">
					<?php if ( $row == 1 ) { ?>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
						<div class="col-md-6">
							<h3 class="thin-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
					<?php } elseif ( $row == 2 ) { ?>
						<div class="col-md-6">
							<h3 class="thin-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
					<?php } ?>
				</div>
			<?php if ($row==1) { $row++; } elseif ($row==2) {$row=1;}?>
			<?php endwhile; wp_reset_query();  ?>
        	<?php else :
             		// no rows found
            		endif;
     ?>
		
		
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
		<div class="row re-cta-block">
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