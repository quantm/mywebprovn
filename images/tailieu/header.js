$(document)
.on('focus','#search',function(){
	$(this).val('')
})
.on("mouseover","#ul_cate_news #nghenhac_quehuong",function(){
	//$('#search').val("Nhạc quê hương")
})
.on("mouseover","#ul_cate_news #nghenhac_trutinh",function(){
	$('#search').val("Nhạc trữ tình")
})
.on('click','#ul_cate_news #nghenhac_quehuong, #ul_cate_news #nghenhac_trutinh',function(){
	/*
	$("#game_header_search")
		.attr('action','/music/index')
		.submit()
	*/
})
.on("ready","",function(){
	$(".fa-search").mouseout(function(){$(this).show()})
})
.ready(function(){
	//show login modal when finish register
	if($("#reg_type").val() == "register"){
		$("#toefl_overview").attr("action","/")
		$("#modal_login")
			.attr('style','z-index:100000')
			.modal("show")
	}	
	//end
})
.on('mouseout','#header_face_book_login',function(){
$(this).show()
})
