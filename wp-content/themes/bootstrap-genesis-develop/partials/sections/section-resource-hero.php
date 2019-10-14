<?php
/**
 * Template Part: Industries Hero
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="partial-inner-page-header opening res-banner-out">
	<div class="hero-body res-banner-in">
		<div class="container">

			<div class="res-banner-content text">
				<h1><?php the_field('resource_banner_headline'); ?></h1>
				<?php the_field('resource_banner_content'); ?>
				<?php if(get_field('resource_banner_button_text')) { ?>
				<div class="res-banner-btn">
					<a class="btn btn-primary" href="<?php the_field('resource_banner_button_link'); ?>"><?php the_field('resource_banner_button_text'); ?></a>
				</div>
				<?php } ?>
			</div>

			<div class="header-image">
				<img src="<?php the_field('resource_banner_image'); ?>">
			</div>
		</div>
	</div>
</section>


