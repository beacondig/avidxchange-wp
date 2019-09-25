<?php
/**
 * Template Name: Page - Products
 * Description: Used as a page template to show product pages
 */
 ?>

<?php get_header(); ?>
</div>

<?php if( get_field('test_banner_image') ): ?>
	<?php $testimg = get_field('test_banner_image');
    $size = 'large-banner';
    $test1img = wp_get_attachment_image_src($testimg, $size); ?>
<?php endif; ?>
<style>
	
	.greenbottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
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
</style>

<!-- video modal start -->
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

<div class="headerbluebg <?php if(get_field('product_banner_image')): ?>custombg<?php endif; ?>">
<?php if(!get_field('product_banner_image')): ?>
	<div class="xbglg">
<?php endif; ?>
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p class="prod-bnd"><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div> 
<?php if(!get_field('product_banner_image')): ?>
	</div>
<?php endif; ?>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<?php if (  is_page(4296)) { ?>
	
	<?php } else { ?>
	<div class="container-fluid graybg nopadding hidden-xs">
			<div class="row">
				<div class="col-sm-12 nowrap center">
					<?php

						$defaults = array(
							'theme_location'  => 'products-menu',
							'container'       => false,
							'menu_class'      => 'menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);

						wp_nav_menu( $defaults );

					?>
				</div>
			</div>
	</div>
	<?php } ?>
	
	<?php if (  is_page(4296)) { ?>
	
	<?php } else { ?>
	<div class="container rowpadding">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="prod-intro"><?php the_field('prod_intro_title'); ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p><?php the_field('prod_intro'); ?></p>
			</div>
			<div class="col-md-6">
				<div>
        			<script src="//fast.wistia.com/embed/medias/<?php the_field('video_id'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video_id'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=false" style="height:100%;width:100%">&nbsp;</div></div></div>
        		</div>
			</div>
		</div>
		<div class="fiftyspacer"></div>
		<div class="row center">
			<div class="col-sm-12">
				<a id="DemoBtn" title="<?php the_field('demo_button_text'); ?>" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1"><?php the_field('demo_button_text'); ?></a>
			</div>
		</div>
	</div>
	<?php } ?>
 	<div class="container-fluid graybg rowpadding">
		<div class="container">
			<div class="row center">
				<div class="col-md-10 col-md-offset-1">
					<h2><?php the_field('prod_features_title'); ?></h2>
					<?php the_field('prod_features_intro'); ?>
				</div>
			</div>
			<?php if (  is_page(4296)) { ?>
				
					<div class="row center">
						<div class="col-sm-12">
							<div class="twentyspacer"></div>
							<a id="DemoBtn" title="Schedule a Demo" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1">Schedule a Demo</a>
						</div>
					</div>
				
			<?php } ?>
			
			<?php $row = 1;
			
			if( have_rows('details') ): while ( have_rows('details') ) : the_row();?>
				<div class="row rowpadding prod-details">
					<?php if ( $row == 1 ) { ?>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('detail_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic" src="<?php echo $int1img[0]; ?>" />
						</div>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('detail_title'); ?></h3>
							<?php the_sub_field('detail_points'); ?>
						</div>
					<?php } elseif ( $row == 2 ) { ?>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('detail_title'); ?></h3>
							<?php the_sub_field('detail_points'); ?>
						</div>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('detail_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic" src="<?php echo $int1img[0]; ?>" />
						</div>
					<?php } ?>
				</div>
			<?php if ($row==1) { $row++; } elseif ($row==2) {$row=1;}?>
			<?php endwhile; wp_reset_query();  ?>
        	<?php else :
             		// no rows found
            		endif;
         	 ?>
		</div>
	</div>
	
	<?php if( get_field('more') == 'Yes' ): ?>
	<div class="container rowpadding">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<h2><?php the_field('more_title'); ?></h2>
				<p><?php the_field('more_content'); ?></p>
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
					<a id="ctaDemoBtn" title="<?php the_field('cta_button_text'); ?>" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1"><?php the_field('cta_button_text'); ?></a>
				</div>
			</div>
		</div>
	</div>

	<div class="container center rowpadding">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<h2><?php the_field('int_title'); ?></h2>
				<p><?php the_field('int_copy'); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="center" style="padding:60px 15px 15px; ">
            		<div class="intgmag"><i class="fa fa-search" aria-hidden="true"></i></div>
            		<input type="text" id="intg-search-input" style="width:100%; padding:13px 13px 13px 47px; font-size:24px;" placeholder="Search 100+ integrations">
				</div>
			</div>
		</div>
		<div class="row rowpaddingbottom integrations-wrapper">
			<?php $query = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) );
					
				   while ( $query->have_posts() ) : $query->the_post(); ?>
					
			<div class="col-md-3 col-sm-4 integration-item threecrunch" data-letter="<?php echo strtoupper(substr(get_the_title(),0,1)); ?>" data-integration="<?php echo get_the_title(); ?>">
					<div class="intgbg hnores">
						<?php if(get_field('avid_partner') == "yes") { ?>
							<div class="ibanner"><img src="/wp-content/uploads/bannergray.svg" /></div>
							<div class="ibanner ibtop"><img src="/wp-content/uploads/bannergreen.svg" /></div>
							<div class="ibannertext"><span style="color:#4a4a4a;">Avid Partner</span></div>
							<div class="ibannertext ibtop">Avid Partner</div>
						<?php } ?>
						<div class="intimg">
							<?php $thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
							echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
						</div>
					</div>
            </div>
            
        <?php endwhile; wp_reset_query(); ?>
       </div>
</div>
	
	<div class="container-fluid noresultsdiv hnores" style="margin:0px 0px 40px;">
        <div class="container" style="width:100%;">
            <div class="clearfix"></div>
                <div class="col-md-12 center">
                    <div class="row">
                    	<p>Sorry, we couldn't find any accounting systems to match your search.</p>
                        <p><a href="/contact/">Contact Us</a> today to see if we can help.</p>
                    </div>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
	
<?php if (  is_page(4296)) { ?>
	
<?php } else { ?>
<div class="container-fluid testimonialbg testpadding">
	<div class="container center">
		<div class="row rowpadding">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="newquote"><?php the_field('quote'); ?></div>
				<div class="fiftyspacer"></div>
				<div class="quotename"><?php the_field('quote_attribution'); ?></div>
				<div class="quotecompany"><?php the_field('quote_attribution_company'); ?></div>
			</div>
		</div>
	</div>
</div>
	
<?php if( get_field('faqs') == 'Yes' ): ?>
		<div class="container rowpadding">
            <div class="row center">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2>Frequently Asked Questions</h2>
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
        	 
 
        </div>
<?php endif; ?>
	
	<div class="container-fluid graybg nopadding">
			<div class="row">
				<div class="col-sm-12 nowrap center">
					<?php

						$defaults = array(
							'theme_location'  => 'products-menu',
							'container'       => false,
							'menu_class'      => 'menu',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);

						wp_nav_menu( $defaults );

					?>
				</div>
			</div>
	</div>
<?php } ?>
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/integrations_script-full.js';?>"></script>

<?php get_footer(); ?>