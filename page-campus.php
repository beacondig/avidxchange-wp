<?php
/**
 * Template Name: Page - Campus
 * Description: Used as a page template to show the campus page
 */
 ?>

<?php get_header(); ?>
</div>
<?php if( get_field('campus_image') ): ?>
	<?php $bnimg = get_field('campus_image');
    $size = 'large-banner';
    $bn1img = wp_get_attachment_image_src($bnimg, $size); ?>
<?php endif; ?>
<?php if( get_field('quote_image') ): ?>
	<?php $qteimg = get_field('quote_image');
    $size = 'large-banner';
    $qte1img = wp_get_attachment_image_src($qteimg, $size); ?>
<?php endif; ?>
<?php if( get_field('atrium_img') ): ?>
	<?php $atimg = get_field('atrium_img');
    $size = 'full';
    $at1img = wp_get_attachment_image_src($atimg, $size); ?>
<?php endif; ?>
<?php if( get_field('training_img') ): ?>
	<?php $trimg = get_field('training_img');
    $size = 'full';
    $tr1img = wp_get_attachment_image_src($trimg, $size); ?>
<?php endif; ?>
<?php if( get_field('gym_img') ): ?>
	<?php $gymimg = get_field('gym_img');
    $size = 'full';
    $gym1img = wp_get_attachment_image_src($gymimg, $size); ?>
<?php endif; ?>
<?php if( get_field('cafe_img') ): ?>
	<?php $cafeimg = get_field('cafe_img');
    $size = 'full';
    $cafe1img = wp_get_attachment_image_src($cafeimg, $size); ?>
<?php endif; ?>
<style>
.custombg {	
	background-image: -webkit-linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100%), url("<?php echo $bn1img[0]; ?>"); 
	background-image: linear-gradient(180deg, rgba(0,0,0,0.4) 0%,rgba(0,0,0,0.4) 100%), url("<?php echo $bn1img[0];; ?>");
	background-size:cover; 
}
	
	.quotebg {	
	background-image: -webkit-linear-gradient(180deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.4) 100%), url("<?php echo $qte1img[0]; ?>"); 
	background-image: linear-gradient(180deg, rgba(0,0,0,0.4) 0%,rgba(0,0,0,0.4) 100%), url("<?php echo $qte1img[0];; ?>");
	background-size:cover; 
}
	
	.atriumbg { 
		background-image: url("<?php echo $at1img[0]; ?>");
		background-size:cover;
		background-position:center center;
		height:500px;
	}
	
	.trainingbg { 
		background-image: url("<?php echo $tr1img[0]; ?>");
		background-size:cover;
		background-position:center center;
		height:500px;
	}
	.gymbg { 
		background-image: url("<?php echo $gym1img[0]; ?>");
		background-size:cover;
		background-position:center center;
		height:500px;
	}
	.cafebg { 
		background-image: url("<?php echo $cafe1img[0]; ?>");
		background-size:cover;
		background-position:center center;
		height:500px;
	}
	
	.greenbottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
</style>

<!-- video modal start -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-lg">
  
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <div class="modal-body">
        <div>
        <script src="//fast.wistia.com/embed/medias/<?php the_field('campus_video'); ?>.jsonp" async></script><script src="//fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_<?php the_field('campus_video'); ?> videoFoam=true preload=metadata videoQuality=auto endVideoBehavior=reset autoPlay=true" style="height:100%;width:100%">&nbsp;</div></div></div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- video modal end -->


<div class="camphero campus custombg">
	<div class="container">
	<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<span class="campus-quote-mark"><i class="fa fa-quote-left"></i></span>
		<p style="font-size:30px; line-height:40px; text-align:center;"><?php the_field('campus_quote'); ?></p>
        <p style="text-align:right; font-size:14px;">-&nbsp;<?php the_field('quote_attribution_name'); ?>,&nbsp;
           <span style="font-style: italic;"><?php the_field('quote_attribution_company'); ?></span></p>
	</div>
	</div>
	<div class="fiftyspacer"></div>
	<div class="fiftyspacer"></div>
	<div class="row center">
	<div class="col-sm-12">
		<div class="bannerplay" data-aos="fade-up" data-aos-duration="1000"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-youtube-play" aria-hidden="true"></i><div style="font-weight:500; text-transform:uppercase; font-size:14px; margin-top:-25px;">Take a tour</div></div></a></div>
	</div>
	</div>
	</div>
</div>
<div class="flex-row">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6"><div class="atriumbg"></div></div>
			<div class="col-md-6">
				<div class="infobox" data-aos="fade-up">
					<h2>
					<span class="titleicon">
						<?php $ind2img = get_field('atrium_icon');
                        $size = 'full';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    	<img src="<?php echo $in2img[0]; ?>" />
					</span>
					<?php the_field('atrium_title'); ?></h2>
					<p><?php the_field('atrium_copy'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="flex-row">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="infobox" data-aos="fade-up">
					<h2>
					<span class="titleicon">
						<?php $ind2img = get_field('training_icon');
                        $size = 'full';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    	<img src="<?php echo $in2img[0]; ?>" />
					</span>
					<?php the_field('training_title'); ?></h2>
					<p><?php the_field('training_copy'); ?></p>
				</div>
			</div>
			<div class="col-md-6"><div class="trainingbg"></div></div>
		</div>
	</div>
</div>
<div class="container-fluid tribg">
	<div class="container">
		<div class="row center">
		 <?php if( have_rows('counters') ): while ( have_rows('counters') ) : the_row();?>
			<div class="col-sm-4">
				<div class="countericon">
					<?php $ind2img = get_sub_field('counter_icon');
                        $size = 'full';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    <img src="<?php echo $in2img[0]; ?>" />
				</div>
				<h5 class="countertitle"><?php the_sub_field('counter_amount'); ?></h5>
			</div>
		<?php endwhile; wp_reset_query();  ?>
        <?php else :
             		// no rows found
            endif;
         ?>
		</div>
	</div>
</div>
<div class="flex-row">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6"><div class="gymbg"></div></div>
			<div class="col-md-6">
				<div class="infobox" data-aos="fade-up">
					<h2>
					<span class="titleicon">
						<?php $gym2img = get_field('gym_icon');
                        $size = 'full';
                        $gymimg = wp_get_attachment_image_src($gym2img, $size); ?>
                    	<img src="<?php echo $gymimg[0]; ?>" />
					</span>
					<?php the_field('gym_title'); ?></h2>
					<p><?php the_field('gym_copy'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="flex-row">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="infobox" data-aos="fade-up">
					<h2>
					<span class="titleicon">
						<?php $ind2img = get_field('cafe_icon');
                        $size = 'full';
                        $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
                    	<img src="<?php echo $in2img[0]; ?>" />
					</span>
					<?php the_field('cafe_title'); ?></h2>
					<p><?php the_field('cafe_copy'); ?></p>
				</div>
			</div>
			<div class="col-md-6"><div class="cafebg"></div></div>
		</div>
	</div>
</div>
<div class="camphero quotebg">
	<div class="container">
	<div class="row center">
	<div class="col-sm-8 col-sm-offset-2" data-aos="zoom-in-up">
		<span class="campus-quote-mark"><i class="fa fa-quote-left"></i></span>
		<p class="btmquote"><?php the_field('quote'); ?></p>
	</div>
	</div>
	</div>
</div>
<div class="container-fluid tribg">
	<div class="container">
		<div class="row center">
			<div class="col-sm-12">
				<h3 style="color:#000;"><?php the_field('cta_title'); ?></h3>
				<p><?php the_field('cta_copy'); ?></p>
				<div class="twentyspacer"></div>
				<a title="<?php the_field('btn_txt'); ?>" class="secondarybutton largebutton" href="<?php the_field('cta_url'); ?>"><?php the_field('btn_text'); ?></a>
			</div>
		</div>
	</div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">




</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script>
   jQuery(function() {
  		AOS.init({
      offset: 200,
      duration: 400,
      easing: 'ease-in-sine',
      delay: 100,
    });
   	});

	jQuery(window).on('load', function() {
  		AOS.refresh();
	});
</script>


<?php get_footer(); ?>