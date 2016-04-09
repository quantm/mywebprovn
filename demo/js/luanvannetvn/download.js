$(document)
//start ready function
.ready(function(){
count_book_view()
reset_ui()

//start add google custom search in the header
$("#game_header_search")
.removeAttr("method")
.empty()
.attr("id","cse-search-box")
.attr("action","http://myweb.pro.vn/book/cse/")
.html($(".frm_cse-search-box").html())
$(".frm_cse-search-box").remove()
//end

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
$("#toefl_overview").append('<input type="hidden" id="path" name="path"/><input value="http://myweb.pro.vn/images/ebook/luanvan.png" type="hidden" id="book_thumbs" name="book_thumbs"/>')
$("#id").val('-1')
$("#book_title").val($(this).html())
$(this).attr('data-href',$(this).attr('href'))
$("#path").val($(this).attr('data-href'))
$("#toefl_overview").submit()	
$(this).removeAttr('href')
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


//$("base").remove()
//start fix firefox UI error
var isFirefox = typeof InstallTrigger !== 'undefined',share_id=$("#share_id").val(),book_title=$("#book_title").val();   
if(isFirefox){
$(".social_like").attr('style','bottom:524px')
}
//end
$(".doc-intro").prepend('<span class="book_title box-header">'+book_title+'</span>')
$(".doc-preview").prepend('<input type="button" title="Tạo danh mục tham khảo của bạn trên website này" class="btn btn-info btn-add-book" value="Tạo danh mục sách tham khảo"/><input type="button" title="" class="btn btn-info btn-fullscreen" value="Xem toàn màn hình"/><input id="btn_print" style="margin-left:16%!important" data-type="read" type="button" class="btn btn-info btn-print" value="In luận văn"/><div class="luanvan_social"><div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/luanvan/detail?id='+share_id+'"></div><div class="g-plusone" data-size="medium"></div></div>')
$(".relevant-docs .box ul li p").empty()
$("#header,#footer,.doc-info,.doc-content-title,.doc-content,.list-files").remove()
$("#content").append('<div id="comment" class="fb-comments" data-width="845px"  data-href="http://myweb.pro.vn/luanvan/detail?id='+share_id+'"  data-numposts="5" data-colorscheme="light"></div>')
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
