<?php
/**
 * Template Name: Page - Branded Landing 
 * Description: Used as a page template to show page Branded Landing
 */
 ?>

<?php get_header(); ?>
</div>
<style>
body {
	background-color:<?php the_field('main_background_color'); ?>
}
.hfeed {
	color:<?php the_field('main_font_color'); ?>;
}
.hfeed h2 {
	color:<?php the_field('heading_font_color'); ?>;
}
.hfeed h3, .hfeed h4, .hfeed h5, .hfeed h6 {
	color:<?php the_field('subheading_font_color'); ?>;
}
.graybg {
	background-image: linear-gradient(215deg, <?php the_field('alternate_background_gradient_color_right'); ?> 0%, <?php the_field('alternate_background_gradient_color_left'); ?> 100%);
	color:<?php the_field('alternate_background_font_color'); ?>;
}
.graybg h2 {
	color:<?php the_field('alternate_background_heading_color'); ?>;
}
.graybg h3, .graybg h4, .graybg h5, .graybg h6 {
	color:<?php the_field('alternate_background_subheading_color'); ?>;
}
a.custombutton {
	border-radius: 2px;
	font-weight:500;
	color: <?php the_field('button_text_color'); ?>!important;
	background-color: <?php the_field('button_color'); ?>;
	white-space:nowrap;
}
a.custombutton:hover {
	border-radius: 2px;
	color: <?php the_field('button_text_color'); ?>!important;
	background-color: <?php the_field('button_hover_color'); ?>;
	text-decoration:none!important;
}
a.altcustombutton {
	border-radius: 2px;
	font-weight:500;
	color: <?php the_field('alternate_button_text_color'); ?>!important;
	background-color: <?php the_field('alternate_button_color'); ?>;
	white-space:nowrap;
}
a.altcustombutton:hover {
	border-radius: 2px;
	color: <?php the_field('alternate_button_text_color'); ?>!important;
	background-color: <?php the_field('alternate_button_hover_color'); ?>;
	text-decoration:none!important;
}
.greenbottomsliver, .bluebottomsliver {
	display:none!important;
}
footer.container {
    margin-top: 0px!important;
}
</style>
<div class="headerbluebg" style="background-image: linear-gradient(215deg, <?php the_field('banner_gradient_color_right'); ?> 0%, <?php the_field('banner_gradient_color_left'); ?> 100%); color: <?php the_field('banner_font_color'); ?>;">
<div class="container mobilesquish">
	<div class="row">
		<div class="col-md-6" style="text-align:left;">
            <h1 class="bbh1" style="padding-bottom:20px;"><?php the_field('banner_title'); ?></h1>
            <?php if( get_field('banner_description') ): ?>
                <p class="intro"><?php the_field('banner_description'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 medcrunch">
            <?php if( get_field('brand_logo') ): ?>
        		<?php $hdimg = get_field('brand_logo');
					$size = 'medium';
					$himg = wp_get_attachment_image_src($hdimg, $size); ?>
                <p><img src="<?php echo $himg[0]; ?>" class="brandlogo" /></p>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 center">
            <?php if(get_field('banner_link_url')): ?>
                <div><a class="custombutton mediumbutton" href="<?php the_field('banner_link_url'); ?>"><?php the_field('banner_link_label'); ?></a></div>
            <?php endif; ?>
        </div>
    </div>
</div></div>
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="site-inner container">
        <div class="row center rowbottompadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('intro_title'); ?></h2>
                <div class="separator"></div>
                <p><?php the_field('intro_content'); ?></p>
                <div class="fourtyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div>
                <script src="//fast.wistia.com/embed/medias/<?php the_field('about_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('about_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h3><?php the_field('about_title'); ?></h3>
                <p><?php the_field('about_content'); ?></p>
                <?php if(get_field('learn_more_link')): ?>
                <div><a class="custombutton mediumbutton" href="<?php the_field('learn_more_link'); ?>">Learn More</a></div>
                <?php endif; ?>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid graybg">
    	<div class="container">
            <div class="row center rowpadding">
            	<div class="col-md-12"><div class="fourtyspacer"></div></div>
                <?php if( get_field('quote_image') ) { ?>
                    <div class="col-md-6" style="text-align:left;">
                        <div class="quoteleft"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                        <p class="intro" style="margin-left:42px;"><?php the_field('quote'); ?></p>
                        <p class="attribution" style="margin-left:42px;"><?php the_field('quote_attribution'); ?></p>
                        <div class="twentyspacer"></div>
                    </div>
                    <div class="col-md-6 medcrunch">
                        <?php if( get_field('quote_image') ): ?>
                            <?php $qtimg = get_field('quote_image');
                            $size = 'medium';
                            $qimg = wp_get_attachment_image_src($qtimg, $size); ?>
                            <p><img src="<?php echo $qimg[0]; ?>" /></p>
                            <div class="twentyspacer"></div>
                        <?php endif; ?>
                    </div>
                <?php } else {?>
                	<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1" style="text-align:left;">
                        <div class="quoteleft"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                        <p class="intro" style="margin-left:42px;"><?php the_field('quote'); ?></p>
                        <p class="attribution" style="margin-left:42px;"><?php the_field('quote_attribution'); ?></p>
                        <div class="twentyspacer"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
    <?php if(get_field('industries_title')): ?>
    <div class="site-inner container">
        <div class="row center rowpadding">
            <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('industries_title'); ?></h2>
                <div class="separator"></div>
                <p class="intro"><?php the_field('industries_intro'); ?></p>
                <div class="fourtyspacer"></div>
            </div><div class="clearfix"></div>
             <?php $reo = 0;
			 if( have_rows('industries') ): 
					while ( have_rows('industries') ) : the_row();?>
                    	<?php if($reo == 0 ){
							$reo = 1; ?>
                            <div class="col-md-6" style="text-align:left;">
                                <h4 style="margin-top:0px;"><?php the_sub_field('industry_name'); ?></h4>
                                <p><?php the_sub_field('industry_description'); ?></p>
                                <div class="twentyspacer"></div>
                            </div>
                            <div class="col-md-6 medcrunch">
                                <?php if( get_sub_field('industry_image') ): ?>
                                	<?php $indimg = get_sub_field('industry_image');
									$size = 'medium';
									$inimg = wp_get_attachment_image_src($indimg, $size); ?>
                                    <p><img src="<?php echo $inimg[0]; ?>" /></p>
                                    <div class="twentyspacer"></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12"><div class="fourtyspacer"></div></div>
                        <?php } else {
							$reo = 0; ?>
                            <div class="col-md-6 medcrunch">
                                <?php if( get_sub_field('industry_image') ): ?>
                                	<?php $ind2img = get_sub_field('industry_image');
									$size = 'medium';
									$in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                                    <p><img src="<?php echo $in2img[0]; ?>" /></p>
                                    <div class="twentyspacer"></div>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6" style="text-align:left;">
                                <h4 style="margin-top:0px;"><?php the_sub_field('industry_name'); ?></h4>
                                <p><?php the_sub_field('industry_description'); ?></p>
                                <div class="twentyspacer"></div>
                            </div>
                            <div class="col-md-12"><div class="fourtyspacer"></div></div>
						<?php } ?>
                    <?php endwhile; wp_reset_query();  ?>
                <?php else :
					// no rows found
				endif;
				?>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if(get_field('partners_title')): ?>
    <div class="container-fluid graybg">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('partners_title'); ?></h2>
                    <div class="separator"></div>
                </div><div class="clearfix"></div>
                <?php if( have_rows('partners') ): 
					while ( have_rows('partners') ) : the_row();?>
                        <div class="col-md-6 partnerpadding" style="text-align:left;">
                        	<h3><?php the_sub_field('partner_name'); ?></h3>
                            <?php if(get_sub_field('partner_description')): ?>
                            	<p><?php the_sub_field('partner_description'); ?></p>
                            <?php endif; ?>
                            <?php if(get_sub_field('learn_more_link')): ?>
                            	<div><a class="altcustombutton mediumbutton" href="<?php the_sub_field('learn_more_link'); ?>">Learn More</a></div>
                            <div class="twentyspacer"></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; wp_reset_query(); ?>
                <?php else :
					// no rows found
				endif;
				?>
                <div class="clearfix"></div>
                <?php if(get_field('below_partners_text') || get_field('below_partners_link')): ?>
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="thirtyspacer"></div>
                	<?php if(get_field('below_partners_text')): ?>
                        <p><?php the_field('below_partners_text'); ?></p>
                    <?php endif; ?>
                    <?php if(get_field('below_partners_link')): ?>
                    	<div><a class="altcustombutton mediumbutton" href="<?php the_field('below_partners_link'); ?>">Learn More</a></div>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>