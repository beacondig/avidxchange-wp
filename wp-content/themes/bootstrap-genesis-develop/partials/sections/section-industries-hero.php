<?php
/**
 * Template Part: Industries Hero
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="avid-hero industries-hero opening">
	<div class="hero-body">
		<div class="container">
			<div class="content">
				<h1><?php the_field( 'opening_title' ); ?></h1>
				<p><?php the_field( 'opening_description' ); ?></p>
				<?php
				$link_type = get_field( 'opening_link_type' );
				$link_url  = ! $link_type ? '#demoRequest' : get_field( 'opening_link_' . $link_type . '_url' );
				$link_url  = avid_parse_custom_url( $link_url );
				$link_text = get_field( 'opening_link_text' );
				$link_text = ! empty( $link_text ) ? $link_text : __( 'REQUEST A DEMO', 'avidxchange' );
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
