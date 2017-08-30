<?php
	
	$localhost = "BRAM02";
	$db = "Timesheet";
	$user = "aps";
	$password = "APSpassW0RD3582";

	$conn = array("Database"=>$db,"UID"=>$user,"PWD"=>$password);

	$connection2 = sqlsrv_connect($localhost,$conn);

	if($connection2 == false){
		die( print_r( sqlsrv_errors(), true ));

	}

?>