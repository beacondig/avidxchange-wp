<?php
/**
 * Template Name: Page - Calculator
 * Description: Used as a page template to show page ROI Calculator
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
<div class="site-inner">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="container">
        <div class="row rowbottompadding">
            <div class="col-sm-10 col-sm-offset-1 center"><br>
                <p><?php the_field('calc_description'); ?></p>
            </div>
            <div class="clearfix"></div>
        </div>
		<div class="row">
			<div class="col-sm-12 center">
				<?php echo do_shortcode('[gravityform id="23" title="false" description="false"]'); ?>
			</div>
		</div>
    </div>
    
    <div class="container-fluid" style="background-color:#f6f6f6;">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="quoteleft" style="color:#1e95d3;"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                <div class="sixtyspacer"></div>
                <p class="quote"><?php the_field('quote'); ?></p>
                <div class="twentyspacer"></div>
                <p><strong style="color:#00a04d;"><?php the_field('quote_attribution_name'); ?></strong><br />
                <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    <div class="sixtyspacer"></div>
    <div class="site-inner container">
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
            	<h2>Related Resources</h2>
                <div class="twentyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => 3, 'order' => 'DESC', 'meta_key' => 'resource_type' ) ); ?>
				<?php $cweb = 0; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $cweb = 1;
					$category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<div class="col-md-4 col-sm-6 otherheights" style="padding-left:0px; padding-right:0px;">
                    	<div style="max-width:320px; margin: auto;">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="resourceloopitem" style="min-height:570px;">
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
                <?php if($cweb == 0) { ?><em>There are no upcoming webinars</em><?php } ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/resources/">View All Resources</a></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>