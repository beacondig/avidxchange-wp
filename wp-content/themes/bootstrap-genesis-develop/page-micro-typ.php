<?php
/**
 * Template Name: Microsite - Thank You Page
 * Description: The thank you page for the real estate microsite
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
	
	.demo-text {
		font-size:26px;
	}
	
	.re-cd-title {
		font-size:35px !important;
	}
	
</style>

<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('video_id'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video_id'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- video modal end -->


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="full-width-featured">
		<?php if ( has_post_thumbnail() ) : ?>
    		<?php the_post_thumbnail(); ?>
		<?php endif; ?>
	</div>
	
<div class="container-fluid re-cd-bg">
	
	<div class="container cd-block">
	
		<div class="row">
		
			<div class="col-sm-6">
				<h1 class="thin-title re-cd-title"><?php the_field('typ_title'); ?></h1>
				<?php if(( get_field('resource_type') == 'eBook' ) || (get_field('resource_type') == 'Whitepaper') || (get_field('resource_type') == 'Case Study')) { ?>
					<a id="downloadBtn" title="Download Asset" class="ctabutton mediumbutton" href="<?php the_field('content_file'); ?>" target="_blank">Download <?php the_field('resource_type'); ?></a>
				<?php } ?>
				<?php if(( get_field('resource_type') == 'On-Demand Webinar' ) || (get_field('resource_type') == 'Live Panel')) { ?>
					<a id="downloadBtn" title="Watch Webinar" class="ctabutton mediumbutton" data-toggle="modal" data-target="#myModal">Watch <?php the_field('resource_type'); ?></a>
				<?php } ?>
				
				<div class="twentyspacer"></div>
				<?php the_field('typ_content'); ?>
			</div>
			
			<div class="col-sm-5 col-sm-offset-1">
			
				<div class="re-form-block">
					<p class="demo-text">Schedule a free demo today!</p>
					<div class="re-hs-form">
						<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "430000",
	formId: "4dec9e51-cf5b-416d-9aab-574656c4bc45",
	sfdcCampaignId: "7011O000002PEpMQAW",
	target: ".re-hs-form"
});
</script>
					</div>
				
				</div>
			
			</div>
		
		</div>
		
		
	</div>
	
</div>
	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>


<?php get_footer(); ?>