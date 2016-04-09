<html>
<head>
<!-- start meta -->
<!--<meta http-equiv="refresh" content="5">-->
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta property="og:title" content="Tài liệu học tập" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/tailieuhoctap.png" />
<meta property="og:type" content="book" />
<meta property="og:description" content="Chia sẻ tài liệu hay - Chung tay lan tỏa tri thức" />
<!-- end meta  -->

<link rel="stylesheet" href="/css/tailieuhoctap/my.css" type="text/css">

<script type="text/javascript"  src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
<script>
$(document).ready(function(){
	post_ins_db_lv()
	$("#header_ebook").remove()
})


function post_ins_db_lv(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$("#documents .box ul li").each(function(value,index){
ins_db_title.push($(this).find('.illustration').attr('alt'))
ins_db_thumbs.push($(this).find('.illustration').attr('src'))
ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.illustration').next().attr('href'))
$.ajax({
content:'text/html',
type:'get',
url:'/luanvan/get_book',
data:{
csrf_test_name:$("#csrf_test_name").val(),
name:ins_db_title[value],
path:ins_db_link[value],
thumbs:ins_db_thumbs[value],
description:ins_db_desc[value]
},
success:function(){
	$("#get_page").submit()
}
})
})
}
</script>

</head>
<form id="get_page" action="/luanvan/get_luan_van/">
<input type="hidden" id="page" name="page" value="<?=$page?>"/>
</form>
<!--left category --->
<div class="left_category">
<?=$left?>
</div>
<!--end left category-->

<!-- start social like -->
<div class="social_like">
<div class="fb-share-button" data-href="http://myweb.pro.vn/book/index/" data-layout="box_count"></div>

<div class='clr'></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
<div class="g-plusone" data-size="medium"></div>

<div class='clr'></div>
</div>
<!-- end social like -->


<div class="main_content">
<?=$main?>
<?=$pagination?>
</div>
<? $this->load->view('footer')?>

<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
    <input type="hidden" name="cof" value="FORID:10" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" style="width:325px;margin-left:60px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" name="q" size="115" placeholder="Enter để tìm sách..."/>
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
  </div>
</form>

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
