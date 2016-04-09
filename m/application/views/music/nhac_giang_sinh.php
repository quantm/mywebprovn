<html>
<head>
<!-- start meta -->
<meta property="og:title" content="Nhạc giáng sinh" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/Love-Wallpaper-love.png" />
<meta property="og:type" content="music.playlist" />
<meta property="og:description" content="Tuyển tập những tình khúc bất hủ vượt thời gian" />
<!-- end meta  -->	
<link rel="canonical" href="http://myweb.pro.vn/music/giangsinh/" />
<script language="JavaScript1.2" type="text/JavaScript">

//Kissing trail- By dij8 (dij8@dij8.com)
//Modified by Dynamic Drive for bug fixes
//Visit http://www.dynamicdrive.com for this script

kisserCount = 15 //maximum number of images on screen at one time
curKisser = 0 //the last image DIV to be displayed (used for timer)
kissDelay = 1000 //duration images stay on screen (in milliseconds)
kissSpacer = 50 //distance to move mouse b4 next heart appears
//theimage = "/images/effect/lips_small.gif" //the 1st image to be displayed
var theimage="";
if($(".user_avatar").attr('src') !=''){
//theimage=$(".user_avatar").attr('src');
theimage = "/images/effect/lips_small.gif";
$(".album_cover").attr('src',$(".user_avatar").attr('src'))
}
if($(".user_avatar").length == "0") {
theimage = "/images/effect/santa_christamas.png";
}
theimage2 = "/images/effect/small_heart.gif" //the 2nd image to be displayed

//Browser checking and syntax variables
var docLayers = (document.layers) ? true:false;
var docId = (document.getElementById) ? true:false;
var docAll = (document.all) ? true:false;
var docbitK = (docLayers) ? "document.layers['":(docId) ? "document.getElementById('":(docAll) ? "document.all['":"document."
var docbitendK = (docLayers) ? "']":(docId) ? "')":(docAll) ? "']":""
var stylebitK = (docLayers) ? "":".style"
var showbitK = (docLayers) ? "show":"visible"
var hidebitK = (docLayers) ? "hide":"hidden"
var ns6=document.getElementById&&!document.all
//Variables used in script
var posX, posY, lastX, lastY, kisserCount, curKisser, kissDelay, kissSpacer, theimage
lastX = 0
lastY = 0


//start hide effect where hove mouse over the playlist
$("object").mouseover(function(){
	$(".kisser").hide()
})
//end
//Collection of functions to get mouse position and place the images
function doKisser(e) {

  posX = getMouseXPos(e)
  posY = getMouseYPos(e)
  if (posX>(lastX+kissSpacer)||posX<(lastX-kissSpacer)||posY>(lastY+kissSpacer)||posY<(lastY-kissSpacer)) {
    showKisser(posX,posY)
    lastX = posX
    lastY = posY
  }
}
// Get the horizontal position of the mouse
function getMouseXPos(e) {
  if (document.layers||ns6) {
    return parseInt(e.pageX+10)
  } else {
    return (parseInt(event.clientX+10) + parseInt(document.body.scrollLeft))
  }
}
// Get the vartical position of the mouse
function getMouseYPos(e) {
  if (document.layers||ns6) {
    return parseInt(e.pageY)
  } else {
    return (parseInt(event.clientY) + parseInt(document.body.scrollTop))
  }
}
//Place the image and start timer so that it disappears after a period of time
function showKisser(x,y) {
  var processedx=ns6? Math.min(x,window.innerWidth-75) : docAll? Math.min(x,document.body.clientWidth-55) : x
  if (curKisser >= kisserCount) {curKisser = 0}
  $("#kisser"+curKisser).attr('style',"visibility:"+showbitK+";"+"top:"+y+"px;"+"left:"+processedx+"px")
  if (eval("typeof(kissDelay" + curKisser + ")")=="number") {
    eval("clearTimeout(kissDelay" + curKisser + ")")
  }
  eval("kissDelay" + curKisser + " = setTimeout('hideKisser(" + curKisser + ")',kissDelay)")
  curKisser += 1
	 //console.log(x)
	 //console.log(y)
 }
//Make the image disappear
function hideKisser(knum) {
  eval(docbitK + "kisser" + knum + docbitendK + stylebitK + ".visibility = '" + hidebitK + "'")
}

function kissbegin(){
//Let the browser know when the mouse moves
if (docLayers) {
  document.captureEvents(Event.MOUSEMOVE)
  document.onMouseMove = doKisser
} else {
  document.onmousemove = doKisser
}
}

// Add all DIV's of hearts
if (document.all||document.getElementById||document.layers){
	for (k=0;k<kisserCount;k=k+2) {
	  document.write('<div id="kisser' + k + '" class="kisser"><img src="' + theimage + '" alt="" border="0"></div>\n')
	  document.write('<div id="kisser' + (k+1) + '" class="kisser"><img src="' + theimage2 + '" alt="" border="0"></div>\n')
	}
}
</script>
<script language="JavaScript1.2" type="text/JavaScript" >
$(document).ready(function(){
	$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #CEDBF7, #0E1625)")
	if($(".user_avatar").length=='1'){
		$(".album_cover").attr('src',$(".user_avatar").attr('src'))
	}
	kissbegin()
})
</script>
<script language="JavaScript1.2" type="text/JavaScript" src="/js/music.js"></script>
<style>
#comment {
margin-left: 10%;
position:absolute;
}
.social_like {
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #F9F9F9));
background: -moz-linear-gradient(top, #fff, #F9F9F9);
border: 1px solid #ccc;
float: left;
padding: 0 0 3px 0;
position: fixed;
bottom: 23%;
left: 0;
z-index: 10;
border-radius: 2px 2px 2px 2px;
box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
width: 100px;
height:222px;
margin-left:22%;
margin-top: 20%;
}


#___plusone_0{
margin-top:2px !important;
}

#main_table_tinhkhucbathu {
margin-top:-3%;
margin-left:25%;
position:absolute;
z-index:50;
}
body{
background:url("http://myweb.pro.vn/images/background/christmas.jpg") center top fixed !important;;
}
embed {
width: 550px;
height: 500px;
margin-top: 16%;
margin-left: 10%;
}

.fb-like {
margin-top:10%;
}
.fb-share-button {
margin-bottom:5px;
}
h1 {
  color:#cc3333;
  font-family:"Comic Sans MS",Helvetica;
}
h3 {
  color:#993333;
  font-family:"Comic Sans MS",Helvetica;
}
.kisser {
  position:absolute;
  top:0;
  left:0;
  visibility:hidden;
}
.ads_left {
position:fixed;
width:300px;
height:250px;
margin-left: 77%;
margin-top: 25px;
}
.album_cover
{
margin-left: 30%;
margin-top: 85px;
position: absolute;
z-index: 100;
width:118px;
height:100px;
}
</style>


</head>
<body>

<img class="album_cover" src="/images/effect/santa_christamas.png"/>

<!-- start ads left -->
<div class="ads_left">
</div>
<!-- end ads left -->

<!-- start social like -->
<div class="social_like">
<div class="fb-like" data-href="http://myweb.pro.vn/music/giangsinh/" data-layout="box_count" data-action="like" data-width="400px" data-height="100px" data-show-faces="true" data-share="false"></div>

<div class='clr'></div>

<div class="fb-share-button" data-layout="box_count" data-width="200px" data-height="100px" data-href="http://myweb.pro.vn/music/giangsinh/"></div>

<div class='clr'></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->

<div class='clr'></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div class="g-plusone" data-size="medium"></div>

</div>
<!-- end social like -->

<table id="main_table_tinhkhucbathu">
<td>
<object width="300" height="400" align="middle" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
<param value="http://cakhucbathu.com/christmas/xspf_player.swf?playlist_url=http://cakhucbathu.com/christmas/upload/playlist_generator.php&autoload=true&autoplay=true&shuffle=true" name="movie">
<param value="high" name="quality">
<param value="#743131" name="bgcolor">
<embed width="300" height="400" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="sameDomain" name="xspf_player" bgcolor="#e6e6e6" quality="high" src="http://cakhucbathu.com/christmas/xspf_player.swf?playlist_url=http://cakhucbathu.com/christmas/upload/playlist_generator.php&autoload=true&autoplay=true&shuffle=true">
</object>
<div id="comment" class="fb-comments tab-pane  fade in active" data-width="auto"  data-href="http://myweb.pro.vn/music/giangsinh/"  data-numposts="5" data-colorscheme="dark"></div>
</td>
</table>	
</body>
</html>
