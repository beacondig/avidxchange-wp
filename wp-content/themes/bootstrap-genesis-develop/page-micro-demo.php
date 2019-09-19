<?php
/**
 * Template Name: Microsite - Demo Page
 * Description: The request a demo page for the real estate microsite
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
	
</style>


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
				<h1 class="thin-title re-cd-title">Why AvidXchange?</h1>
				<div class="twnetyspacer"></div>
				<p>16 years ago we believed that the midmarket was underserved in the payables space. We had a vision for a solution that would take the business processes that companies had in place in a paper-based environment, and create them in an automated environment that would give companies the visibility and controls that they needed to take their AP team to the next level. <strong>We now help over 6,000 midmarket companies receive, approve, and pay their invoices more efficiently.</strong></p>
				<p>We continue to innovate and evolve, because your needs evolve. While we were one of the first in this market, we intend to stay here by creating what’s next for payables. We do this by hiring top talent, and creating an environment that inspires innovation. We have a team of more than 800 people that make this possible every single day, and we’re growing all the time to continue to provide an exemplary level of service to our expanding customer base.</p>
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