<?php
	$response = array();
	$response['status'] = false;
	$response["message"]="An unknown error occured";
	
	if (isset($_REQUEST["strtype"])) {
		$strtype=$_REQUEST["strtype"];
	}
	else {
		$strtype="";
	}
	if (isset($_REQUEST["strvalue"])) {
		$strvalue=$_REQUEST["strvalue"];
	}
	else {
		$strvalue="";
	}
	
	/*
	 * Process here
	 */
	require_once 'class.php';
	$converter=new converter();
	
	if ($strtype=="numeric") {
		try {
			$converter->generate($strvalue);
			$response["message"]=$converter->get_data('message');
			if ($converter->get_data('status')) $response["message"]=$converter->get_data('roman');
		}
		catch (Exception $e) {
			$response["message"]=$e->getMessage();
		}
	}
	elseif ($strtype=="roman") {
		try {
			$converter->parse($strvalue);
			$response["message"]=$converter->get_data('message');
			if ($converter->get_data('status')) $response["message"]=$converter->get_data('numeric');
		}
		catch (Exception $e) {
			$response["message"]=$e->getMessage();
		}
	}
	
	$response["status"]=$converter->get_data('status');
	
	echo json_encode($response);
?>