<?php

$type = $_REQUEST['type'];

//work out fy from selected year

$current_fy = 2021;
$previous_fy = $current_fy - 1;

$phxclient_id = 100;

//$dave = $selfy;
	include_once("configi.php");
	

	

echo "{";
echo "labels: ['Feb 22', 'Mar 22', 'Apr 22', 'May 22', 'Jun 22', 'Jul 22', 'Aug 22','Sep 22', 'Oct 22','Nov 22', 'Dec22', 'Jan 23', 'Feb 23'],";
			echo "datasets: [{";
			
				$querydept="select * from web_dept where graph_sel = 1";
				
			//	echo $querytarget;
		
				
			$resultdept=mysqli_query($conn, $querydept);
			
			$rowcount=mysqli_num_rows($resultdept);
			
		//	echo "number of rows is".$rowcount;

			$i2 = 0;
				
		while($rowdept=mysqli_fetch_array($resultdept)) { 

			$dept_id	 =  $rowdept['dept_id'];
			$dept_name =  $rowdept['dept_name'];
			$graph_qty =  $rowdept['graph_qty'];
			$graph_total =  $rowdept['graph_total'];
			$graph_colour =  $rowdept['graph_colour'];
			
				echo "type: 'line',";
				echo "label: '".$dept_name."',";
				echo "lineTension: 0,";
				echo "backgroundColor: '".$graph_colour."',";
				echo "borderColor: '".$graph_colour."',";
				echo "pointStyle: 'circle',";
				echo "pointRadius: 5,";
				echo "fill: false,";
				
				$total = 0;
				
				echo "data: [";
				
				$querytarget="select * from 94_total_bydept where dept_id = ".$dept_id." order by yy, mm";
				
			//	echo $querytarget;
		
				
				$resulttarget=mysqli_query($conn, $querytarget);

				$i = 1;
				
				while($rowtarget=mysqli_fetch_array($resulttarget)) { 
				
					if ($type == "qty"){

						$total =  $rowtarget['qty'];
					
					}else if ($type == "total"){

						$total =  $rowtarget['total'];

						
					}
					
					if ($i == 13){
						
						echo $total;
						
					}else{

						echo $total . ",";
						
					}
					

			
					$i = $i + 1;
				}
				
				echo "]";
				
				
				//if another one then put joinert
				
				$i2 = $i2 + 1;
				
				if ($i2 == $rowcount){
				
			echo "}";
			
			}else{
				echo "},{";

				
			}
			
			
			}


			echo "]";
echo "}";


?>