<?php
// PHP Hotel Booking
// http://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// http://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

if(isset($_REQUEST["start_time"]))
{ 
	$start_time=strtotime($_REQUEST["start_time"]);

} 
else
{	
	$start_time=0;
}
if(isset($_REQUEST["end_time"]))
{ 
	$end_time=strtotime($_REQUEST["end_time"]);
} 
else
{
	$end_time=0;
}
	
	
$number_nights=($end_time-$start_time)/86400;
?>
<br/>
<br/>

<h2 class="pull-left no-margin">
	<?php
	if(isset($_REQUEST["keyword_search"]))
	{
		echo $this->texts["search_results"];
	}
	else
	{
		echo $this->texts["please_select_room"];
	}
	?>
</h2>
<div class="clearfix"></div>	
<br/>

<hr class="no-margin"/>
<br/>

	<div class="clearfix"></div>
	<div class="results-container">		
	
	<?php	
	$PageSize = intval($this->settings["website"]["results_per_page"]);
	
	if(!isset($_REQUEST["num"]))
	{
		$num=1;
	}
	else
	{
		$num=$_REQUEST["num"];
		$this->ms_i($num);
	}
	
	
	$booked_rooms=array();
	
	$bookings = simplexml_load_file($this->booking_file);
	
	foreach($bookings->booking as $booking)
	{
		
		
		if
		(
			($start_time<=$booking->start_time&&$booking->start_time<=$end_time&&$end_time<=$booking->end_time)
			||
			($booking->start_time<=$start_time&&$start_time<=$end_time&&$end_time<=$booking->end_time)
			||
			($booking->start_time<=$start_time&&$start_time<=$booking->end_time&&$booking->end_time<=$end_time)
			||
			($start_time<=$booking->start_time&&$booking->start_time<=$booking->end_time&&$booking->end_time<=$end_time)
		)
		
		{
		
			
			if(!isset($booked_rooms[$booking->room_code]))
			{
				
				$booked_rooms["".$booking->room_code]=1;
			}
			else
			{
				$booked_rooms["".$booking->room_code]++;
			}
			
		}
	}
	
	$listing_counter = -1;
	
	$listings = simplexml_load_file($this->data_file);
	
	$price_from = 0;
	$price_to = 0;
	$min_price = 0;
	$max_price = 0;
	$iTotResults = 0;
	
	
	foreach ($listings->listing as $listing)
	{
		$listing_counter++;
		
		if(isset($booked_rooms["".$listing->code]))
		{
			if($booked_rooms["".$listing->code]>=$listing->available_rooms)
			{
				continue;
			}
		}
		
		$available_rooms=$listing->available_rooms-$booked_rooms["".$listing->code];
		
		if(intval($_REQUEST["guests"]) > $available_rooms*intval($listing->max_persons))
		{
			continue;
		}	
				
		if($iTotResults>=($num-1)*$PageSize&&$iTotResults<$num*$PageSize)
		{
			$images=explode(",",$listing->images);
			
			$strLink = "index.php?page=details&id=".$listing_counter."&nights=".$number_nights."&start_time=".$start_time."&end_time=".$end_time;
			$strBookLink = "index.php?page=book&nights=".$number_nights."&start_time=".$start_time."&end_time=".$end_time."&id=".$listing_counter."&room_code=".$$listing->code;
			
			?>
			
		<div class="panel panel-default search-result">
				<div class="panel-heading">
					<h3 class="panel-title">
						
						<a href="<?php echo $strLink;?>" class="search-result-title"><strong><?php echo $listing->title;?></strong></a>
						
					</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 col-xs-12">
							<a href="<?php echo $strLink;?>" class="btn-block result-details-link"><img alt="<?php echo $listing->title;?>" class="img-responsive img-res" src="<?php if($images[0]==""||!file_exists("thumbnails/".$images[0].".jpg")) echo "images/no_pic.gif";else echo "thumbnails/".$images[0].".jpg";?>"/></a>
						</div>
						<div class="col-sm-8 col-xs-12">
							<div class="details">
								
								<p class="description">
									<?php echo $this->text_words(strip_tags($listing->description),80);?>
								</p>
								
								<?php
								if(trim($listing->price)!="")
								{
								?>
									<span class="listing-price"><?php echo $this->texts["price_for"];?> <?php echo $number_nights;?> <?php echo $this->texts["nights"];?>: <strong><?php echo $this->settings["website"]["currency"].($listing->price * $number_nights);?></strong></span>
									<br/>
									<span class="listing-price"><?php echo $this->texts["price"];?>: <strong><?php echo $this->settings["website"]["currency"].$listing->price;?></strong></span>
								<?php
								}
								?>
								
								<span class="is_r_featured"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6">
						
						</div>
						<div class="col-xs-6">
							<div class="text-right">
								<a href="<?php echo $strBookLink;?>" class="btn btn-warning"><?php echo $this->texts["book_now"];?></a>
								<a href="<?php echo $strLink;?>" class="btn btn-primary"><?php echo $this->texts["details"];?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				
			
		}
			
		$iTotResults++;
	}
	?>
	</div>
	<div class="clearfix"></div>	
	<?php
	$strSearchString = "";
			
	foreach ($_POST as $key=>$value) 
	{ 
		if($key != "num"&&$value!="")
		{
			$strSearchString .= $key."=".$value."&";
		}
	}
	
	foreach ($_GET as $key=>$value) 
	{ 
		if($key != "num"&&$value!="")
		{
			$strSearchString .= $key."=".$value."&";
		}
	}
		
		
	if(ceil($iTotResults/$PageSize) > 1)
	{
		echo '<ul class="pagination">';
		
	
		
		$inCounter = 0;
		
		if($num > 2)
		{
			echo "<li><a class=\"pagination-link\" href=\"index.php?".$strSearchString."num=1\"> << </a></li>";
			
			echo "<li><a class=\"pagination-link\" href=\"index.php?".$strSearchString."num=".($num-1)."\"> < </a></li>";
		}
		
		$iStartNumber = $num-2;
		
	
		if($iStartNumber < 1)
		{
			$iStartNumber = 1;
		}
		
		for($i= $iStartNumber ;$i<=ceil($iTotResults/$PageSize);$i++)
		{
			if($inCounter>=5)
			{
				break;
			}
			
			if($i == $num)
			{
				echo "<li><a><b>".$i."</b></a></li>";
			}
			else
			{
				echo "<li><a class=\"pagination-link\" href=\"index.php?".$strSearchString."num=".$i."\">".$i."</a></li>";
			}
							
			
			$inCounter++;
		}
		
		if(($num+1)<ceil($iTotResults/$PageSize))
		{
			echo "<li><a href=\"index.php?".$strSearchString."num=".($num+1)."\"> ></b></a></li>";
			
			echo "<li><a href=\"index.php?".$strSearchString."num=".(ceil($iTotResults/$PageSize))."\"> >> </a></li>";
		}
		
		echo '</ul>';
	}
	
	
	
	
	if($iTotResults==0)
	{
		?>
		<i><?php echo $this->texts["no_results"];?></i>
		<?php
	}
	?>
	
<script>
var min_price=<?php echo $min_price;?>;
var max_price=<?php echo $max_price;?>;
</script>

<?php
$this->Title("");
$this->MetaDescription("");
?>
