<?php

// Redirect single posts to the archive page.
// add_action(
// 	'template_redirect',
// 	function () {
// 		if ( is_singular( 'resources' ) ) {
// 			global $post;
// 			$redirect_link = get_post_type_archive_link( 'resources' ) . '#post-' . get_the_ID();
// 			wp_redirect( $redirect_link, 302 );
// 			exit;
// 		}
// 	}
// );


// FacetWP: Remove front-end styles
add_filter(
	'facetwp_assets',
	function( $assets ) {
		unset( $assets['front.css'] );
		if ( ! is_archive() ) {
			unset( $assets['fSelect.css'] );
		}
		return $assets;
	}
);

// FacetWP: Add icons to taxonomy buttons
add_filter( 'facetwp_facet_display_value', function( $label, $params ) {
	if ( ! in_array( $params['facet']['type'], array( 'radio', 'checkboxes' ) ) ) return $label;

	$source = $params['facet']['source'];

	if ( str_contains( $source, 'tax/' ) ) {
		$taxonomy = str_replace( 'tax/', '', $source );

		$icon = get_field( 'icon', $taxonomy . '_' . $params['row']['term_id'] );
		$color = get_field( 'color', $taxonomy . '_' . $params['row']['term_id'] ) ?: 'inherit';
		$icon_url = wp_get_attachment_image_url( $icon, 'icon-thumbnails', false );

		$label = $icon
			? "<div class=\"ddp-button\" style=\"--theme: $color; --icon-url: url('$icon_url');\"><span class=\"-my-2 ddp-button-icon\"></span><span>$label</span></div>"
			: "<div class=\"ddp-button\" style=\"--theme: $color;\"><span>$label</span></div>";
	} else {
		$label = "<div class=\"ddp-button\"><span>$label</span></div>";
	}

	return $label;
}, 10, 2 );

// FacetWP: Always show Prev+Next buttons
add_filter( 'facetwp_facet_types', function( $types ) {
	include( dirname( __FILE__ ) . '/facetwp/class-pager-ddp.php' );
	$types['pager'] = new FacetWP_Facet_Pager_DDP();
	return $types;
});


add_filter(
	'get_terms_args',
	function( $args, $taxonomies ) {
		if ( isset( $args['term_order'] ) ) {
			$args['orderby'] = 'term_order';
		}
		return $args;
	},
	10,
	2
);

add_filter(
	'get_terms_orderby',
	function( $orderby, $query_vars ) {
		return 'term_order' === $query_vars['orderby'] ? 'term_order' : $orderby;
	},
	10,
	2
);


// Front-end forms.
add_filter( 'remove_hube2_nag', '__return_true' );
add_filter( 'acf-input-counter/display', 'my_acf_counter_filter' );
function my_acf_counter_filter( $display ) {
	$display = sprintf( __( '%1$s / %2$s', 'acf-counter' ), '%%len%%', '%%max%%' );
	return $display;
}

// Show links to single posts inside admin
add_filter( 'register_post_type_args', 'movies_to_films', 10, 2 );
function movies_to_films( $args, $post_type ) {
	if ( 'af_entry' === $post_type ) {
		$args['public']            = true;
		$args['show_ui']           = true;
		$args['show_in_admin_bar'] = true;
	}
	return $args;
}
