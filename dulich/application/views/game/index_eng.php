<body class="game_index_wrapper">
<ul class="breadcrumb">
<li class="active">
<a href="/game/play"/>Tất cả game <a/><span class = "game_count">(<?=$count_all_game?>)</span>
</li>
<span class="divider">/</span>
<?php if($cate_name_top != ""): ?>
<li><a id="sub_category" href="#" tabindex="-1"><?=$cate_name_top?></a></li>
<span class="divider">/</span>
<?php endif; ?>	
<li class="header_pagination"><?=$pagination?></li>
</ul>
<center>
<table id="game_wrapper_table">								
<tr>
<td id="game_header_category_item" colspan="9"><span></span></td>
</tr>
<?php $condition = empty($game_index) || !is_array($game_index) ? 0 : count($game_index); ?>
<?php if ($condition) {
$loop = -1;
foreach ($game_index as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 8 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 8 ?>%">
<?php if ($key["THUMBS"]) { ?>
<div class="game_div_item" id="game_div_item_<?= $key['ID'] ?>">
<div class="wrapper_youtube_icon">
<input type="hidden" value="<?=$key['VIDEO_DESCRIPTION']?>"/>
<input type="hidden" id="game_name_video_description_<?= $key['ID'] ?>" value="<?=$key['NAME_ENG']?>"/>         
<i	title="Xem video game" 
data-toggle="tooltip" 
data-placement="top"  
class="<?if($key['VIDEO_DESCRIPTION'] != '') echo 'fa fa-youtube-square fa-2x'?>">
</i>

<i	title="Thêm vào Game của tôi" 
data-toggle="tooltip" 
data-placement="left" 
class="fa fa-plus-square fa-2x">
</i>
</div>									
<img width="85px" height="80px" class="game_thumbs" title="<?= $key['NAME_ENG'] ?>" alt="<?= $key['NAME_ENG'] ?>" src="<?= $key['THUMBS'] ?>" >
<div class="div_clear_both"></div>
<span><?=common_model::highlightWords($key['NAME_ENG'], $search_key)?></span>
<button id="game_item_<?= $key['ID'] ?>" data_embed="<?=$key['EMBED_TYPE']?>" data-id="<?= $key['ID'] ?>"  data-name="<?= $key['NAME_ENG'] ?>"  data-href="<?= $key['EMBED_PATH'] ?>" class="game_list btn btn-primary" >Chơi ngay</button>
<input type="hidden" class="game_description" value='<?=$key['DESCRIPTION']?>'/>            
</div>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>
</center>	 
<input type="hidden" id="pagination_total_page" value="<?=$total_rows?>"/>
<input type="hidden" id="game_item_playing" value=""/>

<div class="modal hide fade" id="modal_game_list">
<div class="modal-header">
<span id="game_title"></span>
<span id="add_to_my_game">
<button type="button" id="btn_add_to_my_game" class="btn btn-primary">Thêm vào Game của tôi</button>
</span>
<span id="invite_friend">
<button type="button" class="btn btn-primary">Mời bạn</button>
</span>
<button type="button" class="close" data-dismiss="modal">x</button>        
</div>    
<iframe id="game_main_iframe" src=""></iframe>    
</div>

<div class="modal hide fade" id="facebook_friend_list">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h3>Mời bạn của bạn cùng chơi game này</h3>
</div>
<div class="modal-body"></div>
<div class="modal-footer">
<button data-dismiss="modal" class="btn btn-primary">Đóng</button>
</div>
</div>

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
<form id="game_play">
<input name="id" id="id" type="hidden"></input>	
</form>
</body>
