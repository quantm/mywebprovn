<meta name="description" content="Đọc báo điện tử Vnexpress"/>
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<meta charset="UTF-8">
<style>
.adv_micro_left *,.adv_micro_content_right_2 * {
	border:none!important;
	background-color:white!important
}
.blink {
	background-color:#45E45F;
}
#ssvzone_16586 {
	margin-left: 86%!important;
}
.adv_micro_left {
	position: fixed;
	margin-left: 30px;
	margin-top: 5%;
	z-index: 100000000;
}
.adv_micro_header {
	position:absolute;
	margin-left: 18%;
	margin-top: 3%;
}
.adv_micro_content_right {
	position: absolute;
	width: 300px;
	height: 385px;
	margin-left: 64%;
	margin-top: 17%;
	z-index:1000000;
}
#box_fb {
  margin-top: 52%
}
.adv_micro_content_right_2 {
  position: fixed;
  width: 120px;
  height: 600px;
  margin-left: 88.5%;
  margin-top: 5%;
  z-index: 1000000;
}
.adv_micro_content_right_3 {
  position: absolute;
  width: 300px;
  height: 600px;
  margin-left: 45.5%;
  margin-top: 275%;
  z-index: 1000000;
}
#menu_web {
margin-top:60px!important;
}
textarea
{
	background-color:white!important;
}
#page {
margin-top:2.5%;
}
.logo_web {
margin-top: -10px!important;
}


a:hover, a:link, a:visited {
color: black;
}

.block_100 {
width: 100%!important;
}
.block_banner {
width:100%!important;
}
.index_bottom_right {
display:inline-block;width:300px;height:600px;
}
.make_class_end {
margin-left:1%!important;
}

#hosophaan,#video,#box_cactacgia {
margin-top:-10%!important;
}
#affcup,.box_category {
margin-top: -10%;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
//hightlight advertisement object
setInterval(function(){
        $(".adv_item,.adv_items").toggleClass("blink");
     },2000)
//end

$(".tagged_text_ex2").remove()
var header_ads=$(".ads_temp").html(),
header_right_ads='<ins class="header_right_ads adsbygoogle" data-ad-client="ca-pub-1996742103012878" data-ad-slot="4573980284"></ins>',
detail_ads_right='<ins class="detail_ads_right adsbygoogle" data-ad-client="ca-pub-1996742103012878" data-ad-slot="5784968680"></ins>',
index_bottom_right='<ins class="index_bottom_right adsbygoogle" data-ad-client="ca-pub-1996742103012878" data-ad-slot="6975069889"></ins>'

$("#breakumb_web li a,.sub_breakumn li a,.block_tag").each(function(){
	if($(this).html()!="Video"){
		$(this).attr('href',"http://vnexpress.net"+$(this).attr("href"))
	}
})

$("#page a").each(function(){
	$(this).attr("href","http://myweb.pro.vn/news/vnexpress?id="+$(this).attr("href"))
})

//header menu

$(".mnu_thoisu").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/thoi-su")
$(".mnu_gocnhin").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/goc-nhin")
$(".mnu_thegioi").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/the-gioi")
$(".mnu_kinhdoanh").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://kinhdoanh.vnexpress.net/")
$(".mnu_giaitri").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://giaitri.vnexpress.net/")
$(".mnu_thethao").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://thethao.vnexpress.net/")
$(".mnu_phapluat").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/phap-luat/")
$(".mnu_giaoduc").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/giao-duc")
$(".mnu_doisong").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://doisong.vnexpress.net/")
$(".mnu_dulich").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://dulich.vnexpress.net/")
$(".mnu_khoahoc").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/khoa-hoc")
$(".mnu_congdong").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/cong-dong")
$(".mnu_tamsu").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/tam-su")
$(".mnu_video").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://video.vnexpress.net/")
$(".mnu_cuoi").attr('href',"http://myweb.pro.vn/news/vnexpress?id=http://vnexpress.net/tin-tuc/cuoi")
$(".start a").attr('href',"http://myweb.pro.vn/news/vnexpress")
//end

//$("#wrapper_footer,.box_ads_hot_news,.banner_980x60,#col_300,.banner_160x600,.box_category,.block_hidden_device").empty()

//start header ads
$("#wrapper_footer,.box_ads_hot_news,.banner_980x60,#elick_left,#elick_right,#box_fb").empty()

$("#box_fb").append('<div class="fb-like-box fb_iframe_widget" data-colorscheme="light" data-header="true" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="true" ></div>')

if($(".box_ads_hot_news").length!="0"){
$(".box_ads_hot_news").append(header_right_ads)
}
//end header ads

//start right banner ads detail page
if($(".banner_160x600")!="0"){
$(".banner_160x600").append(detail_ads_right)
}
//end right banner ads detail page

$('#cuoi').next().find('.block_100').remove()
$(".block_goithutoasoan,myvne_taskbar,.meta,.header_ads,#CPMS_POSITION_DIV,#CPMST_LOG_IMPRESSION_IFRAME,#CPMST_LOG_VISITOR_IFRAME,#CPMST_LOG_IMPRESSION_EBOX_IFRAME,#CPMST_LOG_VISITOR_EBOX_IFRAME,#BALLOON_BANNER,#BACKGROUND,#POPUP_UNDER,#STICKY_BANNER,#BoxOverlay,.myvne_container,#cuoi").remove()
$("#header_main .header_logo")
.addClass('my_header_ads')
.empty()

//start set header ads
$(".my_header_ads").html(header_ads)
//end set header ads

for(var i=0;i<7;i++){
$("#LARGE_BANNER_HOME_"+i).remove();
$("#FIXED_FLOAT_BANNER_"+i).remove();
}
})
$(window).scroll(show_ads)
function show_ads(){
if($("#box_comment").length!="0"){$("#box_comment").remove()}

//start right bottom ads
if($("#xemnhieunhat").find("ins").length!="0"){

}
//end right bottom ads

//start bottom ads
if($(".banner_980x60").find("ins").length=="0"){
$(".banner_980x60").append($('.ads_temp').html())	
}
//end bottom ads

$('.ads_temp').remove()
}
</script>


<!-- 300-385-->
<div class="adv_micro_content_right">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16573.ads"></script>
</div>
<!--/-->

<!-- 120-600 float right-->
<div class="adv_micro_content_right_2">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17677.ads"></script>
</div>
<!--/-->


<!-- 300-600-->
<div class="adv_micro_content_right_3">

</div>
<!--/-->

<!--120-600 float left-->
<div class="adv_micro_left">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17687.ads"></script>
</div>
<!--/-->

<!-- 850-110-->
<div class="adv_micro_header">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16658.ads"></script>
</div>
<!--/-->

<div id="content_wrapper">
<?=$content?>

</div>
<style>
.box_sub_hot_news .scroll-pane {
width: 199px!important;
margin-left: -25px!important;
}
</style>
<link rel="canonical" href="<?=$url?>" />
<meta property="og:url" content="<?=$url?>" />