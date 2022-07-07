<?php
// PHP Hotel Booking 
// Copyright (c) All Rights Reserved, NetArt Media 2003-2017
// Check https://www.netartmedia.net/php-hotel-booking for demos and information
// Released under the MIT license
?><?php
error_reporting(0);
$output_dir = "uploads/";
if(isset($_FILES["myfile"]))
{
	$ret = array();

	$error =$_FILES["myfile"]["error"];
 
	if(!is_array($_FILES["myfile"]["name"])) 
	{
	
 	 	$fileName = $_FILES["myfile"]["name"];
		
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if($ext=="png"||$ext=="jpg"||$ext=="jpeg"||$ext=="gif"||$ext=="PNG"||$ext=="JPG"||$ext=="JPEG"||$ext=="GIF")
		{
			$size=getimagesize($_FILES["myfile"]["tmp_name"]);
			$mime	= $size['mime'];
			
			if(substr($mime, 0, 6) != 'image/'||$size[0]==0||$size[1]==0)
			{
				
			}
			else
			{
				move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
				$ret[]= $fileName;
			}
			
		}
		
	}
	else  
	{
	
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
		$fileName = $_FILES["myfile"]["name"][$i];
		
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		if($ext=="png"||$ext=="jpg"||$ext=="jpeg"||$ext=="gif"||$ext=="PNG"||$ext=="JPG"||$ext=="JPEG"||$ext=="GIF")
		{
			$size=getimagesize($_FILES["myfile"]["tmp_name"]);
			$mime	= $size['mime'];
			
			if(substr($mime, 0, 6) != 'image/'||$size[0]==0||$size[1]==0)
			{
				
			}
			else
			{
				move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
				$ret[]= $fileName;
			}
		}
	  }
	
	}
    echo json_encode($ret);
}
?>