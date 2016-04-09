$(document)
//start ready function
.ready(function(){

var file_extension=$("#file_extension").val()
if(file_extension!='pdf'){
	$('.book_pdf_html').remove()
}

//redirect to mobile site
if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	var book_id_redirect=$("#share_id").val()
	window.open('http://m.myweb.pro.vn/book/detail?id='+book_id_redirect,'_parent')
}
//end mobile

//hide download notification when scrolling related docs
$("#sach_cung_tg").scroll(function(){$(".download_notification").hide()})
//end

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
//$('.item-page h1').next().append('<input id="btn_print" data-type="read" type="button" class="btn btn-info btn-print" value="In tài liệu"><input id="btn_read_online" style="margin-left:2%!important" data-type="read" type="button" class="btn btn-info btn_download" value="Đọc online"><input data-type="download" type="button" class="btn btn-info btn_download" value="Tải về"><input type="button" title="Tạo danh mục tham khảo của bạn trên website này" class="btn btn-info btn-add-book" value="Tạo danh mục sách tham khảo">')		
$(".btn,#close_category,#header_cse_close,.btn_download").tooltip({placement:'right'})
if($("#type").val()!="make_lib"){
	process_download()	
}

})	
//end ready function

//header cse
.on('mouseover','.header_text_search',function(){
	$('#cse-search-box').show('slow')
	$(this).hide()
})
.on('click','#header_cse_close',function(){
	$('#cse-search-box').hide('slow')
	$('.header_text_search').show()
})
//end

//show general category
.on('mouseover','.general_category',function(){
	$('.book_category').show('slow')
})
.on('click','#close_category',function(){
	$('.book_category').hide('slow')	
})
//end

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

	$("#page0").hide()
	$(".item-page h1").addClass('font-effect-putting-green')
	$(".note,#page1,#page2,#page3,#pagelast,.content-download2,.banner-chitiet,#divManHinh2,.extravote-stars,.extravote-container,small").remove()
	$(".font-effect-putting-green").next().prepend('<img class="doc_icon_desc" src="'+book_thumbs+'"/>')
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
	
$("#modal_read_online .close").click(function(){
	$('header').show()
	$("#tabs2").attr('style','z-index:0')
})

//start click to download
$('.btn_download').click(function(){
$("#tabs2").attr('style','z-index:0')

//show embed pdf viewer
if($(this).attr('data-type')=='read'){
		$('header').hide()
		if($("#modal_read_online .modal-body").find('iframe').length=='0'){
			//modal read online
			if(file_extension=='ocx'){file_extension='docx'}	
			if(file_extension=='pdf'){
				var url_read_online="/book/pdfviewer?id="+$('#id').val()
				$("#modal_read_online .modal-body").append('<iframe src="'+url_read_online+'"  style="width: 98%;height: 600px;margin-top: 25px;"></iframe>')
			}
			//end modal read online
		}

		$("#book_title_read_online").html("<a title='Danh mục sách "+$('#category_name').val()+"' href=/book/category/?id_category="+$("#category_id").val()+" target='_new'>"+$("#category_name").val()+"</a> <i class='fa fa-long-arrow-right'></i>"+$(".font-effect-putting-green").html())
		$(".btn-info").hide()
		$(".social_link").addClass('social_link_read_online')
		$("#modal_read_online").modal('show')
}
//end



if($(this).attr('data-type')=='download'){
		download()	
}


})
//end click to download


if($("#is_logged").val()=="1") {
	download()
	if($("#check_card_charged").val()=="0"){
		//$('#nap_the_cao').modal('show')
	}
	if($("#check_card_charged").val()=="1"){
		//download()
	}
	
}
$('.btn-print').click(function(){
	var print_path="/pdf/file_"+$('#id').val()+".pdf"
	$("#toefl_overview").append('<input name=print_path type=hidden value='+print_path+'>')
	$("#toefl_overview")
		.attr('target','_new')
		.attr('action','/book/in_tai_lieu/')
		.submit()
})

}
//end function process_download

//start download function
function download(){
		count_book_downloaded()
		$("#toefl_overview").append("<input type='hidden' name='download' id='1'/>")
		$("#toefl_overview")
			.attr('action','/download/tai_tai_lieu/')
			.submit()
		var isFirefox = typeof InstallTrigger !== 'undefined',book_thumbs=$('[name="image"]').attr('content'),doc_desc=$(".mo_ta_tai_lieu").height()   
		if(isFirefox){

		}
		else {
				$('.download_notification').show('500')
		}
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

