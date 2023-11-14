<?php

/* Template Name: Form Entries */

if ( false ) :
	query_posts( array(
		'facetwp'          => true,
		'suppress_filters' => true,
		'post_type'      => 'af_entry',
		// 'posts_per_page' => '-1',
		'order'          => 'ASC',
		// 'orderby'        => 'rand',
		'date_query'     => array(
			array(
				'after'     => get_field( 'range' )['from'],
				'before'    => get_field( 'range' )['to'],
				'inclusive' => true,
			),
		),
	) );

	require 'archive.php';


else :

$has_banner = get_field( 'has_banner' );
$banner = get_field( 'banner' );

$entries = new WP_Query(
	array(
		'facetwp'          => true,
		'suppress_filters' => true,
		'post_type'      => 'af_entry',
		// 'posts_per_page' => '-1',
		'order'          => 'ASC',
		// 'orderby'        => 'rand',
		'date_query'     => array(
			array(
				'after'     => get_field( 'range' )['from'],
				'before'    => get_field( 'range' )['to'],
				'inclusive' => true,
			),
	),
	)
);

?>


<?php get_header(); ?>


<main class="container flex-grow">
	<article class="grid gap-12 px-8 py-12">

		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php set_query_var( 'subtitle', get_field( 'description' ) ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>

		<?php if ( $has_banner ) : ?>
			<aside class="relative grid-layout md:grid-cols-2 items-center px-0 py-12 lg:py-16 text-white bg-indigo rounded-3xl">
				<div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] left-[50%]"></div>
				<div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] right-[50%]"></div>

				<div class="flex flex-col gap-4 lg:gap-6 max-w-[40em]">
					<div class="text-3xl"><p><?php echo $banner['title']; ?></p></div>
					<div class="text-2xl"><?php echo $banner['description']; ?></div>
					<div class="mt-2"><a
						class="ddp-button"
						href="<?php echo esc_attr( $banner['link']['url'] ); ?>"
						target="<?php echo esc_attr( $banner['link']['target'] ); ?>"
					><?php echo esc_attr( $banner['link']['title'] ); ?></a></div>
				</div>

				<div class="order-first md:order-last">
					<?php echo wp_get_attachment_image( $banner['image']['ID'], 'post-thumbnail', false, array( 'class' => 'w-auto max-h-[24rem] m-auto' ) ); ?>
				</div>

			</aside>
		<?php endif ?>

		<nav class="grid-layout grid-cols-10 gap-8 text-center">
			<div class="flex flex-col gap-8 col-span-full lg:col-start-2 lg:col-span-8">
				<p class="text-xl lg:text-3xl font-light">Filter and customize your search</p>
				<?php echo wp_kses_post( do_shortcode( '[facetwp facet="archive_af_entry"]' ) ); ?>
			</div>
		</nav>

		<section class="">
			<ul class="grid-layout md:grid-cols-2 lg:grid-cols-3">

				<?php while ( $entries->have_posts() ) : ?>
					<?php $entries->the_post(); ?>
					<li class="<?php the_classes( '' ); ?>">
						<?php get_template_part( 'template-parts/base/card-af_entry' ); ?>
					</li>
				<?php endwhile ?>

			</ul>
		</section>


		<?php get_template_part( 'template-parts/archive/navigation' ); ?>
		<?php /* get_template_part( 'template-parts/forms/index' ); */ ?>


	</article>
</main>

<?php get_footer(); ?>

<?php endif; ?>
