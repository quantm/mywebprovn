<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="<?=$shared_url?>" />
<meta name="description" content="Thư viện giáo án - <?=$book_description?>" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<link rel="canonical" href="<?=$shared_url?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/giaoan_luanvan_doan.css" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/style.css" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/global.css" type="text/css">
</head>
<body>

<div class='modal hide fade' id='adv_object'></div>

<!-- start left advertisement-->
<div class="adv_eclick_left eclick_left" style="position:fixed;margin-top: 50px;">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
</div>
<!-- end left advertisement -->

<!-- start right advertisement 160*600-->
<div class="adv_ants_right" style="margin-left:87.8%!important;" >
	<!--- Script ANTS - 160x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
	<!--- end ANTS Script -->
</div>
<!-- end-->

<!-- show advertisement when user click related document-->
<div class="relevant-adv" style="margin-top: 12.5%;">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16571.ads"></script>
</div>
<!--//-->

<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/reset.css" type="text/css">


<!-- hidden field -->
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
<input type="hidden" id="share_id" name="share_id" value="<?=$share_id?>"/>
<!--end-->

<div class="adv_ants_header"></div>

<!--main content--><?=$content?><!--/end-->

<div class='ants_adv_bottom'>
<button style="z-index: 10000;margin-left:0px;cursor: pointer;" class="btn btn-info" title="Click để đóng" onclick="$('.ants_adv_bottom').hide('slow')">X</button>
		<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
		<div class="530580154" data-ants-zone-id="530580154"></div>
</div>

<form id="luanvan_overview" method="post">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>


<form id="toefl_overview" method="post" action="http://myweb.pro.vn/doc-luan-van">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<div class='modal hide fade' id="site_map_context">
	<div class="modal-header">
	<span style="margin-left:15px">Sitemap</span>
	<button type="button" style="float:right"  title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<p><a href="http://myweb.pro.vn/" target="_new">Danh mục sách tham khảo</a></p>	
		<p><a href="http://myweb.pro.vn/giaoan/" target="_new">Danh mục giáo án</a></p>	
		<p><a href="http://myweb.pro.vn/luanvan" target="_new">Danh mục luận văn</a></p>	
		<p><a href="http://myweb.pro.vn/news/dantri" target="_new">Đọc báo</a></p>	
		<p><a href="http://myweb.pro.vn/doctruyen/danhmuc?id=3" target="_new">Đọc truyện</a></p>	
	</div>
</div>

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header" style="border-bottom:2px solid #9A9A9A;width:96.7%">
		<p style="margin-left:15px;font-size:14px">Các bạn click vào biểu tượng máy in, chọn lưu dưới dạng PDF để tải về, <a href="http://myweb.pro.vn/download/index?path=/free-pdf-to-word-doc-converter-1-1-download" style="color:red" target="_new"><strong>click vào đây</strong></a> để tải phần mềm chuyển từ pdf sang word, nếu không có tùy chọn 'Lưu dưới dạng PDF', <a href="http://myweb.pro.vn/download/index?path=/cutepdf-writer-download" target="_new"><strong>click vào đây</strong></a> tài phần mềm CutePDF để cài máy in PDF, sau khi cài xong các bạn chọn máy in là CutePDF Writer rồi bấm lưu </p>
		<button type="button" title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<iframe class='youtube_embed' width="750" height="500"></iframe>		
		<div class="in_modal_ads_right ads">
			<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js"></script>
		</div>
	</div>
</div>
<!-- end modal download_guide -->

</body>
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script type="text/javascript">
$(window).scroll(function(){

})

if (document.addEventListener) {
document.addEventListener('contextmenu', function(e) {
	$('#site_map_context').modal('show')
	$('.btn,.luanvan_social').hide()
	$('#adv_temp').attr('data-advertisement','1')
e.preventDefault();
}, false);
} 
else {
document.attachEvent('oncontextmenu', function() {
	$('#site_map_context').modal('show')
	$('.btn,.luanvan_social').hide()
	$('#adv_temp').attr('data-advertisement','1')
	window.event.returnValue = false;
});
}

$(document)

//close middle advertisement
.on('click','.intro_close_adv',function(){
	//remove class z-index-1for focusing 
		$('#download_guide,.relevant-adv').removeClass('z-index-1')
	//end
	$("#adv_temp")
		.modal("hide")
		.attr('data-advertisement','1')
	
	//social widget
	$('.luanvan_social,.btn-relevant-docs,.adv_eclick_left,.adv_micro_right,.btn-download-guide').show()
	//end
})
//end proccess


//open related document
.on('click','.btn-relevant-docs',function(){
	$('.adv_micro_right,.adv_eclick_left,.btn-download,.btn-download-guide,#___ytsubscribe_0,.eclick_left,.btn-relevant-docs').hide()
	
	//header title
	if($('#ads_zone18496').find('.ssvzHeader').find('div').find('a').length>0){
			//do not thing		
		}	
	if($('#ads_zone18496').find('.ssvzHeader').find('div').find('a').length=='0'){		
			$('.ssvzHeader div ').html('<span style="margin-left:5px">QUẢNG CÁO</span>')
	}
	//end

	//prevent invalid click
	$('#adv_temp,#download_guide').addClass('z-index-1')
	//end

	$('#adv_object').modal('show')
	$('#adv_temp').attr('data-advertisement','1')
	$('.relevant-docs,.relevant-adv').show('slow')
})
//end

//close related document
.on('click','.relevant-docs-close',function(){

	//var href=$('.ads a')[0]
	//window.open(href,'_blank')

	$('.relevant-docs,.relevant-adv').hide('slow')
	//remove z-index-1 class for focusing middle advertisement
	$('#adv_temp,#download_guide').removeClass('z-index-1')
	//end

	//btn-download, btn-download-guide
	if($('#is_download').val()=='1'){
		$('.btn-download').show()
	}

	if($('#is_download').val()=='0') {
		$('.btn-download-guide').show()
	}
	//end

	$('.adv_micro_right,.adv_eclick_left,#___ytsubscribe_0,.btn-relevant-docs').show('slow')
	$('#adv_object').modal('hide')
	$('#adv_temp').attr('data-advertisement','0')
})
//end


//header cse
.on('mouseover','.header_text_search',function(){
	$('#cse-search-box').show('slow')
	$('.header_text_search').hide()
})
.on('click','#header_cse_close',function(){
	$('#cse-search-box').hide('slow')
	$('.header_text_search').show()
})
//end

//start ready function
.ready(function(){	

	//disable context menu
	$('body').attr('oncontextmenu','return false')
	//end

//show download notification
$("#viewdoc").append('<img id="download_notification" src="http://myweb.pro.vn/images/effect/download_notification.png">')
//end

reset_ui()

})	
//end ready function


//show modal download guide
.on('click','.btn-download-guide',function(){
	
	//var href=$('.ads a')[0]
	//window.open(href,'_blank')

	//prevent invalid click
	$('.relevant-adv,#adv_temp').addClass('z-index-1')
	//end

	//hide left and right advertisement
	$('.adv_ants_header,.adv_eclick_left,.adv_micro_right').hide()
	//end

	$('.ads_micro_header').attr('data-advertisement','1')
	$('#download_guide').modal('show')
	$('#download_guide .modal-body .youtube_embed').attr('src','https://www.youtube.com/embed/za-Z2w2rb9Q?autoplay=1')
})
//end

//close modal download guide
.on('click','.close',function(){
	
	//remove z-index-1 for focusing on advertisement 
	$('.relevant-adv,#adv_temp').removeClass('z-index-1')
	//end

	//show left and right advertisement
	$('.adv_ants_header,.adv_eclick_left,.adv_micro_right').show('slow')
	//end
	
	$('.ads_micro_header').attr('data-advertisement','0')
})
//end

//start function reset_ui
function reset_ui (){
	
	// fix eclick advertisement object position
	if($('body').find('#obj1').length){
	
	}
	else{
	
	}
	//end

	//reset ui for ads slot	
	$('#viewdoc .header,.remove').remove()
	//end
	
	//facebook fanpage
	$('.doc-intro').append('<div style="margin-left:-80px!important" class="fb-like-box fb_iframe_widget"  data-colorscheme="light" data-header="true"  data-width="300px" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="false" ></div><input style="margin-top:12px!important;z-index:1!important" type="button" title="Click để xem hướng dẫn tải về" class="btn btn-info btn-download-guide" value="Hướng dẫn tải về"/><input style="margin-top:12px!important;z-index:1!important"   title="Click để xem tài liệu liên quan" class="btn btn-info btn-relevant-docs" value="Liên quan"/>')
	//end
	
	$(".doc-preview").prepend('<input type="button" title="Tải về" class="btn btn-info btn-download" value="Tải về"/>')

	//show login popup when user first register from this page
	if($("#reg_type").val()=="register"){
		$("#modal_login").modal("show")
	}
	if($("#reg_type").val()=="add_to_mylib"){
		$("#modal_user_category").modal("show")
	}
	if($("#reg_type").val()=="make_lib"){
		$("#modal_user_category").modal("show")
	}
	//end

	//start fix firefox UI error
	var isFirefox = typeof InstallTrigger !== 'undefined',share_id=$("#share_id").val(),book_title=$("#book_title").val();   
	if(isFirefox){
		$(".social_like").attr('style','bottom:524px')
	}
	//end

	$(".doc-intro").prepend('<span class="book_title box-header">'+book_title+'</span>')
	$(".doc-preview").prepend('<div class="luanvan_social"><div data-layout="default" class="g-ytsubscribe" data-channel="quantmMr"></div><div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/luanvan/detail?id='+share_id+'"></div><div class="g-plusone" data-size="medium"></div></div>')
				
	if($('#is_download').val()=='1'){
		$('.btn-download').show()
	}

	$(".relevant-docs .box ul li p").empty()
	$(".doc-intro").find('strong').remove()
	$('.box iframe,.box ul img,#header,#footer,.doc-info,.doc-content-title,.doc-content,.list-files').remove()
	$('.btn,.item_link').tooltip({placement:'bottom'})
}	
//end function reset_ui

</script>
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
</html>
