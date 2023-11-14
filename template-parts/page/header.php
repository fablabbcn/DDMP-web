<header class="grid grid-cols-5 gap-4">

	<div class="flex flex-col gap-4 col-span-full lg:col-start-2 lg:col-span-3">
		<?php if ( $title ) : ?>
			<h1 class="text-4xl leading-none font-extralight text-center"><?php echo esc_html( $title ); ?></h1>
		<?php endif ?>
		<?php if ( $subtitle ) : ?>
			<p class="text-xl text-center"><?php echo esc_html( $subtitle ); ?></p>
		<?php endif ?>

	</div>

</header>
