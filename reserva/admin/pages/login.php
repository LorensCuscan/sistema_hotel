<?php
// PHP Hotel Booking
// https://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_LOGIN_SCRIPT')) die("");
?>
<div class="header-line">
	  <div class="container">
		<h3><?php echo $this->texts["admin_panel"];?></h3>
	  </div>
</div>

<div class="container">
	<br/>
	<div class="row">

		<div class="col-md-2">
			<br/>
		</div>
		<div class="col-md-7">
			<br/>
			
			<form id="main" action="login_action.php" method="post">
			
				<fieldset>
					<legend><?php echo $this->texts["login_to_continue"];?></legend>
					<ol>
					
						<li>
							<label><?php echo $this->texts["username"];?></label>
							
							<input type="text" name="username" value=""/>
						</li>
						<li>
							<label><?php echo $this->texts["password"];?></label>
							
							<input type="password" name="password" value=""/>
						</li>
					<ol>
				</fieldset>
				
				<div class="clearfix"></div>
				<br/>
				<button type="submit" class="btn btn-primary pull-right"><?php echo $this->texts["login"];?></button>
				<div class="clearfix"></div>
			</form>
			
			<br/>
			<br/>
			
			
		
		</div>
		
		
	</div>
	<br/>
	<br/>
</div>