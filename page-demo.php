<?php
/**
 * Template Name: Page - Demo
 * Description: Used as a page template to show page Demo
 */
 ?>

<?php get_header(); ?>
<style>
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	.rowbottompadding {
		padding-bottom:0px;
	}
	
	footer.container {
		margin-top:0px;
	}
	
	.demoform {
		background-color:transparent;
		border:0px;
		margin:0;
		padding:10px 0px;
	}
	
	.democontactbox {
		border:0px;
		padding:10px 0px;
	}
	
	.demoquote {
		color:#1e95d3;
		font-style:italic;
		font-size:30px;
		margin-bottom:30px;
	}
	
	.demoquotename {
		font-weight:500;
	}
	
	.demoquotecompany {
		font-style:italic;
	}
	
	.democopy {
		padding:35px 75px 0px 75px;
	}
	
	@media (max-width: 415px) {
		.democopy {
			padding:25px 25px 50px 25px;
		}
	}
	
	@media (max-width: 991px) {
		.demoform {
			margin:auto;
		}
		
		.democontactbox {
			text-align:center;
		}
	}
	
	

</style>
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p class="hidetmobile"><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<div class="site-inner container-fluid">
        <div class="row center rowbottompadding">
            <div class="col-md-4 topmobile graybg" style="text-align:left; padding:35px">
            	<h3 class="ltc"><?php the_field('form_title'); ?></h3>
            	<?php $intnm = $_GET['n']; ?>
            	<div class="demoform"><?php echo do_shortcode('[gravityform id=14 title=false description=false ajax=true tabindex=40 field_values="intslct='.$intnm.'"]'); ?></div>
                <div class="fourtyspacer"></div>
                <div class="democontactbox">
                	<h6>More ways to connect...</h6>
                    <div><i class="fa fa-phone" style="font-size: 21px;" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="tel:<?php the_field('contact_phone'); ?>"><?php the_field('contact_phone'); ?></a></div>
                    <div><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<a href="mailto:<?php the_field('contact_email'); ?>"><?php the_field('contact_email'); ?></a></div>
                </div>
            </div>
            <div class="col-md-8 democopy" style="text-align:left;">
                <div>
				<?php if( have_rows('leftside_content') ): 
					while ( have_rows('leftside_content') ) : the_row();?>
                        <h3><?php the_sub_field('heading'); ?></h3>
                        <p><?php the_sub_field('content'); ?></p>
                        <div class="tenspacer"></div>
                    <?php endwhile; wp_reset_query();  ?>
                <?php else :
					// no rows found
				endif;
				?>
                	<?php if(get_field('video')): ?>
                     <p><div>
					 <script src="//fast.wistia.com/embed/medias/<?php the_field('video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                     </div></p>
                     <div class="twentyspacer"></div>
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>