<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>

<!-- start meta -->
<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="http://myweb.pro.vn<?=$thumbs?>" />
<meta property="og:type" content="game" />
<meta property="og:description" content="<?=$description?>" />
<!-- end meta  -->
<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
<link  rel="stylesheet" type="text/css" href="/css/game_key.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/css/game/frame.css" >
<link rel="canonical" href="http://myweb.pro.vn/play/?id=<?=$id?>" />

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
#frame_bottom_ads {
margin-left: 15px;
margin-top: 60px;
}
</style>
<script type="text/javascript" src="/js/game/search.js"></script>
<script type="text/javascript">
window.onload=function(){
//remove unused header
	$("#gameFrame").contents().find('#Menu').remove()
	$("#gameFrame").contents().find('#ved_section2').remove()
//end
}
$('body').mousemove(function(){
//remove unused header
	$("#gameFrame").contents().find('#Menu').remove()
	$("#gameFrame").contents().find('#ved_section2').remove()
//end
})
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

$(document)
//start ready function
.ready(function(){
//remove unused header
	$("#gameFrame").contents().find('#ved_section2').remove()
	$("#gameFrame").contents().find('#Menu').remove()
//end

//set the header
$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #00542d, #00542d)")
//end

//fix game key style from outer reference
var EXTRA_STYLE="<?=$EXTRA_STYLE?>";
if(EXTRA_STYLE=="1"){
$("#game_key").attr("style","background-color:white;height:auto")
}
//end

//start tooltip
$("#btn_add_to_my_game,#flash_game_video").tooltip({
placement:'left'
})
//end

//start fix ads UI
var ads_top=$(".key_description").height();
ads_top=ads_top+50
$(".game_ads_wrapper").attr("style","margin-top:"+ads_top+"px")
//end fix ads UI


var desc_fix_ui="<?=$style?>", player_style="<?=$player_style?>";
//start fix left description UI error
if(desc_fix_ui == "0"){}
else {
$('.key_description').attr('style',"<?=$style?>")
}

if(player_style!= ''){
$("#gameFrame").attr('style',"<?=$player_style?>")
}
//end fix left description UI error

//hide description if width 99%
if($("#gameFrame").css("width")=="1282px"){
	$(".game_ads_wrapper,.key_description").remove()
	$(".chat_comment").attr('style','margin-top:60%!important')
}
//end 

//game video
$("#flash_game_video").click(function(){
$("#youtube_video_game")
.modal("show")
.find('iframe').attr('src',$(this).attr('data-src'))	
})
//hide bing translator widget
$("body").mouseover(function(){
$("#WidgetFloaterPanels").next().remove();
})
//end
})
//end ready function
$(window).scroll(show_ads)
function show_ads(){
	var bottom_ads=$('.ads_header_wrapper').html()
	if($("#frame_bottom_ads").find('ins').length=="0"){
		//write some code here
	}
	if($("#frame_bottom_ads").find('.adsbygoogle').length=="1"){
		if($("#gameFrame").css("width")=="1282px"){
			$('.chat_comment').attr('style','margin-top:72%!important')
		}
	}

}
</script>
</head> 
<body>

<div class="game_header">
<span id="flash_game_video"  title="Xem video của game này" data-src="<?=$game_video?>" class="game_video_icon fa fa-youtube-square fa-3x"></span>
<span class="game_thumbs"><img title="<?=$title?>" alt="<?=$title?>" src="<?=$thumbs?>"></span>
<span class="game_name"><a id="category-link" href="/game/play?id_category=<?=$category_id?>" target="new"><?=$category_name?></a> <i class="fa fa-long-arrow-right"></i> <?=$title?></span>
<div class="fb-like" data-href="http://myweb.pro.vn/play/?id=<?=$id?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div data-size="medium" class="g-plusone"></div>

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

<!--start header ads -->
<div class="ads_header_wrapper">
</div>
<!--end header ads -->

<div class="game_wrapper">
<button id="btn_add_to_my_game" title="Tạo một danh sách các game ưa thích của bạn" class="btn btn-primary">Thêm vào game yêu thích</button>
<!-- start left ads-->
<div class="game_ads_wrapper">
</div>
<!-- end left ads -->

<!--start div key_description-->
<div class="key_description">

<ul class="nav nav-tabs" role="tablist" id="key_description">
<li class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
<li><a href="#game_key" role="tab" data-toggle="tab">Cách chơi</a></li>
<!--<li id="chat_is_login"><a href="#chat" role="tab" data-toggle="tab">Chat</a></li>-->
</ul>

<div class="tab-content">
<div class="tab-pane  fade in active description" id="description"><?=$description?></div>

<div class="tab-pane fade game_key" id="game_key"><?=$key?></div>
<!--<div class="tab-pane fade chat" id="chat"></div>   -->
</div>

</div>
<!--end div key_description-->

<!--start div chat_comment-->
<div class="chat_comment">
<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="#comment" role="tab" data-toggle="tab">Bình luận</a></li>
<li><a href="#game_related" role="tab" data-toggle="tab">Game liên quan</a></li>
</ul>

<div class="tab-content">
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="auto"  data-href="http://myweb.pro.vn/play/?id=<?=$id?>"  data-numposts="5" data-colorscheme="light"></div>
<!--<div class="tab-pane fade" id="chat"></div>-->

<div class="tab-pane fade game_key" id="game_related">	
<table id="table_related">
<tr>
<?php foreach($array_related_output as $key):?>
<td style="cursor: pointer" align="center" valign="top" width="12.5%">
<div>									
<a href="/play?id=<?=$key['ID']?>">
<img width="85px" height="80px" class="game_thumbs" data-id="<?=$key['ID']?>" title="<?php echo $key['NAME']?>" alt="<?php echo $key['NAME']?>" src="<?=$key['THUMBS']?>"/>
<div class="div_clear_both"></div>
<span><?php echo $key['NAME']?></span>
</a>
</div>
</td>
<?php endforeach;?>
</tr>
</table>
</div>

</div>

</div>
<!--end div chat_comment-->

<iframe src="<?=$embed_src?>" scrolling="no" frameborder="0" allowtransparency="true" id="gameFrame" name="gameFrame"></iframe>
<div id="frame_bottom_ads"></div>
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
<input type="hidden" id="game_id" value="<?=$id?>"/>
<input type="hidden" id="is_log" value="<?=$is_log?>" />
</html>
