<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<!-- start meta -->
<meta property="og:title" content="<?=$book_title?>" />
<meta property="og:image" content="<?=$book_thumbs?>" />
<meta property="og:type" content="book" />
<meta property="og:description" content="<?=$book_description?>" />
<meta property="og:url" content="<?=$share?>" />
<meta name="description" content="<?=$book_description?>" />
<meta name="image" content="<?=$book_thumbs?>" />
<!-- end meta  -->
<link rel="canonical" href="<?=$share?>" />
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="/css/tailieuhoctap/download.css" type="text/css">
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script type="text/javascript">
var str_parent_folder='',thumuc_con='',file_id='',file_name='',file_extension=''
$(document)
//start ready function
.ready(function(){

//redirect to mobile site
if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	var book_id_redirect=$("#share_id").val()
	window.open('http://m.myweb.pro.vn/book/detail?id='+book_id_redirect,'_parent')
}
//end mobile

//hide download notification when scrolling related docs
$("#sach_cung_tg").scroll(function(){$(".download_notification").hide()})
//end

reset_ui_action()
count_book_view()

//show login popup when user first register from this page
if($("#type").val()=="register"){
	$("#modal_login").attr('style','z-index:10000')
	$('#modal_login .modal-header').append("<span class='tb_dang_ky'>Vui lòng đăng nhập để tải sách</span>")
	$("#modal_login").modal("show")
}
//end

//show make user custom category popup when user btn-add-book button
if($("#type").val()=="make_lib"){
	
}
//end

//start proccess button download
$('.item-page h1').next().append('<input id="btn_print" data-type="read" type="button" class="btn btn-info btn-print" value="In tài liệu"><input id="btn_read_online" style="margin-left:51.5%!important" data-type="read" type="button" class="btn btn-info btn_download" value="Đọc online"><input data-type="download" type="button" title="Nạp card điện thoại để tải tài liệu" class="btn btn-info btn_download" value="Tải về"><input type="button" title="Tạo danh mục tham khảo của bạn trên website này" class="btn btn-info btn-add-book" value="Tạo danh mục sách tham khảo">')		
$(".btn").tooltip({placement:'right'})
if($("#type").val()!="make_lib"){
	
}
	process_download()	
})	
//end ready function

//start select category
.on('click','.checkbox',function(){
								var id_category=$(this).attr('data-id'),check_box_stat=$(this).prop("checked")
								//start ajax
								$.ajax({
									content:'text/html',
									type:'get',
									url:'/book/mylibcheckexist/',
									data:{
										book_to_add:$("#share_id").val(),
										id_category:id_category
									},
									success:function(data){
										if(data=="0"){										
											if(check_box_stat){
												//start ajax call
												$.ajax({
													content:'text/html',
													type:'get',
													url:'/user/category',
													data:{
														lib_book_id_add:$("#share_id").val(),
														id_category_add:id_category
													},
													success:function(){
														$("#user_category_"+id_category).next().html('Đã thêm sách vào danh mục bạn chọn')	
														$(".btn-inverse").show()
													}
												})
												//end ajax call
											}
											else {
												//start ajax call
												$.ajax({
													content:'text/html',
													type:'get',
													url:'/user/category',
													data:{
														lib_book_id_remove:$("#share_id").val(),
														id_category_remove:id_category
													},
													success:function(){
														$("#user_category_"+id_category).next().html('Đã xóa sách khỏi danh mục')	
													}
												})
												//end ajax call
											}
										}
										if(data=="1"){
												$("#user_category_"+id_category).next().html('Bạn đã thêm sách vào danh mục này trước đó')
												$(".btn-inverse").show()
										}
									}
								})
								//end ajax
})

//end


//start		
.on('click','.create_category',function(){
		if($("#user_custom_category").val()==''){
			$("#user_custom_category")
									.attr('style','color:red')
									.attr('placeholder','Vui lòng nhập một danh mục')
		}
		else{
			$.ajax({
			content:'text/html',
			type:'get',
			url:'/user/category',
			data:{
				user_custom_category:$("#user_custom_category").val()
			},
			success:function(data){
				$('#user_custom_category').val()
				$('#modal_user_category .modal-body').append('<input title="'+$("#user_custom_category").val()+'" id="user_category_'+data+'" type="checkbox" data-id="'+data+'" class="checkbox" />'+' '+$("#user_custom_category").val()+'<span style="color:red;margin-left:10px"> Check để thêm sách vào danh mục</span><div style="clear:both"></div>')
			}
			})
		}
})

.on('click','#modal_user_category .btn-inverse',function(){
	window.open('http://myweb.pro.vn/book/mybook/','_parent')
})
//end

//start btn_add_to_my_library
.on('click','.btn-add-book',function(){
				$("#type").val('make_lib')
				$("#toefl_overview").attr('action',document.location.href)
				if($("#is_logged").val()!="1"){
				$("#modal_login")
					.attr('style','z-index:1000000000')
					.modal('show')
				}
				if($("#is_logged").val()=="1") {
				//start ajax
				$.ajax({
					content:'text/html',
					type:'get',
					url:'/user/category/',
					success:function(data){
						$('#modal_user_category .modal-body').append(data)
						$('#modal_user_category').modal('show')
					}
				})
				
				}
})
//end btn_add_to_my_library

//start tab navidation
.on("click","#tabs1",function(){
	$("#sach_cung_tg").show('slow')
	$("#sach_lien_quan").hide('slow')
})
.on("click","#tabs2",function(){
	$("#sach_cung_tg").hide('slow')
	$("#sach_lien_quan").show('slow')
})
//end
//start function reset_ui
function reset_ui_action (){

	var isFirefox = typeof InstallTrigger !== 'undefined',book_thumbs=$('[name="image"]').attr('content'),doc_desc=$(".mo_ta_tai_lieu").height()   
	
	//hight light current row
	$(".moduletable #sach_cung_tg").find("div").mouseover(function(){$(this).addClass('hight_light')})
	$(".moduletable #sach_cung_tg").find("div").mouseout(function(){$(this).removeClass('hight_light')})
	//end

	$(".moduletable").find("style").remove()
	$(".viewer").prepend('<img class="book_cover" src='+book_thumbs+'>')

	if(doc_desc>'75' && doc_desc<'500'){
		$(".book_cover").attr('style','margin-top:-'+doc_desc+"px")
	}

	if(doc_desc>'500'){
		$(".book_cover").attr('style','margin-top:-530px')
	}

	if($(".book_cover").attr('src')=='/images/ebook/book_cover_default.png'){
		var img_title=$("title").html().trim()	
		$(".viewer").append("<div class='right_title'>"+img_title+"</div>")
	}
	
	$("#page0").hide()
	$(".item-page h1").addClass('font-effect-putting-green')
	$(".note,#page1,#page2,#page3,#pagelast,.content-download2,.banner-chitiet,#divManHinh2,.extravote-stars,.extravote-container,small").remove()
	$(".mo_ta_tai_lieu").prepend('<img class="doc_icon_desc" src="/images/ebook/Information-icon.png"/>')
	$(".item-page h1").next().find('img').hide()
	$(".item-page h1").next().find('a,b,br,script').remove()
	$("#sach_cung_tg,#sach_lien_quan").find('br').next().remove()
		
	//open related document
	$(".moduletable a").click(function(){
		$("#book_id").val($(this).attr('data-href'))
		$("#book_title").val($(this).html())
		$("#book_description").val('')
		$("#book_thumbs").val('/images/ebook/book_cover_default.png')
		$("#book_detail").submit()	
	})
	//end
}	
//end function reset_ui



//start function process_download
function process_download(){
	//reset function button and social back link position
	$("#modal_read_online .close").click(function(){
		$(".btn-info").show()
		$(".social_link").removeClass('social_link_read_online')	
	})
	///end
	
	//hide read online button if filetype is not PDF
	if($(".mo_ta_tai_lieu").next().attr('alt')!='PDF'){
		$("#btn_read_online").hide()
	}
	

	if($("#page0").length=="1"){
		str_parent_folder=$("#page0").attr('src').split('/')[4]
		thumuc_con=$("#page0").attr('src').split('/')[5]
		file_id=$("#page0").attr('src').split('/')[6]
		//file_extension=$(".mo_ta_tai_lieu").next().attr('alt').toLowerCase()
		file_extension='pdf'
		if(file_extension=='ocx'){file_extension='docx'}
		file_name=file_id + "." + file_extension
		if(file_extension=='pdf'){
			var url_read_online="http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
			$("#modal_read_online .modal-body").append('<object data="'+url_read_online+'" type="application/pdf" style="width: 98%;height: 90%;margin-top: 25px;"></object><div class="download_function"></div>')
		}
	}

	if($("#page0").length=="0"){
		var parse_book = $('#parse_book').val().split('/'), thumuc_cha=parse_book[2],thumuc_con=parse_book[3],file_name='',arr_p='',file_id=""
		//get parent folder
		arr_p=thumuc_cha.split('-')
		if(thumuc_cha.match('nganh')){
		arr_p.splice(0,2)
		}
		else {
		arr_p.splice(0,1)
		}
		var arr_p_length=arr_p.length-1, str_parent_folder=arr_p.toString()
		for(var j=0;j<=arr_p_length;j++){
		str_parent_folder=str_parent_folder.replace(',','-')
		}
		//end parent folder

		//start reset file path
		switch (str_parent_folder)
		{
			case 'cong-nghe-thong-tin' : 
			if(thumuc_con=="lap-trinh-thiet-bi-di-dong"){thumuc_con="lap-trinh-di-dong"}
			if(thumuc_con=="de-thi-cntt"){thumuc_con="de-thi"}
			break;

			case 'xay-dung-kien-truc' : 
			if(thumuc_con=="de-thi-xdkt"){thumuc_con="de-thi"}
			break;

			case 'quan-tri-kinh-doanh-marketing' : 
			str_parent_folder='kinh-doanh-tiep-thi'
			if(thumuc_con=="internet-mobile-marketing"){thumuc_con="internet-marketing"}
			if(thumuc_con=="de-thi-kd-maketing"){thumuc_con="de-thi"}
			break;

			case 'khoa-hoc-xa-hoi-nhan-van' : 
			if(thumuc_con=="de-thi-khkt"){thumuc_con="de-thi"}
			break;

			case 'khoa-hoc-ky-thuat' : 
			if(thumuc_con=="de-thi-khkt"){thumuc_con="de-thi"}
			if(thumuc_con=="khkt-khac"){thumuc_con="the-loai-khac"}
			break;

			case 'giao-duc-dai-cuong' : 
			if(thumuc_con=="lich-su-cac-hoc-thuyet-kinh-te"){thumuc_con="linh-su-hoc-thuyet-kinh-te"}
			if(thumuc_con=="de-thi-gddc"){thumuc_con="de-thi"}
			break;

			case 'y-duoc' : 
			if(thumuc_con=="de-thi-y-duoc"){thumuc_con="de-thi"}
			if(thumuc_con=="dinh-duong-me-va-be"){thumuc_con="dinh-duong-suc-khoe"}
			break;

			case 'ky-nang-mem' : 
			if(thumuc_con=="de-thi-kn"){thumuc_con="de-thi"}
			break;

			case 'luan-van-de-tai-tham-khao' : 
			str_parent_folder="luan-van-de-tai"
			if(thumuc_con=="luan-van-de-tai-cao-dang-dai-hoc"){thumuc_con="luan-van-de-tai-cd-dh"}
			break;

			case 'tin-hoc-van-phong' : 
			if(thumuc_con=="luyen-thi-chung-chi-a-b-c"){thumuc_con="luyen-thi-a-b-c"}
			if(thumuc_con=="de-thi-thvp"){thumuc_con="de-thi"}
			break;

			case 'luat' : 
			if(thumuc_con=="de-thi-luat"){thumuc_con="de-thi"}
			break;

			case 'ke-toan-tai-chinh-thue' : 
			if(thumuc_con=="tai-chinh-kinh-doanh-tien-te"){thumuc_con="tai-chinh-tien-te"}
			if(thumuc_con=="ke-toan-tai-chinh-thue-khac"){thumuc_con="ke-toan-tai-chinh-khac"}
			if(thumuc_con=="kiem-toan"){thumuc_con="ke-toan-kiem-toan"}
			if(thumuc_con=="phan-tich-hoat-dong-kinh-doanh"){thumuc_con="hoat-dong-kinh-doanh"}
			if(thumuc_con=="thi-truong-bat-dong-san"){thumuc_con="bat-dong-san"}
			if(thumuc_con=="de-thi-tckt"){thumuc_con="de-thi"}
			break;

			case 'ngoai-ngu' : 
			if(thumuc_con=="de-thi-nn"){thumuc_con="de-thi"}
			if(thumuc_con=="anh-ngu-can-ban"){thumuc_con="anh-van-can-ban"}
			if(thumuc_con=="nhat-phap-hoa-ngoai-ngu-khac"){thumuc_con="nhat-phap-hoa-others"}
			break;
		}

		file_id='file_goc_'+parse_book[4].split('-')[0]
		file_extension=$(".mo_ta_tai_lieu").next().attr('alt').toLowerCase()
		if(file_extension=='ocx'){file_extension='docx'}
		file_name=file_id+"."+file_extension
		
		if(file_extension=='pdf'){
			var url_read_online="http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
			$("#modal_read_online .modal-body").append('<object data="'+url_read_online+'" type="application/pdf" style="width: 98%;height: 90%;margin-top: 25px;"></object')
		}
	}
	
//start click to download
$('.btn_download').click(function(){

//show embed pdf viewer
if($(this).attr('data-type')=='read'){
		$("#book_title_read_online").html("<a title='Danh mục sách "+$('#category_name').val()+"' href=/book/category/?id_category="+$("#category_id").val()+" target='_new'>"+$("#category_name").val()+"</a> <i class='fa fa-long-arrow-right'></i>"+$(".font-effect-putting-green").html())
		$(".btn-info").hide()
		$(".social_link").addClass('social_link_read_online')
		$("#modal_read_online").modal('show')
}
//end

//if not login
if($("#is_logged").val()!="1"){
	if($(this).attr('data-type')=='download'){
		$('#modal_login .modal-header').append("<span class='tb_dang_ky'>Nếu bạn chưa có tài khoản, vui lòng <a data-toggle='modal' style='margin-left:3px' data-dismiss='modal' href='#modal_register'><font color=red> click vào đây</font></a> để đăng ký</span>")
		$("#modal_login")
				.attr('style',"z-index:2000")
				.modal('show')
		$("#modal_register")
				.attr('style',"z-index:10000;margin-top:-13%!important")
		
	}
}
//end if

//if login then call the download function
else {
	if($(this).attr('data-type')=='download'){
			download(str_parent_folder,thumuc_con,file_name,'free')	
	}
}
//end if

})
//end click to download


if($("#is_logged").val()=="1" && $("#is_download").val()=="1") {
	download(str_parent_folder,thumuc_con,file_name,'free')
}
$('.btn-print').click(function(){
	var print_path="http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
	$("#toefl_overview").append('<input name=print_path type=hidden value='+print_path+'>')
	$("#toefl_overview")
		.attr('target','_new')
		.attr('action','/book/in_tai_lieu/')
		.submit()
})


	$.ajax({
	content:'text/html',
	type:'get',
	url:'/book/update_book_link',
	data:{
	id_update:'<?=$share_id?>',
		direct_link:"http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
	},
	success:function(){
		//$("#frm_update_link").submit()
	},
	error:function(){
		//$("#frm_update_link").submit()
	}
	})

}
//end function process_download

//start download function
function download(tmcha,tmcon,tfile,dkien){
		count_book_downloaded()
		var mapForm = document.createElement("form");  
        mapForm.method = "POST";
        //mapForm.target='_blank';
        mapForm.action = "http://tailieuhoctap.vn/download.php";

        // Create an input
        var thumuccha = document.createElement("input");
        thumuccha.type = "hidden";
        thumuccha.name = "thumuccha";
        thumuccha.value = tmcha;
        
        // Create an input hidden
        var tenfileluu = document.createElement("input");
        tenfileluu.type = "hidden";
        tenfileluu.name = "tenfileluu";
        tenfileluu.value = $("#parse_book").val().split('/')[4];
        
        var thumuccon = document.createElement("input");
        thumuccon.type = "hidden";
        thumuccon.name = "thumuccon";
        thumuccon.value = tmcon;
        
        var tenfile = document.createElement("input");
        tenfile.type = "hidden";
        tenfile.name = "tenfile";
        tenfile.value = tfile;
        
        var dieukien = document.createElement("input");
        dieukien.type = "hidden";
        dieukien.name = "dieukien";
        dieukien.value = dkien;

        // Add the input to the form
        mapForm.appendChild(thumuccha);
        mapForm.appendChild(thumuccon);
        mapForm.appendChild(tenfile);
        mapForm.appendChild(tenfileluu);
        mapForm.appendChild(dieukien);
        // Add the form to dom
        document.body.appendChild(mapForm);
		$.ajax({
			content:'text/html',
			type:'get',
			url:'http://myweb.pro.vn/user/check_card_charged',
			data:{},
			success:function(data){
				if(data=='0'){
					$('#modal-card-charge').modal('show')
				}
				if(data=='1'){
					// Just submit
					mapForm.submit();
					var isFirefox = typeof InstallTrigger !== 'undefined',book_thumbs=$('[name="image"]').attr('content'),doc_desc=$(".mo_ta_tai_lieu").height()   
					if(isFirefox){

					}
					else {
					$("body").append('<img class="download_notification" src="/images/icon/open_download.png">')
					}
				}
			}
		})
		

  }
  //end download function

//count book downloaded
function count_book_downloaded(){
	  $.ajax({
	   type:"get",
       url:"/book/count_book_download/",
       data:{
                book_id:$("#share_id").val(),
				csrf_test_name:$("#csrf_test_name").val()
            },
		success:function(){
				
		}
	})
}
//end

//count_book_view
function count_book_view(){
	  $.ajax({
	   type:"get",
       url:"/book/count_book_view/",
       data:{
                book_id:$("#share_id").val(),
				csrf_test_name:$("#csrf_test_name").val()
            },
		success:function(){
				
		}
	})
}
//end


</script> 
</head>
<body>

<form id="book_detail" method="post" action="/doc-sach-tham-khao"  enctype="multipart/form-data">
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
<div class="social_link">
<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="<?=$share?>"></div>

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
<script type="text/javascript">
    google_ad_client = "ca-pub-1996742103012878";
    google_ad_slot = "8230830280";
    google_ad_width = 170;
    google_ad_height = 475;
</script>
<!-- ads_book_download -->
<script type="text/javascript"
src="//pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
<!-- end left advertisement -->

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

<!--start modal library -->
<div class="modal hide fade" id="modal_libary" style="margin-top:0px">
<div class="modal-header">
<h3 style="margin-left:1%;font-size:15px">Đăng ký tài khoản và dùng thử các chức năng của hệ thống</h3>
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
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<input type="hidden" value="<?=$book_id?>" id="parse_book"/>
<input type="hidden" value="<?=$share_id?>" id="share_id"/>
<input type="hidden" id="type" name="type" value="<?=$type?>" />
<input type="hidden" id="category_name" value="<?=$category?>"/>
<input type="hidden" id="category_id" value="<?=$category_id?>"/>
<input type="hidden" id="ebook_type" name="ebook_type" value="book" />

<!--start modal read online-->
<div class="modal hide fade" id="modal_read_online">
	<div id="book_title_read_online"></div>
	<button type="button" class="close" data-dismiss="modal">×</button>
	<div class="modal-body">

	</div>
	<div id="book_load_slow">Tải về để xem nhanh hơn</div>
</div>
<!--end modal-->

<!-- start modal card charge -->
<div class='modal hide fade' id="modal-card-charge">
	<button type="button" title="Đóng" style="float:left!important;margin-left:0%!important;" data-dismiss="modal">×</button>
	<span class='success_charge_card'>Sau khi nạp card thành công vui lòng đóng form này và click nút Tải về</span>
	<div class='modal-body'>
			<iframe style='width:100%;height:100%' src='http://myweb.pro.vn/guide/charge_card'></iframe>
	</div>
</div>
<!-- end -->

<!--start modal read online-->
<div class="modal hide fade" id="modal_user_category">
	<div class="modal-header">
		<span style="margin-left:15px">Thêm sách vào danh mục bên dưới hoặc tạo danh mục mới: </span>
		<button type="button" class="close" title="Đóng" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body"></div>
	<div class="modal-footer">
	<input type="button"  style="display:none" class='btn view_my_bookcase btn-inverse' value="Xem tủ sách của tôi"/>
	<input type="text" required id="user_custom_category" placeholder="Nhập một danh mục mới"/>
	<input type="button" class='btn create_category btn-primary' value="Tạo danh mục mới"/>
	</div>
</div>
<!--end modal-->

<form id='frm_update_link' method='get' action='http://myweb.pro.vn/book/update_direct_link/'>
<input type='hidden' name='id' id='id' value='<?=$id_next?>'/>
</form>

<?=$content?>
</body>
</html>
