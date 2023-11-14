<?php

$locations  = get_nav_menu_locations();
$menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ 'primary' ] )->term_id );

$theme = array(
	'post' => 'bg-blue',
	'talent' => 'bg-yellow',
	'tribe_events' => 'bg-purple',
	'resources' => 'bg-red',
	'page' => 'bg-white',
)[ get_post_type() ];

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head <?php do_action( 'add_head_attributes' ); ?> >
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="-snNuf9qHLlRhI4otn0BxPg5rf4JEuZzptP7kkvtrR4" />

	<title><?php wp_title( ' | ', true, 'right' ); ?></title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108533710-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag () { dataLayer.push(arguments); }
		gtag('js', new Date());
		gtag('config', 'UA-108533710-2');
	</script>

	<?php wp_head(); ?>
</head>

<body
	<?php body_class( 'text-black bg-gray text-base font-sans hyphens-auto [word-break:break-word]' ); ?>
	x-data="{ openModal: null }"
>
	<div class="sr-only" aria-hidden="true"><?php require_once 'assets/img/icons.svg'; ?></div>

	<div class="flex flex-col min-h-screen">
		<div class="-z-50 fixed -top-24 -right-48 w-80 h-80 <?php echo esc_attr( $theme ); ?> rounded-full blur-3xl pointer-events-none"></div>

		<header
			class="z-50 sticky top-0 grid lg:grid-rows-1 lg:grid-cols-[1fr_auto] lg:h-auto bg-gray lg:px-8 lg:py-4 overflow-hidden will-change-transform"
			:class="open ? 'grid-rows-[auto_1fr] h-screen' : ''"
			x-data="{ open: false }"
		>
			<div class="-z-10 fixed -top-24 -right-48 w-80 h-80 <?php echo esc_attr( $theme ); ?> rounded-full blur-3xl pointer-events-none"></div>

			<div class="flex justify-between items-center px-8 py-4 lg:p-0">
				<a class="no-underline" href="<?php echo esc_url( home_url() ); ?>">
					<span class="sr-only"><?php echo get_bloginfo( 'name' ); ?></span>
					<svg class="w-auto h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212.73 73.87">
						<path d="M16.96 2.79H43.9v26.88A45.54 45.54 0 0 0 16.96 2.79m13.47 68.28A28.6 28.6 0 0 0 43.9 57.55v13.52ZM2.8 46.74h13.91v24.33H2.8Zm13.91-2.8H2.8V2.87a42.55 42.55 0 0 1 41.07 41.07Zm2.8 2.8h24.3a25.79 25.79 0 0 1-24.3 24.31ZM0 0v73.87h46.69V0Zm76.25 22.85c0-4.25-2-6.71-5.25-7.18a13.76 13.76 0 0 0-2.32-.14h-3v15.12h2.92a12.91 12.91 0 0 0 2.32-.12c3.24-.5 5.36-3.18 5.36-7.68m3.46 0c0 6-3.57 9.64-8.27 10.23a19.78 19.78 0 0 1-2.57.11h-6.42V12.96h6.51a19.48 19.48 0 0 1 2.57.11c4.72.56 8.18 3.66 8.18 9.78m3.47-5.22h3.21v15.59h-3.21Zm3.52-3.58a1.83 1.83 0 0 1-1.9 1.87 1.86 1.86 0 1 1 1.9-1.87m15.2 8.1H98.6a2.82 2.82 0 0 0-2.88-2.6c-1.54 0-2.26.84-2.26 2 0 1.4 1.14 2 3.46 2.6 3.41.86 5.2 2.23 5.2 5 0 3-2.68 4.53-6.06 4.53s-6-1.57-6.46-5.09h3.27a3.15 3.15 0 0 0 3.33 2.8c1.5 0 2.71-.65 2.71-2s-1.07-2.09-3.69-2.79c-2.85-.73-5-1.93-5-4.67 0-2.9 2.29-4.66 5.76-4.66s5.53 2 5.87 4.89m7.4 5.99v1.28c.12 1.54.7 1.85 2.83 1.65v2.24a17.62 17.62 0 0 1-2.38.16c-2.43 0-3.49-.92-3.63-3V20h-2.21v-2.26h2.21v-3.72h3.19v3.72h3V20h-3Zm14.47-10.72v2.51c-3-.19-4.81 1.32-4.81 5.17v8.11h-3.21V17.63h3.21v2.62l1.32-2.1a4 4 0 0 1 2.4-.87 4.41 4.41 0 0 1 1.09.2m2.74.15h3.21v15.59h-3.21Zm3.52-3.58a1.89 1.89 0 0 1-3.78 0 1.89 1.89 0 0 1 3.78 0m16.37 11.4c0-3.38-1.57-5.87-4.36-5.87-2.4 0-4.5 1.54-4.5 5.7v.78c0 3.8 2.29 5.23 4.33 5.23 2.6 0 4.53-2 4.53-5.84m3.41-.31c0 5.73-3.52 8.47-7.55 8.47a6.84 6.84 0 0 1-3.68-1l-1-1.57v2.11h-3.21v-21.5h3.21v8.41l1.18-1.68a6.74 6.74 0 0 1 4.07-1.17c4.47 0 7 3.38 7 7.93m16.88 8.08h-3.18v-2.69l-1.09 1.93a6.23 6.23 0 0 1-3.94 1.15c-3.22 0-5.12-1.82-5.45-4a18.83 18.83 0 0 1-.14-2.77v-9.21h3.18v8.63a21.05 21.05 0 0 0 .12 2.15 3.06 3.06 0 0 0 3.35 2.82c2.26 0 4-1.73 4-6.26v-7.34h3.18Zm8.41-5.07v1.28c.11 1.54.7 1.85 2.82 1.65v2.24a17.51 17.51 0 0 1-2.38.16c-2.43 0-3.49-.92-3.63-3V20h-2.2v-2.26h2.2v-3.72h3.19v3.72h3.05V20h-3.05Zm8.63-4.1h7.9c-.22-2.88-1.51-4.5-3.74-4.5s-3.8 1.51-4.14 4.5m11.15 2.26h-11.19c.25 3.72 1.95 5 4.07 5a3.53 3.53 0 0 0 3.66-3.1h3.27c-.67 3.69-3.63 5.45-7 5.45-4.16 0-7.29-2.63-7.29-8.16 0-4.92 3.13-8.24 7.63-8.24s6.95 3.41 6.95 7.79c0 .31 0 .76-.08 1.31m14.63-.77v-.81c0-3.77-2.29-5.2-4.36-5.2-2.54 0-4.5 2-4.5 5.84 0 3.38 1.57 5.87 4.33 5.87 2.43 0 4.53-1.54 4.53-5.7m3.21 7.63h-3.21v-2.46l-1.17 1.7a7.07 7.07 0 0 1-4.08 1.17c-4.47 0-7-3.38-7-8 0-5.7 3.52-8.44 7.55-8.44a6.84 6.84 0 0 1 3.68 1l1 1.57v-8.09h3.21ZM76.25 48.55c0-4.24-2-6.7-5.25-7.18a13.76 13.76 0 0 0-2.32-.14h-3v15.12h2.92a14.07 14.07 0 0 0 2.32-.11c3.24-.51 5.36-3.19 5.36-7.69m3.46 0c0 6-3.57 9.64-8.27 10.23a19.78 19.78 0 0 1-2.57.11h-6.42V38.66h6.51a17.87 17.87 0 0 1 2.57.12c4.72.55 8.18 3.66 8.18 9.77m5.65 1.21h7.87c-.22-2.88-1.5-4.5-3.74-4.5s-3.77 1.51-4.13 4.5m11.14 2.26H85.36c.25 3.71 2 4.94 4.08 4.94a3.53 3.53 0 0 0 3.66-3.1h3.27c-.67 3.69-3.64 5.45-7 5.45-4.17 0-7.3-2.63-7.3-8.16 0-4.91 3.13-8.24 7.63-8.24s7 3.41 7 7.8c0 .3 0 .75-.09 1.31m14.45-4.22h-3.3a2.8 2.8 0 0 0-2.87-2.6c-1.54 0-2.27.84-2.27 2 0 1.4 1.15 2 3.47 2.6 3.41.87 5.2 2.24 5.2 5 0 3-2.69 4.53-6.07 4.53s-6-1.56-6.45-5.08h3.27a3.14 3.14 0 0 0 3.32 2.79c1.51 0 2.71-.64 2.71-2s-1.06-2.1-3.69-2.8c-2.85-.72-4.94-1.93-4.94-4.66 0-2.91 2.29-4.67 5.75-4.67s5.51 2 5.87 4.89m3.47-4.47h3.24v15.59h-3.24Zm3.52-3.58a1.89 1.89 0 0 1-3.78 0 1.89 1.89 0 0 1 3.78 0m15.36 11.4v-.67c0-3.77-2.29-5.19-4.36-5.19-2.54 0-4.49 1.87-4.49 5.75 0 3.38 1.56 5.81 4.33 5.81 2.46 0 4.52-1.53 4.52-5.7m3.24 3.89v3c-.17 4.72-3.11 7.1-7.8 7.1-4.5 0-6.87-1.87-7.18-5.22v-.28h3.16v.25c.19 1.67 1.65 2.82 4 2.82 2.82 0 4.44-1.54 4.55-4.3v-2.13l-1.17 1.71a6.81 6.81 0 0 1-4 1.17c-4.5 0-7.09-3.3-7.09-7.85 0-5.7 3.52-8.38 7.54-8.38a6.81 6.81 0 0 1 3.69 1l1 1.56v-2.12h3.21Zm18.42-4.89v8.77h-3.22v-8.41c0-.73 0-1.4-.05-2.21a3 3 0 0 0-3.3-3c-2.24 0-4.05 1.76-4.05 6.62v7h-3.21V43.33h3.21v2.57l1.06-1.79a5.81 5.81 0 0 1 3.94-1.2c3.35 0 5.25 1.73 5.53 4.47.06.78.09 1.51.09 2.77" />
					</svg>
				</a>
				<button class="flex justify-center items-center lg:hidden" @click="open = !open">
					<svg class="w-12 h-12 fill-none stroke-black stroke-2" viewBox="0 0 115.67 115.67">
						<path d="M57.84 115.67V0M115.67 57.84H0" />
					</svg>
				</button>
			</div>

			<template x-if="true">
				<nav class="z-0 relative lg:!flex items-center w-full lg:w-auto px-8 py-12 lg:p-0 overflow-auto" x-show="open" x-transition>
					<div class="lg:hidden z-0 fixed -bottom-[37.5vw] -right-[6.25vw] w-[50vw] h-[50vw] <?php echo esc_attr( $theme ); ?> rounded-full blur-2xl pointer-events-none"></div>

					<div class="sticky top-[-48px] lg:hidden -mb-px border-t border-black"></div>

					<ul class="z-10 relative flex flex-col lg:flex-row lg:gap-12 w-full">
						<?php foreach ( $menu_items as $key => $menu_item ) : ?>
							<li class="border-t lg:border-none border-black">
								<?php $is_current = $_SERVER['REQUEST_URI'] === parse_url( $menu_item->url, PHP_URL_PATH ); ?>
								<a
									class="flex justify-start items-center gap-x-8 py-6 lg:py-0 <?php echo esc_attr( $is_current ? 'underline' : 'no-underline' ); ?> hover:underline focus:underline"
									href="<?php echo esc_url( $menu_item->url ); ?>"
								>
									<span class="flex lg:hidden justify-center items-center w-12 h-8 border border-black rounded-full" aria-hidden="true">
										<span class="text-sm text-center">0<?php echo $key + 1; ?></span>
									</span>
									<span class="text-4xl lg:text-base font-extralight lg:font-normal">
										<?php echo wp_kses_post( $menu_item->title ); ?>
									</span>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</nav>
			</template>

		</header>
