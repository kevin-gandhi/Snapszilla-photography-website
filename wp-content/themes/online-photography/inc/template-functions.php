<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package online_photography
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function online_photography_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'online_photography_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function online_photography_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'online_photography_pingback_header' );

/**
 * online_photography Excerpt Length
 *
 * @since online_photography 1.0.0
 *
 * @param null
 * @return void
 */
function online_photography_excerpt_length( $length ) {
	if ( ! is_admin() ) {
		return absint( get_theme_mod( 'online-photography-blog-excerpt', 45 ) );
	}
}
add_filter( 'excerpt_length', 'online_photography_excerpt_length', 999 );
