<meta property="og:title" content="<?=$title?>" />
<meta property="og:image" content="<?=$thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$description?>" />
<meta property="og:url" content="http://myweb.pro.vn/book/detail?id=<?=$share_id?>" />
<meta name="description" content="<?=$description?>" />
<meta name="image" content="<?=$thumbs?>" />
<!-- end meta  -->
<link rel="canonical" href="http://myweb.pro.vn/mbook?id=<?=$share_id?>" />

<script type="text/javascript">
$(document).ready(function(){
//start add google custom search in the header
$("#game_header_search")
.removeAttr("method")
.empty()
.attr("id","cse-search-box")
.attr("action","http://myweb.pro.vn/book/cse/")
.html($(".frm_cse-search-box").html())
$(".frm_cse-search-box").remove()
//end
})
//start btn_add_to_my_library
	.on('click','#btn-add-book',function(){
				$("#cse-search-box").attr('action','/user/account?tab=mylib')
				if($("#is_logged").val()!="1"){
				$("#modal_login")
					.attr('style','z-index:1000000000')
					.modal('show')
				}
				if($("#is_logged").val()=="1") {
				//start ajax
				$.ajax({
					content:'text/html',
					type:'post',
					url:'/book/mylibcheckexist/',
					data:{
						csrf_test_name:$("#csrf_test_name").val(),
						book_to_add:$("#share_id").val()
					},
					success:function(data){
						if(data=="0"){
						//start ajax call
						$.ajax({
							content:'text/html',
							type:'post',
							url:'/user/account?tab=mylib',
							data:{
								lib_book_id:$("#share_id").val(),
								csrf_test_name:$("#csrf_test_name").val()
							},
							success:function(){
								$("#modal_book_adding")
									.modal("show")
									.find('h3')
									.html('Đã thêm sách vào thư viện của bạn')
									
							}
						})
						//end ajax call
						}
						if(data=="1"){
							$("#modal_book_adding").modal('show')
						}
					}
				})
				
				}
})
//end
</script>
<style>
object{
	margin-top: 65px;	
	margin-left: 8px;	
}
.header {
display: block;
width: 100%;
margin-top: 30px;
position: absolute;
margin-left:15px;
}
body {
overflow-x:hidden;
}
.header span {
font-size: 18px;
}
.social_like div{
margin-left:10px !important;
}
#___plusone_0 {
margin-top: -11%!important;
margin-left: 60%!important;
}
.fb-share-button {
	margin-top:6px;
}
.social_like {
height: 30px; 
bottom: 87.5%; 
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fff), color-stop(1, #F9F9F9));
background: -moz-linear-gradient(top, #fff, #F9F9F9);
border: 1px solid #ccc;
float: left;
padding: 0 0 3px 0;
position: absolute;
left: 0;
z-index: 10;
border-radius: 2px 2px 2px 2px;
box-shadow: 2px 2px 5px rgba(0,0,0,0.3);
width: 175px;
margin-left: 62.5%;
}
#btn-add-book {
margin-left: 50%!important;
height: 35px!important;
width: 140px!important;
text-shadow: 0 0.032em 0 #611C1C, 0px 0.15em 0.11em rgba(0,0,0,0.15), 0px 0.25em 0.021em rgba(0,0,0,0.1), 0px 0.32em 0.32em rgba(0,0,0,0.1);
top:25%!important;
position: absolute!important;
}
</style>
<form style="display:none" action="http://myweb.pro.vn/book/cse/" class="frm_cse-search-box">
<div>
<input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681" />
<input type="hidden" name="cof" value="FORID:10" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="text" style="width:325px;margin-left:45px;background:#FFFFFF url(http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif) right no-repeat" name="q" size="115" placeholder="Enter để tìm kiếm..." />
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</div>
</form>
<div class="header">
	<span><?=$title?></span>
	<input type="button" class="btn social_like" value="Thêm vào thư viện" id="btn-add-book">
</div>

<!-- start social like -->
<div class="social_like">
<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/mbook?id=<?=$share_id?>"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>
<!-- end social like -->

<object class="reading_player" width="75%" height="88%" name="plugin" data="<?=$path?>" type="application/pdf"></object>
<div id="reading_fb_comment" class="fb-comments tab-pane  fade in active" data-width="600px"  data-href="http://myweb.pro.vn/mbook?id=<?=$share_id?>"  data-numposts="5" data-colorscheme="light"></div>
<input type="hidden" value="<?=$share_id?>" id="share_id"/>
<!--start modal -->
<div style="margin-top: -5%;" class="modal hide fade" id="modal_book_adding">
<div class="modal-header">
</div>
<div class="modal-body">
<h3>Bạn đã thêm sách này trong thư viện</h3>
</div>       
<div class="modal-footer">
<button type="button" class="btn btn-primary" style="z-index:1000000000" data-dismiss="modal">Đóng</button>
</div>
</div>
<!--end modal-->

<form id="toefl_overview" method="post" action="http://myweb.pro.vn/book/detail/">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" id="type" name="type"/>
<input type="hidden" id="lib_book_id" name="lib_book_id"/>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>