<html>
<head>
<!-- start meta -->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tài liệu học tập" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/tailieuhoctap.png" />
<meta property="og:type" content="book" />
<meta property="og:description" content="Chia sẻ tài liệu hay - Chung tay lan tỏa tri thức" />
<!-- end meta  -->

<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="/css/tailieuhoctap/my.css" type="text/css">
<link rel="stylesheet" href="/css/jquery-ui.css">
<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	$("#header_ebook,.khung_hinh").remove()
})
</script>
<script type="text/javascript" src="/js/tailieuhoctap/my.js"></script>
</head>

<!--left category --->
<div class="left_category">
<?=$left?>
</div>
<!--end left category-->

<div class="main_content">
	<div class="adv_ants_right">
		<!--- Script ANTS - 160x600 -->
		<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324811.js"></script>
		<!--- end ANTS Script -->
	</div>
<?=$main?>
<?=$pagination?>
</div>
<? $this->load->view('footer')?>

<div class="ads_micro_left">

</div>

<form id="book_detail" method="post" action="/book/detail/"  enctype="multipart/form-data">
<input type="hidden" id="book_id" name="book_id"/>
<input type="hidden" id="page_id" name="page_id"/>
<input type="hidden" id="web_referer" name="web_referer"/>
<input type="hidden" id="book_category" name="book_category"/>
<input type="hidden" id="book_title" name="book_title"/>
<input type="hidden" id="book_thumbs" name="book_thumbs"/>
<input type="hidden" id="book_description" name="book_description"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
<input type="hidden" id="reg_type" value="<?=$type?>"/>


<form id="toefl_overview" method="post" action="http://myweb.pro.vn/book/index/">
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<div class="modal" id="fetch_book_process" style="margin-top:5%">
	<div class="modal-body">
		<img src="/public/images/ajax_load_green.gif"/>
		<span style="margin-left:5px"></span>
	</div>
</div>

</body>
</html>
