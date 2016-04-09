<meta property="og:title" content="<?=$name?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$description?>" />
<meta property="og:url" content="<?=$share?>" />
<meta name="description" content="<?=$description?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<style>
	.book_pdf_html{
		width: 78%;
		height: 595px;
	}
	.book-thumbs{
		position:absolute;
		width:140px;
		height:180px;
		margin-left:25px;
	}
	.tb_dang_ky {
		float: right;
		position: fixed;
		width: 100%;
		margin-top: -15px;
		margin-left: 15px;
		font-size: 14px;
	}
	.book_name {
		margin-top: 70px;
		font-size: 15px;
		margin-left: 25px;
		line-height: 17px;
		max-width: 730px;
	}
	.book_description {
		margin-left: 185px;
		font-size: 15px;
		text-align: justify;
		max-width: 545px;
		position: absolute;
	}
	.social_link div{
		margin-left:10px !important;
	}
	.social_link {
		height: 30px;
		float: left;
		padding: 0 0 3px 0;
		position: absolute;
		left: 0;
		z-index: 10;
		width: 229px;
		margin-left: 1%;
		margin-top: -85px;
	}
	.book_wrapper {
		background-color: #FFFFFF;
		position: absolute;
		margin-top: 50px;
		width: 75%;
		border-radius: 15px 15px 15px 15px;
		margin-left: 24%;
		height: 85%;
	}
	body {
		background: #CBCBBE !important;
	}
	#btn-download-pc {
		position: fixed;
		margin-top: 36%;
		margin-left: 57px;
	}

	#btn-read-online{
		margin-left: 25px;
		position: absolute;
		margin-top:185px;
	}
	#modal_read_online{
		margin-top: -17.5%;
		display: block;
		width: 90%;
		margin-left: -45%;
		height: 88%;
	}
	#modal_read_online h1 {
		height:4px;
	}
	.embed_book{
		width: 98%;
		height: 90%;
		margin-top: 25px;
	}
	.modal_book_name{
		float: left;
		margin-top: 7px;
		margin-left: 300px;
		font-size: 14px;
	}
	.ads_ants_bottom {
	  position: absolute;
	  margin-top: 30%;
	  margin-left: 2%;
	}
	.adv_ants_right * {
		border:none!important;
		background-color:white;
	}
	.adv_ants_left {
		position: fixed;
		margin-top: 23px;
		margin-left: 5px;
	}
	#ads_zone16553 {
		margin-top: 18%;
	}
	#ssvzone_16552,#ssvzone_16601,.ssvzBorder {
		border: none!important;
		background: #FFFFFF!important;
	}
	.adv_ants_right {
		float: right;
		margin-top: -8%;
		margin-right: 1.5%;
	}
	.in_modal_ads_right {
		float: right;
		margin-right: 57px;
		position: fixed;
		margin-left: 76.7%;
		margin-top: 10%;
	}
	.in_modal_ads_right * {
		border:none!important;
		background-color:white!important;
	}
	#read_online_pdf,#read_online_flash {
		display: block;
		width: 100%;
		margin-left: -50%;
		margin-top: -22.1%;
		height: 100%;
		overflow: hidden;
	}
	.modal-z-index {
		z-index: 10000000;
	}
	.read_online_html {
		overflow-y: scroll!important;
		overflow-x: hidden!important;
	}
	#read_online_flash embed
	{
		height: 595px!important;
		width: 77%!important;
	}
	#viewerPlaceHolder object 	
	{
		height: 595px!important;
		width: 1000px!important;
	}

/*voer*/
.module-title {
  margin-left:14%;
}
.module-view-content {
  max-width: 800px;
  margin-left: 14%;
  text-align: justify;
  font-size: 15px;
}
.module-view-content .title {
  font-size: 18px;
  color: #317EAC;
}
.module-view-category,.navbar-header,.right-row,#material-right-side,.author-module-list,.remove {
	display:none;
}
.collection-view-title {
	margin-left: 14%;
}
.collection-view-title h1,.collection-view-title h2 {
  font-size: 18px!important;
  color: rgb(0, 178, 255)!important;
}
/*end*/

.fb-comments{
   margin-left: 11%;
   margin-top: 1%;
}
.addthis_toolbox {
   margin-left: 14%;
}
.btn-download-guide {
  position: absolute;
  margin-top: 1px;
  margin-left: 145px;
  height: 27px;
  width: 145px!important;
  z-index: 1000000;
  cursor: pointer;
}

#download_guide .in_modal_ads_right {
	position: absolute;
	margin-top: -48%!important;
}
#download_guide {
	display: block;
	width: 73%;
	margin-left: -35%;
	height: 550px;
	overflow: hidden;
	margin-top: -17%;
	z-index: 10000;
}

#download_guide iframe {
	border: none;
	margin-top: -7px;
	margin-left: -5px;
}
.frame_flash_object {
	width: 78%;
	height: 575px;
	border: navajowhite;
}
</style>
<script type="text/javascript">
$(document).ready(function(){


	if($('#data-error').val()=='1'){
		alert('File đã bị người dùng xóa. Bấm OK để về trang chủ');
		window.location.href='/';
	}
	$('.close,#btn-download-pc').tooltip({
		placement:'left'
	})

	//disable context menu
	//$('body').attr('oncontextmenu','return false')
	//end

	$('.doc-preview').prepend('<input type="button" title="Click để xem hướng dẫn tải về" class="btn btn-success btn-download-guide" value="Hướng dẫn tải về"/>')
	
	if($('#type').val()=='tailieuhoceduvn'){
		$('#btn-read-online')
			.html('Tải về')
			.click(function(){
			var href=$('.adv_ants_left a')[0]
			document.location.href=href
			window.open('<?=$link?>')
			})
	}


	$("#btn-download-pc").click(function(){
	if($('#type').val()!='tailieuhoceduvn'){
			var href=$('.adv_ants_left a')[0]
			document.location.href=href
			$('#frm_download').submit();
	}
	else {
		var href=$('.adv_ants_left a')[0]
		document.location.href=href
		window.open('<?=$link?>')
	}
	})

	$("#btn-download-mobile").click(function(){
		window.open($("#mobile_link").val(),'_blank')
	})

	$("#btn-read-online").click(function(){
		if($('#type').val()=='pdf'){
			$("#read_online_pdf").modal('show')
		}
		if($('#type').val()=='flash'){ 
			$("#read_online_flash").modal('show');
		}
		if($('#type').val()=='html'){ 
			$("#read_online_flash")
				.addClass('read_online_html')
				.modal('show');
			$('.footer').remove()
		}
		
	})
})
//end ready

.on('click','.btn-download-guide',function(){
	$('#download_guide').modal('show')
})
</script>
<form method='post' target="_new" action='/download-tai-lieu?id=<?=$id?>' id='frm_download' name='frm_download'>
	<input type='hidden' name='csrf_test_name' value='<?=$csrf_test_name?>'/>
	<input type='hidden' name='download' value='1'/>
	<input type='hidden' id='type' value='<?=$type?>'/>
	<input type='hidden' name='doc_name' value='<?=$name?>'/>
	<input type='hidden' name='pc_doc_download_link' value='<?=$link?>'/>
</form>
<input type="hidden" id="data-error" value="<?=$error?>"/>
<div class="adv_ants_left">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
</div>
<div class="book_wrapper">
<h2 class='book_name font-effect-putting-green'><?=$name?></h2>
<!--start sociall_link-->
<div class="social_link">

<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="<?=$share?>"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>
<!--end social_link-->
<img class='book-thumbs' src="<?=$book_thumbs?>"/>
<div class="book_description"><?=$description?></div>
<button id="btn-read-online" class="btn btn-danger">Đọc online</button>

<div class="adv_ants_right"></div>

<div class='ads_ants_bottom'>
<!--- Script ANTS - 980x90 -->
<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>
<!--- end ANTS Script -->
</div>

<!-- start modal download_guide -->
<div class="modal hide fade" id="download_guide">
	<div class="modal-header">
		<span style="margin-left:15px;font-size: 15px;">Các bạn click vào biểu tượng máy in, chọn lưu dưới dạng pdf để tải về, <a href="http://myweb.pro.vn/download/index?path=/free-pdf-to-word-doc-converter-1-1-download" style="color:red" target="_new">click vào đây</a> để tải phần mềm chuyển từ pdf sang word</span>
		<button type="button" class="close" title='Click để đóng' data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<iframe width="750" height="500"src="https://www.youtube.com/embed/DAHZZOzw17E"></iframe>
		
		<div class="in_modal_ads_right">
			<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18148.ads"></script>
		</div>
	</div>
</div>
<!-- end modal download_guide -->

<!-- start modal read online -->
<div class="modal hide fade modal-z-index" id="read_online_pdf">
	<div class="modal-header">
		<span style="margin-left:15px;font-size: 15px;"><?=$name?></span>
		<button type="button" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<iframe  class='book_pdf_html'  src="<?=$embed_url?>"></iframe>
		<div class="in_modal_ads_right">

		</div>
		<button id="btn-download-pc" title="Nếu không xem trước được (vì server quá tải) ,các bạn vui lòng tải về để đọc" class="btn btn-primary">Tải về</button>
	</div>
</div>
<!-- end modal read online -->

<!-- start modal read online flash -->
<div class="modal hide fade modal-z-index" id="read_online_flash">
	<div class="modal-header">
		<span style="margin-left:15px;font-size: 15px;"><?=$name?></span>
		<button type="button" class="close" title="Click để đóng" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body">
		<div class="in_modal_ads_right">
			<!--- Script ANTS - 300x250 --> 
			<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
			<div class="534383851" data-ants-zone-id="534383851"></div>
			<!--- end ANTS Script -->
		</div>
		<iframe class="frame_flash_object" src="<?=$doc_view?>"></iframe>
	</div>
</div>
<!-- end modal read online flash -->

<div>

<input type='hidden' id='type_login' value='<?=$type_login?>'/>