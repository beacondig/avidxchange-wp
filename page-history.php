<?php
/**
 * Template Name: Page - History
 * Description: Used as a page template to show page Company History
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
<!--<div class="submenuholder"></div>-->
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

    <div class="site-inner">
        <div class="rowtoppadding">
            <?php $reo = 0;
			if( have_rows('milestone') ): 
                while ( have_rows('milestone') ) : the_row();?>
                	<div class="row historypadding historyline">
                	<?php if($reo == 0 ){
						$reo = 1; ?>
                        <div class="col-md-5 col-sm-5 taleft showsmall"><h6><?php the_sub_field('date'); ?></h6></div>
                        <div class="col-md-5 col-sm-5">
                        	<?php if(get_sub_field('type') == 'writeup') { ?>
                            	<div class="historybox">	
                                	<?php if(get_sub_field('title')) { ?>
                                    	<h6><?php the_sub_field('title'); ?></h6>
                                    <?php } ?>
                                    <div><?php the_sub_field('description'); ?></div>
                                    <?php if(get_sub_field('link')) { ?>
                                    	<div><a class="secondarybutton mediumbutton" href="<?php the_sub_field('link'); ?>">Read More</a></div>
                                    <?php } ?>
                                </div>
							<?php } elseif (get_sub_field('type') == 'photo') { ?>
								<?php $phimg = get_sub_field('photo');
									$size = 'medium';
									$pimg = wp_get_attachment_image_src($phimg, $size);
								?>
								<div class="center"><img src="<?php echo $pimg[0]; ?>" /></div>
							<?php } else { ?>
								<div>                                
                                <script src="//fast.wistia.com/embed/medias/<?php the_sub_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_sub_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                                </div>
							<?php } ?>
                        </div>
                        <div class="col-md-2 col-sm-2 center hidesmall"><img src="/wp-content/uploads/2016/10/historyX.gif" style="max-width:81px;" /></div>
                        <div class="col-md-5 col-sm-5 taleft hidesmall"><h6><?php the_sub_field('date'); ?></h6></div>
                        <div class="col-md-2 col-sm-2 center showsmall"><div class="linemobile"></div></div>
                        <div class="clearfix"></div>
                    <?php } else {
						$reo = 0; ?>
                        <div class="col-md-5 col-sm-5 taright"><h6><?php the_sub_field('date'); ?></h6></div>
                        <div class="col-md-2 col-sm-2 center hidesmall"><img src="/wp-content/uploads/2016/10/historyX.gif" style="max-width:81px;" /></div>
                        <div class="col-md-5 col-sm-5">
                        	<?php if(get_sub_field('type') == 'writeup') { ?>
                            	<div class="historybox">
                                	<?php if(get_sub_field('title')) { ?>
                                    	<h6><?php the_sub_field('title'); ?></h6>
                                    <?php } ?>
                                    <div><?php the_sub_field('description'); ?></div>
                                    <?php if(get_sub_field('link')) { ?>
                                    	<div><a class="secondarybutton mediumbutton" href="<?php the_sub_field('link'); ?>">Read More</a></div>
                                    <?php } ?>
                                </div>
							<?php } elseif (get_sub_field('type') == 'photo') { ?>
                            	<?php $phimg = get_sub_field('photo');
									$size = 'medium';
									$pimg = wp_get_attachment_image_src($phimg, $size);
								?>
								<div class="center"><img src="<?php echo $pimg[0]; ?>" /></div>
							<?php } else { ?>
								<div>
								<script src="//fast.wistia.com/embed/medias/<?php the_sub_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_sub_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                                </div>
							<?php } ?>
                        </div>
                        <div class="col-md-2 col-sm-2 center showsmall"><div class="linemobile"></div></div>
                        <div class="clearfix"></div>
					<?php } ?>
                    </div>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center">
        	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            	<h2><?php the_field('bottom_title'); ?></h2>
                     <div class="separator"></div>
                <p class="intro"><?php the_field('bottom_content'); ?></p>
                <div class="twentyspacer"></div>
                <div><div class="flexy"><a class="secondarybutton mediumbutton" style="margin:20px;" href="/careers/">Join the Team</a></div><div class="flexy"><a class="secondarybutton mediumbutton" style="margin:20px;" href="/partners/">Become a Partner</a></div><div class="flexy"><a class="secondarybutton mediumbutton" style="margin:20px;" href="/demo/">Become a Customer</a></div></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>