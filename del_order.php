<?php

$st_id = $_REQUEST['st_id'];


$output = shell_exec('delorder.py '.$st_id);

echo $output

?>