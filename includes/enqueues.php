<?php

// Enqueue style and js
function the_theme_scripts() {
	$theme_version = wp_get_theme()['Version'];
	$google_maps_api_key = get_field( 'google_maps_api_key', 'options' );

	wp_enqueue_style( 'tailwindcss', get_stylesheet_directory_uri() . '/assets/css/tailwind.prod.css', null, $theme_version );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', null, $theme_version );
	// wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css', null, $theme_version );

	// wp_enqueue_script( 'bodyScrollLock-min', get_stylesheet_directory_uri() . '/assets/js/vendor/bodyScrollLock.min.js', array(), false, true );
	wp_enqueue_script( 'ajaxchimp-min', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.ajaxchimp.min.js', array( 'jquery' ), 'exotic', true );

	// TODO: Replace CDN links for local ones
	wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9.0.5/swiper-bundle.min.css', null, '9.0.5' );
	wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9.0.5/swiper-bundle.min.js', null, '9.0.5', true );

	wp_enqueue_script( 'alpine-focus', 'https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.11.1/dist/cdn.min.js', null, '3.11.1', true );
	wp_enqueue_script( 'alpine', 'https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js', null, '3.11.1', true );
	wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery', 'swiper' ), $theme_version, true );

	wp_enqueue_script( 'google-maps', "https://maps.googleapis.com/maps/api/js?key=$google_maps_api_key&callback=Function.prototype", null, false, true );
	wp_enqueue_script( 'acf-maps', get_stylesheet_directory_uri() . '/assets/js/acf-maps.js', array( 'jquery', 'google-maps' ), $theme_version, true );

	$js_names = array( 'jquery', 'scripts' );

	$localize_arr = array(
		'homeUrl'  => home_url(),
		'homePath' => get_stylesheet_directory_uri(),
		'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
		'apiUrl'   => get_rest_url(),
	);

	wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.js', $js_names, $theme_version, true );
	wp_localize_script( 'theme', 'wpHelper', $localize_arr );

} add_action( 'wp_enqueue_scripts', 'the_theme_scripts' );

// Add website favicons.
if ( ! function_exists( 'the_theme_favicons' ) ) {
	function the_theme_favicons() {
		$favicon_dir = get_template_directory_uri() . '/assets/img/favicon'; ?>

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( $favicon_dir ); ?>/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( $favicon_dir ); ?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( $favicon_dir ); ?>/favicon-16x16.png">
		<link rel="manifest" href="<?php echo esc_url( $favicon_dir ); ?>/site.webmanifest">
		<link rel="mask-icon" href="<?php echo esc_url( $favicon_dir ); ?>/safari-pinned-tab.svg" color="#e6e6e6">
		<link rel="shortcut icon" href="<?php echo esc_url( $favicon_dir ); ?>/favicon.ico">
		<meta name="apple-mobile-web-app-title" content="DDMP">
		<meta name="application-name" content="DDMP">
		<meta name="msapplication-TileColor" content="#e6e6e6">
		<meta name="msapplication-config" content="<?php echo esc_url( $favicon_dir ); ?>/browserconfig.xml">
		<meta name="theme-color" content="#e6e6e6">
		<?php
	} add_action( 'wp_head', 'the_theme_favicons' );
}

//Enqueue admin style and scripts function
function the_theme_enqueue_admin_styles_scripts() {
	wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/assets/css/admin-styles.css' );
} add_action( 'admin_enqueue_scripts', 'the_theme_enqueue_admin_styles_scripts' );

function the_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/assets/css/editor.css' );
} add_action( 'current_screen', 'the_theme_add_editor_styles' );

//  html5 for IE
function IEhtml5_shim_func() {
	echo '<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script><![endif]-->';
} add_action( 'wp_head', 'IEhtml5_shim_func' );
