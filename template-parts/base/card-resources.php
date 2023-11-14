<div class="group grid-layout no-underline pt-4 border-t" href="<?php the_permalink(); ?>">

  <div class="col-span-full lg:col-span-3">
    <div class="grid grid-cols-3 lg:grid-rows-[auto_1fr] items-end gap-4 h-full">

      <div class="grid-layout grid-cols-1 col-span-full">
        <div>
          <p class="text-xl font-semibold"><?php the_title(); ?></p>
          <p class="text-xl font-normal"><?php the_field( 'name' ); ?></p>
        </div>
        <div>
          <?php include locate_template( 'template-parts/singular/meta.php' ); ?>
        </div>
        <div class="rich-text">
          <?php the_field( 'description' ); ?>
        </div>
        <div class="flex gap-2 justify-end items-center lg:justify-start">
          <?php set_query_var( 'button', array( 'label' => 'Read more', 'href' => get_permalink(), 'theme' => '' ) ); ?>
          <?php get_template_part( 'template-parts/base/button' ); ?>
          <?php set_query_var( 'button', get_field( 'file_url' ) ? array( 'label' => 'Download', 'href' => get_field( 'file_url' ), 'theme' => 'lg:hidden text-white bg-black', 'attrs' => 'download' ) : array( 'label' => 'Available soon', 'theme' => 'lg:hidden text-black bg-white' ) ); ?>
          <?php get_template_part( 'template-parts/base/button' ); ?>
        </div>
      </div>

      <div class="grid-layout grid-cols-3 col-span-full hidden lg:grid pt-4 border-t">
        <div class="col-span-2">
          <p class="text-lg font-semibold">Content</p>
        </div>
        <div class="col-span-2">
          <?php the_field( 'file_contents' ); ?>
        </div>
        <div class="col-span-1 flex justify-end items-end">
          <?php set_query_var( 'button', get_field( 'file_url' ) ? array( 'label' => 'Download', 'href' => get_field( 'file_url' ), 'theme' => 'text-white bg-black', 'attrs' => 'download' ) : array( 'label' => 'Available soon', 'theme' => 'text-black bg-white' ) ); ?>
          <?php get_template_part( 'template-parts/base/button' ); ?>
        </div>
      </div>

    </div>
  </div>

  <div class="col-span-full lg:col-span-4">
    <figure class="aspect-w-4 aspect-h-3 bg-black rounded-2xl overflow-hidden">
      <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'w-full h-full object-cover group-hover:scale-105 group-focus:scale-105	transition-transform' ) ); ?>
    </figure>
  </div>

</div>
