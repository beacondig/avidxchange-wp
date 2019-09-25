<?php
/**
 * Template Name: Default Template 800px
 * Description: Used as a page template to show page Supplier
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
<?php genesis_after_loop(); ?>

</div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>
<!--more-->
<?php get_footer(); ?>