<?php

$sel_cat = 11;

$phxclient_id = 100;

//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

//$dave = $selfy;
	include_once("configi2.php");

echo "{";
echo "labels: ['Apr 20', 'May 20', 'Jun 20', 'Jul 20', 'Aug 20', 'Sep 20', 'Oct 20', 'Nov 20', 'Dec 20', 'Jan 21', 'Feb 21', 'Mar 21' ],";
			echo "datasets: [{";
				echo "type: 'bar',";
				echo "label: 'Actual',";
				echo "backgroundColor: window.chartColors.blue,";
				echo "borderWidth: 2,";
				echo "pointStyle: 'rect',";
								echo "pointRadius: 5,";
				echo "fill: true,";
				echo "data: [";
$queryactual="select * from ".$phxclient_id."_actuals where actual_fy = ".$current_fy." and actual_cat_id = ".$sel_cat."  order by actual_year, actual_month";
				$resultactual=mysqli_query($conn, $queryactual);

				$i = 1;
				
				while($rowactual=mysqli_fetch_array($resultactual)) { 

					$actual_value =  $rowactual['actual_value'];
					
					if ($i == 12){

						echo $actual_value;
						
					}else{

						echo $actual_value . ",";
						
					}
					

			
					$i = $i + 1;
				}

				echo "]";
			echo "}, {";
				echo "type: 'line',";
				echo "label: 'Target',";
				echo "lineTension: 0,";
				echo "backgroundColor: window.chartColors.red,";
				echo "borderColor: window.chartColors.red,";
				echo "pointStyle: 'circle',";
				echo "pointRadius: 5,";
				echo "fill: false,";
				echo "data: [";
				
				$querytarget="select * from ".$phxclient_id."_targets where target_fy = ".$current_fy." and target_cat_id = ".$sel_cat."  order by target_year, target_month";
				$resulttarget=mysqli_query($conn, $querytarget);

				$i = 1;
				
				while($rowtarget=mysqli_fetch_array($resulttarget)) { 

					$target_value =  $rowtarget['target_value'];
					
					if ($i == 12){

						echo $target_value;
						
					}else{

						echo $target_value . ",";
						
					}
					

			
					$i = $i + 1;
				}
				
				echo "],";
				

			echo "}, {";
				echo "type: 'line',";
				echo "label: 'Prev FY',";
				echo "backgroundColor: window.chartColors.grey,";
		echo "borderColor: window.chartColors.grey,";
				echo "fill: false,";
				echo "pointStyle: 'circle',";
				echo "pointRadius: 5,";
				echo "lineTension: 0,";
				echo "data: [";
				$queryactualprev="select * from ".$phxclient_id."_actuals where actual_fy = ".$previous_fy." and actual_cat_id = ".$sel_cat."  order by actual_year, actual_month";
				$resultactualprev=mysqli_query($conn, $queryactualprev);

				$i = 1;
				
				while($rowactualprev=mysqli_fetch_array($resultactualprev)) { 

					$actual_value =  $rowactualprev['actual_value'];
					
					if ($i == 12){

						echo $actual_value;
						
					}else{

						echo $actual_value . ",";
						
					}
					

			
					$i = $i + 1;
				}
					
					
				echo "]";
			echo "}";
			
			echo "]";
echo "}";


?>