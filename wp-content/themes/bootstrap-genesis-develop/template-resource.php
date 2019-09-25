<link rel='stylesheet' id='theme-styles-css'  href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/theme-styles.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-css'  href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='slick-theme-css'  href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='components-css'  href='http://avidxdev.wpengine.com/wp-content/themes/bootstrap-genesis-develop/css/components.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='duplicate-post-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/duplicate-post/duplicate-post.css' type='text/css' media='all' />
<link rel='stylesheet' id='new-royalslider-core-css-css'  href='http://avidxdev.wpengine.com/wp-content/plugins/new-royalslider/lib/royalslider/royalslider.css' type='text/css' media='all' />

<?php
/**
 * Template Name: Resource New
 *
 * @package avidxchange
 */


defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header( 'new' );

get_template_part( 'partials/sections/section', 'industries-hero' );
?>

<div class="filters">
<div class="container">
	 <div class="col-md-3 col-sm-3">
		<span>Filter by Type:</span>
		<select>
		<option>Show All</option>
		</select>
	</div>
			
	<div class="col-md-3 col-sm-3">
		<span>Filter by Industry:</span>
		<select>
		<option>Show All</option>
		</select>
	</div>
			
			
			<div class="col-md-3 col-sm-3">
		<span>Filter by Topic:</span>
		<select>
		<option>Show All</option>
		</select>
	</div>
			
			
			<div class="col-md-3 col-sm-3">
		<span>Filter by Job Title:</span>
		<select>
		<option>Show All</option>
		</select>
	</div>
</div>
</div>

<div class="resource-top-blog">
	<div class="container">
	<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>2)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
 

 
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
<div class="resource-top-blog-inner">  
	<div class="row">
	<div class="col-md-6 col-sm-6">

		<?php	the_post_thumbnail();  ?>

	</div>
	<div class="col-md-6 col-sm-6">
		<h5>BLOG POST THOUGHT LEADERSHIP</h5>
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
	<a href="/blog" class="blog-link">See all Thought Leadership from AvidXchange ></a>
	</div></div></div>
    <?php endwhile; ?>
    <!-- end of the loop -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	
</div>	
</div>

<script>

jQuery(document).ready(function($) { 
 $('.resource-top-blog .container').slick({
dots: true,
infinite: true,
autoplay: true,
autoplaySpeed: 8000,
slidesToShow: 1,
slidesToScroll: 1,
  adaptiveHeight: true,
responsive: [
 {
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






<div class="mix-post-outer">
	<div class="container">
<div class="mix-post-inner">
		<?php $wp_query = new WP_Query(array('post_type'=>'resources', 'post_status'=>'publish', 'posts_per_page'=>9)); ?>

		<?php if ( $wp_query->have_posts() ) : ?>
		 <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		<div class="mix-post-inner1">
		        <div  class="top-image" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post_id, 'large' ); ?>) !important;"></div>		
			<div class="mix-post-inner-desc">			
				<h2><?php echo get_the_title(); ?></h2>

				<p class="cat"> <?php 
		$terms = get_the_terms( $post->ID , 'category' );	
		$len = count($terms );
		foreach ( $terms as $index => $term ) {
			
			if ($index == $len - 1) {
        				echo $term->name." | ";    
			}
			else
			{
				echo $term->name.", ";
			}

		}

the_time('F Y'); 

?></p>

				<p>   <?php the_content(); ?> </p>
			<a href="<?php the_permalink(); ?>" class="learnmore">READ MORE > </a>
			</div>
		</div>

    		<?php endwhile; ?>
    <!-- end of the loop -->
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
</div>

<a class="loadmore">VIEW MORE RESOURCES</a>
	</div>
</div>




<script type="text/javascript">
var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
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
			if(response != "") {

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


<style>

.hero-body a {
    display: none;
}
.request-demo {
    	background-position: center top;
	margin-top:40px;
	padding-top:180px;
}

</style>




<section class="section request-demo" id="demoRequest">
	<div class="container">

	<h2 class="section-title is-white has-smaller-gap center">GET UPDATES FROM US TO YOUR INBOX</h2>	
	<div class="form-outer-wrap">
	<?php echo do_shortcode( '[gravityform id="39" title="true" description="true"]' ); ?>
	</div>

	</div>
</section>



<?php
get_footer( 'new' );