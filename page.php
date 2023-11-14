<?php
/**
 * The template for displaying all pages
 */

get_header();

?>


<main class="container flex-grow">
		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( is_front_page() ? 'template-parts/blocks/header' : 'template-parts/page/header' ); ?>

	<article class="grid gap-12 lg:gap-24 px-8 py-12">

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php get_template_part( 'template-parts/page/content', is_front_page() ? 'frontpage' : 'page' ); ?>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/post/content', 'none' ); ?>
		<?php endif; ?>

		<?php if ( is_front_page() ) : ?>
			<?php
			$section_talent = array(
				'config'    => 'featured',
				'component' => 'template-parts/base/slider-slide-post',
				'slides'    => get_posts(
					array(
						'post_type'      => 'talent',
						'posts_per_page' => '3',
					),
				),
			);

			$section_blog = array(
				'posts' => new WP_Query(
					array(
						'post_type'      => 'post',
						'posts_per_page' => '3',
					),
				),
			);

			$section_events = array(
				'posts' => new WP_Query(
					array(
						'suppress_filters' => true,
						'post_type'        => 'tribe_events',
						'posts_per_page'   => 2,
						'order'            => 'DESC',
						'orderby'          => 'meta_value',
						'meta_key'         => '_EventStartDate',
						'meta_query'       => array(
							array(
								'key'     => '_EventEndDate',
								'value'   => date('Y-m-d'),
								'compare' => false ? '<=' : '>=',
								'type'    => 'NUMERIC,'
							)
						),
					)
				),
			);
			?>
			<section class="relative grid grid-cols-1 gap-12 lg:gap-24 -mb-12 py-12 lg:py-24 bg-white">
				<div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] left-[50%]"></div>
				<div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] right-[50%]"></div>

				<header class="lg:-mb-12 text-center">
					<h2 class="text-4xl lg:text-5xl font-extralight">Stay updated!</h2>
				</header>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl lg:text-3xl font-light">Featured talents</h3>
					</header>
					<div class="grid rounded-2xl overflow-hidden will-change-transform">
						<?php set_query_var( 'slider', $section_talent ); ?>
						<?php get_template_part( 'template-parts/base/slider' ); ?>
					</div>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all talents', 'href' => get_post_type_archive_link( 'talent' ) ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl lg:text-3xl font-light">Latest blog posts</h3>
					</header>
					<ul class="grid-layout lg:grid-cols-3">
						<?php if ( $section_blog['posts']->have_posts() ) : ?>
							<?php while( $section_blog['posts']->have_posts() ) : $section_blog['posts']->the_post(); ?>
								<?php set_query_var( 'card', array( 'theme' => 'bg-gray' ) ); ?>
								<li class="block lg:hidden"><?php get_template_part( 'template-parts/base/card-post' ); ?></li>
								<li class="hidden lg:block"><?php get_template_part( 'template-parts/base/card' ); ?></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all posts', 'href' => get_post_type_archive_link( 'post' ) ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>

				<section class="grid gap-6">
					<header>
						<h3 class="text-xl lg:text-3xl font-light">Upcoming events</h3>
					</header>
					<ul class="grid-layout grid-cols-2">
						<?php if ( $section_events['posts']->have_posts() ) : ?>
							<?php while( $section_events['posts']->have_posts() ) : $section_events['posts']->the_post(); ?>
								<li><?php get_template_part( 'template-parts/base/card-event' ); ?></li>
							<?php endwhile; ?>
						<?php endif; ?>
					</ul>
					<footer class="text-center">
						<?php set_query_var( 'button', array( 'label' => 'See all events', 'href' => get_permalink( get_page_template_id( 'archive-events' )[0] ) ) ); ?>
						<?php get_template_part( 'template-parts/base/button' ); ?>
					</footer>
				</section>
			</section>
		<?php endif; ?>

	</article>

</main>


<?php get_footer(); ?>
