<?php
// PHP Hotel Booking 
// Copyright (c) All Rights Reserved, NetArt Media 2003-2017
// Check http://www.netartmedia.net/php-hotel-booking for demos and information
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

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

<h2><?php echo $listings->listing[$id]->title;?></h2>
<?php
$this->Title($listings->listing[$id]->title);
$this->MetaDescription($listings->listing[$id]->description);
?>
<hr/>
<div class="row">
	<?php
	if($listings->listing[$id]->images=="")
	{
		?>
		<div class="col-md-12">
		<?php
	}
	else
	{
		?>
		<div class="col-md-7">
		<?php
		
	}
	
	?>
		
		<?php echo $listings->listing[$id]->description;?>
		<br/><br/>
		
		<?php
		if(trim($listings->listing[$id]->price)!="")
		{
		?>
	
			<?php echo $this->texts["price"];?>: 
			<strong><?php echo $this->settings["website"]["currency"].$listings->listing[$id]->price;?></strong>
		<?php
		}
		?>
	
	
		<br/><br/><br/>
		<form action="index.php" method="post" >
			<input type="hidden" name="page" value="book"/>
			<input type="hidden" name="id" value="<?php echo $id;?>"/>
			<input type="hidden" name="room_code" value="<?php echo $listings->listing[$id]->code;?>"/>
			<input type="hidden" name="price" value="<?php if(isset($_REQUEST["price"])) echo $_REQUEST["price"];?>"/>
			<input type="hidden" name="start_time" value="<?php if(isset($_REQUEST["start_time"])) echo $_REQUEST["start_time"];?>"/>
			<input type="hidden" name="end_time" value="<?php if(isset($_REQUEST["end_time"])) echo $_REQUEST["end_time"];?>"/>
			
			<input type="submit" class="btn btn-lg btn-warning" value="<?php echo $this->texts["book_now"];?>"/>
		</form>
	
	</div>
	<?php
	if($listings->listing[$id]->images!="")
	{
		/// showing the listing images
		?>
		<div class="col-md-5">
			<?php
				$images=explode(",",trim($listings->listing[$id]->images,","));
					
				echo "<a href=\"uploaded_images/".$images[0].".jpg\" rel=\"prettyPhoto[ad_gal]\">";
				echo "<img src=\"uploaded_images/".$images[0].".jpg\" alt=\"".$listings->listing[$id]->title."\" class=\"final-image\"/>";
				echo "</a>";
				?>
				
				<br/><br/>
				<?php
					
				for($i=(sizeof($images)-1);$i>=1;$i--)
				{
					if(trim($images[$i])=="") continue;
					
					if($i!=0)
					{
						echo "<a href=\"uploaded_images/".$images[$i].".jpg\" rel=\"prettyPhoto[ad_gal]\">";
					}
					echo "<img src=\"thumbnails/".$images[$i].".jpg\" width=\"78\" alt=\"\"/>";
					if($i!=0)
					{
						echo "</a>";
					}
				}
				?>
				<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
				<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
				<script type="text/javascript" charset="utf-8">
				$(document).ready(function()
				{
					$("a[rel='prettyPhoto[ad_gal]']").prettyPhoto({

					});
				});
				</script>
		
		</div>
		<?php
		/// end showing the listing images
	}
	?>



</div>

<?php
//Checking if this room type is still available
//and showing the Book button just in such case
$booked_rooms=array();
	
$bookings = simplexml_load_file($this->booking_file);

foreach($bookings->booking as $booking)
{
	if
	(
		($booking->start_time <= $start_time&&$start_time <= $booking->end_time)
		||
		($booking->start_time <= $end_time&&$end_time <= $booking->end_time)
	)
	{
		if(!isset($booked_rooms[$booking->room_code]))
		{
			$booked_rooms[$booking->room_code]=1;
		}
		else
		{
			$booked_rooms[$booking->room_code]++;
		}
		
	}
}


if
(
	isset($booked_rooms[$listing->code])
	&&
	$booked_rooms[$listing->code]>=$listing->available_rooms)
{
	echo "<i>".$this->texts["no_availability_selected_dates"]."</i>";
}
else
{

?>

<?php
}
?>

<div class="clearfix"></div>
