<?php
/**
 * Template Name: Page - Suppliers Landing Page
 * Description: Used as a page template to show page Suppliers
 */
 ?>

<?php get_header(); ?>
</div>

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

<div class="headerbluebg">
<div class="xbglg">
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
        <div class="col-md-8 col-md-offset-2 col-sm-12">
            <div style="text-align: center; padding-top:50px;">
            <?php $ccount = 1; ?>
            	<?php if( have_rows('top_circles') ): 
            		while ( have_rows('top_circles') ) : the_row();?>
                    	<?php $ind2img = get_sub_field('circle_image');
                        $size = 'thumbnail';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                        <div class="solsec col-md-4">
                            <div class="solfilters"><a class="scroll" href="<?php if($ccount == 1){ echo '#poa'; }else if($ccount == 2){ echo '#bse'; } else{ echo '#iap'; } ?>">
                                <?php if($ccount <= 2){ ?><div class="solcar"><img src="/wp-content/uploads/rightgreencaret.svg" /></div><?php } ?>
                                <div style="max-width:100px; margin:auto;"><img src="<?php echo $in2img[0]; ?>" /></div>
                                <div class="soltext" style="color:#ffffff; text-decoration: none;"><?php the_sub_field('circle_label'); ?></div></a>
                            </div>
                        </div>
                        <?php $ccount++; ?>
                    <?php endwhile; wp_reset_query();  ?>
				<?php else :
                    // no rows found
                endif;
                ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div></div></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="row center">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="fiftyspacer"></div>
            <?php if(get_field('main_video_description')): ?>
                <p class="intro" style="padding-left:15px; padding-right:15px;"><?php the_field('main_video_description'); ?></p>
                <div class="tenspacer"></div>
            <?php endif; ?>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div><a class="secondarybutton largebutton" style="padding:12px 50px;" data-toggle="modal" data-target="#myModal">Watch Video&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="padding-bottom: 3px;" src="/wp-content/uploads/2017/02/thinarrow.png" /></i></a>
                </div>
            </div>
    	</div>
	</div>
        <!-- get total number of rows -->
        <?php if( have_rows('solutions') ):
            $my_fields = get_field_object('solutions');
            $count = (count($my_fields['value']));
        endif;?>
        <?php $galt = 0; $solt = 1; $altside = 0;
        if( have_rows('solutions') ): 
            while ( have_rows('solutions') ) : the_row();?>
            	<div class="site-inner container<?php //if($galt == 1) { echo '-fluid graybg nocpad'; } ?>" id="<?php if($solt == 1) { echo 'poa'; } 
					else if($solt == 2) { echo 'bse'; } 
					else if($solt == 3) { echo 'iap'; } 
					else if($solt == 4) { echo 'pap'; } 
					else if($solt == 5) { echo 'pse'; } ?>">
                	<?php //if($galt == 1) { echo '<div class="container">'; } ?>
                    <div class="row rowpadding">
                    <?php if($altside == 0) { ?>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 showsmall">
							<?php $ind2img = get_sub_field('item_image');
                            $size = 'medium';
                            $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                        <img class="sboxl2" src="<?php echo $in2img[0]; ?>" /></div>
                        <div class="col-md-5 col-md-offset-1 col-sm-6 rline">
                        	<div class="gdown"><img src="/wp-content/uploads/downgraycaret.svg" /></div>
                            <div class="servicesbox sboxl">	
                                <?php if(get_sub_field('item_title')) { ?>
                                    <h2><?php the_sub_field('item_title'); ?></h2>
                                <?php } ?>
                                <p><?php the_sub_field('item_content'); ?></p>
                                <?php if(get_sub_field('read_more_link')) { ?>
                                    <div><a class="defaultbutton smallbutton" href="<?php the_sub_field('read_more_link'); ?>">Read More</a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 taleft hidesmall"><img class="sboxr2" src="<?php echo $in2img[0]; ?>" /></div>
                        <div class="clearfix"></div>
                        <?php $altside = 1; ?>
                    <?php } else { ?>
						<?php $ind2img = get_sub_field('item_image');
                        $size = 'medium';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                        <div class="col-md-5 col-md-offset-1 col-sm-6"><img class="sboxl2" src="<?php echo $in2img[0]; ?>" />
                        	
                        </div>
                        <div class="col-md-5 col-sm-6 lline">
                        	<div class="gdownl"><img src="/wp-content/uploads/downgraycaret.svg" /></div>
                            <div class="servicesbox sboxr">	
                                <?php if(get_sub_field('item_title')) { ?>
                                    <h2 class=""><?php the_sub_field('item_title'); ?></h2>
                                <?php } ?>
                                <p><?php the_sub_field('item_content'); ?></p>
                                <?php if(get_sub_field('read_more_link')) { ?>
                                    <div><a class="defaultbutton smallbutton" href="<?php the_sub_field('read_more_link'); ?>">Read More</a></div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <?php $altside = 0; ?>
                    <?php } ?>
                    </div>
                    <?php $solt++; ?>
                    <?php //if($galt == 1) { echo '</div>'; } ?>
                	<?php if($galt == 0) { $galt = 1; } else { $galt = 0; } ?>
                </div>
            <?php endwhile; wp_reset_query();  ?>
        <?php else :
            // no rows found
        endif;
        ?>
    </div>
    
    <div class="clearfix"></div>
    <!--<div class="row center">
        <div class="col-md-12">
            <div class="fourtyspacer"></div>
            <div><a class="ctabutton mediumbutton" href="/suppliers/get-started/">Join the Supplier Network</a></div>
        </div>
        <div class="clearfix"></div>
    </div> -->
            
    <div class="container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="quoteleft" style="color:#1e95d3;"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                <div class="sixtyspacer"></div>
                <p class="quote"><?php the_field('quote'); ?></p>
                <div class="twentyspacer"></div>
                <p><strong style="color:#00a04d;"><?php the_field('quote_attribution_name'); ?></strong><br />
                <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/solutions_script.js';?>"></script>

<?php get_footer(); ?>