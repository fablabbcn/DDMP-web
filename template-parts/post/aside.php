<?php

// $back_url = 'post' === get_post_type()
// 	? get_permalink( get_option( 'page_for_posts' ) )
// 	: ( 'tribe_events' === $post_type
// 		? get_permalink( get_page_template_id( 'archive-events' )[0] )
// 		: get_post_type_archive_link( $post_type )
// 	);

$social_networks = array( 'facebook', 'twitter', 'pinterest' );
$social_links    = get_social_links(
	array(
		'url'      => get_the_permalink(),
		'title'    => get_the_title(),
		'desc'     => get_the_excerpt(),
		'hashtags' => 'ddmp',
	)
);

$classes = array(
	'dl' => array( 'flex flex-wrap gap-2' ),
	'dt' => array( 'sr-only' ),
	'dd' => array( 'flex' ),
);

?>


<aside class="grid gap-4">

	<dl class="<?php the_classes( $classes['dl'] ); ?>">
		<dt class="<?php the_classes( $classes['dt'] ); ?>">Share</dt>
		<?php foreach ( $social_networks as $key => $social_network ) : ?>
			<dd class="<?php the_classes( $classes['dd'] ); ?>">
				<?php echo do_shortcode( '[button_link url="' . $social_links[ $social_network ] . '" icon="' . $social_network . '"]' ); ?>
			</dd>
		<?php endforeach; ?>
	</dl>

</aside>
