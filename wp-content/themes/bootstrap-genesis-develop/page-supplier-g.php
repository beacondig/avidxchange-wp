<?php
/**
 * Template Name: Page - Supplier (G)
 * Description: Used as a page template to show page Supplier
 */
 ?>

<?php get_header(); ?>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=UTF-8">
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	<div class="site-inner container">
        <div class="row center rowbottompadding">
            <div class="col-md-8" style="text-align:left;">
                <div><?php the_field('leftside_content'); ?></div>
                <div class="tenspacer"></div>
            </div>
            <div class="col-md-4" style="text-align:left;">
            	<h3><?php the_field('form_title'); ?></h3>
            	<div class="demoform suppform" style="padding:20px 10px 20px 20px;">
                	<div class="typeform-widget" data-url="https://avidxchange.typeform.com/to/HFM242" data-transparency="100" data-hide-headers=true style="width: 100%; height: 600px;"></div> <script> (function() { var qs,js,q,s,d=document, gi=d.getElementById, ce=d.createElement, gt=d.getElementsByTagName, id="typef_orm", b="https://embed.typeform.com/"; if(!gi.call(d,id)) { js=ce.call(d,"script"); js.id=id; js.src=b+"embed.js"; q=gt.call(d,"script")[0]; q.parentNode.insertBefore(js,q) } })() </script>
                
				</div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>