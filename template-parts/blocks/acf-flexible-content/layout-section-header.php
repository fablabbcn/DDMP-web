<?php
/**
 * ✅ Template part for Section Header layout
 */

$_title       = get_sub_field( 'title' );
$_description = get_sub_field( 'description' );

?>

<div class="">

	<?php if ( $_title ) : ?>
		<div class=""><?php echo wp_kses_post( $_title ); ?></div>
	<?php endif; ?>

	<?php if ( $_description ) : ?>
		<div class=""><?php echo wp_kses_post( $_description ); ?></div>
	<?php endif; ?>

</div>
