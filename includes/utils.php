<?php

/**
 * Handle classes arrays.
 */
function get_the_classes( $classes ) {
	return implode( ' ', array_filter( $classes ) );
}

function the_classes( $classes ) {
	echo esc_attr( get_the_classes( $classes ) );
}


/**
 * Social-Media Links Generator 2000.
 */
function get_social_links( $args ) {
	$social_media = new SocialMedia();
	return $social_media->get_links( $args );
}


/**
 * Archive Pages.
 */
function get_term_slug( $term ) {
	return is_object( $term ) ? $term->slug : $term;
}

function get_term_name( $term ) {
	return is_object( $term ) ? $term->name : $term;
}

function get_term_month( $term ) {
	$month = date( 'm', strtotime( "$term/01/2019" ) );
	return $month;
}

function get_button_clip( $terms, $term, $pad, $get_callback ) {
	global $post_type;

	$terms_slugs = array_map( 'get_term_slug', $terms );
	$terms_diff  = array_diff( $terms_slugs, [ $get_callback( $term ) ] );

	$button_clip = implode(
		', ',
		array_map(
			function ( $term ) use ( $pad ) {
				global $post_type;
				return "$post_type-$pad-$term";
			},
			array_merge( [ '' ], $terms_diff )
		)
	);

	return $button_clip;
}