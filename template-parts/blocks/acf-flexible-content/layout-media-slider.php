<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$slider = array(
	'config'    => 'featured',
	'slides'    => get_sub_field( 'media' ),
	'component' => 'template-parts/base/slider-slide-media',
);

$title = get_sub_field( 'title' );
$description = get_sub_field( 'description' );

?>


<section class="relative grid-layout gap-x-4 gap-y-8">

	<div class="grid-layout grid-cols-1 lg:grid-cols-3 col-span-full lg:col-span-3">
		<?php if ( $title ) : ?>
			<h3 class="text-xl lg:text-3xl font-light"><?php wp_kses_ddmp( $title ); ?></h3>
		<?php endif; ?>
		<?php if ( $description ) : ?>
			<div class="rich-text lg:col-span-2 lg:pr-16"><?php wp_kses_ddmp( $description ); ?></div>
		<?php endif; ?>
	</div>

	<div class="col-span-full lg:col-span-4">
		<?php set_query_var( 'slider', $slider ); ?>
		<?php get_template_part( 'template-parts/base/slider' ); ?>
	</div>

</section>
