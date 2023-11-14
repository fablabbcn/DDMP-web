<?php

$images = get_sub_field( 'image' ) ?: array();
$slider = array(
	'slides'     => $images,
	'component'  => 'template-parts/singular/slider-slide',
	'pagination' => false,
	'navigation' => false,
	'class'      => '!overflow-visible',
);

?>


<?php if ( $images ) : ?>
	<div class="bleed col-span-full overflow-hidden">
		<div class="container px-8 grid-layout">
			<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
				<?php set_query_var( 'slider', $slider ); ?>
				<?php get_template_part( 'template-parts/base/slider' ); ?>
			</div>
		</div>
	</div>
<?php endif; ?>
