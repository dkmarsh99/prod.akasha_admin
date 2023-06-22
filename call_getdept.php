<?php

$output = shell_exec('getalldept.py');

//print ($output);

$myJSON = json_encode($output);

echo $myJSON;

?>