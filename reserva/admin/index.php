<?php
// PHP Hotel Booking, http://www.netartmedia.net/php-hotel-booking
// A software product of NetArt Media, All Rights Reserved
// Find out more about our products and services on:
// http://www.netartmedia.net
// Released under the MIT license
?><?php
include("check_user.php");
define("IN_SCRIPT","1");
error_reporting(0);
session_start();
include("../include/SiteManager.class.php");
$website = new SiteManager();
$website->SetDataFile("../data/rooms.xml");
$website->SetBookingFile("../data/bookings.xml");
$website->LoadSettings();
$website->LoadTemplate();
if(isset($_REQUEST["page"]))
{
	$website->check_word($_REQUEST["page"]);
	$website->SetPage($_REQUEST["page"]);
}
else
{
	$website->SetPage("bookings");
}
$website->Render();
?>