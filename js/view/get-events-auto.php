<?php

function clean($string) {
   $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
   
      $string = str_replace('?', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function getjobs() {

	$output = "";

	$output = $output . "[";

	$day_count = 1;

	include("config.php");

	$outputarray = array();

	$optjobsched	 = $_COOKIE["optjobsched"];
	$optquotesent	 = $_COOKIE["optquotesent"];
	$optquotedraft	 = $_COOKIE["optquotedraft"];
	$optinvoiced	 = $_COOKIE["optinvoiced"];
	$optfullypaid	 = $_COOKIE["optfullypaid"];
	
	$job_compid = $_COOKIE["current_user_outlet"];

	$count = 0;
	
	$sqlin = "(";
	
	if ($optjobsched == "True") {
		$sqlin = $sqlin . "'Work Schd',";
	}

	if ($optquotesent == "True") {
		$sqlin = $sqlin . "'Quote Sent',";
	}
	
	if ($optquotedraft == "True") {
		$sqlin = $sqlin . "'Quote Draft',";
	}
	
	if ($optinvoiced == "True") {
		$sqlin = $sqlin . "'Invoice Sent',";
	}
	
	if ($optfullypaid == "True") {
		$sqlin = $sqlin . "'Fully Paid',";
	}	

	$sqlin = $sqlin . "'hello') ";
	
	$query="select * from " . $_COOKIE['phxclient_id'] . "_st where job_compid = " . $job_compid . " and status in " . $sqlin . " order by st_id";
	
//	echo $query;

$result=mysql_query($query);
$num_rows = mysql_num_rows($result);
$i = 1;

 while($row=mysql_fetch_array($result)) {
	 
	 
 

	$sclient 			= $row['uid_client'];
	$sworkflow_status 	= $row['jobflow_code_name'];
	$event_venue 		= $row['event_venue'];
	$event_name 		= $row['event_name'];
 	$jobcat_code_name 	= $row['jobcat_code_name'];
 
	
	$st_rego 	 = $row['st_rego'];
	$st_uid_rego = $row['st_uid_rego'];
		
	$querycv = "SELECT * FROM " . $_COOKIE['phxclient_id'] . "_client_vehicle  where uid_rego = " . $st_uid_rego;
	$resultcv = mysql_query($querycv) or die("SQL Error 1: " . mysql_error());

	while ($rowcv = mysql_fetch_array($resultcv, MYSQL_ASSOC)) {

		$cv_make 		= $rowcv['make'];
		$cv_model 		= $rowcv['model'];
		$cv_year 		= $rowcv['vehicle_year'];
	
	}
 
 
 $queryclient="select * from " . $_COOKIE['phxclient_id'] . "_client where uid_client = " . $sclient;
// echo $queryclient;
 
$result2=mysql_query($queryclient);


 while($row2=mysql_fetch_array($result2)) {
 $scomp_name = $row2['comp_name'];
 }
//$linkcol = "Red";

  if ($row['status'] == "Quote Draft"){ 
		$linkcol = "Orange";

 }elseif ($row['status'] == "Quote Sent"){ 
		$linkcol = "#FF6600";
		
 }elseif ($row['status'] == "Quote Decl"){ 
		$linkcol = "Red";
 }elseif ($row['status'] == "Work Comp"){  
 		$linkcol = "#003399";
 }elseif ($row['status'] == "Work Schd"){  
 		$linkcol = "#1DA237";
 }elseif ($row['status'] == "Fully Paid"){  
 		$linkcol = "darkblue";
		 }elseif ($row['status'] == "Invoice Sent"){  
 		$linkcol = "6699CC";
 }else{
  		$linkcol = "black";
 }
 	$job_descr = $row['job_descr'];

 

 
// echo $event_venue;
 

  $querylookup="select * from " . $_COOKIE['phxclient_id'] . "_code_lookup where code_type = 'workflowstatus' and code_value = '" . $sworkflow_status . "'";

 // echo $querylookup;
  
  $bgtabcolor = $linkcol;
  
  $resultl1=mysql_query($querylookup);


	while($rowl1=mysql_fetch_array($resultl1)) {

	
	$bgtabcolor = $rowl1['code_additional'];
	
	}

		$job_descr_html = "";	

		$system_type = $_COOKIE["phxclient_type"];

		
		if ($event_name == ""){
		}else{
			if ($system_type == "rental"){
				$job_descr_html = $job_descr_html . " Event Name: " . $event_name;
			}else{
				$job_descr_html = $job_descr_html;
			}
		}

		
		
		if ($event_venue == "novalue"){
		}else{
			if ($system_type == "rental"){

				$job_descr_html = $job_descr_html . " Event Venue: " . $event_venue;
			}else{

				$job_descr_html = $job_descr_html;
			
			}
		}		

		$jobdescrlen = strlen($job_descr_html);
		
		if ($jobdescrlen > 0) {

			$job_descr_html = $job_descr_html . "<br>";
		
		}		
		
		$job_descr_html = $job_descr_html . " " . $job_descr;	
		
//		echo $job_descr;

		
	//	$job_descr_html = htmlspecialchars($job_descr, ENT_NOQUOTES);
		
	//	$job_descr_html = preg_replace('/[^a-zA-Z0-9_%\[().\]\\/-]/s', ' ', $job_descr);



//old
	//	$job_descr_html = str_replace("+"," ",$row['job_descr']);
		//		$job_descr_html = str_replace(","," ",$job_descr_html);
			//	$job_descr_html = str_replace('"',' ',$job_descr_html);
				//				$job_descr_html = str_replace(';',' ',$job_descr_html);
					//										$job_descr_html = str_replace('#',' ',$job_descr_html);
	//	substr($job_descr,0,5)
	//	$job_descr_html = clean("hello");
	///	$job_descr_html = clean($job_descr);
		
	//	echo $job_descr;
	
	$sel_color = "Red";

	$ltitle 				= "(" . $row['st_id'] . ") " . $scomp_name . " rego: " . $st_rego . " " . $cv_make . " " . $cv_model . " " . $jobcat_code_name;
	$lurl 					= "javascript: showjobdetails(" . $row['st_id'] . ")";
	$lstart_date			= $row['job_date_start'];
	$lend_date2				= $row['job_date_end'];
	
	$lend_date2				= strtotime(date("Y-m-d", strtotime($lend_date2)) . " +1 day");

	$lend_date = date("Y-m-d",$lend_date2);


//	echo $lend_date;
	

	$allday = "false";
	
	$outputarray[] = array('title' => $ltitle, 'start' => $lstart_date, 'end' => $lend_date, 'description' => $job_descr_html, 'color' => $bgtabcolor, 'st_id' => $row['st_id'], 'url' => $lurl, 'borderColor' => $linkcol, 'allDay' => $allday);
	
	$i = $i + 1;
	
	}

//	print_r($outputarray);
	
	$output2 = json_encode($outputarray);
	
	
	return $output2;

}

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
require dirname(__FILE__) . '/utils.php';

// Short-circuit if the client did not give us a date range.
if (!isset($_GET['start']) || !isset($_GET['end'])) {
	die("Please provide a date range.");
}

// Parse the start/end parameters.
// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
// Since no timezone will be present, they will parsed as UTC.
$range_start = parseDateTime($_GET['start']);
$range_end = parseDateTime($_GET['end']);

// Parse the timezone parameter if it is present.
$timezone = null;
if (isset($_GET['timezone'])) {
	$timezone = new DateTimeZone($_GET['timezone']);
}

// Read and parse our events JSON file into an array of event data arrays.
//$json = file_get_contents(dirname(__FILE__) . '/../json/events.json');

$json = getjobs();

$input_arrays = json_decode($json, true);

// Accumulate an output array of event data arrays.
$output_arrays = array();

foreach ($input_arrays as $array) {

	// Convert the input array into a useful Event object
	$event = new Event($array, $timezone);

	// If the event is in-bounds, add it to the output
	if ($event->isWithinDayRange($range_start, $range_end)) {
		$output_arrays[] = $event->toArray();
	}
}

// Send JSON to the client.
echo json_encode($output_arrays);