
<link rel='stylesheet' id='slick-css' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-theme-css' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' type='text/css' media='all' />
<!--
												why are these styles here?
<link rel='stylesheet' id='theme-styles-css' href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/theme-styles.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='components-css'  href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/components.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='duplicate-post-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/duplicate-post/duplicate-post.css' type='text/css' media='all' />
<link rel='stylesheet' id='new-royalslider-core-css-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/new-royalslider/lib/royalslider/royalslider.css' type='text/css' media='all' />
<link rel='stylesheet' id='theme-styles-css' href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/style.css' type='text/css' media='all' />
-->

<?php
/**
 * Template Name: Resource New
 *
 * @package avidxchange
 */


defined('ABSPATH') || die("Can't access directly");

get_header('new');

get_template_part('partials/content', 'inner-page-header');
?>


<div class="filters">
	<div class="container">
		<div class="col-md-3 col-sm-3 resource-type">
			<span>Filter by Type:</span>
			<select>
				<option data-filter=" ">All Resources</option>
				<option data-filter="webinars">Webinars</option>
				<option data-filter="product">Product Info</option>
				<option data-filter="short">Short Videos</option>
				<option data-filter="ebook">eBooks</option>
				<option data-filter="whitepaper">Whitepapers</option>
				<option data-filter="testimonial">Testimonials</option>
			</select>
		</div>

		<div class="col-md-3 col-sm-3 industry-type">
			<span>Filter by Industry:</span>
			<select>
				<option data-filter=" ">Show All</option>
				<option data-filter="association">Association Management</option>
				<option data-filter="construction">Construction</option>
				<option data-filter="nonprofit">Nonprofit</option>
				<option data-filter="property">Property Management</option>
			</select>
		</div>


		<div class="col-md-3 col-sm-3 topic">
			<span>Filter by Topic:</span>
			<select>
				<option data-filter=" ">Show All</option>
				<option data-filter="accounts">Accounts Payable</option>
				<option data-filter="ap">AP Efficiency</option>
				<option data-filter="approval">Approval Workflow</option>
				<option data-filter="automated">Automated Payments</option>
				<option data-filter="electronic">Electronic Invoicing</option>
				<option data-filter="best">Payment Best Practices</option>
				<option data-filter="trends">Payment Trends</option>
			</select>
		</div>


		<div class="col-md-3 col-sm-3 job-title">
			<span>Filter by Job Title:</span>
			<select>
				<option data-filter=" ">Show All</option>
				<option data-filter="ap">AP Manager</option>
				<option data-filter="cfo">CFO</option>
				<option data-filter="controller">Controller</option>
				<option data-filter="partner">Partner</option>
				<option data-filter="vendor">Vendor</option>
			</select>
		</div>
	</div>
</div>

<div class="resource-top-blog">
	<div class="container">
		<?php
		// the query
		$wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 2)); ?>

		<?php if ($wpb_all_query->have_posts()) : ?>



			<!-- the loop -->

			<?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>
				<div class="resource-top-blog-inner">
					<div class="row">
						<div class="col-md-6 col-sm-6">

							<?php the_post_thumbnail();  ?>

						</div>
						<div class="col-md-6 col-sm-6">
							<h5>Blog</h5>
							<h2><?php the_title(); ?></h2>
							<p>
								<?php

										$content = get_the_content();
										$content = strip_tags($content);
										echo substr($content, 0, 150);
										echo "...";
										?>

							</p>
							<a href="<?php the_permalink(); ?>" class="learnmore">LEARN MORE</a>
							<a href="/blog" class="blog-link">See all Thought Leadership from AvidXchange <span>></span></a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>

	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$('a[href="#demoRequest"]').click(function(event) {
			event.preventDefault();
			var offset_top = $("#demoRequest").offset().top;
			$('html, body').animate({
				scrollTop: (offset_top)
			}, 'slow');
		});

		$(window).on('load resize', function() {
			if ($(window).width() <= 767) {
				var top_to_fix = $('.resource-top-blog-inner .row > .col-md-6:nth-child(1)').height();
				$('.resource-top-blog ul.slick-dots').css('top', top_to_fix + 20);
			}
		});


		$('.resource-top-blog .container').slick({
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 8000,
			slidesToShow: 1,
			slidesToScroll: 1,
			adaptiveHeight: true,
			responsive: [{
					breakpoint: 1024,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 900,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 800,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
			]
		});

	});
</script>






<div class="mix-post-outer resource-post-outer">
	<div class="container">
		<div class="mix-post-inner">
			<?php $counter = 0 ?>
			<?php $wp_query = new WP_Query(array('post_type' => 'resources', 'post_status' => 'publish', 'posts_per_page' => 8)); ?>

			<?php if ($wp_query->have_posts()) : ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<?php if ($counter == 2) { ?>
						<div class="mix-post-inner1 all custom-post">
							<div class="custom-post-inner">

								<div class="telegram-image">
									<img src="http://avidxdev.wpengine.com/wp-content/uploads/2019/10/telegram-icon.png">
								</div>
								<p>GET UPDATES FROM US TO YOUR INBOX </p>
								<a href="#demoRequest">Sign me Up</a>
							</div>
						</div>

					<?php } ?>
					
			<div class="mix-post-inner1 all <?php 
						$terms = get_the_terms($post->ID, 'category');
						$len = count($terms);
						foreach ($terms as $index => $term) {

							if ($index == $len - 1) {
							echo $term->name . "  ";
							} else {
							echo $term->name . " ";
							}
						} 

 					?> resource-post-<?php echo $counter ?>">
						<div class="top-image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post_id, 'large'); ?>) !important;"></div>
						<div class="mix-post-inner-desc">
							<h2><?php echo get_the_title(); ?></h2>

							<p class="cat"> <?php
													$terms = get_the_terms($post->ID, 'category');
													$len = count($terms);
													foreach ($terms as $index => $term) {

														if ($index == $len - 1) {
															echo $term->name . " | ";
														} else {
															echo $term->name . ", ";
														}
													}

													the_time('F Y');

													?></p>
							<p><?php the_field('mini_description'); ?></p>
							<a href="<?php the_permalink(); ?>" class="learnmore">READ MORE > </a>
						</div>
					</div>
					<?php $counter = $counter + 1; ?>
				<?php endwhile; ?>
				<!-- end of the loop -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
		</div>
		<div class="loadmore-wrap loadmore-header-style">
			<a class="loadmore">VIEW MORE RESOURCES</a>
		</div>
	</div>
</div>




<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	var page = 2;
	jQuery(function($) {


		$('body').on('click', '.loadmore', function() {

			var data = {
				'action': 'load_posts_by_ajax',
				'page': page,
				'security': '<?php echo wp_create_nonce("load_more_posts"); ?>'
			};
			console.log(data);
			$.post(ajaxurl, data, function(response) {
				console.log(response);
				if (response != "") {

					var new_div = $(response).hide();
					$('.mix-post-inner').append(new_div);
					new_div.slideDown();
					page++;

				} else {
					$('.loadmore').hide();
				}

			});
		});
	});
</script>

<script type="text/javascript">

jQuery(document).ready(function($){
	$(".mix-post-inner1").show();
    $(".resource-type select").change(function(){ 
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("data-filter");
	    if(optionValue == " "){
		$(".mix-post-inner1.Whitepaper").show();
		$(".mix-post-inner1.Testimonial").show();
		$(".mix-post-inner1.eBook").show();
		$(".mix-post-inner1.Short").show();
		$(".mix-post-inner1.Short").show();
		$(".mix-post-inner1.custom-post").show();
            }
	if(optionValue){
                $(".mix-post-inner1").not("." + optionValue).hide();
                $("." + optionValue).show();

            } else{
                $(".mix-post-inner1").hide();
		
        }
        });
    });
});



 jQuery(document).ready(function($){
	$(".mix-post-inner1").show();
    $(".industry-type select").change(function(){ 
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("data-filter");
	    if(optionValue == " "){
		$(".mix-post-inner1.Construction").show();
		$(".mix-post-inner1.Association").show();
		$(".mix-post-inner1.Nonprofit").show();
		$(".mix-post-inner1.Property").show();
		//$(".mix-post-inner1.custom-post").show();
            }
	if(optionValue){
                $(".mix-post-inner1").not("." + optionValue).hide();
                $("." + optionValue).show();

            } else{
                $(".mix-post-inner1").hide();
		
        }
        });
    });
});



 jQuery(document).ready(function($){
	$(".mix-post-inner1").show();
    $(".topic select").change(function(){ 
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("data-filter");
	    if(optionValue == " "){
		$(".mix-post-inner1.Accounts").show();
		$(".mix-post-inner1.Efficiency").show();
		$(".mix-post-inner1.Approval").show();
		$(".mix-post-inner1.Automated").show();
		$(".mix-post-inner1.Electronic").show();
		$(".mix-post-inner1.Practices").show();
		$(".mix-post-inner1.Trends").show();
		//$(".mix-post-inner1.custom-post").show();
            }
	if(optionValue){
                $(".mix-post-inner1").not("." + optionValue).hide();
                $("." + optionValue).show();

            } else{
                $(".mix-post-inner1").hide();
		
        }
        });
    });
});




 jQuery(document).ready(function($){
	$(".mix-post-inner1").show();
    $(".job-title select").change(function(){ 
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("data-filter");
	    if(optionValue == " "){
		$(".mix-post-inner1.Manager").show();
		$(".mix-post-inner1.CFO").show();
		$(".mix-post-inner1.Controller").show();
		$(".mix-post-inner1.Partner").show();
		$(".mix-post-inner1.Vendor").show();
		//$(".mix-post-inner1.custom-post").show();
            }
	if(optionValue){
                $(".mix-post-inner1").not("." + optionValue).hide();
                $("." + optionValue).show();

            } else{
                $(".mix-post-inner1").hide();
		
        }
        });
    });
});


jQuery(function ($) { 
    $(".resource-post-outer .mix-post-inner .mix-post-inner1").hide();
    $(".resource-post-outer .mix-post-inner .mix-post-inner1").slice(0, 6).show();
    $(".resource-post-outer .loadmore").on('click', function (e) {
        e.preventDefault();
        $(".resource-post-outer .mix-post-inner .mix-post-inner1:hidden").slice(0, 6).show();
        if ($(".resource-post-outer .mix-post-inner .mix-post-inner1:hidden").length == 0) {
            $(".resource-post-outer .loadmore").fadeOut('slow');
        }
    });
});


</script>


<style>
.resource-post-outer:after {
    background:transparent !important;
}
</style>
<div class="request-demo-out">
	<div class="bottom-design"></div>
	<section class="section request-demo" id="demoRequest">
		<div class="container">

			<h2 class="section-title is-white has-smaller-gap center">GET UPDATES FROM US TO YOUR INBOX</h2>
			<div class="form-outer-wrap">
				<?php echo do_shortcode('[gravityform id="39" title="true" description="true"]'); ?>
			</div>

		</div>
	</section>
</div>



<?php
get_footer('new');
