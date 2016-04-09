$(document)
//start ready function
.ready(function(){
$('.contentheading a').each(function(){var href=$(this).attr('href');reset_link='/'+href.split('/')[1]+'/'+href.split('/')[4];$(this).attr('href',reset_link)})
$('#accordion1').accordion()
//redirect to mobile page when user using mobile browser
if(window.innerWidth <= "800" && window.innerHeight <= "640") {
	window.open('http://m.myweb.pro.vn/','_parent')
}
//end

$('.pagenav').each(function(){
	$(this)
		.removeAttr('target')
})

filter_ui() 

//login pop-up
if($("#reg_type").val()=="register"){
$("#modal_login").modal("show")
}
//end

$(".language a").attr("href","http://myweb.pro.vn/book/index/")


//start category navigation
$("#accordion1 ul li").mouseover(function(){
$("#book_category").val($(this).find("a").attr('val'))
})
$("#accordion1 ul li").click(function(){
$("#ja-content-main,.row").remove()	
$("#fetch_book_process .modal-body span").html("Đang tải sách thuộc danh mục: "+"<b>"+$(this).find('a').html()+"</b>")
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
$("#fetch_book_process").hide()
$(".main_content").prepend(data)
$('.khung_hinh').remove()
filter_ui() 
pagination()
$('.ads_left_wrapper_view').attr('style','margin-top:-80%')

}

})
})
//end

//start pagination proccessing
pagination()
//end
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

//start hightlight category
.on("mouseover",".noneloc",function(){
	$(this).addClass('category_highlight')
})
.on("mouseout",".noneloc",function(){
	$(this).removeClass('category_highlight')
})
//end hightlight category


//start function filter UI
function filter_ui() {

//disable flex context menu
	$("body,object,embed").bind("contextmenu",function(){
       //return false;
    }); 
//end

$('.khung_hinh,.content-download2,.remove, #loctailieu,.mod_quang_cao,.banneritem,.blog script,#divManHinh2').remove()
$(".intro h4").find('div').remove()
$('.note').html('')
$(".pagination-start a").html("<span>"+$('.counter').html()+"</span")
$(".counter").remove()

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
	$('.khung_hinh').remove()
	filter_ui() 
	pagination()
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


