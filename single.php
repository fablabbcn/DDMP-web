<?php
/**
 * The template for displaying all single posts
 */

get_header();

$s_classes = array(
	'columns' => array(
		array( 'w-full lg:w-1/3 p-20 lg:px-40 border-t' ),
		array( 'w-full lg:w-2/3 flex-1 p-20 lg:px-40 border-t lg:border-l' ),
		array( 'w-full lg:w-auto p-20 lg:px-40 border-t lg:border-l' ),
	),
);

?>


<main>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<?php if ( 'talent' === $post_type ) : ?>
			<section class="post-content rich-text">
				<div class="flex flex-wrap lg:flex-no-wrap">
					<div class="<?php the_classes( $s_classes['columns'][0] ); ?>"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'][2] ); ?>"><?php get_template_part( 'template-parts/post/aside' ); ?></div>
				</div>
			</section>

		<?php else : ?>
			<section class="cf bootstrap-wrapper post-content rich-text">
				<div class="row row-eq-height">
					<div class="fl single_first-column"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
					<div class="fl single_second-column flex flex-col"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
					<div class="fl single_third-column"><?php get_template_part( 'template-parts/post/aside' ); ?></div>
				</div>
			</section>
		<?php endif; ?>


		<?php if ( have_rows( 'post_content' ) ) : ?>
			<?php while ( have_rows( 'post_content' ) ) : ?>
				<?php if ( count( array_filter( the_row() ) ) > 1 ) : ?>

					<section class="cf bootstrap-wrapper post-content rich-text">
						<div class="row row-eq-height">

							<?php if ( 'text_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">&nbsp;</div>
								<div class="fl single_second-column content-column"><?php the_sub_field( 'text' ); ?></div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php elseif ( 'image_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">
									<p class="b"><?php the_sub_field( 'heading' ); ?></p>
									<p>-</p>
									<p><?php the_sub_field( 'sub_heading' ); ?></p>
									<p class="absolute bottom-2 b"><?php the_sub_field( 'bottom' ); ?></p>
								</div>
								<div class="fl single_second-column bg-center bg-cover" style="background-image: url('<?php the_sub_field( 'image' ); ?>');">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">
									<p class="b"><?php the_sub_field( 'heading' ); ?></p>
									<p>-</p>
									<p><?php the_sub_field( 'sub_heading' ); ?></p>
									<p class="absolute bottom-2 b"><?php the_sub_field( 'bottom' ); ?></p>
								</div>
								<div class="fl single_slider-column">
									<?php $images = get_sub_field( 'image' ); ?>
									<?php if ( $images ) : ?>
										<div class="post-slider">
										<?php foreach ( $images as $image ) : ?>
											<div><img src="<?php echo esc_attr( $image['url'] ); ?>"/></div>
										<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php endif; ?>
						</div>
					</section>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

	<?php endwhile; ?>

</main>


<?php get_footer(); ?>
