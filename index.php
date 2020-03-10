	<?php
	/**
	* @package Arcadian
	*/
	get_header();


	$thisUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$pageTrack = parse_url($thisUrl);
	parse_str($pageTrack['query'], $params);

	if (!$params['movie']):
		include_once('listing.php');
	else:
		include_once('movie.php');
	endif;

	get_footer();
