<?php
/**
 * Template Name: Page - Customer Referral
 * Description: Used as a page template for the Customer Referral page
 */
 ?>

<?php get_header(); ?>
</div>
<?php if( get_field('supp_hero_image') ): ?>
	<?php $bnimg = get_field('supp_hero_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>
<?php if( get_field('test_banner_image') ): ?>
	<?php $testimg = get_field('test_banner_image');
    $size = 'large-banner';
    $test1img = wp_get_attachment_image_src($testimg, $size); ?>
<?php endif; ?>

<style>
.supp-hero {	
	background-image:url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:left center;
	width:100%;
	height:auto;
	padding:100px 0;
	color:#FFF;
}
	
	.supp-title {
		font-size:32px !important;
	}
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.supp-serv-icon {
		width:35%;
		margin-bottom:15px;
	}
	
	.hbspt-form label {
	font-size:14px;
	color:#FFF;
	font-weight:300;
    }
	
	.hbspt-form input {
		margin-bottom:15px;
	}
	
	.hbspt-form legend {
		color:#eee;
		font-size:10px;
		font-style:italic;
		margin-bottom:5px;
		border-bottom:0px;
	}
	
	.hs-button {
		width:100%;
		margin-top:10px;
		background:#ff8a00;
		padding:8px;
		text-align:center;
		color:#FFF;
		border:0px;
		border-radius:5px;
		-moz-border-radius:5px;
		-webkit-border-radius:5px;
	}
	
	.hs-button:hover {
		background:#e86100;
	}
	
	.roundedbtn {
		border-radius:10px;
		-moz-border-radius:10px;
		-webkit-border-radius:10px;
	}
	
	.testimonialbg {	
	background-image: -webkit-linear-gradient(257deg, rgba(0,160,77,0.75) 0%, rgba(0,160,77,0.75) 100%), url("<?php echo $test1img[0]; ?>");
	background-image: linear-gradient(257deg, rgba(0,160,77,0.75) 0%,rgba(0,160,77,0.75) 100%), url("<?php echo $test1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:auto;
	color:#FFF;
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

<div class="container-fluid supp-hero">
	<div class="container">
		<div class="row center">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 class="supp-title"><?php the_field('supp_page_title'); ?></h1>
				<?php the_field('supp_hero_copy'); ?>
				<div class="twentyspacer"></div>
				<a title="Enroll Today" class="ctabutton mediumbutton roundedbtn" href="#enroll">Send My $20 Gift Card</a>	
			</div>
		</div>
	</div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	

	
<div class="container">
	
	<div class="row">
	
		<div class="col-sm-6">
			<div class="fiftyspacer"></div>
				<h3 class="supp-block-title"><?php the_field('supp_block_title'); ?></h3>
				<p><?php the_field('supp_block_copy'); ?></p>
			<div class="twentyspacer"></div>
			
				<?php
						
					if( have_rows('features') ): while ( have_rows('features') ) : the_row();?>
					<div class="row feat-icon-box">
					<div class="col-sm-4">
						<?php $intimg = get_sub_field('feature_icon');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
						<img class="supp-feat-icon" src="<?php echo $int1img[0]; ?>" />
					</div>
					<div class="col-sm-8">
						<div class="feat-text-box">
						<h5 class="supp-feat-title"><?php the_sub_field('supp_feat_title'); ?></h5>
						<?php the_sub_field('supp_feat_copy'); ?>
						</div>
					</div>
					</div>
			
             	<?php endwhile; wp_reset_query();  ?>
        	 	<?php else :
             		// no rows found
            	endif;
         	 	?>
			
		</div>
		
		<div class="col-sm-5 col-sm-offset-1">
		<div id="enroll" class="supp-form-block">
			<h3 class="supp-form-title"><?php the_field('supp_form_title'); ?></h3>
 <!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "430000",
	formId: "92d978d0-d8f4-4a88-87b6-4721ac7eea93",
	  css:""
});
</script>
		</div>
		</div>
		
	</div>
	

</div>
	
<div class="container-fluid testimonialbg testpadding">
	<div class="container center">
		<div class="row rowpadding">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="newquote"><?php the_field('quote'); ?></div>
				<div class="homeherovid"><a id="quoteBtn" data-toggle="modal" data-target="#myModal2"><i class="fa fa-play"></i></a></div>
				<div class="quotename"><?php the_field('quote_attribution'); ?></div>
				<div class="quotecompany"><?php the_field('quote_attribution_company'); ?></div>
			</div>
		</div>
	</div>
</div>


<div class="container-fluid graybg">
	<div class="container supp-service-padding center">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<h2>The possibilities are endless with accounts payable automation.</h2>
				<p>Automate your entire accounts payable process from purchase to pay and everything in between.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://2udm7l4frjjz47k5wg248qz0-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-01.png" />
				<p>With online access, 24 hours a day, 7 days a week you're never in the dark</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://2udm7l4frjjz47k5wg248qz0-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-02.png" />
				<p>A mobile friendly platform that works wherever and whenever you do</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/08/referral-lp-icons-09-1.png" />
				<p>Integrations with over 100 accounting systems</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-04.png" />
				<p>Reduce processing costs by 60% by eliminating manual tasks associated with paper-based processes</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://2udm7l4frjjz47k5wg248qz0-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-05.png" />
				<p>Increase fraud protection on 100% of payments with included ‘Positive Pay’</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/08/referral-lp-icons-08-1.png" />
				<p>Mirror your current invoice and payment approval processes and workflows, but without the inefficiency</p>
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