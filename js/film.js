var file_extension=''
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
.on('mouseover','#video-wrapper',function(){
	$('.adv_bottom').show('slow',function(){
		//start count down
		$('#hidden_countdown').countdown({
		image: '/',
		startTime: '00:5',
		timerEnd: function(){
		//hide the adsvertisement after 5s
			$('.adv_bottom').hide('slow')
		//end
		},
		format: 'mm:ss'
		})
		//end count down	
	})
})
//start redy function
.ready(function(){

$('.dropdown').hover(function() {
         $(this).toggleClass('open');
});

//hightlight the adsvertisement
$(".ads_wrapper").flash(1000,4)
//end

//$(".toan-bo,.clip,#phim-bo-hay").hide()

//start remove ads
$('.container,.ad_sidebar,.ad_location_desktop below_of_content,.ad_location_desktop ad_sidebar,#sidebar').remove()
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

//show video view, bottom advertisement
$("video,.ads_micro_footer").show('slow')
//end

$("#page-info").hide('slow')
$("#btn_choose_server").hide();
$("#modal_film_intro").modal("show")
	$("#html_5_video").attr('src',"http://phim3s.net/"+$(this).attr('data-href')+"video.mp4")	
$(this).attr('href','#')	

//start count down
$('#hidden_countdown').countdown({
image: '/',
startTime: '00:30',
timerEnd: function(){
	//hightlight the adsvertisement
	$(".ads_wrapper").flash(1000,4)
	//end
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
			$("#query-cse-search-box").val($('#search').val())
			$("#cse-search-box").submit()
		}
})
.on('click','.intro_close_adv',function(){
		$("#modal_film_intro").modal("hide")
})
.on('mouseover','#btn_success',function(){
	$(this).addClass('show_server_film')		
})
.on('mouseout','#btn_success',function(){
	$(this).removeClass('show_server_film')		
})

//close middle advertisement
.on('click','.close_advertisement',function(){
	$("#modal_film_intro").modal("hide")
	$('.adv_bottom').hide('slow')
	$('#adv_temp').modal('hide')
})
//end	