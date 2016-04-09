<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?> - www.myweb.pro.vn" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="http://www.myweb.pro.vn/doc-luan-van?id=<?=$share_id?>" />
<meta name="description" content="<?=$book_description?> - www.myweb.pro.vn" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<base href="<?=$base_link?>">
<link rel="canonical" href="http://xahoihoctap.net.vn/doc-luan-van?id=<?=$share_id?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/download.css" type="text/css">
<style type="text/css">
#inner {
	margin-top: 30px!important;
}
.adv_ants_header {
	margin-left:165px!important;
	margin-top:60px!important;
}
.book_title {
	margin-top:70px!important;
}
.doc-preview object, .doc-preview embed {
	width: 890px;
}
.btn-download-guide-obj1-onload {
	margin-left: 235px!important;
}
#inner {
	margin-left: 3%!important;
}
.adv_ants_right {
	position: fixed;
	margin-left: 78%;
	margin-top: 70px;
}
.download-guide-show-adv *,.adv_ants_right *, .adv_micro_left *,.adv_ants_header * {
	border:none!important;
}
.ssvzBorder {
	background:transparent!important;
}
.copy_text {
	margin-left: 32%!important;
}
.like-doc {
	display:none;
}
.adv_micro_left {
	margin-top:80px !important;
}
</style>
</head>
<body>

<div class="adv_micro_left eclick_left">
	<!--- Script ANTS - 160x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="519993167" data-ants-zone-id="519993167"></div>
	<!--- end ANTS Script -->
</div>

<div class="adv_ants_right">
<canvas title="Những thứ tôi trân trọng không tốn một xu nào cả. Rõ ràng tài nguyên quý giá nhất mà chúng ta có là thời gian - Steve Jobs" id="canvas" width="400" height="400"></canvas>
<div id="professor_art_ads">
	<!--- Script ANTS - 300x250 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="530580154" data-ants-zone-id="530580154"></div>
	<!--- end ANTS Script -->
</div>
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
<img src="http://xahoihoctap.net.vn/images/fb/child_read_the_whole_world.jpg" style="display:none">
</div>

<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/luanvannetvn/reset.css" type="text/css">

<form id="luanvan_overview" method="post">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<!-- hidden field -->
<input type="hidden" id="is_modal_download_guide" name="is_modal_download_guide" value="<?=$is_modal_download_guide?>" />
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" id="share_id" value="<?=$share_id?>"/>
<input type="hidden" id="like_count" value="<?=$like?>"/>
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
<input type="hidden" id="happy_reading" name="happy_reading" value="<?=$happy_reading?>" />
<!--end-->

<div class='modal hide fade' id="site_map_context">
<div class="modal-header">
<span style="margin-left:15px">Sitemap</span>
<button type="button" style="float:right"  title="Đóng" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
	<p><a href="http://xahoihoctap.net.vn/giaoan/" target="_new">Danh mục giáo án</a></p>	
	<p><a href="http://xahoihoctap.net.vn/luanvan" target="_new">Danh mục luận văn</a></p>	
	<p><a href="http://xahoihoctap.net.vn/game" target="_new">Tổng hợp game</a></p>	
</div>
</div>

<?=$content?>

<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script  type="text/javascript" src="http://xahoihoctap.net.vn/js/luanvannetvn/download.js"></script> 
<script src="https://apis.google.com/js/platform.js" async defer>{lang: 'vi'}</script>

</body>

</html>
