<?php
// PHP Hotel Booking
// https://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

if(isset($_REQUEST["proceed_delete"])&&trim($_REQUEST["proceed_delete"])!="")
{
	
		
		$xml = simplexml_load_file($this->booking_file);

		$i=-1;
		$str = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
		<bookings>";
		foreach($xml->children() as $child)
		{
			$i++;
			if($child->code==$_REQUEST["proceed_delete"]) 
			{
				continue;
			}
			else
			{
				$str = $str.$child->asXML();
			}
		}
		$str = $str."
		</bookings>";
		
		$fh = fopen($this->booking_file, 'w') or die("Error: Can't update the data  file");
		fwrite($fh, $str);
		fclose($fh);
	
}
?>
<script>

function ValidateSubmit(form)
{
	if(confirm("<?php echo $this->texts["sure_to_delete"];?>"))
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<div class="header-line">
  <div class="container">
  
				
	<h3><?php echo $this->texts["new_bookings"];?></h3>
  </div>
</div>

<div class="container">

	<br/>
	
	<div class="col-md-3 pull-right no-right-padding">
		<div class="db-wrap"  onclick="javascript:LoadPage('add')" onmouseover="javascript:OverDB(this, 2)" onmouseout="javascript:OutDB(this)">
			
			<a href="index.php?page=rooms">
				<img src="images/arrow.png" class="pull-left arrow-img"/>
				<h4 class="no-margin pull-left"><?php echo $this->texts["manage_rooms"];?></h4>
			 
			</a>
			
			<div class="clearfix"></div>
		
						
			<div class="back-color-2" style="position:absolute;bottom:0px;left:0px;width:100%;height:7px"></div>
		</div>
	</div>
	<div class="col-md-3 pull-right no-right-padding">
		<div class="db-wrap"  onclick="javascript:LoadPage('add')" onmouseover="javascript:OverDB(this, 5)" onmouseout="javascript:OutDB(this)">
			
			<a href="index.php?page=confirmed">
				<img src="images/arrow.png" class="pull-left arrow-img"/>
				<h4 class="no-margin pull-left"><?php echo $this->texts["confirmed_bookings"];?></h4>
			 
			</a>
			
			<div class="clearfix"></div>
		
						
			<div class="back-color-5" style="position:absolute;bottom:0px;left:0px;width:100%;height:7px"></div>
		</div>
	</div>
	
	
	
	<div class="clearfix"></div>

	<h3 class="no-margin"></h3>
	<br/>
	<div class="table-responsive table-wrap">
		<table class="table table-striped">
		  <thead>
			<tr>
				
			  <th width="80"><?php echo $this->texts["delete"];?></th>
			  <th width="80"><?php echo $this->texts["code"];?></th>
			  
			  <th width="140"><?php echo $this->texts["room"];?></th>
			  <th width="120"><?php echo $this->texts["check_in_date"];?></th>
			  <th width="120"><?php echo $this->texts["check_out_date"];?></th>
			  <th width="80"><?php echo $this->texts["price"];?></th>
			  <th><?php echo $this->texts["customer"];?></th>
			  <th><?php echo $this->texts["remarks"];?></th>
			  <th><?php echo $this->texts["confirm"];?></th>
			</tr>
		  </thead>
      <tbody>
	  <?php
	    $bookings = simplexml_load_file($this->booking_file);
		$i=-1;
		foreach ($bookings->booking as $booking)
		{
			$i++;
			if($booking->status!=0) continue;
			?>
			<tr>
				<td>
					<a href="index.php?page=bookings&proceed_delete=<?php echo $booking->code;?>"><img src="images/delete.png" alt="Delete Booking"/></a>
				</td>
				<td>
					<?php echo $booking->code;?>
				</td>
				
				<td>
					<?php echo $booking->room_name;?>
				</td>
				<td><?php echo date($this->settings["website"]["date_format"],intval($booking->start_time));?></td>
				<td><?php echo date($this->settings["website"]["date_format"],intval($booking->end_time));?></td>
				<td><?php if($booking->price!="") echo $this->settings["website"]["currency"].$booking->price;?></td>
				<td>
					<strong><?php echo $booking->name;?></strong>
					<br/>
					<?php echo $booking->email;?>
					<br/>
					<?php echo $booking->phone;?>
				</td>
				<td><?php echo $booking->remarks;?></td>
				<td>
					<a href="index.php?page=confirm_booking&id=<?php echo $i;?>&code=<?php echo $booking->code;?>"><img src="images/approve.png" alt="Confirm Booking"/></a>
				
				</td>
				
			</tr>
			<?php
			
		}
	  
	  ?>
     
      </tbody>
    </table>
  </div>
  <br/>

  <div class="clearfix"></div>
  <br/>
  
  


</div>	

<script>

function LoadPage(x)
{
	document.location.href="index.php?page="+x;
}

function OverDB(element, x)
{
	element.className = "db-wrap back-color-"+x;
}

function OutDB(element)
{
	element.className = "db-wrap";
}

$("#a1").mouseover(function(){
  $("#ul1").addClass("open").removeClass("closed")
})
</script>
