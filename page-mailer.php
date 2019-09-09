<?php
/**
 * Template Name: Page - Direct Mail
 * Description: Used as a page template for the Customer Referral page
 */
 ?>

<?php get_header(); ?>
</div>

<?php $postid = get_the_ID(); ?>

<?php if( get_field('video_bg') ): ?>
	<?php $bnimg = get_field('video_bg');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>

<style>
	.video-bg {	
	      background-image: url("<?php echo $bn1img[0]; ?>");
	      background-size:cover;
	      Background-position:center center;
	      width:100%;
	      height:auto;
	      padding:50px 0;
    }
</style>

<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('quote_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('quote_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- video modal end -->

<?php if ( $postid == 4915 ) { ?>

<div class="container-fluid dm-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 center">
				<h1 class="dm-title"><?php the_field('dm_page_title'); ?></h1>
				<?php the_field('dm_hero_copy'); ?>
				<div class="twentyspacer"></div>
				<a title="Enroll Today" class="ctabutton mediumbutton roundedbtn" href="#enroll">Schedule Your Call Today</a>
			</div>
		</div>
	</div>
</div>


<?php } else { ?>

<div class="container-fluid dm-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1 class="dm-title"><?php the_field('dm_page_title'); ?></h1>
				<?php the_field('dm_hero_copy'); ?>
				<div class="twentyspacer"></div>
				<a title="Enroll Today" class="ctabutton mediumbutton roundedbtn" href="#enroll">Yes! I Want My $50 Gift Card</a>
			</div>
			<div class="col-sm-6 col-sm-offset-1 hidden-xs">
				<?php $intimg = get_field('hero_image');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="dm-hero-image" src="<?php echo $int1img[0]; ?>" />
			</div>
		</div>
	</div>
</div>

<?php } ?>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="container rowpadding">
		<div class="row">
			<div class="col-sm-6">
				<?php the_field('dm_lp_copy'); ?>
			</div>
			<div class="col-sm-5 col-sm-offset-1">
				<div id="enroll" class="re-form-block">
					<h4 class="dm-form-title thin-title"><?php the_field('form_title'); ?></h4>
					<div class="dm-form"><?php the_field('form'); ?></div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container-fluid video-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-sm-push-7">
					<div class="dm-test-box center">
						<p class="dm-test"><?php the_field('testimonial'); ?></p>
						<cite class="dm-cite"><?php the_field('cite'); ?></cite>
						<div class="twentyspacer"></div>
						<?php if ( $postid == 4883 ) { ?>
							<a title="View Case Study" class="secondarybutton mediumbutton" href="https://marketing.avidxchange.com/hubfs/York%20Properties%20Case%20Study.pdf" target="_blank">View Case Study</a>
						<?php } else { ?>
							<a title="Watch The Video" class="secondarybutton mediumbutton" data-toggle="modal" data-target="#myModal2">Watch The Video</a>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container rowpadding">
			<?php if ( $postid == 4883 ) { ?>
			<div class="row">
				<div class="col-sm-12">
					<h2>Additional Resources</h2>
					<?php
						$ids = array( 4901, 4172, 2924 ); 

						$args = array(
							'post_type' => 'resources',
   							'post__in' => $ids
						);

						$query = new WP_Query( $args ); 
					
						while ( $query->have_posts() ) : $query->the_post();
					?>
					
					<div class="col-md-4 col-sm-6 event eventhemup" data-event-id="<?php echo $crt; ?>" data-event-cat="<?php echo the_field('resource_type'); ?>" data-event-drop="<?php echo $post_categories; ?>">
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
                                <p class="credits"><p><?php the_field('mini_description'); ?>
                                
                                </p></p>
                        </div>
                    </a>
                    </div>
                    <div class="twentyspacer"></div>
                </div>
					
					<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>
			<?php } elseif ( $postid == 4915 ) { ?>
				<div class="row"></div>
			<?php } else { ?>
			<div class="row">
				<div class="col-sm-12">
					<h2>Calculate Your ROI</h2>
					<div class="twentyspacer"></div>
					<?php echo do_shortcode('[gravityform id="23" title="false" description="false"]'); ?>
				</div>
			</div>
			<?php } ?>
		</div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>