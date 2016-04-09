<html>
<head>
<!-- start meta -->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="http://myweb.pro.vn/images/game/newest_game.jpg" />
<meta property="og:type" content="game" />
<meta property="og:url" content="http://myweb.pro.vn/game/" />
<meta property="og:description" content="Tổng hợp những game mới nhất" />
<!-- end meta  -->
<script type="text/javascript"  src="/js/game/pagination.js"></script> 
<style>
.navbar-green {
--background-image: linear-gradient(to bottom, #00542d, #00542d) !important;
}
#globalheader {
position: absolute;
margin-top: 36% !important;
margin-left: 13% !important;
width: 75% !important;
}
#globalheader ul {
margin-left:-15px;
}
#game_scroll_loading {
height:25%;
background-color: transparent;
position: fixed;
z-index: 1000000;
bottom: 50%;
display:none;
margin-left: 45%;
}

.ads_left {
width: 120px;
height: 445px;
position: fixed;
margin-top: 70px;
margin-left: 15px;
}
.ads_right {
width: 160px;
height: 490px;
position: fixed;
margin-top: 22px;
margin-left: 87%;
}
.footer_scroll {
display:none !important;
}
.header_pagination {
margin-left: 50% !important;
width: 35% !important;
margin-top: -20px;
}
.submenu_default_width ul li{
	z-index:100000;	
}
.google_ads_left {
	position:fixed;
	margin-left: 15px;
	margin-top: 22px
}
</style>
<script type="text/javascript" src="/js/game/search.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//set the header
	$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #464444, #000000)")
	//end
})
.on('mouseover','.game_thumbs',function(){	$(this).tooltip()})
</script>
<?php require_once 'application/models/common_model.php'; ?>
</head>
<!-- start wrapper -->
<body class="game_index_wrapper">


<div class='google_ads_left'>
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
</div>
<!-- end ads left -->


<!--start ads right  -->
<div class="ads_right">
<!--- Script ANTS - 160x600 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
<!--- end ANTS Script -->
</div>
<!-- end ads right -->

<table id="game_wrapper_table">								
<tr>
<td id="game_header_category_item" colspan="9"><span></span></td>
</tr>
<?php $condition = empty($game_index) || !is_array($game_index) ? 0 : count($game_index); ?>
<?php if ($condition) {
$loop = -1;
foreach ($game_index as $key) {                    
$loop++; ?>
<?php if ($loop && $loop % 6 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" id=<?=$key['ID']?> valign="top" width="<?php echo 100 / 6 ?>%">
<?php if ($key["THUMBS"]) { ?>
<!-- start game item wrapper -->
<a style="color:rgb(255,255,255)" title="<?= $key['NAME'] ?>" href="http://myweb.pro.vn/choi-game?id=<?=$key['ID']?>">
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
<img class="game_thumbs" onerror="this.src='http://xahoihoctap.net.vn/images/game_icon_err.jpg'" title="<?= $key['NAME'] ?>" alt="<?= $key['NAME'] ?>" src="<?= $key['THUMBS'] ?>" >
<div class="div_clear_both"></div>
<span><?=common_model::highlightWords($key['NAME'], $search_key)?></span>
<button id="game_item_<?= $key['ID'] ?>" data_embed="<?=$key['EMBED_TYPE']?>" data-id="<?= $key['ID'] ?>"  data-name="<?= $key['NAME'] ?>"  data-href="<?= $key['EMBED_PATH'] ?>" class="game_list btn btn-primary" >Chơi ngay</button>
<input type="hidden" class="game_description" value='<?=$key['NAME']?>'/>            
</div>
</a>
<!-- end game item wrapper -->
<?php } ?>
</td>
<?php }
} ?>
</tr>
<tr>
</tr>
</table>
<ul class="breadcrumb">
			<li class="active footer_pagination"><?=$pagination?></li>
</ul>
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
<!-- end wrapper -->
</html>