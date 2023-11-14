<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$title = get_sub_field( 'title' );
$description = get_sub_field( 'description' );
$partners = get_field( 'logos', 'options' ) ?: array();

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
		<div class="flex justify-center items-center invert">
			<?php get_template_part( 'template-parts/blocks/footer/logos' ); ?>
		</div>
	</div>

	<div class="col-span-full lg:col-start-2 lg:col-span-6">
		<?php if ( get_field( 'logos', 'options' ) ) : ?>
			<div class="acf-map aspect-w-16 aspect-h-9 w-full rounded-2xl overflow-hidden" data-zoom="16">
				<?php foreach( $partners as $partner ) : ?>
					<?php if ( $partner['location'] ) : ?>
						<div
							class="marker"
							data-title="<?php echo esc_attr( $partner['title'] ); ?>"
							data-lat="<?php echo esc_attr( $partner['location']['lat'] ); ?>"
							data-lng="<?php echo esc_attr( $partner['location']['lng'] ); ?>"
						>
							<p class="font-semibold"><?php echo esc_html( $partner['title'] ); ?></p>
							<div class=""><?php echo wp_kses_ddmp( $partner['description'] ); ?></div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>

</section>
