<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = isset( $_post ) ? $_post : $post;

$s_classes = array(
	'article' => array( 'grid gap-8 relative min-w-0' ),
	'section' => array( 'grid min-w-0' ),
	'layout'  => array( 'grid gap-8 min-w-0' ),
	'columns' => array( 'grid-layout rich-text min-w-0' ),
);

$fields = array(
	array( 'description_short', 'description_detailed' ),
	array( 'details' ),
	array( 'images', 'video' ),
	array( 'website', 'social_media' ),
);

?>


<main class="container flex-grow">
	<article class="grid gap-12 px-8 py-12">
		<?php set_query_var( 'title', get_field( 'name' ) ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>


		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php $post = isset( $_post ) ? $_post : $post; ?>

			<header class="min-w-0">
				<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">
					<div class="relative bleed grid-layout gap-0 min-w-0">
						<div class="absolute top-0 right-0 m-8 ddp-button bg-white"><?php echo do_shortcode( '[wp_ulike]' ); ?></div>
						<div class="col-span-full">
							<?php echo wp_get_attachment_image( get_field( 'images' )[0]['image']['ID'], 'post-thumbnail', false, array( 'class' => 'w-full h-full max-h-[70vh] object-cover' ) ); ?>
						</div>
					</div>
				</div>
			</header>

			<section class="<?php the_classes( $s_classes['section'] ); ?>">
				<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">
					<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/entry.php' ); ?></div>
				</div>
			</section>

			<?php foreach ( array_merge( ...$fields ) as $field ) : ?>
				<?php
					$get_field  = get_field( $field );
					$get_object = get_field_object( $field );
					$details    = array( 'heading' => $get_object['label'] );
				?>
				<?php if ( $get_field ) : ?>
					<section class="<?php the_classes( $s_classes['section'] ); ?>">
						<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">
							<div class="<?php the_classes( $s_classes['columns'] ); ?>">

								<div class="grid-layout grid-cols-1 col-span-full lg:col-start-2 lg:col-end-3">
									<h2 class="!text-xl !font-light"><?php wp_kses_ddmp( $get_object['label'] ); ?></h2>
								</div>

								<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
									<?php if ( in_array( $field, array( 'country', 'keywords' ), true ) ) : ?>
										<p><?php echo wp_kses_post( $get_field ); ?></p>

									<?php elseif ( in_array( $field, array( 'description_short', 'description_detailed' ), true ) ) : ?>
										<?php echo wp_kses_post( $get_field ); ?>

									<?php elseif ( 'members' === $field ) : ?>
										<?php foreach ( $get_field as $key => $item ) : ?>
											<p><?php echo wp_kses_post( $item['name'] ); ?></p>
										<?php endforeach; ?>

									<?php elseif ( 'details' === $field ) : ?>
										<?php foreach ( $get_field as $key => $item ) : ?>
											<?php if ( $item['answer'] ) : ?>
												<dl class="space-y-2">
													<dt class="font-semibold"><?php echo wp_kses_post( $get_object['sub_fields'][ substr( $key, -1 ) - 1 ]['sub_fields'][0]['message'] ); ?></dt>
													<dd><?php echo $item['text'] ? wp_kses_post( $item['text'] ) : '—'; ?></dd>
												</dl>
											<?php endif; ?>
										<?php endforeach; ?>

									<?php elseif ( 'images' === $field ) : ?>
										<?php foreach ( $get_field as $key => $item ) : ?>
											<p><img class="w-full rounded-2xl overflow-hidden" src="<?php echo wp_kses_post( $item['image']['url'] ); ?>" alt=""></p>
										<?php endforeach; ?>

									<?php elseif ( 'video' === $field ) : ?>
										<?php if ( strpos( $get_field, 'youtu' ) ) : ?>
											<?php $youtube_regex = "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/"; ?>
											<?php $youtube_id = preg_match( $youtube_regex, $get_field, $matches); ?>
											<div class="">
												<iframe	class="" src="https://www.youtube.com/embed/<?php echo esc_attr( $matches[1] ); ?>" title="YouTube video player"
													frame frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>
										<?php elseif ( strpos( $get_field, 'vimeo' ) ) : ?>
											<?php $vimeo_regex = "/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/?(showcase\/)*([0-9))([a-z]*\/)*([0-9]{6,11})[?]?.*/"; ?>
											<?php $vimeo_id = preg_match( $vimeo_regex, $get_field, $matches); ?>
											<div class="">
												<iframe	class="" src="https://player.vimeo.com/video/<?php echo esc_attr( $matches[6] ); ?>?title=0&byline=0&portrait=0" title="Vimeo video player"
													frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
											</div>
										<?php else : ?>
											<p><a href="<?php echo wp_kses_post( $get_field ); ?>" target="_blank"><?php echo wp_kses_post( $get_field ); ?></a></p>
										<?php endif; ?>

									<?php elseif ( 'contact_details' === $field ) : ?>
										<p><?php echo wp_kses_post( $get_field['name'] ); ?></p>
										<p><a href="mailto:<?php echo wp_kses_post( $get_field['email'] ); ?>" target="_blank"><?php echo wp_kses_post( $get_field['email'] ); ?></a></p>
										<p><a href="tel:<?php echo wp_kses_post( $get_field['phone'] ); ?>" target="_blank"><?php echo wp_kses_post( $get_field['phone'] ); ?></a></p>

									<?php elseif ( 'website' === $field ) : ?>
										<?php $prefix = ! strpos( $get_field, '//' ) ? '//' : ''; ?>
										<p><a href="<?php echo esc_url( $prefix . $get_field ); ?>" target="_blank"><?php echo wp_kses_post( $get_field ); ?></a></p>

									<?php elseif ( 'social_media' === $field ) : ?>
										<?php foreach ( $get_field as $key => $item ) : ?>
											<?php $prefix = ! strpos( $item['link'], '//' ) ? '//' : ''; ?>
											<?php if ( ! $prefix ) : ?>
												<p><a href="<?php echo esc_url( $prefix . $item['link'] ); ?>" target="_blank"><?php echo wp_kses_post( $item['link'] ); ?></a></p>
											<?php else : ?>
												<p><?php echo wp_kses_post( $item['link'] ); ?></p>
											<?php endif; ?>
										<?php endforeach; ?>

									<?php elseif ( 'acceptance' === $field ) : ?>
										<?php foreach ( $get_field as $key => $item ) : ?>
											<p><?php echo wp_kses_post( "$key: $item" ); ?></p>
										<?php endforeach; ?>

									<?php endif; ?>
								</div>

							</div>
						</div>
					</section>
				<?php endif; ?>
			<?php endforeach; ?>

		<?php endwhile; ?>

	</article>
</main>


<?php get_footer(); ?>
