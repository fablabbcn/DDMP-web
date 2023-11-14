<?php /* Template Name: Submit Post */

acf_form_head();
get_header();

set_query_var( 'post_type', 'post' );
get_template_part( 'template-parts/forms/index' );

set_query_var( 'post_type', 'talent' );
get_template_part( 'template-parts/forms/index' );

set_query_var( 'post_type', 'tribe_events' );
get_template_part( 'template-parts/forms/index' );

// set_query_var( 'post_type', 'resources' );
// get_template_part( 'template-parts/forms/index' );

get_footer();
