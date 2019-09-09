<?php
/**
 * Template Name: Page - Supplier Drip #2
 * Description: Used as a page template for the Supplier drip campaign
 */
 ?>

<?php get_header(); ?>
</div>
<?php if( get_field('supp_hero_image') ): ?>
	<?php $bnimg = get_field('supp_hero_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>

<style>
.supp-hero {	
	background-image:url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:600px;
	padding:100px 0;
	margin-bottom:100px;
	color:#FFF;
	position:relative;
	clip-path: polygon(0 0, 100% 0, 100% 75%, 0 100%);
	-webkit-clip-path: polygon(0 0, 100% 0, 100% 75%, 0 100%);
}
	
	.hero-info {
		margin-top:-570px;
		color:#FFF;
		padding-bottom:75px;
	}
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.hbspt-form label {
	font-size:14px;
	color:#FFF;
	font-weight:300;
    }
	
	.hbspt-form input {
		margin-bottom:15px;
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
	
	
</style>

<!--- form modal start (blue modal) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6 class="ab1">Enroll Into Cashflow Manager Today!</h6></div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue">
			<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
	portalId: "430000",
	formId: "f9d7170e-5ea6-443c-b9da-3581f8c7f8d8",
	css: "",
	sfdcCampaignId: "7011O0000037rZrQAI"
});
</script>
			
		</div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->


<div class="container-fluid supp-hero"></div>
	<div class="container hero-info">
		<div class="row">
			<div class="col-sm-5">
				<h1 class="supp-title"><?php the_field('supp_page_title'); ?></h1>
				<?php the_field('supp_hero_copy'); ?>
				<div class="twentyspacer"></div>
				<a title="Enroll Today" class="ctabutton mediumbutton" data-toggle="modal" data-target="#intModal">Enroll Today</a>
			</div>
			<div class="col-sm-7">
				<?php $intimg = get_field('hero_image');
    				  $size = 'full';
    				  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
				<img class="supp-hero-img hidden-xs" src="<?php echo $int1img[0]; ?>" />
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
			<?php $featimg = get_field('features_image_one');
    				  $size = 'full';
    				  $feat1img = wp_get_attachment_image_src($featimg, $size); ?>
			<img class="supp-feat-img" src="<?php echo $feat1img[0]; ?>" />
		</div>
		<div class="col-sm-5 col-sm-offset-1">
			<div class="supp-feat-icon"><i class="fa fa-rocket"></i></div>
			<h2 class="drip-feat-title"><?php the_field('features_title_one'); ?></h2>
			<?php the_field('features_copy_one'); ?>
			<div class="twentyspacer"></div>
			<a title="Enroll Today" class="ctabutton mediumbutton" data-toggle="modal" data-target="#intModal">Accelerate Now</a>
		</div>
	</div>
	<div class="fiftyspacer"></div>
	<div class="fiftyspacer"></div>
	<div class="row">
		<div class="col-sm-5">
			<div class="supp-feat-icon"><i class="fa fa-clock-o"></i></div>
			<h2 class="drip-feat-title"><?php the_field('features_title_two'); ?></h2>
			<?php the_field('features_copy_two'); ?>
			<div class="twentyspacer"></div>
			<blockquote class="supp-feat-quote"><?php the_field('features_quote_two'); ?>
				<cite><?php the_field('quote_person'); ?><br /><?php the_field('quote_company'); ?></cite>
			</blockquote>
		</div>
		<div class="col-sm-6 col-sm-offset-1">
			<?php $feat2img = get_field('features_image_two');
    				  $size = 'full';
    				  $feat3img = wp_get_attachment_image_src($feat2img, $size); ?>
			<img class="supp-feat-img" src="<?php echo $feat3img[0]; ?>" />
		</div>
	</div>
</div>
	
	<div class="container-fluid supp-drip-cta-block hidden-xs"></div>
	<div class="container supp-cta-info-block">
		<div class="row">
			<div class="col-sm-7">
				<?php $feat4img = get_field('features_image_cta');
    				  $size = 'full';
    				  $feat5img = wp_get_attachment_image_src($feat4img, $size); ?>
			<img class="supp-cta-img hidden-xs" src="<?php echo $feat5img[0]; ?>" />
			</div>
			<div class="col-sm-4 cta-copy-block">
				<h3 class="supp-cta-bar-title-alt"><?php the_field('cta_block_title'); ?></h3>
				<?php the_field('cta_block_copy'); ?>
				<div class="twentyspacer"></div>
				<a title="Enroll Today" class="ctabutton mediumbutton" data-toggle="modal" data-target="#intModal">Enroll Today</a>
			</div>
		</div>
	</div>
	

	<div class="container supp-service-padding center">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<h2>Our team works hard, so you don’t have to.</h2>
				<p> AvidXchange Cashflow Manger&trade;, our self-service supplier portal, provides you with all of the features you need to help you make better cash flow decisions.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://2udm7l4frjjz47k5wg248qz0-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-01.png" />
				<p>With free online access, 24 hours a day, 7 days a week you're never in the dark</p>
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
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-03.png" />
				<p>Real time invoice status means no more calling your customers to track down your money</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-04.png" />
				<p>With up to date payment history and details you never have to wonder</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://2udm7l4frjjz47k5wg248qz0-wpengine.netdna-ssl.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-05.png" />
				<p>Take back control over your cash flow and get paid early with Invoice Accelerator</p>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="supp-serv-box">
				<img class="supp-serv-icon" src="https://www.avidxchange.com/wp-content/uploads/2018/07/CashflowIA_Icons_Buyer-06.png" />
				<p>Update your banking information without having to reach out to your client</p>
				</div>
			</div>
		</div>
	</div>	


	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>