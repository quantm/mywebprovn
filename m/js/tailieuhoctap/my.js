$(document)
//start ready function
.ready(function(){

filter_ui_action() 

//process when user click when navigate from index page to detail page
detail()
//end

//start pagination proccessing
pagination()
//end
})
//end ready function

//start hightlight category
.on("mouseover",".noneloc",function(){
	$(this).addClass('category_highlight')
})
.on("mouseout",".noneloc",function(){
	$(this).removeClass('category_highlight')
})
//end hightlight category


//start call search
.on("keypress", "#search", function(e){
$(this).addClass("header_search_box")
if(e.keyCode == 13){
$(this).attr('disabled','disabled')
search()
}
})
.on("click",".fa-search",function(e){	
search()
})
//end call search

//start search function
/*
function search(){
$("#ja-content-main,.row").empty()
$("#fetch_book_process .modal-body span").html("Đang tìm kiếm...")
$("#fetch_book_process").show()
//start ajax
$.ajax({
type:'post',
content:'text/html',
url:'/book/search/',
data: {
csrf_test_name:$("#csrf_test_name").val(),
search:$("#search").val()
},
success:function(data){
$("#fetch_book_process").hide()
$("#ja-content-main").prepend(data)
filter_ui() 
pagination()
detail()
$("#globalheader").attr('style','margin-left:25%')
$("#search").removeAttr('disabled')
$("#search").val('')
}
})
//end ajax
}
*/
//end search function

//start from main page to book detail page
function detail(){
$(".contentpaneopen").mouseover(function(){
$("#book_id").val($(this).find('span').attr('href'))
$("#web_referer").val($(this).find('span').attr('web_referer'))
$("#book_title").val($(this).find('span').attr('title'))
$("#book_description").val($(this).find(".intro h4").html())
$("#book_thumbs").val($(this).find("img").attr('src'))
})
$(".contentpaneopen .contentheading,.btn_view_book_detail").click(function(){
var web_referer=$("#web_referer").val();
if(web_referer =='out' || web_referer==''){
$("#book_detail").submit()	
}
if(web_referer =='in'){
$("#book_detail")
.attr('action','/book/view/')
.submit()	
}
})
}
//end

//start function filter UI
function filter_ui_action() {

//login pop-up
if($("#reg_type").val()=="register"){
$("#modal_login").modal("show")
}
//end

//start category navigation
$("#accordion1 ul li").mouseover(function(){
$("#book_category").val($(this).find("span").attr('val'))
})
$("#accordion1 ul li").click(function(){
$("#ja-content-main,.row").remove()	
$("#fetch_book_process .modal-body span").html("Đang tải sách thuộc danh mục: "+"<b>"+$(this).find('span').html()+"</b>")
$("#fetch_book_process").show()
$.ajax({
type:'post',
content:'text/html',
url:'/book/main/',
data: {
csrf_test_name:$("#csrf_test_name").val(),
book_category:$("#book_category").val()
},
success:function(data){
	$("#fetch_book_process,.left_category").hide()
	$(".main_content").prepend(data)
	filter_ui_action() 
	pagination()
	detail()
	$('.ads_left_wrapper_view').attr('style','margin-top:-80%')
}

})
})
//end

//open category
$("#header_doc_category").click(function(){
	$(".left_category").show('slow')
	$(".blog,.social_like").hide()
	$("#globalheader").attr('style','margin-top:100% !important')
})
//end


$('.counter,.content-download2,.remove, #loctailieu,.mod_quang_cao,.banneritem,.blog script,#divManHinh2').remove()
$(".intro h4").find('div').remove()

$('.note').html('')
$(".pagination-start a").html("<span>"+$('.counter').html()+"</span")
}
//end function filter UI

//start function pagination
function pagination() {
$(".row ul li a")
.click(function(){
$("#page_id").val($(this).attr('href'))
$(this).attr('href','#')
$("#ja-content-main,.row").remove()
$("#fetch_book_process .modal-body span").html('<b>Đang tải dữ liệu...</b>')
$("#fetch_book_process").show()
$(this).addClass('active')
//start ajax
$.ajax({
type:'post',
content:'text/html',
url:'/book/main/',
data: {
csrf_test_name:$("#csrf_test_name").val(),
book_category:$("#page_id").val(),
current_page_id:$(this).html()
},
success:function(data){
$("#fetch_book_process").hide()
$(".main_content").prepend(data)
filter_ui_action() 
pagination()
detail()
var current_page_id=$("#current_page_id").val()
$(".row ul li a").each(function(){if($(this).html()==current_page_id){$(this).attr('style','background-color:#428bca;color:white')}})
}			
})
//end ajax
})
$(".row ul").addClass('pagination')
}
//end			

function post_ins_db(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$(".contentpaneopen .article-tools").next().each(function(value,index){
ins_db_title.push($(this).find('img').attr('alt'))
ins_db_thumbs.push($(this).find('img').attr('src'))
ins_db_desc.push($(this).find('h4').html())
ins_db_link.push($(this).attr('href'))
$.ajax({
content:'text/html',
type:'post',
url:'/book/get_book',
data:{
csrf_test_name:$("#csrf_test_name").val(),
name:ins_db_title[value],
path:ins_db_link[value],
thumbs:ins_db_thumbs[value],
description:ins_db_desc[value]
},
success:function(){

}
})
})
}

function post_ins_db_lv(){
var ins_db_title=[],ins_db_link=[],ins_db_thumbs=[],ins_db_desc =[]
$("#documents .box ul li").each(function(value,index){
ins_db_title.push($(this).find('.illustration').attr('alt'))
ins_db_thumbs.push($(this).find('.illustration').attr('src'))
ins_db_desc.push($(this).find('.description').html())
ins_db_link.push($(this).find('.illustration').next().attr('href'))
$.ajax({
content:'text/html',
type:'post',
url:'/book/get_book',
data:{
csrf_test_name:$("#csrf_test_name").val(),
name:ins_db_title[value],
path:ins_db_link[value],
thumbs:ins_db_thumbs[value],
description:ins_db_desc[value]
},
success:function(){

}
})
})
}
