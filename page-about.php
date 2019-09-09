<?php
/**
 * Template Name: Page - About
 * Description: Used as a page template to show page About Avid
 */
 ?>

<?php get_header(); ?>
</div>
<div class="headerbluebg" id="hed">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
</div></div></div>
<div id="sticksubtop"></div>
<div class="submenuholder" id="sticksub">
	<div class="container-fluid graybg scrollhider">
    	<div class="container mobilescroll event-cat-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'sub-menu', 'menu_class' => 'nav navbar-nav', 'depth' => '1', 'container_class' => 'genesis-nav-menu', 'container_id' => 'menu-company-submenu', ) ); ?>
        </div>
    </div>
    <div id="bst"></div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
    <div class="container" id="bst">
        <div class="row center rowbottompadding">
            <div class="col-md-8 col-md-offset-2">
                <h2 id="BHmark"><?php the_field('brand_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('brand_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <?php if( have_rows('brands') ): 
                while ( have_rows('brands') ) : the_row();?>
                	<?php $brimg = get_sub_field('image');
					$size = 'medium';
					$bimg = wp_get_attachment_image_src($brimg, $size); ?>
                    <div class="col-md-4 col-sm-4 medcrunch">
                    	<div class="aboutco"><a href="<?php the_sub_field('url'); ?>">
                    	<p><img src="<?php echo $bimg[0]; ?>" /></p>
                        <h4><?php the_sub_field('name'); ?></h4>
                        <p><?php the_sub_field('description'); ?></p>
                        </a></div>
                    </div>
                <?php endwhile; wp_reset_query();  ?>
            <?php else :
                // no rows found
            endif;
            ?>
            <div class="clearfix"></div>
            <div class="col-md-8 col-md-offset-2">
                <div class="fourtyspacer"></div>
                <p class="intro"><?php the_field('brand_outro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
	<div class="container-fluid graybg" id="cva">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('values_title'); ?></h2>
                    <div class="separator"></div>
                    <p class="intro"><?php the_field('values_intro'); ?></p>
                    <div class="fourtyspacer"></div>
                </div>
                <div class="col-md-8 col-sm-8">
                    <?php if( get_field('values_large_image') ): ?>
						<?php $lgimg = get_field('values_large_image');
                            $size = 'large';
                            $limg = wp_get_attachment_image_src($lgimg, $size); ?>
                        <p><img src="<?php echo $limg[0]; ?>" /></p>
                        <div class="twentyspacer"></div>
                    <?php endif; ?>
                </div>
                
                <div class="col-md-4 col-sm-4 medcrunch">
                    <?php if( get_field('values_image_2') ): ?>
						<?php $sm1img = get_field('values_image_2');
							$size = 'medium';
							$smimg = wp_get_attachment_image_src($sm1img, $size); ?>
                        <p><img src="<?php echo $smimg[0]; ?>" /></p>
                        <div class="twentyspacer"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4 medcrunch">
                    <?php if( get_field('values_image_3') ): ?>
						<?php $sm2bimg = get_field('values_image_3');
                            $size = 'medium';
                            $sm2img = wp_get_attachment_image_src($sm2bimg, $size); ?>
                        <p><img src="<?php echo $sm2img[0]; ?>" /></p>
                        <div class="twentyspacer"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id="team">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2">
                <h2><?php the_field('team_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('team_intro'); ?></p>
                <div class="twentyspacer"></div>
                <div><a class="secondarybutton mediumbutton" href="/about/leadership/">View Our Leadership Team</a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid graybg" id="car">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2">
                    <h2><?php the_field('working_title'); ?></h2>
                        <div class="separator"></div>
                    <p class="intro"><?php the_field('working_intro'); ?></p>
                    <div class="twentyspacer"></div>
                    <div><a class="secondarybutton mediumbutton" href="/careers/job-openings/">View Current Openings</a></div>
                    <div class="fourtyspacer"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id="eve">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2">
                <h2><?php the_field('events_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('events_intro'); ?></p>
                <div class="twentyspacer"></div>
                <?php if( get_field('events_image') ): ?>
                    <?php $lg2img = get_field('events_image');
                    $size = 'large';
                    $lggimg = wp_get_attachment_image_src($lg2img, $size); ?>
                    <p><img src="<?php echo $lggimg[0]; ?>" /></p>
                    <div class="twentyspacer"></div>
                <?php endif; ?>
                <div><a class="secondarybutton mediumbutton" href="/events/">View Upcoming Events</a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid graybg" id="par">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2">
                    <h2><?php the_field('partner_title'); ?></h2>
                        <div class="separator"></div>
                    <p class="intro"><?php the_field('partner_intro'); ?></p>
                    <div class="twentyspacer"></div>
                    <div class="hidesmall"><a class="secondarybutton mediumbutton" href="/partners/">Learn More About the Partner Program</a></div>
                    <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" href="/partners/"><div>Learn More About the Partner Program</div></a></div>
                    <div class="fourtyspacer"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container" id="avi">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('foundation_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('foundation_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 medcrunchoffset">
                <?php if( get_field('foundation_image_1') ): ?>
                    <?php $af1aimg = get_field('foundation_image_1');
                        $size = 'medium';
                        $af1img = wp_get_attachment_image_src($af1aimg, $size); ?>
                    <p><img src="<?php echo $af1img[0]; ?>" /></p>
                    <div class="twentyspacer"></div>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-5 medcrunch">
                <?php if( get_field('foundation_image_2') ): ?>
                    <?php $af2aimg = get_field('foundation_image_2');
                        $size = 'medium';
                        $af2img = wp_get_attachment_image_src($af2aimg, $size); ?>
                    <p><img src="<?php echo $af2img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="hidesmall"><a class="secondarybutton mediumbutton" href="/about/avidfoundation/">Learn More About AvidFoundation</a></div>
                <div class="showsmall"><a class="secondarybuttonlong mediumbuttonlong" href="/about/avidfoundation/"><div>Learn More About AvidFoundation</div></a></div>
                <div class="fourtyspacer"></div>
            </div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('news_title'); ?></h2>
                <div class="thirtyspacer"></div>
                <!-----   news loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'news', 'posts_per_page' => 3, 'order' => 'DESC' ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-4 col-sm-6 medcrunch">
                    	<div style="max-width:320px; margin: auto;">
                    	<a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="newsloopitem">
                                <?php /*?><div class="grid">
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
                                </div><?php */?>
                                <div class="clearfix"></div>
                                <h6 style="font-size:18px;"><?php echo get_the_title(); ?></h6>
                                <?php /*?><p><?php the_excerpt(); ?></p><?php */?>
                                <div class="twentyspacer"></div>
                                <p class="credits">Posted on <?php echo get_the_date(); ?> <em>by <?php echo get_the_author_link(); ?></em></p>
                            </div>
                         </a>
                         </div>
                         <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
                <div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/news/">See All News</a></div>
            </div>
                <div class="twentyspacer"></div>
        </div>
    </div>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('blog_title'); ?></h2>
                <?php if( get_field('blog_intro') ): ?>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('blog_intro'); ?></p>
                <?php endif; ?>
                <div class="fiftyspacer"></div>
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
                <!--<div><a class="secondarybutton mediumbutton" style="line-height:5;" href="/blog/">See All Blog Posts</a></div>-->
            </div>
                <div class="twentyspacer"></div>
        </div>
    </div>
    

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/about_script.js';?>"></script>

<?php get_footer(); ?>