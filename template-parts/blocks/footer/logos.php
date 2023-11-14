<?php $logos = get_field( 'logos', 'options' ) ?: array(); ?>


<div class="grid-layout grid-cols-1 col-span-full lg:col-start-2 lg:col-end-7">
	<div class="flex flex-wrap gap-4 justify-center items-center brightness-0 invert">
		<?php foreach ( $logos as $key => $logo ) : ?>

			<figure class="flex">
				<?php if ( $logo['link'] ) : ?>
					<a class="flex" href="<?php echo esc_attr( $logo['link']['url'] ); ?>" target="<?php echo esc_attr( $logo['link']['target'] ); ?>">
						<img class="w-auto max-h-8 opacity-60" src="<?php echo esc_attr( $logo['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $logo['image']['alt'] ); ?>">
					</a>

				<?php else : ?>
					<span class="flex">
						<img class="w-auto max-h-8 opacity-60" src="<?php echo esc_attr( $logo['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $logo['image']['alt'] ); ?>">
					</span>

				<?php endif ?>
			</figure>

		<?php endforeach ?>
	</div>
</div>
