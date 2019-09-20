<?php
/**
 * Template Part: Solutions
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section is-small is-white our-solutions">
	<div class="container">	
		<h2 class="section-title"><?php the_field( 'solutions_title' ); ?></h2>

		<?php
		$tab_menu    = '';
		$tab_content = '';

		if ( have_rows( 'solutions' ) ) {
			while ( have_rows( 'solutions' ) ) {
				the_row();
				ob_start();

				$name = get_sub_field( 'name' );
				$slug = sanitize_title( $name );

				$image     = get_sub_field( 'image' );
				$image_url = isset( $image['sizes'] ) && isset( $image['sizes']['medium_large'] ) ? $image['sizes']['medium_large'] : '';

				$link_type = get_field( 'link_type' );
				$link_url  = $link_type ? get_field( 'link_' . $link_type . '_url' ) : '';
				$link_url  = avid_parse_custom_url( $link_url );
				?>

				<li class="tab-menu-item">
					<a href="#solution-<?php echo esc_attr( $slug ); ?>">
						<?php echo esc_html( $name ); ?>
					</a>
				</li>

				<?php
				$tab_menu .= ob_get_clean();

				ob_start();
				?>

				<li class="tab-content-item" data-id="solution-<?php echo esc_attr( $slug ); ?>">
					<div class="row">
						<div class="col-xs-12 col-md-5 image-wrapper">
							<img alt="Image" src="<?php echo esc_url( $image_url ); ?>">
						</div>
						<div class="col-xs-12 col-md-7 content-wrapper">
							<h3 class="item-title">
								<?php the_sub_field( 'title' ); ?>
							</h3>
							<div class="content">
								<?php the_sub_field( 'content' ); ?>
							</div>
							<a href="<?php echo esc_url( $link_url ); ?>" class="btn btn-primary">
								<?php the_sub_field( 'button_text' ); ?>
							</a>
						</div>
					</div>
				</li>

				<?php
				$tab_content .= ob_get_clean();
			}
		}
		?>

		<div class="avid-tabs">
			<ul class="tab-menu">
				<?php echo $tab_menu; ?>
			</ul>
			<ul class="tab-content">
				<?php echo $tab_content; ?>
			</ul>
		</div>

	</div>
</section>
