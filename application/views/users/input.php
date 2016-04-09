<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Thêm mới người dùng</title>
    <meta http-equiv="Content-Type" charset="UTF-8" content="text/html"/>  
    <!--<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />-->
	<link type="text/css" rel='Stylesheet' href='/css/login_register.css'/>
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript"  src="/js/bootstrap.js"></script>
	<script type="text/javascript" src="/js/social/facebook.js" ></script>
    <script type="text/javascript" src="/js/register.js"></script>
    <script type="text/javascript" src="/js/social/google.js" ></script>
    <script type="text/javascript" src="/js/common.js"  language="javascript"></script>
    <script type="text/javascript" src="/js/validate.js"></script>	 
    <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
</head>
<body>
<form name='frmAddUser'   enctype="multipart/form-data" id='frmAddUser'  action='/user/register/' method='post' >
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
<fieldset>
<legend><font size=3 color="red">Đăng ký thành viên</font></legend>
<table class='admintable register_left'>                                            
    <tr>
        <td class="key">Họ và tên</td>
        <td><input type="text" name='name' id='name' value=''/>
        <div class="clr"></div>
        <span id="ERRname" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Giới tính</td>
        <td>
            <select id='sex' name='sex'>
                <option>- Chọn giới tính -</option>
                <option  value='0'>Nam</option>
                <option value='1'>Nữ</option>
            </select>
            <div class="clr"></div>
            <span id="ERRsex" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key"><span title='Bạn có thể dùng email này để đăng nhập hệ thống'>Email</td>
        <td><input type="text" name='email' onChange="checkEmail(this.value)" placeholder="Nhập email bạn đang dùng" id='email' value=''/>
        <div class="clr"></div>
        <span id="ERRemail" class="box_erro_area"></span>
        </td>
    </tr>
   
	<tr>
        <td class="key"><span >Tên đăng nhập</td>
        <td><input type="text" name='username' onChange="check_username(this.value)" id='username' value=''/>
        <div class="clr"></div>
        <span id="ERRusername" class="box_erro_area"></span>
        </td>
    </tr>

    <tr>
        <td class="key">Mật khẩu</td>
        <td><input  type="password" name='password' id='password'/>
        <div class="clr"></div>
        <span id="ERRpassword" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Nhập lại mật khẩu</td>
        <td>
            <input type="password" id='retype_password' name='retype_password'/>
            <div class="clr"></div>
            <span id="ERRretype_password" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Nhập mã chống spam</td>
        <td>
			<?php echo $captcha['image'] ?><br>
			<div class="clr"></div>
			<input type='text' size="30" onChange="checkCaptcha(this.value)" id="captcha" name='captcha'/>
            <div class="clr"></div>
            <span id="ERRcaptcha" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td colspan="2" id="td_register">
            <button id="btn_register_facebook" type="button" class="btn btn-facebook">Kết nối Facebook</button>           
            <button id="btn_register"  type="button" class="btn btn-primary">Hoàn tất đăng ký</button>
        </td>
    </tr>
</table>
<div class='adv_micro_left'>
</div>
</fieldset>
    <input type='hidden' value='1' name='type' id='type'/>
    <input type="hidden" id="register_facebook_id" name="register_facebook_id" />
</form>
</body>
</html>
