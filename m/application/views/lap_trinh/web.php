<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<!-- start meta -->
<meta property="og:title" content="Học lập trình" />
<meta property="og:image" content="http://www.i7engineering.com/images/software_engineering_code.jpg" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://myweb.pro.vn/lap_trinh/web/" />
<meta property="og:description" content="Thư viện lập trình" />
<!-- end meta  -->
<link href="/css/web/web.css" type="text/css" rel="stylesheet">

<script type="text/javascript">
$(document).ready(function(){
$('#search').remove()
//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$('body').attr('style','height:10.5!important')
}
//end	


//processing bottom advertisement
$("#maincol").append("<div class='web-bottom-ads'></div>")	
//end 

//processing with page link
$("#leftcol a,#maincol a")
.click(function(){
//var link=$(this).attr('href')
//$(this).attr('href','?link='+link)
$("#link").val($(this).attr('data-href'))
$("#item_title").val($(this).html())
$("#frm_go_web").submit()
})
//end 

//start hide bing translator widget
$("body").mouseover(function(){
//$("#WidgetFloaterPanels").next().remove();
})
//end hide bing translator widget
//Microsoft.Translator.FloaterOnClose()

})
$(window).scroll(show_ads)
function show_ads(){
var footer=$("#temp_footer").html()
$(".web-bottom-ads").html($(".ads_wrapper").html()+footer)	
$("#temp_footer").remove()
}
</script>

<!-- start bing translator widget -->
<script type='text/javascript'>setTimeout(function(){{var s=document.createElement('script');s.type='text/javascript';s.charset='UTF-8';s.src=((location && location.href && location.href.indexOf('https') == 0)?'https://ssl.microsoft#translator.com':'http://www.microsofttranslator.com')+'/ajax/v3/WidgetV3.ashx?siteData=ueOIGRSKkd965FeEGM5JtQ**&ctf=False&ui=true&settings=auto&from=en&to=vi';var p=document.getElementsByTagName('head')[0]||document.documentElement;p.insertBefore(s,p.firstChild); }},0);</script>
<!--end widget -->

</head>
<body onload="return LanguageMenu.onclick('vi');">
<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>
<div style="display:none" id="temp_footer">
	<? $this->load->view('footer')?>
</div>
<!-- start social like -->
<div class="social_like">
<div style="margin-top: 15px!important;" class="fb-share-button" data-href="http://myweb.pro.vn/lap_trinh/web/" data-layout="box_count"></div>

<div class='clr'></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div class="g-plusone" data-size="medium"></div>

<div class='clr'></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->


</div>
<!-- end social like -->

<!-- start header ads -->
<div class="ads_wrapper">
</div>
<!-- end header ads -->


<!-- start main content-->

<!-- start header search-->
<div class="lap_trinh_header_search">
<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.com.vn" id="cse-search-box" target="_new">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1996742103012878:4800332684" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" style="height:30px" placeholder="Tìm kiếm tùy chỉnh với Google" name="q" size="55" />
        <input class='btn btn-primary' type="submit" name="sa" value="Tìm kiếm" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
  </div>
  <div class="cse-branding-text">
    Custom Search
  </div>
</div>

<script type="text/javascript" src="http://www.google.com/cse/query_renderer.js"></script>
<div id="queries"></div>
<script src="http://www.google.com/cse/api/partner-pub-1996742103012878/cse/4800332684/queries/js?oe=UTF-8&amp;callback=(new+PopularQueryRenderer(document.getElementById(%22queries%22))).render"></script>
</div>
<!--end header search-->

<?=$left_col?>
<!-- end main content -->
<form name="frm_go_web" id="frm_go_web" action="/lap_trinh/detail/" method="post">
<input type="hidden" name="link" id="link"/>
<input type="hidden" name="item_title" id="item_title"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
</body>
<style>
#MicrosoftTranslatorWidget {
display:none !important;
}
#WidgetFloaterPanels {
display:none !important;
}
.web-bottom-ads{
width: 728px;
height: 90px;
position: absolute;
margin-top: 35%;
margin-left: 1%;
}
</style>
</html>
