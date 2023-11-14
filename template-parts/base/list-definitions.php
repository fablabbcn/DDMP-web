<?php

?>


<?php if ( array_key_exists( 'items', $list ) && $list['items'] ) : ?>
	<dl class="grid divide-y border-y">

		<?php foreach ( $list['items'] as $key => $item ) : ?>
			<div class="grid md:grid-cols-[2fr_4fr] items-center py-2 [&>dd]:font-semibold">

				<?php foreach ( $item['terms'] as $key => $term ) : ?>
					<dt class="uppercase text-xs tracking-wide"><?php echo $term; ?></dt>
				<?php endforeach; ?>

				<?php foreach ( $item['definitions'] as $key => $definition ) : ?>
					<dd class="flex flex-wrap gap-x-4 gap-y-1">
						<?php switch ( gettype( $definition ) ) : ?><?php
							case 'array' : ?>
								<?php foreach ( $definition as $key => $d ) : ?>
									<?php if ( $d['href'] ) : ?>
										<a href="<?php echo esc_url( $d['href'] ); ?>"><?php echo wp_kses_post( $d['label'] ); ?></a>
									<?php else : ?>
										<span><?php echo wp_kses_post( $d['label'] ); ?></span>
									<?php endif; ?>
								<?php endforeach; ?>
								<?php break;
							default : ?>
								<span><?php echo wp_kses_post( $definition ); ?></span>
								<?php break; ?>
						<?php endswitch; ?>
					</dd>
				<?php endforeach; ?>

			</div>
		<?php endforeach; ?>

	</dl>
<?php endif; ?>
