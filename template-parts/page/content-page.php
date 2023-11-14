<?php
/**
 * Template part for displaying page content in page.php
 */

?>


<header class="min-w-0 bg-transparent">
  <?php get_template_part( 'template-parts/singular/hero' ); ?>
</header>

<?php
// get_template_part( 'template-parts/singular/hero' );
get_template_part( 'template-parts/blocks/acf-flexible-content/content' );
