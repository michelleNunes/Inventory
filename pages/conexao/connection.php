<?php
	
	$localhost = "server";
	$db = "Inventory";
	$user = "your user";
	$password = "password";

	$conn = array("Database"=>$db,"UID"=>$user,"PWD"=>$password);

	$connection = sqlsrv_connect($localhost,$conn);

	if($connection == false){
		die( print_r( sqlsrv_errors(), true ));

	}


?>
