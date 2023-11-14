<?php

// $button = array(
//   'color' => array(
// 		'post' => 'bg-blue',
// 		'talent' => 'bg-yellow',
// 		'tribe_events' => 'bg-purple',
// 		'resources' => 'bg-red',
// 		'page' => 'bg-purple',
// 	)[ get_post_type() ]
// );

$icon = get_field( 'icon', $term );
$color = get_field( 'color', $term );

$icon_url = wp_get_attachment_image_url( $icon, 'icon-thumbnails', false );

?>


<a
  class="ddp-button"
  style="--icon-url: url('<?php echo esc_attr( $icon_url ); ?>'); color: <?php echo esc_attr( $color ); ?>"
  href="<?php echo esc_url( get_term_link( $term ) ); ?>"
>
	<?php if ( $icon ) : ?>
		<span class="-my-2 ddp-button-icon"></span>
	<?php endif; ?>
	<?php if ( $term ) : ?>
		<span><?php echo esc_html( $term->name ); ?></span>
	<?php endif; ?>
</a>
