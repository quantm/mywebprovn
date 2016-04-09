$(document)
//start redy function
.ready(function(){

//$(".toan-bo,.clip,#phim-bo-hay").hide()

//start remove ads
$('.ad_sidebar,.ad_location_desktop below_of_content,.ad_location_desktop ad_sidebar,#sidebar').remove()
//$(".tags,#ads_zone12610,#footer").remove()
if($("#is_filter").val()=="0"){
	$("#movie-recommend,#movie-update,.blocktitle .title").remove()
}
//end remove ads

//save_to_my_video
$("#btn_add_to_my_video").click(function(){
	if($("#is_logged").val()=="0"){
		$("#modal_login").modal("show")
	}
	if($("#is_logged").val()=="1"){
		//start ajax
		$.ajax({
		content:'text/html',
		type:"post",
		url:'/video/add_my_video/',
		data:{
			csrf_test_name:$("#csrf_test_name").val(),
			video_id:$("#video_id").val()
		},
		success:function(data){
			if(data=="0"){
				$("#modal_add_to_my_lib").prepend("<h3>Đã thêm vào danh sách phim yêu thích</h3>").modal("show")
			}
			if(data=="1"){
				$("#modal_add_to_my_lib").prepend("<h3>Bạn đã thêm video này trước đó</h3>").modal("show")
			}
		}
		})
		//end ajax call
	}
})
//end

$(".navbar-inner").addClass('custom_header')
$(".item input").addClass('btn-primary')
$(".item input")
	.attr('type','button')
	.click(function(){
	var url="?type=main_body&link="+$('.filter form').attr('action')+"?order_by="+$('[name="order_by"]').val()+"&country_id="+$('[name="country_id"]').val()+"&year="+$('[name="year"]').val()+"&category_id="+$('[name="category_id"]').val();
	window.open(url,"_parent")
	})
//click to view video from list page to detail page
$(".listfilm span,.inner span").click(function(){
	$("#thumbs").val($(this).find('img').attr('src'))
	$("#fetch_id").val($(this).attr('href'))
	$("#name").val($(this).find('span').html())
	$("#frm_film").submit();
})
//end

$(".serverlist .server ul li button")
.each(function(){
	$(this).attr('data-href',$(this).attr('href'))
	$(this).attr('href','#')
	$(this).html('Xem phim')
	$(this).tooltip()
})
.click(function(){
$("video").show('slow')
$("#page-info").hide('slow')
$("#btn_choose_server").hide();
$("#modal_film_intro").modal("show")
	$("#html_5_video").attr('src',"http://phim3s.net/"+$(this).attr('data-href')+"video.mp4")	
$(this).attr('href','#')	

//start count down
$('#hidden_countdown').countdown({
image: '/',
startTime: '00:2',
timerEnd: function(){
	//$(".video_title").hide()
	$("#fb_comment").show()
	$("#modal_film_intro").modal("hide")
},
format: 'mm:ss'
})
//end count down

$(".serverlist").hide('slow')
$("#btn_success")
	.show('slow')
	.attr('style','display:block!important')
})

$("#btn_success").click(function(){
	$("#btn_choose_server,.serverlist").show('slow')
	$(this).hide('slow')
	$(".serverlist").append('<button id="btn-close-server-list" class="btn btn-danger">Đóng</button>')
})

})
//end ready function
.on("click","#btn-close-server-list",function(){
	$(".serverlist").hide('slow')
})
//start call search
.on("keypress", "#search", function(e){
		$(this).addClass("header_search_box")
		if(e.keyCode == 13){
			$(this).attr('disabled','disabled')
			$("#game_header_search").submit()
		}
})