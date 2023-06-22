<?php

$cat_id = $_REQUEST['cat_id'];
$dept_id = $_REQUEST['dept_id'];
$cat_name = $_REQUEST['cat_name'];

//echo "dept id is" . $dept_id."a";


$output = shell_exec('addcat.py '.$cat_id. ' ' . $dept_id . ' "' .$cat_name. '"' );

//print ($output);

echo $output

?>