<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- start meta -->
<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="http://myweb.pro.vn<?=$thumbs?>" />
<meta property="og:type" content="game" />
<meta property="og:url" content="http://myweb.pro.vn/choi-game?id=<?=$id?>" />
<meta property="og:description" content="<?=$description?>" />
<meta name="description" content="<?=$description?>" />
<!-- end meta  -->

<!-- start style -->
<link rel="canonical" href="http://myweb.pro.vn/play/?id=<?=$id?>" />
<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>
<link  rel="stylesheet" type="text/css" href="/css/game_key.css"/>
<link type="text/css" rel="stylesheet" media="all" href="/css/game/unity.css" />

<!-- end style -->
<script type="text/javascript" src="/js/game/search.js"></script>
<script type="text/javascript" src="/js/game/UnityObject2.js"></script> 
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

//show ads when user scroll
$(window).scroll(show_ads);
function show_ads(){
}
//end

$(document).ready(function(){

//disable flex context menu
$("body,object,embed").bind("contextmenu",function(){
	//return false;
}); 
//end

//hightlight the adsvertisement
$('#ads_zone16553').flash(1500,3);
//end


$("#li_cach_choi").click(function(){
//start fix ads UI
/*
var ads_top=$(".key_description").height();
ads_top=ads_top+20
$(".adsense_wrapper").attr("style","margin-top:"+ads_top+"px")
*/
//end fix ads UI
})
//fix game key style from outer reference
var EXTRA_STYLE="<?=$EXTRA_STYLE?>";
if(EXTRA_STYLE=="1"){
	$("#game_key").attr("style","background-color:white;height:auto")
}
//end


//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){

}
//end

$("#flash_game_video,#btn_add_to_my_game").tooltip({
placement:'left'
})
$("#category-link").tooltip({
  title:"Click để xem tất cả game thuộc danh mục này",
  placement:"bottom"
})
$("#table_related img").click(function(){
	window.open("http://myweb.pro.vn/play?id="+$(this).attr("data-id"),"new")
})

$("#modal_login .modal-footer .btn-facebook").click(function(){
//$("#unityPlayer").show();
//$(".list_chat").show();
})

$("#modal_login .modal-header button").click(function(){
$("#unityPlayer").show();
$(".list_chat").hide();
})

$("#chat_is_login").click(function(){
if($("#is_log").val()=="0"){
$(".list_chat").hide();
$("#modal_login .modal-header h4").html("Bạn cần đăng nhập hoặc kết nối facebook để chat")
$("#modal_login .modal-footer .btn-twitter").hide()
$("#modal_login .modal-footer .btn-google").hide()
$("#modal_login").modal("show")
$("#unityPlayer").hide()
}
})

//$("#li_game_category").hide()
$("#li_ebook_category").hide()
$("#cate_news").hide()
$("#li_music").hide()
$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #00542d, #00542d)")
$("#show").attr("style","color:white;text-shadow: 0 1px 0 #631C1C;")
$("#register_username").attr("style","color:white;text-shadow: 0 1px 0 #631C1C;")
$("#a_register").attr("style","color:white;text-shadow: 0 1px 0 #631C1C;")

//hide bing translator widget
$("body").mouseover(function(){
$("#WidgetFloaterPanels").next().remove();
})
//end

})
//end ready function
.scroll(function(){
	$("header").attr("style","position:relative;overflow:hidden")
	$(".game_header").attr("style","margin-top:20px")
})

var params = {
backgroundcolor: "#FFFFFF",
bordercolor: "#E9E6E6",
textcolor: "#E9E6E6",
logoimage: "http://myweb.pro.vn/images/game_load.png",
progressbarimage: "https://www.khanacademy.org/images/throbber.gif",
progressframeimage: "",
width:"685px",
height: "575px"
};	

var u = new UnityObject2({ params: params });
u.observeProgress(function (progress) {
var $missingScreen = jQuery(progress.targetEl).find(".missing");
switch(progress.pluginStatus) {
case "unsupported":
showUnsupported();
break;
case "broken":
alert("You will need to restart your browser after installation.");
break;
case "missing":
$missingScreen.find("a").click(function (e) {
e.stopPropagation();
e.preventDefault();
u.installPlugin();
return false;
});
$missingScreen.show();
break;
case "installed":
$missingScreen.remove();
break;tt
case "first":
break;
}
});
jQuery(function()	{
u.initPlugin(jQuery("#unityPlayer")[0], "<?=$embed_src ?>");
});
</script>

</head>
<body>

<!-- ads-micro-right-->
<div id="ads_micro_right">
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
</div>
<!-- end-->

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
</ul>
<div class="description" id="description">
<?=$description?>
<div style="clear:both;height:10px"></div>
<?=$key?>
</div>

</div>
<!--end div key_description-->


<!-- start div unityPlayer--> 
<div id="unityPlayer">
<div class="missing" style="margin-left:-30px">
<a title="Unity Web Player. Install now!" href="http://unity3d.com/webplayer/">
<img class="unity_not_found" alt="Unity Web Player. Install now!" src="/images/getunity.png" width="193" height="63">
</a>
<h5>Vui lòng xem video hướng dẫn bên dưới.<a href="http://webplayer.unity3d.com/download_webplayer-3.x/UnityWebPlayer.exe" target="_new"><font color=red> Click để cài Unity Web Player</font></a></h5><br />
<h5>Đối với trình duyệt Chrome nếu đã cài UnityPlayer mà vẫn bị lỗi vui lòng copy url sau <code>chrome://flags/#enable-npapi</code> và dán vào thanh địa chỉ và Chọn bật NPAPI</font></h5><br />
<div style="position:absolute;margin-top:-60px;margin-left:30px;font-size:30px">Hình minh họa</div> <br>
<img style="margin-left:25px;margin-top:-50px;position:absolute" src="/images//NPAPI.png"/>
<iframe class="guide_video" src="//www.youtube.com/embed/5BOVXHBwh44" frameborder="0" allowfullscreen></iframe>
</div>
</div>	
<!-- end div unityPlayer--> 


<!--start div chat_comment-->
<div class="chat_comment">
<ul class="nav nav-tabs" role="tablist">
<li class="active"><a href="#game_related" role="tab" data-toggle="tab">Game liên quan</a></li>
</ul>

<div class="tab-content">
<!--<div class="tab-pane fade" id="chat"></div>-->
<div class="tab-pane fade fade in active game_key" id="game_related">	
<table id="table_related">
<tr>
<?php foreach($array_related_output as $key):?>
<td style="cursor: pointer" align="center" valign="top" width="12.5%">
<div>									
<a href="/play?id=<?=$key['ID']?>">
<img class="game_thumb" data-id="<?=$key['ID']?>" title="<?php echo $key['NAME']?>" alt="<?php echo $key['NAME']?>" src="<?=$key['THUMBS']?>" onerror="this.src='http://xahoihoctap.net.vn/images/game_icon_err.jpg'"/>
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


<!-- ads-micro-bottom-->
<div class="ads_bottom_wrapper">
	<!--- Script ANTS - 728x90 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324894" data-ants-zone-id="517324894"></div>
	<!--- end ANTS Script -->
</div>
<!-- end-->


</div>
<!-- end game_wrapper -->
</body> 
<input type="hidden" id="game_id" value="<?=$id?>"/>
<input type="hidden" id="is_log" value="<?=$is_log?>" />
</html>
