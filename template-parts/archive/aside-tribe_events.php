<?php

$months = array_map(
	function ( $month ) {
		return str_pad( $month, 2, '0', STR_PAD_LEFT );
	},
	range( 1, 12 )
);

?>


<aside class="relative flex flex-col md:flex-row -mt-border border-t border-b">

	<div class="relative flex justify-between items-baseline ml-auto px-20 py-20 bg-gray uppercase border-l">

		<p class="text-22 font-oswald font-bold">Distributed Design Event Calendar</p>
		<p class="text-20 font-bold">
			<button data-clip="event-months" class="flex uppercase">
				<span class="mr-10">Month</span>
				<span class="w-20"><?php require get_template_directory() . '/assets/images/caret.svg'; ?></span>
			</button>
		</p>

		<div id="event-months" class="clip z-50 absolute pin-x inset-t-full mt-border">
			<ul class="list-reset -ml-border bg-gray border-l">
			<?php foreach ( $months as $key => $month ) : ?>
				<?php $date = date( 'F', strtotime( "$month/01/2019" ) ); ?>
				<?php $is_current = date( 'F' ) === $date; ?>
				<?php $button_clip = get_button_clip( $months, $month, 'event', 'get_term_month' ); ?>
				<?php $button_classes = 'flex w-full px-20 py-10 hover:bg-magenta uppercase'; ?>
				<?php // $button_classes = $is_current ? "$button_classes font-bold" : $button_classes; ?>

				<li class="flex border-b">
					<button data-clip="event-months, <?php echo esc_attr( $button_clip ); ?>"
						class="<?php echo esc_attr( $button_classes ); ?>"><?php echo esc_html( $date ); ?></button>
				</li>

			<?php endforeach; ?>
			</ul>
		</div>

	</div>

</aside>
