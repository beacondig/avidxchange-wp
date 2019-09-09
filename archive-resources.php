<?php get_header(); ?>
</div>
<style>
	
.hs-form label {
	display:none !important;
}

.input {
	color:#000;
	padding:5px 0;
}

.input input {
	padding:7px;
	border:1px solid rgba(0,0,0,0.3);
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
	display:inline-block;
}


.actions, .input {
	display:inline-block;
	width:auto;
}

 .hs-button {
	display:inline-block;
	background-color:#ff8a00;
	border:none;
	font-weight:500;
	padding:9px;
	border-radius:2px;
	-moz-border-radius:2px;
	-webkit-border-radius:2px;
}
</style>
	<div class="headerbluebg">
	<div class="xbg">
	<div class="container mobilesquish">
	<h1 class="bbh1"><?php the_field('resources_banner_title', 'options'); ?></h1>
    <div id="ptholder"><h2 id="pageTitle">&nbsp;</h2></div>
	<?php if( get_field('resources_banner_description', 'options') ): ?>
		<p><?php the_field('resources_banner_description', 'options'); ?></p>
	<?php endif; ?>
	</div></div></div>
	<div class="submenuholder submenuholderres">
        <div class="container-fluid">
            <div class="event-cat-menu" style="text-align: center; padding-bottom:10px;">
            	<ul class="flex-container wrapfl">
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a class="allon e-cat-active"><div><i class="fa fa-star" aria-hidden="true"></i>
    <div class="restext">All Resources</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="webinar" class="caton" id="webinars"><div><i class="fa fa-desktop" aria-hidden="true"></i>
    <div class="restext">Webinars</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="product-info" class="caton" id="product-info"><div><i class="fa fa-info-circle" aria-hidden="true"></i>
    <div class="restext">Product Info</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="video" class="caton" id="short-videos"><div><i class="fa fa-film" aria-hidden="true"></i>
    <div class="restext">Short Videos</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="ebook" class="caton" id="ebooks"><div><i class="fa fa-book" aria-hidden="true"></i>
    <div class="restext">eBooks</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="whitepaper" class="caton" id="whitepapers-guides"><div><i class="fa fa-file-text-o" aria-hidden="true"></i>
    <div class="restext">Whitepapers</div></div></a></div></li>
                    <li class="resfilters flex-item"><div style="max-width:160px;"><a data-event-category="testimonial" class="caton" id="case-studies-testimonials"><div><i class="fa fa-user" aria-hidden="true"></i>
    <div class="restext">Testimonials</div></div></a></div></li>
				</ul>
            </div>
        </div>
        <div class="container">
            <div class="col-md-4 col-sm-4"><div class="inpad center">
                <select class="resdropdown1" name="industry-dropdown" style="width:100%; padding:6px;"> 
                    <option value="">Filter by Industry</option> 
                    <?php 
                    $categories = get_categories( array( 'child_of' => 22 ) ); 
                    foreach ( $categories as $category ) {
                        echo '<option value="'.$category->category_nicename.'">'.$category->cat_name.'</option>';
                    }
                    ?>
                </select>
            </div></div>
            <div class="col-md-4 col-sm-4"><div class="inpad center">
                <select class="resdropdown2" name="job-title-dropdown" style="width:100%; padding:6px;"> 
                    <option value="">Filter by Job Title</option> 
                    <?php 
                    $categories = get_categories( array( 'child_of' => 26 ) ); 
                    foreach ( $categories as $category ) {
                        echo '<option value="'.$category->category_nicename.'">'.$category->cat_name.'</option>';
                    }
                    ?>
                </select>
            </div></div>
            <div class="col-md-4 col-sm-4"><div class="inpad center">
                <select class="resdropdown3" name="topic-dropdown" style="width:100%; padding:6px;"> 
                    <option value="">Filter by Topic</option> 
                    <?php 
                    $categories = get_categories( array( 'child_of' => 24 ) ); 
                    foreach ( $categories as $category ) {
                        echo '<option value="'.$category->category_nicename.'">'.$category->cat_name.'</option>';
                    }
                    ?>
                </select>
            </div></div>
            <div class="clearfix"></div>
            <div class="twentyspacer"></div>
        </div>
    </div> 	 
    
    <?php genesis_before_content_sidebar_wrap(); ?>
    <div id="content-sidebar-wrap">
    
    <?php genesis_before_content(); ?>
    <div id="content" class="hfeed">
	
    
	<div class="site-inner container">
        <div class="row event-wrapper center">
            <!-----   resources loop ---->
            <?php $crt = 0;  
			$loop = new WP_Query( array( 'post_type' => 'resources', 'posts_per_page' => -1, 'order' => 'DESC' ) ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <?php $category = get_the_category();
                $mainCategory = $category[0]->cat_name; ?>
                <?php $cats = array();
				foreach (get_the_category() as $c) {
				$cat = get_category($c);
				array_push($cats, $cat->category_nicename);
				}
				
				if (sizeOf($cats) > 0) {
				$post_categories = implode(',', $cats);
				} else {
				$post_categories = '';
				} ?>
                <div class="col-md-4 col-sm-6 event eventhemup" data-event-id="<?php echo $crt; ?>" data-event-cat="<?php echo the_field('resource_type'); ?>" data-event-drop="<?php echo $post_categories; ?>">
                    <div style="max-width:320px; margin: auto;">
                    <a class="loopnews" href="<?php the_permalink(); ?>">
                        <div class="resourceloopitem">
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
                                <p class="credits"><p><?php the_field('mini_description'); ?>
                                
                                </p></p>
                        </div>
                    </a>
                    </div>
                    <div class="twentyspacer"></div>
                </div>
                <?php $crt++; ?>
            <?php endwhile; wp_reset_query(); ?>
            <!--<div class="clearfix"></div>-->
            <div class="twentyspacer"></div>
        </div>
        <div class="event-pagination-bar"></div>
    </div>
    
	</div><!-- end #content -->
	<?php genesis_after_content(); ?>
    
    </div><!-- end #content-sidebar-wrap -->
    <?php genesis_after_content_sidebar_wrap(); ?>
<?php //} ?>

<div class="container-fluid bannergreenbg event-newsletter" style="margin:0px 0px 40px;">
    <div class="container" style="width:100%;">
        <div class="clearfix"></div>
            <div class="col-md-12">
                <div class="xbgg">
                    <div class="row">
                        <div class="nladjust">
                            <h3>Signup to receive updates about AvidXchange resources</h3>
                            <div class="resource-form"><!--[if lte IE 8]>
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
			<![endif]-->
				<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
				<script>
  					hbspt.forms.create({
						portalId: "430000",
						formId: "dbd5e9e1-d475-43b9-a6c8-267f9921e010",
						sfdcCampaignId: "70114000002CaiHAAS",
						target: '.resource-form'
					});
				</script>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    	<div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/resources_script.js';?>"></script>

<style>
body {
    overflow-x: hidden;
}
</style>

<?php get_footer(); ?>