<?php
	$response = array();
	$response['status'] = 'Error';
	$response["message"]="An unknown error occured";
	
	/*
	 * Process here
	 */
	
	echo json_encode($response);
?>