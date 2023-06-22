<?php

$cat_id = $_REQUEST['cat_id'];

//echo "dept id is" . $dept_id."a";


$output = shell_exec('delcat.py '.$cat_id);

//print ($output);

echo $output

?>