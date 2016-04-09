<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"><script type="text/javascript">(window.NREUM||(NREUM={})).loader_config={xpid:"VgACVlJSGwAAVVdQAAM="};window.NREUM||(NREUM={}),__nr_require=function(t,e,n){function r(n){if(!e[n]){var o=e[n]={exports:{}};t[n][0].call(o.exports,function(e){var o=t[n][1][e];return r(o?o:e)},o,o.exports)}return e[n].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<n.length;o++)r(n[o]);return r}({1:[function(t,e){function n(t,e,n){n||(n={});for(var r=o[t],a=r&&r.length||0,s=n[i]||(n[i]={}),u=0;a>u;u++)r[u].apply(s,e);return s}function r(t,e){var n=o[t]||(o[t]=[]);n.push(e)}var o={},i="nr@context";e.exports={on:r,emit:n}},{}],2:[function(t){function e(t,e,n,i,s){return u?u-=1:r("err",[s||new UncaughtException(t,e,n)]),"function"==typeof a?a.apply(this,o(arguments)):!1}function UncaughtException(t,e,n){this.message=t||"Uncaught error with no additional information",this.sourceURL=e,this.line=n}function n(t){r("err",[t,(new Date).getTime()])}var r=t("handle"),o=t(6),i=t(5),a=window.onerror,s=!1,u=0;t("loader").features.push("err"),window.onerror=e,NREUM.noticeError=n;try{throw new Error}catch(d){"stack"in d&&(t(1),t(2),"addEventListener"in window&&t(3),window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&t(4),s=!0)}i.on("fn-start",function(){s&&(u+=1)}),i.on("fn-err",function(t,e,r){s&&(this.thrown=!0,n(r))}),i.on("fn-end",function(){s&&!this.thrown&&u>0&&(u-=1)}),i.on("internal-error",function(t){r("ierr",[t,(new Date).getTime(),!0])})},{1:5,2:4,3:3,4:6,5:1,6:14,handle:"D5DuLP",loader:"G9z0Bl"}],3:[function(t){function e(t){r.inPlace(t,["addEventListener","removeEventListener"],"-",n)}function n(t){return t[1]}var r=t(1),o=(t(3),t(2));if(e(window),"getPrototypeOf"in Object){for(var i=document;i&&!i.hasOwnProperty("addEventListener");)i=Object.getPrototypeOf(i);i&&e(i);for(var a=XMLHttpRequest.prototype;a&&!a.hasOwnProperty("addEventListener");)a=Object.getPrototypeOf(a);a&&e(a)}else XMLHttpRequest.prototype.hasOwnProperty("addEventListener")&&e(XMLHttpRequest.prototype);o.on("addEventListener-start",function(t){if(t[1]){var e=t[1];"function"==typeof e?this.wrapped=e["nr@wrapped"]?t[1]=e["nr@wrapped"]:e["nr@wrapped"]=t[1]=r(e,"fn-"):"function"==typeof e.handleEvent&&r.inPlace(e,["handleEvent"],"fn-")}}),o.on("removeEventListener-start",function(t){var e=this.wrapped;e&&(t[1]=e)})},{1:15,2:1,3:14}],4:[function(t){var e=(t(3),t(1)),n=t(2);e.inPlace(window,["requestAnimationFrame","mozRequestAnimationFrame","webkitRequestAnimationFrame","msRequestAnimationFrame"],"raf-"),n.on("raf-start",function(t){t[0]=e(t[0],"fn-")})},{1:15,2:1,3:14}],5:[function(t){function e(t){var e=t[0];"string"==typeof e&&(e=new Function(e)),t[0]=n(e,"fn-")}var n=(t(3),t(1)),r=t(2);n.inPlace(window,["setTimeout","setInterval","setImmediate"],"setTimer-"),r.on("setTimer-start",e)},{1:15,2:1,3:14}],6:[function(t){function e(){o.inPlace(this,s,"fn-")}function n(t,e){o.inPlace(e,["onreadystatechange"],"fn-")}function r(t,e){return e}var o=t(1),i=t(2),a=window.XMLHttpRequest,s=["onload","onerror","onabort","onloadstart","onloadend","onprogress","ontimeout"];window.XMLHttpRequest=function(t){var n=new a(t);try{i.emit("new-xhr",[],n),o.inPlace(n,["addEventListener","removeEventListener"],"-",function(t,e){return e}),n.addEventListener("readystatechange",e,!1)}catch(r){try{i.emit("internal-error",r)}catch(s){}}return n},window.XMLHttpRequest.prototype=a.prototype,o.inPlace(XMLHttpRequest.prototype,["open","send"],"-xhr-",r),i.on("send-xhr-start",n),i.on("open-xhr-start",n)},{1:15,2:1}],7:[function(t){function e(){function e(t){if("string"==typeof t&&t.length)return t.length;if("object"!=typeof t)return void 0;if("undefined"!=typeof ArrayBuffer&&t instanceof ArrayBuffer&&t.byteLength)return t.byteLength;if("undefined"!=typeof Blob&&t instanceof Blob&&t.size)return t.size;if("undefined"!=typeof FormData&&t instanceof FormData)return void 0;try{return JSON.stringify(t).length}catch(e){return void 0}}function n(t){var n=this.params,r=this.metrics;if(!this.ended){this.ended=!0;for(var i=0;u>i;i++)t.removeEventListener(s[i],this.listener,!1);if(!n.aborted){if(r.duration=(new Date).getTime()-this.startTime,4===t.readyState){n.status=t.status;var a=t.responseType,d="arraybuffer"===a||"blob"===a||"json"===a?t.response:t.responseText,f=e(d);if(f&&(r.rxSize=f),this.sameOrigin){var c=t.getResponseHeader("X-NewRelic-App-Data");c&&(n.cat=c.split(", ").pop())}}else n.status=0;r.cbTime=this.cbTime,o("xhr",[n,r])}}}function r(t,e){var n=i(e),r=t.params;r.host=n.hostname+":"+n.port,r.pathname=n.pathname,t.sameOrigin=n.sameOrigin}t("loader").features.push("xhr");var o=t("handle"),i=t(1),a=t(5),s=["load","error","abort","timeout"],u=s.length,d=t(2);t(3),t(4),a.on("new-xhr",function(){this.totalCbs=0,this.called=0,this.cbTime=0,this.end=n,this.ended=!1,this.xhrGuids={}}),a.on("open-xhr-start",function(t){this.params={method:t[0]},r(this,t[1]),this.metrics={}}),a.on("open-xhr-end",function(t,e){"loader_config"in NREUM&&"xpid"in NREUM.loader_config&&this.sameOrigin&&e.setRequestHeader("X-NewRelic-ID",NREUM.loader_config.xpid)}),a.on("send-xhr-start",function(t,n){var r=this.metrics,o=t[0],i=this;if(r&&o){var d=e(o);d&&(r.txSize=d)}this.startTime=(new Date).getTime(),this.listener=function(t){try{"abort"===t.type&&(i.params.aborted=!0),("load"!==t.type||i.called===i.totalCbs&&(i.onloadCalled||"function"!=typeof n.onload))&&i.end(n)}catch(e){try{a.emit("internal-error",e)}catch(r){}}};for(var f=0;u>f;f++)n.addEventListener(s[f],this.listener,!1)}),a.on("xhr-cb-time",function(t,e,n){this.cbTime+=t,e?this.onloadCalled=!0:this.called+=1,this.called!==this.totalCbs||!this.onloadCalled&&"function"==typeof n.onload||this.end(n)}),a.on("xhr-load-added",function(t,e){var n=""+d(t)+!!e;this.xhrGuids&&!this.xhrGuids[n]&&(this.xhrGuids[n]=!0,this.totalCbs+=1)}),a.on("xhr-load-removed",function(t,e){var n=""+d(t)+!!e;this.xhrGuids&&this.xhrGuids[n]&&(delete this.xhrGuids[n],this.totalCbs-=1)}),a.on("addEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-added",[t[1],t[2]],e)}),a.on("removeEventListener-end",function(t,e){e instanceof XMLHttpRequest&&"load"===t[0]&&a.emit("xhr-load-removed",[t[1],t[2]],e)}),a.on("fn-start",function(t,e,n){e instanceof XMLHttpRequest&&("onload"===n&&(this.onload=!0),("load"===(t[0]&&t[0].type)||this.onload)&&(this.xhrCbStart=(new Date).getTime()))}),a.on("fn-end",function(t,e){this.xhrCbStart&&a.emit("xhr-cb-time",[(new Date).getTime()-this.xhrCbStart,this.onload,e],e)})}window.XMLHttpRequest&&XMLHttpRequest.prototype&&XMLHttpRequest.prototype.addEventListener&&!/CriOS/.test(navigator.userAgent)&&e()},{1:8,2:11,3:3,4:6,5:1,handle:"D5DuLP",loader:"G9z0Bl"}],8:[function(t,e){e.exports=function(t){var e=document.createElement("a"),n=window.location,r={};e.href=t,r.port=e.port;var o=e.href.split("://");return!r.port&&o[1]&&(r.port=o[1].split("/")[0].split(":")[1]),r.port&&"0"!==r.port||(r.port="https"===o[0]?"443":"80"),r.hostname=e.hostname||n.hostname,r.pathname=e.pathname,"/"!==r.pathname.charAt(0)&&(r.pathname="/"+r.pathname),r.sameOrigin=!e.hostname||e.hostname===document.domain&&e.port===n.port&&e.protocol===n.protocol,r}},{}],handle:[function(t,e){e.exports=t("D5DuLP")},{}],D5DuLP:[function(t,e){function n(t,e){var n=r[t];return n?n.apply(this,e):(o[t]||(o[t]=[]),void o[t].push(e))}var r={},o={};e.exports=n,n.queues=o,n.handlers=r},{}],11:[function(t,e){function n(t){if(!t||"object"!=typeof t&&"function"!=typeof t)return-1;if(t===window)return 0;if(o.call(t,"__nr"))return t.__nr;try{return Object.defineProperty(t,"__nr",{value:r,writable:!0,enumerable:!1}),r}catch(e){return t.__nr=r,r}finally{r+=1}}var r=1,o=Object.prototype.hasOwnProperty;e.exports=n},{}],loader:[function(t,e){e.exports=t("G9z0Bl")},{}],G9z0Bl:[function(t,e){function n(){var t=p.info=NREUM.info;if(t&&t.agent&&t.licenseKey&&t.applicationID&&u&&u.body){p.proto="https"===c.split(":")[0]||t.sslForHttp?"https://":"http://",a("mark",["onload",i()]);var e=u.createElement("script");e.src=p.proto+t.agent,u.body.appendChild(e)}}function r(){"complete"===u.readyState&&o()}function o(){a("mark",["domContent",i()])}function i(){return(new Date).getTime()}var a=t("handle"),s=window,u=s.document,d="addEventListener",f="attachEvent",c=(""+location).split("?")[0],p=e.exports={offset:i(),origin:c,features:[]};u[d]?(u[d]("DOMContentLoaded",o,!1),s[d]("load",n,!1)):(u[f]("onreadystatechange",r),s[f]("onload",n)),a("mark",["firstbyte",i()])},{handle:"D5DuLP"}],14:[function(t,e){function n(t,e,n){e||(e=0),"undefined"==typeof n&&(n=t?t.length:0);for(var r=-1,o=n-e||0,i=Array(0>o?0:o);++r<o;)i[r]=t[e+r];return i}e.exports=n},{}],15:[function(t,e){function n(t,e,r,s){function nrWrapper(){try{var n,a=u(arguments),d=this,f=r&&r(a,d)||{}}catch(c){i([c,"",[a,d,s],f])}o(e+"start",[a,d,s],f);try{return n=t.apply(d,a)}catch(p){throw o(e+"err",[a,d,p],f),p}finally{o(e+"end",[a,d,n],f)}}return a(t)?t:(e||(e=""),nrWrapper[n.flag]=!0,nrWrapper)}function r(t,e,r,o){r||(r="");var i,s,u,d="-"===r.charAt(0);for(u=0;u<e.length;u++)s=e[u],i=t[s],a(i)||(t[s]=n(i,d?s+r:r,o,s,t))}function o(t,e,n){try{s.emit(t,e,n)}catch(r){i([r,t,e,n])}}function i(t){try{s.emit("internal-error",t)}catch(e){}}function a(t){return!(t&&"function"==typeof t&&t.apply&&!t[n.flag])}var s=t(1),u=t(2);e.exports=n,n.inPlace=r,n.flag="nr@wrapper"},{1:1,2:14}]},{},["G9z0Bl",2,7]);</script></meta>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<style>
body, html { margin:0; padding:0; }
body {
width: 960px;
height: 640px;

background-image: url(//static.miniclipcdn.com/images/webgame/themes/blueburst.jpg);
background-size:cover;
background-position:center center;
}
#game-container { width:auto; margin:0; padding:0; float: none;}
.game-error-mask, .game-error { -webkit-border-radius:0; -moz-border-radius:0; border-radius:0; }
.game-error { border:none; }
#payment-modal {
margin-top: 74.5px;
}
a.game_home_link {
line-height:20px;
font-size:14px;
color:#fff;
height:0;
display:block;
overflow:hidden;
}
</style>
<script type="text/javascript">
page_href = self.location.href.toLowerCase();
if (top == self && page_href.indexOf('www.miniclip.com') >= 0) {
var newUrl = self.location.href;
newUrl = newUrl.substring(0, newUrl.lastIndexOf('/') + 1);
location.href = newUrl;
}

function getRefereringDomain() {
return document.referrer.split('/')[2];
}
</script>
<script src="//static.miniclipcdn.com/js/stats-manager.js?222" type="text/javascript"></script>
<script src="//static.miniclipcdn.com/js/head-core.js?222" type="text/javascript"></script>
<script src="//static.miniclipcdn.com/js/swfobject.js?222" type="text/javascript"></script>
<script src="//static.miniclipcdn.com/js/gamepage.js?222" type="text/javascript"></script>
<script src="//static.miniclipcdn.com/js/facebook.js?222" type="text/javascript"></script>
<script type="text/javascript">
// init and send page view
var stats_manager = new StatsManager();
stats_manager.init({"ua_account_number":"UA-44159587-1","disabled_trackers":false,"pageview_data":{"dimension7":"\/games\/<?=$name?>\/webgame.php","metric2":0,"dimension9":"Vietnam","dimension8":"en","metric1":2,"dimension1":"Guest","dimension2":"3806","dimension3":"1194","dimension4":null,"dimension5":"unity-services","dimension6":"<?=$name?>"},"page_prefix":""});
stats_manager.trackerPageview();
</script>		
</head>
<body>
<section id="game-container" class="webgame">
<div style="position: absolute; top: 0%; left: 0%;">
<div id="game-embed">				
</div>
<div id="no-unity-notification" style="display: none;">
<div class="notification-bar error unity-supported">
<p>
You need to install the <strong>Unity Web Player</strong> to play <strong><?=$name?></strong>. Click the button below to install the Unity Web Player now</a>.    </p>
</div>
<div class="notification-bar error unity-not-supported" style="display:none">
<p>
This game cannot be played on this computer. Supported Platforms: <strong>Windows</strong> and <strong>OSX</strong>    </p>
</div>	

</div>
<div id="unity-preroll"></div>
<div id="game-outer" style="margin: auto; position: relative; height: 640px; width: 960px; max-height: 640px; max-width: 960px; overflow: hidden;">
<div id="comm-swf-outer" style="height: 640px; width:960px;margin: auto; position: absolute; top: 0px; left: 0px">
<div id="comm-swf"></div>
</div>
<div id="unityPlayer" style="width: 960px; height: 640px; position: absolute; top: 0px;" data-flashvars="{&quot;mc_gamename&quot;:&quot;Zero+Gravity&quot;,&quot;mc_hsname&quot;:&quot;3806&quot;,&quot;mc_iconBig&quot;:&quot;RRWorldsmedicon.jpg&quot;,&quot;mc_icon&quot;:&quot;RRWorldssmallicon.jpg&quot;,&quot;mc_negativescore&quot;:0,&quot;mc_players_site&quot;:&quot;1&quot;,&quot;mc_scoreistime&quot;:0,&quot;mc_lowscore&quot;:0,&quot;mc_width&quot;:960,&quot;mc_height&quot;:640,&quot;mc_lang&quot;:&quot;en&quot;,&quot;mc_webmaster&quot;:1,&quot;mc_playerbutton&quot;:0,&quot;mc_v2&quot;:1,&quot;loggedin&quot;:0,&quot;mc_loggedin&quot;:0,&quot;mc_uid&quot;:0,&quot;mc_sessid&quot;:&quot;0qrggen6q6vl319l1vt4cf67u2&quot;,&quot;mc_shockwave&quot;:0,&quot;mc_gameUrl&quot;:&quot;http%3A%2F%2Fstatic.miniclipcdn.com%2Fgames%2F<?=$name?>%2Fen%2F&quot;,&quot;mc_ua&quot;:&quot;75e5024&quot;,&quot;mc_geo&quot;:&quot;us-west-2&quot;,&quot;mc_geoCode&quot;:&quot;VN&quot;,&quot;vid&quot;:0,&quot;m_vid&quot;:&quot;0&quot;,&quot;channel&quot;:&quot;miniclip.preroll&quot;,&quot;m_channel&quot;:&quot;miniclip.midroll&quot;,&quot;s_content&quot;:0,&quot;mc_plat_id&quot;:2,&quot;mc_extra&quot;:null,&quot;mc_image_cdn_path&quot;:&quot;http:\/\/images.miniclipcdn.com\/&quot;,&quot;amfhost&quot;:&quot;www&quot;,&quot;fn&quot;:&quot;WebPlayer.unity3d?RELOADED_ADS&quot;}">
<div class="missing" style="width: 100%; height: 100%; top: 0;">
<style>
.unity-bg {
width: 100%;
height: 100%;
background: url(/layout/unity-install-bg.jpg) no-repeat center center;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
.unity-bg-mc {
position: absolute;
width: 242px;
height: 67px;
top: 384px;
left: 199px;
}
</style>
<div class="unity-bg">
<a href="http://unity3d.com/webplayer/" title="Unity Web Player. Install now!" style="width: 100%; height: 100%; display: block; padding: 320px 0">
<img alt="Unity Web Player. Install now!" src="http://webplayer.unity3d.com/installation/getunity.png" width="193" height="63" />
</a>
<div class="unity-bg-mc">
<img src="/layout/icons/unity-installer-mc.png" width="242px" height="67px" />
</div>
</div>
</div>
</div>
</div>

<style>
div.broken,
div.missing {
margin: auto;
position: relative;
top: 50%;
width: 193px;
}
div.broken a,
div.missing a {
height: 63px;
position: relative;
top: -31px;
}
div.broken img,
div.missing img {
border-width: 0px;
}
div.broken {
display: none;
}
</style><div id="no-flash-notification" style="display: none;">
<div class="notification-bar error">
<p>
You need to install <strong>Adobe Flash Player</strong> to play <strong><?=$name?></strong>. <a href="http://get.adobe.com/flashplayer/" target="_blank">Download the Flash Player now</a>.		</p>
</div>
<div class="game-error-mask" style="width: 640px;">
<div class="game-error flash" style="height: 640px;">
<div class="game-error-content" style="margin-top: 230px;">
<span class="game-error-icon-wrap"><img src="//static.miniclipcdn.com/layout/icons/error-flash.png" width="128" height="125" border="0"/></span>
<div class="game-error-message">
Click here to download the Adobe Flash Player                </div>
</div>
</div>
</div>
</div>

<!-- proxy -->
<div style="position:absolute;top:0px;left:-1px;" id="flashCommsWrapper">
<div id="flashCommsWrapperInner"></div>
</div>
<script type="text/javascript">
var flashvars				= {};
var params					= {};
params.menu					= "true";
params.allowScriptAccess	= "always";
params.id					= "flashComms";
var attributes				= {};

swfobject.embedSWF("http://static.miniclipcdn.com/swfcontent/components/fblbproxy.swf?mc_gamename=<?=$name?>&mc_hsname=3806&mc_iconBig=RRWorldsmedicon.jpg&mc_icon=RRWorldssmallicon.jpg&mc_negativescore=0&mc_players_site=1&mc_scoreistime=0&mc_lowscore=0&mc_width=960&mc_height=640&mc_lang=en&mc_webmaster=1&mc_playerbutton=0&mc_v2=1&loggedin=0&mc_loggedin=0&mc_uid=0&mc_sessid=0qrggen6q6vl319l1vt4cf67u2&mc_shockwave=0&mc_gameUrl=http%253A%252F%252Fstatic.miniclipcdn.com%252Fgames%252F<?=$name?>%252Fen%252F&mc_ua=75e5024&mc_geo=us-west-2&mc_geoCode=VN&vid=0&m_vid=0&channel=miniclip.preroll&m_channel=miniclip.midroll&s_content=0&mc_plat_id=2&mc_image_cdn_path=http%3A%2F%2Fimages.miniclipcdn.com%2F&amfhost=www&fn=WebPlayer.unity3d%3FRELOADED_ADS", "flashCommsWrapperInner", "1", "1", "10.0.0", false, flashvars, params, attributes);

$(document).ready(function () {
$('#no-flash-notification .game-error-mask').hover(function () {
$(this).css('cursor','pointer');
});

$('#no-flash-notification .game-error-mask').click(function () {
getFlash();
});
});
</script><script type="text/javascript">
var unityObjectUrl = "http://webplayer.unity3d.com/download_webplayer-3.x/3.0/uo/UnityObject2.js";
if (document.location.protocol == 'https:')
unityObjectUrl = unityObjectUrl.replace("http://", "https://ssl-");
document.write('<script type="text\/javascript" src="' + unityObjectUrl + '"><\/script>');
</script>

<script type="text/javascript">
jQuery('#no-unity-notification').hide();
jQuery('.missing').hide();

function getGameInstance()
{
var flashvars = jQuery('#unityPlayer').data('flashvars');

if (typeof window.game_instance == 'undefined') {
window.game_instance = new jGameLoader(flashvars, '#unityPlayer', "#comm-swf", "#unity-preroll", 3806);
return window.game_instance;
} else {
return window.game_instance;
}
}

/**************************************
* Checks if flash is installed/enabled.
* If it is not installed, show the message. 
* If it is installed, start loading Unity
**************************************/
jQuery(function(){
var playerVersion = swfobject.getFlashPlayerVersion(); 
if (playerVersion.major == 0) {
showFlashError(640,640);
//and hide div so the error message shows at the top of the viewport
jQuery('#game-outer').hide();
}
else {
getGameInstance();
}
});

/**
* Exposed for flash (external interface)
*/
function video_complete_callback()
{
console.log('Complete');
getGameInstance().embed_comm_swf();
}

/**
* 
* @param {type} $url
* @returns {undefined}	
*  */
function unity_open_url($url) {
window.open($url,'_blank');
}
</script>

<script type="text/javascript" src="http://myweb.pro.vn/js/game/jgameloader.js"></script>            </div>
</section>
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-6.newrelic.com","licenseKey":"f246896502","applicationID":"3016272","transactionName":"MVFRZktRWhJVAkVYVwgbcEdKRFsMGwRcU10CGxk=","queueTime":0,"applicationTime":22,"ttGuid":"","agentToken":"","atts":"HRZSEANLSRw=","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-411.min.js"}</script></body>
</html>