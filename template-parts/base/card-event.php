<?php

setup_postdata( $post );

$date_start = tribe_get_start_date( null, false, 'd M' );
$date_end   = tribe_get_end_date( null, false, 'd M' );
$city       = tribe_get_venue_object( $post )->city;

$label = $date_start !== $date_end ? "{$date_start} – {$date_end}, {$city}" : "$date_start, {$city}";

$button = array(
  'label' => $label,
  'theme' => 'text-white bg-purple border-purple',
  'type'  => 'span',
);

?>


<a class="group relative grid grid-cols-1 gap-4 bg-purple rounded-2xl overflow-hidden" href="<?php the_permalink(); ?>">
  <div class="aspect-w-1 aspect-h-1 md:aspect-w-3 md:aspect-h-2 lg:aspect-w-4 lg:aspect-h-3">
    <figure class="bg-black rounded-2xl overflow-hidden">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover opacity-70 group-hover:scale-105 group-focus:scale-105	transition-transform' ) ); ?>
    </figure>
  </div>
  <div class="absolute inset-0 w-full h-full flex flex-col p-4 text-white text-center">
    <div class="grid gap-2 my-auto">
      <p class="text-2xl font-bold line-clamp-3 [text-wrap:balance]"><?php the_title(); ?></p>
      <p class="hidden lg:block lg:line-clamp-1 font-bold uppercase"><?php echo esc_html( $label ); ?></p>
    </div>
    <div class="grid lg:hidden">
      <?php set_query_var( 'button', $button ); ?>
      <?php get_template_part( 'template-parts/base/button' ); ?>
    </div>
  </div>
</a>
