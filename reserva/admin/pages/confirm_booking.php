<?php
// PHP Hotel Booking
// https://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

if(!isset($_REQUEST["id"])||!is_numeric($_REQUEST["id"]))
{
	die("The booking ID is not set!");
}

$id=intval($_REQUEST["id"]);

$xml = simplexml_load_file($this->booking_file);
$booking=$xml->booking[$id];

if(!isset($booking->code)) die("No booking found with this code!");
?>

<div class="header-line">
		  <div class="container">
		  
			<a href="index.php" style="margin-top:17px" class="btn btn-default pull-right"><?php echo $this->texts["go_back"];?></a>
			
			<h3><?php echo $this->texts["confirm_booking"];?> <strong><?php echo $booking->code;?></strong></h3>
		  </div>
	</div>
	

	<div class="container main-content">
<?php
if(isset($_POST["proceed_confirm"]))
{
	$xml->booking[$id]->status=1;
	$xml->asXML($this->booking_file); 
	echo "<br/><h3>".$this->texts["booking_status_confirmed"]."</h3>";

	$headers  = "From: \"".strip_tags(stripslashes($this->settings["website"]["admin_email"]))."\"<".strip_tags(stripslashes($this->settings["website"]["admin_email"])).">\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Date: ".date("r")."\r\n";
	$headers .= "Message-ID: <".time()."@booking>\r\n";
	$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
	
	if(mail
	(
		$booking->email,
		stripslashes($_POST["subject"]),
		stripslashes($_POST["message"]),
		$headers
	))
	{
		?>
		<h3><?php echo $this->texts["message_sent_success"];?></h3>
	
		<?php
	}
	else
	{
		?>
		<h3 class="red-font"><?php echo $this->texts["error_while_sending"];?></h3>
	
		<?php	
	}
}
else
{
?>
	

			<br/>
			<?php

			
			
			?>
			
			<div class="row">
				<div class="col-md-8">
				
					<br/>
				
				
					<form id="main" action="index.php" method="post"   enctype="multipart/form-data">
					<input type="hidden" name="page" value="confirm_booking"/>
					<input type="hidden" name="proceed_confirm" value="1"/>
					<input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>"/>
					
						<fieldset>
							<legend><?php echo $this->texts["message_customer"];?></legend>
							<ol>
								<li>
									<label><?php echo $this->texts["send_message"];?>:</label>
									<select name="send_message">
										<option value="1"><?php echo $this->texts["yes_word"];?></option>
										<option value="0"><?php echo $this->texts["no_word"];?></option>
									</select>
								</li>
										
								<li>
									<label><?php echo $this->texts["subject"];?>:</label>
									
					
									<input type="text" name="subject" value="<?php echo $this->texts["booking_has_confirmed"];?>"/>
								</li>
								
								<li>
									<label><?php echo $this->texts["message"];?>:</label>
<?php
$message_text=$this->texts["booking_confirmation_message"];
$message_text=str_replace("{NAME}",$booking->name,$message_text);

$number_nights=(intval($booking->end_time)-intval($booking->start_time))/86400;
$booking_details=$number_nights." ".$this->texts["nights"]." (".
date($this->settings["website"]["date_format"],intval($booking->start_time))." ".
" - ".date($this->settings["website"]["date_format"],intval($booking->end_time)).") ";

$message_text=str_replace("{BOOKING_DETAILS}",$booking_details,$message_text);
$message_text=str_replace("{BOOKING_CODE}",$booking->code,$message_text);

?>								
<textarea name="message" cols="40" rows="10"><?php echo $message_text;?></textarea>
								</li>
						
								
							<ol>
						</fieldset>
						
						
						
						<div class="clearfix"></div>
						<br/>
						<button type="submit" class="btn btn-primary pull-right"> <?php echo $this->texts["confirm"];?> </button>
						
						<div class="clearfix"></div>
						<br/>
					</form>
				
				</div>
				
			</div>

	
<?php
}
?>
</div>