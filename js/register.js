var err = true;
$(document)
        .on("click", "#btn_register", SaveButtonClick)
        .on("ready", facebook_connect)
function facebook_connect()
{
	$("#btn_register_facebook").tooltip({title:'Dùng tài khỏan facebook để đăng ký',placement:'top'})
    facebook_register("btn_register_facebook",function(response){ 
          //do action after user sign in facebook      
        })
}
function Reset()
{
    document.getElementById('name').value='';
    document.getElementById('tang').value='';
    document.getElementById('district').value='';
    document.getElementById('email').value='';
    document.getElementById('phone').value='';
    document.getElementById('address').value='';
    document.getElementById('district').value='';
    document.getElementById('username').value='';
    document.getElementById('password').value='';
    document.getElementById('security').value='';
    document.getElementById('retype_password').value='';
}

function SaveButtonClick()
{
    err = err & validateInput("equ="+document.frmAddUser.password.value,document.frmAddUser.retype_password,"Mật khẩu không khớp.");
    err = err & validateInput("req",document.frmAddUser.name,"Bạn chưa nhập tên");
    err = err & check_selected(document.frmAddUser.sex,"Bạn chưa chọn giới tính");	
    err = err & validateInput("req",document.frmAddUser.password,"Mật khẩu không được rỗng");
    err = err & check_username(document.frmAddUser.username.value)
    err = err & checkEmail(document.frmAddUser.email.value)
    err = err & checkCaptcha(document.frmAddUser.captcha.value)
    
    if(document.frmAddUser.email.value!='')
    {
        err = err & validateInput("email",document.frmAddUser.email,"Xin vui lòng nhập email hợp lệ");
    }
    if(err) 
    {
		document.frmAddUser.submit();
    }
	
}

function check_email(msg)
{
    if(msg=='1')
    {
        document.getElementById('ERRemail').innerHTML ="Email đã được sử dụng";
        return true;
    }
    else if(msg=='2')
    {
        if (validateEmail(document.getElementById("email").value))
        {
        	document.getElementById('ERRemail').innerHTML ="<font color='blue'>Email hợp lệ</font>";
        }       
        else {
        	document.getElementById('ERRemail').innerHTML ="<font color='red'>Xin vui lòng nhập email hợp lệ</font>";
        } 
        return false;
    }
}

function check_username(value)
{
	if(value != ''){
		$.ajax({
			type:"get",
			url:"/user/checkExist/"+value,
			success:function(data){
				if(data =="1"){
					$("#ERRusername").html('Tên người dùng đã tồn tại')
					err = false;
					}
				if(data =="0"){
					console.log(data)
					$("#ERRusername").html('')
					err = true;
				}
			}
		})
	}
	else {
	$("#ERRusername").html('Tên đăng nhập không được rỗng')
	err = false;
	}
	return err;
}

function checkEmail(value)
{
	if(value != ''){
	$.ajax({
			type:"get",
			url:"/user/checkEmail/"+value,
			success:function(data){
				if(data == "1"){
					$("#ERRemail").html('Email đã được sử dụng')
					err = false;
				}
				if(data == "0"){
					$("#ERRemail").html('')
					err = true;
				}
			}
				
		})
	}
	else {
				$("#ERRemail").html('Email không được rỗng')
				err = false;
	}
	return err;
}


function checkCaptcha(value)
{
	if(value != ''){
	$.ajax({
			type:"get",
			url:"/user/checkCaptcha/"+value,
			success:function(data){
				if(data == "0"){
					$("#ERRcaptcha").html('Bạn nhập mã chống spam không chính xác')
					err = false;
				}
				if(data == "1"){
					$("#ERRcaptcha").html('')
					err = true;
				}	
			}
				
		})
	}
	else {
			$("#ERRcaptcha").html('Mã chống spam không được rỗng')
			err = false;		
	}
	return err;
}

function check_selected(objValue, strError) 
{
	if (objValue.value != "1" && objValue.value != "0"  )
	{
		document.getElementById("ERR"+objValue.name).innerHTML = strError;
		return false;
	}
	else
	{
		document.getElementById("ERR"+objValue.name).innerHTML = "";
		return true;
	}
}
