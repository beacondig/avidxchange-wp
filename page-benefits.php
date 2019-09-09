<?php
/**
 * Template Name: Page - Benefits
 * Description: Used as a page template to show page Benefits
 */
 ?>

 <?php get_header(); ?>
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<div class="submenuholder"></div>
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<?php if( get_field('intro') ): ?>
	<div class="row rowspacer">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <?php if( get_field('intro') ): ?>
                <p><?php the_field('intro'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="row rowspacer">
        <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 medcrunchoffset">
			<?php if( get_field('image_1') ): ?>
				<?php $bn1img = get_field('image_1');
                    $size = 'medium';
                    $b1img = wp_get_attachment_image_src($bn1img, $size); ?>
                <p><img src="<?php echo $b1img[0]; ?>" /></p>
            <?php endif; ?>
        </div>
        <div class="col-md-4 col-sm-5 medcrunch">
			<?php if( get_field('image_2') ): ?>
				<?php $bn2img = get_field('image_2');
                    $size = 'medium';
                    $b2img = wp_get_attachment_image_src($bn2img, $size); ?>
                <p><img src="<?php echo $b2img[0]; ?>" /></p>
            <?php endif; ?>
        </div>
    </div>
    <?php if( get_field('outro') ): ?>
	<div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <?php if( get_field('outro') ): ?>
                <p><?php the_field('outro'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="sixtyspacer"></div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>