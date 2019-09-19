<?php
/**
 * Template Name: Industries
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header( 'new' );
?>

	<section class="avid-hero">
		<div class="hero-body">
			<div class="container">
				<div class="content">
					<h1><?php the_field( 'opening_title' ); ?></h1>
					<p><?php the_field( 'opening_description' ); ?></p>
					<a class="btn" href="#demoRequest">Let's Talk</a>
				</div>
			</div>
		</div>
		<div class="hero-image">
			<?php
			$hero_image = get_field( 'opening_image' );
			$hero_image = isset( $hero_image['sizes'] ) && isset( $hero_image['sizes']['medium'] ) ? $hero_image['sizes']['medium'] : '';
			?>
			<img src="<?php echo esc_url( $hero_image ); ?>" />
		</div>
	</section>

	<section class="section is-small is-white avid-industries">
		<div class="container is-half">
			<h2 class="section-title"><?php the_field( 'industries_heading' ); ?>Featured Industries</h2>

			<?php if ( have_rows( 'industries' ) ) : ?>
				<ul class="row industries">
					<?php
					while ( have_rows( 'industries' ) ) :
						the_row();
						?>
						<li class="col-xs-12 col-sm-6 item">
							<div class="industry height-equal-width" style="background-image: url(<?php the_sub_field( 'industry_image' ); ?>); background-size: cover;">
								<div class="overlay"></div>
								<h3 class="item-title"><?php the_sub_field( 'industry_title' ); ?></h3>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>

	<section class="section is-medium bottom-is-gapless avid-search">
		<div class="container is-half">	
			<div class="searchbox">
				<h2 class="section-title"><?php the_field( 'search_title' ); ?></h2>

				<form role="search" method="get" id="searchform" class="form-inline searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<label class="label" for="s"><?php the_field( 'search_label' ); ?></label>
					<div class="field">
						<div class="input-group">
							<input type="search" value="" name="s" class="form-control search-input" placeholder="<?php esc_attr_e( 'Search', 'avidxchange' ); ?>" />
						</div>
						<button type="submit" form="searchform" class="btn btn-primary search-submit">
							<?php esc_html_e( 'Search', 'avidxchange' ); ?>
							<i class="fas fa-search"></i>
						</button>
					</div>
				</form>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/sections/section', 'request-demo' ); ?>

<?php get_footer( 'new' ); ?>
