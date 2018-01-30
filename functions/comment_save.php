<?php

function save_comment_meta_data( $comment_id) {

	$i = 0;

	if($_POST[ 'premie' ]){
		$average =  $average + $_POST[ 'premie' ];
		add_comment_meta( $comment_id, 'premie', $_POST[ 'premie' ] / 10);
		$i++;
	}
	if($_POST[ 'service' ]){
		$average =  $average + $_POST[ 'service' ];
		add_comment_meta( $comment_id, 'service', $_POST[ 'service' ] / 10);
		$i++;
	}

	if($average){

		$average = $average / $i;
		add_comment_meta( $comment_id, 'gemiddelde',	$average / 10 );

		$postID = $_POST[ 'comment_post_ID' ];

		set_average_off_post($postID, 'premie');
		set_average_off_post($postID, 'service');
		set_average_off_post($postID);
		reset_post_cijfer($postID);
	}

	if($_POST[ 'useful' ]){
		add_comment_meta( $comment_id, 'useful', $_POST[ 'useful' ]);
		set_average_off_post($_POST[ 'comment_post_ID' ], 'useful');
	}
}

add_action( 'comment_post', 'save_comment_meta_data' );

function set_average_off_post($postID, $cat = 'gemiddelde', $count_null = 0){

	$args = array(
		'author_email' => '',
		'ID' => '',
		'karma' => '',
		'number' => '',
		'offset' => '',
		'orderby' => '',
		'order' => 'DESC',
		'parent' => '',
		'post_id' => $postID,
		'post_author' => '',
		'post_name' => '',
		'post_parent' => '',
		'post_status' => '',
		'post_type' => '',
		'status' => 'approve',
		'type' => '',
		'user_id' => '',
		'search' => '',
		'count' => false,
		'meta_key' => '',
		'meta_value' => '',
		'meta_query' => '',
	);

	$beoordeling = 0;
	$i = 0;

	foreach (get_comments( $args ) as $comment){

		$new = get_comment_meta( $comment->comment_ID, $cat, true );

		if($new OR $count_null):

			$i++;
			$beoordeling = $beoordeling + $new;

		endif;
	}

	if($beoordeling){
		$beoordeling = $beoordeling / $i;

		if ( ! update_post_meta ($postID, 'post_' . $cat, $beoordeling) ) {
			add_post_meta($postID, 'post_' . $cat, $beoordeling, true );
		};
	}
}

function reset_post_cijfer($postID){

	$beoordeling = (get_post_meta($postID, 'post_premie'		, true)
					+ get_post_meta($postID, 'post_service'		, true)) / 2;

	if ( ! update_post_meta ($postID, 'post_cijfer', $beoordeling) ) {
		add_post_meta($postID, 'post_cijfer', $beoordeling, true );
	};

}
?>
