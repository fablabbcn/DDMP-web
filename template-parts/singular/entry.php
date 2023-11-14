<?php

$members = array_map( fn ( $i ) => array( 'label' => $i['name'] ), get_field( 'members' ) ?: array() );
$country = get_field( 'country' );
$keywords = array_map( fn ( $i ) => array( 'label' => trim( $i ) ), explode( ',', get_field( 'keywords' ) ?: '' ) ?: array() );

$definitions = array(
	'items' => array(
		array( 'terms' => array('Team members'), 'definitions' => array( $members ?: '—' ) ),
		array( 'terms' => array('Country'), 'definitions' => array( $country ?: '—' ) ),
		array( 'terms' => array('Keywords'), 'definitions' => array( $keywords ?: '—' ) ),
	),
);

?>


<div class="grid-layout grid-cols-1 col-span-full lg:col-start-2 lg:col-end-3">
	<h2 class="!text-xl !font-light">Useful information</h2>
</div>

<div class="grid-layout grid-cols-1 col-span-full lg:col-start-3 lg:col-end-7">
	<?php set_query_var( 'list', $definitions ); ?>
	<?php get_template_part( 'template-parts/base/list-definitions' ); ?>
</div>
