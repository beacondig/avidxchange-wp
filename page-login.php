<?php
/**
 * Template Name: Page - Login
 * Description: Used as a page template to show page Login
 */
 ?>

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
<!--<div class="submenuholder"></div>-->

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>

	<div class="container">
        <div class="row center rowtoppadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
	            <?php if(get_field('intro_title')): ?>
                	<h2><?php the_field('intro_title'); ?></h2>
                    <div class="separator"></div>
                <?php endif; ?> 
            	<?php if(get_field('intro_description')): ?>
                	<p class="intro"><?php the_field('intro_description'); ?></p>
            	<?php endif; ?>  
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row center rowbottompadding">
            <div class="col-md-4 col-sm-6 eventhemup">
                <div class="contactbg">
                    <h4><?php the_field('login_title_1'); ?></h4>
                    <?php if(get_field('login_description_1')): ?>
                        <p><?php the_field('login_description_1'); ?></p>
                    <?php endif; ?>  
                    <div class="twentyspacer"></div>
                    <div><a class="secondarybutton smallbutton" href="<?php the_field('login_button_url_1'); ?>"><?php the_field('login_button_text_1'); ?></a></div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 eventhemup">
                <div class="contactbg">
                    <h4><?php the_field('login_title_2'); ?></h4>
                    <?php if(get_field('login_description_2')): ?>
                        <p><?php the_field('login_description_2'); ?></p>
                    <?php endif; ?>  
                    <div class="twentyspacer"></div>
                    <div><a class="secondarybutton smallbutton" href="<?php the_field('login_button_url_2'); ?>"><?php the_field('login_button_text_2'); ?></a></div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 eventhemup">
                <div class="contactbg">
                    <h4><?php the_field('login_title_3'); ?></h4>
                    <?php if(get_field('login_description_3')): ?>
                        <p><?php the_field('login_description_3'); ?></p>
                    <?php endif; ?>  
                    <div class="twentyspacer"></div>
                    <div><a class="secondarybutton smallbutton" href="<?php the_field('login_button_url_3'); ?>"><?php the_field('login_button_text_3'); ?></a></div>
                </div>
            </div>
            
        </div>
    </div>

<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>