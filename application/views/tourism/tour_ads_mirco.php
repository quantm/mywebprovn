<meta name="description" content="Tổng hợp thông tin tour du lịch"/>
<style>
.ads_micro_header {
position:absolute;
margin-top:5px;
margin-left:350px;
}
.ads_micro_left {
width: 300px;
height: 600px;
position: fixed;
margin-left: 25px;
margin-top: 5px;
}
#wrapper_content {
margin-left: 26%!important;
margin-top: 15%!important;
}
body{
	overflow-x:hidden;
}
.ads_micro_sticky {
height: 250px;
width: 300px;
position: fixed;
margin-left:675px;
margin-top: -55%;
}
#advZoneSticky {
top: 41px!important;
}
</style>

<link rel="stylesheet" type="text/css" href="/css/tour/main.css">
<link rel="stylesheet" type="text/css" href="/css/tour/style.css">

<script type="text/javascript">
$(document).ready(function(){
	$('.data_grid_item a').each(function(){
		var href=$(this).attr('href'),title=$(this).attr('title')
			$(this).attr('href',href+"?title="+title)
	})	

	//disable flex context menu
	$("html,body,object,embed").bind("contextmenu",function(){
       return false;
    }); 
	//end
})
</script>

<!--
<div class="fb_box">
<div class="fb-like-box" data-href="https://www.facebook.com/dulichvietbonphuong?ref=hl" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
</div>
-->

<div class="ads_micro_left">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16637.ads"></script>
</div>

<div class="ads_micro_header">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16619.ads"></script>
</div>

<?=$content?>

<!-- ads_micro_sticky -->
<div class="ads_micro_sticky">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16563.ads"></script>
</div>
