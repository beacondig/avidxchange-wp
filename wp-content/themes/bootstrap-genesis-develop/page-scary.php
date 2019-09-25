<?php
/**
 * Template Name: Page - Scary Truth
 * Description: Template for the Scary Truth Interactive Infographic
 */
 ?>

<?php get_header(); ?>
</div>

<style>

	.black-bg {
		width:100%;
		background-color:#0E202E;
		color:#FFF;
	}
	
	.scary-header {
		width:100%;
		height:auto;
	}
	
	.scary-img {
		width:100%;
		margin:0 auto;
	}
	
	.greenbottomsliver, 
	.bluebottomsliver {
		display:none;
	}
	
	footer.container {
		margin-top:0;
	}
	
	.scary-copy {
		margin:50px auto 100px;
		text-align:center;
		font-size:22px;
	}
	
	.scroll-downs {
  position: absolute;
  top: 0px;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  
  width :34px;
  height: 55px;
}
.mousey {
  width: 3px;
  padding: 10px 15px;
  height: 35px;
  border: 2px solid #F8A01A;
  border-radius: 25px;
  opacity: 0.75;
  box-sizing: content-box;
}
.scroller {
  width: 3px;
  height: 10px;
  border-radius: 25%;
  background-color: #F8A01A;
  animation-name: scroll;
  animation-duration: 2.2s;
  animation-timing-function: cubic-bezier(.15,.41,.69,.94);
  animation-iteration-count: infinite;
}
@keyframes scroll {
  0% { opacity: 0; }
  10% { transform: translateY(0); opacity: 1; }
  100% { transform: translateY(15px); opacity: 0;}
}
	
	.scroll-icon {
		margin:100px auto;
	}
	
	.img-container {
		margin:100px 0;
	}
	
	.orange-cta {
		width:100%;
		height:auto;
		padding:75px;
		text-align:center;
		background:url('https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_orange-01.png');
		background-size: cover;
		background-position:center center;
	}
	
	.orange-cta h3 {
		color:#FFF;
	}
	
@media (max-width: 415px) {
	
	.scary-copy {
		font-size:19px;
		margin:50px 0;
	}
	
	}

</style>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">


<?php genesis_before_content(); ?>
<div id="content" class="hfeed">


<div class="black-bg">

<div class="scary-header">
	
	<img class="scary-img" src="https://www.avidxchange.com/wp-content/uploads/2017/10/scary-truth-bg.jpg" />
	
</div>

<div class="container">
	<div class="row center">
		<div class="col-sm-12">
			<div class="scroll-icon">
				<div class="scroll-downs">
  					<div class="mousey">
    					<div class="scroller"></div>
  					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row scary-copy">
		<div class="col-sm-10 col-sm-offset-1">
			<p>Everyone's afraid of change, but there's something terrifying about staying the same, especially when it comes to your outdated accounts payable process. Companies that rely a manual, paper-based process are subject to unspeakable horrors, including time-consuming tasks, outrageous processing costs, late payments, and the ever-looming specter of B2B fraud.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="img-container" data-aos="zoom-in-right">
				<img src="https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_digital-03.png" />
			</div>
		</div>
		<div class="col-sm-6">
			<div class="img-container" data-aos="zoom-in-left" data-aos-delay="800">
				<img src="https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_digital-04.png" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="img-container" data-aos="flip-up" data-aos-duration="1000">
				<img src="https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_digital-02.png" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<div class="img-container" data-aos="fade-up-left" data-aos-duration="1000">
				<img src="https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_digital-01.png" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-4">
			<div class="img-container" data-aos="flip-right" data-aos-duration="500">
				<img src="https://www.avidxchange.com/wp-content/uploads/2017/10/graphics_digital-05.png" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="img-container">
			<div class="orange-cta" data-aos="fade-up" data-aos-duration="1200">
				<h3><?php the_field('cta_title'); ?></h3>
				<div class="twentyspacer"></div>
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">				
						<a id="scaryCTA" class="whitebutton hugebutton" href="<?php the_field('button_url'); ?>"><?php the_field('button_text'); ?></a>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
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
