<?php

$contact = get_field( 'contact', 'options' );

?>


		<aside class="mt-auto text-white bg-green">
			<?php get_template_part( 'template-parts/blocks/footer/newsletter' ); ?>
		</aside>

		<footer class="text-white bg-black">
			<div class="container">
				<div class="grid gap-12 px-8 py-12">

					<div class="grid-layout text-sm">
						<?php get_template_part( 'template-parts/blocks/footer/logos' ); ?>
					</div>

					<div class="grid-layout grid-cols-2 lg:grid-cols-14 text-xs lg:text-sm [&_img]:inline-block [&_img]:w-auto [&_img]:max-h-10 lg:[&_img]:max-h-12 [&_img]:brightness-0 [&_img]:invert [&_p]:hyphens-auto">
						<div class="grid gap-6 row-start-1 lg:row-start-1 lg:col-start-1 lg:col-end-4">
							<figure class="flex">
								<?php echo wp_get_attachment_image( $contact['left']['image'], 'post-thumbnail', false ); ?>
							</figure>
						</div>
						<div class="grid gap-6 row-start-2 lg:row-start-1 lg:col-start-4 lg:col-end-8">
							<?php echo wp_kses_post( $contact['left']['description'] ); ?>
						</div>
						<div class="grid gap-6 row-start-2 lg:row-start-1 lg:col-start-8 lg:col-end-12">
							<?php echo wp_kses_post( $contact['right']['description'] ); ?>
						</div>
						<div class="grid gap-6 row-start-1 lg:row-start-1 lg:col-start-12 lg:col-end-15">
							<figure class="flex">
								<?php echo wp_get_attachment_image( $contact['right']['image'], 'post-thumbnail', false ); ?>
							</figure>
						</div>
					</div>

					<div class="text-xs">
						<p class="text-center">
							<small>&copy; 2023 Distributed Design. All Rights Reserved.</small>
						</p>
					</div>

				</div>
			</div>
		</footer>

	</div>

	<div id="wp-footer"><?php wp_footer(); ?></div>

</body>
</html>
