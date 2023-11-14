<?php if ( array_key_exists( 'slides', $slider ) && $slider['slides'] ) : ?>

<div
  data-swiper="<?php echo esc_attr( $slider['config'] ?: 'default' ); ?>"
  class="swiper w-full h-full <?php echo esc_attr( $slider['class'] ?: '' ); ?>"
  style="--swiper-theme-color: #fff; --swiper-navigation-sides-offset: 2rem; --swiper-navigation-size: 2rem;"
>
  <?php if ( count( $slider['slides'] ) > 1 ) : ?>
    <?php if ( array_key_exists( 'pagination', $slider ) ? $slider['pagination'] : true ) : ?>
      <div class="swiper-pagination"></div>
    <?php endif ?>
    <?php if ( array_key_exists( 'scrollbar', $slider ) ? $slider['scrollbar'] : false ) : ?>
      <div class="swiper-scrollbar"></div>
    <?php endif ?>
    <?php if ( array_key_exists( 'navigation', $slider ) ? $slider['navigation'] : true ) : ?>
      <div class="swiper-button-prev after:!content-none">
        <svg class="w-8 fill-none stroke-[var(--swiper-theme-color)] stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.65 77.12">
          <path d="M115.72 821.59c0 38.55-38.65 38.55-38.65 38.55s38.65 0 38.65 38.56" transform="translate(-77.07 -821.59)"/>
        </svg>
      </div>
      <div class="swiper-button-next after:!content-none">
        <svg class="w-8 fill-none stroke-[var(--swiper-theme-color)] stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.65 77.12">
          <path d="M963.88 898.7c0-38.56 38.65-38.56 38.65-38.56s-38.65 0-38.65-38.55" transform="translate(-962.88 -821.59)"/>
        </svg>
      </div>
    <?php endif ?>
  <?php endif ?>

  <div class="swiper-wrapper w-full h-full">
    <?php foreach ( $slider['slides'] as $key => $slide ) : ?>

      <div class="swiper-slide flex w-full h-full">
        <?php set_query_var( 'slide', $slide ); ?>
        <?php get_template_part( array_key_exists( 'component', $slider ) ? $slider['component'] : null ); ?>
      </div>

    <?php endforeach ?>
  </div>
</div>

<?php endif ?>
