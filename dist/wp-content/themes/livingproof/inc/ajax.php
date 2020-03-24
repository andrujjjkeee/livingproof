<?php

function get_person_bio(){

	$id_post = $_POST[ 'loadPostId' ];
	$title = get_the_title( $id_post );
	$text =  wpautop( get_post_field('post_content', $id_post ) );
	$image =  get_the_post_thumbnail_url( $id_post );
	$position = get_field( 'posts', $id_post );
	$position_arr = '';

	foreach ( $position as $item ) {
		$position_arr .= '<span>'. $item .'</span>';
	}

	$posts_items = '{"title": "'. $title .'", "img": "'. $image .'", "position": "'. $position_arr .'", "text": '. json_encode( $text ) .'}';

	echo $posts_items;

	exit;

}

add_action('wp_ajax_person_bio', 'get_person_bio');

add_action('wp_ajax_nopriv_person_bio', 'get_person_bio');