<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="/css/home.css"/>
</head>

<body>
<div id="container">

<!-- start game -->
<hr id="game_hr">
<h3 id="h3_game">GAME</h3>
<h4 style="float:right;margin-top: -30px;"><a href="/game/play/" target="_new">Xem tất cả</a></h4>
<table id="game_wrapper_table">								
<tr>
<td id="game_header_category_item" colspan="9"><span></span></td>
</tr>
<?php $condition = empty($game) || !is_array($game) ? 0 : count($game); ?>
<?php if ($condition) {
$loop = -1;
foreach ($game as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 8 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 8 ?>%">
<?php if ($key["THUMBS"]) { ?>
<div class="game_div_item" id="game_div_item_<?= $key['ID'] ?>">
<div class="wrapper_youtube_icon">
<input type="hidden" value="<?=$key['VIDEO_DESCRIPTION']?>"/>
<input type="hidden" id="game_name_video_description_<?= $key['ID'] ?>" value="<?=$key['NAME']?>"/>         
<i	title="Xem video game" 
data-toggle="tooltip" 
data-placement="top"  
class="<?if($key['VIDEO_DESCRIPTION'] != '') echo 'fa fa-youtube-square fa-2x watch_youtube'?>">
</i>

<i	title="Thêm vào Game của tôi" 
data-toggle="tooltip" 
data-placement="left" 
class="fa fa-plus-square fa-2x">
</i>
</div>									
<img width="85px" height="80px" class="game_thumbs" title="<?= $key['NAME'] ?>" alt="<?= $key['NAME'] ?>" src="<?= $key['THUMBS'] ?>" >
<div class="div_clear_both"></div>
<span><?=common_model::highlightWords($key['NAME'], $search_key)?></span>
<button id="game_item_<?= $key['ID'] ?>" data_embed="<?=$key['EMBED_TYPE']?>" data-id="<?= $key['ID'] ?>"  data-name="<?= $key['NAME'] ?>"  data-href="<?= $key['EMBED_PATH'] ?>" class="game_list btn btn-primary" >Chơi ngay</button>
<input type="hidden" class="game_description" value='<?=$key['DESCRIPTION']?>'/>            
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>

<!-- end game -->

<!-- start video làm như thế nào -->
<hr id="video_hr">
<h3 id="h3_video">VIDEO LÀM NHƯ THẾ NÀO</h3>
<h4 style="float:right;margin-top: -30px;"><a href="/video/lntn?&is_hidden=false" target="_new">Xem tất cả</a></h4>
<iframe id="iframe_lntn" frameborder=0 src="/video/lntn?&is_hidden=true"/></iframe>
<!-- end video làm như thế nào -->


<!-- start mbook -->
<hr style="margin-top:4%">
<h3 style="margin-top: -4.5%">MBOOK</h3>
<h4 style="float:right;margin-top: -30px;"><a href="#">Xem tất cả</a></h4>
<div class="game_div_item">
<img src="http://i.ytimg.com/vi_webp/cZlXhfbpTbY/default.webp"/>
<div class="div_clear_both"></div>
<span><a href="/mbook/ctdlgt" target="_new">Cấu trúc dữ liệu và giải thuật</a></span>
</div>
<!-- end mbook -->
</div>


<!-- start video modal -->
<div class="modal hide fade" id="video_description">
<div class="modal-header">
<span></span>      
<button id="header_video_close" type="button" class="close" data-dismiss="modal">x</button>
</div>
<div class="modal-body" style="padding-left:25px">
<iframe id="frame_video_description"> </iframe>
</div>
<div class="modal-footer">
<button type="button"  data-dismiss="modal"  class="btn btn-primary">Thêm vào Video của tôi</button>
</div>        
</div>
<!-- end video modal -->

<form id="game_play">
<input name="id" id="id" type="hidden"></input>	
</form>
</body>
</html>
