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
<link rel="stylesheet" href="http://myweb.pro.vn/css/luanvannetvn/download.css" type="text/css">
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script src="http://myweb.pro.vn/js/luanvannetvn/download.js" type="text/javascript"></script> 
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
</head>
<body>

<div class="modal hide fade" id="obj_reading_temp"></div>

<!-- start ads_micro_header advertisement 850-184 -->
<div class="modal hide fade" data-advertisement="0"  id="adv_temp">
<div class="modal-header">
	<div style="cursor:pointer;font-size:15px;margin-left:15px;" title="Click để đóng quảng cáo" class="intro_close_adv">Đóng quảng cáo</div>
</div>

<div class="modal-body">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18500.ads"></script>
</div>

</div>
<!-- end  ads_micro_header advertisement  -->

<!-- start left advertisement id:16623-->
<div class="adv_micro_left eclick_left"> 
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
</div>
<!-- end left advertisement -->

<div class="adv_2_micro_left">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17687.ads"></script>
</div>

<div class="adv_2_micro_right">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17677.ads"></script>
</div>

<!-- reset avdvertisement style -->
<link rel="stylesheet" href="http://myweb.pro.vn/css/luanvannetvn/reset.css" type="text/css">
<!--//-->

<form id="luanvan_overview" method="post">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<!-- hidden field -->
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="is_download" name="is_download" value="<?=$google_link?>" />
<input type="hidden" id="check_card_charged" name="check_card_charged" value="<?=$card?>" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
<!--end-->

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header" style="border-bottom:2px solid #9A9A9A;width:96.7%">
		<p style="margin-left:15px;font-size:14px">Các bạn click vào biểu tượng máy in, chọn lưu dưới dạng pdf để tải về, <a href="http://myweb.pro.vn/download/index?path=/free-pdf-to-word-doc-converter-1-1-download" style="color:red" target="_new"><strong>click vào đây</strong></a> để tải phần mềm chuyển từ pdf sang word, nếu không có tùy chọn 'Lưu dưới dạng PDF', <a href="http://myweb.pro.vn/download/index?path=/cutepdf-writer-download" target="_new"><strong>click vào đây</strong></a> tài phần mềm CutePDF để cài máy in PDF, sau khi cài xong các bạn chọn máy in là CutePDF Writer rồi bấm lưu </p>
		<button type="button" style="margin-top:-45px!important;color:red;font-weight:bold;position:absolute;margin-left: 98%;" title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<iframe class='youtube_embed' width="750" height="500"></iframe>		
		<div class="in_modal_ads_right">
				<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18496.ads"></script>
		</div>
	</div>
</div>
<!-- end modal download_guide -->

<!--main content-->
<?=$content?>
<!--end-->

<!-- show advertisement when user click related document-->
<div class="relevant-adv">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16591.ads"></script>
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18528.ads"></script>
</div>
<!--//-->

<div class='bottom_sticky_adv' style="display:none">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18532.ads"></script>
</div>

<div class="google_bottom_ads" style="display:none"></div>
<input type="hidden" id="share_id" value="<?=$share_id?>"/>

</body>

</html>
