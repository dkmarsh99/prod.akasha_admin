<?php
ini_set('max_execution_time', 120);

function ak_img_resize($target, $newcopy, $w, $h, $ext) {
	

    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 80);

}

$phxclient_id 		= $_COOKIE['phxclient_id'];
$hr_uid 			= $_REQUEST['hr_uid'];
$sel_file_type 		= $_REQUEST['sel_file_type'];

$target_dir = '/home/customer/www/Wealthhealth Customer Portal/public_html/trades/images/hazard/';
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);



if ($sel_file_type == "Image1"){

	$target_file = $target_dir.$phxclient_id."_hazard_".$hr_uid."_1.jpg";
	$location_url = "https://Wealthhealth Customer Portal/trades/images/hazard/".$phxclient_id."_hazard_".$hr_uid."_1.jpg?q=".rand();

}else if ($sel_file_type == "Image2"){

	$target_file = $target_dir.$phxclient_id."_hazard_".$hr_uid."_2.jpg";
	$location_url = "https://Wealthhealth Customer Portal/trades/images/hazard/".$phxclient_id."_hazard_".$hr_uid."_2.jpg?q=".rand();

}else if ($sel_file_type == "Image3"){

	$target_file = $target_dir.$phxclient_id."_hazard_".$hr_uid."_3.jpg";
	$location_url = "https://Wealthhealth Customer Portal/trades/images/hazard/".$phxclient_id."_hazard_".$hr_uid."_3.jpg?q=".rand();

}



//$profile_pic = "../images/".$_COOKIE['phxclient_id']."_staff_".$uid_staff.".jpg";
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

unlink($target_file) ;

// Check if file already exists


// file name
$filename = $_FILES['file']['name'];

// Location
$location = $target_file;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif");

$response = 0;


if(in_array($file_extension,$image_ext)){
	// Upload file
	
				$wmax = 400;
		$hmax = 400;
	$result = ak_img_resize($_FILES['file']['tmp_name'], $_FILES['file']['tmp_name'], $wmax, $hmax, ".jpg");
	
	if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
		$response = $location_url;
	}
}

echo $response;
?>