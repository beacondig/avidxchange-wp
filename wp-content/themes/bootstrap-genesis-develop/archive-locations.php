<?php get_header(); ?>
</div>
	<div class="headerbluebg">
	<div class="xbg">
	<div class="container mobilesquish">
	<h1 class="bbh1"><?php the_field('locations_banner_title', 'options'); ?></h1>
	<?php if( get_field('locations_banner_description', 'options') ): ?>
		<p><?php the_field('locations_banner_description', 'options'); ?></p>
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
        	<div class="col-md-12 col-sm-12">
            	<div class="twentyspacer"></div>
                <!-----   locations loop ---->
                <?php $loop = new WP_Query( array( 'post_type' => 'locations', 'posts_per_page' => -1 ) ); ?>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                	<div class="col-md-3 col-sm-6 eventhemup">
                    	<a class="loopnews" href="<?php the_permalink(); ?>">
                            <div class="locationsloopitem">
                                <h6 style="font-size:24px; text-align:center;"><?php echo get_the_title(); ?></h6>
                                <div class="grid">
                                        <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>	
                                    </figure>
                                </div>
                                <div class="clearfix"></div>
                                <p class="credits"><p><?php the_field('mini_description'); ?></p></p>
                            </div>
                         </a>
                         <div class="twentyspacer"></div>
                    </div>
                <?php endwhile; wp_reset_query(); ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
	
    <div class="container">
        <div class="row center rowbottompadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('locations_outro_title', 'options'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('locations_outro', 'options'); ?></p>
            </div>
        </div>
    </div>
    
	</div><!-- end #content -->
	<?php genesis_after_content(); ?>
    
    </div><!-- end #content-sidebar-wrap -->
    <?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>