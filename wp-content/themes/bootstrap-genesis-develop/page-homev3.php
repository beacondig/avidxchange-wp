<?php
/**
 * Template Name: Page - Home V3
 * Description: Used as a page template to show the newest homepage
 */
 ?>

<?php get_header(); ?>
</div>
<?php if( get_field('home_banner_image') ): ?>
	<?php $bnimg = get_field('home_banner_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>
<?php if( get_field('test_banner_image') ): ?>
	<?php $testimg = get_field('test_banner_image');
    $size = 'large-banner';
    $test1img = wp_get_attachment_image_src($testimg, $size); ?>
<?php endif; ?>
<style>
	
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}

.custombg {	
	background-image: -webkit-linear-gradient(257deg, rgba(8,112,166,0.85) 0%, rgba(0,78,116,0.85) 100%), url("<?php echo $bn1img[0]; ?>");
	background-image: linear-gradient(257deg, rgba(8,112,166,0.85) 0%,rgba(0,78,116,0.85) 100%), url("<?php echo $bn1img[0]; ?>");
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:600px;
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
	
	.social-links {
	margin:25px 0;
	padding:0;
	}
	
	.social-links li {
		display:inline-block;
		list-style:none;
		padding:0 10px;
		vertical-align:top;
	}
}
	
</style>


<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('header_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('header_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- video modal end -->

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



<div class="vid-header headerbluebg">
	<video class="video hidden-sm hidden-xs" autoplay muted loop>
   		<source src="<?php the_field('video_url'); ?>" type="video/mp4">
 	</video>
	<div class="container mobilesquish">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<?php if( get_field('banner_description') ): ?>
					<p class="prod-bnd"><?php the_field('banner_description'); ?></p>
				<?php endif; ?>
				<div class="center homeherovid hidden-xs"><a id="heroVideoBtn" data-toggle="modal" data-target="#myModal"><i class="fa fa-play"></i></a></div>
				<div class="center"><a id="heroSolutionsBtn" title="AP Automation" class="secondarybutton largebutton" href="/ap-automation/"><?php the_field('solutions_btn_text'); ?></a></div>
			</div>
		</div>
	</div>
</div>
<?php if( get_field('announcement_banner') == 'Yes' ): ?>
<div class="announce-banner">
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				<p><?php the_field('announce_text'); ?></p>
			</div>
			<div class="col-sm-3">
				<a id="PRBtn" title="Learn More" class="ctabutton mediumbutton" href="<?php the_field('news_url'); ?>">Learn More</a>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
<div class="whitebg">
<div class="container">
	<div class="row rowpadding center">
		<div class="col-md-10 col-md-offset-1">
			<h2><?php the_field('demo_section_title'); ?></h2>
			<p><?php the_field('demo_section_intro_copy'); ?></p>
		</div>
	</div>
	<div class="row rowcenter">
		<div class="col-md-6">
			<h3 class="alt-title"><?php the_field('p2p_title'); ?></h3>
			<p><?php the_field('p2p_copy'); ?></p>
			<div class="twentyspacer"></div>
			<div class="center"><a id="p2pSolutionsBtn" title="<?php the_field('p2p_btn_text'); ?>" class="secondarybutton mediumbutton" href="/ap-automation/"><?php the_field('p2p_btn_text'); ?></a></div>
			<div class="fiftyspacer"></div>
			<div class="row">
				<div class="col-md-6 col-sm-4 col-md-offset-0 col-sm-offset-2">
					<a id="invoiceLink" href="/ap-automation/invoice/" title="E Invoicing Software"><i class="fa fa-chevron-right"></i> Invoice Application</a><br />
					<a id="paymentLink" href="/ap-automation/payment/" title="Electronic Payment Systems"><i class="fa fa-chevron-right"></i> Payment Application</a>
				</div>
				<div class="col-md-6 col-sm-4">
					<a id="procureLink" href="/procure-to-pay/" title="Procure-to-Pay"><i class="fa fa-chevron-right"></i> Procure-to-Pay</a><br />
					<a id="poLink" href="/ap-automation/purchase-order/" title="Purchase Order"><i class="fa fa-chevron-right"></i> Purchase Order</a>
				</div>
			</div>
		</div>
		<div class="fiftyspacer hidden-md hidden-lg"></div>
		<div class="col-md-6">
			<div class="fiftyspacer hidden-sm hidden-xs"></div>
			<div>
        	<script src="//fast.wistia.com/embed/medias/<?php the_field('demo_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('demo_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=false" style="height:100%;width:100%">&nbsp;</div></div></div>
        	</div>
		</div>
	</div>
</div>
<div class="fiftyspacer"></div>
</div>
<div class="container-fluid graybg">
	<div class="container center rowpadding">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2><?php the_field('int_title'); ?></h2>
				<p><?php the_field('int_copy'); ?></p>
			</div>
		</div>
		<div class="fiftyspacer hidden-sm hidden-xs"></div>
		<div class="row introw">
			<div class="col-md-10 col-md-offset-1 hidden-sm hidden-xs">
				<?php $int = 1;
						
					if( have_rows('integrations') ): while ( have_rows('integrations') ) : the_row();?>
					
					<div class="col-sm-4">
						<?php $intimg = get_sub_field('int_image');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
						<a href="<?php the_sub_field('int_url'); ?>"><img class="intlogo" src="<?php echo $int1img[0]; ?>" /></a>
					</div>
					
					<?php if( $int == 3 ) { ?>
						<div class="clearfix"></div>
					<?php } ?>
					
				<?php $int++; ?>
             	<?php endwhile; wp_reset_query();  ?>
        	 	<?php else :
             		// no rows found
            	endif;
         	 	?>
			</div>
		</div>
		<div class="fiftyspacer"></div>
		<div class="row">
			<div class="col-sm-12">
				<a id="integrationsBtn" title="<?php the_field('int_btn_text'); ?>" class="secondarybutton mediumbutton" href="/integrations/"><?php the_field('int_btn_text'); ?></a>
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
<div class="whitebg">
<div class="container rowpadding">
	<div class="row center">
		<div class="col-sm-12">
			<h2><?php the_field('resource_title'); ?></h2>
		</div>
	</div>
	<div class="row center">
        	<div class="col-md-12 col-sm-12">
                <div class="fiftyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<div class="col-md-4 col-sm-6 otherheights" style="padding-left:0px; padding-right:0px;">
                    	<div style="max-width:320px; margin: 0 auto 20px;">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="resourceloopitem" style="min-height:600px;">
                                    <div class="grid">
                                        <figure class="effect-jazz">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            	<?php $thumb_id = get_post_thumbnail_id();
												$thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
												echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
                                             <?php } ?>
                                            <figcaption>
                                                <p><span class="whitehover">Read More</span></p>
                                            </figcaption>			
                                        </figure>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="fancyline2"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo the_field('resource_type'); ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                                    <h6 style="font-size:18px;"><?php echo the_title(); ?></h6>
                                    <p class="credits"><p><?php the_field('mini_description'); ?></p></p>
                            </div>
                        </a>
						</div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
				<div class="fiftyspacer"></div>
                <div><a id="viewallresources" class="secondarybutton mediumbutton" style="line-height:4;" href="/resources/">View All Resources</a></div>
                <div class="fiftyspacer"></div>
            </div>
        </div>
        <div class="row center">
			<div class="col-sm-12">
				<h2><?php the_field('news_title'); ?></h2>
			</div>
		</div>
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
               <div class="fiftyspacer"></div>
                <!-----   news loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-4 col-sm-6 medcrunch">
                    	<div style="max-width:320px; margin: 0 auto 20px;">
                    	<a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="newsloopitem">
                                <?php /*?><div class="grid">
                                    <figure class="effect-jazz">
                                        <?php if ( has_post_thumbnail() ) { ?>
											<?php $thumb_id = get_post_thumbnail_id();
                                            $thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
                                            echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
                                         <?php } ?>
                                        <figcaption>
                                            <p><span class="whitehover">Read More</span></p>
                                        </figcaption>			
                                    </figure>
                                </div><?php */?>
                                <div class="clearfix"></div>
                                <h6 style="font-size:18px;"><?php echo get_the_title(); ?></h6>
                                <?php /*?><p><?php the_excerpt(); ?></p><?php */?>
                                <p class="credits">Posted on <?php echo get_the_date(); ?> <em>by <?php echo get_the_author_link(); ?></em></p>
                            </div>
                         </a>
                         </div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a id="seeallnews" class="secondarybutton mediumbutton" style="line-height:5;" href="/news/">See All News</a></div>
            </div>
                <div class="twentyspacer"></div>
        </div>
</div>
</div>
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

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>

<?php get_footer(); ?>