<?php
/**
 * Template Name: Page - Solutions
 * Description: Used as a page template to show page Solutions
 */
 ?>

<?php get_header(); ?>
</div>
<style>
	.bluebottombar {
		display:none;
	}
	
	footer.container {
		margin-top:0px;
	}
</style>

<!--- video modal start --->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('main_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('main_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!--- video modal end --->

<div class="headergraybg">
<div class="xbggray">
<div class="container mobilesquish">
	<div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
            <h1><?php the_field('banner_title'); ?></h1>
            <?php if( get_field('banner_description') ): ?>
            	<div class="tenspacer"></div>
                <p class="introLG"><?php the_field('banner_description'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div style="text-align: center; padding-top:50px;">
                <div class="solsec col-md-5ths">
                    <div class="solfilters"><a class="scroll" href="#poa">
                    	<div class="solcar"><img src="/wp-content/uploads/graycaret.svg" /></div>
                        <div><img src="/wp-content/uploads/2016/11/po-app.png" /></div>
                        <div class="soltext">Purchase Order<br />Application</div></a>
                    </div>
                </div>
                <div class="solsec col-md-5ths">
                    <div class="solfilters"><a class="scroll" href="#bse">
                    	<div class="solcar"><img src="/wp-content/uploads/graycaret.svg" /></div>
                        <div><img src="/wp-content/uploads/2016/11/bill-services.png" /></div>
                        <div class="soltext solfb">Bill<br />Services</div></a>
                    </div>
                </div>
                <div class="solsec col-md-5ths">
                    <div class="solfilters"><a class="scroll" href="#iap">
                    	<div class="solcar"><img src="/wp-content/uploads/graycaret.svg" /></div>
                        <div><img src="/wp-content/uploads/2016/11/invoice-app.png" /></div>
                        <div class="soltext">Invoice<br />Application</div></a>
                    </div>
                </div>
                <div class="solsec col-md-5ths">
                    <div class="solfilters"><a class="scroll" href="#pap">
                    	<div class="solcar"><img src="/wp-content/uploads/graycaret.svg" /></div>
                        <div><img src="/wp-content/uploads/2016/11/payment-app.png" /></div>
                        <div class="soltext">Payment<br />Application</div></a>
                    </div>
                </div>
                <div class="solsec col-md-5ths">
                    <div class="solfilters"><a class="scroll" href="#pse">
                        <div><img src="/wp-content/uploads/2016/11/pay-services.png" /></div>
                        <div class="soltext solfb">Pay<br />Services</div></a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="twentyspacer"></div>
            <div class="gsol"><i class="fa fa-circle" aria-hidden="true"></i>Application</div>
            <div class="bsol"><i class="fa fa-circle" aria-hidden="true"></i>Services</div>
        </div>
    </div>
</div></div></div>
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	
        <!-- get total number of rows -->
        <?php if( have_rows('solutions') ):
            $my_fields = get_field_object('solutions');
            $count = (count($my_fields['value']));
        endif;?>
        <?php $galt = 0; $solt = 1;
        if( have_rows('solutions') ): 
            while ( have_rows('solutions') ) : the_row();?>
            	<div class="site-inner container<?php if($galt == 1) { echo '-fluid graybg nocpad'; } ?>" id="<?php if($solt == 1) { echo 'poa'; } 
					else if($solt == 2) { echo 'bse'; } 
					else if($solt == 3) { echo 'iap'; } 
					else if($solt == 4) { echo 'pap'; } 
					else if($solt == 5) { echo 'pse'; } ?>">
                	<?php if($galt == 1) { echo '<div class="container">'; } ?>
                    <div class="row rowpadding">
                    <?php if(get_sub_field('solution_type') == 'Application') { ?>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 showsmall">
							<?php $ind2img = get_sub_field('item_image');
                            $size = 'medium';
                            $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                        <img class="sboxl" src="<?php echo $in2img[0]; ?>" /></div>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 rline">
                        	<div class="gdown"><img src="/wp-content/uploads/greencaret.svg" /></div>
                            <div class="applicationsbox sboxl">	
                                <?php if(get_sub_field('item_title')) { ?>
                                    <h2><?php the_sub_field('item_title'); ?></h2>
                                <?php } ?>
                                <p><?php the_sub_field('item_content'); ?></p>
                                <?php if(get_sub_field('read_more_link')) { ?>
                                    <div><a id="solution<?php echo $solt; ?>" class="defaultbutton smallbutton" href="<?php the_sub_field('read_more_link'); ?>">Read More</a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 taleft hidesmall"><img class="sboxr" src="<?php echo $in2img[0]; ?>" /></div>
                        <div class="clearfix"></div>
                    <?php } else { ?>
						<?php $ind2img = get_sub_field('item_image');
                        $size = 'medium';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                        <div class="col-md-5 col-md-offset-1 col-sm-6"><img class="sboxl" src="<?php echo $in2img[0]; ?>" />
                        	
                        </div>
                        <div class="col-md-5 col-sm-6 lline">
                        	<div class="gdownl"><img src="/wp-content/uploads/greencaret.svg" /></div>
                            <div class="servicesbox sboxr">	
                                <?php if(get_sub_field('item_title')) { ?>
                                    <h2 class=""><?php the_sub_field('item_title'); ?></h2>
                                <?php } ?>
                                <p><?php the_sub_field('item_content'); ?></p>
                                <?php if(get_sub_field('read_more_link')) { ?>
                                    <div><a id="solution<?php echo $solt; ?>" class="defaultbutton smallbutton" href="<?php the_sub_field('read_more_link'); ?>">Read More</a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                    </div>
                    <?php $solt++; ?>
                    <?php if($galt == 1) { echo '</div>'; } ?>
                	<?php if($galt == 0) { $galt = 1; } else { $galt = 0; } ?>
                </div>
            <?php endwhile; wp_reset_query();  ?>
        <?php else :
            // no rows found
        endif;
        ?>
    </div>

	<div class="site-inner container-fluid solgreenbanner">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('main_video_intro'); ?></h2>
                    <div class="bannerplayw"><a data-toggle="modal" data-target="#myModal"><i id="pbtn" class="fa fa-play-circle-o" aria-hidden="true"></i></a></div>
                    <div class="runtime"><?php the_field('main_video_runtime'); ?></div>
                    <div class="twentyspacer"></div>
                </div>
            </div>
    	</div>
    </div>
    
    <div class="container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('ecosystem_title'); ?></h2>
                <p class="intro"><?php the_field('ecosystem_intro'); ?></p>
                <div class="twentyspacer"></div>
                <p><?php the_field('ecosystem_content'); ?></p>
                <div class="thirtyspacer"></div>
                <div class="gsol"><i class="fa fa-circle" aria-hidden="true"></i>Application</div>
            	<div class="bsol"><i class="fa fa-circle" aria-hidden="true"></i>Services</div>
            </div>
            <div class="clearfix"></div>
            <!---  Desktop version of ecosystem --->
            <div class="row hidesmall">
                <div class="col-md-12 col-sm-12">
                    <div style="text-align: center; padding-top:40px;">
                        <div class="solsecbot col-md-7ths">
                            <div class="solbotfilters"><a id="ecobutfull1">
                                <div id="ecobut1" class="ecobubble ecobubblehover"><img src="/wp-content/uploads/2016/11/po-app.png" /></div>
                                <div class="soltext">Purchase Order<br />Application</div></a>
                            </div>
                        </div>
                        <div class="solsecbot col-md-7ths">
                            <div class="solbotfilters"><a id="ecobutfull2">
                                <div id="ecobut2" class="ecobubble"><img src="/wp-content/uploads/2016/11/bill-services.png" /></div>
                                <div class="soltext solfb">Bill<br />Services</div></a>
                            </div>
                        </div>
                        <div class="solsecbot col-md-7ths">
                            <div class="solbotfilters"><a id="ecobutfull3">
                                <div id="ecobut3" class="ecobubble"><img src="/wp-content/uploads/2016/11/invoice-app.png" /></div>
                                <div class="soltext">Invoice<br />Application</div></a>
                            </div>
                        </div>
                        <div class="solsecbot col-md-7ths">
                            <div class="solbotfilters"><a id="ecobutfull4">
                                <div id="ecobut4" class="ecobubble"><img src="/wp-content/uploads/2016/11/payment-app.png" /></div>
                                <div class="soltext">Payment<br />Application</div></a>
                            </div>
                        </div>
                        <div class="solsecbot col-md-7ths">
                            <div class="solbotfilters"><a id="ecobutfull5">
                                <div id="ecobut5" class="ecobubble"><img src="/wp-content/uploads/2016/11/pay-services.png" /></div>
                                <div class="soltext solfb">Pay<br />Services</div></a>
                            </div>
                        </div>
                        <div class="solsecbot col-md-2-7ths specialborder">
                        	<div class="speciallabel">SUPPLIERS SOLUTIONS</div>
                        	<div class="col-md-6 col-sm-6" style="padding:0px;">
                                <div class="solbotfilters"><a id="ecobutfull6">
                                    <div id="ecobut6" class="ecobubble"><img src="/wp-content/uploads/2016/11/SupplierPortal.png" /></div>
                                    <div class="soltext solfb">Supplier<br />Portal</div></a>
                                </div>
                            </div>
                        	<div class="col-md-6 col-sm-6" style="padding:0px;">
                                <div class="solbotfilters"><a id="ecobutfull7">
                                    <div id="ecobut7" class="ecobubble"><img src="/wp-content/uploads/2016/11/AcceleratedInvoice.png" /></div>
                                    <div class="soltext">Invoice<br />Accelerator</div></a>
                                </div>
                            </div>
                        </div>
            		<div class="clearfix"></div>
                    </div>
                    
                    <div class="bfecoholder">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 infotopgray">
                            <?php $ect = 1;
							if( have_rows('benefits') ): 
								while ( have_rows('benefits') ) : the_row();?>
                                    <div <?php if($ect == 1){ echo 'class="ecoshow"'; } ?> id="ecocon<?php echo $ect; ?>">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="abs">
                                                <div class="ecosystemsbox">	
                                                    <h4>Buyers</h4>
                                                    <p><?php the_sub_field('buyer_benefits'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="abs">
                                                <div class="ecosystemsbox">		
                                                    <h4>Suppliers</h4>
                                                    <p><?php the_sub_field('supplier_benefits'); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $ect++; ?>
                            	<?php endwhile; wp_reset_query();  ?>
							<?php else :
                                // no rows found
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="bfholderSpacer">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                            <div>
                            	<?php
								$repeater = get_field('benefits');
								$o1 = $repeater[0]['buyer_benefits'];
								$o2 = $repeater[0]['supplier_benefits'];
								?>
                                <div class="col-md-6 col-sm-6">
                                    <div>
                                        <div class="ecosystemsbox">	
                                            <h4>Buyers</h4>
                                            <p><?php echo $o1; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div>
                                        <div class="ecosystemsbox">		
                                            <h4>Suppliers</h4>
                                            <p><?php echo $o2; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!---  Mobile version of ecosystem --->
            <div class="container showsmall" style="margin-top: 10px;">
            	<div class="row boteco">
                	<a class="ecoclick" id="ecot1"><div class="ecogreen">Purchase Order Application</div></a>
                    <div class="ecocontent" id="ecoc1">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[0]['buyer_benefits'];
						$o2 = $repeater[0]['supplier_benefits']; ?>
                        <div class="caretupgreen"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot2"><div class="ecoblue">Bill Services</div></a>
                    <div class="ecocontent" id="ecoc2">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[1]['buyer_benefits'];
						$o2 = $repeater[1]['supplier_benefits']; ?>
                        <div class="caretupblue"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot3"><div class="ecogreen">Invoice Application</div></a>
                    <div class="ecocontent" id="ecoc3">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[2]['buyer_benefits'];
						$o2 = $repeater[2]['supplier_benefits']; ?>
                        <div class="caretupgreen"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot4"><div class="ecogreen">Payment Application</div></a>
                    <div class="ecocontent" id="ecoc4">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[3]['buyer_benefits'];
						$o2 = $repeater[3]['supplier_benefits']; ?>
                        <div class="caretupgreen"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot5"><div class="ecoblue">Pay Services</div></a>
                    <div class="ecocontent" id="ecoc5">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[4]['buyer_benefits'];
						$o2 = $repeater[4]['supplier_benefits']; ?>
                        <div class="caretupblue"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot6"><div class="ecoblue">Supplier Portal</div></a>
                    <div class="ecocontent" id="ecoc6">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[5]['buyer_benefits'];
						$o2 = $repeater[5]['supplier_benefits']; ?>
                        <div class="caretupblue"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
                <div class="row boteco">
                	<a class="ecoclick" id="ecot7"><div class="ecogreen">Invoice Accelerator</div></a>
                    <div class="ecocontent" id="ecoc7">
                    	<?php $repeater = get_field('benefits');
						$o1 = $repeater[6]['buyer_benefits'];
						$o2 = $repeater[6]['supplier_benefits']; ?>
                        <div class="caretupgreen"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
						<div><div class="ecosystemsbox">	
							<h4>Buyers</h4>
							<p><?php echo $o1; ?></p>
						</div></div>
						<div><div class="ecosystemsbox">		
							<h4 style="padding-top:20px;">Suppliers</h4>
							<p><?php echo $o2; ?></p>
						</div></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="fourtyspacer"></div>
                <div><a id="apdemo" class="ctabutton mediumbutton" href="/demo/">Schedule a Demo</a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
    
    

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>
<div class="greenbottomsliver"></div>
<div class="bluebottomsliver"></div>
<div class="graybottomsliver"></div>
<div class="container-fluid solutionfooter">
    <div class="container">
        <div class="row center">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('footer_title'); ?></h2>
                <div class="twentyspacer"></div>
                <p><?php the_field('footer_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
            	<div class="center"><a id="apmanager" href="<?php the_field('ap_manager_link'); ?>" class="whitebutton hugebutton">AP Manager</a></div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
            	<div class="center"><a id="controller" href="<?php the_field('controller_link'); ?>" class="whitebutton hugebutton">Controller</a></div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
            	<div class="center"><a id="cfo" href="<?php the_field('cfo_link'); ?>" class="whitebutton hugebutton">CFO</a></div>
            </div>
            <div class="col-md-3 col-sm-6" style="margin-bottom: 10px;">
            	<div class="center"><a id="supplier" href="<?php the_field('supplier_link'); ?>" class="whitebutton hugebutton">Supplier</a></div>
            </div>
        </div>
    </div>
    <div class="fiftyspacer"></div>
</div>
<?php $ind2img = get_field('guide_hero');
      $size = 'full';
      $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
<div id="beginners-guide-to-ap-automation" class="container-fluid maingdehero" data-parallax="scroll" data-image-src="<?php echo $in2img[0]; ?>"></div>
<div class="whitesliver"></div>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<h2 class="bgngdetitle"><?php the_field('guide_title'); ?></h2>
			<p class="bgngdeintrocopy"><?php the_field('guide_intro_copy'); ?></p>
		</div>
	</div>
</div>
<div class="container-fluid chapters">
	<div class="row rowpadding">
		<?php $cpt = 1;
			if( have_rows('chapters') ): while ( have_rows('chapters') ) : the_row();?>
				<div class="col-sm-3">
					<a class="chapterbox" title="<?php the_sub_field('chapter_title'); ?>" href="<?php the_sub_field('chapter_url'); ?>">
					<div class="center">
						<div class="chapternumber"><?php echo $cpt; ?></div>
						<h5><?php the_sub_field('chapter_title'); ?></h5>
					</div>
					</a>
				</div>
				<?php if($cpt == 4) { ?>
					<div class="clearfix"></div>
				<?php } ?>
			<?php $cpt++; ?>
          	<?php endwhile; wp_reset_query();  ?>
			<?php else :
                                // no rows found
             endif;
         ?>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<?php the_field('guide_copy'); ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row rowpadding">
		<div class="col-md-10 col-md-offset-1">
			<div data-aos="fade-up">
     			<?php $ind2img = get_field('intro_graphic');
      				$size = 'full';
      				$in2img = wp_get_attachment_image_src($ind2img, $size); ?>
      			<img src="<?php echo $in2img[0]; ?>" />
      		</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/solutions_script.js';?>"></script>

<script>
   jQuery(function() {
  		AOS.init({
      offset: 200,
      duration: 400,
      easing: 'ease-in-sine',
    });
   	});

	jQuery(window).on('load', function() {
  		AOS.refresh();
	});
</script>

<?php get_footer(); ?>