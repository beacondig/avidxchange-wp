<?php get_header(); ?>
</div>
<?php $loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
<?php $modid = 1;
while ( $loop->have_posts() ) : $loop->the_post(); ?>
	<?php if(get_field('display_as_popup') == "yes"){ ?> 
		<div class="modal fade" id="pop<?php echo $modid; ?>" role="dialog">
		  <div class="modal-dialog modal-sm">

			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  <div class="modal-body">
				  <h3><?php the_field('popup_title'); ?></h3>
				  <div><?php the_field('popup_text'); ?></div>
				  <div style="text-align: center;"><a class="secondarybutton mediumbutton integrationPopupDemo" href="/demo/?n=<?php echo get_the_title(); ?>">Schedule a Demo</a></div>
			  </div>
			</div>

		  </div>
		</div>
		<?php $modid++; ?>
	<?php } ?>
<?php endwhile; wp_reset_query(); ?>

	<div class="headerbluebg">
	<div class="xbg">
	<div class="container mobilesquish">
	<h1 class="bbh1"><?php the_field('integrations_banner_title', 'options'); ?></h1>
	<?php if( get_field('integrations_banner_description', 'options') ): ?>
		<p><?php the_field('integrations_banner_description', 'options'); ?></p>
	<?php endif; ?>
	</div></div></div>
	<!--- <div class="greentopsliver"></div> --->
	<div class="submenuholderalpha">
    	<div class="container">
            <div class="row center" style="padding:60px 15px 15px; ">
            <div class="intgmag"><i class="fa fa-search" aria-hidden="true"></i></div>
            	<input type="text" id="intg-search-input" style="width:100%; padding:13px 13px 13px 47px; font-size:24px;" placeholder="Search 100+ integrations">
            </div>
            <div class="row center">
                <div class="alphalist">
                    <?php $intgArray = array(); 
                    $intgLArray = array();
                    $alphas = range('A', 'Z');
                    ?>
                    <?php //$loop = new WP_Query( array( 'post_type' => 'integrations', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'title' ) ); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <?php
                            $intgArray[] = get_the_title();
                            $intgLArray[] = strtoupper(substr(get_the_title(),0,1));
                        ?>
                    <?php endwhile; wp_reset_query();   ?>
					<a data-letter="ALL" class="alphachosen" >ALL</a>
                    <?php foreach($alphas as $item) :
                        if (in_array($item, $intgLArray)) {
                            echo '<a id="allB" data-letter="'.$item.'" >'.$item.'</a> ';
                        } else {
                            echo '<span class="alphapad">'.$item.'</span> ';
                        } 
                    endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div> 	 
    
    <?php genesis_before_content_sidebar_wrap(); ?>
    <div id="content-sidebar-wrap">
    
    <?php genesis_before_content(); ?>
    <div id="content" class="hfeed">
    
    <div class="site-inner container">
        <div class="row rowpaddingbottom integrations-wrapper">
        
        <?php $ict = 0;
		$modid = 1;
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col-md-3 col-sm-4 integration-item threecrunch" data-letter="<?php echo strtoupper(substr(get_the_title(),0,1)); ?>" data-integration="<?php echo get_the_title(); ?>">
                <?php if(get_field('display_as_popup') == "yes"){ ?> 
					<a class="loopintg" data-toggle="modal" data-target="#pop<?php echo $modid; ?>" style="cursor:pointer;">
					<?php $modid++; ?>
				<?php } else { ?>
					<a class="loopintg" href="<?php the_permalink(); ?>">
                <?php } ?>
					<div class="intgbg">
						<?php if(get_field('avid_partner') == "yes") { ?>
							<div class="ibanner"><img src="/wp-content/uploads/bannergray.svg" /></div>
							<div class="ibanner ibtop"><img src="/wp-content/uploads/bannergreen.svg" /></div>
							<div class="ibannertext"><span style="color:#4a4a4a;">Avid Partner</span></div>
							<div class="ibannertext ibtop">Avid Partner</div>
						<?php } ?>
						<div class="intgcover" style="background-color:transparent;opacity: 1;filter: alpha(opacity=100);color: #231f20;">
							<div class="vsp" style="padding-top:65%;">
								<div class="stsz">View Details&nbsp;&raquo;</div>
							</div>
						</div>
						<div class="intgcover">
							<div class="vsp">
								<h5><?php echo get_the_title(); ?></h5>
								<div class="separatorsm"></div>
								<div class="stsz">View Details&nbsp;&raquo;</div>
							</div>
						</div>
						<div class="intimg">
							<?php $thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'three-column', true);
							echo '<img data-original="'.$thumb_url[0].'" width="'.$thumb_url[1].'" height="'.$thumb_url[2].'" class="lazy" />'; ?>
						</div>
					</div>
				</a>
				<div class="thirtyspacer"></div>
            </div>
            <?php $ict++; ?>
        <?php endwhile; wp_reset_query(); ?>
        </div>
    </div>
    
    <div class="container-fluid noresultsdiv hnores" style="margin:0px 0px 40px;">
        <div class="container" style="width:100%;">
            <div class="clearfix"></div>
                <div class="col-md-12 center">
                    <div class="row">
                    	<p>Sorry, we couldn't find any accounting systems to match your search.</p>
                        <p><a href="/contact/">Contact Us</a> today to see if we can help.</p>
                    </div>
                </div>
            <div class="clearfix"></div>
        </div>
    </div>
    
	</div><!-- end #content -->
	<?php genesis_after_content(); ?>
    
    </div><!-- end #content-sidebar-wrap -->
    <?php genesis_after_content_sidebar_wrap(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/integrations_script.js';?>"></script>

<?php get_footer(); ?>
