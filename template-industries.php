<?php
/**
 * Template Name: Industries
 *
 * @package avidxchange
 */

get_header( 'new' );
?>

	<section class="dvgk-hero">
		<div class="hero-content">
			<div class="hero-cut">
				<h1><?php the_field( 'opening_title' ); ?></h1>
				<p><?php the_field( 'opening_description' ); ?></p>
				<a class="btn" href="#demoRequest">Let's Talk</a>
			</div>
		</div>
		<div class="hero-image">
			<img src="<?php the_sub_field( 'opening_image' ); ?>" />
		</div>
	</section>

	<section class="dvgk-industries">
		<div class="b-container">
			<h2><?php the_field( 'industries_heading' ); ?>Featured Industries</h2>
			<?php if ( have_rows( 'industries' ) ) : ?>
			<ul class="row industries">
				<?php
				while ( have_rows( 'industries' ) ) :
					the_row();
					?>
					<li class="col-xs-6">
						<div class="industry">
							<div class="overlay"></div>
							<h3><?php the_sub_field( 'industry_title' ); ?></h3>
							<img src="<?php the_sub_field( 'industry_image' ); ?>" />
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>

	<section class="dvgk-search">
		<div class="container">	
			<div class="searchbox">
				<div class="heading"><?php the_field( 'accounting_system_search_heading' ); ?></div>
				<form role="search" method="get" id="searchbox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label>Enter Your Search Term Here<br />
						<input type="search" value="" name="s" />
					</label>
					<button type="submit" form="searchbox" class="search-submit">Search  <i class="fas fa-search"></i></button>
				</form>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/content', 'demo' ); ?>

<?php get_footer( 'new' ); ?>
