<?php

// replace style.css - Theme Information (no css)
// with css/style.min.css -  Compressed CSS for Theme
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'bsg_enqueue_css_js' );

function bsg_enqueue_css_js() {
    $version = wp_get_theme()->Version;

    // wp_enqueue_style( $handle, $src, $deps, $ver, $media );
    wp_enqueue_style( 'bsg_combined_css', get_stylesheet_directory_uri() . '/styles/css/style.css', array(), $version );
    wp_enqueue_style( 'ubuntu_font_css', 'https://fonts.googleapis.com/css?family=Ubuntu:300,400,500', array(), $version );
	wp_enqueue_style( 'aos_css', get_stylesheet_directory_uri() . '/styles/css/aos.css', array(), $version );
	
	wp_enqueue_style( 'font_awesome', get_stylesheet_directory_uri() . '/styles/css/font-awesome.min.css', array(), $version );

    // wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
    wp_enqueue_script( 'bsg_bootstrap_js', get_stylesheet_directory_uri() . '/js/custom/javascript.js', array('jquery'), $version, true );
	wp_enqueue_script( 'bsg_custom_js', get_stylesheet_directory_uri() . '/js/vendor/bootstrap/bootstrap.js', array('jquery'), $version, true );
	//wp_enqueue_script( 'fontawesome_js', 'https://use.fontawesome.com/47ea9e5e45.js', array('jquery'), $version, false );
	wp_enqueue_script( 'rowheight_js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js', array('jquery'), $version, true );
	wp_enqueue_script( 'aos_js', get_stylesheet_directory_uri() . '/js/vendor/aos/aos.js', array('jquery'), $version, true );
	wp_enqueue_script( 'parallax_js', get_stylesheet_directory_uri() . '/js/vendor/parallax/parallax.js', array('jquery'), $version, true );

}