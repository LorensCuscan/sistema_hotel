<?php
// PHP Hotel Booking 
// Copyright (c) All Rights Reserved, NetArt Media 2003-2021
// Check https://www.netartmedia.net/php-hotel-booking for demos and information
// Released under the MIT license
?><?php
define("LOGIN_PAGE", "login.php");
define("SUCCESS_PAGE", "index.php");
define("LOGIN_EXPIRE_AFTER", 3 * 3600);

if(!isset($_POST["username"]) || !isset($_POST["password"]) || trim($_POST["username"]) == "" || trim($_POST["password"]) == "") 
{
	die("<script>document.location.href='".LOGIN_PAGE."?error=no';</script>");
}
else
{
	
	$ini_array = parse_ini_file("../config.php",true);
	
	$admin_password_salt="D58X1W";

	if
	(
		md5($_POST["password"].$admin_password_salt)==$ini_array["login"]["admin_password"]
		&&
		$_POST["username"]==$ini_array["login"]["admin_user"]
	)
	{
		
		$strCookie=$_POST["username"]."~".md5($_POST["password"].$admin_password_salt)."~".(time()+LOGIN_EXPIRE_AFTER);

		
		setcookie("AuthUser",$strCookie, (time()+LOGIN_EXPIRE_AFTER));

		die("<script>document.location.href='".SUCCESS_PAGE."';</script>");
	}
	else
	{
		die("<script>document.location.href=\"".LOGIN_PAGE."?error=error\";</script>");
	}
	
}
?>