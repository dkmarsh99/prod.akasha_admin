    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0" style="height: 100px; overflow-y: scroll;">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
						
						<?php
						
						$first_name = "Please login";
					
						// set name of file for staff image

						if (isset($_COOKIE['whcon_uid'])){

							$whcon_uid = $_COOKIE['whcon_uid'];
							
						}
							
							$i = 0;
							
							
							include("../php/configiboss.php");
						
			
	
	$sqluser = "SELECT * FROM 242_client_contacts where con_uid = ".$whcon_uid;
	
	//echo $sqluser;
	
		$resultuser = $conn->query($sqluser);

		if ($resultuser->num_rows > 0) {
			// output data of each row
			while($rowuser = $resultuser->fetch_assoc()) {

					$first_name = $rowuser["first_name"];
					$middle_name = $rowuser["middle_name"];
					$last_name = $rowuser["last_name"];					
					$dob = strtotime($rowuser["dob"]);	
					
					$dob2 = date("d/m/Y", $dob);
					
					if ($middle_name == ""){

						$full_name = $first_name . " " .$last_name;
						
					}else{

						$full_name = $first_name . " " . $middle_name . " " .$last_name;
						
					}
					
					
					
			}
		}
	
		
						
					//	$staff_image_url = "https://Wealthhealth Customer Portal/trades/images/staff/".$phx_clientid."_staff_".$phx_staffid.".jpg";
						
						// echo $staff_image_url;
						
						
						?>
						
                            <img src="https://wealthhealth.co.nz/portal/images/wh_logo_box.png" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?php echo $first_name . " " . $last_name ?></strong>
  
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="index.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
																                        <li>
                            <a href="../logout.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Logout
                                </div>
                            </a>
                        </li>
                    </ul>



                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">

                    <a href="../logout.php" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div>
                <!-- * sidebar buttons -->
            </div>
        </div>
		<div  class="modal fade" id="ajaxcreatecontact" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div  class="modal-content">

			<div class="text-center">
				<img src="assets/images/loaders/7.gif" alt="" />
			</div>

		</div>
	</div>
</div>
    </div>