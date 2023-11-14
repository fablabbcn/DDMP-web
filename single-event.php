<?php
/**
 * Template Name: Single Event
 */

// TODO: Check what's messing with global vars

$_post = $post;

query_posts( array(
	'facetwp'        => true,
	// 'suppress_filters' => true,
	// 'post_type'        => 'tribe_events',
	'posts_per_page' => 1,
) );

require_once 'single.php';
