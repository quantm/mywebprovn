<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>

<!-- start meta -->
<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="http://myweb.pro.vn<?=$thumbs?>" />
<meta property="og:type" content="game" />
<meta property="og:url" content="http://myweb.pro.vn/choi-game?id=<?=$id?>" />
<meta property="og:description" content="<?=$description?>" />
<meta name="description" content="<?=$description?>" />
<!-- end meta  -->

<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>  
<link  rel="stylesheet" type="text/css" href="/css/game_key.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/css/game/flash.css" >
<link rel="canonical" href="http://myweb.pro.vn/play/?id=<?=$id?>" />

<style>
.game_category img {
	border-radius: 3px 3px 3px 3px;
	margin-left: 6%;
	margin-top: 5px;
	width:45px;
	height:34px;
}
.game_category {
	float: right;
	width: 160px;
	margin-top:41px;
	position: fixed;
	margin-left: 88%;
	line-height: 0.5px;
	font-size: 13px;
	height: 600px;
	overflow: hidden;
}
.game_category a:link {
	margin-left: 15px;
	color: #d90000;
	margin-top: 25px;
	position: absolute;
	text-decoration: none!important;
}
.social_shared {
float:right;
}
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
$.fn.flash = function(duration, iterations) {
    duration = duration || 1000; // Default to 1 second
    iterations = iterations || 1; // Default to 1 iteration
    var iterationDuration = Math.floor(duration / iterations);

    for (var i = 0; i < iterations; i++) {
        this.fadeOut(iterationDuration).fadeIn(iterationDuration);
    }
    return this;
}

$(document)
//start ready function
.ready(function(){

//disable flex context menu
$("body,object,embed").bind("contextmenu",function(){
return false;
}); 
//end

//hightlight the adsvertisement
$('#ads_zone16553').flash(1500,6);
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

<!-- start game category-->
<div class='game_category'>
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/519993167.js"></script>
</div>
<!-- -end game category->

<!--start header ads -->
<div class="ads_header_wrapper">
</div>
<!--end header ads -->

<!-- start game_wrapper -->
<div class="game_wrapper">
<!-- start game header-->
<div class="game_header">
<span class="game_name"><a id="category-link" href="/game/play?id_category=<?=$category_id?>" target="new"><?=$category_name?></a> <i class="fa fa-long-arrow-right"></i> <?=$title?></span>

<!--  start social shared-->
<div class='social_shared'>
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
<!-- end social shared-->
</div>
<!-- end  game header-->

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


<!-- start game object -->
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
<!-- end game object -->


<!--start div chat_comment-->
<div class="chat_comment">
<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="#comment" role="tab" data-toggle="tab">Bình luận</a></li>
<li><a href="#game_related" role="tab" data-toggle="tab">Liên quan</a></li>
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
<img width="85px" height="80px" class="game_thumbs" data-id="<?=$key['ID']?>" title="<?php echo $key['NAME']?>" alt="<?php echo $key['NAME']?>" src="<?=$key['THUMBS']?>" onerror="this.src='http://xahoihoctap.net.vn/images/game_icon_err.jpg'"/>
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

<!-- ads-micro-right-->
	<div id="frame_right_ads">
	<!--- Script ANTS - 160x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
	<!--- end ANTS Script -->
</div>
<!-- end-->



<!-- end game_wrapper -->
</body> 
<input type="hidden" id="game_id" value="<?=$id?>"/>
<input type="hidden" id="is_log" value="<?=$is_log?>" />
</html>
