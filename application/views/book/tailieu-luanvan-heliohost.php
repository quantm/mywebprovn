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
<link rel="stylesheet" href="http://myweb.pro.vn/css/luanvannetvn/download.css" type="text/css">
<link rel="stylesheet" href="http://myweb.pro.vn/css/luanvannetvn/style.css" type="text/css">
<link rel="stylesheet" href="http://myweb.pro.vn/css/luanvannetvn/global.css" type="text/css">
</head>
<body>

<!-- start left advertisement -->
<div class="ads_wrapper_left">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16553.ads"></script>
</div>
<!-- end left advertisement -->

<!-- start right advertisement-->
<div class="ads_micro_right">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16602.ads"></script>
<!--300-385<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16573.ads"></script>-->
</div>
<!-- end-->

<?=$content?>
<input type="hidden" id="share_id" value="<?=$share_id?>"/>
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
<!--end modal--

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


<!--start modal read online-->
<div class="modal hide fade" id="modal_read_online">
	<div id="book_title_read_online">
		<a title='<?=$cate_name?>' href='http://myweb.pro.vn/luanvan/index?id_category=<?=$id_cate?>' target='_new'><?=$cate_name?></a> <i class='fa fa-long-arrow-right'></i> <?=$book_title?>
	</div>
	<button type="button" class="close" data-dismiss="modal">×</button>
	<div class="modal-body">

	</div>
</div>
<!--end modal-->

<!--start modal_user_category-->
<div class="modal hide fade" id="modal_user_category">
	<div class="modal-header">
		<span style="margin-left:15px">Thêm sách vào danh mục bên dưới hoặc tạo danh mục mới: </span>
		<button type="button" class="close" data-dismiss="modal">×</button>
	</div>
	<div class="modal-body"></div>
	<div class="modal-footer">
	<input type="button"  style="display:none" class='btn view_my_bookcase btn-inverse' value="Xem tủ sách của tôi"/>
	<input type="text" required id="user_custom_category" placeholder="Nhập một danh mục mới"/>
	<input type="button" class='btn create_category btn-primary' value="Tạo danh mục mới"/>
	</div>
</div>
<!--end modal-->

<form id="toefl_overview" method="post" action="http://myweb.pro.vn/doc-luan-van">
<input type="hidden" id="id" name="id" value="<?=$share_id?>"/>
<input type="hidden" id="book_title" name="book_title" value="<?=$book_title?>" />
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>
<input type="hidden" id="ebook_type" name="ebook_type" value="luanvan" />
<input type="hidden" id="reg_type" name="reg_type" value="<?=$type?>" />
</body>
<script type="text/javascript" src="http://www.google.com.vn/coop/cse/brand?form=cse-search-box&amp;lang=en"></script>
<script type="text/javascript">
$.fn.flash = function(duration, iterations) {
    duration = duration || 1000; // Default to 1 second
    iterations = iterations || 1; // Default to 1 iteration
    var iterationDuration = Math.floor(duration / iterations);

    for (var i = 0; i < iterations; i++) {
        this.fadeOut(iterationDuration).fadeIn(iterationDuration);
    }
    return this;
}

$(document)
//ads_micro_right:make notification to the user
var i=0
$(window).scroll(function(){
	i++;
	if(i==1){
		$('#ads_zone16602').flash(1000,4);
	}
})
//end

//bring doc_view on top when the user focus on it
$('.doc-preview object,.doc-preview embed').focus(function(){
	//make notification to the user
	$('#ads_zone16553').flash(1000,4);
	//end
})
//end

//start ready function
.ready(function(){
//disable flex context menu
	$("html,body,object,embed").bind("contextmenu",function(){
       return false;
    }); 
//end
count_book_view()
reset_ui()

//hight link item
$(".box ul li").mouseover(function(){
	$(this).attr('style','background-color:rgb(213, 213, 213)')
})
$(".box ul li").mouseout(function(){
	$(this).attr('style','background-color:white')
})
//end

})	
//end ready function


//start select category
.on('click','.checkbox',function(){
								var id_category=$(this).attr('data-id'),check_box_stat=$(this).prop("checked")
								//start ajax
								$.ajax({
									content:'text/html',
									type:'get',
									url:'http://myweb.pro.vn/book/mylibcheckexist/',
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
													url:'http://myweb.pro.vn/user/category',
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
													url:'http://myweb.pro.vn/user/category',
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


//start related document navigation
.on("click",'.box ul li a',function(){
	/*
	$("#toefl_overview").append('<input type="hidden" id="path" name="path"/><input value="http://myweb.pro.vn/images/ebook/luanvan.png" type="hidden" id="book_thumbs" name="book_thumbs"/>')
	$("#id").val('-1')
	$("#book_title").val($(this).html())
	$(this).attr('data-href',$(this).attr('href'))
	$("#path").val($(this).attr('data-href'))
	$("#toefl_overview").submit()	
	$(this).removeAttr('href')
	*/
})
//end


//start process
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
			url:'http://myweb.pro.vn/user/category',
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
				$('.btn-fullscreen').attr('style','z-index:100')
				$("#toefl_overview").attr('action',document.location.href+"&type=make_lib")
				if($("#is_logged").val()!="1"){
				$('#modal_login .modal-header').append("<span class='tb_dang_ky'>Nếu bạn chưa có tài khoản, vui lòng <a data-toggle='modal' data-dismiss='modal' href='#modal_register'><font color=red>click vào đây</font></a> để đăng ký</span>")
				$("#modal_login")
					.attr('style',"z-index:2000")
					.modal('show')
				$("#modal_register").attr('style',"z-index:10000;margin-top:-13%!important")
				}
				if($("#is_logged").val()=="1") {
				//start ajax
				$.ajax({
					content:'text/html',
					type:'get',
					url:'http://myweb.pro.vn/user/category/',
					success:function(data){
						$('#modal_user_category .modal-body').append(data)
						$('#modal_user_category').modal('show')
					}
				})
				
				}
})
//end btn_add_to_my_library

//start function reset_ui
function reset_ui (){
	
	//reset ui for ads slot
	$('.relevant-docs,#viewdoc .header,.remove').remove()
	//end
	
	//facebook fanpage
	$('.doc-intro').append('<div class="fb-like-box fb_iframe_widget"  data-colorscheme="light" data-header="true"  data-width="300px" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="false" ></div>')
	//end
	
	//show login popup when user first register from this page
	if($("#reg_type").val()=="register"){
		$("#modal_login").modal("show")
	}
	if($("#reg_type").val()=="add_to_mylib"){
		$("#modal_user_category").modal("show")
	}
	if($("#reg_type").val()=="make_lib"){
		$("#modal_user_category").modal("show")
	}
	//end


	$(".doc-intro").find('strong').remove()
	//start fix firefox UI error
	var isFirefox = typeof InstallTrigger !== 'undefined',share_id=$("#share_id").val(),book_title=$("#book_title").val();   
	if(isFirefox){
		$(".social_like").attr('style','bottom:524px')
	}
	//end
	$(".doc-intro").prepend('<span class="book_title box-header">'+book_title+'</span>')
	$(".doc-preview").prepend('<input type="button" title="" class="btn btn-info btn-fullscreen" value="Xem toàn màn hình"/><input id="btn_print" style="margin-left:16%!important" data-type="read" type="button" class="btn btn-info btn-print" value="In luận văn"/><div class="luanvan_social"><div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/luanvan/detail?id='+share_id+'"></div><div class="g-plusone" data-size="medium"></div></div>')
	$(".relevant-docs .box ul li p").empty()
	$("#header,#footer,.doc-info,.doc-content-title,.doc-content,.list-files").remove()
	$("#content").append('<div id="comment" style="margin-left:5px!important" class="fb-comments" data-width="845px"  data-href="http://myweb.pro.vn/luanvan/detail?id='+share_id+'"  data-numposts="5" data-colorscheme="light"></div>')
	$('.btn-print').click(function(){
		var print_path=$('[name="flashvars"]').val()
		$("#toefl_overview").append('<input name=print_path type=hidden value='+print_path+'>')
		$("#toefl_overview")
			.attr('target','_new')
			.attr('action','http://myweb.pro.vn/luanvan/in_luan_van/')
			.submit()
	})
	$('.btn-fullscreen').click(function(){
		$('header').hide()
		$('body').attr('style','overflow-y: hidden')
		$('.btn-fullscreen').attr('style','z-index:0')
		if($('body').find('#viewerPlaceHolder').length=='1'){
		$('#modal_read_online .modal-body').append($('#viewerPlaceHolder').html())
		}
		else {
			$('#modal_read_online .modal-body').append($('#obj1').html())
		}
		$('#modal_read_online').modal('show')
	})

	$("#modal_read_online .close").click(function(){
		$('body').attr('style','overflow-y: auto')
		$('.btn-fullscreen').attr('style','z-index:100000')
		$('header').show()
	})
	$('.box iframe').remove()
	$('.box ul img').remove()
}	
//end function reset_ui

//count_book_view
function count_book_view(){
	  $.ajax({
	   type:"POST",
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
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
</html>
