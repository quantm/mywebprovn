<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>-Thư viện tài liệu www.myweb.pro.vn" />
<meta property="og:url" content="<?=$share?>" />
<meta name="description" content="<?=$book_description?>-Thư viện tài liệu www.myweb.pro.vn" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/tailieuhoctap/download.css" type="text/css">
<link rel="canonical" href="<?=$share?>" />
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script src="http://xahoihoctap.net.vn/js/tailieuhoctap/download.js" async type="text/javascript"></script>
</head>
<body>

<form id="book_detail" method="post" action="/doc-sach-tham-khao"  enctype="multipart/form-data">
<input type="hidden" id="page_id" name="page_id"/>
<input type="hidden" id="book_category" name="book_category"/>
<input type="hidden" id="book_title" name="book_title"/>
<input type="hidden" id="book_thumbs" name="book_thumbs" value="<?=$book_thumbs?>"/>
<input type="hidden" id="book_description" name="book_description"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<!--start view_book_wrapper-->
<div class='view_book_wrapper'>	

<!--start modal -->
<div style="margin-top: -5%;" class="modal hide fade" id="modal_book_adding">
<div class="modal-header">
	<h5></h5>
</div>
<div class="modal-body">
	<h5>Bạn đã thêm sách này trong thư viện</h4>
</div>       
<div class="modal-footer">
<button type="button" class="btn btn-primary" style="z-index:1000000000" data-dismiss="modal">Đóng</button>
</div>
</div>
<!--end modal-->

<form id="toefl_overview" method="post" action="/doc-sach-tham-khao">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" id="is_download" name="is_download" value="<?=$is_download?>"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<input type="hidden" value="<?=$share_id?>" id="share_id"/>
<input type="hidden" id="type" name="type" value="<?=$type?>" />
<input type="hidden" id="category_name" value="<?=$category?>"/>
<input type="hidden" id="category_id" value="<?=$category_id?>"/>
<input type="hidden" id="file_extension" value="<?=$file_extension?>"/>
<input type="hidden" id="ebook_type" name="ebook_type" value="book" />

<input data-type="download" type="button" class="btn btn-success btn_download" title="Nếu không xem trước được (vì server quá tải) ,các bạn vui lòng tải về để đọc" value="Tải về">

<!-- facebook shared fanppage -->
<div class="fb-like book-like" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
<!--end-->

<div class="book_category">
<span title="Đóng" id="close_category">×</span>
<?php foreach($category_names as $key):?>
	<div><a href="/book/category?category=<?=$key['CATEGORY']?>" target="_new"><?=$key['CATEGORY']?></a></div>
<?php endforeach;?>
</div>

<div class="book_header">
<h2 class='book_name font-effect-putting-green'>
<span class="general_category">Danh mục tổng quát</span> <i class='fa fa-long-arrow-right'></i>
<a title='<?=$cate_name?>' href='/book/category/?id_category=<?=$id_cate?>' target='_new'><?=$cate_name?></a> 
<i class='fa fa-long-arrow-right'></i> <?=$book_title?>
</h2>
</div>
<iframe src="<?=$embed_url?>"  class='book_pdf_html'></iframe>
<!--/view_book_wrapper-->

<img class="download_notification" src="/images/icon/open_download.png"> 
</body>
</html>
