<?php get_header(); ?>
</div>


<!--- form modal start (Embedded field values - DJ style) --->
<div class="modal fade" id="intModal" role="dialog">
		<button type="button" class="closeblue" data-dismiss="modal">&times;</button>
		<div class="opening-demo-form" style="opacity:1; visibility:visible;">
			<div class="heading">Need an AP ally?</div>
			<?php echo do_shortcode('[gravityform id=15 title=false description=false ajax=true]');?>
		</div>
</div>
<!--- form modal end --->
<!--- form modal start (Optimizely Style) --->
<?php /*?><div class="modal fade" id="intModal2" role="dialog">
  <div class="modal-dialog modal-md">
  
    <div class="modal-content">
		<div class="modal-header"><h4>Speak to an AP Automation expert</h4>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformwide demoformpop" style="max-width:100%;"><?php echo do_shortcode('[gravityform id=16 title=false description=false ajax=true tabindex=49]'); ?></div></div>
		  <div style="text-align:center; padding-bottom:20px; margin-top:-20px;">
        <button type="button" class="closewide" data-dismiss="modal">Cancel</button></div>
      </div>
    </div>
    
  </div>
</div><?php */?>
<!--- form modal end --->

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<?php $str = get_field('resource_type');
$str = str_replace("-", " ", $str); ?>
<div class="pageTitleTop">Resources/<?php echo $str; ?></div>
<h1 class="bbh1"><?php the_title(); ?></h1>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<!--<div class="submenuholder"></div>-->


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<?php if((get_field('resource_type') == 'product-info') || (get_field('resource_type') == 'ebook') || (get_field('resource_type') == 'whitepaper') || (get_field('resource_type') == 'testimonial')){ ?>
    <div id="noNewsSignup" class="container">
   		<div class="thirtyspacer"></div>
        <div class="row" style="border:1px solid #aaaaaa; border-radius:2px;">
        	<div>
                <div class="col-md-8">
                    <h3 style="margin:20px;">Enter your email to unlock this AvidXchange <?php if(get_field('resource_type') == 'product-info'){ echo 'Product Information Document'; } else if(get_field('resource_type') == 'ebook'){ echo 'eBook'; } else if(get_field('resource_type') == 'whitepaper'){ echo 'Whitepaper'; } else if(get_field('resource_type') == 'testimonial'){ echo 'Testimonial'; }?></h3>
                </div>
                <div class="col-md-4">
                    <div style="margin-top:-10px;"><?php echo do_shortcode('[gravityform id=6 title=false description=false ajax=true tabindex=40]'); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div id="yesNewsSignup" class="container">
   		<div class="thirtyspacer"></div>
        <div class="row center" style="border:1px solid #aaaaaa; border-radius:2px; margin-left: 0px; margin-right: 0px;">
            <div class="col-md-12" style="margin:20px 0px;">
                <?php if(get_field('cta_intro')) { ?>
                	<p class="intro"><?php the_field('cta_intro'); ?></p>
                <?php } ?>
                <div class="tenspacer"></div>
                <div class="col-md-12">
               		<div class="hidesmall"><a href="<?php the_field('file'); ?>" class="secondarybutton mediumbutton" target="_blank"><?php the_field('cta_button_text'); ?></a></div>
                	<div class="showsmall"><a href="<?php the_field('file'); ?>" class="secondarybuttonlong mediumbuttonlong" target="_blank"><div><?php the_field('cta_button_text'); ?></div></a></div>
        		</div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row rowpadding">
            <div class="col-md-6 col-sm-6 medcrunch">
                <?php if ( has_post_thumbnail() ) {the_post_thumbnail('medium');} ?>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4>What's Inside</h4> 
                <div><?php the_field('whats_inside'); ?></div>
                <?php if( get_field('excerpt') ): ?>
                    <div class="thirtyspacer"></div>
                    <h4>Excerpt</h4>
                    <div class="excerpt"><?php the_field('excerpt'); ?></div>
                <?php endif; ?>
                <div class="fourtyspacer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
 <?php } else if(get_field('resource_type') == 'webinar') { ?> 
 	<?php if(get_field('webinar_type') == 'upcoming') { ?> 
		<div class="container">
			<div class="row rowpadding">
				<div class="col-md-8 col-sm-6">
					<h4>About the Webinar:</h4> 
					<div><?php the_field('about_webinar'); ?></div>
					<div class="thirtyspacer"></div>
					<h4>Discussion Topics:</h4>
					<div><?php the_field('topics'); ?></div>
					<div class="thirtyspacer"></div>
					<h4>Hosted By:</h4>
					<?php if( get_field('host_picture') ): ?>
						<?php $lidimg = get_field('host_picture');
						$size = 'thumbnail';
						$lid3mg = wp_get_attachment_image_src($lidimg, $size); ?>
						<div class="webbiopic">
							<img src="<?php echo $lid3mg[0]; ?>" />
						</div>
					<?php endif; ?>
					<div class="webbio">
						<h5 style="margin-bottom:4px; margin-top:8px;"><?php the_field('host_name'); ?></h5>
						<?php if( get_field('linkedin_url') ): ?>
							<div class="linkdin"><a href="<?php the_field('linkedin_url'); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i> LinkedIn</a></div>
						<?php endif; ?>
						<div class="tenspacer"></div>
						<div><?php the_field('host_bio'); ?></div>
					</div>
					<div class="fourtyspacer"></div>
				</div>
				<div class="col-md-4 col-sm-6" style="float:right;">
					<div class="demoform2">
					<div style="padding-left:10px; padding-right:10px;">
					<?php $date = get_field('webinar_date');
					$date = new DateTime($date); ?>
						<h5>Register for the Webinar</h5>
						<div><span style="font-weight:500;">Date:</span>&nbsp;&nbsp;&nbsp;<?php echo $date->format('D, M d, Y'); ?></div>
						<div><span style="font-weight:500;">Time:</span>&nbsp;&nbsp;&nbsp;<?php the_field('webinar_time'); ?></div>
						<div><span style="font-weight:500;">Duration:</span>&nbsp;&nbsp;&nbsp;<?php the_field('webinar_duration'); ?></div>
					</div>
					<?php echo do_shortcode('[gravityform id=10 field_values="webinarname='.get_the_title().'" title=false description=false ajax=true tabindex=40]'); ?>
					<div style="font-size:14px; text-align:center; padding-bottom:20px">Even if you can’t make it, sign up anyway!<br />We’ll send you the recording.</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	<?php } else { ?>
		<div class="container">
			<div class="row rowpadding">
				<?php if( get_field('show_about') == 'No' or get_field('show_about') == '' ): ?>
					<div class="col-md-8 col-sm-7">
				<?php endif;?>
				<?php if( get_field('show_about') == 'Yes' ): ?>
					<div class="col-md-7">
				<?php endif;?>
					<div>
					<?php $scsize = get_field('webinar_video_size'); 
						if($scsize == 'full') {
							$padsize = '75.25';
						} else {
							$padsize = '56.25';
						}
					?>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('webinar_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:<?php echo $padsize; ?>% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('webinar_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
					<div class="twentyspacer"></div>
					<?php if( get_field('show_about') == 'No' or get_field('show_about') == '' ): ?>
						<h4>Webinar Transcription</h4>
						<div><?php the_field('webinar_transcription'); ?></div>
               		<?php endif;?>
                </div>
                <?php if( get_field('show_about') == 'No' or get_field('show_about') == '' ): ?>
					<div class="col-md-4 col-sm-5">
				<?php endif;?>
				<?php if( get_field('show_about') == 'Yes' ): ?>
					<div class="col-md-5">
				<?php endif;?>
					<?php if( get_field('show_about') == 'No' or get_field('show_about') == '' ): ?>
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("OnDemand Webinar Sidebar") ) : ?>
						<?php endif;?>
					<?php endif;?>
					<?php if( get_field('show_about') == 'Yes' ): ?>
						<h4>About the Webinar</h4>
						<p><?php the_field('about_webinar'); ?></p>
					<?php endif;?>
				</div>
				<div class="clearfix"></div>
			<?php if( get_field('show_about') == 'Yes' ): ?>
					<div class="col-sm-12">
						<div style="border: 1px solid #1e95d3; border-radius: 10px; padding: 25px; margin: 25px 0;">
						<h6 style="text-align: center; max-width: 850px; margin: auto;">Interested in learning more from an AP Automation expert?</h6>
						<div class="twentyspacer"></div>
						<div style="text-align: center;"><a title="Request a Call" class="ctabutton mediumbutton" data-toggle="modal" data-target="#intModal">Request a Call</a></div>
						</div>
					</div>
			<?php endif;?>
		</div>
		</div>
	<?php } ?>
 <?php } else { /* video */ ?>
	 <div class="container">
        <div class="row rowpadding">
            <div class="col-md-6 col-sm-6">
                <div>
					<?php $scsize2 = get_field('video_size'); 
						if($scsize2 == 'full') {
							$padsize2 = '75.25';
						} else {
							$padsize2 = '56.25';
						}
					?>
                <script src="//fast.wistia.com/embed/medias/<?php the_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:<?php echo $padsize2; ?>% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h4>What's Inside</h4> 
                <div><?php the_field('whats_inside_video'); ?></div>
                <?php if( get_field('excerpt_video') ): ?>
                    <div class="thirtyspacer"></div>
                    <h4>Excerpt</h4>
                    <div class="excerpt"><?php the_field('excerpt_video'); ?></div>
                <?php endif; ?>
                <div class="fourtyspacer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php } ?>
    
    
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
jQuery(document).ready(function($) {
	var x = readCookie('newsubcookie')
	if (x) { /* exists */
		$('#noNewsSignup').css('display','none');
		$('#yesNewsSignup').css('display','block');
	}
});
</script>

<?php get_footer(); ?>