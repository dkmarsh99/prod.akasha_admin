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
$db_user = "phoenixs_phxuser";		// Database user name
$db_pass = "m3992qn7j6sj";			// Database Password


 $conn = mysql_connect($host,$db_user,$db_pass)or die(mysql_error());
 
 mysql_set_charset('utf8', $conn);      
 
 mysql_select_db($db_name,$conn)or die(mysql_error());

?>