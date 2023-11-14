<dl class="flex flex-wrap gap-2">
	<?php foreach ( $social_links ?: array() as $social_link ) : ?>
		<?php if ( $social_link['url'] ) : ?>
			<?php $button_shortcode = '[button_link url="' . $social_link['url'] . '" icon="' . $social_link['social_network']['value'] . '"]'; ?>

			<dt class="sr-only"><?php echo esc_html( $social_link['social_network']['label'] ); ?></dt>
			<dd class=""><?php echo do_shortcode( $button_shortcode ); ?></dd>

		<?php endif; ?>
	<?php endforeach; ?>
</dl>
