<?php
/**
 * Template Part: Integration Search
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="section is-medium bottom-is-gapless avid-search">
	<div class="container">	
		<div class="searchbox">
			<h2 class="section-title"><?php the_field( 'search_title' ); ?></h2>

			<form role="search" method="get" id="searchform" class="form-inline searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<label class="label" for="s"><?php the_field( 'search_label' ); ?></label>
				<div class="field">
					<div class="input-group">
						<input type="search" value="" name="s" class="form-control search-input" placeholder="<?php esc_attr_e( 'Search', 'avidxchange' ); ?>" />
					</div>
					<button type="submit" form="searchform" class="btn btn-primary search-submit">
						<?php esc_html_e( 'Search', 'avidxchange' ); ?>
						<i class="fas fa-search"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</section>