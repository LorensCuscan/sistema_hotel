<?php
// PHP Hotel Booking
// https://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><br/><br/>
<?php
if(!isset($_REQUEST["page"])||$_REQUEST["page"]==""||$_REQUEST["page"]=="results")
{
?>
<h4><?php echo $this->texts["refine_results"];?></h4>
<hr class="no-margin"/>
<br/>
<form action="index.php" method="post">
<input type="hidden" name="page" value="results"/>
<input type="hidden" name="proceed_search" value="1"/>

	<div class="row">
		<label class="control-label col-md-4" for="keyword_search">
			<?php echo $this->texts["keyword"];?>:
		</label>

		<div class="control-field col-md-8 no-right-padding">
			<input  name="keyword_search" value="<?php if(isset($_REQUEST["keyword_search"])) echo stripslashes($_REQUEST["keyword_search"]);?>" class="form-control input-sm"/>
		</div>
	</div>
	<br/>

<link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-ui.js"></script>

  <script>
  $(function() {
  
	if(min_price==max_price)
	{
		document.getElementById("price_range").style.display="none";
	}
	else
	{
	   $( "#slider-range" ).slider({
		  range: true,
		  min: min_price,
		  max: max_price,
		  values: [ min_price, max_price ],
		  slide: function( event, ui ) {
			$( "#amount" ).val( "<?php echo $this->settings["website"]["currency"];?>" + ui.values[ 0 ] + " - <?php echo $this->settings["website"]["currency"];?>" + ui.values[ 1 ] );
		  }
		});
		$( "#amount" ).val( "<?php echo $this->settings["website"]["currency"];?>" + $( "#slider-range" ).slider( "values", 0 ) +
		  " - <?php echo $this->settings["website"]["currency"];?>" + $( "#slider-range" ).slider( "values", 1 ) );
	}
  });
  </script>
	
<div id="price_range" >	 
	<p>
	  <label for="amount"><?php echo $this->texts["price_range"];?>:</label>
	  <input type="text" name="amount" id="amount" readonly>
	</p>
	 <div style="padding-left:10px;padding-right:10px">
			<div id="slider-range"></div>
	</div>
	<br/>
</div>

		<?php echo $this->texts["only_with_picture"];?>:
		

		&nbsp;
		<input type="radio" name="only_picture" <?php if(!isset($_REQUEST["only_picture"]) || (isset($_REQUEST["only_picture"])&&$_REQUEST["only_picture"]=="0") ) echo "checked";?> value="0"/> <?php echo $this->texts["no_word"];?>
		&nbsp;
		<input type="radio" name="only_picture" <?php if(isset($_REQUEST["only_picture"])&&$_REQUEST["only_picture"]=="1") echo "checked";?> value="1"/> <?php echo $this->texts["yes_word"];?>
	
	<div class="clearfix"></div>
			<br/>
		<div class="row">
			<input type="submit" class="pull-right btn btn-primary " value="<?php echo $this->texts["submit"];?>"/>
		</div>
	<div class="clearfix"></div>
	<br/>
</form>
<?php
}
?>