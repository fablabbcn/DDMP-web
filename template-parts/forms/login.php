<?php

$login_url = wp_lostpassword_url( get_permalink() );

?>


<fieldset class="flex flex-col gap-4 w-full mb-4">

	<p class="">Log In</p>

	<input name="username" id="username" class="<?php echo esc_attr( $form_classes['input'] ); ?>"
		type="text" placeholder="Username or Email" autocomplete="current-email">

	<input name="password" id="password" class="<?php echo esc_attr( $form_classes['input'] ); ?>"
		type="password" placeholder="Password" autocomplete="current-password">

	<p class="">
		<a class="underline" href="<?php echo esc_attr( $login_url ); ?>">Forgot your password?</a>
	</p>

</fieldset>
