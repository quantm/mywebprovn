<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>  
	<link  rel="stylesheet" type="text/css" href="/css/game.css"/>    
	<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
	<link  rel="stylesheet" type="text/css" href="/css/game/in_game_css.css"/>
	<script type="text/javascript"  src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" >
	$(document).ready(function(){
	var screen_height=($("body").css("height").replace("px","")*9)/10
    screen_height=screen_height+"px"
    $("#obj_ebook").css("height",screen_height) 
	})
	</script>
</head> 
<body>
  <div class="modal">  
        <div class="modal-body">
		<iframe width="100%"  id="obj_ebook" frameborder="0" src="<?=$embed_flash?>"></iframe>
       </div>
 </div> 
</body> 
</html>


