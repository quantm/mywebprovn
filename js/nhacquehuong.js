$(document).ready(function(){
//$(".widget-content").remove()
$("#HTML7").remove()
$("#HTML2").remove()
$("#PopularPosts2 h2").remove()
$("#CustomSearch1 h2").remove()
$("#CustomSearch1_form").remove()
$("center").remove()
$("#link-wrapper").remove()
$(".menupic").remove()
$(".menupic2").remove()
$("#sidebar #Label1").remove()
$("#header-wrapper").remove()
$(".post-footer").remove()
$(".comments").remove()
$(".adsbygoogle").remove()
$("#PlusOne1").remove()
$(".post-body").append('<div id="comment" class="fb-comments tab-pane  fade in active" data-width="auto"  data-href="http://myweb.pro.vn/music/quehuong"  data-numposts="5" data-colorscheme="light"></div>')
$("a").each(function(){
if($(this).attr("id")!="header_link"){$(this).attr("href","http://myweb.pro.vn/music/quehuong?quehuong&id="+$(this).attr("href"))}
})

})