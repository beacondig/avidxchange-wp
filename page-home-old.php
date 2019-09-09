<?php
/**
 * Template Name: Page - Home Old
 * Description: Used as a page template to show page Home
 */
 ?>

<?php get_header(); ?>
</div>
<div class="headerhomebg">
<div class="container mobilesquish">
	<div class="col-md-8 col-sm-8 col-xs-12" style="padding-bottom:20px;">
        <h1 class="homeh1"><?php the_field('banner_text'); ?></h1>
        <div class="twentyspacer"></div>
        <a class="whitebutton largebutton" style="float:left; line-height:1;" href="<?php the_field('banner_learn_more_link'); ?>">Learn More</a>
        <div class="twentyspacer"></div>
    </div>
	<div class="col-md-4 col-sm-4 col-xs-12">
    	<p>homepage form goes here</p>
    </div>
</div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
    
    <div class="sixtyspacer"></div>
	<div class="site-inner container" style="margin-bottom:-30px;">
        <div class="row rowbottompadding">
            <div class="col-md-6 col-sm-6">
                <div>
                <script src="//fast.wistia.com/embed/medias/<?php the_field('ap_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('ap_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="fourtyspacer"></div>
                <div class="center"><a class="secondarybutton mediumbutton" style="line-height:1;" href="<?php the_field('learn_more_link'); ?>">Learn More</a></div>
                <div class="sixtyspacer"></div>
            </div>
        	<div class="col-md-6 col-sm-6 whatisapspacer">
                <h2><?php the_field('ap_title'); ?></h2>
                <p><?php the_field('ap_content'); ?></p>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="greenhometopsliver"></div>
    <div class="container-fluid homegreenbanner">
    	<div class="container">
            <div class="row center homegreenpadding">
                <div class="col-md-6 col-sm-6">
                <div><i class="fa fa-quote-left" aria-hidden="true" style="color: #ffffff; font-size:48px; padding-bottom:20px;"></i></div>
                    <p class="quote"><?php the_field('quote'); ?></p>
                    <div class="twentyspacer"></div>
                    <p><strong><?php the_field('quote_attribution_name'); ?></strong><br />
                    <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
                    <div class="fourtyspacer"></div>
                </div>
            	<div class="col-md-6 col-sm-6">
                    <div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('quote_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('quote_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="fourtyspacer"></div>
                	<div class="center"><a class="whiteogbutton mediumbutton" style="line-height:1;" href="<?php the_field('quote_learn_more_link'); ?>">Learn More</a></div>
                    <div class="twentyspacer"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="greenhomebottomsliver"></div>
    
    <div class="sixtyspacer"></div>
    <div class="site-inner container">
        <div class="row rowpadding">
            <div class="col-md-5 col-md-offset-1 col-sm-6 medcrunchoffset" style="text-align:right;">
            	<?php if( get_field('integrates_image') ): ?>
					<?php $ind2img = get_field('integrates_image');
                    $size = 'medium';
                    $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                	<p><img src="<?php echo $in2img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
        	<div class="col-md-5 col-sm-6">
            	<h2 style="font-weight:300; line-height:1.0;"><?php the_field('integrates_title'); ?></h2>
                <?php if(get_field('integrates_description')) : ?>
                	<div class="tenspacer"></div>
                	<div><?php the_field('integrates_description'); ?></div>
                <?php endif; ?>
                <div class="tenspacer"></div>
                <a class="secondarybutton mediumbutton" style="float:left; line-height:1;" href="<?php the_field('learn_more_link2'); ?>">Learn More</a>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    <div class="eightyspacer"></div>
    
    <div class="container-fluid homebluebanner">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('leaders_title'); ?></h2>
                    <div class="twentyspacer"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-10 col-md-offset-1 col-sm-12">
					<?php if( have_rows('leaders_images') ): 
                        while ( have_rows('leaders_images') ) : the_row();?>
                            <div style="display:inline-flex; display: -webkit-inline-flex; padding:30px 50px;">
                                <div>
                                    <?php if( get_sub_field('image') ): ?>
										<?php $liimg = get_sub_field('image');
                                        $size = 'three-column';
                                        $limg = wp_get_attachment_image_src($liimg, $size); ?>
                                        <p><img src="<?php echo $limg[0]; ?>" class="leadericons" /></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query();  ?>
                    <?php else :
                        // no rows found
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('news_title'); ?></h2>
                <div class="fiftyspacer"></div>
                <!-----   news loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-4 col-sm-6 medcrunch">
                    	<div style="max-width:320px; margin: auto;">
                    	<a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="newsloopitem">
                                <div class="grid">
                                    <figure class="effect-jazz">
                                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>
                                        <figcaption>
                                            <p><span class="whitehover">Read More</span></p>
                                        </figcaption>			
                                    </figure>
                                </div>
                                <div class="clearfix"></div>
                                <h6 style="font-size:18px;"><?php echo get_the_title(); ?></h6>
                                <?php /*?><p><?php the_excerpt(); ?></p><?php */?>
                                <div class="twentyspacer"></div>
                                <p class="credits">Posted on <?php echo get_the_date(); ?> <em>by <?php echo get_the_author_link(); ?></em></p>
                            </div>
                         </a>
                         </div>
                         <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/news/">See All News</a></div>
            </div>
                <div class="twentyspacer"></div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('resources_title'); ?></h2>
                <div class="fiftyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<div class="col-md-4 col-sm-6">
                    	<div style="max-width:320px; margin: auto;">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="resourceloopitem">
                                    <div class="grid">
                                        <figure class="effect-jazz">
                                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>
                                            <figcaption>
                                                <p><span class="whitehover">Read More</span></p>
                                            </figcaption>			
                                        </figure>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="fancyline2"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo the_field('resource_type'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                                    <h6 style="font-size:18px;"><?php echo the_title(); ?></h6>
                                    <p class="credits"><p><?php the_field('mini_description'); ?></p></p>
                            </div>
                        </a>
                        </div>
                        <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/resources/">View All Resources</a></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('grow_title'); ?></h2>
                <div class="fiftyspacer"></div>
                <?php if( get_field('grow_image') ): ?>
					<?php $lidimg = get_field('grow_image');
                    $size = 'large';
                    $lid3mg = wp_get_attachment_image_src($lidimg, $size); ?>
                    <p><img src="<?php echo $lid3mg[0]; ?>" /></p>
                <?php endif; ?>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>