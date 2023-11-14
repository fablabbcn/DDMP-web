<?php

$bg_color = array(
  'post' => 'bg-blue',
  'talent' => 'bg-yellow',
  'tribe_events' => 'bg-purple',
  'resources' => 'bg-red',
);

$is_post_new = function () {
  $post_date = get_the_date( 'U' );
  $current_date = current_time( 'timestamp' );
  $days = floor( ($current_date - $post_date) / (60 * 60 * 24) );
  return $days <= 7;
};

$image = get_field( 'images' )[0]['image']['ID'];

?>


<a class="group grid grid-cols-1 rounded-2xl overflow-hidden no-underline will-change-transform" href="<?php the_permalink(); ?>">
  <div class="relative">
    <?php if ( true || $is_post_new() ) : ?>
      <div class="z-10 absolute m-4 left-0 ddp-button font-semibold <?php echo $bg_color[ get_post_type() ] ?: 'bg-white'; ?>">New!</div>
    <?php endif; ?>
    <?php if ( do_shortcode( '[wp_ulike]' ) ) : ?>
      <div class="z-10 absolute m-4 right-0 ddp-button font-semibold bg-white"><?php echo do_shortcode( '[wp_ulike]' ); ?></div>
    <?php endif; ?>
    <figure class="aspect-w-4 aspect-h-3 <?php echo $bg_color[ get_post_type() ] ?: 'bg-black'; ?> overflow-hidden">
      <?php echo wp_get_attachment_image( $image, 'post-thumbnail', false, array( 'class' => 'w-full h-full object-cover group-hover:scale-105 group-focus:scale-105	transition-transform will-change-transform' ) ); ?>
    </figure>
  </div>
  <div class="grid items-end px-6 py-5 <?php echo $card['theme'] ?: 'bg-white'; ?>">
    <p class="line-clamp-1"><?php the_field( 'name' ); ?></p>
    <!-- <p class="text-xl font-regular line-clamp-1"><?php the_title(); ?></p> -->
  </div>
</a>
