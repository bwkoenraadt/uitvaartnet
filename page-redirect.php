<?php

	/**
	* Template Name: Redirect
	*/

	if( get_field('aff_url', $_GET['post_id']) ):
		$url = get_field('aff_url', $_GET['post_id']);
		$url = str_replace('[herkomst]', $_GET['herkomst'], $url);

		header("X-Robots-Tag: noindex, nofollow", true);
		header("Location: $url",
				true,
				301);

		exit;

	else:
		$url = get_permalink($_GET['post_id']);

		header("Location: $url",
				true,
				301);

		exit;

	endif;

?>
