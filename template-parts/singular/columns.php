<?php

$_items     = get_sub_field( 'items' ) ?: array();
$cols_grow  = get_sub_field( 'columns_grow' );
$has_border = get_sub_field( 'has_border' );

?>


<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
	<div class="grid grid-cols-[repeat(auto-fit,minmax(10rem,1fr))] items-baseline gap-8">
		<?php foreach ( $_items as $_item ) : ?>

			<div class="grid gap-4 <?php echo $has_border ? 'py-4 border-t' : ''; ?>">

				<?php if ( $_item['link'] ) : ?>
					<a class="grid gap-4"
						href="<?php echo esc_attr( $_item['link']['url'] ); ?>"
						target="<?php echo esc_attr( $_item['link']['target'] ); ?>">
				<?php endif; ?>

					<?php if ( $_item['image'] ) : ?>
						<figure class="mx-auto" _class="aspect-w-1 aspect-h-1 bg-black/0 rounded-2xl overflow-hidden">
							<?php echo wp_get_attachment_image( $_item['image'], 'post-list-thumbnails-square', false, array( 'class' => 'w-full h-full object-cover' ) ); ?>
						</figure>
					<?php endif; ?>

					<div class="rich-text">
						<?php echo wp_kses_post( $_item['text'] ); ?>
					</div>

				<?php if ( $_item['link'] ) : ?>
					</a>
				<?php endif; ?>

			</div>

		<?php endforeach; ?>
	</div>
</div>
