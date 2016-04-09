<meta name="description" content="Đọc báo điện tử Vnexpress"/>
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<meta charset="UTF-8">
<style>
#menu_web {
margin-top:60px!important;
}
.tagged_text_ex2 {
	display:none;
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
.my_header_ads {
background: none!important;
width: 728px;
height: 90px;
margin-top: -25px;
}
.ads_temp {
display:none;
}
.header_right_ads {
display:inline-block;
width:300px;
height:250px;
margin-top:15px
}
.detail_ads_right {
display:inline-block;width:120px;height:600px;
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
<!-- start ads temp-->
<div class="ads_temp">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
style="display:inline-block;width:728px;height:90px"
data-ad-client="ca-pub-1996742103012878"
data-ad-slot="2618922285"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
<!-- end ads temp-->
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