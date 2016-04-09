<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="/css/web/web.css" type="text/css" rel="stylesheet">
<link href="/css/web/detail.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
$(document)
//start ready function
.ready(function(){
$(".language a").attr('href','http://myweb.pro.vn/lap_trinh/web')
//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined';   
if(isFirefox){
$('header').attr('style','height:10.5!important')
}
//end

//assign id left column item to hightlight selected item
$("#leftcolumn a").each(function(index){
$(this).attr('id','left_item_'+index)
})
$("#"+$("#item_selected").val()).addClass('selected')
//end

//process with left column link
$("#leftcolumn a")
.click(function(){
var mySpan = $('#try_it_url').val(), index=parseInt($(this).attr('id').replace('left_item_',''))

//html left panel 
if(index>=62 && index<=75 && $("#left_item_62").prev().html()=='<span class="left_h2">HTML</span> References'){ 
mySpan =$(this).attr('data-href')
}
//end html left panel

//css left panel 
if(index>=46 && index<=54 && $("#left_item_46").prev().html()=='<span class="left_h2">CSS</span> References'){ 
mySpan =$(this).attr('data-href')
}
//end css left panel

//javascript reference left panel 
if(index>=83 && index<=84 && $("#left_item_83").prev().html()=='<span class="left_h2">JS</span> References'){ 
	mySpan = $(this).attr('data-href')
}
//end javascript reference left panel

//appML reference left panel 
if(index==13 && $("#left_item_0").prev().html()=='<span class="left_h2">AppML</span> Basic'){ 
	mySpan = $(this).attr('data-href')
}
//end appML reference left panel


else {
//start appML child reference left panel 
if(index>=0 && index<=27 && $("#left_item_0").prev().html()=='<span class="left_h2">Web Building</span>'){ 
	mySpan ="website/"
	mySpan = mySpan+$(this).attr('data-href')
}
//end appML child reference left panel

//start javascript child reference left panel 
if(index>=0 && index<=135 && $("#left_item_0").prev().html()=='<span class="left_h2">JavaScript</span> Reference'){ 
	mySpan ="jsref/"
	mySpan = mySpan+$(this).attr('data-href')
}
//end javascript child reference left panel

//html reference left panel 
if(index>=0 && index<=135 && $("#left_item_0").prev().html()=='<span class="left_h2">HTML</span> Reference'){ 
	mySpan ="tags/"
	mySpan = mySpan+$(this).attr('data-href')
}
//end html left panel

//css reference left panel 
if(index>=0 && index<=187 && $("#left_item_0").prev().html()=='<span class="left_h2">CSS</span> Reference'){ 
	mySpan ="cssref/"
	mySpan = mySpan+$(this).attr('data-href')
}
//end css reference left panel

else {
	//left panel first load
	mySpan = mySpan.split('/')[0]+'/'+$(this).attr('data-href')
}
//end else


}

$(this).attr('href',"#")
$("#link").val(mySpan)
$("#item_title").val($(this).html())
$("#item_selected").val($(this).attr("id"))
$("#left_column_go").submit()
})
//end proccess

$("#main")
.empty()
.prepend("<div class='main_content_wrapper'><iframe scrolling='no' id='iframe_main_content' src='/lap_trinh/detail_2?link=<?=$link?>'/></div>")
$('.boxRef,.boxDemo,.box3,#WidgetFloaterPanels,#rightcolumn').remove()
$("WidgetLauncher").next().attr('style','margin-top:60px')

})
//end ready function

$(window).scroll(show_ads)
function show_ads(){	
if($("#set_ads_web_detail_right").val()=="1"){
$("#ads_web_detail_right").attr('style','position:absolute;')
}
else {}
$("#iframe_main_content").contents().find('.bottom-ads').html($(".ads_wrapper").html())		
}
</script>
<style>
.selected {
color: blueviolet !important;
font-weight: bold;
}
#MicrosoftTranslatorWidget {
display:none !important;
}
#WidgetFloaterPanels {
display:none !important;
}
.main_content_wrapper{
position: absolute;
width: 85%;
height: 2000%;
margin-top: 2.7%;
}
#ads_web_detail_right {
position: fixed;
margin-left: 76.5%;
margin-top: 25px;
z-index: 50;
}
.lap_trinh_header_search {
	display: block;
    margin-left: 15%;
    margin-top: 11%;
    position: absolute;
    z-index: 1000;
}
</style>
</head>
<body onload="return LanguageMenu.onclick('vi');">
<div id='MicrosoftTranslatorWidget' class='Dark' style='color:white;background-color:#555555'></div>

<!-- start header ads -->
<div class="ads_wrapper">
</div>
<!-- end header ads -->

<!-- start header search-->
<div class="lap_trinh_header_search">
<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.com.vn" id="cse-search-box">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1996742103012878:4800332684" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" style="height:24px" placeholder="Tìm kiếm tùy chỉnh với Google" name="q" size="55" />
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

<!-- begin ads right-->
<div id="ads_web_detail_right">
</div>
<!-- end ads right-->
<form id="left_column_go" method="post" action="/lap_trinh/detail/"/>
<input type="hidden" name="try_it_url" id="try_it_url" value="<?=$try_it_url?>"/>
<input type="hidden" name="link" id="link"/>
<input type="hidden" name="item_title" id="item_title"/>
<input type="hidden" name="item_selected" id="item_selected" value="<?=$item_selected?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
<input type="hidden" id="set_ads_web_detail_right" value="0"/>
<?=$left_col?>
</body>
</html>
