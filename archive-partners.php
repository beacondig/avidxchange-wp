<?php get_header(); ?>
</div>
    
    <!--- form modal start (blue modal) --->
	<div class="modal fade" id="intModal" role="dialog">
	  <div class="modal-dialog modal-sm">

		<div class="modal-content">
			<button type="button" class="closeblue" data-dismiss="modal">&times;</button>
		  <div class="modal-header"><h6>Become an AvidXchange Partner</h6>Fill out your information and we’ll contact you shortly.</div>
		  <div class="modal-body">
			<div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=12 title=false description=false ajax=true tabindex=49]'); ?></div></div>
		  </div>
		</div>

	  </div>
	</div>
	<!--- form modal end --->
    
	<div class="headerbluebg">
	<div class="xbg">
	<div class="container mobilesquish">
	<h1 class="bbh1"><?php the_field('partners_banner_title', 'options'); ?></h1>
	<?php if( get_field('partners_banner_description', 'options') ): ?>
		<p><?php the_field('partners_banner_description', 'options'); ?></p>
	<?php endif; ?>
	</div></div></div>
	<div class="submenuholder">
		<div class="container-fluid graybg">
        	<div class="container cmob">
				<div class="dib" style="padding-top: 15px;"><?php the_field('below_banner_text', 'options'); ?></div>
                <div class="dib flr">
                	<div class="mr20" style="display:inline-block;"><a class="primarybutton mediumbutton" style="min-width:120px; padding: 10px 26px;" data-toggle="modal" data-target="#intModal">Join Now</a></div>
            		<div style="display:inline-block;"><a class="defaultbutton mediumbutton" target="_blank" style="min-width:120px; padding: 10px 37px;" href="https://avidxchange.webinfinity.com" />Log In</a></div>
                </div>
            </div>
        </div>
    </div> 	 
    
    <?php genesis_before_content_sidebar_wrap(); ?>
    <div id="content-sidebar-wrap">
    
    <?php genesis_before_content(); ?>
    <div id="content" class="hfeed">
    
    <div class="site-inner container">
        <div class="row rowbottompadding">
        
        <?php if( have_rows('partners', 'options') ): 
            while ( have_rows('partners', 'options') ) : the_row();?>
        	<div class="col-md-6 col-sm-6">
            	<div class="contactbg">
                    <h4><?php the_sub_field('name'); ?></h4>
                    <p><?php the_sub_field('description'); ?></p>
                    <div class="tenspacer"></div>
                    <div>
                         <a class="secondarybutton mediumbutton" href="<?php the_sub_field('learn_more_link'); ?>">Learn More</a>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_query();  ?>
        <?php else :
            // no rows found
        endif;
        ?>
            
        	
        </div>
    </div>
    
    <?php if(get_field('quote_video', 'options')): ?>
    <div class="container">
        <div class="row center">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div>
					<script src="//fast.wistia.com/embed/medias/<?php the_field('quote_video', 'options'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('quote_video', 'options'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset" style="height:100%;width:100%">&nbsp;</div></div></div>
                </div>
                <div class="twentyspacer"></div>
                <p><span class="gquote"><?php the_field('top_quote_attribution', 'options'); ?></span><br />
                <span style="font-style: italic;"><?php the_field('top_quote_attribution_company', 'options'); ?></span></p>
                <div class="twentyspacer"></div>
            </div>
        </div>
    </div>	
    <?php endif; ?>
    
    <div class="site-inner container">
        <div class="row center rowpadding">
        	<div class="col-md-12 col-sm-12">
            	<h2><?php the_field('news_title', 'options'); ?></h2>
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
	
    <?php if( get_field('bottom_quote_image', 'options') ){ ?>
        <div class="container">
            <div class="row center rowpadding">
                <div class="col-md-6 col-sm-12">
                    <div>
                        <?php if( get_field('bottom_quote_image', 'options') ): ?>
                            <?php $quo1img = get_field('bottom_quote_image', 'options');
                            $size = 'medium';
                            $qu1img = wp_get_attachment_image_src($quo1img, $size); ?>
                            <p><img src="<?php echo $qu1img[0]; ?>" /></p>
                        <?php endif; ?>
                    </div>
                    <div class="twentyspacer"></div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div><i class="fa fa-quote-left" aria-hidden="true" style="color:#1e95d3; font-size:48px; padding-bottom:20px;"></i></div>
                    <p class="quote"><?php the_field('bottom_quote', 'options'); ?></p>
                    <div class="twentyspacer"></div>
                    <p><span class="gquote"><?php the_field('bottom_quote_attribution', 'options'); ?></span><br />
                    <span style="font-style: italic;"><?php the_field('bottom_quote_attribution_company', 'options'); ?></span></p>
                    <div class="fourtyspacer"></div>
                </div>
            </div>
        </div>
    <?php } else {?>
        <div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div><i class="fa fa-quote-left" aria-hidden="true" style="color:#1e95d3; font-size:48px; padding-bottom:20px;"></i></div>
                    <p class="quote"><?php the_field('bottom_quote', 'options'); ?></p>
                    <div class="twentyspacer"></div>
                    <p><span class="gquote"><?php the_field('bottom_quote_attribution', 'options'); ?></span><br />
                    <span style="font-style: italic;"><?php the_field('bottom_quote_attribution_company', 'options'); ?></span></p>
                    <div class="fourtyspacer"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    
	</div><!-- end #content -->
	<?php genesis_after_content(); ?>
    
    </div><!-- end #content-sidebar-wrap -->
    <?php genesis_after_content_sidebar_wrap(); ?>
    
<?php get_footer(); ?>