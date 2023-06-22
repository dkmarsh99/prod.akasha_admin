<?php

function getjobs() {

	$output = "";

	$output = $output . "[";

	$day_count = 1;

	include("config.php");

$query="select * from 65_st where status = 'Work Schd' order by st_id;";

//echo $query;

$result=mysql_query($query);
$num_rows = mysql_num_rows($result);
$i = 1;

 while($row=mysql_fetch_array($result)) {
 

 $sclient = $row['uid_client'];
 
 $queryclient="select * from 65_client where uid_client = " . $sclient;
$result2=mysql_query($queryclient);


 while($row2=mysql_fetch_array($result2)) {
 $scomp_name = $row2['comp_name'];
 }

  if ($row['status'] == "Quote Draft"){ 
		$linkcol = "Orange";

 }elseif ($row['status'] == "Quote Sent"){ 
		$linkcol = "Orange";
		
 }elseif ($row['status'] == "Quote Decl"){ 
		$linkcol = "Red";
 }elseif ($row['status'] == "Work Comp"){  
 		$linkcol = "#003399";
 }elseif ($row['status'] == "Work Schd"){  
 		$linkcol = "#003399";
 }elseif ($row['status'] == "Fully Paid"){  
 		$linkcol = "darkgreen";
		 }elseif ($row['status'] == "Invoice Sent"){  
 		$linkcol = "#003399";
 }else{
  		$linkcol = "black";
 }

// $job_descr = htmlentities($row['job_descr']);
	//	$job_descr = "yetui";
		
		$job_descri = $row['job_descr'];
		
		$job_descr = preg_replace('/[^a-zA-Z0-9_%\[().\]\\/-]/s', '', $job_descri);
		
	//	echo $job_descr;
		
	$output = $output . "{";
    $output = $output .  '"title": "' . $row['st_id'] . ' ' . $scomp_name . ' ' . '",';
    $output = $output .  '"start": "' . $row['job_date_start'] . '",';
    $output = $output .  '"end": "' . $row['job_date_end'] . '",';
	$output = $output .  '"description": "' . $job_descr . '",';
    $output = $output .  '"URL": "http://localhost/phoenixsoftware/rentaljobedit.php?sales_id=' . $row['st_id'] . '"';
	
	if ($i == $num_rows){
		$output = $output . "}";
		$output = $output . "]";
	}else{
		$output = $output . "},";
	}
 
 
	
	$i = $i + 1;
	
	}

	return $output;

}


// Read and parse our events JSON file into an array of event data arrays.
//$json = file_get_contents(dirname(__FILE__) . '/../json/events.json');


$json = getjobs();

//echo $json;


echo json_decode(stripslashes($json), true);


$input_arrays = json_decode(stripslashes(je_credit_terms($json)), true);


print_r($input_arrays);

?>