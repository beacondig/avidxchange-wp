<?php
/**
 * Template Part: Customer Logo
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section customer-logos">
	<div class="container">
		<h2 class="section-title is-white">
			<?php the_field( 'customers_title' ); ?>
		</h2>

		<?php if ( have_rows( 'customers' ) ) : ?>
			<ul class="row customers">
				<?php
				while ( have_rows( 'customers' ) ) :
					the_row();
					$logo = get_sub_field( 'logo' );
					$logo = isset( $logo['sizes'] ) && isset( $logo['sizes']['medium'] ) ? $logo['sizes']['medium'] : '';
					?>
					<li class="col-xs-12 col-md-3 item">
						<div class="customer">
							<img alt="" src="<?php echo esc_url( $logo ); ?>" class="logo">
							<h3 class="item-title is-white"><?php the_sub_field( 'name' ); ?></h3>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>
