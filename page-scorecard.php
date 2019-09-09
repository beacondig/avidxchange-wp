<?php
/**
 * Template Name: Page - AP Scorecard
 * Description: Used as a page template to show the AP Scorecard
 */
 ?>

<?php get_header(); ?>
</div>

<style>
	.greenbottomsliver, .bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.gf_page_steps {
		font-size:14px;
		font-weight:300;
		text-align:center;
		color:#1e95d3;
}

	.gform_wrapper form {
		text-align:center !important;
	}

	.gform_wrapper ul.gfield_radio li label {
		font-weight:300;
	}
	
	.gform_button, .gform_previous_button, .gform_next_button {
		background-color:#93c740;
		border:none;
		border-radius:5px;
		-moz-border-radius:5px;
		-webkit-border-radius:5px;
		color:#FFF;
		font-weight:500;
		padding:10px 25px;
	}
	
	.bottom-img {
		margin-bottom:-60px;
	}
	
	.apgray {
	width:100%;
	height:auto;
	background-color:#F7F7F7;
}


	.score-box {
	background: url(https://www.avidxchange.com/wp-content/uploads/2018/01/linedpaper.png) repeat;
	padding:50px;
	@include border-radius(5px);
	-webkit-box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	-moz-box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	}

	.grayskew {
	background-color:#F7F7F7;
	content:"";
	display:block;
	height:100px;
	margin-bottom:-90px;
	margin-top:50px;
	z-index:0;
	transform:skewY(2.5deg);
	transform-origin:100% 50% 0;
	}

	
</style>


<div class="biz-kit-header">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1 class="biz-kit-title"><?php the_field('banner_title'); ?></h1>
				<p><?php the_field('banner_description'); ?></p>
			</div>
			<div class="col-md-6 hidden-sm hidden-xs">
				<?php $banimg = get_field('banner_image');
    				  $size = 'full';
    				  $ban1img = wp_get_attachment_image_src($banimg, $size); ?>
				<img class="banner-image bottom-img" src="<?php echo $ban1img[0]; ?>" />
			</div>
		</div>
	</div>
</div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<div class="container rowpadding">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<?php the_field('score_intro'); ?>
			</div>
		</div>
	</div>
	<div class="grayskew"></div>
	<div class="container-fluid apgray rowpadding">
		<div class="container">
			<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="score-box">
					<?php echo do_shortcode('[gravityform id="27" title="false" description="false"]'); ?>
				</div>
			</div>
			</div>
		</div>
	</div>
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>