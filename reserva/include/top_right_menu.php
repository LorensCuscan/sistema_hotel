<?php
// PHP Hotel Booking, https://www.netartmedia.net/php-hotel-booking
// A software product of NetArt Media, All Rights Reserved
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><a href="index.php" class="top-right-link">
<?php echo $this->texts["home_link"];?>
</a> 
<a href="<?php if($this->settings["website"]["seo_urls"]==1) echo "page-contact.html";else echo "index.php?page=contact";?>" class="top-right-link">
<?php echo $this->texts["contact_link"];?>
</a> 


