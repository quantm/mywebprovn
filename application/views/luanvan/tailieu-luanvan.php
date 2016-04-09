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
<style type="text/css">
.ants_adv_bottom *, .adv_ants_right *,.lazada_affiliate_right * {
border:none!important;
}
.ssvzBorder {
background:none!important;
}
#save-thesis-notes{
margin-left: 75%;
position: absolute;
margin-top: 13px;
}
.btn-relevant-docs,.btn-download-guide {
margin-top:33px !important;
}

</style>
</head>
<body>

<div class='modal hide fade' id='adv_object'></div>

<div class="adv_ants_left">
<div style="display:none"><script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_17760.ads"></script></div>
<!--- Script ANTS - 300x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="521621655" data-ants-zone-id="521621655"></div>
<!--- end ANTS Script -->
</div>

<div class="adv_ants_right" style="margin-left:90.5%! important">
<!--- Script ANTS - 120x600 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324793" data-ants-zone-id="517324793"></div>
<!--- end ANTS Script -->
</div>

<div class="relevant-adv"  style="margin-top: 12.5%;"></div>


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

<!--main content--><?=$content?><!--/end-->

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
<p><a href="http://myweb.pro.vn/cuoc-song/cuoc-song/lncs" target="_new">Blog lặng nhìn cuộc sống</a></p>	
<p><a href="http://myweb.pro.vn/game/" target="_new">Chơi game</a></p>	
</div>
</div>

</body>

<div class="modal hide fade" id="thesis_text_note_ins_img">
<div class="modal-header">
<p>Chèn ảnh vào ghi chú của bạn</p>
<button type="button" style="float:right;z-index:1000;margin-top: -35px;"  title="Đóng" class="close" data-dismiss="modal">×</button>
</div>

<div class="modal-body">
<p> Đường dẫn ảnh : <input type="text" placeholder="Dán đường dẫn ảnh vào đây" id="text_notes_img_path"/> 
<input id="btn-ins-image" class="btn btn-primary" style="width:75px;height: 25px;margin-top: 0px" value="Chèn ảnh"/>
</div>

</div>

<div class="modal hide fade" id="thesis_text_note_ins_video">
<div class="modal-header">
<p>Chèn video vào ghi chú của bạn</p>
<button type="button" style="float:right;z-index:1000;margin-top: -35px;"  title="Đóng" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
<p> Đường dẫn video : <input type="text" placeholder="Dán đường dẫn video vào đây" id="text_notes_video_path"/> 
<input id="btn-ins-video" class="btn btn-primary" style="width:75px;height: 25px;margin-top: 0px" value="Chèn video"/>
</div>
</div>

<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script  src="http://xahoihoctap.net.vn/js/luanvannetvn/tailieu_luanvan.js" type="text/javascript" charset="utf-8"></script>
</html>
