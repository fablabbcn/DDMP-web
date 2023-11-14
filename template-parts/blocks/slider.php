<?php if ( array_key_exists( 'images', $slider ) && $slider['images'] ) : ?>

	<div class="swiper<?php echo esc_attr( $slider['class'] ?: '' ); ?>">
		<div class="swiper-pagination"></div>

		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>

		<div class="swiper-scrollbar"></div>

		<div class="swiper-wrapper">

			<?php foreach ( $slider['images'] as $key => $image ) : ?>
				<?php
				$focal_point = get_post_meta( $image['ID'], '_wpsmartcrop_image_focus' );
				$media_attrs = array(
					'style' => $focal_point ? "visibility: unset; object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : 'visibility: unset;',
					'class' => 'w-full h-full object-cover',
				);
				?>

				<div class="swiper-slide">
					<figure class="aspect-w-16 aspect-h-9 bg-black rounded-2xl overflow-hidden">
						<?php if ( 'video' === $image['type'] ) : ?>
							<video autoplay loop
								class="<?php echo esc_attr( $media_attrs['class'] ); ?>"
								src="<?php echo esc_attr( $image['url'] ); ?>"></video>

						<?php else : ?>
							<?php echo wp_get_attachment_image( $image['ID'], 'container-thumbnails', false, $media_attrs ); ?>

						<?php endif; ?>
					</figure>
				</div>

			<?php endforeach ?>

		</div>
	</div>

<?php endif ?>


<?php if ( array_key_exists( 'caption', $slider ) && $slider['caption'] ) : ?>

	<div class="notice">
		<p><?php echo esc_html( $slider['caption'] ); ?></p>
	</div>

<?php endif ?>
