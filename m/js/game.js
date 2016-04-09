$(document)
    .on("click", ".game_list", count)
    .on("mouseover", ".game_div_item", show_game_item)
    .on("mouseout", ".game_div_item", hide_game_item)    
	.on("ready", set_dropdown_category)
	.on("click", ".header_pagination a", category_pagination)	
	.on("click","#btn_add_to_my_game",function(){
		$("#modal_game_list #game_main_iframe").contents().find("#unityPlayer").hide()
	})
	.on("click","#show_login",function(){
		$("#modal_login").attr('style','z-index:100000')	
		if($("#main_table_tinhkhucbathu").length=="1"){
		$("#main_table_tinhkhucbathu").attr('style','z-index:0')	
		}
	})
	.on('click',"#btn_add_to_my_game",function(){
		if($("#is_logged").val()=="0"){			
				$(".alert_register")
						.html('Nếu bạn chưa có tài khoản thì <a href="#" >đăng ký tại đây</a>')
						.show()
				$("#modal_login")
					.attr("style",'width:500px!important;z-index:10000')
					.modal("show")
			}
			else {
				//start ajax call
				$.ajax({
				content:'text/html',
				type:'get',
				url:'/game/usergame/',
				data:{
				id_game:$("#game_id").val()
				},
				success:function(data){
					if(data ='0'){
						$("#add_game_success").modal('show')
					}
					if(data ='1'){
						$("#add_game_success")
							.find("h3").html('Game này đã có trong danh sách game của bạn')
							.modal('show')
					}
				}
				})
				//end ajax call
			}
	})
	.on("click",".alert_register a",function(){
		$("#modal_login").modal('hide')
		$("#modal_register").modal('show')
	})

function set_dropdown_category() {
	//remove unknown advertisem
	$(".fo-container,.fo-right-slider,.fo-deal-offers").remove();	
	$(".fa-search").tooltip({
		title:'Click để tìm kiếm',
		placement:'right'
	})
    $("#header_face_book_login").tooltip({
		title:'Dùng tài khoản facebook để đăng nhập',
		placement:'right'
	})
 
	$("#li_game_category ul li").mouseover(function(){
        $("#game_header_search #type").val($(this).find("a").attr("data-type"))
    })
    $("#li_game_category ul li").click(function(){
		$("#id_category").val($(this).attr("data-id"))		
        $("#name_category").val($(this).find("a").html())
        $("#count_category_item").val($(this).find("input").val())         
		$("#game_header_search").submit()
		})
  var obj_count_category_item = parseInt($("#count_category_item").val())	  
  if (obj_count_category_item > 32) {
			$("#game_header_category_item").find("span").html("(scroll để xem thêm)")
		}
  else{
		$("#game_header_category_item").find("span").empty();
	}
	
	//close the game modal and show the main header
	$("#modal_game_list .close").click(function(){
		$("header").show();
	})
}

function category_pagination(){
	var get_href_category = "?&id_category="+$("#id_category").val();    
	
    //category pagination
    if($(this).attr('href').match("id_category")){
	  //do nothing
	}
	else{
             $(this).attr('href', $(this).attr('href') + get_href_category)                   	      
    }        
    
    //type pagination
    if($(this).attr('href').match("type") && $(this).attr('href').match("id_category")){
        //do nothing
    }
    else {          
            var get_href_type ="?&type="+$("#game_header_search #type").val(), 
                url_game_type =$(this).attr('href').replace("?&id_category=0","")+ get_href_type;
            $(this).attr('href', url_game_type);            
    }				
}

function count(){
    $.ajax({
	   type:"POST",
       url:"/game/count_click_play/",
       data:{
                game_id:game_id,
                csrf_test_name:$("#game_header_search #csrf_test_name").val()
            } 
	})
}

function show_game_item(){
   var game_id = $(this).attr("id").replace("game_div_item_", "")
   $("#"+"game_item_"+game_id).show()
   $(this).find("i").tooltip()
   $("#"+"game_div_item_"+game_id+" .fa-plus-square").show()	
   $("#"+"game_div_item_"+game_id+" .wrapper_youtube_icon").show()	   
   $("#"+"game_div_item_"+game_id+" .wrapper_youtube_icon .fa-plus-square").click(function(){
		//write add to my game function here
   })

   $("#"+"game_div_item_"+game_id+" .wrapper_youtube_icon .fa-youtube-square")	   
   .click(function(){
		$("#frame_video_description").attr("src",$("#"+"game_div_item_"+game_id+" .wrapper_youtube_icon").find("input").val())
		$("#video_description")
			.modal("show")
			.find("span").html($("#game_name_video_description_"+game_id).val())
   })
  
   $("#"+"game_item_"+$(this).attr("id")).find('i').show()
}

function hide_game_item(){
   $("#"+"game_div_item_"+$(this).attr("id").replace("game_div_item_", "")+" .fa-plus-square").hide()	
   $("#"+"game_item_"+$(this).attr("id").replace("game_div_item_", "")).hide()
   $("#"+"game_div_item_"+$(this).attr("id").replace("game_div_item_", "")+" .wrapper_youtube_icon").hide()
}


