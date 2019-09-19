<?php
/**
 * Template Part: Benefit Values
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section is-small is-white benefit-values">
	<div class="container">
		<div class="intro">
			<h2 class="section-title has-tiny-gap">
				<?php the_field( 'benefit_title' ); ?>
			</h2>
			<div class="description">
				<?php the_field( 'benefit_description' ); ?>
			</div>
		</div>

		<?php if ( have_rows( 'benefit_values' ) ) : ?>
			<ul class="row benefits">
				<?php
				while ( have_rows( 'industries' ) ) :
					the_row();
					?>
					<li class="col-xs-12 col-md-6 item">
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
