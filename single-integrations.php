<?php get_header(); ?>
</div>

<?php 
	$category = get_the_category();
	if($category[0]->cat_name != ''){
		$allCategory = $category[0]->cat_name;
	}
	if($category[1]->cat_name != ''){
		$allCategory .= ','.$category[1]->cat_name;
	}
	if($category[2]->cat_name != ''){
		$allCategory .= ','.$category[2]->cat_name;
	}
?>

<?php if( get_field('testimonial_image') ): ?>
	<?php $bnimg = get_field('testimonial_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>

<style>
	.ab2, .ab2a { display:none; }
	.ab2a #gform_submit_button_8 { width: calc( 100% - 24px ); }
	.ab2a #gform_wrapper_8 { max-width:100%!important; }
</style>
<?php if( get_field('layout') == 'Yes' ): ?>
<style>
	
	.greentestbg {	
	    background-image: -webkit-linear-gradient(90deg, rgba(0,160,77,0.95) 0%, rgba(0,0,0,0) 70%), url("<?php echo $bn1img[0]; ?>"); 
	    background-image: linear-gradient(90deg, rgba(0,160,77,0.95) 0%,rgba(0,0,0,0) 70%), url("<?php echo $bn1img[0];; ?>");
	    background-size:cover;
		padding:125px 15px;
		color:#FFF;
		background-position:center center;
	}
	
	.greenbottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	@media (max-width: 768px) {
		.greentestbg {
			background: -webkit-linear-gradient(90deg, rgba(0,160,77,0.95) 0%, rgba(0,160,77,0.75) 70%);
			background: linear-gradient(90deg, rgba(0,160,77,0.95) 0%, rgba(0,160,77,0.75) 70%);
		}
		
		.icon-box {
			min-height:0px;
			margin:50px 0 100px;
			padding:50px;
		}
		
		.icon-img {
			margin:-85px auto 10px;
		}
	}
	
	.inteventbg {
		margin-bottom:75px;
		margin-top:25px;
		border-top:1px solid rgba(0,0,0,0.1);
		padding-top:50px;
	}

	.inteventtype {
		margin-top:-45px;
	}

	.inteventtype span {
		padding:10px;
		background-color:#93c740;
		color:#FFF;
		font-size:15px;
		text-transform:uppercase;
		font-weight:500;
	}
	
	.icon-box {
		padding:20px;
		background-color:#FFF;
		margin:50px 0;
		min-height:275px;
	}
	
	.icon-img {
		display:block;
		height:125px;
		width:125px;
		margin:-65px auto 10px;
		border:10px solid #FFF;
		background-color:#FFF;
		border-radius:125px;
		-moz-border-radius:125px;
		-webkit-border-radius:125px;
	}
	
</style>
<?php endif; ?>
<!--- form modal start (blue modal) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6 class="ab1">Speak to an AP Automation expert</h6><h6 class="ab2">Speak to an AvidXchange + <?php echo get_the_title(); ?> Integration expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->

<div class="headerbluebg">
<div class="xbglg">
<div class="container mobilesquish">
	<div class="row rowpadding">
    	<div class="col-md-6 col-sm-6 ltc">
            <h1 class="bbh1" style="font-size:36px; font-weight:400; "><?php the_field('banner_title'); ?></h1>
            <?php if( get_field('banner_description') ): ?>
                <p><?php the_field('banner_description'); ?></p>
            <?php endif; ?>
            <div class="thirtyspacer"></div>
            <div class="ltc">
                <div><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</div></a></div>
                <div class="tenspacer"></div>
                <?php $loopchk = new WP_Query( array( 'post_type' => 'resources', 'category_name' => $allCategory, 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
                <?php $chkcount = $loopchk->post_count; ?>
                <?php if($category[0]->cat_name != '' ) { ?>
               		<div class="ltc" style="font-size:16px; text-align:center;"><a class="scroll" href="#relres" style="color:#ffffff!important; text-decoration:none!important;">View Related Resources</a></div>
                <?php } ?>
            </div>
            <div class="fourtyspacer"></div>
        </div>
        <div class="col-md-5 col-md-offset-1 col-sm-6 threecrunchoffset">
            <div class="intgsingle">
                <?php if(get_field('avid_partner') == "yes") { ?>
                    <div class="ibanner ibtop"><img width="235" src="/wp-content/uploads/bannergreen.svg" /></div>
                    <div class="ibannertext"><span style="font-size: 17px;">AvidXchange Partner</span></div>
                <?php } ?>
            </div>
        	<?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>
        </div>
    </div>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<!--<div class="submenuholder"></div>-->


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<?php if( get_field('layout') == 'Yes' ): ?>
	<div class="container rowpadding">
		<div class="row center">
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<h2><?php the_field('content_title'); ?></h2>
			</div>
		</div>
		<div class="fiftyspacer"></div>
		<div class="row">
		<?php if( get_field('content_vid')) : ?>
			<div class="col-sm-6">
				<div><?php the_field('content_copy'); ?></div>
			</div>
			<div class="col-sm-6">
				<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('content_vid'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('content_vid'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
				</div>
			</div>
		<?php elseif( !get_field('content_vid')) : ?>
			<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 center">
				<div><?php the_field('content_copy'); ?></div>
			</div>
		<?php endif; ?>
		</div>
	</div>
	
	<?php if( have_rows('events') ): while ( have_rows('events') ) : the_row();?>
		<div class="container inteventbg">
			<div class="row">
				<div class="col-md-3">
					<?php $ind2img = get_sub_field('event_image');
                          $size = 'full';
                          $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    <img class="hidden-sm hidden-xs" src="<?php echo $in2img[0]; ?>" />
				</div>
				<div class="col-md-9">
					<?php if( get_sub_field('event_type') == 'Webinar' ) : ?>
						<h6>Upcoming Live Webinar</h6>
					<?php endif; ?>
					<?php if( get_sub_field('event_type') == 'Tradeshow' ): ?>
						<h6>Upcoming Tradeshow</h6>
					<?php endif; ?>
					<h3><?php the_sub_field('event_title'); ?></h3>
					<p><?php the_sub_field('event_desc');?></p>
					<div class="fiftyspacer hidden-xs"></div>
					<div class="row">
						<div class="col-sm-4">
							<p><strong>Date:</strong><br />
							<?php $date = get_sub_field('event_date', false, false);
								  $date = new DateTime($date); ?>
							<?php echo $date->format('F j, Y') ?></p>
						</div>
						<div class="col-sm-4">
							<p><strong>Time:</strong><br />
							<?php the_sub_field('event_time'); ?></p>
						</div>
						<div class="col-sm-4">
							<a title="<?php the_sub_field('event_btn_text'); ?>" class="secondarybutton mediumbutton" href="<?php the_sub_field('event_url') ?>"><?php the_sub_field('event_btn_text'); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; wp_reset_query();  ?>
    <?php else :
             // no rows found
           endif;
    ?>
	<div class="container-fluid graybg rowpadding">
		<div class="container">
			<div class="row center">
				<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
					<h2><?php the_field('icon_title'); ?></h2>
				</div>
			</div>
			<div class="twentyspacer"></div>
			<div class="row">
					<?php $i = 1;
				
						if( have_rows('icon_box') ): while ( have_rows('icon_box') ) : the_row();?>
						<div class="col-md-4">
							<div class="icon-box center">
								<?php $ind2img = get_sub_field('icon');
                        		$size = 'thumbnail';
                        		$in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    			<img class="icon-img" src="<?php echo $in2img[0]; ?>" />
                    			<h6><?php the_sub_field('icon_box_title'); ?></h6>
                    			<?php the_sub_field('icon_box_content'); ?>
							</div>
						</div>
						<?php if($i == 3) { ?>
							<div class="clearfix visible-md-block visible-lg-block"></div>
						<?php }; ?>
					<?php $i++; ?>
					<?php endwhile; wp_reset_query();  ?>
        			<?php else :
             		// no rows found
            			endif;
         			?>
			</div>
		</div>
	</div>
	<div class="container-fluid greentestbg rowpadding">
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<p class="quote" style="font-size:30px; font-style:italic; line-height:35px;"><?php the_field('quote'); ?></p>
                    <div class="twentyspacer"></div>
                    <?php if(get_field('quote_attribution_name')) : ?>
                    	<p><strong><?php the_field('quote_attribution_name'); ?>,</strong>&nbsp;
                    <?php endif; ?>
                    <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
				</div>
			</div>
		</div>
	</div>
	<div class="container rowpadding">
		<div class="row">
			<div class="col-sm-12 center">
				<h2><?php the_field('resource_title'); ?></h2>
			</div>
		</div>
		<div class="row">
				<?php if( have_rows('resources') ): while ( have_rows('resources') ) : the_row(); ?>
				<div class="col-md-4">
				<?php

					$post_object = get_sub_field('resource');

					if( $post_object ): 

						// override $post
						$post = $post_object;
						setup_postdata( $post ); 
				?>
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
                                <h6 style="font-size:18px;"><?php echo the_title(); ?></h6>
                        </div>
                    </a>
                </div>
    			<?php wp_reset_postdata(); ?>
				<?php endif; ?>
				<div style="max-width:320px; margin: auto;" class="newsloopitem">
					<p class="credits"><p><?php the_sub_field('mini_description'); ?></p></p>
				</div>
			</div>
			<?php endwhile; wp_reset_query();  ?>
        	 <?php else :
             	// no rows found
            	endif;
         	 ?>	
			</div>
		</div>
		<div class="container-fluid headerbluebg">
			<div class="container">
				<div class="row center">
					<div class="col-sm-10 col-sm-offset-1">
						<h2 style="color:#FFF;"><?php the_field('cta_title'); ?></h2>
						<p><?php the_field('cta_content'); ?></p>
						<div class="twentyspacer"></div>
						<a id="bottomCTA" title="<?php the_field('demo_button_text'); ?>" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1"><?php the_field('demo_button_text'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if( get_field('layout') == 'No' or get_field('layout') == '' ): ?>
<div>
<?php if(get_field('highlights')) { ?>
    <div class="container">
        <div class="row center rowtoppadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('highlights_title'); ?></h2>
                <div class="twentyspacer"></div>
                <?php if(get_field('highlights')) { ?>
                	<p><?php the_field('highlights'); ?></p>
                <?php } ?>
                <div class="twentyspacer"></div>
                 <?php if(get_field('webinar_vid')) { ?>
                	<div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('webinar_vid'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('webinar_vid'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
					</div>
          		<?php } ?>
			</div>
            <div class="clearfix"></div>
            <div class="col-md-12">
               <div class="fourtyspacer"></div>
                <div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</a></div>
                <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</div></a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
<?php } ?>
<?php endif; ?>
   
<?php if( get_field('layout') == 'No' or get_field('layout') == '' ): ?>    
<?php if(get_field('key_benefits')) { ?>
    <div class="container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('key_benefits_title'); ?></h2>
                <div class="twentyspacer"></div>
                <?php if(get_field('key_benefits')) { ?>
                	<div style="text-align:left;"><?php the_field('key_benefits'); ?></div>
                <?php } ?>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</a></div>
                <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</div></a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
   
<!--- A/B test sidebar form version --->
<?php /*?><div class="ab2a">
	<div class="container">
		<div class="col-sm-8">
		<?php if(get_field('highlights')) { ?>

				<div class="row rowtoppadding">
					<div>
						<h2><?php the_field('highlights_title'); ?></h2>
						<div class="twentyspacer"></div>
						<?php if(get_field('highlights')) { ?>
							<p><?php the_field('highlights'); ?></p>
						<?php } ?>
						<div class="twentyspacer"></div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</a></div>
						<div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</div></a></div>
						<div class="fourtyspacer"></div>
					</div>
				</div>

		<?php } ?>

		<?php if(get_field('key_benefits')) { ?>

				<div class="row rowpadding">
					<div>
						<h2><?php the_field('key_benefits_title'); ?></h2>
						<div class="twentyspacer"></div>
						<?php if(get_field('key_benefits')) { ?>
							<div style="text-align:left;"><?php the_field('key_benefits'); ?></div>
						<?php } ?>
						<div class="twentyspacer"></div>
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="hidesmall"><a class="secondarybutton mediumbutton" data-toggle="modal" data-target="#intModal">See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</a></div>
						<div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div>See How <?php echo get_the_title(); ?> &amp; AvidXchange Work Together</div></a></div>
						<div class="fourtyspacer"></div>
					</div>
				</div>

		<?php } ?>
		</div>
		<div class="col-sm-4">
			<div class="row center rowtoppadding">
			<h6 class="ltc hidetmobile" style="padding-left:10px;padding-top:20px;">Speak to an AvidXchange + <?php echo get_the_title(); ?> Integration expert</h6>
            	<div class="demoform"><?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?></div>
			</div>
		</div>
	</div>
</div><?php */?>
    
    <?php if($category[0]->cat_name != '' ){ ?>
    <div class="site-inner container" id="relres">
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
            	<h2>Related Resources</h2>
                <div class="fiftyspacerTwentyMobile"></div>
                <!-----   resources loop ---->
                
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'category_name' => $allCategory, 'posts_per_page' => 3, 'order' => 'DESC' ) ); 
				$cit = 0; ?>
                <?php $icount = $loop->post_count; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<?php if($icount == 1) { ?>
                    	<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-12 hidemobilepadding">
                    <?php } else if($icount == 2) { ?>
                    	<?php if($cit == 0){ ?>
                    		<div class="col-lg-4 col-lg-offset-2 col-md-6 col-sm-6 hidemobilepadding">
                        <?php } else { ?>
                        	<div class="col-lg-4 col-md-6 col-sm-6 hidemobilepadding">
                        <?php } ?>
                    <?php } else if($icount == 3) { ?>
                    	<div class="col-md-4 col-sm-6 hidemobilepadding">
                    <?php } ?>
                    	<div style="max-width:320px; margin: auto;">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="resourceloopitem" style="max-width:320px; margin:auto;">
                                    <div class="grid">
                                        <figure class="effect-jazz">
                                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>
                                            <figcaption>
                                                <p><span class="whitehover">Read More</span></p>
                                            </figcaption>			
                                        </figure>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="fancyline2"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $mainCategory; ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                                    <h6 style="font-size:18px;"><?php echo the_title(); ?></h6>
                                    <p class="credits"><p><?php the_field('mini_description'); ?></p></p>
                            </div>
                        </a>
                        </div>
                        <div class="twentyspacer"></div>
                    </div>
                    <?php $cit++; ?>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php endif; ?> 
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>