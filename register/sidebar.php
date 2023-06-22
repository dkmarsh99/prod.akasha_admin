    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0" style="height: 100px; overflow-y: scroll;">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
						
						<?php
						
						$comp_name = "Please login";
					
						// set name of file for staff image

						if (isset($_COOKIE['wh_userid'])){

							$wh_userid = $_COOKIE['wh_userid'];
							
							$i = 0;
							
							
							include("configiboss.php");
						
							$sqluser = "SELECT * FROM 94_client where uid_client = ".$wh_userid;
		
							$resultuser = $conn->query($sqluser);

							// output data of each row
							while($rowuser = $resultuser->fetch_assoc()) {

								$comp_name = $rowuser["comp_name"];
								$i = $i + 1;
					
							}
							
							if ($i == 0){
							
							//
								
							}

				
						}else{
						//	echo "cookie not set";
							
						}
		
						
					//	$staff_image_url = "https://Wealthhealth Customer Portal/trades/images/staff/".$phx_clientid."_staff_".$phx_staffid.".jpg";
						
						// echo $staff_image_url;
						
						
						?>
						
                            <img src="<?php echo $staff_image_url?>" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?php echo $comp_name ?></strong>
  
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="../index.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="body-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Register
                                </div>
                            </a>
                        </li>

						

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

                    <a href="logout.php" class="button">
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