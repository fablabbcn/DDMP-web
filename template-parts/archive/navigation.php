<?php

$facet_pager = do_shortcode( '[facetwp facet="pager_"]' );

$paginate_links = str_replace(
	array( 'page-numbers', 'current' ),
	array( '', '' ),
	paginate_links(
		array(
			'mid_size'  => 3,
			'prev_next' => true,
			'type'      => 'array',
		)
	)
);

?>


<nav class="flex justify-center items-center">

	<?php if ( $facet_pager ) : ?>
		<?php echo wp_kses_post( $facet_pager ); ?>

	<?php else : ?>
		<ul class="">
			<?php if ( $paginate_links ) : ?>
				<?php foreach ( $paginate_links as $paginate_link ) : ?>
					<li class=""><?php echo wp_kses_post( $paginate_link ); ?></li>
				<?php endforeach; ?>
			<?php else : ?>
				<li class=""><span class="page-numbers current">1</span></li>
			<?php endif; ?>
		</ul>

	<?php endif; ?>

</nav>
