<?php
/**
 * Template Name: Page - Business Kit
 * Description: Used as a page template to show the free business kit page
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
	.noNewsSignup { display: block; }
	.yesNewsSignup { display: none; }
	.bcimgholder { min-height:331px; }
	.comp-title { min-height: 53px; }
</style>


<div class="biz-kit-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="biz-kit-title"><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_description'); ?></p>
				<div class="biz-kit-button hidden-xs">
					<a title="Download Business Kit Components" class="secondarybutton largebutton" href="#kit"><?php the_field('kit_btn_text'); ?> <i class="fa fa-chevron-down"></i></a>
				</div>
			</div>
			<div class="col-md-6 hidden-sm hidden-xs">
				<?php $banimg = get_field('banner_image');
    				  $size = 'full';
    				  $ban1img = wp_get_attachment_image_src($banimg, $size); ?>
				<img class="banner-image" src="<?php echo $ban1img[0]; ?>" />
			</div>
		</div>
	</div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<div id="kit" class="container-fluid graybg rowpadding">
	<div class="container">
		<div class="row">
			<?php $i=1; if( have_rows('components') ): while ( have_rows('components') ) : the_row();?>
			<div class="col-md-4 center comp-box-<?php echo $i; ?>">
					<?php $compimg = get_sub_field('comp_image');
    					  $size = 'full';
    					  $comp1img = wp_get_attachment_image_src($compimg, $size); ?>
					<div class="bcimgholder"><img class="comp-image" src="<?php echo $comp1img[0]; ?>" /></div>
					<h5 class="comp-special-title"><?php the_sub_field('comp_type'); ?></h5>
					<h3 class="comp-title"><?php the_sub_field('comp_title'); ?></h3>
					<p class="comp-desc"><?php the_sub_field('comp_desc');?></p>
					<div class="yesNewsSignup"><a id="ctnBtn<?php echo $i; ?>" target="_blank" title="Download Component" class="secondarybutton mediumbutton" href="<?php the_sub_field('comp_file'); ?>">Download</a></div>
					<div class="noNewsSignup"><div style="font-weight:500; font-size: 16px; margin-bottom: -9px;">Enter your email to download</div><?php echo do_shortcode('[gravityform id='.get_sub_field('gravity_form_id').' title=false description=false ajax=true tabindex=40]'); ?></div>
			</div>
			<?php $i++; endwhile; wp_reset_query();  ?>
        	 <?php else :
             		// no rows found
            	endif;
         	 ?>
		</div>
	</div>
	</div>
	
		<div class="container rowpadding">
			<div class="col-sm-12">
				<h2>Calculate Your ROI</h2>
				<div class="twentyspacer"></div>
				<?php echo do_shortcode('[gravityform id="23" title="false" description="false"]'); ?>
			</div>
		</div>
                                                                                                                                             	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
jQuery(document).ready(function($) {
	var x = readCookie('newsubcookie')
	if (x) { /* exists */
		$('.noNewsSignup').css('display','none');
		$('.yesNewsSignup').css('display','block');
	}
});
</script>
<?php get_footer(); ?>