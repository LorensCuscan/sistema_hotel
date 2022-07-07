<?php
// PHP Hotel Booking
// http://www.netartmedia.net/php-hotel-booking
// Copyright (c) All Rights Reserved NetArt Media
// Find out more about our products and services on:
// http://www.netartmedia.net
?><br/>
<h2>
	<?php echo $this->texts["enter_dates_availability"];?>
</h2>
<br/>

<script>
function ValidateForm(form)
{
	if(form.start_time.value=="")
	{
		alert("<?php echo $this->texts["select_check_in"];?>");
		return false;
	}
	
	if(form.end_time.value=="")
	{
		alert("<?php echo $this->texts["select_check_out"];?>");
		return false;
	}
	
	var start_time = Date.parse(form.start_time.value);
	var end_time = Date.parse(form.end_time.value);
	
	if(start_time>end_time)
	{
		alert("<?php echo $this->texts["check_in_validation"];?>");
		return false;
	}
	
	return true;
}
</script>

<form action="index.php" onsubmit="return ValidateForm(this)">
<input type="hidden" name="page" value="results"/>
<div class="panel panel-default search-result">

	<div class="panel-body">
		<div class="row">
		
			<div class="col-sm-3">
				<strong><?php echo $this->texts["guests"];?></strong>
				<br/>
				<div class="input-group">
					<select name="guests" id="guests" class="form-control">
						<option value=""><?php echo $this->texts["please_select"];?></option>
						<?php
						for($i=1;$i<=8;$i++)
						{
							echo '<option '.($i==2?"selected":"").' value="'.$i.'">'.$i.'</option>';
						}
						?>
						
					</select>
					
					
					<span class="input-group-addon"><img src="images/user.png"/></span>
					
				  </div>
			</div>
  
			<div class="col-sm-3">
				<strong><?php echo $this->texts["check_in_date"];?></strong>
				<br/>
					<div class="input-group">
					<input required autocomplete="off" id="start_time" type="text" class="form-control" name="start_time">
					<span class="input-group-addon"><img src="images/calendar.png"/></span>
					
				  </div>
				
			</div>
			
			<div class="col-sm-3">
				
				<strong><?php echo $this->texts["check_out_date"];?></strong>
				<br/>
					<div class="input-group">
					<input required autocomplete="off" id="end_time" type="text" class="form-control" name="end_time">
					<span class="input-group-addon"><img src="images/calendar.png"/></span>
					
				  </div>
				
			</div>
			
			
			<div class="col-sm-3">
				<br/>
				<input type="submit" class="btn btn-primary btn-md" value="<?php echo $this->texts["search"];?>"/>
			</div>
			
			
		</div>
	</div>
</div>
	

</form>	


<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script>
$('#start_time').datetimepicker({
	format:"m/d/Y",
	formatTime:"",
    timepicker:0
}
);
$('#end_time').datetimepicker({
	format:"m/d/Y",
	formatTime:"",
    timepicker:0
});

</script>	

<?php
$this->Title($this->texts["book_your_stay"]);
$this->MetaDescription("");
?>	