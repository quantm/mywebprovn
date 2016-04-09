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
margin-left: -10%;
}

.ads_left {
width: 120px;
height: 445px;
position: fixed;
margin-top: 70px;
margin-left: 15px;
}
.ads_right {
width: 120px;
height: 445px;
position: fixed;
margin-top: 50px;
margin-left: 90%;
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
</style>
<script type="text/javascript" src="/js/game/search.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#globalnav").append('<li><span class="footer_span"><a target="_new" href="/guide/game_unity">Hướng dẫn cài Unity Web Player</a></span></li>')
	//$(".game_thumbs").tooltip()
	//set the header
	$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #464444, #000000)")
	//end
})
.on('mouseover','.game_thumbs',function(){	$(this).tooltip()})
</script>
<script>
$(function() {
var projects = [
<?php foreach($game as $key):?> 
{
value: "<?=$key['NAME']?>",
label: "<?=$key['NAME']?>"
},
<?php endforeach;?>
];

$( "#search" ).autocomplete({
minLength: 0,
source: projects,
focus: function( event, ui ) {
$(".fa-search").attr('style','margin-left:305px')
$("#search").attr('style','width:375px')
$( "#search" ).val( ui.item.label );
return false;
},
select: function( event, ui ) {
$( "#search" ).val( ui.item.label );      
$("#game_header_search").submit()
return false;
}
})
});

$(window).scroll(set_scroll);
function set_scroll(){
	$("#globalheader").addClass('footer_scroll')
}
</script>
<?php require_once 'application/models/common_model.php'; ?>
</head>
<!-- start wrapper -->
<body class="game_index_wrapper">
<!-- start social like -->
<div class="social_like">
<div class="clr"></div>
<div class="fb-like" data-href="http://myweb.pro.vn/game/" data-layout="box_count" data-action="like" data-show-faces="true" data-share="false"></div>
<div class="clr"></div>
<div class="fb-share-button" data-layout="box_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/game/"></div>
<div class="clr"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>

<div class="clr"></div>

</div>
<!-- end social like -->

<!-- start ads left -->
<!-- end ads left -->

<!--start ads right  -->
<div class="ads_right">
</div>
<!-- end ads right -->
<div id="mega_main_menu" class="side_menu primary_style-flat icons-left first-lvl-align-left first-lvl-separator-none direction-horizontal fullwidth-enable mobile_minimized-enable dropdowns_animation-anim_5 no-buddypress responsive-enable mega_main_menu">
<div class="menu_holder">
<div class="container-fluid menu_inner">
	<ul id="mega_main_menu_ul" class="breadcrumb mega_main_menu_ul">
	
	<li style="width:225px" class="active dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width">
		<a href="/game/play"/> Danh mục game<a/><span class = "game_count"> (<?=$count_all_game?>)</span>
			<ul class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="dLabel">            				    	
			<li><a class="a_cate_news"  href="/game/">Tất cả game<font class="count_by_category">(<?=$count_all_game ?>)</font></a></a></li>
			<li><a class="a_cate_news" data-type="unity3d"  href="/game?type=unity3d">Unity 3D<font class="count_by_category">(<?=$count_unity_game ?>)</font></a></a></li>                                
			<li><a class="a_cate_news" data-type="flash"  href="/game?type=flash">Flash<font class="count_by_category">(<?=$count_flash_game ?>)</font></a></a></li>
			<?php foreach($category_game as $key):?>	
			<li data-id="<?=$key['ID']?>" >
				<a class="a_cate_news" href="/game?id_category=<?=$key['ID_CATEGORY']?>" ><?=$key['CATEGORY_GAME'] ?><font class="count_by_category">(<?=$key['counting']?>)</font></a>
				<input type="hidden" value="<?=$key['counting']?>"/>                         
			</li>
			<li class="dropdown-divider"></li>                    
			<?php endforeach;?>	
		</ul> 
	</li>

	<span class="divider">/</span>
	<?php if($cate_name_top != ""): ?>
	<li><a id="sub_category" href="#" tabindex="-1"><?=$cate_name_top?></a></li>
	<span class="divider">/</span>
	<?php endif; ?>	
	<li class="header_pagination"><?=$pagination?></li>
	</ul>
</div>
</div>
</div>
<center>
<img id="game_scroll_loading" src="/images/loading/ajax-loader-event-list.gif"/>
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
<!-- start game item wrapper -->
<a style="color:rgb(143,13,13)" title="<?= $key['NAME'] ?>" href="http://myweb.pro.vn/play?id=<?=$key['ID']?>">
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
<img class="game_thumbs" title="<?= $key['NAME'] ?>" alt="<?= $key['NAME'] ?>" src="<?= $key['THUMBS'] ?>" >
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
<? $this->load->view('footer')?>
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