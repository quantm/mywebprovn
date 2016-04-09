<html>
<head>
	<meta charset="utf-8">
	<link href="/css/login_register.css" rel="Stylesheet">
	<link href="/css/general.css" rel="Stylesheet">
	<script type="text/javascript" src="/js/validate.js"></script>
	<script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
	<style>
		#frmChangePass input {height:35px !important;}
		#modal_take_picture {
			height: 95%;
			left: 28%;
			top: 45%;
			width: 90%;
		}
		#modal_take_picture div {
			margin-top:45%;
			position:absolute;
			margin-left:72%;
			display:inline-block;
		}
		#frame_html5_capture {
			width:95%;
			height:80%;
			border:none;
			top:10%;
			position:absolute;
		}
		#frame_avatar {
		height: 165px;
		border: 1px solid rgb(224, 207, 207);
		width: 360px;
		}
	</style>
	<script type="text/javascript">
	$(document)
	//start ready function
	.ready(function(){	
		$("#btn_capture_snapshot")
			.click(function(){	
				$("#wall_right_7,.nav-pills").attr('style','z-index:1')
				$("#allow_use_camera").show()
				$("#frame_html5_capture").attr("src","/user/capture")
				$("#modal_take_picture").modal("show")
				$("#modal_take_picture iframe").contents().find(".modal").modal("show")				
			})
			.tooltip({
				title:"Dùng camera chụp ảnh và dùng làm ảnh đại diện",
				placement :"top"
			})

			$("#btn_close_modal_capture").click(function(){
				$("#frame_avatar").contents().find("img").attr('src',$("#modal_take_picture iframe").contents().find("#image_avatar").attr("src"))
					.show()
				$("#allow_use_camera").hide();
			})
	})
	//end ready funcion
	</script>
</head>
<body>

<form enctype="multipart/form-data"  id="frmChangePass" name='frmChangePass' action='/' method='post'>
<table class="admintable">
<thead>
		<th cols='2'><h4 style="color:red;display:none" id="update_success">Đã cập nhật thành công</h4></th>
</thead>
<tbody>
<tr>
	<td class="key">Email</td>
	<td>
		<input type="email" class="form-control" id="email" name="email" placeholder="<? 
		if($email == '') echo "Nhập email"; else echo $email; ?>"></input>
		<div class="clr"></div>
		<span id="ERRemail" class="box_erro_area"></span>
	</td>
</tr>

<tr>
	<td class="key">Số điện thoại</td>
	<td>
		<input type="text" class="form-control" id="phone" name="phone" placeholder="<?
		if($phone =='') echo "Nhập số điện thoại";
		else echo $phone;?>"></input>
	</td>
</tr>

<tr>
	<td class="key">Mật khẩu cũ</td>
	<td>
		<input type="password" class="form-control" onChange="return checkData(this.value);"  id="oldpassword" name="oldpassword" placeholder="Nhập mật khẩu cũ"></input>
		<div class="clr"></div>
		<span id="ERRoldpassword" class="box_erro_area"></span>
	</td>
</tr>

<tr>
	<td class="key">Mật khẩu mới</td>
	<td>
		<input type="password" class="form-control"  id='newpasword' name='newpasword' placeholder="Nhập mật khẩu mới" name="newpassword"></input>
		<div class="clr"></div>
		<span id="ERRnewpasword" class="box_erro_area"></span>
	</td>
</tr>

<tr>    
	<td class="key">Nhập lại mật khẩu mới</td>
	<td>
		<input type="password" class="form-control" name='newpaswordretype' id='newpaswordretype' placeholder="Nhập lại mật khẩu mới" name="newpasswordretype"></input>
		<div class="clr"></div>
		<span id="ERRnewpaswordretype" class="box_erro_area"></span>
	</td>
</tr>

<tr>
	<td class="key">Hình đại diện</td>
	<td>
		<iframe id="frame_avatar" src="/upload/"/>
		<input type="button" class="btn btn-inverse" id="btn_capture_snapshot" value="Chụp ảnh" /> 
	</td>
</tr>
</tbody>
</table>
<div style="display:inline-block;margin-top:15px">
	<input type='button' class='btn btn-success' value='Cập nhật' onclick="SaveButtonClick();">
	<input type='reset' class='btn btn-success' name='reset' value='Làm lại'>
</div>
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
</form>

<script>
var err = true;phone='',email=''
function SaveButtonClick(){
	 if($("#email").val() == "") {email=$("#email").attr("placeholder")}
	 if($("#email").val() != "") {email=$("#email").val()}
	 if($("#phone").val() == "") {phone=$("#phone").attr("placeholder")}
	 if($("#phone").val() != "") {phone=$("#phone").val()}
	 err = err & validateInput("equ="+document.frmChangePass.newpasword.value,document.frmChangePass.newpaswordretype,"Mật khẩu không khớp.");
	 err = err & validateInput("req",document.frmChangePass.oldpassword,"Vui lòng nhập mật khẩu cũ");
	 err = err & validateInput("req",document.frmChangePass.newpasword,"Vui lòng nhập mật khẩu mới");
	 if(document.frmChangePass.email.value!='')
	{
     err = err & validateInput("email",document.frmChangePass.email,"Xin vui lòng nhập email hợp lệ");
	}
	if(err == true){
			//start ajax call
		$.ajax({
			type:'html',
			method:'post',
			url:'/user/update/',
			enctype:'multipart/form-data',
			data:{
			'email':email,
			'phone':phone,
			'newpass':$("#newpasword").val(),
			'account_img_avatar':$("#frame_avatar").contents().find("img").attr("src"),
			'csrf_test_name':$("#csrf_test_name").val()
			},
			success:function(data){
				$("#update_success").show();
			}
		})		
		//end ajax call
	}
	else {
	
	}
}
function checkData(value)
{
    var checkAjax = new AjaxEngine(), url="/user/checkPassword/"+value, type_request = "GET";
    if(trim(value)!='')
    {
        sendRequestToServer(url,type_request,check_password,checkFail);
    }
}

function check_password(msg)
{
    if(msg=='1')
    {
        document.getElementById('ERRoldpassword').innerHTML ="";
        err=true;
    }
    else if(msg=='0')
    {
        document.getElementById('ERRoldpassword').innerHTML ="Mật khẩu cũ không đúng";
        err=false;
    }
}
function checkFail(msg)
{
    console.log("Data Checking Error");
}

</script>
</html>