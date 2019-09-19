<?php
/**
 * Template Name: Industries
 *
 * @package avidxchange
 */

defined( 'ABSPATH' ) || die( "Can't access directly" );

get_header( 'new' );

get_template_part( 'partials/sections/section', 'industries-hero' );
get_template_part( 'partials/sections/section', 'industry-list' );
get_template_part( 'partials/sections/section', 'integration-search' );
get_template_part( 'partials/sections/section', 'request-demo' );

get_footer( 'new' );
