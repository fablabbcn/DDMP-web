<?php

// $image = get_sub_field( 'image' ) ? the_sub_field( 'image' ) : the_post_thumbnail_url();

// var_dump( get_sub_field( 'image' ) );
// var_dump( $image );

?>


<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
	<figure class="">
		<img
			class="w-full object-cover rounded-2xl overflow-hidden"
			src="<?php get_sub_field( 'image' ) ? the_sub_field( 'image' ) : the_post_thumbnail_url(); ?>"
			alt=""
		>
	</figure>
</div>
