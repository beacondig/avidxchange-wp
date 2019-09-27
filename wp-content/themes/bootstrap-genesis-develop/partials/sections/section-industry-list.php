<?php
/**
 * Template Part: Industry List
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section is-small is-white avid-industries">
	<div class="container is-half">
		<h2 class="section-title">
			<?php the_field( 'industries_title' ); ?>
		</h2>

		<?php if ( have_rows( 'industries' ) ) : ?>
			<ul class="row industries">
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