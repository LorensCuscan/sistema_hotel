<?php
// PHP Hotel Booking, https://www.netartmedia.net/php-hotel-booking
// A software product of NetArt Media, All Rights Reserved
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
if(!defined('IN_SCRIPT')) die("");

$id=intval($_REQUEST["id"]);

$this->ms_i($id);

?>
	<div class="header-line">
		  <div class="container">
		  
			<a href="index.php?page=edit&id=<?php echo $id;?>" style="margin-top:17px" class="btn btn-default pull-right"><?php echo $this->texts["go_back"];?></a>
			
			<h3><?php echo $this->texts["modify_images"];?></h3>
		  </div>
	</div>
	
	

	<div class="container" id="main_content">

			<br/>
			<?php

			
			$xml = simplexml_load_file($this->data_file);
			
			$current_images = trim($xml->listing[$id]->images);

			
			
			
			if(isset($_REQUEST["current"])&&isset($_REQUEST["new"]))
			{
				$current=str_replace("img","",$_REQUEST["current"]);
				$new=str_replace("img","",$_REQUEST["new"]);
				
				$pos_current=strpos($current_images,$current);
				$pos_new=strpos($current_images,$new);
				
				if
				(
					$pos_current!==false
					&&
					$pos_new!==false
				)
				{
				
					$current_images = str_replace($new,"###",$current_images);
					$current_images = str_replace($current,$new,$current_images);
					$current_images = str_replace("###",$current,$current_images);
					
					$xml->listing[$id]->images=$current_images;
					$xml->asXML($this->data_file); 
					
				}
			}
			else
			if(isset($_REQUEST["del"]))
			{
				$pos=strpos($current_images,$_REQUEST["del"]);
				
				if($pos!==false)
				{
					if(file_exists("../uploaded_images/".$_REQUEST["del"].".jpg"))
					{
						unlink("../uploaded_images/".$_REQUEST["del"].".jpg");
					}
					if(file_exists("../thumbnails/".$_REQUEST["del"].".jpg"))
					{
						unlink("../thumbnails/".$_REQUEST["del"].".jpg");
					}
				
					$current_images = str_replace($_REQUEST["del"],"",$current_images);
					$current_images = str_replace(",,",",",$current_images);
					$current_images = trim($current_images,",");
					
					$xml->listing[$id]->images=$current_images;
					$xml->asXML($this->data_file); 
				
				}
			}
			else
			if(isset($_POST["proceed_save"]))
			{
				
				$str_images_list = "";
				$limit_pictures=25;	
				$path="../";	
				include("include/images_processing.php");
				
				if($current_images != "")
				{
					$str_images_list = $current_images.",".$str_images_list;
				}
				
				
				if(trim($_POST["dele_images"]) != "")
				{
					$dele_ids = explode(",",trim($_POST["dele_images"]));
					
					foreach($dele_ids as $dele_id)
					{
						if(trim($dele_id)=="") continue;
						$this->ms_i($dele_id);
						
						if(file_exists("../thumbnails/".$dele_id.".jpg"))
						{
							unlink("../thumbnails/".$dele_id.".jpg");
						}
						
						if(file_exists("../uploaded_images/".$dele_id.".jpg"))
						{
							unlink("../uploaded_images/".$dele_id.".jpg");
						}
						
						$str_images_list=str_replace($dele_id.",","",$str_images_list);
						$str_images_list=str_replace($dele_id,"",$str_images_list);
					}
				}
				
				
				$xml->listing[$id]->images=$str_images_list;
				$xml->asXML($this->data_file); 
				$current_images=$str_images_list;
			}	
			?>
			
			<div class="row">
				<div class="col-md-8">
				
					<br/>
					<form action="index.php" method="post"   enctype="multipart/form-data">
					<input type="hidden" name="page" value="images"/>
					<input type="hidden" name="proceed_save" value="1"/>
					<input type="hidden" name="dele_images" id="dele_images" >
					<input type="hidden" name="id" value="<?php echo $id;?>"/>
					
						<script>
						function Dele(x)
						{
							document.location.href="index.php?page=images&id=<?php echo $id;?>&del="+x;

						}
						</script>
						
						<div id="drag_images">
						<?php
						$iPicCounter = 0;
						$image_ids = explode(",",$current_images);
				

						for($i=0;$i<sizeof($image_ids);$i++)
						{
						
							if(isset($image_ids[$i]) && $image_ids[$i]!="")	
							{
							?>
								
										
								<div  ondragstart="javascript:img_drag_start(this)" style="float:left;width:220px;margin-right:20px;margin-bottom:20px;background:#ffffff;padding:10px" class="img-shadow drag_img" id="img<?php echo $image_ids[$i];?>">
								<a class="pull-right" href="javascript:Dele('<?php echo $image_ids[$i];?>')"><img src="images/cancel.gif" alt="<?php echo $this->texts["delete"];?>" width="21" height="20" border="0"></a>
								<br>
								<img  src="../thumbnails/<?php echo $image_ids[$i];?>.jpg" alt="" width="200"/>
								
							
								</div>
							<?php
							}
							?>		
							<span style="display:none">
								<input type="file" name="userfile<?php echo $i;?>">
							</span>
							<?php

							$iPicCounter++;
							
						}
						?>
						</div>
						<div class="clearfix"></div>	

					
						<h3><?php echo $this->texts["upload_more_images"];?></h3>
						<hr/>
						<input  type="file" class="pull-left" name="images[]" id="images"  multiple="multiple"/>

						<input type="submit" class="btn btn-primary pull-left" value=" <?php echo $this->texts["submit"];?> "/>
						
						</form>
			
						<script>


						function init_drag() 
						{
							
							$('.drag_img').draggable( {
								containment: '#main_content',
								revert: true
							} );
							
							$('.drag_img').droppable( {
								drop: handle_drop
							} );
							
							
						}
						 
						function handle_drop( event, ui ) 
						{
							var id = $(this).attr('id');
							var draggable = ui.draggable;
						  
							document.location.href="index.php?page=images&id=<?php echo $id;?>&current="+id+"&new="+draggable.attr('id');

						}
						var x_index=100;
						function img_drag_start(x)
						{
							x_index=x_index+100;
							x.style.zIndex=x_index;
						}

						$(init_drag);
						</script>
						<div class="clearfix"></div>
						<br/><br/>
				
				</div>
				
			</div>

	</div>