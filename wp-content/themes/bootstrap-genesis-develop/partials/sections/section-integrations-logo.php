<?php
/**
 * Template Part: Integrations Logo
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

$link_type = get_field( 'accounting_system_link_type' );
$link_url  = $link_type ? get_field( 'accounting_system_link_' . $link_type . '_url' ) : '';
$link_url  = avid_parse_custom_url( $link_url );
?>

<section class="home-search integrations-logo">
	<div class="container">	
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
		<div class="buttons">
			<a href="<?php echo esc_url( $link_url ); ?>" class="btn is-white">
				<?php the_field( 'accounting_system_link_text' ); ?>
			</a>
		</div>
	</div>
</section>
