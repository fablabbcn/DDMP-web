<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = $_post ?: $post;

$s_classes = array(
	'section' => array( 'post-content rich-text relative' ),
	'layout'  => array( 'flex flex-wrap lg:flex-no-wrap' ),
	'columns' => array(
		array( 'flex flex-col w-full lg:w-1/4 p-20 lg:px-40 border-t' ),
		array( 'flex flex-col w-full lg:w-3/4 p-20 lg:px-40 border-t lg:border-l' ),
		array( 'hidden md:flex flex-col w-full lg:w-auto p-20 lg:px-40 border-t lg:border-l' ),
	),
);

?>


<main>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $post = $_post ?: $post; ?>

		<section class="<?php the_classes( $s_classes['section'] ); ?>">
			<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">
				<div class="<?php the_classes( $s_classes['columns'][0] ); ?>"><?php include locate_template( 'template-parts/singular/side.php' ); ?></div>
				<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php include locate_template( 'template-parts/singular/hero.php' ); ?></div>
				<div class="<?php the_classes( $s_classes['columns'][2] ); ?>"><?php include locate_template( 'template-parts/post/aside.php' ); ?></div>
			</div>
		</section>


		<?php if ( have_rows( 'post_content' ) ) : ?>
			<?php while ( have_rows( 'post_content' ) ) : ?>
				<?php if ( count( array_filter( the_row() ) ) > 1 ) : ?>

					<section class="<?php the_classes( $s_classes['section'] ); ?>">
						<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">

						<?php if ( 'text_content' === get_row_layout() ) : ?>
							<div class="<?php the_classes( $s_classes['columns'][0] ); ?>">&nbsp;</div>
							<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php the_sub_field( 'text' ); ?></div>
							<div class="<?php the_classes( $s_classes['columns'][2] ); ?>">&nbsp;</div>


						<?php elseif ( 'image_content' === get_row_layout() ) : ?>
							<div class="<?php the_classes( $s_classes['columns'][0] ); ?>"><?php include locate_template( 'template-parts/singular/details.php' ); ?></div>
							<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php include locate_template( 'template-parts/singular/image.php' ); ?></div>
							<div class="<?php the_classes( $s_classes['columns'][2] ); ?>">&nbsp;</div>


						<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
							<div class="<?php the_classes( $s_classes['columns'][0] ); ?>"><?php include locate_template( 'template-parts/singular/details.php' ); ?></div>
							<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php include locate_template( 'template-parts/singular/slider.php' ); ?></div>
							<div class="<?php the_classes( $s_classes['columns'][2] ); ?>">&nbsp;</div>


						<?php endif; ?>
						</div>
					</section>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>


		<?php if ( 'tribe_events' === $post_type ) : ?>

			<section class="<?php the_classes( $s_classes['section'] ); ?>">
				<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">

					<div class="<?php the_classes( $s_classes['columns'][0] ); ?>"><?php include locate_template( 'template-parts/singular/event.php' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'][1] ); ?>"><?php include locate_template( 'template-parts/singular/map.php' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'][2] ); ?>">&nbsp;</div>

				</div>
			</section>

		<?php endif; ?>

	<?php endwhile; ?>

</main>


<?php get_footer(); ?>
