<?php

$has_submission = af_has_submission();
$modal_id       = "modal-form-$this_post";

$form_settings = array(
	'display_title'       => false,
	'display_description' => false,
	'submit_text'         => 'Submit Application',
	'post_content'        => false,
	'uploader'            => 'basic',
);

?>


<template
	x-teleport="body"
	x-data="{
		postId: '<?php echo esc_attr( $this_post ); ?>',
		formId: '<?php echo esc_attr( $this_form ); ?>',
		modalId: '<?php echo esc_attr( $modal_id ); ?>',
		isSubmitted: <?php echo $has_submission ? 'true' : 'false'; ?>,
		get isOpen() {
			return (this.isSubmitted) || (this.openModal === this.formId);
		},
		closeModal() {
			this.openModal = null;
			this.isSubmitted = false;
		},
	}"
>
	<div x-show="isOpen" x-trap.inert.noscroll="isOpen">

		<div
			data-modal
			data-form="<?php echo esc_attr( $this_form ); ?>"
			<?php echo $has_submission ? 'data-form-success' : ''; ?>
			id="<?php echo esc_attr( $modal_id ); ?>"
			class="z-[999] fixed inset-0 flex justify-center items-center w-screen h-screen overflow-x-hidden overflow-y-auto"
			x-show="isOpen"
		>
			<div class="z-10 fixed inset-0 w-full h-full bg-black/50" @click="closeModal"></div>

			<div x-show="isOpen" x-transition data-modal="container" class="flex flex-col justify-center items-center w-full my-auto p-8">
				<div class="z-20 relative grid gap-8 w-full max-w-3xl p-8 lg:p-12 bg-white rounded-2xl overflow-hidden">

					<div class="z-20 absolute top-0 right-0 m-4 lg:m-8">
						<button class="flex p-2" <?php echo $has_submission ? 'onclick="window.location.reload(false);"' : '@click="closeModal"'; ?> aria-label="Close modal">
							<svg class="w-6 h-6 lg:w-8 lg:h-8 fill-none stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 38.92 38.92">
								<path d="M1 37.92 37.92 1m0 36.92L1 1" style="stroke-linecap:round;stroke-linejoin:round;stroke-width:2px"/>
							</svg>
						</button>
					</div>

					<?php if ( ! $has_submission ) : ?>
						<header class="z-10 relative flex flex-col w-full">
							<p class="w-full text-2xl"><?php wp_kses_ddmp( 'Apply to the Distributed Design Awards' ); ?></p>
						</header>
					<?php endif; ?>

					<?php advanced_form( $this_form, $form_settings ); ?>

				</div>
			</div>
		</div>

	</div>
</template>
