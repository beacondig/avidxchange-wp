<?php
/**
 * Template Name: Page - Culture
 * Description: Used as a page template to show page Culture
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
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<div class="site-inner container">
        <div class="row center rowbottompadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('values_title'); ?></h2>
                <div class="separator"></div>
                <p class="intro"><?php the_field('values_intro'); ?></p>
                <div class="fourtyspacer"></div>
            </div>
            <div class="col-md-8 col-sm-8">
                <?php if( get_field('values_large_image') ): ?>
					<?php $va1img = get_field('values_large_image');
                    $size = 'large';
                    $v1img = wp_get_attachment_image_src($va1img, $size); ?>
                    <p><img src="<?php echo $v1img[0]; ?>" /></p>
                    <div class="twentyspacer"></div>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-4 medcrunch">
                <?php if( get_field('values_image_2') ): ?>
					<?php $va2img = get_field('values_image_2');
                    $size = 'medium';
                    $v2img = wp_get_attachment_image_src($va2img, $size); ?>
                    <p><img src="<?php echo $v2img[0]; ?>" /></p>
                    <div class="twentyspacer"></div>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-4 medcrunch">
                <?php if( get_field('values_image_3') ): ?>
					<?php $va3img = get_field('values_image_3');
                    $size = 'medium';
                    $v3img = wp_get_attachment_image_src($va3img, $size); ?>
                    <p><img src="<?php echo $v3img[0]; ?>" /></p>
                    <div class="twentyspacer"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid graybg">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('foundation_title'); ?></h2>
                		<div class="separator"></div>
                    <p class="intro"><?php the_field('foundation_intro'); ?></p>
                    <div class="twentyspacer"></div>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1">
                    <?php if( get_field('foundation_image_1') ): ?>
						<?php $fd1img = get_field('foundation_image_1');
                    	$size = 'medium';
                    	$f1img = wp_get_attachment_image_src($fd1img, $size); ?>
                        <p><img src="<?php echo $f1img[0]; ?>" /></p>
                        <div class="twentyspacer"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-5">
                    <?php if( get_field('foundation_image_2') ): ?>
						<?php $fd2img = get_field('foundation_image_2');
                    	$size = 'medium';
                    	$f2img = wp_get_attachment_image_src($fd2img, $size); ?>
                        <p><img src="<?php echo $f2img[0]; ?>" /></p>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <div><a class="secondarybutton largebutton" href="/about/avidfoundation/">Learn More About AvidFoundation</a></div>
                	<div class="fourtyspacer"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-inner container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('sports_title'); ?></h2>
                     <div class="separator"></div>
                <p class="intro"><?php the_field('sports_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <?php if( get_field('sports_image') ): ?>
					<?php $sp1img = get_field('sports_image');
                    	$size = 'large';
                    	$s1img = wp_get_attachment_image_src($sp1img, $size); ?>
                    <p><img src="<?php echo $s1img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
            	<div class="twentyspacer"></div>
                <div><a class="secondarybutton largebutton" href="/about/avidsports/">Learn More About AvidSports</a></div>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>