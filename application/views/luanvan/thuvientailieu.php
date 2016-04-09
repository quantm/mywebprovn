<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="http://myweb.pro.vn/luanvan/doc-luan-van?id=<?=$share_id?>" />
<meta name="description" content="<?=$book_description?> - www.myweb.pro.vn" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->

<base href="<?=$base_link?>">
<link rel="canonical" href="http://myweb.pro.vn/luanvan/doc-luan-van?id=<?=$share_id?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/download.css" type="text/css">
</head>
<body>

<div class="modal hide fade" id="obj_reading_temp"></div>

<!-- start left advertisement-->
<div class="adv_micro_left eclick_left"> 
	<div id="ads_box_17687" style="position:fixed;margin-top: 10px;">
		<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
	</div>
</div>
<!-- end left advertisement -->

<div class="adv_ants_right" data-advertisement="1" style="margin-left:80%!important;margin-top:35px">
<div class="zone-2569" style="margin-left:100px;position:fixed;margin-top:10px">
	<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2569.js"></script>
</div>
</div>

<!-- reset avdvertisement style -->
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/reset.css" type="text/css">
<!--//-->

<form id="luanvan_overview" method="get">
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
<input type="hidden" id="is_update" name="is_update" value="<?=$is_update?>" />
<input type="hidden" id="is_relax" name="is_relax" value="<?=$is_relax?>" />
<!--end-->

<!--modal advertisement left -->
<div class='modal hide fade ads' id='modal_advertisement_left'>
	<div class='modal-body'>			
			<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18496.ads"></script>
	</div>
</div>
<!--//-->

<div class='modal hide fade' id="site_map_context">
	<div class="modal-header">
	<span style="margin-left:15px">Sitemap</span>
	<button type="button" style="float:right;z-index:100000"  title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<p><a href="http://myweb.pro.vn/" target="_new">Danh mục sách tham khảo</a></p>	
		<p><a href="http://myweb.pro.vn/giaoan/" target="_new">Danh mục giáo án</a></p>	
		<p><a href="http://myweb.pro.vn/congnghe" target="_new">Tin khoa học</a></p>	
		<p><a href="http://myweb.pro.vn/cuoc-song/cuoc-song/lncs" target="_new">Blog cuộc sống</a></p>	
		<p><a href="http://myweb.pro.vn/so-sanh-gia/" target="_new">Công cụ so sánh giá</a></p>
		<p><a href="http://myweb.pro.vn/game/" target="_new">Chơi game</a></p>	
	</div>
</div>

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header">
		<p style="margin-left:15px;font-size:14px">Các bạn click vào biểu tượng máy in, chọn lưu dưới dạng pdf để tải về, nếu không có tùy chọn 'Lưu dưới dạng PDF', <a href="http://myweb.pro.vn/download/index?path=/cutepdf-writer-download" target="_new"><strong>click vào đây</strong></a> tài phần mềm CutePDF để cài máy in PDF, sau khi cài xong các bạn chọn máy in là CutePDF Writer rồi bấm lưu.  <a href="http://sinhvienit.net/forum/abbyy-finereader-11-corporate-edition-full-crack-phan-mem-chuyen-doi-tai-lieu-giay-pdf-sang-van-ban-dien-tu-co-the-soan-thao.212936.html" target="_blank">Click vào đây</a> để tải phần mềm chuyển pdf sang word</p>
		<button type="button"  title="Đóng" style="margin-top:-40px!important" class="close" data-dismiss="modal">×</button>
	</div>
	
	<div class="modal-body">
		<iframe class='youtube_embed' width="838" height="500"></iframe>		
	</div>

</div>
<!-- end modal download_guide -->

<!-- ants header adv -->
<div class="adv_ants_header">
	<!--- Script ANTS - 728x90 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324894" data-ants-zone-id="517324894"></div>
	<!--- end ANTS Script -->
</div>
<!--//-->

<div class="lazada_affiliate_header">

</div>

<!--main content-->
<?=$content?>
<!--end-->

<!-- show advertisement when user click related document-->
<div class="relevant-adv"></div>
<!--//-->

<div class='ants_adv_bottom'>
<button style="z-index: 10000;margin-left:0px;cursor: pointer;" class="btn btn-info" title="Click để đóng" onclick="$('.ants_adv_bottom').hide('slow')">X</button>
		<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
		<div class="530580154" data-ants-zone-id="530580154"></div>
</div>

</body>

</html>
