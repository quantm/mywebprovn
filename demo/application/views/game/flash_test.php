<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>  
	<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
</head> 
<body>  
<div class="game_wrapper">     
<div class="game_description" id="game_description"></div>        
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="<?=$w?>" height="<?=$h?>"  codebase="http://fpdownload.adobe.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"> 
	<param name="movie" value="<?=$embed_flash?>" /> 
	<param name="play" value="true"/> 
	<param name="loop" value="true"/> 
	<param name="allowscriptaccess" value="sameDomain">
	<param name="quality" value="high"/> 
	<embed wmode="direct"  src="<?=$embed_flash?>" width="<?=$w?>" height="<?=$h?>"  quality="high"  play="true" loop="true" quality="high" pluginspage="http://www.adobe.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"> 
	</embed> 
</object>
<div/>
</body> 
</html>
