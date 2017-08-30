<?php
	
	$localhost = "BRAM02";
	$db = "Inventory";
	$user = "aps";
	$password = "APSpassW0RD3582";

	$conn = array("Database"=>$db,"UID"=>$user,"PWD"=>$password);

	$connection = sqlsrv_connect($localhost,$conn);

	if($connection == false){
		die( print_r( sqlsrv_errors(), true ));

	}


?>