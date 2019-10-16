
<?php get_header('new'); ?> 
</div>
<link rel='stylesheet' id='theme-styles-css'  href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/theme-styles.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css'  href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-theme-css'  href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='components-css'  href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/components.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='duplicate-post-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/duplicate-post/duplicate-post.css' type='text/css' media='all' />
<link rel='stylesheet' id='new-royalslider-core-css-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/new-royalslider/lib/royalslider/royalslider.css' type='text/css' media='all' />


<!--- form modal start (Embedded field values - DJ style) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
		<div class="modal-header"><h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=15 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
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


<div class="header-blog-inner">
<div class="hero-body">
<div class="container">
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
			<div class="row rowmargin-top">
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

		<div class="col-md-5 author-top">
		<div class="col-md-4 col-sm-4">
	<img src="<?php the_field('author_image'); ?> ">	
	</div>
	<div class="col-md-8 col-sm-8">
<h3>By: <?php the_field('author_name'); ?></h3>
<h3> <?php the_time('F h Y'); ?> </h3>
<a href="<?php the_field('author_linkText'); ?>"><img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/linkdin-green-1a.png"></a>
<a href="<?php the_field('author_linkText'); ?>"><img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/twitter-01-edita.png"></a>
<a href="<?php the_field('author_linkText'); ?>"><img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/09/facebook-logo-01-edita.png"></a>

	</div>

		
		</div>


				<?php if( get_field('show_about') == 'Yes' ): ?>
					<div class="col-md-12 blog-content">
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





<style>

.hero-body a {
    display: none;
}
.request-demo {
    	background-position: center top;
	margin-top:40px;
	padding-top:180px;
}

</style>


<div class="author-content">
<div class="container">
	<div class="col-md-4 col-sm-4">
	<?php echo get_avatar(get_the_author_meta('ID'), 96); ?>	
	</div>
	<div class="col-md-8 col-sm-8">
<h3><?php echo get_the_author_link(); ?></h3>
<p><?php echo get_the_author_meta('description'); ?></p>
<a href="<?php the_field('author_linkText'); ?>">Read More By <?php echo get_the_author_meta( 'first_name' ); ?></a>
	</div>

</div>
</div>

<div class="mix-post-outer mix-post-outer-margin">
	<div class="container">
<div class="mix-post-inner">
		<?php $wp_query = new WP_Query(array('post_type'=>'resources', 'post_status'=>'publish', 'posts_per_page'=>3)); ?>

		<?php if ( $wp_query->have_posts() ) : ?>
		 <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		<div class="mix-post-inner1">
		        <div  class="top-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>) !important;"></div>		
			<div class="mix-post-inner-desc">			
				<h2><?php echo get_the_title(); ?></h2>

				<p class="cat"> <?php 
		$terms = get_the_terms( $post->ID , 'category' );	
		$len = count($terms );
		foreach ( $terms as $index => $term ) {
			
			if ($index == $len - 1) {
        				echo $term->name." | ";    
			}
			else
			{
				echo $term->name.", ";
			}

		}

the_time('F Y'); 

?></p>

				<p>  <?php the_content(); ?> </p>
			<br><a href="<?php the_permalink(); ?>" class="learnmore">READ MORE > </a>
			</div>
		</div>

    		<?php endwhile; ?>
    <!-- end of the loop -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>
			<a href="/resource" class="loadmore">SEE ALL RESOURCES</a>

	</div>
</div>


<style>

.hero-body a {
    display: none;
}
.request-demo {
    	background-position: center top;
	margin-top:40px;
	padding-top:180px;
}

</style>



<div class="request-demo-out">
<div class="bottom-design"></div>
<section class="section request-demo" id="demoRequest">
	<div class="container">

	<h2 class="section-title is-white has-smaller-gap center">GET UPDATES FROM US TO YOUR INBOX</h2>
	<div class="form-outer-wrap">
	<?php echo do_shortcode( '[gravityform id="39" title="true" description="true"]' ); ?>
	</div>
	</div>
</section>
</div>





<script>
jQuery(document).ready(function($) {
	var x = readCookie('newsubcookie')
	if (x) { /* exists */
		$('#noNewsSignup').css('display','none');
		$('#yesNewsSignup').css('display','block');
	}
});
</script>

<?php get_footer( 'new' ); ?>