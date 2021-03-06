<?php

$colors = array(
	'resources'    => 'lime',
	'tribe_events' => 'magenta',
);

$color            = $colors[ $post_type ];
$post_type_object = get_post_type_object( $post_type );

?>


<header class="tabs-header overflow-hidden">

	<h1 class="clip"><?php echo wp_kses_post( $post_type_object->label ); ?></h1>

	<div class="tab-filters <?php echo esc_attr( $post_type ); ?>-filter flex -mr-px border-l-px">
	<?php foreach ( $terms as $key => $term ) : ?>
		<?php $button_clip = get_button_clip( $terms, $term, 'list', 'get_term_slug' ); ?>
		<?php $button_class = get_the_classes( [ "flex-1 -mx-px lg:py-20 hover:bg-$color border-r border-l", 0 === $key ? "bg-$color" : '' ] ); ?>

		<button data-clip="<?php echo esc_attr( $button_clip ); ?>" class="<?php echo esc_attr( $button_class ); ?>">
			<h2 class="py-15 px-20 text-16 lg:text-24 leading-none font-oswald uppercase"><?php echo esc_html( get_term_name( $term ) ); ?></h2>
		</button>

	<?php endforeach; ?>
	</div>

</header>
