<meta charset="UTF-8"/>
<style>
.tour_filter_right_top,.tour_big_title {
	margin-left: 15px;
}
.box_right_item {
	margin-left:4%;
}
div.tour_result_item div.tour_result_item_right {
	position:absolute!important;
	margin-left: 73%;
}
.ads_micro_right {
	position: fixed;
	margin-left: 80%;
	margin-top: 1%;
	z-index: 10000;
}
.ads_micro_left {
	position: fixed;
	margin-left: 1%;
	margin-top: 1%;
	z-index:10000;
}
#box_xemnhieunhat,#col_660 {
	margin-top: 15%!important;
}

.filter_bar,.box_content_left,.block_input_comment,#myvne_taskbar,#col_300,#wrapper_header,#header,#header_main,#footer,#wrapper_footer{
	display:none;
}
.ads_micro_header {
	position: absolute;
	margin-left: 13%;
	margin-top: 1%;
}
#slider_tour_image_container {
left: 30px!important;
width: 708px!important;
}
#detail_page_live.line_col, #detail_page.line_col {
background: url('http://st.f3.vnecdn.net/responsive/c/v59/images/graphics/bg_1x1_gray.gif') repeat-y 73.2% 0!important;
}
#wrapper_content div.box_content_right {
float: left!important;
margin-top: 13%!important;
}
</style>
<link rel="stylesheet" type="text/css" href="/css/tour/main.css">
<link rel="stylesheet" type="text/css" href="/css/tour/style.css">

<div class="ads_micro_header">
	<!--- Script ANTS - 728x90 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324894.js"></script>
	<!--- end ANTS Script -->
</div>


<div class="ads_micro_right">
	<!--- Script ANTS - 300x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324837.js"></script>
	<!--- end ANTS Script -->
</div>


<!-- start left advertisement 120-600-->
<div class="ads_micro_left">
	<!--- Script ANTS - 160x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
	<!--- end ANTS Script -->
</div>
<!-- end-->

<?=$content?>

<script type="text/javascript">
	$.fn.flash = function(duration, iterations) {
		duration = duration || 1000; // Default to 1 second
		iterations = iterations || 1; // Default to 1 iteration
		var iterationDuration = Math.floor(duration / iterations);

		for (var i = 0; i < iterations; i++) {
			this.fadeOut(iterationDuration).fadeIn(iterationDuration);
		}
		return this;
	}
	var ads_zone16553_index=0
	$(window).scroll(function(){
		ads_zone16553_index++
		if(ads_zone16553_index==1 || ads_zone16553_index==10 || ads_zone16553_index==50){
			$('#ads_zone16553').flash(1200,3)
		}
		if(ads_zone16553_index==70){
			$('#ads_zone16602').flash(1000,5)
		}
	})

$(document)
//star ready function
.ready(function(){
	$('.box_item_top').each(function(){
	var href=$(this).find('a').attr('href'),title=$(this).find('a').html(),new_href=href+"?title="+title
		$(this).find('a').attr('href',new_href)
		$(this).next().find('.box_item_bottom_left').find('a').attr('href',new_href)
		$(this).parent().next().find('.tour_result_item_right_bottom').find('a').attr('href',new_href)
	})
	
	//disable flex context menu
	$("html,body,object,embed").bind("contextmenu",function(){
       return false;
    }); 
	//end
	
	$('.filter_bar,.box_content_left,.block_input_comment,col_300,#myvne_taskbar,#wrapper_header,#header,#header_main,#footer,#wrapper_footer').remove()
	$('#col_300,#box_comment').empty()

})
//end
.on('click','.tour_booking',function(){
		$('#ads_zone16553').flash(800,8)
})

</script>

<!-- http://dulich.vnexpress.net/tin-tuc/anh-video -->
