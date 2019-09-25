<?php
/**
 * Template Name: Page - Acquisitions
 * Description: Page template for any company acquisition pages
 */
 ?>

<?php get_header(); ?>
</div>

<?php if( get_field('hero_bg') ): ?>
	<?php $bnimg = get_field('hero_bg');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>

<style>
	.acq-hero {	
	background-image: -webkit-linear-gradient(257deg, rgba(8,112,166,0.85) 0%, rgba(0,78,116,0.85) 100%), url("<?php echo $bn1img[0]; ?>");
	background-image: linear-gradient(257deg, rgba(8,112,166,0.85) 0%, rgba(0,78,116,0.85) 100%), url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:auto;
	padding:100px 0;
}
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.nav-tabs > li {
		float:none;
		display:inline-block;
		margin:0 auto 50px;
	}
	
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
		font-weight:500;
		color:#1e95d3;
		border-bottom:3px solid #1e95d3;
		border-right:none;
		border-left:none;
		border-top:none;
	}
	
	.nav-tabs > li > a {
		color:#555;
	}
	
	.nav-tabs > li > a:hover {
		color:#1e95d3;
		border:none;
	}
	
	.nav-tabs > li:hover > a {
		background:transparent;
		border-bottom:3px solid #1e95d3;
		border-right:none;
		border-left:none;
		border-top:none;
	} 
	
	.nav-tabs {
		border:none;
		text-align:center;
	}
	
	.nav-tabs:before {
		content:'';
		display:block;
		width:100vw;
		height:3px;
		background-color:rgba(0,0,0,0.1);
		position:absolute;
		margin-top:46px;
		left:calc((975px - 100vw)/2);
		float:left;
	}
	
	@media (max-width: 480px) {
		.nav-tabs > li > a {
			font-size:14px;
		}
		
		.nav > li > a {
			padding:10px 3px;
		}
		
		.nav-tabs:before {
			left:calc((375px - 100vw)/2);
			margin-top:41px;
		}
		
		.diamond-block blockquote {
			font-size:18px;
		}
	}
</style>

<div class="modal fade" id="demoModal1" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->

<div class="acq-hero">
	<div class="container">
		<div class="row center">
			<div class="col-sm-6 col-sm-offset-3">
				<?php $intimg = get_field('acq_logo');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="acq-logo" src="<?php echo $int1img[0]; ?>" />
			</div>
		</div>
		<div class="row center">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 class="thin-title"><?php the_field('hero_title'); ?></h1>
				<div class="fiftyspacer"></div>
				<p>Want to learn more?</p>
				<a title="Schedule a Demo" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1">Schedule a Demo</a>
			</div>
		</div>
	</div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<div class="container rowpadding">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 center">
				<h2 class="dark-title"><?php the_field('intro_headline'); ?></h2>
				<div class="twentyspacer"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<?php the_field('intro_content'); ?>
				<div class="twentyspacer"></div>
				<a title="Learn More" class="secondarybutton mediumbutton" href="<?php the_field('button_link'); ?>">Learn More</a>
			</div>
			<div class="col-sm-6 hidden-xs">
				<script src="https://fast.wistia.com/embed/medias/cig0g9id2b.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_cig0g9id2b videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/cig0g9id2b/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>
			</div>
		</div>
		<div class="fiftyspacer"></div>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<?php $intimg = get_field('accounting_image');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="accounting-graphic" src="<?php echo $int1img[0]; ?>" />
			</div>
		</div>
	</div>
	
	<div class="container-fluid diamond-block">
		<div class="container rowpadding">
			<div class="row center">
				<div class="col-sm-8 col-sm-offset-2">
					<div class="acq-quote-box">
						<blockquote><?php the_field('quote_text'); ?>
							<cite><?php the_field('quote_name'); ?><br /><strong><?php the_field('quote_company'); ?></strong></cite>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container rowpadding">
		<div class="row">
			<div class="col-sm-12 center">
				<h2 class="dark-title">HOA Referral Banks</h2>
			</div>
		</div>
		<div class="twentyspacer"></div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-2"><?php the_field('bank_one'); ?></div>
			<div class="col-sm-4"><?php the_field('bank_two'); ?></div>
		</div>
	</div>
	
	<?php if( get_field('industries') == 'Yes' ): ?>
	
		<div class="container rowpadding">
			<div class="row center">
				<div class="col-sm-10 col-sm-offset-1">
					<h2 class="dark-title">Industries</h2>
					<p><?php the_field('industries_intro'); ?></p>
					<div class="fiftyspacer"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#hoa" aria-controls="hoa" role="tab" data-toggle="tab">HOA</a></li>
    <li role="presentation"><a href="#property" aria-controls="property" role="tab" data-toggle="tab">Property Management</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="hoa">
		<div class="row">
			<div class="col-sm-6">
				<?php the_field('hoa_content'); ?>
			</div>
			<div class="col-sm-6">
				<?php $intimg = get_field('hoa_image');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="industry-graphic" src="<?php echo $int1img[0]; ?>" />
			</div>
		</div>
	</div>
    <div role="tabpanel" class="tab-pane" id="property">
		<div class="row">
			<div class="col-sm-6">
				<?php the_field('property_content'); ?>
			</div>
			<div class="col-sm-6">
				<?php $intimg = get_field('property_image');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="industry-graphic" src="<?php echo $int1img[0]; ?>" />
			</div>
		</div>  
	</div>
  </div>

					
				</div>
			</div>
		</div>
	
	<?php endif; ?>
	
	<div class="container-fluid headerbluebg">
			<div class="container">
				<div class="row center">
					<div class="col-sm-10 col-sm-offset-1">
						<h2 style="color:#FFF;"><?php the_field('cta_title'); ?></h2>
						<p><?php the_field('cta_content'); ?></p>
						<div class="twentyspacer"></div>
						<a id="ctaDemoBtn" title="<?php the_field('demo_button_text'); ?>" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1"><?php the_field('demo_button_text'); ?></a>
					</div>
				</div>
			</div>
		</div>
	
	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>