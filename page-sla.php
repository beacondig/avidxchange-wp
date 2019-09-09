<?php
/**
 * Template Name: Page - SLA
 * Description: Used as a page template to show page SLA
 */
 ?>


<?php get_header(); ?>
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php genesis_do_post_title(); ?></h1>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">

<?php genesis_before_loop(); ?>
<?php the_field('post_content'); ?>
<div class="thirtyspacer"></div>
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
 hbspt.forms.create({ 
   portalId: '430000',
   formId: '785877dc-f5f9-4da1-a70d-6e0669908fd6'
 });
</script>
<?php genesis_after_loop(); ?>

</div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>
<!--more-->
<?php get_footer(); ?>