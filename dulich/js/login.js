jQuery (function($){    	
    $(document)
    .ready(function(){        
        facebook_login("header_face_book_login",function(response){                 
        
		})
    })
    .on("click","#a_register",doShowModal)
    .on("click","#show",doShowModal)
    .on("click","#modal_register .modal-header button",doHideModal)
    .on("click","#modal_login .modal-header button",doHideModal)
	.on("ready", doAnalytic)
    .on("click", "#btn_login", login)
    .on("click", "#btn_login_register", login)
    .on("click","#show_login",function(){
		$("#toefl_overview #type").val("default_login")
	})
	.on("click", "#remember_me", function(){
        $(this).val(1)
    })
})

function doShowModal(){
$("#modal_login").attr("style","width:50%;top:50%")
$(".game_wrapper").css("margin-left","1000000px")
}
function doHideModal(){
$(".game_wrapper").css("margin-left","0%")
}
function doAnalytic (){
}

function login()
{
	var err=true;
	err = err & validateInput("req",document.frmlogin.username,"Vui lòng nhập tên đăng nhập hoặc email");
	err = err & validateInput("req",document.frmlogin.password,"Vui lòng nhập mật khẩu");

	var remember_me=$("#remember_me").val(), 
		username=$("#username").val(), 
        password=$("#password").val(), 
		is_register=$("#is_register").val(),
		url='http://myweb.pro.vn//user/validate/'+username+'/'+password+"/"+remember_me
        type_request='POST';    
	
    if (err === 1){
			sendRequestToServer(url,type_request,validate)
		}    
}

function validate(msg)
{
    if(msg == 0)
    {
    	$("#ERRlogin").html('Tên đăng nhập và mật khẩu không khớp');
    }
    if(msg == 1)
    {
    	window.open('/admin/index/','_parent')
    }
    
    if(msg == 2)
    {
		if($(document).find('#reg_type').length=="1"){
			//from book view when user finish register then redirect to home page and show popup login
			if($("#reg_type").val()=="register"){
				$("#btn_login").html("Đang đăng nhập vào hệ thống...")
				if($("#toefl_overview").length=="1"){
					$("#is_download").val("1")
					if($('#ebook_type').val()=='luanvan'){
						$("#toefl_overview")
						.attr('action','http://myweb.pro.vn/luanvan/detail?id='+$("#share_id").val()+'&type=add_to_mylib')
						.submit()		
					}
					if($('#ebook_type').val()=='book'){
						$("#toefl_overview")
						.attr('action','/doc-sach-tham-khao')
						.submit()		
					}

				}
				//window.parent.location.href="http://myweb.pro.vn/user/account?tab=mylib";
			}
			//when user register from book view then show login show login
			if($("#reg_type").val()=="0"){
				$("#btn_login").html("Đang đăng nhập vào hệ thống...")
				$("#toefl_overview").submit()
			}
			if($("#reg_type").val()=="toefl"){
				$("#btn_login").html("Đang đăng nhập vào hệ thống...")
				$("#toefl_overview")
					.attr('action','http://myweb.pro.vn/toefl')
					.submit()
			}

		}
		if($(document).find('#reg_type').length=="0"){
				$("#btn_login").html("Đang đăng nhập vào hệ thống...")
				if($("#toefl_overview").length=="1"){
					$("#is_download").val("1")
					$("#toefl_overview").submit()		
				}
				if($("#toefl_overview").length=="0") {
					
					if($("#type").val()=='tailieuvn' || $("#type").val()=='tailieuhoceduvn') {
						$("#frm_download").find("#download").remove()
						$("#frm_download").submit()		
					}
					else {
						window.parent.location.href="http://myweb.pro.vn/";				
					}
				}
		}
		
		//window.parent.location.href=$("#btn_login").attr("data-redirect")
    }
}

