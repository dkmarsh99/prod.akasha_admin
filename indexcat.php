<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Akasha Admin</title>
    <meta name="description" content="Wealthhealth Customer Portal">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script type="text/javascript" src="utils.js"></script>


</head>

<body   class=""  >

    <!-- loader -->

    <!-- * loader -->
	    <div style="width: 90%">
    <!-- App Header -->
    <div class="appHeader bg-primary scrolled">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>

        <div>
		<center>
<h1>Akasha Admin & Maintenance</h1> 
        </center>
		</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->




    <!-- * Search Component -->

    <!-- App Capsule -->
	

    <div class="extraHeader p-0" >
        <div class="form-wizard-section">
            <a href="index.php" class="button-item">
                <strong>1</strong>
                <p>Maintain Existing Dept/Cat</p>
            </a>
			            <a href="indexold.php" class="button-item">
                <strong>2</strong>
                <p>Create New Dept/Cat</p>
            </a>
            <a  href="index2.php?type=qty" class="button-item">
                <strong>3</strong>
                <p>Department Graphs</p>
            </a>
            <a  href="indexcat.php?type=qty&dept_id=3" class="button-item active">
                <strong>4</strong>
                <p>Category Graphs</p>
            </a>
						<a  href="indexsupp.php?type=qty&dept_id=3" class="button-item">
                <strong>5</strong>
                <p>Supplier Graphs</p>
            </a>
						<a  href="indexprod.php?type=qty&dept_id=3&num_recs=200" class="button-item">
                <strong>6</strong>
                <p>Product Graphs</p>
            </a>
        </div>
    </div>
    <!-- * Extra Header -->
 	
	

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <div class="section mb-2 mt-2 full">
            <div class="wide-block pt-2 pb-2">
<div style="display: none" class="table-responsive nomargin" id="divdiscofiles">

</div>


				<!--		<button type="button" style="font-size: 12px;  height: 38px; width: 135px;" onclick="javascript: get_dept()"     class="btn-default"><i class="fa fa-edit white"></i>Get Departments</button>
					 -->	
		      <div style="width: 90%">
		<h2 style="color: white">Department & category Charts</h2><br>


				<div class="row">
					<!-- -->
					


					<div class="col-md-9">
					<h2>
					<table>
					<tr>
					<td>
					Category Sales for Department &nbsp;
					</td>
					<td>

					 
					
											<?
						include("configi.php");

		$queryexptype="SELECT * FROM web_dept order by dept_name";
		//echo $query;
		$resultexptype=mysqli_query($conn, $queryexptype);

$sel_dept = $_REQUEST["dept_id"];

?>
		<select  class="form-control"  id = "ren_dept" name="new_item_cat_dept" onchange="change_dept()" >
<?php
 while($rowexptype=mysqli_fetch_array($resultexptype)) {
	 ?>

		<option <?if ($sel_dept == $rowexptype["dept_id"]){ echo " selected ";}?>  value="<? echo $rowexptype["dept_id"]; ?>"> <strong><? echo $rowexptype["dept_name"]; ?></strong></option>
	 
	 <?php
	
 }
	 
?>
</select>
	</td>
	</tr>
	</table>
	
					
					</h2>
					  <canvas style="width: 100%" id="graphCanvas1"></canvas>

					</div>
					
					<?php
					
					$font_size_qty = "18px";
					$font_size_amt = "24px";
					
					
					
					?>
    				
										<div class="col-md-3">
				
										
										               
                <div class="btn-group btn-group-toggle" data-toggle="buttons" style="width: 100%">
                    <label class="btn btn-outline-primary active">
                        <input onClick="javascript: window.location.replace('../akasha_admin/indexcat.php?type=qty&dept_id=<?php echo $_REQUEST['dept_id']?>');" type="radio" name="options" id="option1a" <?if ($_REQUEST['type'] == "qty") echo "checked";?>>
                         By Qty
                      
                    </label>
                    <label class="btn btn-outline-primary">
                        <input onClick="javascript: window.location.replace('../akasha_admin/indexcat.php?type=total&dept_id=<?php echo $_REQUEST['dept_id']?>');" type="radio" name="options" id="option2a" <?if ($_REQUEST['type'] == "total") echo "checked";?>>
                        
                       By total sales

                    </label>
                </div>
				
				

    <ul class="listview image-listview">


			            <li id="dave" >
                <a href="#" class="item active">

                    <div class="in">
                        <div>Categories
						
					
						
						
						</div>
                    </div>
                </a>
                <!-- sub menu -->
                <ul class="listview image-listview active">
				<?php
				

				
						include("configi.php");
				
					$type = "top5";
					
					$i = 1;
					

					$sqlstaff2 = "SELECT * from web_cat where dept_id = ".$_REQUEST['dept_id']." order by graph_qty desc";
				//	echo $sqlstaff2;
					

		$resultstaff2 = $conn->query($sqlstaff2);

		if ($resultstaff2->num_rows > 0) {
			// output data of each row
			while($rowstvehicle2 = $resultstaff2->fetch_assoc()) {

				$cat_id					= $rowstvehicle2["cat_id"];
				$cat_name				= $rowstvehicle2["cat_name"];
				$graph_qty				= $rowstvehicle2["graph_qty"];
				$graph_total			= $rowstvehicle2["graph_total"];	
				$graph_sel				= $rowstvehicle2["graph_sel"];	
				$graph_colour			= $rowstvehicle2["graph_colour"];
				$graph_colour_name		= $rowstvehicle2["graph_colour_name"];				
				$disp = "";
				
				if ($graph_sel == 1){
				
					$disp = "checked";
					
				}
				$type = $_REQUEST['type'];
				
					if ($type == "qty"){

						$total =  $graph_qty;
					
					}else if ($type == "total"){

						$total =  "$ ".number_format($graph_total, 2, '.', ',');
	
					}

    	echo '<li style="width: 450px; padding-top: 5px; padding-bottom: 5px;>';
        echo '<a href="#" class="item">';

        echo '<div class="in">';
        echo '<div style="width: 100%">
		<table style="width: 100%">
		<tr style="width: 100%">
		<td style="width: 50%; text-decoration: bold">
		<strong>
		<div class="custom-control custom-checkbox">

                   
		<input type="checkbox" '.$disp.' onclick="change_graph('.$cat_id.')" class="custom-control-input" id="customCheckb1'.$cat_id.'">
                    <label class="custom-control-label" for="customCheckb1'.$cat_id.'">'.$cat_name.'</label>	
		</strong></td>
			<td style="width: 25%; text-align: right;"><span style="background-color: '.$graph_colour.'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
		<td style="width: 25%; text-align: right;">'.$total.'</td>
		</tr><tr>
		<td> </div></div>';

	
        echo '</td></tr></table></div>';
        echo '</a>';
        echo '</li>';
		
		$i = $i + 1;

			}
			
		}
			?>

                </ul>
                <!-- * sub menu -->
            </li>
        </ul>
					</div>
					

		</div>
		



		

		</div>
		



		

		</div>

		</div>


            </div>
        </div>



    </div>
    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="index.php" class="item active">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>



        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
	   </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
	<?php include ('sidebar.php'); ?>
    <!-- * App Sidebar -->

    <!-- welcome notification  -->
    <div id="notification-welcome" class="notification-box">
        <div class="notification-dialog android-style">
            <div class="notification-header">
                <div class="in">
                    <img src="assets/img/icon/72x72.png" alt="image" class="imaged w24">
                    <strong>Wealthhealth Customer Portal</strong>
                    <span>just now</span>
                </div>
                <a href="#" class="close-button">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <div class="notification-content">
                <div class="in">
                    <h3 class="subtitle">Welcome to Wealthhealth Customer Portal</h3>
                    <div class="text">
                        Wealthhealth Customer Portal is a PWA ready Mobile UI Kit Template.
                        Great way to start your mobile websites and pwa projects.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * welcome notification -->

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
	

    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
   <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>



			<script>
			
			
			        $(document).ready(function () {
	
	load_summary('top5');
	reload_graphs();


        });
		
    
   function reload_graphs(){
	   
	 //  alert ("call graph1");

		showGraph1();
	//	showGraph2();
	//	showGraph3();
		
   }
   
   		function showGraph1()
        {
			
		//	alert ("started graph1");
            {
                $.post("data1c.php?graph=graph1&type=qty",
                function (data)
                {
			
	//		alert (data);
			
						var ctx = document.getElementById('graphCanvas1').getContext('2d');
			window.myMixedChart = new Chart(ctx, {
				type: 'bar',
				data: <?php include ('data1c.php'); ?>,
				options: {
					responsive: true,
					legend: {
						      labels: {
					usePointStyle: true
      }
					},
						tooltips: {
						mode: 'index',
						intersect: true
					},
					   scales: {
        xAxes: [{
            gridLines: {
                display:false
            }
        }],
        yAxes: [{
            gridLines: {
                display:true
				
            },
       ticks: {
           callback: function(value, index, values) {
             return value.toLocaleString("en-US",{style:"decimal"});
           },
		   suggestedMin: 0
         }			
        }]
    }
				}
			});
			
			
                }
				
				);
            }
        }
		
		

		
				function load_summary(type){
	
	
//	alert (type);
	
						//
									
	$.ajax({
		url: 'load_akasha_summcat.php',
		type: 'post',
		async: 'true',
		data: {"type" : type, "dept_id" : <?php echo $_REQUEST['dept_id']; ?>},
		success: function(data) {
		//	alert (data);

			var phx_result = data.trim();

			if (phx_result == "successful"){
				
				showGraph1();

			//	alert ("Order deleted successfully");
			//location.reload(true);
			}else{
				alert ("Summary table load failed"+data);
			
			}
					

		}
	});
									

			
}	

	function change_graph(cat_id){
	
	


		var btn = "customCheckb1"+cat_id;
		
		var value = document.getElementById(btn).checked;	
		
		
		
		if (value == true){
			value = 1;
		}else{
			value = 0;
		}

	//	alert (dept_id+""+value);		
	
//	alert (type);
	
		//	return false();			//
									
	$.ajax({
		url: 'change_cat.php',
		type: 'post',
		async: 'true',
		data: {"cat_id" : cat_id, "value" : value},
		success: function(data) {
		//	alert (data);

			var phx_result = data.trim();

			if (phx_result == "successful"){
				

				location.reload();

			//	alert ("Order deleted successfully");
			//location.reload(true);
			}else{
				alert ("change category failed"+data);
			
			}
					

		}
	});
									

			
}


										function SetCookie(c_name,value,exdays)
 {
 var exdate=new Date();
 exdate.setDate(exdate.getDate() + exdays);
 var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
 document.cookie=c_name + "=" + c_value;
 }


function change_dept(){
	
	var select_id = document.getElementById("ren_dept");

	var dept_id = select_id.options[select_id.selectedIndex].value;
	
//	alert (dept_id);
	
		SetCookie("sel_dept2",dept_id,365);
	
	window.location.replace("../akasha_admin/indexcat.php?type=qty&dept_id="+dept_id);
	


	
}



</script>
		



</body>

</html>