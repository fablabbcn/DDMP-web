<?php

$focal_point = get_post_meta( $slide['ID'], '_wpsmartcrop_image_focus' );
$media_attrs = array(
  'style' => $focal_point ? "object-position: {$focal_point[0]['left']}% {$focal_point[0]['top']}%" : '',
  'class' => ( array_key_exists( 'isRounded', $slider ) ? $slider['isRounded'] : true )
    ? 'w-full h-full max-h-[70vh] object-cover rounded-2xl overflow-hidden'
    : 'w-full h-full max-h-[70vh] object-cover',
);

$image = wp_get_attachment_image( $slide['ID'], 'slider', false, $media_attrs );
$caption = wp_get_attachment_caption( $slide['ID'] );

?>


<figure class="grid gap-5 grid-cols-5 <?php echo esc_attr( $slider['className']['slide'] ); ?>">
  <?php if ( $image ) : ?>
    <div class="col-span-full">
      <?php echo $image; ?>
    </div>
  <?php endif; ?>
  <?php if ( $caption ) : ?>
    <figcaption class="col-start-3 col-span-3">
      <p class="text-xs"><?php echo nl2br( $caption ); ?></p>
    </figcaption>
  <?php endif; ?>
</figure>
