<?php
/**
 * Template Part: Solutions
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section is-white our-solutions">
	<div class="container">	
		<!--
		<h2><?php the_field( 'accounting_system_title' ); ?></h2>
		<?php if ( have_rows( 'accounting_system_logos' ) ) : ?>
			<ul>
				<?php
				while ( have_rows( 'accounting_system_logos' ) ) :
					the_row();

					$logo = get_sub_field( 'logo' );
					$logo = isset( $logo['sizes'] ) && isset( $logo['sizes']['medium'] ) ? $logo['sizes']['medium'] : '';
					?>

					<li><img src="<?php echo esc_url( $logo ); ?>" /></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
		-->
	</div>
</section>
