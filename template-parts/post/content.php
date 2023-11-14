<?php
/**
 * Template part for displaying posts
 */

$thumbnail_id    = get_post_thumbnail_id();
$focal_point     = get_post_meta( $thumbnail_id, '_wpsmartcrop_image_focus' );
$thumbnail_attrs = array(
	'class' => '',
	'style' => $focal_point ? "z-index: -10; object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : 'z-index: -10;',
);

?>


<div id="post-<?php the_ID(); ?>" class="">
	<a class="" href="<?php the_permalink(); ?>">

		<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false, $thumbnail_attrs ); ?>

		<div class="">
			<p class=""><?php the_title(); ?></p>
			<p>—</p>
			<p><?php the_field( 'subtitle' ); ?></p>
			<p class="">Read More</p>
		</div>

	</a>
</div>
