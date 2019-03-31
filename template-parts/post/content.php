<?php
/**
 * Template part for displaying posts
 */

$thumbnail_attrs = array(
	'style' => 'z-index: -10;',
	'class' => 'absolute pin w-full h-full object-cover group-hover:opacity-30',
)

?>


<div id="post-<?php the_ID(); ?>" class="relative aspect-ratio-1/1 w-full h-0 border-px border-solid overflow-hidden">
	<a class="group z-10 absolute pin flex w-full h-full p-20 hover:text-black bg-primary-70 hocus:bg-primary" href="<?php the_permalink(); ?>">

		<?php the_post_thumbnail( 'post-thumbnail', $thumbnail_attrs ); ?>

		<div class="flex flex-col flex-1 opacity-0 group-hover:opacity-100">
			<p class="font-bold uppercase"><?php the_title(); ?></p>
			<p>—</p>
			<p><?php the_field( 'subtitle' ); ?></p>
			<p class="mt-auto font-bold">Read More</p>
		</div>

	</a>
</div>
