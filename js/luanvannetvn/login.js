jQuery (function($){    	
    $(document)
    .ready(function(){
		$('.dropdown').hover(function() {
			$(this).toggleClass('open');
		});
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
		url='http://myweb.pro.vn/user/validate/'+username+'/'+password+"/"+remember_me
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
	var path=window.location.href.replace("&type=register","");
		  window.location.href=path;
    }
}

