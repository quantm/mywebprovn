<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="http://myweb.pro.vn/luanvan/detail?id=<?=$share_id?>" />
<meta name="description" content="<?=$book_description?>" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<base href="<?=$base_link?>">
<link rel="canonical" href="http://myweb.pro.vn/luanvan/detail?id=<?=$share_id?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvan.css" type="text/css">
<style type="text/css">
	.ants_380x90 {
	  margin-left: 403px!important;
	}
</style>
</head>
<body>

<div class="modal hide fade" id="obj_reading_temp"></div>

<!-- start left advertisement-->
<div class="adv_micro_left eclick_left" style="margin-top:65px!important"> 
	<!--- Script ANTS - 160x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
	<!--- end ANTS Script -->
</div>
<!-- end left advertisement -->


<div class="adv_ants_right">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
</div>

<div class="ads_micro_left">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>
</div>

<!-- reset avdvertisement style -->
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/reset.css" type="text/css">
<!--//-->

<form id="luanvan_overview" method="post">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<!-- hidden field -->
<input type="hidden" id="is_modal_download_guide" name="is_modal_download_guide" value="<?=$is_modal_download_guide?>" />
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" id="thesis_id" value="<?=$share_id?>"/>
<input type="hidden" id="like_count" value="<?=$like?>"/>
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
<!--end-->

<!--modal advertisement left -->
<div class='modal hide fade ads' id='modal_advertisement_left'>
    <div class="modal-header" style="font-size:14px;margin-left:5px">Quảng Cáo</div>
	<div class='modal-body'>
			<div class="ads_code_micro">
				<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18496.ads"></script>
			</div>
	</div>
</div>
<!--//-->

<div class='modal hide fade' id="site_map_context">
	<div class="modal-header">
	<span style="margin-left:15px">Sitemap</span>
	<button type="button" style="float:right"  title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<p><a href="http://myweb.pro.vn/" target="_new">Danh mục sách tham khảo</a></p>	
		<p><a href="http://myweb.pro.vn/giaoan/" target="_new">Danh mục giáo án</a></p>	
		<p><a href="http://myweb.pro.vn/luanvan" target="_new">Danh mục luận văn</a></p>	
		<p><a href="http://myweb.pro.vn/game/" target="_new">Chơi game</a></p>	
	</div>
</div>

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header">
		<p style="margin-left:15px;font-size:14px">Các bạn click vào biểu tượng máy in, chọn 'Lưu dưới dạng PDF' để tải về, nếu không có tùy chọn 'Lưu dưới dạng PDF', <a href="http://myweb.pro.vn/download/index?path=/cutepdf-writer-download" target="_new"><strong>click vào đây</strong></a> tài phần mềm CutePDF để cài máy in PDF, sau khi cài xong các bạn chọn máy in là CutePDF Writer rồi bấm lưu.  <a href="http://sinhvienit.net/forum/abbyy-finereader-11-corporate-edition-full-crack-phan-mem-chuyen-doi-tai-lieu-giay-pdf-sang-van-ban-dien-tu-co-the-soan-thao.212936.html" target="_blank">Click vào đây</a> để tải phần mềm chuyển pdf sang word</p>
		<button type="button"  title="Đóng" style="margin-top:-40px!important" class="close" data-dismiss="modal">×</button>
	</div>
	
	<div class="modal-body">
		<iframe class='youtube_embed' width="838" height="500"></iframe>		
	</div>

</div>
<!-- end modal download_guide -->

<div class="adv_ants_header"></div>

<!--main content-->
<?=$content?>
<!--end-->

<div class='ants_adv_bottom'>
<button style="z-index: 10000;margin-left:0px;cursor: pointer;" class="btn btn-info" title="Click để đóng" onclick="$('.ants_adv_bottom').hide('slow')">X</button>
		<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
		<div class="530580154" data-ants-zone-id="530580154"></div>
</div>

<!-- show advertisement when user click related document-->
<div class="relevant-adv"></div>
<!--//-->

</body>
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script src="http://xahoihoctap.net.vn/js/luanvannetvn/luanvan.js" type="text/javascript"></script> 
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
</html>
