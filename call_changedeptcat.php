<?php

$cat_id = $_REQUEST['cat_id'];
$dept_id = $_REQUEST['dept_id'];

$output = shell_exec('changecatdept.py '.$cat_id.' "'.$dept_id.'"');

echo $output

?>