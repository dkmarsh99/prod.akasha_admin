<?php

$cat_from = $_REQUEST['cat_from'];
$cat_to = $_REQUEST['cat_to'];

$output = shell_exec('mergecat.py '.$cat_from.' '.$cat_to);

echo $output

?>