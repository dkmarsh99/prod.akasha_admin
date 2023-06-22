<?php

$dept_id = $_REQUEST['dept_id'];

//echo "dept id is" . $dept_id."a";


$output = shell_exec('deldept.py '.$dept_id);

//print ($output);

echo $output

?>