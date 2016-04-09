<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$title?></title>
<meta content='<?=$title?>' property="og:title"/>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link  rel="stylesheet" type="text/css" href="/css/game/game_item.css"/>
<link rel="author" href="https://plus.google.com/+TranKing" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="/js/game/UnityObject2.js"></script> 
<script type="text/javascript">	
$(document).ready(function(){
$('.navbar').attr('style','position:absolute')
})
var params = {
backgroundcolor: "#FFFFFF",
bordercolor: "#E9E6E6",
textcolor: "#E9E6E6",
logoimage: "http://myweb.pro.vn/images/GAME_LOADING.png",
progressbarimage: "http://myweb.pro.vn/images/ajax_load_green.gif",
progressframeimage: "http://myweb.pro.vn/images/logo_register.gif",
width:"<?=$w ?>",
height: "<?=$h ?>"
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
break;
case "first":
$(".logo_register").hide();
break;
}
});
jQuery(function()	{
u.initPlugin(jQuery("#unityPlayer")[0], "<?=$embed_src ?>");
});
</script>
<style>
.game_item_wrapper {
display: block;
margin-top: -35px;
height: 100%;
position: absolute;
width: 87%;
}
#unityPlayer {
width: 100%;
margin-bottom: 5px;
margin-top: 66px;
display: block;
position: absolute;
margin-left: 0px;
}
.game_ads_unity {
margin-top: 65px !important;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#globalheader").attr('style','width:87% !important;margin-top: 51% !important;position:absolute')
	$("#globalnav")
	.attr('style','margin-left: 15% !important;')	
	.append('<li><span class="footer_span"><a target="_new" href="/guide/game_unity">Hướng dẫn cài Unity Web Player</a></span></li>')
})
</script>
</head>
<body>	
<div class="game_item_wrapper">

<!-- start ads -->
<div class="game_ads_unity">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ebook_index_right -->
<ins class="adsbygoogle"
style="display:inline-block;width:120px;height:600px"
data-ad-client="ca-pub-1996742103012878"
data-ad-slot="7122101086"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads -->
<!-- start unity -->
<div id="unityPlayer">
<!-- start missing -->
<div class="missing">
<a title="Unity Web Player. Install now!" href="http://unity3d.com/webplayer/">
<img class="unity_not_found" alt="Unity Web Player. Install now!" src="/images/getunity.png" width="193" height="63">
</a>
<h5>Vui lòng xem video hướng dẫn bên dưới.<font color=red> Click để cài Unity Web Player</font></h5><br />
<!--<img src="/images/idm.png"/>-->
<iframe class="guide_video" src="//www.youtube.com/embed/5BOVXHBwh44" frameborder="0" allowfullscreen></iframe>
</div>
<!-- end missing -->
</div>
<!-- end unity -->
</div>
<? $this->load->view('footer')?>
</body>
</html>

