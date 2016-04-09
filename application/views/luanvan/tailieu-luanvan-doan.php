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
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/tailieu-luanvan-doan.css" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/style.css" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/global.css" type="text/css">
<base href="<?=$base_link?>">
<style type="text/css">
.lazada_affiliate_right {
  position: fixed;
  margin-left: 77.6%;
  margin-top: 42px !important;
  z-index:9999;
}
</style>
</head>
<body>

<div class='modal hide fade' id='adv_object'></div>

<!-- start left advertisement-->
<div class="adv_micro_left eclick_left" style="margin-top: 42px!important">
	<!--- Script ANTS - 160x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
	<!--- end ANTS Script -->
</div>
<!-- end left advertisement -->

<div class="lazada_affiliate_left_banner"></div>

<div class="adv_ants_right" id="300x600_ants_right" style="margin-top: 42px!important;z-index:10000">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
</div>

<div class='lazada_affiliate_right ads'>
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script>
</div>


<!-- show advertisement when user click related document-->
<div class="relevant-adv"></div>
<!--//-->

<!-- reset avdvertisement style -->
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/reset.css" type="text/css">
<!--//-->

<!-- hidden field -->
<input type="hidden" id="is_modal_download_guide" name="is_modal_download_guide" value="<?=$is_modal_download_guide?>" />
<input type="hidden" id="hidden_countdown" name="hidden_countdown" />
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" id="like_count" value="<?=$like?>"/>
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
<input type="hidden" id="thesis_id" name="share_id" value="<?=$share_id?>"/>
<!--end-->

<div class="adv_ants_header"></div>

<div class='lazada_affiliate_header'>
<!-- Javascript Ad Tag: 15700 -->
<div id="lazada15700Dxnb25"></div>
<script src="http://lazada.go2cloud.org/aff_ad?campaign_id=15700&aff_id=56672&format=javascript&format=js&divid=lazada15700Dxnb25" type="text/javascript"></script>
<noscript><iframe src="http://lazada.go2cloud.org/aff_ad?campaign_id=15700&aff_id=56672&format=javascript&format=iframe" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" width="728" height="90"></iframe></noscript>
<!-- // End Ad Tag -->
</div>


<!--main content-->
<?=$content?>
<!--/end-->

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
		<p><a href="http://myweb.pro.vn/game/" target="_new">Chơi game</a></p>	
	</div>
</div>

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header" style="border-bottom:2px solid #9A9A9A;width:96.7%">
		<p style="margin-left:15px;font-size:14px">Các bạn click vào biểu tượng máy in, chọn lưu dưới dạng PDF để tải về, nếu không có tùy chọn 'Lưu dưới dạng PDF', <a href="http://myweb.pro.vn/download/index?path=/cutepdf-writer-download" target="_new"><strong>click vào đây</strong></a> tài phần mềm CutePDF để cài máy in PDF, sau khi cài xong các bạn chọn máy in là CutePDF Writer rồi bấm lưu.  <a href="http://sinhvienit.net/forum/abbyy-finereader-11-corporate-edition-full-crack-phan-mem-chuyen-doi-tai-lieu-giay-pdf-sang-van-ban-dien-tu-co-the-soan-thao.212936.html" target="_blank">Click vào đây</a> để tải phần mềm chuyển pdf sang word</p>
		<button type="button" style="margin-top:-40px!important" 
		title="Đóng" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<iframe class='youtube_embed' width="750" height="500"></iframe>		
		<div class="in_modal_ads_right">
					<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18496.ads"></script>
		</div>
	</div>
</div>
<!-- end modal download_guide -->

</body>
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/luanvannetvn/tailieu_luanvan_doan.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
</html>
