<?php
// PHP Hotel Booking, https://www.netartmedia.net/php-hotel-booking
// A software product of NetArt Media, All Rights Reserved
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
   require('security_image.php');
   
   session_start();
    
   $oSecurityImage = new SecurityImage(150, 30);
   if ($oSecurityImage->Create()) 
   {
          $_SESSION['code'] = md5($oSecurityImage->GetCode());
   }
    else 
	{
      echo 'Image GIF library is not installed.';
   }
?>