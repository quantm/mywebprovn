<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="" />
<meta property="og:image" content="" />
<meta property="og:type" content="music.song" />
<meta property="og:description" content="" />
<link rel="canonical" href="http://myweb.pro.vn/music/song?id=<?=$song_id?>" />
<!-- end meta  -->
<link rel="stylesheet" type="text/css" href="/css/music/my.css"/>	
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript">
window.___gcfg = {lang: 'vi'};

(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/platform.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<script type="text/javascript">
var content=''
$(document)
//start ready function	
.ready(function(){

$(".navbar-inner").attr("style","height: 45px !important;border-bottom: navajowhite;background-image: linear-gradient(to bottom, #514444, #000000)")
if($("#song_type").val()=="video"){	
$("#album_htm5_video").addClass('song_video_player')
}

//start add google custom search in the header
$("#game_header_search")
	.removeAttr("method")
	.empty()
	.attr("id","cse-search-box")
	.attr("target","_new")
	.attr("action","http://myweb.pro.vn/book/cse/")
	.html($(".frm_cse-search-box").html())
$(".frm_cse-search-box").remove()
//end

//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$(".html_5_player_wrapper").attr('style','margin-top: 30.5%;')
$(".ads_wrapper_view").attr('style','bottom:210px;')
}
//end

//begin ajax
$.ajax({
type:'get',
url:'<?=$url?>',
success:function(e){
content=e
$('.view_album_song').append(function(){
$('.box-like,.fixed-function').remove()	

//mobile
if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	$("#album_htm5_video").addClass('album_htm5_video_mobile')
}
//end

return content

})

}
})
//end ajax
$.ajax({
content:'text/html',
url:'/music/ins_db/',
type:'post',
data:{
name:'<?=$song_name?>',
referer:'<?=$url?>',
song_link:'<?=$song_link?>',
csrf_test_name:$("#csrf_test_name").val()
},
success:function(){
	$("#_lyricContainer,.box-social").empty()
	$("#_lyricContainer").html('<?=$fb_comment?>')
	$(".box-social").html('<?=$social_shared?>')
}

})
})
//end ready function
.on('mousemove','body',function(){
$('.box-like,.comment,.view_album_song .top-wrap,.view_album_song .footer,.view_album_song meta,.view_album_song script,.view_album_song .fixed-function').remove()
if($("#song_type").val()=="video"){	
	$(".player").attr('style','height:330px!important')
}
})
</script>
<style>
.nav{
	margin-top:-35px!important;
}
body{
overflow:hidden;
}
.content {
margin-top: 0px!important;
width: 950px!important;
margin-left: 17px!important;
}
.fb_iframe_widget {
z-index:10000!important;
}
#___plusone_0 {
margin-left: 5px!important;
}
#twitter-widget-0 {
margin-left: 180px !important;
margin-top: -22px !important;
}
</style>
</head>

<body>

<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" style="width:325px;margin-left:45px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" name="q" size="115" />
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
  </div>
</form>

<div class="html_5_player_wrapper">
<video id="album_htm5_video" loop controls autoplay name="media">
<source src="<?=$song_link?>" type="audio/mpeg">
</video>
</div>

<div class="view_album_song">	

<!--start header ads -->
<div class="ads_wrapper">

</div>
<!-- end header ads -->

<!-- start left advertisement -->
<div class="ads_wrapper_view">

</div>
<!-- end left advertisement -->

<input type="hidden" name="song_type" id="song_type" value="<?=$song_type?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</div>
</body>
</html>
