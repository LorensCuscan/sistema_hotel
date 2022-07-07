	<div class="header-line">
		  <div class="container">
			<h3>PHP Scripts & Website Systems</h3>
		  </div>
	</div>

	<div class="container">
	
	<style>
.b-t-line-1
{
	width:100%;
	height:1px;
	background:#e0e0e0;
	animation: l-show 0.5s;
}

.scr-wrap
{
	width:100%;
	height:180px;
	overflow:hidden;
}
</style>
	
<div class="card" style="padding-left:20px;padding-right:20px">
<div class="content">
<br/>
Create professional websites with our 
php scripts and advanced website systems
<br/>
Please click <a target="_blank" href="https://www.netartmedia.net/scripts.html" style="text-decoration:underline">here</a> to discover all our products and please 
 don't hesitate to <a target="_blank" href="https://www.netartmedia.net/en_Contact.html" style="text-decoration:underline">contact us</a> should you have any questions.
 <div class="clearfix"></div>

<hr/>
<br/>
<?php
include("include/SCRIPTS.php");
$rand_keys = array_rand($arrProducts, sizeof($arrProducts));
shuffle($rand_keys);

for($j=0;$j<sizeof($rand_keys);$j++)
{
	$key=$rand_keys[$j];
	$product_name=$value=$arrProducts[$rand_keys[$j]];
	$name_items=explode(" v",$value);
	$product_name= $name_items[0];
	$image_name=str_replace(" ","-",strtolower($product_name));
	
	$product_link=$arrDetails[$key];
	
	$product_image='<a target="_blank" href="'.$product_link.'" class="main-link">
			<img class="img-responsive img-center" src="images/products/'.$image_name.'.jpg" title="'.$product_name.'" alt="" style="border-radius:3px"/>
		</a>';
		
	$product_info='<a target="_blank" href="'.$product_link.'" style="color:#252422;text-decoration:underline"><h3 style="margin-top:0px">'.$product_name.'</h3></a>
	'.$arrProductTexts[$rand_keys[$j]].'
	<br/><br/>
	
	<a target="_blank" href="'.$product_link.'" class="btn btn-primary">Find Out More</a>';
	
	echo '<div class="row">
		<div class="col-md-'.($j%2==0?"6":"6").'">
			'.($j%2==0?$product_image:$product_info).'
		</div>
		<div class="col-md-'.($j%2==0?"6":"6").'">
			'.($j%2==0?$product_info:$product_image).'
		</div>
	</div>
	<div class="clearfix"></div>
	<hr/>';
}
?>
<div class="clearfix">


<div class="clearfix">
<center>
<a id="more_button" target="_blank" href="https://www.netartmedia.net/en_Pricing.html" class="btn btn-warning">See All Our Scripts ...</a>
</center>
<br/>
<br/>


<h3>	Create unique websites by combining several PHP scripts on one site
	
</h3>





Combine PHP Poll with some of our other PHP scripts and ready-made 
website systems to create unique websites
 with single log in and multiple features for the users and add value to your site.
 
 <br/><br/>
 Some examples of scripts with which you can combine it are:
 <br/> <br/>
 <div class="xrow">
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.netartmedia.net/php-support-desk-script/">PHP Support Desk<br/><img src="images/combine/php-support-desk.gif" alt="php support desk script"/></a>
        <br/><span style="font-size:13px;">to add a ticketing system and	offer better support to your users</span></div>
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.netartmedia.net/php-web-counter/">PHP Web Counter<br/><img src="images/combine/visit-analytics.gif" alt="visit analytics php web counter script"/></a>
        <br/><span style="font-size:13px;">to	get details about your site's traffic, reports and SEO </span></div>
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.netartmedia.net/php-classified-ads-script/">PHP Classified Ads<br/><img src="images/combine/php-classified-ads.gif" alt="php classifieds script"/></a>
        <br/><span style="font-size:13px;">to add also a general classifieds section on the site and</span></div>
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.netartmedia.net/jobsportal/">Jobs Portal<br/><img src="images/combine/cv-bank.gif" alt="cv bank resumes search script"/></a>
        <br/><span style="font-size:13px;">to add an advanced job board and multi-user job portal</span></div>
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.netartmedia.net/eventportal/">Event Portal<br/><img src="images/combine/event-portal.gif" alt="event portal script"/></a>
        <br/><span style="font-size:13px;">to let the users publish announcements for events and sell tickets
or other job related events </span></div>
    <div class="col-md-2 col-xs-6 text-center"><a target="_blank" rel="nofollow" href="https://www.phpbusinessdirectory.com">Business Directory<br/><img src="images/combine/php-business-directory.gif" alt="php business directory script"/></a>
        <br/><span style="font-size:13px;">to create a business directory with company business listings</span></div>
    <div class="clearfix"></div>
	
<div class="col-md-12">	


	<a href="https://www.netartmedia.net/en_Combine+Several+Products.html" class="btn btn-primary" target="_blank">Click here to find out more about combining products</a>
 
<br/><br/> 
 All products can be set with similar or same design (template), in 
 order that they all look like being part of one big site or 
  we can configure that in a different way according to your preferences 
  <br/><br/> 
  
  <center>
	<img src="images/combine-scripts.jpg" class="img-responsive" alt=""/>
  </center>
  
  You may <a class="underline-link" target="_blank" href="https://www.netartmedia.net/en_Combine+Several+Products.html">click here</a> to find out more about combining different scripts 
  on one site and also you are welcome to 
  <a class="underline-link" target="_blank" href="https://www.netartmedia.net/en_Contact.html">contact us</a>
  if you have 
  any questions or need more information.
  
</div>
<div class="clearfix"></div>

			
			</div>
	</div>		
</div>

</div>