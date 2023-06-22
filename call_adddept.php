<?php

$dept_id	 = $_REQUEST['dept_id'];
$dept_name	 = $_REQUEST['dept_name'];


$output = shell_exec('adddept.py '.$dept_id.' "'.$dept_name.'"');

//print ($output);

echo $output

?>