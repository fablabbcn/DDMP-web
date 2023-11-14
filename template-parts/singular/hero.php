<?php

$slider = array(
	'config'    => 'featured',
	'component' => 'template-parts/singular/slider-slide',
	'slides'    => get_field( 'featured_image_alt' ) ?: array( get_post_thumbnail_id( $post ) ),
	'isRounded' => false,
);

$className = array(
	'header' => array(
		is_page() ? 'bg-white' : '',
	),
	'media' => array(
		in_array( $post->post_type, array( 'resources', 'talent' ) ) ? 'lg:col-span-5' : '',
		is_page() ? 'rounded-br-[8rem] lg:rounded-br-[16rem] overflow-hidden' : '',
	),
);

?>


<header class="bleed grid-layout gap-0 min-w-0 <?php echo the_classes( $className['header'] ); ?>">

	<?php if ( get_field( 'featured_image_alt' ) ) : ?>
		<div class="col-span-full <?php echo the_classes( $className['media'] ); ?>">
			<?php set_query_var( 'slider', $slider ); ?>
			<?php require locate_template( 'template-parts/base/slider.php' ); ?>
		</div>
	<?php else : ?>
		<div class="col-span-full <?php echo the_classes( $className['media'] ); ?>">
			<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full max-h-[70vh] object-cover' ) ); ?>
		</div>
	<?php endif; ?>

	<?php if ( in_array( $post->post_type, array( 'resources', 'talent' ) ) ) : ?>
		<div class="grid grid-cols-2 lg:grid-cols-1 col-span-full lg:col-span-2 lg:order-first">
			<div class="lg:aspect-none">
				<div class="flex flex-col justify-start !h-full p-8 pb-6 text-white bg-black">
					<h1 class="text-2xl leading-tight font-regular"><?php the_title(); ?></h1>
				</div>
			</div>
			<div class="lg:aspect-none">
				<div class="flex flex-col justify-end !h-full p-8 pb-6 text-white <?php echo esc_attr( $post->post_type === 'resources' ? 'bg-indigo' : 'bg-green' ); ?>">
					<p class="text-xl leading-tight font-light">A project by <br /> <?php the_field( 'name' ); ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>

</header>
