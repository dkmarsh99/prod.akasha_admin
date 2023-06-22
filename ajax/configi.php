<?php


$whitelist = array('127.0.0.1', "::1");

if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
	$host = "web";
    // not valid
}else{
	$host = "local";
}


	$host    = "localhost"; // Host name
	$db_name = "dbqzu8x56grjwv";		// Database name
	$db_user = "unvbpq9c3pfeh";		// Database user name
	$db_pass = "m3992qn7j6sj";			// Database Password

 
	$conn=mysqli_connect($host,$db_user,$db_pass,$db_name);
		// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Change character set to utf8
	
	mysqli_set_charset($conn,"utf8");

?>