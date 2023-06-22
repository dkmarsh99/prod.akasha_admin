<?php


//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

$phxclient_id = 100;

include_once("configi.php");

//		$sqlupdate1 = "update web_dept set graph_sel = 0";
		
	//	echo "<br>".$sqlupdate."<br>";
		
	
	//	$resultinsert1=mysqli_query($conn, $sqlupdate1);

//truncate summary table

$load_dept = 1;

if ($load_dept == 1){


$querycat="select * from web_dept";
				
//	echo $querytarget;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$dept_id =  $rowcat['dept_id'];
	$dept_name =  $rowcat['dept_name'];
					
//	echo $dept_id . $dept_name. "<br>";
					
					//loop through each month and get total
					
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
		
				$total_qty = 0;
		$total_total = 0;
	
		$querytotalcat = "SELECT ifnull(dept_name,'Not Specified') as dept_name, coalesce(sum(total),0)  as total_amount,  coalesce(sum(qty),0) as total_qty 
		FROM 94_total_bydept
		WHERE (dept_id = ".$dept_id.")";

		
	//	echo "<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);


				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_deptname = $rowtotalcat['dept_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlupdate = "update web_dept set graph_qty = ".$total_qty.", graph_total = ".$total_total. " where dept_id = ".$dept_id;
		
//		echo "<br>".$sqlupdate."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlupdate);
				
				
					
}

		$sqlstaff2 = "SELECT * from web_dept order by graph_qty desc";
				//	echo $sqlstaff2;
					

		$resultstaff2 = $conn->query($sqlstaff2);
		
		$i = 1;
		

		if ($resultstaff2->num_rows > 0) {
			// output data of each row
			while($rowstvehicle2 = $resultstaff2->fetch_assoc()) {

				$dept_id				= $rowstvehicle2["dept_id"];
				$dept_name				= $rowstvehicle2["dept_name"];
				$graph_qty				= $rowstvehicle2["graph_qty"];
				$graph_total				= $rowstvehicle2["graph_total"];				
				$disp = "";
				
				$graph_sel = 0;
				
				if ($i <= 5){
				
					$graph_sel = 1;
					
				}
				
	//			$sqlupdate2 = "update web_dept set graph_sel = ".$graph_sel." where dept_id = ".$dept_id;
	
	//		$resultinsert2=mysqli_query($conn, $sqlupdate2);
			
			$i = $i + 1;
				

			}
	
}
}



echo "successful";
	
	
exit;
	