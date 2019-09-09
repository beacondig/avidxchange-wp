<?php
/**
 * Template Name: Page - Job Openings
 * Description: Used as a page template to show page Job Openings
 */
 ?>

<style>
	.job-board {
		border:1px solid #000;
		height:2000px;
		width:98%;
		overflow:scroll !important;
	}
	
</style>

<?php get_header(); ?>
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
<div class="site-inner container"><?php
/**
 * Template Name: Page - Job Openings
 * Description: Used as a page template to show page Job Openings
 */
 ?>

<style>
	.job-board {
		border:1px solid #000;
		height:2000px;
		width:98%;
		overflow:scroll !important;
	}
	
</style>

<?php get_header(); ?>
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
<div class="site-inner container">

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<?php genesis_before_loop(); ?>
<?php the_field('post_content'); ?>
<?php genesis_after_loop(); ?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
		<iframe class="job-board" src="https://usr54.dayforcehcm.com/CandidatePortal/en-us/avidxchange"></iframe>
	</div>
	</div>
	</div>

<!--==============================JV CODE STARTS======================================
<div class="jv-careersite" data-careersite="avidxchange" data-force-redirect></div>
<script src="//jobs.jobvite.com/__assets__/scripts/careersite/public/iframe.js"></script>
<!--==============================JV CODE ENDS========================================-->

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?
>
<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<?php genesis_before_loop(); ?>
<?php the_field('post_content'); ?>
<?php genesis_after_loop(); ?>
	
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
		<iframe class="job-board" src="https://usr54.dayforcehcm.com/CandidatePortal/en-us/avidxchange"></iframe>
	</div>
	</div>
	</div>

<!--==============================JV CODE STARTS======================================
<div class="jv-careersite" data-careersite="avidxchange" data-force-redirect></div>
<script src="//jobs.jobvite.com/__assets__/scripts/careersite/public/iframe.js"></script>
<!--==============================JV CODE ENDS========================================-->

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>