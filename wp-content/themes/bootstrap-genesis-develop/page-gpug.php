<?php
/**
 * Template Name: Page - GPUG
 * Description: Used as a landing page template to show Purchase to Pay for GPUG
 */
 ?>

<?php get_header(); ?>
</div>

<style>

	.grayskew {
	background-color:#F9F9F9;
	content:"";
	display:block;
	height:100px;
	margin-bottom:-90px;
	margin-top:50px;
	z-index:0;
	transform:skewY(2.5deg);
	transform-origin:100% 50% 0;
	}

	.padding {
		padding:60px 15px 0;
	}
	
	.xbg {
		background-position:right 0 bottom 0px !important;
	}
	
	
</style>
<div class="gpug-header">
	<div class="xbg">
	<div class="padding">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="fiftyspacer hidden-xs"></div>
				<h1 class="biz-kit-title">AvidXchange Purchase to Pay</h1>
				<p>AvidXchange Purchase to Pay delivers improved visibility and control over your expenses with paperless invoicing, automated purchase requests and integrated electronic payments.</p>
			</div>
			<div class="col-md-5 hidden-sm hidden-xs">
				<?php $banimg = get_field('banner_image');
    				  $size = 'full';
    				  $ban1img = wp_get_attachment_image_src($banimg, $size); ?>
				<img class="banner-image" src="<?php echo $ban1img[0]; ?>" />
			</div>
		</div>
		</div>
	</div>
	</div>
</div>

<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
<div class="container">

	<?php $row = 1;
			
			if( have_rows('features') ): while ( have_rows('features') ) : the_row();?>
				<div class="row rowpadding prod-details">
					<?php if ( $row == 1 ) { ?>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
					<?php } elseif ( $row == 2 ) { ?>
						<div class="col-md-6">
							<h3 class="prod-detail-title"><?php the_sub_field('feature_title'); ?></h3>
							<?php the_sub_field('feature_points'); ?>
						</div>
						<div class="col-md-6">
							<?php $intimg = get_sub_field('feature_graphic');
    						  $size = 'full';
    						  $int1img = wp_get_attachment_image_src($intimg, $size); ?>
							<img class="prod-graphic hidden-sm hidden-xs" src="<?php echo $int1img[0]; ?>" />
						</div>
					<?php } ?>
				</div>
			<?php if ($row==1) { $row++; } elseif ($row==2) {$row=1;}?>
			<?php endwhile; wp_reset_query();  ?>
        	<?php else :
             		// no rows found
            		endif;
     ?>
		
	
</div>
	<div class="grayskew"></div>
	<div class="container-fluid graybg rowpadding">
		<div class="container">
			<div class="row center">
				<div class="col-sm-12">
					<h2>AvidXchange Purchase to Pay Benefits</h2>
				</div>
			</div>
			
			<?php $row = 1;
			
			if( have_rows('benefits') ): while ( have_rows('benefits') ) : the_row();?>
			<?php if ($row==1) { ?> <div class="row"> <?php } ?>
					<div class="col-md-6">
						<div class="benefit-box">
							<div class="row">
								<div class="col-sm-4 hidden-xs">
									<?php $intimg = get_sub_field('benefit_icon');
    						  			  $size = 'full';
    						  	          $int1img = wp_get_attachment_image_src($intimg, $size); ?>
									<img class="benefit-icon" src="<?php echo $int1img[0]; ?>" />
								</div>
								<div class="col-sm-8">
									<p class="benefit-title"><?php the_sub_field('benefit_title'); ?></p>
									<p class="benefit-desc"><?php the_sub_field('benefit_desc'); ?></p>
								</div>
							</div>
						</div>
					</div>
			<?php if ($row==1) { $row++; } elseif ($row==2) { ?> </div> <?php $row=1; } ?>
			<?php endwhile; wp_reset_query();  ?>
        	<?php else :
             		// no rows found
            		endif;
     		?>
		</div>
	</div>
	<div class="whitesliver"></div>
	<div class="container rowpadding">
            <div class="row center">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2>Frequently Asked Questions</h2>
                    <div class="twentyspacer"></div>
                </div>
            </div>
            <div class="row center">
            	<div class="col-sm-10 col-sm-offset-1">
             	<?php $tab = 1;
					
					if( have_rows('post_questions') ): while ( have_rows('post_questions') ) : the_row();?>
             			<div class="postquestion">
             				<input id="tab-<?php echo $tab; ?>" class="posttab" type="checkbox" name="tabs">
             					<label for="tab-<?php echo $tab; ?>" class="postlabel">
                        			<span class="qst"><?php the_sub_field('post_question') ?></span>
								</label>
            				<div class="postbox">
            					<p><?php the_sub_field('post_answer'); ?></p>
							</div>
             			</div>
             <?php $tab++; ?>
             <?php endwhile; wp_reset_query();  ?>
        	 <?php else :
             // no rows found
            	endif;
         	 ?>
			</div>
			</div>
        	 
 
        </div>
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() . '/js/custom/integrations_script-full.js';?>"></script>

<?php get_footer(); ?>