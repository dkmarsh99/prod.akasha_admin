<?php

$dept_id = $_REQUEST['dept_id'];
$dept_name = $_REQUEST['dept_name'];

$output = shell_exec('changedept.py '.$dept_id.' "'.$dept_name.'"');

echo $output

?>