<?php

$title = get_sub_field( 'title' );
$description = get_sub_field( 'description' );

$styles = get_sub_field( 'styles' );
$className = array(
  'relative grid-layout py-4 text-white',
  $styles['bg_color'] ?: 'bg-indigo',
  $styles['font_size'] ?: '',
  $styles['font_weight'] ?: '',
  $styles['text_align'] ?: '',
);

?>


<aside class="<?php echo the_classes( $className ); ?>">
  <div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] left-[50%]"></div>
  <div aria-hidden="true" class="-z-10 absolute inset-y-0 bg-[inherit] w-[50vw] right-[50%]"></div>

  <div class="col-span-full lg:col-start-2 lg:col-end-7 flex justify-center items-center py-8 lg:p-16">
    <div class="flex flex-col w-full text-3xl leading-tight [&_br]:hidden <?php echo esc_attr( $styles['font_weight'] ?: 'font-thin' ); ?>">
      <?php echo wp_kses_ddmp( $description ); ?>
    </div>
  </div>
</aside>
