<?php

$category_slug = array(
  'post' => 'category',
  'talent' => 'category_talent',
  'tribe_events' => 'tribe_events_cat',
  'resources' => 'resources_category',
)[ get_post_type() ];

?>


<div class="grid-layout grid-cols-[1fr_auto] items-baseline col-span-full lg:col-start-3 lg:col-end-7">
  <div class="flex flex-wrap gap-2">
    <?php foreach ( wp_get_object_terms( $post->ID, $category_slug ) as $term ) : ?>
      <?php set_query_var( 'term', $term ); ?>
      <?php get_template_part( 'template-parts/base/button-taxonomy' ); ?>
    <?php endforeach; ?>
  </div>

  <?php if ( 'post' === $post->post_type ) : ?>
    <div>
      <p class=""><?php the_date(); ?></p>
    </div>
  <?php endif; ?>
</div>
