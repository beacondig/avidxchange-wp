<?php
/**
 * Template Name: Page - Supplier Drip #1
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
	Background-position:left center;
	width:100%;
	height:auto;
	padding:100px 0;
	color:#FFF;
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


<div class="container-fluid supp-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1 class="supp-title"><?php the_field('supp_page_title'); ?></h1>
				<?php the_field('supp_hero_copy'); ?>
				<div class="twentyspacer"></div>
				<?php if( get_field('layout') == 'One' ): ?>
				<a title="Enroll Today" class="ctabutton mediumbutton" href="#enroll">Enroll Today</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
<?php if( get_field('layout') == 'One' ): ?>
	
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
	formId: "f9d7170e-5ea6-443c-b9da-3581f8c7f8d8",
	css: "",
	sfdcCampaignId: "7011O0000037rZrQAI"
});
</script>
		</div>
		</div>
		
	</div>
	<div class="row center supp-test-block">
		<div class="col-sm-10 col-sm-offset-1">
			<h2><?php the_field('supp_test_title'); ?></h2>
			<blockquote class="supp-quote"><?php the_field('supp_quote'); ?>
				<cite class="supp-cite">- <?php the_field('supp_cite'); ?></cite></blockquote>
		</div>
	</div>

</div>
	
<?php endif; ?>

<?php if( get_field('layout') == 'Two' ): ?>
	
	<div class="container-fluid supp-cta-bar">
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<h2 class="supp-cta-bar-title"><?php the_field('cta_bar_title'); ?></h2>
				</div>
				<div class="col-sm-3 center">
					<div class="twentyspacer hidden-sm hidden-md hidden-lg"></div>
					<a class="ctabutton mediumbutton" data-toggle="modal" data-target="#intModal">Enroll Now</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="twentyspacer"></div>
				<?php the_field('supp_qa_intro'); ?>
				<div class="fiftyspacer"></div>
			</div>
		</div>
            <div class="row center">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2>Customer Q &amp; A</h2>
                    <div class="twentyspacer"></div>
                </div>
            </div>
            <div class="row center">
            	<div class="col-sm-10 col-sm-offset-1">
             	<?php $tab = 1;
					
					if( have_rows('post_questions') ): while ( have_rows('post_questions') ) : the_row();?>
             			<div class="postquestion">
             				<input id="tab-<?php echo $tab; ?>" class="posttab" type="checkbox" name="tabs">
             					<label for="tab-<?php echo $tab; ?>" class="postlabel">
                        			<span class="qst"><?php the_sub_field('post_question') ?></span>
								</label>
            				<div class="postbox">
            					<p><?php the_sub_field('post_answer'); ?></p>
							</div>
             			</div>
             <?php $tab++; ?>
             <?php endwhile; wp_reset_query();  ?>
        	 <?php else :
             // no rows found
            	endif;
         	 ?>
			</div>
			</div>
        	 
 
       
	
		<div class="row center supp-test-block">
		<div class="col-sm-10 col-sm-offset-1">
			<h2><?php the_field('supp_test_title'); ?></h2>
			<blockquote class="supp-quote"><?php the_field('supp_quote'); ?>
				<cite class="supp-cite">- <?php the_field('supp_cite'); ?></cite></blockquote>
		</div>
		</div>
	</div>

<?php endif; ?>

<div class="container-fluid graybg">
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
</div>


	
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>