<?php
/**
 * Template Name: Industry
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header( 'new' );

get_template_part( 'partials/sections/section', 'industry-hero' );
get_template_part( 'partials/sections/section', 'benefit-values' );
get_template_part( 'partials/sections/section', 'request-demo' );

get_footer( 'new' );
