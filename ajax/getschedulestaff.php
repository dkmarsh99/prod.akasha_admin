<?php
		include_once("configiboss.php");
		
			
	$edit_mode = 0;
	
	$phxclient_casual = $_COOKIE['phxclient_casual'];
	
	$phxusersec = $_COOKIE['phxusersec'];
	if ($phxusersec == "Superuser" && $phxclient_casual == "0"){
		$edit_mode = 1;
	}


	
//	$ev_uid = $_REQUEST['ev_uid'];

?>

					<?php 
			//		echo "dave".$edit_mode;
					
					if ($edit_mode == 1){
						?>
<br>
<br>
<table>
<tr>
<td>
</td>
<td>
 <button type="button" onclick="javascript: add_attendance(<?php echo $_COOKIE['phxuserid']?>)"  class="btn btn-primary btn-3d" >Add Me</button>&nbsp;&nbsp;&nbsp;&nbsp;<br>
</td>
<td>

 <button style="display: inline" type="button" onclick="javascript: add_attendance(0)"  class="btn btn-primary btn-3d" >Add Other </button>
</td>
</tr>
</table>

<?php
					}
					?>
<br>
<br>
		<table  border="1"  style="border:collapse: true"  class="table table-vertical-middle nomargin">	
		<tr>

			<?php 
			if ($edit_mode == 1){
				
				?>

		<td>

		</td>
		
		<?php
			}
			
			?>
		<td>
		Name:
		</td>

	<?php

		$querytbattend="SELECT * from " . $_COOKIE['phxclient_id'] . "_schedule_events_staff where ev_id = " . $ev_uid;
	//	echo $querytbattend;
		$resulttbattend=mysqli_query($conn, $querytbattend);

		while($rowtbattend=mysqli_fetch_array($resulttbattend)) { 

			$sta_id 					= $rowtbattend['ev_staff_uid'];
			$sta_staff_id 				= $rowtbattend['ev_staffid'];
			$ev_staffname					= $rowtbattend['ev_staffname'];			


			?>

			<tr>
			<?php 
			if ($edit_mode == 1){
				
				?>
<td style="width: 4%">
				 <button type="button" onclick="javascript: del_attendance(<?php echo $sta_id?>)"  class="btn btn-link" >Del </button>
			</td>
			<?php
			}
			?>
			
<td style="width: 33%">

<select <?php if ($edit_mode == 0){echo " readonly disabled ";}?>   id = "sta_staff_id" name="sta_staff_id" style="width: 100%"  class="form-control"   onchange="javascript: upd_attendance('sta_staff_id', this.options[this.selectedIndex].value,<?php echo $sta_id ?>)" >

															<?php
include_once("configiboss.php");

$querycodest="SELECT * from " . $_COOKIE['phxclient_id'] . "_staff order by staff_order, staff_name";
//echo $querycodest;
$resultcodest=mysqli_query($conn, $querycodest);


while($rowcodest=mysqli_fetch_array($resultcodest)) { 


		?>

		<option <?php if ($rowcodest['uid_staff'] == $sta_staff_id){echo " selected ";} ?>
		value='<?php echo $rowcodest['uid_staff']?>'><?php echo $rowcodest['staff_name']; ?></option> 	

<?php

}


	 
?>
</select>

<?php

if ($sta_staff_id == "-1"){
	
	$disp_div = "block";
	
}else{

	$disp_div = "none";
	
}
	
	?>
	
	<div style="display: <?php echo $disp_div ?>" id="divshowotherstaff_<?php echo $sta_id ?>>"

	<br>
	<input class="form-control"  type="text" value="<?php echo $sta_comments ?>" id="otherstaff_<?php echo $sta_id ?>" onchange="javascript: upd_attendance('sta_comments', this.value,<?php echo $sta_id ?>)" >
</div>

				</td>

		
			</tr>

			
			<?php
	
		}
?>
</table>