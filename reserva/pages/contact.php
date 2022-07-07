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

if(isset($_POST["SubmitContact"]))
{	

	if($this->settings["website"]["use_captcha_images"]==1 && ( (md5($_POST['code']) != $_SESSION['code'])|| trim($_POST['code']) == "" ) )
	{
		$process_error=$this->texts["wrong_code"];
		echo "<br/><br/><h3>".$this->texts["wrong_code"]."</h3>";
	}
	else
	{
		if($_POST["name"]!=""&&$_POST["message"]!=""&&$_POST["email"]!="")
		{
			$_POST["name"]=strip_tags(stripslashes($_POST["name"]));
			$_POST["message"]=strip_tags(stripslashes($_POST["message"]));
			$_POST["email"]=strip_tags(stripslashes($_POST["email"]));
			$_POST["phone"]=strip_tags(stripslashes($_POST["phone"]));
			
			$headers  = "From: \"".strip_tags(stripslashes($_POST["name"]))."\"<".strip_tags(stripslashes($_POST["email"])).">\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Date: ".date("r")."\r\n";
			$headers .= "Message-ID: <".time()."@contact>\r\n";
			$headers = "Content-Type: text/plain; charset=utf-8\r\n";
				
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
					strip_tags(stripslashes($_POST["subject"])),
					$email_text, 
					$headers
				);
				?>
				<br/><br/><h3><?php echo $this->texts["message_sent_success"];?></h3>
				<?php
			
		}
	}

}
else
{
if($process_error!="")
{
	?>
	<h2><?php echo $process_error;?></h2>
	<?php
}

?>
<br/>
<form id="main" action="index.php" method="post" >
<input type="hidden" name="page" value="contact"/>

	
	<input type="hidden" name="SubmitContact" value="1"/>
	<fieldset>
		<legend><?php echo $this->texts["message_or_questions"];?></legend>
		<ol>
			<li>
				<label for="subject"><?php echo $this->texts["subject"];?>(*)
				<br>
				
				</label>
				<input id="subject" <?php if(isset($_REQUEST["subject"])) echo "value=\"".$_REQUEST["subject"]."\"";?> name="subject" placeholder="" type="text" required/>
			
			</li>
			<li>
				<label for="description"><?php echo $this->texts["message"];?>(*)
				<br>
				
				</label>
				<textarea id="message" name="message" rows="8" required><?php if(isset($_REQUEST["message"])) echo stripslashes($_REQUEST["message"]);?></textarea>
			</li>
	</ol>
	</fieldset>
	<fieldset>
		<legend><?php echo $this->texts["your_details"];?></legend>
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
		<button type="submit" class="btn btn-primary pull-right"><?php echo $this->texts["send"];?></button>
	</fieldset>
</form>
<?php
}

$this->Title($this->texts["contact_link"]);
$this->MetaDescription("");

?>