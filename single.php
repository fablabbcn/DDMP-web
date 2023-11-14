<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = isset( $_post ) ? $_post : $post;

$title = array(
	'post' => get_the_title( get_option('page_for_posts', true) ),
	'resources' => get_post_type_object( $post_type )->labels->name,
	'talent' => get_post_type_object( $post_type )->labels->name,
	'tribe_events' => get_the_title( get_page_template_id( 'archive-events' )[0]->ID ),
	'page' => get_the_title(),
)[ get_post_type() ];

$s_classes = array(
	'article' => array( 'grid gap-8 relative min-w-0' ),
	'section' => array( 'grid min-w-0' ),
	'layout'  => array( 'grid gap-8 min-w-0' ),
	'columns' => array( 'grid-layout rich-text min-w-0' ),
);

?>


<main class="container flex-grow">
	<article class="grid gap-12 px-8 py-12">
		<?php set_query_var( 'title', $title ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php $post = isset( $_post ) ? $_post : $post; ?>

			<header class="min-w-0">
				<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">

					<?php include locate_template( 'template-parts/singular/hero.php' ); ?>

					<div class="<?php the_classes( $s_classes['columns'] ); ?>">
						<?php include locate_template( 'template-parts/singular/meta.php' ); ?>
					</div>

					<?php if ( 'post' === $post->post_type ) : ?>
						<div class="<?php the_classes( $s_classes['columns'] ); ?>">
							<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
								<h1 class="mt-4 -mb-4 text-2xl leading-tight"><?php the_title(); ?></h1>
							</div>
						</div>
					<?php endif; ?>

				</div>
			</header>

			<?php if ( 'talent' === $post->post_type ) : ?>
				<?php
				$definitions = array(
					'items' => array(
						array( 'terms' => array('Profession'), 'definitions' => array( get_field( 'profession' ) ?: '—' ) ),
						array( 'terms' => array('Project'), 'definitions' => array( get_field( 'project' ) ?: '—' ) ),
						array( 'terms' => array('Based in'), 'definitions' => array( get_field( 'city' ) ?: '—' ) ),
						array( 'terms' => array('Platform Member'), 'definitions' => array( get_field( 'organization' ) ?: '—' ) ),
						array( 'terms' => array('Works at'), 'definitions' => array( get_field( 'workplace' ) ?: '—' ) ),
					),
				);
				?>

				<section class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="talent-details" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/talent.php' ); ?></div>
					</div>
				</section>

			<?php elseif ( 'tribe_events' === $post->post_type ) : ?>
				<section class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/event.php' ); ?></div>
					</div>
				</section>
			<?php endif; ?>

			<?php if ( have_rows( 'post_content' ) ) : ?>
				<section class="<?php the_classes( $s_classes['article'] ); ?> _[&_p:first-of-type]:font-semibold _[&_p:first-of-type]:text-[112.5%]">

					<?php if ( in_array( $post->post_type, array( 'resources', 'talent', 'tribe_events' ) ) ) : ?>
						<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?> lg:absolute lg:w-full">
							<div class="<?php the_classes( $s_classes['columns'] ); ?>">
								<div class="grid-layout grid-cols-1 col-span-full lg:col-start-2 lg:col-end-3">
									<h2 class="!text-xl !font-light">About the <?php echo esc_html( 'tribe_events' === $post->post_type ? 'event' : 'project' ); ?></h2>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<?php while ( have_rows( 'post_content' ) ) : ?>
						<?php if ( count( array_filter( the_row() ) ) > 1 ) : ?>
							<?php
							$has_border = 'multi_columns' === get_row_layout() ? get_sub_field( 'has_border' ) : true;
							$details    = array_filter(
								array(
									'heading'    => get_sub_field( 'heading' ),
									'subheading' => get_sub_field( 'sub_heading' ),
									'bottom'     => get_sub_field( 'bottom' ),
								)
							);
							?>

							<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">

								<?php if ( 'text_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/text.php' ); ?></div>
								<?php elseif ( 'image_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/image.php' ); ?></div>
								<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/slider.php' ); ?></div>
								<?php elseif ( 'multi_columns' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/columns.php' ); ?></div>
								<?php endif; ?>

							</div>

						<?php endif; ?>
					<?php endwhile; ?>

				</section>
			<?php endif; ?>

			<?php if ( 'post' === $post->post_type ) : ?>
				<footer class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="post-credits" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<?php
						$tags = array_map(
							function ( $item ) { return array( 'label' => $item->name, 'href' => get_term_link( $item ) ); },
							wp_get_object_terms( $post->ID, 'post_tag' )
						);
						$definitions = array(
							'items' => array(
								array( 'terms' => array('Author'), 'definitions' => array( get_field( 'author' ) ?: get_the_author() ?: '—' ) ),
								array( 'terms' => array('Institution'), 'definitions' => array( get_field( 'institution' ) ?: '—' ) ),
								array( 'terms' => array('Tags'), 'definitions' => array( $tags ?: '—' ) ),
							),
						);
						?>

						<div class="<?php the_classes( $s_classes['columns'] ); ?>">
							<div class="grid-layout lg:grid-cols-5 col-span-full lg:col-start-3 lg:col-end-7">
								<div class="col-span-full lg:col-start-1 lg:col-end-2">
									<p class="text-xl lg:text-3xl font-light">Blog post credits</p>
								</div>
								<div class="col-span-full lg:col-start-2 lg:col-end-6">
									<?php set_query_var( 'list', $definitions ); ?>
									<?php get_template_part( 'template-parts/base/list-definitions' ); ?>
								</div>
							</div>
						</div>

					</div>
				</footer>
			<?php elseif ( 'tribe_events' === $post->post_type ) : ?>
				<section class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/map.php' ); ?></div>
					</div>
				</section>
			<?php endif; ?>

			<?php if ( in_array( $post->post_type, array( 'post', 'talent', 'tribe_events' ) ) ) : ?>
				<?php
				$related = array(
					'title' => array(
						'post' => 'Latest posts',
						'talent' => 'Related talents',
						'tribe_events' => 'Other events',
					)[ $post->post_type ],
					'posts' => new WP_Query( array(
							'post__not_in'   => array( $post->ID ),
							'post_type'      => $post->post_type,
							'posts_per_page' => '3',
					) ),
					'button' => array(
						'label' => array(
							'post' => 'See all posts',
							'talent' => 'See all talents',
							'tribe_events' => 'See all events',
						)[ $post->post_type ],
						'href' => $post->post_type === 'tribe_events'
							? get_permalink( get_page_template_id( 'archive-events' )[0] )
							: get_post_type_archive_link( $post->post_type ),
					),
				);
				?>
				<nav class="mt-12">
					<div data-layout="post-latest" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<p class="text-xl lg:text-3xl font-light"><?php echo esc_html( $related['title'] ); ?></p>
						<ul class="grid-layout lg:grid-cols-3">
							<?php while ( $related['posts']->have_posts() ) : ?>
								<?php $related['posts']->the_post(); ?>
								<li class="col-span-full lg:col-span-1"><?php get_template_part( 'template-parts/base/card' ); ?></li>
							<?php endwhile ?>
						</ul>
						<div class="mx-auto">
							<?php set_query_var( 'button', $related['button'] ); ?>
							<?php get_template_part( 'template-parts/base/button' ); ?>
						</div>
					</div>
				</nav>
			<?php endif; ?>

		<?php endwhile; ?>
	</article>
</main>


<?php get_footer(); ?>
