<?php
/**
 * Template Name: Page - Ariett Landing 
 * Description: Used as a page template to show page Arriet Landing
 */
 ?>

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

<?php get_header(); ?>
</div>
<!--- form modal start (blue modal) --->
<div class="modal fade" id="intModal" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6 class="ab1">Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=30 title=false description=false ajax=true tabindex=49]'); ?></div></div>
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
                <div><a class="whitebuttonlong mediumbuttonlong" data-toggle="modal" data-target="#intModal"><div><?php the_field('banner_link_label'); ?></div></a></div>
                <div class="tenspacer"></div>
                <?php $loopchk = new WP_Query( array( 'post_type' => 'resources', 'category_name' => $allCategory, 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
                <?php $chkcount = $loopchk->post_count; ?>
               	<div class="ltc" style="font-size:16px; text-align:center;"><a href="<?php the_field('under_button_link'); ?>" style="color:#ffffff!important; text-decoration:none!important;"><?php the_field('under_button_link_text'); ?></a></div>
            </div>
            <div class="fourtyspacer"></div>
        </div>
        <div class="col-md-5 col-md-offset-1 col-sm-6 threecrunchoffset">
        	<?php if( get_field('brand_logo') ): ?>
        		<?php $hdimg = get_field('brand_logo');
					$size = 'large';
					$himg = wp_get_attachment_image_src($hdimg, $size); ?>
                <p><img src="<?php echo $himg[0]; ?>" class="brandlogo" /></p>
            <?php endif; ?>
        </div>
    </div>
</div></div></div>
<div class="greentopsliver"></div>

<style>
.bluebottomsliver {
	display:none!important;
}
footer.container {
    margin-top: 0px!important;
}
</style>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="site-inner container">
		
		<?php $row = 1;
			
			if( have_rows('features') ): while ( have_rows('features') ) : the_row();?>
				<div class="row rowpadding prod-details">
					<?php if ( $row == 1 ) { ?>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
					<?php } elseif ( $row == 2 ) { ?>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
					<?php } ?>
				</div>
			<?php if ($row==1) { $row++; } elseif ($row==2) {$row=1;}?>
			<?php endwhile; wp_reset_query();  ?>
        	<?php else :
             		// no rows found
            		endif;
     ?>
		
		
		
        <div class="row center">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <h2 style="padding-top:60px;"><?php the_field('intro_title'); ?></h2>
                <div class="separator"></div>
                <p><?php the_field('intro_content'); ?></p>
                <div class="fourtyspacer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
    <div class="container-fluid graybg">
    	<div class="container">
			<div class="row center rowpadding">
				<div class="col-sm-12">
					<div class="quoteleft" style="color:#1e95d3;"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
					<div class="sixtyspacer"></div>
					<p class="quote" style="font-size:21px;line-height:36px;"><?php the_field('quote'); ?></p>
					<div class="twentyspacer"></div>
					<div style="text-align:left; width: 300px; margin: auto;">
						<?php if( get_field('quote_image') ): ?>
							<?php $qtimg = get_field('quote_image');
							$size = 'small';
							$qimg = wp_get_attachment_image_src($qtimg, $size); ?>
							<div style="float:left; margin-top: -10px;padding-right: 15px;"><img style="width:72px;height:72px;border-radius: 50%;" src="<?php echo $qimg[0]; ?>" /></div>
						<?php endif; ?>
						<strong style="color:#00a04d;"><?php the_field('quote_attribution_name'); ?></strong><br />
						<span style="font-size:16px;"><?php the_field('quote_attribution_company'); ?></span>
					</div>
					<div class="twentyspacer"></div>
				</div>
			</div>
		</div>
    </div>
    <a name="relres"></a>
	<div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2>Related Case Studies</h2>
                <div class="fiftyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'tag' => 'Ariett', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
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
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
	
	
	<div class="site-inner container">
        <div class="row center">
			<div class="col-sm-12">
            	<h2>Related Blog Posts</h2>
                <div class="fiftyspacer"></div>
			</div>
        	<div class="col-md-6 col-sm-12">
                <!-----   resources loop ---->
                <?php $i=0; $loop = new WP_Query( array( 'posts_per_page' => 3, 'tag' => 'Ariett', 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); $i++;?>
                	<div class="col-sm-12">
                    	<div id="ds-<?php echo $i; ?>" class="siderelatedtitle">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div>
								<div class="clearfix"></div>
								<h6 style="font-size:22px;line-height:33px;font-weight:bold;text-align:left;"><?php echo the_title(); ?></h6>
								<div style="font-size:14px;color:#979797;text-align:left;margin-top:-8px;"><?php the_time('F jS, Y') ?></div>
                            </div>
                        </a>
                        </div>
                    </div>
				<?php endwhile; wp_reset_query(); ?>
				<div class="seeallbutton"><a id="viewallresources" class="secondarybutton mediumbutton" style="line-height:4;" href="/blog/">See All Posts</a></div>
            </div>
			<div class="col-md-6 hidden-pics">
				<div class="col-sm-12">
					<!-----   resources loop ---->
					<?php $i=0; $loop = new WP_Query( array( 'posts_per_page' => 3, 'tag' => 'Ariett', 'order' => 'DESC' ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post();  $i++; ?>
						<div class="hidden-sm" id="dc-<?php echo $i; ?>" style="max-width:480px; margin: auto; position:absolute;top:0px;width:100%;<?php if($i != 1){ echo 'display:none;'; } ?>">
						<a class="loopnews" href="<?php the_permalink(); ?>">
							<div>
								<?php if ( has_post_thumbnail() ) { ?>
									<?php $thumb_id = get_post_thumbnail_id();
									$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);
									echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
								 <?php } ?>
							</div>
						</a>
						</div>
						<div class="twentyspacer"></div>
					<?php endwhile; wp_reset_query(); ?>
				</div>
            </div>
			<div class="clearfix"></div>
			<div class="twentyspacer"></div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
//put your data to work js
jQuery( document ).ready(function() {
  jQuery("#ds-1,#ds-2,#ds-3").on("hover", function( event ) {
	  if ( window.innerWidth > 767 ) {
	  	event.preventDefault();
		  jQuery("#ds-1,#ds-2,#ds-3").removeClass('on');
		  jQuery(this).addClass('on');
		  if(jQuery('#ds-3').hasClass('on')){
			  jQuery('#dc-3').show();
			  jQuery('#dc-1,#dc-2').hide();
		  }else if(jQuery('#ds-2').hasClass('on')){
			  jQuery('#dc-2').show();
			  jQuery('#dc-1, #dc-3').hide();
		  }else if(jQuery('#ds-1').hasClass('on')){
			  jQuery('#dc-1').show();
			  jQuery('#dc-2,#dc-3').hide();
		  }else{
			  jQuery('#dc-1').show();
			  jQuery('#dc-2,#dc-3').hide();
		  }
	  }
   });
});
</script>

<?php get_footer(); ?>