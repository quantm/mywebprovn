<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="http://myweb.pro.vn/book/detail?id=<?=$share_id?>" />
<meta name="description" content="<?=$book_description?>" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<link rel="canonical" href="http://myweb.pro.vn/book/detail?id=<?=$share_id?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="/css/tailieuhoctap/download.css" type="text/css">
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script src="/js/tailieuhoctap/download.js" type="text/javascript"></script> 
</head>
<body>

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


<!-- start social like -->
<div style="display:none" class="social_link">

<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/book/detail?id=<?=$share_id?>"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>
<!-- end social like -->

<!-- start left advertisement -->
<div class="ads_wrapper_left">

</div>
<!-- end left advertisement -->

<div class='left_category'><?=$left_category?></div>
<div class='main_content'></div>
<!--start modal -->
<div style="margin-top: 60%;" class="modal hide fade" id="modal_book_adding">
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

<!--start modal library -->
<div class="modal hide fade" id="modal_libary" style="margin-top:135px">
<div class="modal-header">
<h3 style="margin-left:1%;font-size:15px">Đăng ký tài khoản</h3>
</div>
<div style="font-size:15px" class="modal-body" >
Bạn nên đăng ký tài khoản để có thể tạo riêng cho mình một thư viện tham khảo trên hệ thống website này. Bạn có muốn đăng ký tài khoản không ?
</div>  
<div class="modal-footer">
<button style="z-index:10000" type="button" class="btn btn-success" id="confirm_account_yes" data-dismiss="modal">Có</button>
<button style="z-index:10000" type="button" class="btn btn-inverse" id="confirm_account_no" data-dismiss="modal">Không</button>
</div>
</div>
<!--end-->

<form id="toefl_overview" method="post" action="http://myweb.pro.vn/book/detail/">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" id="is_download" name="is_download" value="<?=$is_download?>"/>
<input type="hidden" id="type" name="type"/>
<input type="hidden" id="lib_book_id" name="lib_book_id"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
<div id="comment_temp" style="display:none">
<?php foreach($data_comment as $key):?>
<div class="book_user_comment">
<img style="width:32px!important" class="user_avatar" src="<?php 
if($key['facebook_id']!=''&& $key['USER_IMAGE'] =='') echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
if($key['facebook_id']=='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE'];
if($key['facebook_id']=='' && $key['USER_IMAGE'] =='') echo '/images/no_avatar.png';
if($key['facebook_id']!='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE']; 
if($key['facebook_id'] == $key['USER_IMAGE'] && $key['USER_IMAGE'] !='')  echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
?>" 
alt="<?=$key['NAME']?>"/>
<span class="user_comment"><?=$key['NAME']?></span>
<div class="comment_content"><?=$key['COMMENT']?></div>
</div>
<?php endforeach;?>
</div>

<input type="hidden" value="<?=$book_id?>" id="parse_book"/>
<input type="hidden" value="<?=$share_id?>" id="share_id"/>
<input type="hidden" id="reg_type" value="<?=$type?>"/>

<!--start modal category fetch-->
<div class="modal" id="fetch_book_process" style="margin-top:70%">
	<div class="modal-body">
		<img src="/images/ajax_load_green.gif"/>
		<span style="margin-left:5px"></span>
	</div>
</div>
<!--end modal-->

<!--start modal read online-->
<div class="modal hide fade" id="modal_read_online">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<div class="modal-body">
		
	</div>       
</div>
<!--end modal-->
<?=$content?>

<div>

</div>
</body>
</html>
