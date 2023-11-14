<?php
/**
 * ✅ Template part for Cards List layout
 */

$_items = get_sub_field( 'items' ) ?: array();

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

	<div class="col-span-full lg:col-span-full">
		<ul class="grid-layout grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 items-baseline">
			<?php foreach ( $_items as $_item ) : ?>

				<li class="flex flex-col gap-4 h-full p-6 lg:p-8 bg-white rounded-2xl">
					<div class="flex flex-col gap-2">
						<figure class="w-24 h-24 mx-auto">
							<?php echo wp_get_attachment_image( $_item['image'], 'thumbnail', false, array( 'class' => 'w-full' ) ); ?>
						</figure>
					</div>
					<div class="flex flex-col gap-2 lg:gap-4 text-center">
						<div class="text-lg font-semibold"><?php echo esc_html( $_item['title'] ); ?></div>
						<div class=""><?php echo wp_kses_post( $_item['text'] ); ?></div>
					</div>
				</li>

			<?php endforeach; ?>
		</ul>
	</div>

</section>
