<?php
/**
 * Template Part: Industry Hero
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );
?>

<section class="avid-hero industry-hero">
	<div class="hero-body">
		<div class="container">
			<div class="content">
				<h2 class="hero-subtitle is-green"><?php the_field( 'hero_title' ); ?></h2>
				<h1 class="hero-title"><?php the_field( 'hero_subtitle' ); ?></h1>
			</div>
		</div>
	</div>
</section>
