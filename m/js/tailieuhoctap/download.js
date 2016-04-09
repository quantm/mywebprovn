$(document)
//start ready function
.ready(function(){

reset_ui_action()
count_book_view()

//start proccess button download
//$('.item-page h1').next().append('<input type="button" class="btn btn-info btn_download" value="Tải về"><input type="button" class="btn btn-info btn-add-book" value="Tạo danh mục tham khảo">')		
$('.item-page h1').next().append('<input id="btn_read_online" style="margin-left:58%!important;dísplay:none" data-type="read" type="button" class="btn btn-info btn_download" value="Đọc online"><input data-type="download" type="button" class="btn btn-info btn_download" value="Tải về"><input type="button" class="btn btn-info btn-add-book" value="Tạo danh mục sách tham khảo">')		
process_download()

})	
//end ready function

//start btn_add_to_my_library
	.on('click','.btn-add-book',function(){
				$("#toefl_overview").attr('action','/user/account?tab=mylib')
				$("#lib_book_id").val($("#share_id").val())
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
					url:'/book/mylibcheckexist/',
					data:{
						book_to_add:$("#lib_book_id").val()
					},
					success:function(data){
						if(data=="0"){
						//start ajax call
						$.ajax({
							content:'text/html',
							type:'get',
							url:'/user/account?tab=mylib',
							data:{
								lib_book_id:$("#lib_book_id").val()
							},
							success:function(){
								$("#modal_book_adding")
									.modal("show")
									.find('h3')
									.html('Đã thêm sách vào thư viện của bạn')
									
							}
						})
						//end ajax call
						}
						if(data=="1"){
							$("#modal_book_adding").modal('show')
						}
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
	
	$('.counter,.content-download2,.remove, #loctailieu,.mod_quang_cao,.banneritem,.blog script,#divManHinh2').remove()
	$(".intro h4").find('div').remove()

	//start category navigation
	$("#accordion1 ul li").mouseover(function(){
	$("#book_category").val($(this).find("span").attr('val'))
	})
	$("#accordion1 ul li").click(function(){
	$("#ja-content-main,.row").remove()	
	$("#fetch_book_process .modal-body span").html("Đang tải sách thuộc danh mục: "+"<br/><b>"+$(this).find('span').html()+"</b>")
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
	reset_ui_action() 
	//pagination()
	detail()
	$('.ads_left_wrapper_view').attr('style','margin-top:-80%')
	}

	})
	})
	//end

	//open category
	$("#header_doc_category").click(function(){
	$(".left_category").show('slow')
	$(".item-page,.blog,.social_like").hide()
	$("#globalheader").attr('style','margin-top:100% !important')
	})
	//end

	//category accordion
	$("#accordion1").accordion()
	//end

	//start fix firefox UI error
	var isFirefox = typeof InstallTrigger !== 'undefined',book_thumbs=$('[name="image"]').attr('content'),doc_desc=$(".mo_ta_tai_lieu").height()   
	if(isFirefox){
		$(".social_link").attr('style','bottom:524px')
	}
	//end
	
	//hight light current row
	$(".moduletable #sach_cung_tg").find("div").mouseover(function(){$(this).addClass('hight_light')})
	$(".moduletable #sach_cung_tg").find("div").mouseout(function(){$(this).removeClass('hight_light')})
	//end

	$(".moduletable").find("style").remove()
	$(".viewer").prepend('<img class="book_cover" src='+book_thumbs+'>')
	//mobile
	if(window.innerWidth <= "800" && window.innerHeight <= "640") {

	} 
	//end

	if(doc_desc>'75'){
		$(".book_cover").attr('style','margin-top:-'+doc_desc+"px")
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

	//hide read online button if filetype is not PDF
	if($(".mo_ta_tai_lieu").next().attr('alt')!='PDF'){
		$("#btn_read_online").hide()
	}
	

	if($("#page0").length=="1"){
		str_parent_folder=$("#page0").attr('src').split('/')[4]
		thumuc_con=$("#page0").attr('src').split('/')[5]
		file_id=$("#page0").attr('src').split('/')[6]
		file_name=file_id + "." + $(".mo_ta_tai_lieu").next().attr('alt').toLowerCase()
		if($(".mo_ta_tai_lieu").next().attr('alt')=='PDF'){
			var url_read_online="http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
			$("#modal_read_online .modal-body").append('<object data="'+url_read_online+'" type="application/pdf" style="width: 98%;height: 90%;margin-top: 25px;"></object')
		}
	}

	else{
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
		file_name=file_id+"."+$(".mo_ta_tai_lieu").next().attr('alt').toLowerCase()
		
		if($(".mo_ta_tai_lieu").next().attr('alt')=='PDF'){
			var url_read_online="http://data.tailieuhoctap.vn/books/"+str_parent_folder+"/"+thumuc_con+"/"+	file_name
			$("#modal_read_online .modal-body").append('<object data="'+url_read_online+'" type="application/pdf" style="width: 98%;height: 90%;margin-top: 25px;"></object')
		}
	}
	
//start click to download
$('.btn_download').click(function(){
	count_book_downloaded()

//show embed pdf viewer
if($(this).attr('data-type')=='read'){
		$("#modal_read_online").modal('show')
}
//end

//if not login
if($("#is_logged").val()!="1"){
	if($(this).attr('data-type')=='download'){
		console.log("download")
		$('#modal_login .modal-header').append("<span class='tb_dang_ky'>Nếu bạn chưa có tài khoản, vui lòng <a data-toggle='modal' data-dismiss='modal' href='#modal_register'><font color=red>click vào đây</font></a> để đăng ký</span>")
		$("#modal_login")
				.attr('style',"z-index:2000")
				.modal('show')
		$("#modal_register")
				.attr('style',"z-index:10000;margin-top:27%!important")
		
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

}
//end function process_download

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

//start download function
function download(tmcha,tmcon,tfile,dkien){
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

        // Just submit
        mapForm.submit();
  }
  //end download function

//count book downloaded
function count_book_downloaded(){
	  $.ajax({
	   type:"POST",
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
