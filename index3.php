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

<body  onclick="javascript: reload_graphs()" class="" >

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
		
<h1>Business Performance</h1> 
        </center>
		</div>
    </div>
    <!-- * App Header -->

    <!-- Search Component -->




    <!-- * Search Component -->

    <!-- App Capsule -->
	

    <div class="extraHeader p-0" >
        <div class="form-wizard-section">

            <a  href="index3.php" class="button-item active">
                <strong>1</strong>
                <p>Sales by Category Charts</p>
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

<center>
<h2>Sales by Category August 2020 to August 2021</h2>
</center>
				<div class="row">
					<!-- -->

					<div class="col-md-9">
					  <canvas style="width: 100%" id="graphCanvas1"></canvas>

					</div>
					<div class="col-md-3">
        <ul class="listview image-listview">


			            <li class="multi-level">
                <a href="#" class="item">

                    <div class="in">
                        <div>Categories</div>
                    </div>
                </a>
                <!-- sub menu -->
                <ul class="listview image-listview">
				<?php
				

				
						include("configi.php");
				

					$sqlstaff2 = "SELECT 142_total_bycat.cat_id,142_total_bycat.cat_name,  Sum(total) AS totalcat FROM 142_total_bycat group by 142_total_bycat.cat_id order by totalcat desc;";
			//		echo $sqlstaff;
					

		$resultstaff2 = $conn->query($sqlstaff2);

		if ($resultstaff2->num_rows > 0) {
			// output data of each row
			while($rowstvehicle2 = $resultstaff2->fetch_assoc()) {

				$cat_id					= $rowstvehicle2["cat_id"];
				$cat_name				= $rowstvehicle2["cat_name"];
				$total_cat			= $rowstvehicle2["totalcat"];

    	echo '<li style="padding-top: 5px; padding-bottom: 5px;>';
        echo '<a href="#" class="item">';

        echo '<div class="in">';
        echo '<div style="width: 100%">
		<table style="width: 100%">
		<tr style="width: 100%">
		<td style="width: 50%; text-decoration: bold">
		<strong>'.$cat_name.'</strong></td>
		<td style="width: 50%; text-align: right;">$'.number_format($total_cat, 2, '.', ',').'</td>
		</tr><tr>
		<td></div>';

	
        echo '</td></tr></table></div>';
        echo '</a>';
        echo '</li>';

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
                $.post("data1c.php?graph=graph1",
                function (data)
                {
			
		//	alert (data);
			
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
		
		

		
				



</script>
		



</body>

</html>