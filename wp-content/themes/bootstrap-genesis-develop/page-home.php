<?php
/**
 * Template Name: Page - Home
 * Description: Used as a page template to show page Home
 */
 ?>

<?php get_header(); ?>
</div>

<header class="homeheadspacer">
<div class="container">
    <div class="row">
      <div class="col-xs-9 col-xs-offset-3 col-sm-6 col-sm-offset-6 col-xs-6 hero">
      	<div class="hidesmall2">
          <!--- arrows --->
          <div id="u2" class="ax_default image ax_default_hidden slide-in two" data-label="fwdArrows" style="visibility: inherit; display: block; left: -600px; top: -80px;">
            <img id="u2_img" class="img " src="/wp-content/uploads/2016/11/fwdarrows-sm.png">
            <!-- Unnamed () -->
            <div id="u3" class="text" style="display:none; visibility: hidden">
              <p><span></span></p>
            </div>
          </div>
            <div id="u67" class="ax_default heading_1" style="left: 225px; top: 10px;">
              <div id="u67_div" class=""></div>
              <div id="u68" class="text fade-in two">
                <p><span>We're delivering what's&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; for Accounts Payable &amp; Payment Automation for midsize businesses.</span></p>
              </div>
            </div>
            <div id="u69" class="ax_default image fade-in two" style="left: 553px; top: 11px;">
              <img id="u69_img" class="img " src="/wp-content/uploads/2016/11/NEXT-sm.png" width="103" height="28">
              <div id="u70" class="text" style="display:none; visibility: hidden">
                <p><span></span></p>
              </div>
            </div>
            <div id="u70" class="ax_default image fade-in four" style="left: 547px; top: 200px;">
                <a id="whatisnext" class="whitebutton smallbutton" style="line-height:1;" href="<?php the_field('banner_learn_more_link'); ?>">Learn More</a>
            </div>
         </div>
         <div class="showsmall2">
         	<div><p class="header-motext">We're delivering what's next for Accounts Payable &amp; Payment Automation for midsize businesses.</span></p></div>
         	<div class="btntsp"><a id="whatisnextmobile" class="whitebutton smallbutton" style="line-height:1;" href="<?php the_field('banner_learn_more_link'); ?>">Learn More</a></div>
         </div>
      </div>
    </div>
  </div>
  
  <svg class="blue-bg drop-in hidesmall2" viewBox="0 0 1400 766" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
            <stop stop-color="#199ED8" offset="0%"></stop>
            <stop stop-color="#116F97" offset="100%"></stop>
        </linearGradient>
    </defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon id="Rectangle" fill="url(#linearGradient-1)" points="0 0 1400 0 1400 766 0 100"></polygon>
    </g>
</svg>
<div class="blue-bg drop-in showsmall2"><img style="width:100%;" src="/wp-content/uploads/2016/11/blueanglebg_mobile.png" /></div>
<img class="hero-img fade-in one" src="/wp-content/uploads/2016/11/lady_u4-sm.png" />
</header>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
    
    <div class="sixtyspacerNoMobile"></div>
	<div class="site-inner container" style="margin-bottom:-30px;">
        <div class="row">
            <?php /*?><div class="col-md-6 col-sm-6">
                <div>
                <script src="//fast.wistia.com/embed/medias/<?php the_field('ap_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('ap_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="fourtyspacer"></div>
                <div class="center"><a class="secondarybutton mediumbutton" style="line-height:1;" href="<?php the_field('learn_more_link'); ?>">Learn More</a></div>
                <div class="sixtyspacer"></div>
            </div><?php */?>
        	<div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-11 whatisapspacer new12break"> <!--- <div class="col-md-6 col-sm-6 whatisapspacer"> --->
                <h2><?php the_field('ap_title'); ?></h2>
                <p><?php the_field('ap_content'); ?></p>
                <div class="twentyspacer"></div>
                <div><a id="whatisap" class="secondarybutton mediumbutton" style="line-height:1;" href="<?php the_field('learn_more_link'); ?>">Learn More</a></div>
                <div class="fourtyspacer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="greenhometopsliver"></div>
    <div class="container-fluid homegreenbanner">
    	<div class="container">
            <div class="row center homegreenpadding">
                <div class="col-md-6 col-sm-6">
                <div><i class="fa fa-quote-left" aria-hidden="true" style="color: #ffffff; font-size:48px; padding-bottom:20px;"></i></div>
                    <p class="quote"><?php the_field('quote'); ?></p>
                    <div class="twentyspacer"></div>
                    <p><strong><?php the_field('quote_attribution_name'); ?></strong><br />
                    <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
                    <div class="fourtyspacer"></div>
                </div>
            	<div class="col-md-6 col-sm-6">
                    <div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('quote_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('quote_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                    </div>
                    <div class="fourtyspacer"></div>
                	<div class="center"><a id="greensectionvideo" class="whiteogbutton mediumbutton" style="line-height:1;" href="<?php the_field('quote_learn_more_link'); ?>">Learn More</a></div>
                    <div class="twentyspacer"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="greenhomebottomsliver"></div>
    
    <div class="sixtyspacer"></div>
    <div class="site-inner container">
        <div class="row rowpadding">
            <div class="col-md-5 col-md-offset-1 col-sm-6 medcrunchoffset" style="text-align:right;">
            	<?php if( get_field('integrates_image') ): ?>
                	<?php $ind2img = get_field('integrates_image');
                    $size = 'medium';
                    $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                	<p><img src="<?php echo $in2img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
        	<div class="col-md-5 col-sm-6">
            	<h2 style="font-weight:300; line-height:1.0;"><?php the_field('integrates_title'); ?></h2>
                <?php if(get_field('integrates_description')) : ?>
                	<div class="tenspacer"></div>
                	<div><?php the_field('integrates_description'); ?></div>
                <?php endif; ?>
                <div class="tenspacer"></div>
                <a id="int100" class="secondarybutton mediumbutton" style="float:left; line-height:1;" href="<?php the_field('learn_more_link2'); ?>">Learn More</a>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    <div class="eightyspacer"></div>
    
    <div class="container-fluid homebluebanner">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('leaders_title'); ?></h2>
                    <div class="twentyspacer"></div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                	<div class="ieflexholder">
					<?php if( have_rows('leaders_images') ): 
                        while ( have_rows('leaders_images') ) : the_row();?>
                            <div style="display:inline-block; padding:30px 50px;">
								<?php if( get_sub_field('image') ): ?>
                                    <?php $thumb_id = get_sub_field('image');
                                    $thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
                                    echo '<p><img src="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="leadericons" /></p>'; ?>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; wp_reset_query();  ?>
                    <?php else :
                        // no rows found
                    endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('news_title'); ?></h2>
                <div class="thirtyspacer"></div>
                <!-----   news loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-4 col-sm-6 medcrunch">
                    	<div style="max-width:320px; margin: auto;">
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
                         <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a id="seeallnews" class="secondarybutton mediumbutton" style="line-height:5;" href="/news/">See All News</a></div>
            </div>
                <div class="twentyspacer"></div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('resources_title'); ?></h2>
                <div class="fiftyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<div class="col-md-4 col-sm-6 otherheights" style="padding-left:0px; padding-right:0px;">
                    	<div style="max-width:320px; margin: auto;">
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
                        <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a id="viewallresources" class="secondarybutton mediumbutton" style="line-height:4;" href="/resources/">View All Resources</a></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('grow_title'); ?></h2>
                <div class="fiftyspacer"></div>
                <?php if( get_field('grow_image') ): ?>
					<?php $thumb_id = get_field('grow_image');
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
                            echo '<p><img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" /></p>'; ?>
                    
                    
                <?php endif; ?>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>