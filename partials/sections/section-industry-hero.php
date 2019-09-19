<?php
/**
 * Template Part: Industry Hero
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="avid-hero">
	<div class="hero-body">
		<div class="container">
			<div class="content">
				<h1><?php the_field( 'opening_title' ); ?></h1>
				<p><?php the_field( 'opening_description' ); ?></p>
				<?php
				$link_type = get_field( 'opening_link_type' );
				$link_url  = ! $link_type ? '#demoRequest' : get_field( 'opening_link_' . $link_type . '_url' );
				$link_text = get_field( 'opening_link_text' );
				$link_text = ! empty( $link_text ) ? $link_text : __( 'REQUEST A DEMO', 'avidxchange' );

				if ( false === stripos( $link_url, 'http' ) && false === stripos( $link_url, 'www' ) ) {
					global $wp;

					$current_url = home_url( $wp->request );

					if ( false !== stripos( $current_url, '#' ) ) {
						$explode     = explode( '#', $current_url );
						$current_url = $current_url[0];
					}

					$link_url = trailingslashit( $current_url ) . $link_url;
				}
				?>
				<a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>">
					<?php echo esc_html( $link_text ); ?>
				</a>
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
