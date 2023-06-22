<?php


$host    = "localhost"; // Host name
$db_name = "dbqzu8x56grjwv";		// Database name
$db_user = "unvbpq9c3pfeh";		// Database user name
$db_pass = "m3992qn7j6sj";			// Database Password

 $conn = mysql_connect($host,$db_user,$db_pass)or die(mysql_error());
 
 mysql_set_charset('utf8', $conn);      
 
 mysql_select_db($db_name,$conn)or die(mysql_error());

?>