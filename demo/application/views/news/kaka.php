<style>
textarea
{
background-color:white!important;
}
#page {
	margin-top:5%;
}
.logo_web {
	margin-top: -10px!important;
}
.my_header_ads {
background: none!important;
background-color: gray!important;
width: 728px;
height: 90px;
margin-top: -25px;
}
</style>
<script type="text/javascript">
var content=""
$(document).ready(function(){
	$("#col_3,#wrapper_footer").empty()
	$(".meta,.header_ads,#CPMS_POSITION_DIV,#CPMST_LOG_IMPRESSION_IFRAME,#CPMST_LOG_VISITOR_IFRAME,#CPMST_LOG_IMPRESSION_EBOX_IFRAME,#CPMST_LOG_VISITOR_EBOX_IFRAME,#BALLOON_BANNER,#BACKGROUND,#POPUP_UNDER,#STICKY_BANNER,#BoxOverlay").remove()
	$("#header_main .header_logo")
		.addClass('my_header_ads')
		.empty()
	$("#header_main a").attr('href','http://myweb.pro.vn/news/vnexpress')
	$("#myvne_taskbar").remove()
	for(var i=0;i<7;i++){
		$("#LARGE_BANNER_HOME_"+i).remove();
		$("#FIXED_FLOAT_BANNER_"+i).remove();
	}
	content=$("#homepage").html()
	//$("#page").remove();
	//$("#content_wrapper").html(content)
})
$(window).scroll(filter)
function filter(){
	
}
</script>
<div id="content_wrapper"></div>
<?=$content?>