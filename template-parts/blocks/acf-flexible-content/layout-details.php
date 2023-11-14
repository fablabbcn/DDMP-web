<?php
/**
 * ✅ Template part for Details layout
 */

$title = get_sub_field( 'title' );
$sections = get_sub_field( 'sections' ) ?: array();

?>


<section class="grid-layout gap-6">
	<header class="col-span-full lg:col-span-1">
		<h2 class="text-xl lg:text-3xl font-light"><?php echo esc_html( $title ); ?></h2>
	</header>

	<div class="col-span-full lg:col-span-6">
		<div class="grid-layout gap-0 lg:gap-4 lg:grid-cols-3 items-baseline -space-y-px">
			<?php foreach ( $sections as $section ) : ?>
				<?php
				$section['items'] = $section['settings']['use_partners'] ? get_field( 'logos', 'options' ) : $section['items'];
				$_title = $section['items'] && count( $section['items'] )
					? count( $section['items'] ) . ' ' . $section['title']
					: $section['title'];
				?>

				<div class="grid grid-cols-5 lg:grid-cols-1 gap-4 lg:gap-0">
					<header class="col-span-2 lg:col-span-full py-6 border-y lg:border-b-0">
						<p class="text-2xl"><?php echo esc_html( $_title ); ?></p>
					</header>

					<div
						class="grid gap-8 col-span-3 lg:col-span-full py-6 border-y lg:border-b-0"
						x-data="{ count: <?php echo count( $section['items'] ?: array() ); ?>, maxCount: 14, isCollapsed: true }"
					>
						<?php if ( array_key_exists( 'items', $section ) && $section['items'] ) : ?>
							<ol class="<?php echo esc_attr( $section['settings']['column_count'] === '1' ? 'columns-1' : 'columns-2' ) ?> [column-gap-[1rem]] space-y-2">
								<?php foreach ( $section['items'] as $key => $item ) : ?>

									<li
										class="text-xl leading-tight"
										:class="index >= maxCount && isCollapsed && 'hidden'"
										x-data="{ index: <?php echo $key; ?>, isOpen: false }"
									>
										<?php if ( ! $item['description'] ) : ?>
											<span><?php echo esc_html( $item['title'] ?: $item['label'] ); ?></span>
										<?php else : ?>
											<button @click="isOpen = !isOpen"><?php echo esc_html( $item['title'] ?: $item['label'] ); ?></button>

											<template x-teleport="body">
												<div x-show="isOpen" x-trap.inert.noscroll="isOpen">
													<?php set_query_var( 'modal', $item ); ?>
													<?php get_template_part( 'template-parts/base/modal' ); ?>
												</div>
											</template>
										<?php endif; ?>
									</li>

								<?php endforeach; ?>
							</ol>
						<?php endif; ?>

						<template x-if="true">
							<div
								x-show="count > maxCount && isCollapsed"
								x-transition
								@click="isCollapsed = !isCollapsed"
							>
								<?php set_query_var( 'button', array( 'label' => 'Show more' ) ); ?>
								<?php get_template_part( 'template-parts/base/button' ); ?>
							</div>
						</template>

						<?php if ( array_key_exists( 'button', $section ) && $section['button']['label'] ) : ?>
							<div class="">
								<?php set_query_var( 'button', $section['button'] ); ?>
								<?php get_template_part( 'template-parts/base/button' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>
	</div>
</section>
