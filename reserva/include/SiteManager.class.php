<?php
// PHP Hotel Booking All Rights Reserved
// A software product of NetArt Media, All Rights Reserved
// Find out more about our products and services on:
// https://www.netartmedia.net
// Released under the MIT license
?><?php
class SiteManager
{
	public $lang="en";
	public $page="home";
	public $data_file = "data/rooms.xml";
	public $booking_file = "data/bookings.xml";
	public $arrPages = array();
	public $domain = "";
	public $multi_language = false;
	private $db;
	public $running_mode=1;

	
	public $default_page_name="en_Home";
	public $Title = true;
	public $Description = true;
	public $Keywords = true;
	public $Language = true;
	public $TemplateHTML = "";
	public $settings = array();
	public $texts = array();
	
	function SetLanguage($lang)
	{
		$this->lang= substr(preg_replace("/[^a-z]/i", "", $lang), 0, 2); 
	}
	
	function SetDataFile($data_file)
	{
		$this->data_file= $data_file;
	}
	
	function SetBookingFile($booking_file)
	{
		$this->booking_file= $booking_file;
	}
		
	function SetDatabase(Database $db)
	{
		$this->db = $db;
	}
	
	function SetPage($page)
	{
		$this->page=$page;
	}
	
	function LoadSettings()
	{
		if(file_exists("config.php"))
		{
			$this->settings = parse_ini_file("config.php",true);
		}
		else
		if(file_exists("../config.php"))
		{
			$this->settings = parse_ini_file("../config.php",true);
		}
		else
		{
			die("The configuration file doesn't exist!");
		}
		
		if(file_exists("include/texts_".$this->lang.".php"))
		{
			$this->texts = parse_ini_file("include/texts_".$this->lang.".php",true);
		}
		else
		if(file_exists("../include/texts_".$this->lang.".php"))
		{
			$this->texts = parse_ini_file("../include/texts_".$this->lang.".php",true);
		}
		else
		{
			die("The language file include/texts_".$this->lang.".php doesn't exist!");
		}
		
		
		
	}
	
	function CreateDefaultTemplate()
	{
		$this->TemplateHTML='  
			<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			<style>
			body{
				padding-left:15px;
				padding-right:15px;
			}
			</style>
			<script type="text/javascript" src="js/jquery.min.js"></script>

			<site content/>
		
		';
		
	}
	
	function LoadTemplate()
	{
		global $_REQUEST,$DBprefix;
				
		if(file_exists("template.htm"))
		{
			$templateArray=array();
			$templateArray["html"] = file_get_contents('template.htm');
		}
		else
		{
			die("Error: The template file template.htm doesn't exist.");
		}
		
	
		
		$this->TemplateHTML = stripslashes($templateArray["html"]);
		
		$pattern = "/{(\w+)}/i";
		preg_match_all($pattern, $this->TemplateHTML, $items_found);
		foreach($items_found[1] as $item_found)
		{
			
			if(isset($this->texts[$item_found]))
			{
				$this->TemplateHTML=str_replace("{".$item_found."}",$this->texts[$item_found],$this->TemplateHTML);
			}
		}
		
		
		$arrTags=array();
		
		array_push($arrTags, array("top_right_menu","top_right_menu.php"));
		array_push($arrTags, array("search_form","search_form.php"));
		
		
		if(is_array($arrTags))
		{
			foreach($arrTags as $arrTag)
			{
				$tag_pos = strpos($this->TemplateHTML,"<site ".$arrTag[0]."/>");
			
				if($tag_pos !== false)
				{
					if(trim($arrTag[1]) != "none" && trim($arrTag[0]) != "" && trim($arrTag[1]) != "")
					{
						$HTML="";
						ob_start();
						include("include/".$arrTag[1]);
						
						if($HTML=="")
						{
							$HTML = ob_get_contents();
						}
						ob_end_clean();
						$this->TemplateHTML = str_replace("<site ".$arrTag[0]."/>",$HTML,$this->TemplateHTML);
					}
				}
			}
		}

		if(!isset($_REQUEST["mod"])&&!isset($_REQUEST["page"]))
		{
			$this->TemplateHTML = str_replace('<a rel="nofollow" href="https://www.netartmedia.net','<a href="https://www.netartmedia.net',$this->TemplateHTML);
		}
	
	}
	
	function Render()
	{
		
		if($this->page!="")
		{
			$HTML="";
			ob_start();
			
			if(file_exists("pages/".$this->page.".php"))
			{
				include("pages/".$this->page.".php");
			
			}
			$HTML = ob_get_contents();
			
			$this->TemplateHTML=str_replace("<site content/>",$HTML,$this->TemplateHTML);
			
			ob_end_clean();
		}
		
		echo $this->TemplateHTML;
	}
	
	
	function RenderIframe()
	{
		
		if($this->page!="")
		{
			$HTML="";
			ob_start();
			
			if(file_exists("pages/".$this->page.".php"))
			{
				include("pages/".$this->page.".php");
			
			}
			$HTML = ob_get_contents();
			$HTML=str_replace("index.php","iframe.php",$HTML);
			$this->TemplateHTML=str_replace("<site content/>",$HTML,$this->TemplateHTML);
			
			ob_end_clean();
		}
		
		echo $this->TemplateHTML;
	}

	
	function check_word($input)
	{
		if(!preg_match("/^[a-zA-Z0-9_]+$/i", $input)) die("");
	}
	
	function check_extended_word($input)
	{
		if(!preg_match("/^[a-zA-Z0-9_\-. @]+$/i", $input)) die("");
	} 
	
	function check_integer($input)
	{
		if(!is_numeric($input)) die("");
	} 
	
	function ms_ia($input)
	{
		foreach($input as $inp) if(!is_numeric($inp)) die("");
	}
	
	function ms_i($input)
	{
		if(!is_numeric($input)) die("");
	} 
	
	function ForceLogin()
	{
		die("<script>document.location.href='login.php';</script>");
	}
	
	
	function sanitize($input)
	{
		$strip_chars = array("~", "`", "!","#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]",
                 "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                 ",", "<", ">", "/", "?");
		$output = trim(str_replace($strip_chars, " ", strip_tags($input)));
		$output = preg_replace('/\s+/', ' ',$output);
		$output = preg_replace('/\-+/', '-',$output);
		return $output;
	}
	
	function get_random_code()
	{
	
		$arrChars = array("A","F","B","C","O","Q","W","E","R","T","Z","X","C","V","N");
							
		return $arrChars[rand(0,(sizeof($arrChars)-1))]."".rand(100,999)
					.$arrChars[rand(0,(sizeof($arrChars)-1))].rand(100,999);
				
	}				
	
	
	function str_rot($s, $n = 13) {
    static $letters = 'AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz';
    $n = (int)$n % 26;
    if (!$n) return $s;
    if ($n < 0) $n += 26;
    if ($n == 13) return str_rot13($s);
    $rep = substr($letters, $n * 2) . substr($letters, 0, $n * 2);
    return strtr($s, $letters, $rep);
}

	

	function write_ini_file($file, array $options)
	{
		$tmp = '; <?php exit;?>';
		$tmp.="\n\n";
		foreach($options as $section => $values){
			$tmp .= "[$section]\n";
			foreach($values as $key => $val){
				if(is_array($val)){
					foreach($val as $k =>$v){
						$tmp .= "{$key}[$k] = \"$v\"\n";
					}
				}
				else
					$tmp .= "$key = \"$val\"\n";
			}
			$tmp .= "\n";
		}
		file_put_contents($file, $tmp);
		unset($tmp);
	}

	
	function load_login_slides($product="")
	{
		
	
		
	}
	
	
	function parse_csv($file, $delimiter=',') 
	{
		$field_names=array();
		$res=array();
		
		if (($handle = fopen($file, "r")) !== FALSE) 
		{ 
			$i = 0; 
			while (($lineArray = fgetcsv($handle, 4000, $delimiter)) !== FALSE) 
			{ 
				
				if($i==0)
				{
					for ($j=0; $j<count($lineArray); $j++) 
					{ 
						$field_names[$j] = $lineArray[$j]; 
					}
				}
				else
				{
					for ($j=0; $j<count($lineArray); $j++) 
					{ 
						if(isset($field_names[$j]))
						{
							$data2DArray[$i-1][$field_names[$j]] = $lineArray[$j]; 
						}
					}
				}				
				$i++; 
			} 
			fclose($handle); 
		} 
			
		
		return $data2DArray; 
		
	} 
	
	function format_str($strTitle)
	{
		$strSEPage = ""; 
		$strTitle=strtolower(trim($strTitle));
		$arrSigns = array("~", "!","\t", "@","1","2","3","4","5","6","7","8","9","0", "#", "$", "%", "^", "&", "*", "(", ")", "+", "-", ",",".","/", "?", ":","<",">","[","]","{","}","|"); 
		
		$strTitle = str_replace($arrSigns, "", $strTitle); 
		
		$pattern = '/[^\w ]+/';
		$replacement = '';
		$strTitle = preg_replace($pattern, $replacement, $strTitle);

		$arrWords = explode(" ",$strTitle);
		$iWCounter = 1; 
		
		foreach($arrWords as $strWord) 
		{ 
			if($strWord == "") { continue; }  
			
			if($iWCounter == 4) { break; }  
			if($iWCounter != 1) { $strSEPage .= "-"; }
			$strSEPage .= $strWord;  
			
			$iWCounter++; 
		} 
		
		return $strSEPage;
		
	}
	
	function text_words($string, $wordsreturned)
	{
		$string=trim($string);
		$string=str_replace("\n","",$string);
		$string=str_replace("\t"," ",$string);
		
		$string=str_replace("\r","",$string);
		$string=str_replace("  "," ",$string);
		 $retval = $string;    
		$array = explode(" ", $string);
	  
		if (count($array)<=$wordsreturned)
		{
			$retval = $string;
		}
		else
		{
			array_splice($array, $wordsreturned);
			$retval = implode(" ", $array)." ...";
		}
		return $retval;
	}
	
	function Title($website_title)
	{
		$this->TemplateHTML = 
		str_replace
		(
			"<site title/>",
			strip_tags(stripslashes($website_title)),
			$this->TemplateHTML
		);
	}
	
	function MetaDescription($meta_description)
	{
		$this->TemplateHTML = 
		str_replace
		(
			"<site description/>",
			strip_tags(stripslashes($meta_description)),
			$this->TemplateHTML
		);
	}
	
}	
?>