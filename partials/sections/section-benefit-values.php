<?php
/**
 * Template Part: Benefit Values
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section benefit-values">
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
				while ( have_rows( 'benefit_values' ) ) :
					the_row();
					?>
					<li class="col-xs-12 col-md-6 item">
						<div class="benefit">
							<img src="<?php the_sub_field( 'icon' ); ?>" alt="Icon" class="icon">
							<h3 class="item-title"><?php the_sub_field( 'title' ); ?></h3>
							<div class="description">
								<?php the_sub_field( 'description' ); ?>
							</div>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
