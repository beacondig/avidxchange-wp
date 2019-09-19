<?php get_header(); ?>
</div>

<style>

.rsDefaultInv, .rsDefaultInv .rsOverflow, .rsDefaultInv .rsSlide, .rsDefaultInv .rsVideoFrameHolder, .rsDefaultInv .rsThumbs {
	background:#FFF;
	}

</style>
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

	<div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-6 col-sm-6" style="text-align:left;">
            	<h2 style="margin-top:0px;"><?php the_field('location_intro_title'); ?></h2>
            	<?php the_field('location_intro'); ?>
            	<div class="thirtyspacer"></div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-6 col-sm-6">
            	<h6 style="text-align:left;">Office Tour</h6>
            	<div>
				<script src="//fast.wistia.com/embed/medias/<?php the_field('video_url'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video_url'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <?php if( get_field('layout') == 'No' or get_field('layout') == '' ): ?>
            <div class="col-md-3 col-sm-6">
            	<h6 style="text-align:left;">Testimonials</h6>
            	<div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_1'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_1'); ?> videoFoam=true preload=auto videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_1_attribution'); ?></p>
                    </div>
                </div>
                <div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_2'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_2'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_2_attribution'); ?></p>
                    </div>
                </div>
                <div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_3'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_3'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_3_attribution'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-6">
            	<h6 style="text-align:left;">Photos</h6>
                <?php if( get_field('image_1') ): ?>
                    <?php $id1img = get_field('image_1');
                        $size = 'medium';
                        $i1img = wp_get_attachment_image_src($id1img, $size); ?>
                    <p><img src="<?php echo $i1img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-6">
            	<div class="vidpicsp"></div>
                <?php if( get_field('image_2') ): ?>
                    <?php $id2img = get_field('image_2');
                        $size = 'medium';
                        $i2img = wp_get_attachment_image_src($id2img, $size); ?>
                    <p><img src="<?php echo $i2img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-6">
                <?php if( get_field('image_3') ): ?>
                    <?php $id3img = get_field('image_3');
                        $size = 'medium';
                        $i3img = wp_get_attachment_image_src($id3img, $size); ?>
                    <p><img src="<?php echo $i3img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if( get_field('layout') == 'Yes' ): ?>
            	<div class="col-sm-12">
            		<h6 style="text-align:left;">Photos</h6>
            		<?php $slider = get_field('slider_id'); ?>
            		<?php echo get_new_royalslider($slider); ?>
            	</div>
            	<div class="clearfix"></div>
            	<h6 style="text-align:left;">Testimonials</h6>
            	<div class="col-sm-4">
            		<div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_1'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_1'); ?> videoFoam=true preload=auto videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_1_attribution'); ?></p>
                    </div>
                	</div>
            	</div>
            	<div class="col-sm-4">
            		<div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_2'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_2'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_2_attribution'); ?></p>
                    </div>
                	</div>
            	</div>
            	<div class="col-sm-4">
            		<div>
					<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('testimonial_video_3'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('testimonial_video_3'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="tenspacer"></div>
                    <div>
                        <p style="font-weight:500; font-size:16px;"><?php the_field('testimonial_3_attribution'); ?></p>
                    </div>
                	</div>
            	</div>
            <?php endif; ?>	
        </div>
    </div>
	
    <div class="container">
        <div class="row center rowbottompadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('other_offices_title'); ?></h2>
                    <div class="separator"></div>
            </div>
            <div class="clearfix"></div>
            <!-----   locations loop ---->
                <?php $curID = $post->ID; ?>
                <?php $loop = new WP_Query( array( 'post_type' => 'locations', 'post__not_in' => array($curID), 'posts_per_page' => -1 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-4 col-sm-6">
                    	<a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="locationsloopitem">
                                <div class="grid">
                                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>	
                                    </figure>
                                </div>
                                <div class="clearfix"></div>
                                <h6 style="font-size:24px; text-align:center;"><?php echo get_the_title(); ?></h6>
                            </div>
                         </a>
                         <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
        </div>
    </div>
    
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>