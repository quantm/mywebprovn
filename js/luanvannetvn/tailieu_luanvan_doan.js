if (document.addEventListener) {
document.addEventListener('contextmenu', function(e) {
	$('#site_map_context').modal('show')
	$('.btn,.luanvan_social').hide()
	$('#adv_temp').attr('data-advertisement','1')
e.preventDefault();
}, false);
} 
else {
document.attachEvent('oncontextmenu', function() {
	$('#site_map_context').modal('show')
	$('.btn,.luanvan_social').hide()
	$('#adv_temp').attr('data-advertisement','1')
	window.event.returnValue = false;
});
}

$(document)
//start ready function
.ready(function(){	

count_book_view()
reset_ui_action()

})	
//end ready function

//like
.on('click','.like-doc',function(){
	$.ajax({
		content:'text/html',
		url:'http://myweb.pro.vn/book/like',
		type:'get',
		data:{
			id:$('#share_id').val()
		},
		success:function(data){
		$('.like-doc').find('span').html(data)
		}
	})
})
//end

//open related document
.on('click','.btn-relevant-docs',function(){
	$('.btn-download,.btn-download-guide,#___ytsubscribe_0,.eclick_left,.btn-relevant-docs').hide()

	//prevent invalid click
	$('#adv_temp,#download_guide').addClass('z-index-1')
	//end

	$('#obj_reading_temp').modal('show')
	$('#adv_temp').attr('data-advertisement','1')
	$('.relevant-docs,.relevant-adv').show('slow')
})
//end

//close related document
.on('click','.relevant-docs-close',function(){
	$('.relevant-docs,.relevant-adv').hide('slow')
	
	//remove z-index-1 class for focusing middle advertisement
	$('#adv_temp,#download_guide').removeClass('z-index-1')
	//end

	//btn-download, btn-download-guide
	if($('#is_download').val()=='1'){
		$('.btn-download').show()
	}
	if($('#is_download').val()=='0') {
		$('.btn-download-guide').show()
		
		//template 1
		if($('.doc-preview object').find('embed').length=='1'){
			$('.btn-download-guide').addClass('btn-download-guide-close-middle-adv-obj1')		
		}
		//end if

		//template 2 with id obj1
		else {
			$('.btn-download-guide')
				.removeClass('btn-download-guide-close-middle-adv-obj1')		
				.addClass('btn-download-guide-close-middle-adv')		
		}
		//end template2
	}
	//end

	$('.eclick_left,#___ytsubscribe_0,.btn-relevant-docs,.btn-download-guide').show('slow')
	$('#obj_reading_temp').modal('hide')
	$('#adv_temp').attr('data-advertisement','0')
})
//end

//hightlight advertisement onmouseover
.on('mouseover','.adv_items, .adv_item',function(){
	$(this).addClass('advertisement_hightlight')
})

.on('mouseout','.adv_items, .adv_item',function(){
	$(this).removeClass('advertisement_hightlight')
})
//end

//show modal download guide
.on('click','.btn-download-guide',function(){
	
	//prevent invalid click
	$('.relevant-adv,#adv_temp').addClass('z-index-1')
	//end
	
	//set modal z-index to hide btn-close-advertisement
	$('#download_guide').addClass('middle-adv-z-index')	
	
	//hide all element to make the user focus to the video and the advertisement
	$('.btn-relevant-docs,.btn-download-guide,.btn-download,.eclick_left,.eclick_right,.luanvan_social').hide()
	//end
	
	//remove class doc-preview-embed-obj1 to show the video and the advertisement
		$('#obj1 embed').removeClass('doc-preview-embed-obj1')
	//end

	$('#download_guide .modal-body .youtube_embed').attr('src','https://www.youtube.com/embed/za-Z2w2rb9Q?autoplay=1')
	$('#download_guide,#modal_advertisement_left').modal('show')
	
	//not show middle advertisement when user watch the video
	$('#adv_temp').attr('data-advertisement','1')
	//end
})

//register, login
.on('click','#show_register,#show_login',function(){
	$('#modal_register,#modal_login').addClass('modal_register_view')
})
//end

//close modal event
.on('click','.close',function(){

	//close left advertisement
	$('#modal_advertisement_left').modal('hide')
	//end

	//set z-index modal_register
		$('#modal_register,#modal_login').removeClass('modal_register_view')
	//end
	
	//remove z-index for focusing	
	$('#download_guide').removeClass('middle-adv-z-index')	

	//remove z-index-1 for focusing on advertisement 
	$('.relevant-adv,#adv_temp').removeClass('z-index-1')
	//end

	//set z-index to focus on print icon
		$('#obj1 embed').addClass('doc-preview-embed-obj1')
	//end
		
	if($('#is_download').val()=='1'){
		$('.btn-download').show()
	}
	$('.btn-download-guide').show()
		
	//show middle advertisement when user read the thesis
	$('#adv_temp').attr('data-advertisement','0')
	//not show middle advertisement when user watch the video
	
	//fix google+ personal page button UI
	$('.p_google_plus').addClass('p_google_plus_close_guide')
	//end

	$('.btn-relevant-docs,.eclick_left,.eclick_right,.luanvan_social').show()
})
//end

.on('ready',
	function(){
	
	//tooltip
	$('.btn').tooltip({placement:'bottom'})
	$('.like-doc').tooltip({placement:'right'})
	//end

		if($(this).find('.ssvzHeader').find('div').find('a').length>0){
			//do not thing		
		}	
		if($(this).find('.ssvzHeader').find('div').find('a').length=='0'){		
			//$('.ssvzHeader div ').html('<span style="margin-left:5px">QUẢNG CÁO</span>')
		}
	}
)

//close middle advertisement
.on('click','.intro_close_adv',function(){
		
	//remove class z-index-1 for focusing 
				$('#download_guide,.relevant-adv').removeClass('z-index-1')
				$('#adv_temp').removeClass('middle-adv-z-index')
	//end

	if($('#is_download').val()=='1'){
		$('.btn-download').show()
	}
	$('.btn-download-guide').show()
		//template 1
		if($('.doc-preview object').find('embed').length=='1'){
				$('.btn-download-guide').addClass('btn-download-guide-close-middle-adv-obj1')		
		}
		//end if
		
		//template 2 with id obj1
		else {
				$('.btn-download-guide')
					.removeClass('btn-download-guide-close-middle-adv-obj1')		
					.addClass('btn-download-guide-close-middle-adv')		
		}
		//end template2

	
	$('.btn-relevant-docs,.header_text_search,.eclick_left,.eclick_right').show()
	$("#adv_temp")
		.modal("hide")
		.attr('data-advertisement','1')

	//social widget
	$('.luanvan_social,.btn-relevant-docs').show()
	//end
})
//end proccess

//header cse
.on('mouseover','.header_text_search',function(){
	$('body').removeAttr('onbeforeunload')
	$('#cse-search-box').show('slow')
	$('.header_text_search,.btn-download').hide()
})
.on('click','.header_cse_close',function(){
	$('body').Attr('onbeforeunload','return close_broswer_event()')
	$('#cse-search-box').hide('slow')
	$('.header_text_search').show()
		if($('#is_download').val()=='1'){
			$('.btn-download').show()
		}
})
//end

//start process download
.on('click','.btn-download',function(){				
				$("#toefl_overview").attr('action',document.location.href+"&type=make_lib")
				if($("#is_logged").val()!="1"){
				$('#modal_login .modal-header').append("<span class='tb_dang_ky'>Nếu bạn chưa có tài khoản, vui lòng <a data-toggle='modal' data-dismiss='modal' href='#modal_register'><font color=red>click vào đây</font></a> để đăng ký</span>")
				$("#modal_login")
					.attr('style',"z-index:2000")
					.modal('show')
				$("#modal_register").attr('style',"z-index:100000000;")
				}
				//start if login
				if($("#is_logged").val()=="1") {
					$('#luanvan_overview')
									.attr('action','http://myweb.pro.vn/download/pdf/')		
									.submit()
					
				}
				//end if login
})
//end process download

//close left and right advertisement
.on('click','.btn-close-advertisement',function(){
			$(this)
				.removeClass('btn-danger')
				.addClass('btn-success')
				.val('Xem quảng cáo')				
			$('.adv_ants_right,.adv_micro_left,.adv_ants_header').hide('slow')
			
})

.on('click','.btn-success',function(){
			$(this)
				.removeClass('btn-success')
				.addClass('btn-danger')
				.val('Đóng quảng cáo')
			$('.adv_ants_right,.adv_micro_left,.adv_ants_header').show('slow')
			
})
//end

//start function reset_ui_action
function reset_ui_action (){

	//highlight right advertisement
	setInterval(function(){
	$(".adv_2_micro_right  .adv_items").toggleClass("blink");
	},2000)
	//end

	//header right advertisement
	if($(".adv_2_micro_right").find('.ssvzHeader').find('div').find('a').length>0){
			//do not thing		
		}	
	if($('.adv_2_micro_right').find('.ssvzHeader').find('div').find('a').length=='0'){	
	var str_header='<div class="bg_header_short" title="Mua quảng cáo của AdMicro"></div>';
	$('.adv_2_micro_right .ssvzHeader div ').html(str_header)
	}
	//end

	//show middle advertisement
	var k=0;
	$('body').mousemove(function(){
			var adv=$('#adv_temp').attr('data-advertisement')
			if(adv=='0'){
				k++;
				if(k=='75'){	

					//set in_modal_ads_right z-index=-1 to focus on close middle advertisement button
					$('#download_guide,.relevant-adv').addClass('z-index-1')
					//end
					
					$('#adv_temp')
					.addClass('middle-adv-z-index')	
					.modal('show',function(){
						$(this).attr('data-advertisement','1')
					})

					$('.btn,.header_text_search,.eclick_left,.eclick_right,.luanvan_social').hide()
				}
			}


		
	})
	//end
	
	//nếu đã login thì gọi tải về
	if($("#is_logged").val()=="1") {
				//ajax
				$.ajax({
					content:'text/html',
					type:'post',
					url:'http://myweb.pro.vn/download/count_download_per_charged',
					data:{
						csrf_test_name:$("#csrf_test_name").val()
					},
					success:function(data){
						$('#luanvan_overview')
							.attr('action','http://myweb.pro.vn/download/pdf/')		
							.submit()

					}
				})
				//end ajax
			
	}
	//kết thúc

	//download guide button
	$('.doc-intro').append('<input type="button" title="Click để xem hướng dẫn tải về" class="btn btn-info btn-download-guide" value="Hướng dẫn tải về"/><input type="button" title="Click để đóng hoặc xem quảng cáo" style="display:none!important" class="btn btn-danger btn-close-advertisement" value="Đóng quảng cáo"/>')
	//end
	
	//start template  width id obj1
	if($('body').find('#obj1').length){
		$(".doc-preview").prepend('<input type="button" title="Tải tài liệu" class="btn btn-info btn-download" value="Tải về"/><input type="button" style="margin-left: 14.25%!important;" title="Click để xem tài liệu liên quan" class="btn btn-info btn-relevant-docs" value="Liên quan"/><i class="like-doc fa fa-hand-o-up fa-2x" title="Click to like this document"><span style="margin-left:5px;font-size:12px">'+$("#like_count").val()+'</span></i><div class="luanvan_social"><div class="fb-like-box fb_iframe_widget fb_obj1"   data-colorscheme="light" data-header="true"  data-width="300px" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="false"></div><div class="fb-share-button" data-layout="button" data-width="200px" data-height="100px" data-href='+document.location.href+'></div></div>')
		$('.btn-close-advertisement').addClass('btn-close-advertisement-obj-1')

		$('.btn-download-guide')
			.addClass('btn-download-guide-obj1-onload')
			.show()
		$('.btn-relevant-docs').addClass('btn-relevant-docs-obj1')	

		//link to youtube video
		$('#___ytsubscribe_0').addClass('.youtube_video')
		//end

		//doc preview object style
		$('#viewdoc .doc-intro').attr('style','margin-left: 51px!important;margin-bottom:60px!important')
		//end

		$('.btn-download').addClass('btn-download-right')
		
		//fix UI
		if($('base').attr('href')=='http://timtailieu.vn/') {
			$('.luanvan_social').addClass('luanvan_social_obj_1')
			$('.doc-preview embed').addClass('obj1_doc_timtailieuvn')
		}
		//end
	}
	//end templacte 1 width obj1 id
	
	//template 2
	else {
			$('.btn-close-advertisement').addClass('btn-close-advertisement-obj-2')	
			//nút tải về và nút hướng dẫn tải về
			if($('#is_download').val()=='1'){
			$('.btn-download').show()
			}
			if($('#is_download').val()=='0') {
			$('.btn-download-guide').show()
			}
			//end
	
			$(".doc-preview").prepend('<input type="button" title="Tải tài liệu" class="btn btn-info btn-download" value="Tải về"/><div class="luanvan_social"><div class="fb-like-box fb_iframe_widget" style="margin-left:-48%;margin-top:-24px;"  data-colorscheme="light" data-header="true"  data-width="300px" data-href="https://www.facebook.com/elearningsocialvn?ref=tn_tnmn" data-show-border="true" data-show-faces="false"></div><div class="fb-share-button" data-layout="button" data-width="200px" data-height="100px" data-href='+document.location.href+'></div><div class="g-ytsubscribe" data-count="hidden" data-layout="default" data-channel="quantmMr"></div><div class="g-plusone" data-count="false"  data-height="24"></div></div><input type="button" title="Click để xem tài liệu liên quan" class="btn btn-info btn-relevant-docs" value="Liên quan"/><i class="like-doc fa fa-hand-o-up fa-2x" style="margin-left:150px!important" title="Click to like this document"><span style="margin-left:5px;font-size:12px">'+$("#like_count").val()+'</span></i>')
			$('#___ytsubscribe_0').addClass('youtube_video')
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
	$('.header_cse_close,.btn,.header_text_search').tooltip({placement:'bottom'})
	$('.like-doc').tooltip({placement:'right'})

	//fix UI based on referer
	if($('base').attr('href')=='http://luanvan365.com/'){
		$('.btn-download-guide').prev().remove()
		if($('#obj1').length=='0'){
				$('.btn-download-guide')
				.addClass('obj2-luanvan365')
		}
		if($('#obj1').length=='1'){
				$('.btn-download-guide')
				.removeClass('btn-download-guide-obj1-onload')
				.addClass('btn-download-guide-obj1-doc-edu-vn')
		}
	}
	if($('base').attr('href')=='http://timtailieu.vn/'){
		$('.btn-download-guide').prev().remove()
		if($('#obj1').length=='0'){
				$('.btn-download-guide')
				.addClass('obj2-timtailieuvn')
		}
		if($('#obj1').length=='1'){
				$('.btn-download-guide')
				.removeClass('btn-download-guide-obj1-onload')
				.addClass('obj1-timtailieu-vn')
		}
	}
	
	if($('base').attr('href')=='http://doc.edu.vn/'){
		$('.list-files').remove()
		$('body').addClass('body_doc_edu_vn')
		if($('#obj1').length=='1'){
				$('.fb-share-button').attr('style','position: absolute;margin-top: -23px;margin-left: 80px;')
				$('#viewdoc .doc-intro').attr('style','margin-left: -40px!important;margin-bottom:60px!important')
				$('#viewdoc .doc-intro').find('.box-header').removeClass('book_title')
				$('.btn-download-guide')
				.removeClass('btn-download-guide-obj1-onload')
				.addClass('btn-download-guide-obj1-doc-edu-vn')
		}
		if($('#obj1').length=='0'){
				$('.btn-download-guide').addClass('obj2-zbook-vn')
		}
		
	}

	if($('base').attr('href')=='http://zbook.vn/' || $('base').attr('href')=='http://giaoan.com.vn/'){
		$('body').addClass('body_doc_edu_vn')
		if($('#obj1').length=='1'){
				$('.doc-intro p').attr('style','margin-left: -15%')
				$('.luanvan_social').addClass('luanvan_social_obj_1_zbook_vn')
				$('.fb-share-button').addClass('fb-share-button-obj1-zbookvn')				
				$('.btn-download-guide')
				.removeClass('btn-download-guide-obj1-onload')
				.addClass('btn-download-guide-obj1-zbook-vn')
		}
		if($('#obj1').length=='0'){
				$('.doc-intro p').attr('style','margin-left: -12%')
				$('#___ytsubscribe_0,#___plusone_0').remove()
				$('.fb-share-button').addClass('fb-share-button-obj2-zbookvn')				
				$('.luanvan_social').addClass('luanvan_social_obj_2_zbook_vn')
				$('.btn-relevant-docs').addClass('btn-relevant-docs-obj2')
				$('.btn-download-guide').addClass('obj2-zbook-vn')
		}
		
	}

	if($('base').attr('href')=='http://luanvan.net.vn/'){
		$('body').addClass('body_doc_edu_vn')
		if($('#obj1').length=='1'){
				$('.doc-intro p').attr('style','margin-left: -15%')
				$('.luanvan_social').addClass('luanvan_social_obj_1_zbook_vn')
				$('.fb-share-button').addClass('fb-share-button-obj1-zbookvn')				
				$('.btn-download-guide')
				.removeClass('btn-download-guide-obj1-onload')
				.addClass('btn-download-guide-obj1-zbook-vn')
		}
		if($('#obj1').length=='0'){
				$('.book_title').addClass('book_title_luanvannetvn_obj_2')
				$('.btn-close-advertisement').addClass('btn-close-advertisement-obj-2-luanvannetvn')
				$('.doc-intro p').attr('style','margin-left: -7%;width: 766px!important;')
				$('.doc-preview object').addClass('doc-obj2-luanvannetvn')
				$('#___ytsubscribe_0,#___plusone_0').remove()
				$('.fb-share-button').addClass('fb-share-button-obj2-zbookvn')				
				$('.luanvan_social').addClass('luanvan_social_obj_2_zbook_vn')
				$('.btn-relevant-docs').addClass('btn-relevant-docs-obj2')
				$('.btn-download-guide').addClass('btn-download-guide-obj2-luanvannetvn')
		}
		
	}

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

	
	if($('base').attr('href')=='http://timtailieu.vn/'){
		$('.book_title').addClass('book_title_timtailieu_vn')
	}

	$("marquee,.box iframe,.box ul img,.remove,#header,#footer,.doc-info,.doc-content-title,.doc-content,.list-files").remove()
	$('.relevant-docs-close').parent().parent().parent().prev().remove()
	$('.relevant-docs-close').parent().parent().parent().prev().remove()
	$('.relevant-docs-close').parent().parent().parent().prev().remove()
	$('.relevant-docs-close').parent().parent().parent().prev().remove()
	$('.box .detail').empty()
	
	//start count down
	$('#hidden_countdown').countdown({
	image: '/',
	startTime: '00:20',
	timerEnd: function(){
	//remove blink effecr after 20s
	$(".adv_2_micro_right  .adv_items").toggleClass("blink_rose");
	//end
	
	//set data-advertisement attribute for trigger middle advertisement
	$('#adv_temp').attr('data-advertisement','0')
	//end

	},
	format: 'mm:ss'
	})
	//end count down

	//tooltip
	$('.btn,.like-doc').tooltip({placement:'bottom'})
	//end

}	
//end function reset_ui_action

//count_book_view
function count_book_view(){
	  $.ajax({
	   type:"POST",
       url:"http://myweb.pro.vn/book/count_book_view/",
       data:{
                book_id:$("#share_id").val(),
				csrf_test_name:$("#csrf_test_name").val()
            },
		success:function(){
				
		}
	})
}
//end
