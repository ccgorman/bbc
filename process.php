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
		$converter->generate($strvalue);
		$response["message"]=$converter->message;
		if ($converter->status) $response["message"]=$converter->roman;
	}
	elseif ($strtype=="roman") {
		$converter->parse($strvalue);
		$response["message"]=$converter->message;
		if ($converter->status) $response["message"]=$converter->numeric;
	}
	
	$response["status"]=$converter->status;
	
	echo json_encode($response);
?>