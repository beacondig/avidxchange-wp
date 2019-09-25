<?php get_header(); ?>
</div>

<style>

	.gray-bg {
		width:100%;
		background-color:#f9f9f9;
		margin:35px 0;
		padding:35px 0 0;
		font-size:16px;
		color:rgba(0,0,0,0.5);
	}
	
	.quote {
		margin-top:50px;
	}
	
	.quote:before {
		content:"\f10d";
		font-family:FontAwesome;
		color:#1e95d3;
		padding-right:8px;
		font-size:35px;
	}
	

	.gquote {
		color:#1e95d3;
	}
	
	.bank-logo {
		width:75%;
	}
	
	.b-quote-p {
		font-weight:500;
	}
	
	.b-quote-attr {
		font-style:italic;
		font-weight:300;
	}
	
	.bluebg {
		background-image:linear-gradient(215deg, #005076 0%, #005076 100%);
		color:#FFF;
		padding:50px 0;
	}
	
	.greenbottomsliver,
	.bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	#mcModal .modal-header {
		text-align:center;
	}
	
	#gform_submit_button_22 {
		background-color: #ff8a00;
		text-align: center;
		width: calc( 100% + 26px );
    	max-width: none;
		height:40px;
		color: #fff;
		border: none;
		padding: 0px;
		font-size: 18px!important;
		font-weight: 500;
		border-radius: 2px;
		margin-left:-21px;
		margin-bottom:-10px;
	}
	
	#gform_submit_button_22:hover {
		background-color: #e86100;
	}
	
	#gform_22 label { display:none; }

</style>
<!--- form modal start (blue modal) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6>Become an AvidXchange Partner</h6>Fill out your information and we’ll contact you shortly.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=11 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->

<!--- form modal start (blue modal) --->
<div class="modal fade" id="mcModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6>Learn more or request a demo.</h6>Let's connect.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=22 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<div class="submenuholder">
    <div class="container-fluid graybg">
        <div class="container cmob">
            <div class="dib flr">
                <div style="display:inline-block; margin-right:20px;">Already a <?php the_field('partner_type'); ?>?</div>
                <div style="display:inline-block;"><a class="defaultbutton mediumbutton" target="_blank" style="min-width:120px; padding: 10px 37px;" href="https://go.litmos.com/account/login/" />Log In</a></div>
            </div>
        </div>
    </div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<?php if( get_field('layout') == 'Yes' ): ?>
		
		<div class="container">
			<div class="row center">
				<div class="col-sm-12">
					<h2><?php the_field('partnered_title'); ?></h2>
				</div>
			</div>
			<div class="twentyspacer"></div>
			<div class="row">
				<div class="col-sm-4">
					<?php if( get_field('quote_image') ): ?>
						<?php $quo1img = get_field('quote_image');
                    	$size = 'medium';
                    	$qu1img = wp_get_attachment_image_src($quo1img, $size); ?>
                		<p><img src="<?php echo $qu1img[0]; ?>" /></p>
                	<?php endif; ?>
				</div>
				<div class="col-sm-7 col-sm-offset-1 right">
					<p class="quote"><?php the_field('quote'); ?></p>
                	<div class="twentyspacer"></div>
                	<p><span class="gquote"><?php the_field('quote_attribution'); ?></span><br />
                	<span style="font-style: italic; font-weight:500;"><?php the_field('quote_attribution_company'); ?></span></p>
				</div>
			</div>
			<div class="fiftyspacer"></div>
			<div class="row center">
				<div class="col-sm-12">
					<a class="secondarybutton mediumbutton" href="<?php the_field('button_url'); ?>">Learn More</a>
				</div>
			</div>
		</div>
	
	<?php endif; ?>
<?php if( get_field('layout') == 'No' or get_field('layout') == '' ): ?>
	<?php if(get_field('quote')): ?>
	<div class="container">
        <div class="row center rowbottompadding">
            <div class="col-md-6 col-sm-6">
                <p class="quote"><?php the_field('quote'); ?></p>
                <div class="twentyspacer"></div>
                <p><span class="gquote"><?php the_field('quote_attribution'); ?></span><br />
                <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
                <div class="fourtyspacer"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div>
					<?php if( get_field('quote_image') ): ?>
						<?php $quo1img = get_field('quote_image');
                    	$size = 'medium';
                    	$qu1img = wp_get_attachment_image_src($quo1img, $size); ?>
                		<p><img src="<?php echo $qu1img[0]; ?>" /></p>
                	<?php endif; ?>
                </div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>	
    <?php endif; ?>
   <?php endif; ?>
   
   <?php if( get_field('layout') == 'Yes' ): ?>
   	<div class="container-fluid gray-bg become-copy">
   <?php endif; ?>
    <div class="container">
        <div class="row center rowbottompadding">
            <div class="col-sm-10 col-sm-offset-1">
                <h2><?php the_field('become_title'); ?></h2>
                <?php if(get_field('become_intro')) { ?>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('become_intro'); ?></p>
                <?php } ?>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
               	<?php if( get_field('layout') == 'Yes' ): ?>
                <div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#mcModal">Join the <?php the_field('partner_type'); ?>s Program Now</a></div>
				<div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" href="https://www.mastercard.us/en-us/issuers/products-and-solutions/customer-needs/commercial-solutions/b2bhub.html"><div>Join the <?php the_field('partner_type'); ?>s Program Now</div></a></div>
                <?php endif; ?>
                <?php if( get_field('layout') == 'No' or get_field('layout') == '' ): ?>
                <div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">Join the <?php the_field('partner_type'); ?>s Program Now</a></div>
				<div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>Join the <?php the_field('partner_type'); ?>s Program Now</div></a></div>
                <?php endif; ?>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
  <?php if( get_field('layout') == 'Yes' ): ?>
	</div>
  <?php endif; ?>
  
  <?php if( get_field('layout') == 'Yes' ): ?>
  <div class="container">
  	<div class="row center">
  	<?php if( have_rows('bank_quotes') ): 
		while ( have_rows('bank_quotes') ) : the_row();?>
  		<div class="col-sm-6">
  			<?php $bpimg = get_sub_field('bank_logo');
                  $size = 'full';
                  $bp1img = wp_get_attachment_image_src($bpimg, $size); ?>
            <p><img class="bank-logo" src="<?php echo $bp1img[0]; ?>" /></p>
            <div class="center">
            	<p><?php the_sub_field('b_quote'); ?></p>
            	<p class="b-quote-p"><?php the_sub_field('b_quote_p'); ?><br /><span class="b-quote-attr"><?php the_sub_field('b_quote_attr'); ?></span></p>
            </div>
  		</div>
  		<?php endwhile; wp_reset_query();  ?>
	<?php else :
		// no rows found
	endif;
	?>
  	</div>
  </div>
  <div class="fiftyspacer"></div>
  <div class="container-fluid bluebg">
  	<div class="container">
  		<div class="row center">
  			<div class="col-sm-12">
  				<h2 style="color:#FFF !important;">Partners &mdash; Financial Institutions</h2>
  			</div>
  		</div>
  		<div class="fiftyspacer"></div>
  		<div class="row">
  			<?php $prt = 1; if( have_rows('fin_partners') ): while ( have_rows('fin_partners') ) : the_row();?>
  				<div class="col-sm-4 center">
  					<p class="fin-partner"><?php the_sub_field('partner_name'); ?></p>
  				</div>
  			<?php if( $prt == 3 ) { ?>
				<div class="clearfix hidden-xs"></div>
			<?php $prt = 0; } ?>
			<?php $prt++; ?>
			<?php endwhile; wp_reset_query();  ?>
			<?php else :
					// no rows found
				endif;
			?>
  		</div>
  	</div>
  </div>
  
  <?php endif; ?>
  
    <?php $cot = 0;
	if( have_rows('sections') ): 
		while ( have_rows('sections') ) : the_row();?>
			<?php if ($cot == 0) { ?>
                <div class="container-fluid graybg">
                    <div class="container">
                        <div class="row center rowpadding">
                        	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                <h2><?php the_sub_field('title'); ?></h2>
                                    <div class="separator"></div>
                                <div class="twentyspacer"></div>
                            </div>
                            <div class="col-md-6 col-sm-6" style="text-align:left;">
                            	<div><?php the_sub_field('intro'); ?></div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                            	<?php if( get_sub_field('image') ): ?>
									<?php $lopimg = get_sub_field('image');
                                    $size = 'medium';
                                    $loimg = wp_get_attachment_image_src($lopimg, $size); ?>
                                    <p><img src="<?php echo $loimg[0]; ?>" /></p>
                                <?php endif; ?>
                                <div class="hidesmall"><a class="secondarybutton mediumbutton" href="https://www.mastercard.us/en-us/issuers/products-and-solutions/customer-needs/commercial-solutions/b2bhub.html">Join the <?php the_field('partner_type'); ?>s Program Now</a></div>
                				<div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" href="https://www.mastercard.us/en-us/issuers/products-and-solutions/customer-needs/commercial-solutions/b2bhub.html"><div>Join the <?php the_field('partner_type'); ?>s Program Now</div></a></div>
                            	<div class="twentyspacer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
            	<div class="container">
                    <div class="row center rowpadding">
                    	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                            <h2><?php the_sub_field('title'); ?></h2>
                                <div class="separator"></div>
                            <div class="twentyspacer"></div>
                        </div>
                        <div class="col-md-6 col-sm-6">
							<?php if( get_sub_field('image') ): ?>
								<?php $lop2img = get_sub_field('image');
                                $size = 'medium';
                                $lo2img = wp_get_attachment_image_src($lop2img, $size); ?>
                                <p><img src="<?php echo $lo2img[0]; ?>" /></p>
                            <?php endif; ?>
                            <div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">Join the <?php the_field('partner_type'); ?>s Program Now</a></div>
                            <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>Join the <?php the_field('partner_type'); ?>s Program Now</div></a></div>
                        	<div class="twentyspacer"></div>
                        </div>
                        <div class="col-md-6 col-sm-6" style="text-align:left;">
                        	<div><?php the_sub_field('intro'); ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if($cot == 1) { $cot = 0; } else { $cot = 1; } ?>
		<?php endwhile; wp_reset_query();  ?>
	<?php else :
		// no rows found
	endif;
	?>
    
    <?php if( have_rows('section_singles') ): 
		while ( have_rows('section_singles') ) : the_row();?>
            <div class="container">
                <div class="row center rowbottompadding">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <h2><?php the_sub_field('title'); ?></h2>
                        <?php if(get_sub_field('intro')) { ?>
                            <div class="separator"></div>
                        <p class="intro"><?php the_sub_field('intro'); ?></p>
                        <?php } ?>
                        <div class="twentyspacer"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="hidesmall"><a class="secondarybutton mediumbutton" href="<?php the_sub_field('button_url'); ?>"><?php the_sub_field('button_text'); ?></a></div>
                        <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" href="<?php the_sub_field('button_url'); ?>"><div><?php the_sub_field('button_text'); ?></div></a></div>
                        <div class="fourtyspacer"></div>
                    </div>
                </div>
            </div>
    	<?php endwhile; wp_reset_query();  ?>
	<?php else :
		// no rows found
	endif;
	?>
    
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>