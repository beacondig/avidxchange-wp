<?php
/**
 * Template Name: Page - Thank You
 * Description: Used as a page template to show page Thank You
 */
 ?>

<?php get_header(); ?>
</div>
<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
            <?php if( get_field('banner_description') ): ?>
            	<div class="tenspacer"></div>
                <p class="introLG"><?php the_field('banner_description'); ?></p>
            <?php endif; ?>
</div></div></div>
<!--- <div class="greentopsliver"></div> --->
<div class="submenuholder"></div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<?php genesis_before_loop(); ?>
<?php the_field('post_content'); ?>

<div class="thirtyspacer"></div>

	<div class="site-inner container">
        <div class="row center">
        	<div class="col-md-12 col-sm-12">
            	<h2>On-Demand Webinars</h2>
                <div class="twentyspacer"></div>
                <!-----   resources loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => 3, 'order' => 'DESC', 'meta_key' => 'resource_type', 'meta_value' => 'webinar' ) ); ?>
				<?php $cweb = 0; ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $cweb = 1;
					$category = get_the_category();
                    $mainCategory = $category[0]->cat_name; ?>
                	<div class="col-md-4 col-sm-6 otherheights" style="padding-left:0px; padding-right:0px;">
                    	<div style="max-width:320px; margin: auto;">
                        <a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="resourceloopitem" style="min-height:570px;">
                                    <div class="grid">
                                        <figure class="effect-jazz">
                                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>
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
                        <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <?php if($cweb == 0) { ?><em>There are no upcoming webinars</em><?php } ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/resources/">View All Resources</a></div>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2>Recent Blog Posts</h2>
                <div class="thirtyspacer"></div>
                <!-----   blog loop ---->
                <?php $loop = new WP_Query( array( 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<?php $categories = get_the_category(); ?>
                	<div class="col-md-4 col-sm-6 integration-item eventhemup">
                      <div class="effectItem">
                      <a class="loopnews" href="<?php the_permalink(); ?>">
                          <div class="newsloopitem">
                              <div class="grid">
                                  <figure class="effect-jazz">
                                    <div style="height:240px; overflow:hidden;" class="newser">
                                      <?php if ( has_post_thumbnail() ) {
                                          the_post_thumbnail('three-column');
                                          } else { ?><img src="/wp-content/uploads/2016/11/blogX.png" />  <?php } ?>
                                      <figcaption>
                                          <p><span class="whitehover">Read More</span></p>
                                      </figcaption>			
                                    </div>
                                  </figure>
                              </div>
                              <div class="grayblogbot">
                                  <div class="fancyline"><span>&mdash;&mdash;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $categories[0]->name; ?>&nbsp;&nbsp;&nbsp;&nbsp;&mdash;&mdash;</span></div>
                                  <?php echo get_the_title(); ?>
                              </div>
                          </div>
                       </a>
                       </div>
                       <div class="thirtyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/blog/">See All Blog Posts</a></div>
            </div>
                <div class="twentyspacer"></div>
        </div>
    </div>

<?php genesis_after_loop(); ?>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>
<!--more-->
<?php get_footer(); ?>