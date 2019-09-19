<?php
/**
 * Template Name: Page - Cornerstone
 * Description: Used as a page template to show Cornerstone pieces
 */
 ?>

<?php get_header(); ?>
</div>

<?php if( get_field('hero_image') ): ?>
	<?php $bnimg = get_field('hero_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>

<style>
.cs-hero-bg {	
	background-image:url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:425px;
	padding:25px 0 0;
	margin-bottom:50px;
}
</style>

<div class="container-fluid cs-hero-bg">
	<div class="container">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<h1 class="cs-title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
<div class="container">
	
	<div class="row hidden-sm hidden-md hidden-lg center">
		<div class="col-xs-12">
			<?php echo do_shortcode('[cresta-social-share]'); ?>
		</div>
	</div>

	<div class="row">
		
		<div class="col-md-1 col-md-offset-1 cs-sidebar hidden-xs">
			
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Cornerstone Sidebar") ) : ?>
			<?php endif;?>
			
		</div>
		
		<div class="col-md-8 cs-content">
			
			<?php the_field("cornerstone_content"); ?>
		
		</div>
		
		
	</div>
	
	<div class="row hidden-sm hidden-md hidden-lg center">
		<div class="col-xs-12">
			<?php echo do_shortcode('[cresta-social-share]'); ?>
		</div>
	</div>

</div>


	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>