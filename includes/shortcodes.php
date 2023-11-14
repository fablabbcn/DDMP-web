<?php

// register tag [template-url]
function filter_template_url( $text ) {
	return str_replace( '[template-url]', get_template_directory_uri(), $text );
}
add_filter( 'the_content', 'filter_template_url' );
add_filter( 'get_the_content', 'filter_template_url' );
add_filter( 'widget_text', 'filter_template_url' );

// register tag [site-url]
function filter_site_url( $text ) {
	return str_replace( '[site-url]', home_url(), $text );
}
add_filter( 'the_content', 'filter_site_url' );
add_filter( 'get_the_content', 'filter_site_url' );
add_filter( 'widget_text', 'filter_site_url' );


// Round Button.
if ( ! function_exists( 'ddmp_shortcode_button_link' ) ) {
	function ddmp_shortcode_button_link( $attrs, $content = null ) {
		$code_url        = array_key_exists( 'url', $attrs ) ? $attrs['url'] : ( array_key_exists( 'href', $attrs ) ? $attrs['href'] : '' );
		$parsed_site_url = array_key_exists( 'host', wp_parse_url( site_url() ) ) ? wp_parse_url( site_url() )['host'] : '';
		$parsed_code_url = array_key_exists( 'host', wp_parse_url( $code_url ) ) ? wp_parse_url( $code_url )['host'] : '__';
		$is_external     = $parsed_site_url !== $parsed_code_url;

		$classes = array(
			'ddp-button',
			array_key_exists( 'class', $attrs ) ? $attrs['class'] : false,
			array_key_exists( 'icon', $attrs ) && $attrs['icon'] ? 'w-10 h-10 p-2' : '',
		);

		$link_attrs = array(
			'class'  => 'class="' . get_the_classes( $classes ) . '"',
			'href'   => 'href="' . ( $attrs['url'] ?: $attrs['href'] ) . '"',
			'target' => 'target="' . ( array_key_exists( 'target', $attrs ) ? $attrs['target'] : ( $is_external ? '_blank' : '_self' ) ) . '"',
		);

		return ( array_key_exists( 'icon', $attrs ) && $attrs['icon'] ) || $content ? (
			"<p class='flex'><a {$link_attrs['class']} {$link_attrs['href']} {$link_attrs['target']}>" .
				( array_key_exists( 'icon', $attrs ) && $attrs['icon']
					? ( '<svg class="w-full h-full fill-current"><use xlink:href="#social-' . $attrs['icon'] . '" /></svg>' )
					: ( '<span>' . $content ?: $attrs['label'] . '</span>' )
				) .
			'</a></p>'
		) : false;
	} add_shortcode( 'button_link', 'ddmp_shortcode_button_link' );
}


// Modals.
if ( ! function_exists( 'ddmp_shortcode_modal' ) ) {
	function ddmp_shortcode_modal( $attrs, $content = null ) {
		$post_id  = array_key_exists( 'id', $attrs ) ? $attrs['id'] : ( $content ?: false );
		$form_id  = array_key_exists( 'form', $attrs ) ? $attrs['form'] : false;
		$modal_id = $form_id ? "modal-form-$post_id" : "modal-resources-$post_id";
		$data     = "{ postId: '$post_id', formId: '$form_id' }";
		$classes  = 'ddp-button bg-white';

		$this_form = $form_id;
		$this_post = $post_id;

		$partial_location = get_stylesheet_directory() . ( $form_id
			? '/template-parts/blocks/modal-form.php'
			: '/template-parts/blocks/modal-newsletter.php' );

		require_once $partial_location;

		return "<p><button x-data=\"$data\" @click=\"openModal = formId || postId\" class=\"$classes\">$content</button></p>";
	} add_shortcode( 'modal_toggle', 'ddmp_shortcode_modal' );
}


// Social Links.
if ( ! function_exists( 'ddmp_shortcode_social_links' ) ) {
	function ddmp_shortcode_social_links( $attrs, $content = null ) {
		$social_links     = get_field( 'contact', get_page_template_id( 'contact' )[0]->ID )['social']['links'];
		$partial_location = get_stylesheet_directory() . '/template-parts/blocks/social-links.php';

		ob_start();
		require $partial_location;
		$output = ob_get_clean();
		return $output;

	} add_shortcode( 'social_links', 'ddmp_shortcode_social_links' );
}
