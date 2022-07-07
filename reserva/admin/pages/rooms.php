<?php
// PHP Hotel Booking
// https://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

if(isset($_POST["proceed_delete"])&&trim($_POST["proceed_delete"])!="")
{
	if(isset($_POST["delete_listings"])&&sizeof($_POST["delete_listings"])>0)
	{
		$delete_listings=$_POST["delete_listings"];
		$xml = simplexml_load_file($this->data_file);

		$i=-1;
		$str = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
		<listings>";
		foreach($xml->children() as $child)
		{
			$i++;
			  if(in_array($i, $delete_listings)) 
			  {
				 $del_images = explode(",",$child->images);
				foreach($del_images as $del_image)
				{
					if(file_exists("../uploaded_images/".$del_image.".jpg"))
					{
						unlink("../uploaded_images/".$del_image.".jpg");
					}
					if(file_exists("../thumbnails/".$del_image.".jpg"))
					{
						unlink("../thumbnails/".$del_image.".jpg");
					}
				}
				continue;
				
			  }
			  else
			  {
					$str = $str.$child->asXML();
			  }
		}
		$str = $str."
		</listings>";
		
		
		$xml->asXML("../data/listings_".time().".xml");
	
		$fh = fopen($this->data_file, 'w') or die("Error: Can't update the data  file");
		fwrite($fh, $str);
		fclose($fh);
	}
}
?>
<script>
$(function(){
	var offsetX = 20;
	var offsetY = -200;
	$('a.hover').hover(function(e){	
		var href = $(this).attr('href');
		$('<img id="largeImage" src="' + href + '" alt="image" />')
			.css({'top':e.pageY + offsetY,'left':e.pageX + offsetX})
			.appendTo('body');
	}, function(){
		$('#largeImage').remove();
	});
	$('a.hover').mousemove(function(e){
		$('#largeImage').css({'top':e.pageY + offsetY,'left':e.pageX + offsetX});
	});
	$('a.hover').click(function(e){
		e.preventDefault();
	});
});

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
	<h3><?php echo $this->texts["manage_listings"];?></h3>
  </div>
</div>

<div class="container">

	<br/>
	

	<div class="col-md-3 pull-right no-right-padding">
		<div class="db-wrap"  onclick="javascript:LoadPage('add')" onmouseover="javascript:OverDB(this, 4)" onmouseout="javascript:OutDB(this)">
			
			<a href="index.php?page=add">
				<img src="images/arrow.png" class="pull-left arrow-img"/>
				<h4 class="no-margin pull-left"><?php echo $this->texts["add_new_listing"];?></h4>
			 
			</a>
			
			<div class="clearfix"></div>
		
						
			<div class="back-color-4" style="position:absolute;bottom:0px;left:0px;width:100%;height:7px"></div>
		</div>
	</div>
	
	
	<div class="clearfix"></div>
	<form class="no-margin" action="index.php" method="post" onsubmit="return ValidateSubmit(this)">
	<input type="hidden" name="proceed_delete" value="1"/>
	<input type="hidden" name="page" value="home"/>
	
	<h3 class="no-margin"><?php echo $this->texts["your_current_listings"];?></h3>
	<br/>
	<div class="table-responsive table-wrap">
		<table class="table table-striped">
		  <thead>
			<tr>
			
			  <th width="80"><?php echo $this->texts["edit"];?></th>
			  <th width="140"><?php echo $this->texts["images"];?></th>
			  <th width="180"><?php echo $this->texts["title"];?></th>
			  <th><?php echo $this->texts["description"];?></th>
			  <th width="80"><?php echo $this->texts["price"];?></th>
			  <th width="80"><?php echo $this->texts["delete"];?></th>
			</tr>
		  </thead>
      <tbody>
	  <?php
	    $listings = simplexml_load_file($this->data_file);
		$i=0;
		foreach ($listings->listing as $listing)
		{
			?>
			<tr>
				<td><a href="index.php?page=edit&id=<?php echo $i;?>"><img src="images/edit-icon.gif"/></a></td>
				<td>
				<?php
				$image_ids = explode(",",$listing->images);
				$has_image=false;
				foreach($image_ids as $image_id)
				{
					if(file_exists("../thumbnails/".$image_id.".jpg"))
					{
						echo "<a href=\"../uploaded_images/".$image_id.".jpg\" class=\"hover\"><img src=\"../thumbnails/".$image_id.".jpg\" class=\"admin-preview-thumbnail\"/></a>";
						$has_image=true;
					}
					
				}
				
				if(!$has_image)
				{
					?>
					<img src="../images/no_pic.gif" width="50" class="admin-preview-thumbnail"/>
					<?php				
				}
				
				?>
				</td>
				<td><?php echo $listing->title;?></td>
				<td><?php echo $this->text_words($listing->description,60);?></td>
				<td><?php if($listing->price!="") echo $this->settings["website"]["currency"].$listing->price;?></td>
				<td><input type="checkbox" value="<?php echo $i;?>" name="delete_listings[]"/></td>
				
			</tr>
			<?php
			$i++;
		}
	  
	  ?>
     
      </tbody>
    </table>
  </div>
  <br/>
  <input type="submit" class="btn btn-primary pull-right" value=" <?php echo $this->texts["delete"];?> "/>
  
  </form>
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
