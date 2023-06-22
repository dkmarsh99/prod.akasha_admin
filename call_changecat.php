<?php

$cat_id = $_REQUEST['cat_id'];
$cat_name = $_REQUEST['cat_name'];

$output = shell_exec('changecat.py '.$cat_id.' "'.$cat_name.'"');

echo $output

?>