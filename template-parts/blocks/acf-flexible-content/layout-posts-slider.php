<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$slider = array(
	'config'    => 'featured',
	'component' => 'template-parts/base/slider-slide-post',
	'slides'    => get_sub_field( 'featured_posts' ),
);

?>


<section class="z-0 relative flex max-h-[70vh] bg-gray">
	<div class="aspect-w-4 aspect-h-3"></div>
	<div class="absolute inset-0 w-full h-full">
		<div class="bleed h-full">
			<div class="relative h-full">
				<div class="z-10 absolute inset-0 bg-blue"></div>
				<!-- <div class="z-30 absolute inset-0 bg-gradient-to-br from-blue via-transparent to-transparent"></div> -->
				<div class="z-30 absolute inset-0 bg-gradient-corner-blue pointer-events-none"></div>
				<div class="z-20 relative h-full bg-black rounded-br-[8rem] lg:rounded-br-[16rem] overflow-hidden">
					<?php set_query_var( 'slider', $slider ); ?>
					<?php get_template_part( 'template-parts/base/slider' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
