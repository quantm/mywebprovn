<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
<!-- start meta -->
<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="http://myweb.pro.vn<?=$thumbs?>" />
<meta property="og:type" content="game" />
<meta property="og:url" content="http://myweb.pro.vn/play/?id=<?=$id?>" />
<meta property="og:description" content="<?=$description?>" />
<!-- end meta  -->

<!-- start style -->
<link rel="canonical" href="http://myweb.pro.vn/play/?id=<?=$id?>" />
<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
<link  rel="stylesheet" type="text/css" href="/css/game_key.css"/>
<link  rel="stylesheet" type="text/css" href="/css/game/flash.css"/>
<style>
.game_video_icon {
float: right;
<?=$is_video?>
position: absolute;
margin-left: 96.5%;
color:rgb(226, 20, 20);
cursor:pointer;
margin-top: 4px;
}
</style>
<!-- end style -->

<script type="text/javascript" src="/js/game/search.js"></script>
<script>
$(function() {
var projects = [
<?php foreach($game as $auto_key):?> 
{
value: "<?=$auto_key['NAME']?>",
label: "<?=$auto_key['NAME']?>"
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
$(document).ready(function(){

//set the header
$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #464444, #000000)")
//end

var desc_fix_ui="<?=$style?>", player_style="<?=$player_style?>";

//open related game
$("#table_related img").click(function(){
windown.open("http://myweb.pro.vn/play?id="+$(this).attr("data-id"),"new")
})
//end open related game

//firefox fix UI
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){

}
//end firefox fix UI


//start fix ads UI
var ads_top=$(".key_description").height();
ads_top=ads_top+75
$(".game_ads_wrapper").attr("style","margin-top:"+ads_top+"px")
//end fix ads UI

//start fix left description UI error
if(desc_fix_ui == "0"){}
else {
	$('.key_description').attr('style',"<?=$style?>")
}

if(player_style!= ''){
	$("#game_embed").attr('style',"<?=$player_style?>")
}
//end fix left description UI error

//game video
	$("#flash_game_video").click(function(){
		$("#youtube_video_game")
		.modal("show")
		.find('iframe').attr('src',$(this).attr('data-src'))	
	})
	//end


if($("#game_id").val()=="178"){window.open("http://myweb.pro.vn/play/c15_178","_self")}
if($("#game_id").val()=="4"){
	$('.game_wrapper').attr('style','height:150%')
	$('.game_ads_wrapper').attr('style','margin-top:300px')
}
$("#flash_game_video,#btn_add_to_my_game").tooltip({
placement:'left'
})
$("#category-link").tooltip({
  title:"Click để xem tất cả game thuộc danh mục này",
  placement:"bottom"
})

$("#modal_login .modal-footer .btn-facebook").click(function(){

})

$("#modal_login .modal-header button").click(function(){
$(".list_chat").hide();
})

$("#chat_is_login").click(function(){
if($("#is_log_in").val()=="0"){
$(".list_chat").hide();
$("#modal_login .modal-header h4").html("Bạn cần đăng nhập hoặc kết nối facebook để chat")
$("#modal_login .modal-footer .btn-twitter").hide()
$("#modal_login .modal-footer .btn-google").hide()
$("#modal_login").modal("show")
$("#unityPlayer").hide()
}
})
var game_height=parseInt($("#game_embed").css('height').replace('px',''))
game_height=game_height+15;
$(".chat_comment").attr("style","margin-top:"+game_height+"px")
})
</script>

</head> 
<body>
<!--start game header -->
<div class="game_header">
<span id="flash_game_video"  data-src="<?=$game_video?>" class="game_video_icon fa fa-youtube-square fa-3x"></span>
<span class="game_thumbs"><img title="<?=$title?>" alt="<?=$title?>" src="<?=$thumbs?>"></span>
<span class="game_name"><a id="category-link" href="/game/play?id_category=<?=$category_id?>" target="new"><?=$category_name?></a> <i class="fa fa-long-arrow-right"></i> <?=$title?></span>
<div class="fb-like" data-href="http://myweb.pro.vn/play/?id=<?=$id?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div  data-size="medium" class="g-plusone"></div>

<!-- Đặt thẻ này sau thẻ Nút +1 cuối cùng. -->
<script type="text/javascript">
window.___gcfg = {lang: 'vi'};

(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/platform.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
</div>
<!-- end game header -->

<!--start header ads -->
<div class="ads_header_wrapper">
</div>
<!--end header ads -->


<!-- start game_wrapper -->
<div class="game_wrapper">
<button id="btn_add_to_my_game" title="Tạo một danh sách các game ưa thích của bạn" class="btn btn-primary">Thêm vào game của tôi</button>

<!-- start ads-->
<div class="game_ads_wrapper">
</div>
<!-- end ads -->

<!--start div key_description_chat-->
<div class="key_description">

<ul class="nav nav-tabs" role="tablist" id="key_description">
<li class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
<li><a href="#game_key" role="tab" data-toggle="tab">Cách chơi</a></li>
<!--<li id="chat_is_login"><a href="#chat" role="tab" data-toggle="tab">Chat</a></li>-->
</ul>

<div class="tab-content">
<div class="tab-pane  fade in active description" id="description">
<?=$description?>
</div>

<div class="tab-pane fade game_key" id="game_key">
<?=$key?>
</div>

<!--
<div class="tab-pane fade chat" id="chat">
</div>   
-->
</div>

</div>
<!--end div key_description_chat-->

<!--start div comment-->
<div class="chat_comment">
<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="#comment" role="tab" data-toggle="tab">Bình luận</a></li>
<li><a href="#game_related" role="tab" data-toggle="tab">Game liên quan</a></li>
</ul>

<div class="tab-content">
<div id="comment" class="fb-comments tab-pane fade in active" data-width="auto"  data-href="http://myweb.pro.vn/play/?id=<?=$id?>"  data-numposts="5" data-colorscheme="dark"></div>

<div class="tab-pane fade game_key" id="game_related">	
<table id="table_related">
<tr>
<?php foreach($array_related_output as $key):?>
<td style="cursor: pointer" align="center" valign="top" width="12.5%">
<a href="/play?id=<?=$key['ID']?>">
<div class="game_div_item">									
<img width="85px" height="80px" class="game_thumbs" data-id="<?=$key['ID']?>" title="<?php echo $key['NAME']?>" alt="<?php echo $key['NAME']?>" src="<?=$key['THUMBS']?>"/>
<div class="div_clear_both"></div>
<span><?php echo $key['NAME']?></span>
</div>
</a>
</td>
<?php endforeach;?>
</tr>
</table>
</div>

</div>

</div>
<!--end div comment-->

<object 
classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
codebase="http://fpdownload.adobe.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"> 
<param name="movie" value="<?=$embed_src?>" /> 
<param name="play" value="true"/> 
<param name="allowscriptaccess" value="sameDomain">
<param name="quality" value="high"/> 
<embed wmode="direct" id="game_embed"  src="<?=$embed_src?>" 
pluginspage="http://www.adobe.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash"> 
</embed> 
</object>
</div>

 <!-- game video -->
<div class="modal hide fade" id="youtube_video_game">
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
<!-- end game video -->
<!--end game wrappper-->

<!--start modal-->
<div class="modal hide fade" style="margin-top:-10px" id="add_game_success">
<div class="modal-header"></div>
<div class="modal-body">
<h3>Đã thêm vào danh sách game của bạn </h3>
</div>
<div class="modal-footer">
<button type="button"  data-dismiss="modal"  class="btn btn-primary">Đóng</button>
</div>        
</div>
<!--end modal-->

</body>
<input type="hidden" id="is_log" value="<?=$is_log?>" />
<input type="hidden" id="game_id" value="<?=$id?>"/>
</html>
