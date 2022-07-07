<?php
// PHP Hotel Booking
// http://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// http://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");
$process_error="";

if(isset($_REQUEST["id"]))
{
	$id=intval($_REQUEST["id"]);
	$this->ms_i($id);
}
else
{
	die("The listing ID isn't set.");
}

$listings = simplexml_load_file($this->data_file);
?>
<script>
function GoBack()
{
	history.back();
}
</script>
<br/>
<a id="go_back_button" class="btn btn-default btn-xs pull-right" href="javascript:GoBack()"><?php echo $this->texts["go_back"];?></a>

<h2><?php echo $this->texts["book_now"];?> "<?php echo stripslashes($listings->listing[$id]->title);?>" </h2>
<h4>
	<?php
		echo "<strong>".$_REQUEST["nights"]."</strong> ".$this->texts["nights"];	
	?>, 
	<?php echo $this->texts["check_in_date"];?>: <strong><?php echo date("d/m/Y",intval($_REQUEST["start_time"]));?></strong> 
	<?php echo $this->texts["check_out_date"];?>: <strong><?php echo date("d/m/Y",intval($_REQUEST["end_time"]));?></strong> 
</h4>
<hr/>
<?php
$process_error="";

if(isset($_POST["ProceedBooking"]))
{	
	
	
	if($this->settings["website"]["use_captcha_images"]==1 && ( (md5($_POST['code']) != $_SESSION['code'])|| trim($_POST['code']) == "" ) )
	{
		$process_error=$this->texts["wrong_code"];
		echo "<h3 class=\"red-font\">".$this->texts["wrong_code"]."</h3>";
	}
	
	
	if($process_error=="")
	{
		if($_POST["name"]!=""&&$_POST["email"]!="")
		{
			//Saving the booking information in the XML file
			$bookings = simplexml_load_file($this->booking_file);
			$booking = $bookings->addChild('booking');
			$booking->addChild('code', $this->get_random_code());
			$booking->addChild('name', stripslashes($_POST["name"]));
			$booking->addChild('email', stripslashes($_POST["email"]));
			$booking->addChild('phone', stripslashes($_POST["phone"]));
			$booking->addChild('remarks', stripslashes($_POST["remarks"]));
			$booking->addChild('room_code', stripslashes($_POST["room_code"]));
			$booking->addChild('room_name', stripslashes($_POST["room_name"]));
			$booking->addChild('start_time', stripslashes($_POST["start_time"]));
			$booking->addChild('end_time', stripslashes($_POST["end_time"]));
			
			$number_nights=(intval($_POST["end_time"])-intval($_POST["start_time"]))/86400;
			$booking->addChild('price', $listings->listing[$id]->price*$number_nights);
			$booking->addChild('status', "0");
			
			$bookings->asXML($this->booking_file); 
			//End saving in the XML file
			
			
				
			//Sending an email notification to the site owner
			$_POST["name"]=strip_tags(stripslashes($_POST["name"]));
			$_POST["remarks"]=strip_tags(stripslashes($_POST["remarks"]));
			$_POST["email"]=strip_tags(stripslashes($_POST["email"]));
			$_POST["phone"]=strip_tags(stripslashes($_POST["phone"]));
			
			$headers  = "From: \"".strip_tags(stripslashes($_POST["name"]))."\"<".strip_tags(stripslashes($_POST["email"])).">\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Date: ".date("r")."\r\n";
			$headers .= "Message-ID: <".time()."@booking>\r\n";
			$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
	
			$email_text = $this->texts["sent_by"].": ".strip_tags(stripslashes($_POST["name"])).
			", ".$this->texts["email"].": ".strip_tags(stripslashes($_POST["email"]));
			if($_POST["phone"]!="")
			{
				$email_text .= ", ".$this->texts["phone"].": ".strip_tags(stripslashes($_POST["phone"]));
			}
			
			$email_text .= "\n\n".stripslashes($_POST["message"]);

		
				mail
				(
					$this->settings["website"]["admin_email"],
					$this->texts["new_booking_notification"],
					$email_text, 
					$headers
				);
			//End sending email notification
				?>
				<h3><?php echo $this->texts["receive_booking_confirmed"];?></h3>
				<?php
			
		}
	}

}

if(!isset($_POST["ProceedBooking"])||$process_error!="")
{


?>

<form id="main" action="index.php" method="post" >
<input type="hidden" name="page" value="book"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="room_code" value="<?php echo $listings->listing[$id]->code;?>"/>
<input type="hidden" name="room_name" value="<?php echo stripslashes($listings->listing[$id]->title);?>"/>
<input type="hidden" name="price" value="<?php if(isset($_REQUEST["price"])) echo $_REQUEST["price"];?>"/>
<input type="hidden" name="start_time" value="<?php if(isset($_REQUEST["start_time"])) echo $_REQUEST["start_time"];?>"/>
<input type="hidden" name="end_time" value="<?php if(isset($_REQUEST["end_time"])) echo $_REQUEST["end_time"];?>"/>
<input type="hidden" name="nights" value="<?php if(isset($_REQUEST["nights"])) echo $_REQUEST["nights"];?>"/>
<input type="hidden" name="ProceedBooking" value="1"/>
	<fieldset>
		<legend><?php echo $this->texts["please_enter_contact"];?></legend>
		<ol>
			
			<li>
				<label for="name"><?php echo $this->texts["name"];?>(*)</label>
				<input id="name" <?php if(isset($_REQUEST["name"])) echo "value=\"".$_REQUEST["name"]."\"";?> name="name" placeholder="" type="text" required/>
			</li>
			<li>
				<label for="email"><?php echo $this->texts["email"];?>(*)</label>
				<input id="email" <?php if(isset($_REQUEST["email"])) echo "value=\"".$_REQUEST["email"]."\"";?> name="email" placeholder="example@domain.com" type="email" required/>
				
			</li>
			<li>
				<label for="phone"><?php echo $this->texts["phone"];?></label>
				<input id="phone" <?php if(isset($_REQUEST["phone"])) echo "value=\"".$_REQUEST["phone"]."\"";?> name="phone" placeholder="" type="text"/>
			</li>
			<?php
			if($this->settings["website"]["use_captcha_images"]==1)
			{
			?>
			<li>
				<label for="code">
				<img src="include/sec_image.php" width="100" height="30"/>
				</label>
				<input id="code" name="code" placeholder="<?php echo $this->texts["please_enter_code"];?>" type="text" required/>
			</li>
			<?php
			}
			?>
		</ol>
	</fieldset>
	
	<fieldset>
		<legend><?php echo $this->texts["remarks_requirements"];?></legend>
		<ol>
			
			<li>
				<label for="remarks"><?php echo $this->texts["remarks"];?>
				<br>
				
				</label>
				<textarea id="remarks" name="remarks" rows="8"><?php if(isset($_REQUEST["remarks"])) echo stripslashes($_REQUEST["remarks"]);?></textarea>
			</li>
	</ol>
	</fieldset>

	<fieldset>
		<button type="submit" class="btn btn-primary pull-right"><?php echo $this->texts["book_now"];?></button>
	</fieldset>
</form>
<?php
}


$this->Title($this->texts["book_now"]." ".stripslashes($listings->listing[$id]->title));
$this->MetaDescription($listings->listing[$id]->description);
?>