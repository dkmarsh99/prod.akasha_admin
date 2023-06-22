<?php


//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

$phxclient_id = 100;

include_once("configi.php");

//truncate summary table


$sqltrunc = "truncate 94_total_bycat";
	
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
					
	$mth = 9;
	$year = 2020;
					
	$dave = 0;
					
	while($dave == 0){
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
	
		$querytotalcat = "SELECT yy AS year, mm AS month, ifnull(dept_name,'Not Specified') as dept_name, sum(total) as total_amount,  sum(qty) as total_qty 
		FROM catstats
		WHERE (((yy=".$year.") AND (mm=".$mth.") and dept_id = ".$dept_id.")
		group by yy, mm, dept_name;";
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);

				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_year =  $rowtotalcat['yy'];
			$total_month = $rowtotalcat['mm'];
			$total_deptname = $rowtotalcat['dept_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlinsert = "insert into 94_total_bydept(dept_id, yy, mm, cat_name, total, qty) values (".$dept_id.",".$year.",".$mth.",'".$dept_name."',".$total_total.",".$total_qty.")";
	
		$resultinsert=mysqli_query($conn, $sqlinsert);
						
						
		echo $sqlinsert . "<br>";
						
		echo "year".$year."month".$mth;
						
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
	
	
echo "ended";
	
	
exit;
	