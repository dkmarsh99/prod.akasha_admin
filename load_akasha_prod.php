<?php

ini_set('max_execution_time', '0'); 
	if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }
  
  	include("configi.php");


  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conn, $theValue) : mysqli_escape_string($conn, $theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

$phxclient_id = 100;

include_once("configi.php");

//truncate summary table


$load_product = 1;


if ($load_product == 1){


$sqltrunc = "truncate 94_total_byprod";
	
$resulttrunc=mysqli_query($conn, $sqltrunc);


// build summary table

	
$querycat="select * from 94_prodserv";
				
//	echo $querytarget;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$uid =  $rowcat['uid'];
	$title =  GetSQLValueString($rowcat['title'], "text");
					
//	echo $uid . $title. "<br>";
					
					//loop through each month and get total
					
	$mth = 9;
	$year = 2020;
					
	$dave = 0;
					
	while($dave == 0){
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
		$total_qty =0;
		$total_total = 0;

		$querytotalcat = "SELECT yy AS year, mm AS month, ifnull(title,'Not Specified') as title, ifnull(sum(total),0) as total_amount,  ifnull(sum(qty),0) as total_qty 
		FROM 94_prodstats_summ
		WHERE ((yy=".$year.") AND (mm=".$mth.") and id = ".$uid.")
		group by yy, mm, id;";
		
//		echo "dave123<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);

				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_year =  $rowtotalcat['year'];
			$total_month = $rowtotalcat['month'];
		//	$total_deptname = $rowtotalcat['supp_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlinsert = "insert into 94_total_byprod(id, yy, mm, title, total, qty) values (".$uid.",".$year.",".$mth.",".$title.",".$total_total.",".$total_qty.")";
		
//		echo "dave123<br>".$sqlinsert."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
						
						
	//	echo $sqlinsert . "<br>";
						
	//	echo "year".$year."month".$mth;
						
		$mth = $mth + 1;
						
		if ($mth == 13){
			$mth = 1;
			$year = $year + 1;
		}
						
						
		if ($mth == 10 && $year == 2021){
			$dave = 1;
		}
						
	}
					
					
					
}
	
}

echo "ended";
	
	
exit;
	