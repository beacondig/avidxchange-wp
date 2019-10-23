<?php
/**
 * Template Name: Page - Careers
 * Description: Used as a page template to show page Career
 */
 ?>

<?php get_header(); ?>
</div>
<?php if( get_field('career_banner_image') ): ?>
	<?php $bnimg = get_field('career_banner_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>
<style>
.custombg {	
	background-image: -webkit-linear-gradient(257deg, rgba(0,78,116,0.82) 0%, rgba(8,112,166,0.82) 100%), url("<?php echo $bn1img[0]; ?>"); 
	background-image: linear-gradient(257deg, rgba(0,78,116,0.82) 0%,rgba(8,112,166,0.82) 100%), url("<?php echo $bn1img[0];; ?>");
	background-size:cover; 
}
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1689990914597879";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--- video modal start --->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('header_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('header_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!--- video modal end --->

<div class="headerbluebg <?php if(get_field('career_banner_image')): ?>custombg<?php endif; ?>">
<?php if(!get_field('career_banner_image')): ?>
	<div class="xbglg">
<?php endif; ?>
<div class="container mobilesquish">
<?php if( get_field('banner_description') ): ?>
	<p><?php the_field('banner_description'); ?></p>
<?php endif; ?>
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
<div class="bannerplay"><a data-toggle="modal" data-target="#myModal"><i class="fab fa-youtube"></i></a></div>
</div></div>
<?php if(!get_field('career_banner_image')): ?>
	</div>
<?php endif; ?>
<!--<div class="submenuholder"></div>-->


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

	<div class="container-fluid graybg">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('why_title'); ?></h2>
                		<div class="separator"></div>
                    <p class="intro"><?php the_field('why_intro'); ?></p>
                    <div class="twentyspacer"></div>
                </div>
                <?php if( have_rows('why_icons') ): 
					while ( have_rows('why_icons') ) : the_row();?>
                        <div class="col-md-4 col-sm-4">
                            <?php if( get_sub_field('icon_image') ): ?>
									<?php $icoimg = get_sub_field('icon_image');
                                $size = 'thumbnail';
                                $icimg = wp_get_attachment_image_src($icoimg, $size); ?>
                                <p><img src="<?php echo $icimg[0]; ?>" class="icoimage" /></p>
                                <h6 style="font-size:18px;"><?php the_sub_field('title'); ?></h6>
                                <p><?php the_sub_field('description'); ?></p>
                                <div class="twentyspacer"></div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; wp_reset_query();  ?>
                <?php else :
					// no rows found
				endif;
				?>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row center rowpadding">
        	<div class="fiftyspacer"></div>
            <div class="col-md-8 col-sm-6">
                <?php if( get_field('social_large_image') ): ?>
						<?php $ic3img = get_field('social_large_image');
                    $size = 'large';
                    $ic3img = wp_get_attachment_image_src($ic3img, $size); ?>
                    <p><img src="<?php echo $ic3img[0]; ?>" /></p>
                <?php endif; ?>
            </div>
            <div class="col-md-4 col-sm-6">
            	<ul class="nav nav-tabs">
                	<li class="active"><a data-toggle="tab" href="#FBtab">Facebook</a></li>
                    <li><a data-toggle="tab" href="#TWtab">Twitter</a></li>
                </ul>
                <div class="tab-content">
                    <div id="FBtab" class="tab-pane fade in active">
                      <p><div class="fb-page" data-href="https://www.facebook.com/AvidXchange/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote class="fb-xfbml-parse-ignore" cite="https://www.facebook.com/AvidXchange/"><p><a href="https://www.facebook.com/AvidXchange/">AvidXchange, Inc.</a></p></blockquote></div></p>
                    </div>
                    
                    <div id="TWtab" class="tab-pane fade">
                      <p><a class="twitter-timeline" data-height="500" href="https://twitter.com/AvidAutomates">Tweets by AvidAutomates</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row center">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <?php if( get_field('social_outro') ): ?>
                    <p class="intro"><?php the_field('social_outro'); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="col-md-4 col-sm-4 cispot">
					<?php if( get_field('circle_image_1') ): ?>
						<?php $circ1img = get_field('circle_image_1');
                    	$size = 'three-column';
                    	$cir1img = wp_get_attachment_image_src($circ1img, $size); ?>
                        <p><img src="<?php echo $cir1img[0]; ?>" /></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4 cispot">
					<?php if( get_field('circle_image_2') ): ?>
						<?php $circ2img = get_field('circle_image_2');
                    	$size = 'three-column';
                    	$cir2img = wp_get_attachment_image_src($circ2img, $size); ?>
                        <p><img src="<?php echo $cir2img[0]; ?>" /></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4 cispot">
					<?php if( get_field('circle_image_3') ): ?>
						<?php $circ3img = get_field('circle_image_3');
                    	$size = 'three-column';
                    	$cir3img = wp_get_attachment_image_src($circ3img, $size); ?>
                        <p><img src="<?php echo $cir3img[0]; ?>" /></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid graybg">
    	<div class="container">
            <div class="row center rowpadding">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('locations_title'); ?></h2>
                		<div class="separator"></div>
                    <p class="intro"><?php the_field('locations_intro'); ?></p>
                    <div class="twentyspacer"></div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="twentyspacer"></div>
                    <!-----   locations loop ---->
                    <?php $loop = new WP_Query( array( 'post_type' => 'locations', 'posts_per_page' => -1 ) ); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="col-md-3 col-sm-6 medcrunch">
                            <a class="loopnews" href="<?php the_permalink(); ?>">
                                <div class="locationsloopitem">
                                    <div class="grid">
                                            <?php if ( has_post_thumbnail() ) {the_post_thumbnail('three-column');} ?>	
                                        </figure>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h6 style="font-size:18px; text-align:center; padding:6px 0px;"><?php echo get_the_title(); ?></h6>
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
    </div>
    
    
    <div class="container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('culture_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('culture_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <p><?php the_field('culture_description'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="col-md-6 col-sm-12">
                <?php if( get_field('culture_image') ): ?>
					<?php $culimg = get_field('culture_image');
                    	$size = 'medium';
                    	$cuimg = wp_get_attachment_image_src($culimg, $size); ?>
                    <div class="smcenter"><img src="<?php echo $cuimg[0]; ?>" /></div>
                <?php endif; ?>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-6 col-sm-6">
            	<a class="secondarybutton largebutton flr mlh" style="margin-bottom:10px;" href="/careers/culture/">Learn more about our culture</a>
            </div>
            <div class="col-md-6 col-sm-6">
                <a class="secondarybutton largebutton fll mlh" href="/blog/">Read about us on our blog</a>
            </div>
        </div>
    </div>
    
   
    <div class="container">
        <div class="row center rowpadding">
            <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <h2><?php the_field('benefits_title'); ?></h2>
                    <div class="separator"></div>
                <p class="intro"><?php the_field('benefits_intro'); ?></p>
                <div class="twentyspacer"></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                <div><a class="secondarybutton largebutton" href="/careers/benefits/">Learn more about our benefits</a></div>
            </div>
        </div>
    </div>

</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>