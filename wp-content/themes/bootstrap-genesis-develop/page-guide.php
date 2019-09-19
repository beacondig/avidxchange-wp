<?php
/**
 * Template Name: Page - Guide Chapter
 * Description: Used as a page template to show the chapter pages of the Beginners Guide
 */
 ?>

<?php get_header(); ?>
</div>

<style>
.guide-image {	
	background-size:cover;
	Background-position:center center;
	width:100%;
	height:450px;
	margin:50px 0;
}
</style>

<?php $ind2img = get_field('guide_hero');
      $size = 'full';
      $in2img = wp_get_attachment_image_src($ind2img, $size); ?>
<div class="container-fluid bgngdehero" data-parallax="scroll" data-image-src="<?php echo $in2img[0]; ?>"></div>
<div class="whitesliver"></div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">

<div class="guide-content">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 col-sm-12">
			<div class="chapter-number">Chapter <?php the_field('chapter_number'); ?></div>
			<h1 class="bgngdetitle"><?php the_field('chapter_title'); ?></h1>
			<p class="bgngdeintrocopy"><?php the_field('chapter_intro_copy'); ?></p>
		</div>
	</div>
</div>
<div class="twentyspacer"></div>
			<?php

				// check if the flexible content field has rows of data
				if( have_rows('chapter_content') ):

     			// loop through the rows of data
    				while ( have_rows('chapter_content') ) : the_row();

        			if( get_row_layout() == 'paragraph' ): ?>
						<div class="container">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 col-sm-12">
									<?php the_sub_field('text'); ?>
								</div>
							</div>
						</div>
								

        			<?php elseif( get_row_layout() == 'quote' ): ?>
						
						<div class="container-fluid guide-quote">
							<div class="container">
								<div class="row">
									<div class="col-md-10 col-md-offset-1 col-sm-12">
										<blockquote data-aos="fade-down" class="qte-text">
        									<?php the_sub_field('quote_text'); ?>
										</blockquote>
									</div>
								</div>
							</div>
						</div>
									
					<?php elseif( get_row_layout() == 'image' ): ?>
						
						
						<?php $gd2img = get_sub_field('guide_image');
                    	$size = 'full';
                    	$gd3img = wp_get_attachment_image_src($gd2img, $size); ?>
                    	<div class="container-fluid guide-image" data-parallax="scroll" data-image-src="<?php echo $gd3img[0]; ?>"></div>
                						
									

        			<?php endif;

    				endwhile;

				else :

    				// no layouts found

				endif;

			?>
			<div class="container">
				<div class="row rowpadding">
					<div class="col-md-10 col-md-offset-1 col-sm-12">
						<div class="row">
							<?php $postid = get_the_ID(); ?>
							<?php if($postid==3508) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><strong>Intro:</strong><br />Beginners Guide to AP Automation</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="The Accounts Payable Process" href="/ap-automation/accounts-payable-process/"> <strong>Chapter 2:</strong><br />The Accounts Payable Process</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="The Accounts Payable Process" href="/ap-automation/accounts-payable-process/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3512) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="What Is Accounts Payable?" href="/ap-automation/what-is-accounts-payable/"><strong>Chapter 1:</strong><br />What Is Accounts Payable?</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="How AP Solutions Integrate Into Your Existing Business Processes" href="/ap-automation/ap-solution-integration/"> <strong>Chapter 3:</strong><br />How AP Solutions Integrate Into Your Existing Business Processes</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="What Is Accounts Payable?" href="/ap-automation/what-is-accounts-payable/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="How AP Solutions Integrate Into Your Existing Business Processes" href="/ap-automation/ap-solution-integration/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3516) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="The Accounts Payable Process" href="/ap-automation/accounts-payable-process/"> <strong>Chapter 2:</strong><br />The Accounts Payable Process</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="The Automated AP Solutions" href="/ap-automation/automated-ap-solutions/"> <strong>Chapter 4:</strong><br />The Automated AP Solutions</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="The Accounts Payable Process" href="/ap-automation/accounts-payable-process/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="The Automated AP Solutions" href="/ap-automation/automated-ap-solutions/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3521) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="How AP Solutions Integrate Into Your Existing Business Processes" href="/ap-automation/ap-solution-integration/"> <strong>Chapter 3:</strong><br />How AP Solutions Integrate Into Your Existing Business Processes</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="What Each Role Should Consider with Automated AP" href="/ap-automation/accounts-payable-team-role/"> <strong>Chapter 5:</strong><br />What Each Role Should Consider with Automated AP</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="How AP Solutions Integrate Into Your Existing Business Processes" href="/ap-automation/ap-solution-integration/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="What Each Role Should Consider with Automated AP" href="/ap-automation/accounts-payable-team-role/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3524) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="The Automated AP Solutions" href="/ap-automation/automated-ap-solutions/"> <strong>Chapter 4:</strong><br />The Automated AP Solutions</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="How to Transition to AP Automation" href="/ap-automation/transition/"> <strong>Chapter 6:</strong><br />How to Transition to AP Automation</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="The Automated AP Solutions" href="/ap-automation/automated-ap-solutions/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="How to Transition to AP Automation" href="/ap-automation/transition/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3529) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="What Each Role Should Consider with Automated AP" href="/ap-automation/accounts-payable-team-role/"> <strong>Chapter 5:</strong><br />What Each Role Should Consider with Automated AP</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="Working Towards Automated AP Success" href="/ap-automation/automated-ap-success/"> <strong>Chapter 7:</strong><br />Working Towards Automated AP Success</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="What Each Role Should Consider with Automated AP" href="/ap-automation/accounts-payable-team-role/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Working Towards Automated AP Success" href="/ap-automation/automated-ap-success/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3533) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="How to Transition to AP Automation" href="/ap-automation/transition/"> <strong>Chapter 6:</strong><br />How to Transition to AP Automation</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
									<a title="Sustaining AP Automation Success" href="/ap-automation/sustaining-success/"> <strong>Chapter 8:</strong><br />Sustaining AP Automation Success</a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="How to Transition to AP Automation" href="/ap-automation/transition/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Sustaining AP Automation Success" href="/ap-automation/sustaining-success/"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
							<?php if($postid==3537) { ?>
								<div class="col-sm-6 hidden-xs">
									<a title="Working Towards Automated AP Success" href="/ap-automation/automated-ap-success/"> <strong>Chapter 7:</strong><br />Working Towards Automated AP Success</a>
								</div>
								<div class="col-sm-6 right hidden-xs">
							
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Working Towards Automated AP Success" href="/ap-automation/automated-ap-success/"><i class="fa fa-chevron-left"></i></a>
								</div>
								<div class="col-xs-4 center visible-xs">
									<a class="mobile-guide-nav" title="Beginners Guide to AP Automation" href="/ap-automation/#beginners-guide-to-ap-automation"><i class="fa fa-home"></i></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
<div class="chapter-sidebar hidden-sm hidden-xs">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Beginners Guide Chapter Sidebar") ) : ?>
			<?php endif;?>
</div>
</div>

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
    });
   	});

	jQuery(window).on('load', function() {
  		AOS.refresh();
	});
</script>




<?php get_footer(); ?>