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

$load_cat = 1;

$dept_id = $_REQUEST['dept_id'];


if ($load_cat == 1){


$querycat="select * from web_cat where dept_id = ".$dept_id . " order by cat_id";
				
	//echo $querycat;
		
				
$resultcat=mysqli_query($conn, $querycat);

$i = 1;
				
while($rowcat=mysqli_fetch_array($resultcat)) { 

	$cat_id =  $rowcat['cat_id'];
	$cat_name =  $rowcat['cat_name'];
					
//	echo $dept_id . $dept_name. "<br>";
					
					//loop through each month and get total
					
						
		$total_total = 0;
		$total_cost = 0;
		$total_profit = 0;
		
				$total_qty = 0;
		$total_total = 0;
	
		$querytotalcat = "SELECT ifnull(cat_name,'Not Specified') as cat_name, coalesce(sum(total),0)  as total_amount,  coalesce(sum(qty),0) as total_qty 
		FROM 94_total_bycat
		WHERE (cat_id = ".$cat_id.")";

		
	//	echo "<br>".$querytotalcat."<br>";
		
						
		$resulttotalcat=mysqli_query($conn, $querytotalcat);


				
		while($rowtotalcat=mysqli_fetch_array($resulttotalcat)) { 

			$total_deptname = $rowtotalcat['cat_name'];
			$total_total = $rowtotalcat['total_amount'];
			$total_qty = $rowtotalcat['total_qty'];

	
		}
						
						//insert into summary table
						
		$sqlupdate = "update web_cat set graph_qty = ".$total_qty.", graph_total = ".$total_total. " where cat_id = ".$cat_id;
		
	//	echo "<br>".$sqlupdate."<br>";
		
	
		$resultinsert=mysqli_query($conn, $sqlupdate);
				
				
					
}

		$sqlstaff2 = "SELECT * from web_cat where dept_id = ".$dept_id." order by graph_qty desc";
				//	echo $sqlstaff2;
					

		$resultstaff2 = $conn->query($sqlstaff2);
		
		$i = 1;
		$ic = 0;
		
		
		$colours = array("#800000","#9A6324","#808000","#469990","#000075","#000000","#e6194B","#f58231","#ffe119","#bfef45","#3cb44b","#42d4f4","#4363d8","#911eb4","#f032e6","#a9a9a9","#fabed4","#ffd8b1","#fffac8","#aaffc3","#dcbeff");
		
		if ($resultstaff2->num_rows > 0) {
			// output data of each row
			while($rowstvehicle2 = $resultstaff2->fetch_assoc()) {

				$cat_id					= $rowstvehicle2["cat_id"];
				$cat_name				= $rowstvehicle2["cat_name"];
				$graph_qty				= $rowstvehicle2["graph_qty"];
				$graph_total			= $rowstvehicle2["graph_total"];	
				$graph_colour			= $rowstvehicle2["graph_colour"];				
				$disp = "";
				
				$graph_sel = 0;
				
				if ($i <= 5){
				
					$graph_sel = 1;
					
				}
				
				$sqlupdate2 = "update web_cat set graph_sel = ".$graph_sel." where cat_id = ".$cat_id;
//	echo $sqlupdate2;
	
			$resultinsert2=mysqli_query($conn, $sqlupdate2);

			$i = $i + 1;
			
			if (strlen($graph_colour) == 0){
			
				$sqlupdate2c = "update web_cat set graph_colour = '".$colours[$ic] ."' where cat_id = ".$cat_id;
			//	echo $sqlupdate2c;
	
			$resultinsert2=mysqli_query($conn, $sqlupdate2c);
			
						$ic = $ic + 1;

			}else{
	//		echo $cat_id."graph colour is ".$graph_colour;	
			}

			}
	
}
}



echo "successful";
	
	
exit;
	