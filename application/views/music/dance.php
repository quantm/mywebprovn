<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- start meta -->
<meta property="og:title" content="Nhạc dance" />
<meta property="og:image" content="http://nhacdance.net/images/music-disco-vector1.jpg" />
<meta property="og:type" content="music.playlist" />
<meta property="og:description" content="Tuyển tập nhạc dance" />
<!-- end meta  -->	
<link rel="canonical" href="http://myweb.pro.vn/music/dance/"> 
<script language="JavaScript1.2" type="text/JavaScript">

//Kissing trail- By dij8 (dij8@dij8.com)
//Modified by Dynamic Drive for bug fixes
//Visit http://www.dynamicdrive.com for this script

kisserCount = 45 //maximum number of images on screen at one time
curKisser = 0 //the last image DIV to be displayed (used for timer)
kissDelay = 5000 //duration images stay on screen (in milliseconds)
kissSpacer = 100 //distance to move mouse b4 next heart appears
//theimage = "/images/effect/lips_small.gif" //the 1st image to be displayed
var theimage="";
if($(".user_avatar").attr('src') !=''){
//theimage=$(".user_avatar").attr('src');
theimage = "/images/effect/lips_small.gif";
$(".album_cover").attr('src',$(".user_avatar").attr('src'))
}
if($(".user_avatar").length == "0") {
theimage = "http://nhacdance.net/images/dance2.gif";
}
theimage2 = "http://nhacdance.net/images/D17.gif" //the 2nd image to be displayed

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
<script language="JavaScript1.2" type="text/JavaScript" src="/js/music.js"></script>
<script language="JavaScript1.2" type="text/JavaScript" >
$(document).ready(function(){
$(".navbar-inner").attr("style","background-image: linear-gradient(to bottom, #5C5555, #000000);")
kissbegin()
})
</script>
<style>
.kisser {
position:absolute;
top:0;
left:0;
visibility:hidden;
}
#france_music {
margin-top: 4%;
margin-left: 25%;
z-index:1000000000;
}
.ads_left {
position:fixed;
width:300px;
height:250px;
margin-left: 77%;
margin-top: 25px;
}
.music_wrapper {
position:absolute;
display:block;
margin-top: -30px;
margin-left: 15%;
}
body{
background:url("http://myweb.pro.vn/images/background/dance_bgcenter.gif");;
}
embed {
width: 550px;
height: 500px;
margin-top: 16%;
margin-left: 10%;
}

.fb-like {
margin-top:15%;
}
.fb-share-button {
margin-bottom:5px;
}

.social_like {
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #060101));
background: -moz-linear-gradient(top, #fff, #F9F9F9);
border: 1px solid #ccc;
float: left;
padding: 0 0 3px 0;
position: fixed;
bottom: 55%;
left: 125px;
z-index: 10;
border-radius: 2px 2px 2px 2px;
box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
width: 100px;
height: 222px;
margin-top: 20%;
}

.social_like div, #twitter-widget-0 {
margin-left: 15px !important;
}
#___plusone_0{
margin-top:2px !important;
}
#comment {
margin-left: 32.5%;
}
.album_cover
{
margin-left: 29%;
margin-top: 85px;
position: absolute;
z-index: 100;
width:118px;
height:100px;
}
.ads_ants {
position: absolute;
margin-top: 300px;
margin-left: 200px;
z-index: 100000;
}
body {
overflow:hidden;
}
</style>
</head>

<body>
<img class="album_cover" src="http://nhacdance.net/images/dance2.gif"/>


<!--start--><div class="ads_ants">
<!--- Script ANTS - 300x250 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="530580154" data-ants-zone-id="530580154"></div>
<!--- end ANTS Script -->
<!--//end--></div>

<div class="music_wrapper">
<div id="france_music">
<object width="300" height="400" align="middle" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">

<param value="http://nhacdance.net/xspf_player.swf?album=off?&autoload=1&shuffle=1&autoplay=1&skin_mode=on&button_color=FFFFFF&txt_color=FFFFFF&playlist_url=http://nhacdance.net/upload/playlist_generator.php&main_image=images/dance2.gif" name="movie">
<param value="high" name="quality">
<param value="#000000" name="bgcolor">
<embed width="300" height="320" align="middle" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="sameDomain" name="xspf_player" bgcolor="#000000" quality="high" src="http://nhacdance.net/xspf_player.swf?album=off?&autoload=1&shuffle=1&autoplay=1&skin_mode=on&button_color=FFFFFF&txt_color=FFFFFF&playlist_url=http://nhacdance.net/upload/playlist_generator.php&main_image=images/dance2.gif">
</object>
</div>

</div>
</body>
</html>
