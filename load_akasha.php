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


$phxclient_id = 100;

include_once("configi.php");

//truncate summary table

$load_dept = 1;
$load_cat = 1;
$load_supp = 1;
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
					
	echo $uid . $title. "<br>";
					
					//loop through each month and get total
					
	$mth = 2;
	$year = 2022;
					
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
		
		echo "dave123<br>".$querytotalcat."<br>";
		
						
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
		
		echo "dave123<br>".$sqlinsert."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
						
						
		echo $sqlinsert . "<br>";
						
		echo "year".$year."month".$mth;
						
		$mth = $mth + 1;
						
		if ($mth == 13){
			$mth = 1;
			$year = $year + 1;
		}
						
						
		if ($mth == 3 && $year == 2023){
			$dave = 1;
		}
						
	}
					
					
					
}
	
}

if ($load_supp == 1){


$sqltrunc = "truncate 94_total_bysupp";
	
$resulttrunc=mysqli_query($conn, $sqltrunc);


// build summary table

	
$querycat="select * from 94_supplier";
				
//	echo $querytarget;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$s_id =  $rowcat['s_id'];
	$s_name =  GetSQLValueString($rowcat['s_name'], "text");
					
	echo $s_id . $s_name. "<br>";
					
					//loop through each month and get total
					
	$mth = 2;
	$year = 2022;
					
	$dave = 0;
					
	while($dave == 0){
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
		$total_qty =0;
		$total_total = 0;

		$querytotalcat = "SELECT yy AS year, mm AS month, ifnull(supp_name,'Not Specified') as supp_name, ifnull(sum(total),0) as total_amount,  ifnull(sum(qty),0) as total_qty 
		FROM 94_suppstats_summ
		WHERE ((yy=".$year.") AND (mm=".$mth.") and supp_id = ".$s_id.")
		group by yy, mm, supp_name;";
		
		echo "dave123<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);

				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_year =  $rowtotalcat['year'];
			$total_month = $rowtotalcat['month'];
			$total_deptname = $rowtotalcat['supp_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlinsert = "insert into 94_total_bysupp(supp_id, yy, mm, supp_name, total, qty) values (".$s_id.",".$year.",".$mth.",".$s_name.",".$total_total.",".$total_qty.")";
		
		echo "dave123<br>".$sqlinsert."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
						
						
		echo $sqlinsert . "<br>";
						
		echo "year".$year."month".$mth;
						
		$mth = $mth + 1;
						
		if ($mth == 13){
			$mth = 1;
			$year = $year + 1;
		}
						
						
		if ($mth == 3 && $year == 2023){
			$dave = 1;
		}
						
	}
					
					
					
}
	
}

if ($load_dept == 1){


$sqltrunc = "truncate 94_total_bydept";
	
$resulttrunc=mysqli_query($conn, $sqltrunc);


// build summary table

	
$querycat="select * from web_dept";
				
//	echo $querytarget;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$dept_id =  $rowcat['dept_id'];
	$dept_name =  $rowcat['dept_name'];
					
	echo $dept_id . $dept_name. "<br>";
					
					//loop through each month and get total
					
	$mth = 2;
	$year = 2022;
					
	$dave = 0;
					
	while($dave == 0){
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
	
		$querytotalcat = "SELECT yy AS year, mm AS month, ifnull(dept_name,'Not Specified') as dept_name, sum(total) as total_amount,  sum(qty) as total_qty 
		FROM 94_deptstats_summ
		WHERE ((yy=".$year.") AND (mm=".$mth.") and dept_id = ".$dept_id.")
		group by yy, mm, dept_name;";
		
	//	echo "<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);

				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_year =  $rowtotalcat['year'];
			$total_month = $rowtotalcat['month'];
			$total_deptname = $rowtotalcat['dept_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlinsert = "insert into 94_total_bydept(dept_id, yy, mm, dept_name, total, qty) values (".$dept_id.",".$year.",".$mth.",'".$dept_name."',".$total_total.",".$total_qty.")";
		
		echo "<br>".$sqlinsert."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
						
						
		echo $sqlinsert . "<br>";
						
		echo "year".$year."month".$mth;
						
		$mth = $mth + 1;
						
		if ($mth == 13){
			$mth = 1;
			$year = $year + 1;
		}
						
						
		if ($mth == 3 && $year == 2023){
			$dave = 1;
		}
						
	}
					
					
					
}
	
}




if ($load_cat == 1){


$sqltrunc = "truncate 94_total_bycat";
	
$resulttrunc=mysqli_query($conn, $sqltrunc);


// build summary table

	
$querycat="select * from web_cat";
				
//	echo $querytarget;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$cat_id =  $rowcat['cat_id'];
	$cat_name =  $rowcat['cat_name'];
	$dept_id =  $rowcat['dept_id'];
						
	echo $cat_id . $cat_name. "<br>";
	
	
	//get dept name
	
		
$querydept="select * from web_dept where dept_id =".$dept_id;
				
//	echo $querytarget;
		
				
$resultdept=mysqli_query($conn, $querydept);

$i = 1;
				
while($rowdept=mysqli_fetch_array($resultdept)) { 

	$dept_name =  $rowdept['dept_name'];

}
					
					//loop through each month and get total
					
	$mth = 2;
	$year = 2022;
					
	$dave = 0;
					
	while($dave == 0){
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
		$total_qty = 0;
		
	
		$querytotalcat = "SELECT cat_id,dept_id, dept_name, cat_name, yy AS year, mm AS month, ifnull(cat_name,'Not Specified') as cat_name, ifnull(sum(total),0) as total_amount,  ifnull(sum(qty),0) as total_qty 
		FROM 94_catstats_summ
		WHERE ((yy=".$year.") AND (mm=".$mth.") and cat_id = ".$cat_id.")
		group by yy, mm, cat_id;";
		
		echo "<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);

				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_year =  $rowtotalcat['year'];
			$total_month = $rowtotalcat['month'];
			$cat_name = $rowtotalcat['cat_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];
			$cat_id = $rowtotalcat['cat_id'];
			$dept_id2 = $rowtotalcat['dept_id'];
			$dept_name2 = $rowtotalcat['dept_name'];

	
		}
						
						//insert into summary table
						
		$sqlinsert = "insert into 94_total_bycat(cat_id, yy, mm, cat_name, total, qty, dept_id, dept_name) values (".$cat_id.",".$year.",".$mth.",'".$cat_name."',".$total_total.",".$total_qty.",".$dept_id.",'".$dept_name."')";
		
		echo "<br>".$sqlinsert."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
		
						
		echo $sqlinsert . "<br>";
						
		echo "year".$year."month".$mth;
						
		$mth = $mth + 1;
						
		if ($mth == 13){
			$mth = 1;
			$year = $year + 1;
		}
						
						
		if ($mth == 3 && $year == 2023){
			$dave = 1;
		}
						
	}
					
					
					
}
	
}	
echo "ended";
	
	
exit;
	