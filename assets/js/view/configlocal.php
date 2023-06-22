<?php
$host    = "localhost"; // Host name
$db_name = "dkmarsh_phoenixdb";		// Database name
$db_user = "dkmarsh_phxu";		// Database user name
$db_pass = "Gg1@haylee101";			// Database Password

 $conn = mysql_connect($host,$db_user,$db_pass)or die(mysql_error());
 
 mysql_set_charset('utf8', $conn);      
 
 mysql_select_db($db_name,$conn)or die(mysql_error());

?>