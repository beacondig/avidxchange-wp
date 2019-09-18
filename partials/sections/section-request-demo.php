<?php
/**
 * Template Part: Request Demo
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section request-demo" id="demoRequest">
	<div class="container">

		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<?php
				$image = get_field( 'request_demo_image' );
				$image = isset( $image['sizes'] ) && isset( $image['sizes']['medium_large'] ) ? $image['sizes']['medium_large'] : '';
				?>

				<?php if ( $image ) : ?>
					<img alt="Illustration image" src="<?php echo esc_url( $image ); ?>">
				<?php endif; ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="form-wrapper fadein">
					<h2 class="section-title is-white has-smaller-gap"><?php the_field( 'request_demo_title' ); ?></h2>
					<?php echo do_shortcode( '[gravityform id=38 title=false description=false ajax=true tabindex=49]' ); ?>
				</div>
			</div>
		</div>

	</div>
</section>
