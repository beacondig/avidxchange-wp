<?php
/**
 * Template Name: Page - AP Scorecard Results
 * Description: Used as a page template to show the AP Scorecard Results
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
	
	.gform_wrapper {
		margin:0 !important;
	}
	
	.apgray {
	width:100%;
	height:auto;
	background-color:#F7F7F7;
}
	
	#gform_wrapper_28 .gform_footer {
		display:none;
	}
	
	#field_28_1 {
		text-align:center;
		color:#FFF;
		background:url('https://www.avidxchange.com/wp-content/uploads/2018/01/score-bg.png') repeat;
		padding:50px;
		margin:0;
		height:450px; 
	}
	
	#field_28_1 input {
		color:#FFF;
		background:transparent !important;
		border:none;
		text-align:center;
		font-size:150px;
		font-weight:500;
	}
	
	#field_28_3, #field_28_4, #field_28_5 {
		padding:50px !important;
		margin:0;
		height:450px;
	}
	
	#input_28_3, #input_28_4, #input_28_5 {
		height:auto;
		border:none;
	}
	
	.dotted {
		margin:15px 0;
		border-bottom:1px dotted rgba(0,0,0,0.2);
	}
	
	.question-list li {
		margin:20px 0;
	}
	
	.paddedbox {
		padding:50px !important;
		margin:0;
		height:auto;
	}
	
	.deskpic {
		display:block;
		background:url('https://www.avidxchange.com/wp-content/uploads/2018/01/scorecard-meeting.jpg');
		background-position:center center;
		background-size: cover;
		height:700px;
	}
	
	.score-box {
	background: url(https://www.avidxchange.com/wp-content/uploads/2018/01/linedpaper.png) repeat;
	padding:50px;
	@include border-radius(5px);
	-webkit-box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	-moz-box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	box-shadow: 0px 0px 50px 10px rgba(84,110,122,0.15);
	}
	
	@media (max-width: 767px) {

		#field_28_1 {
			height:auto;
			padding:25px !important;
		}
		
		#field_28_1 input {
			height:200px;
		}
		
		#input_28_3, #input_28_4, #input_28_5 {
			height:500px;
		}
		
		#field_28_3, #field_28_4, #field_28_5 {
			padding:50px !important;
			margin:0;
			height:600px;
		}
		
		.dotted {
			padding-bottom:25px;
			text-align:center;
		}
}

	
}

</style>


<div class="modal fade" id="demoModal1" role="dialog">
  <div class="modal-dialog modal-sm">
  
    <div class="modal-content">
        <button type="button" class="closeblue" data-dismiss="modal">&times;</button>
      <div class="modal-header"><h6>Speak to an AP Automation expert</h6>Fill out your information and we’ll connect you with one of our AP Automation experts.</div>
      <div class="modal-body">
        <div><div class="demoformblue demoformpopblue"><?php echo do_shortcode('[gravityform id=8 title=false description=false ajax=true tabindex=49]'); ?></div></div>
      </div>
    </div>
    
  </div>
</div>
<!--- form modal end --->

<div class="headerbluebg">
<div class="xbg">
<div class="container mobilesquish">
<h1 class="bbh1"><?php the_field('banner_title'); ?></h1>
            <?php if( get_field('banner_description') ): ?>
            	<div class="tenspacer"></div>
                <p class="introLG"><?php the_field('banner_description'); ?></p>
            <?php endif; ?>
</div></div></div>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">

<?php genesis_before_content(); ?>
<div id="content" class="hfeed">
	
	<div class="container-fluid nopadding">
		<div class="row noscroll">
			<div class="col-sm-12">
				<?php echo do_shortcode('[gravityform id="28" title="false" description="false"]'); ?>
			</div>
		</div>
	</div>
	<div class="container-fluid apgray rowpadding">
		<div class="container">
		<div class="row center">
			<div class="col-sm-10 col-sm-offset-1">
				<h2><?php the_field('compare_title'); ?></h2>
				<p><?php the_field('compare_intro'); ?></p>
			</div>
		</div>
			<div class="fiftyspacer"></div>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="score-box">
					<div class="row hidden-xs">
						<div class="col-sm-6"><h6>Metric</h6></div>
						<div class="col-sm-6 center"><h6>Benchmark</h6></div>
					</div>
					<div class="row dotted">
						<div class="col-sm-6"><p>Cost to process a single invoice</p></div>
						<div class="col-sm-6 center"><strong>$12.01</strong></div>
					</div>
					<div class="row dotted">
						<div class="col-sm-6"><p>Time to process a single invoice</p></div>
						<div class="col-sm-6 center"><strong>10.3 Days</strong></div>
					</div>
					<div class="row dotted">
						<div class="col-sm-6"><p>Invoice exception rate</p></div>
						<div class="col-sm-6 center"><strong>18.4%</strong></div>
					</div>
					<div class="row dotted">
						<div class="col-sm-6"><p>Percentage of suppliers that accept electronic payment</p></div>
						<div class="col-sm-6 center"><strong>51.5%</strong></div>
					</div>
					<div class="row dotted">
						<div class="col-sm-6"><p>Percentage of suppliers that submit invoices electronically</p></div>
						<div class="col-sm-6 center"><strong>25.7%</strong></div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	
	<div class="container-fluid headerbluebg">
			<div class="container">
				<div class="row center">
					<div class="col-sm-10 col-sm-offset-1">
						<h2 style="color:#FFF;"><?php the_field('cta_title'); ?></h2>
						<p><?php the_field('cta_content'); ?></p>
						<div class="twentyspacer"></div>
						<a id="ctaDemoBtn" title="<?php the_field('demo_button_text'); ?>" class="ctabutton mediumbutton" data-toggle="modal" data-target="#demoModal1"><?php the_field('demo_button_text'); ?></a>
					</div>
				</div>
			</div>
		</div>
	
	<div class="container-fluid apgray rowpadding">
		<div class="container">
            <div class="row center">
                <div class="col-sm-10 col-sm-offset-1">
                    <h2><?php the_field('cost_title'); ?></h2>
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
 
    </div>
	
	<div class="container-fluid nopadding">
		<div class="row">
			<div class="col-md-6">
				<div class="paddedbox">
					<h3>Approaching Automation Questions</h3>
					<i>Your results may spark some discussion around adopting AP automation. We’ve created a few questions to spark the automation conversation. Here are a few factors to consider with your teammates:</i>
					<div class="fiftyspacer"></div>
					<ol class="question-list">
						<li>How can you increase efficiency in the AP department to get the most out of your employees?</li>
						<li>What are FTE spending most of their time doing on a regular basis? How could this be better?</li>
						<li>How can you decrease your cost per invoice and exception rate to boost productivity and professional development?</li>
						<li>What can your AP department do to double the dollars without tripling the time?</li>
						<li>How can we benefit from AP automation? Is the reward bigger than the risk?</li>
					</ol>
				</div>
			</div>
			<div class="col-md-6 hidden-sm hidden-xs"><div class="deskpic"></div></div>
		</div>
	</div>
	
</div><!-- end #content -->
<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php

add_filter( 'gform_pre_render_28', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>
 
    <script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a textarea with a class of gf_readonly */
            jQuery("li.gf_readonly textarea").attr("readonly","readonly");
			jQuery("li.gf_readonly input").attr("readonly","readonly");
        });
    </script>
 
    <?php
    return $form;
}

?>

<?php get_footer(); ?>