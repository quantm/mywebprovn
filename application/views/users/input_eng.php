<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Register New User</title>
    <meta http-equiv="Content-Type" charset="UTF-8" content="text/html"/>
    <link type="text/css" rel='Stylesheet' href='/css/login_register.css'/>
    
    <script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/common.js"  language="javascript"></script>
    <script type="text/javascript" src="/js/social/google.js" ></script>
    <script type="text/javascript" src="/js/social/facebook.js" ></script>
    <script type="text/javascript" src="/js/validate.js"></script>
	<script type="text/javascript" src="/js/register.js"></script> 
    <script type="text/javascript" src="/js/Ajax/AjaxEngine.js"></script>
</head>
<body>
<form name='frmAddUser'   enctype="multipart/form-data" id='frmAddUser'  action='/user/register/' method='post' >
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>"/>
<fieldset>
<legend><font size=3 color="red">Register Account</font></legend>
<table class='admintable register_left'>                                            
    <tr>
        <td class="key">Name</td>
        <td>
            <input  placeholder="Firstname" style="width: 122px;padding-left:10px;" type="text" name='firstname' id='firstname' value=''/>
            <input  placeholder="Lastname" style="width: 122px;padding-left:10px" id="lastname" name="lastname" type="text"/>
            <div class="clr"></div>
            <span id="ERRname" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Sex</td>
        <td>
            <select id='sex' name='sex'>
                <option>- Sex -</option>
                <option  value='0'>Male</option>
                <option value='1'>Female</option>
            </select>
            <div class="clr"></div>
            <span id="ERRsex" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key"><span title='You can use this email for logging'>Email</span></td>
        <td>
            <input onChange="return checkEmail(this.value);" style="padding-left:5px;" placeholder="Recommend using Gmail"  type="text" name='email' id='email' value=''/>
            <div class="clr"></div>
            <span id="ERRemail" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key"><span >Username</span></td>
        <td>
            <input type="text" name='username' id='username' onChange="return checkData(this.value);" value=''/>
            <div class="clr"></div>
            <span id="ERRusername" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Password</td>
        <td>
            <input  type="password" name='password' id='password'/>
            <div class="clr"></div>
            <span id="ERRpassword" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td class="key">Retype password</td>
        <td>
            <input type="password" id='retype_password' name='retype_password'/>
            <div class="clr"></div>
            <span id="ERRretype_password" class="box_erro_area"></span>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <button id="btn_register_facebook" type="button" class="btn btn-facebook">Facebook connect</button>            
            <button class="g-signin btn btn-google" 
                    href="#"
                    data-dismiss="modal" 
                    data-scope="https://www.googleapis.com/auth/plus.login"
                    data-requestvisibleactions="http://schemas.google.com/AddActivity"
                    data-clientId="940667944641.apps.googleusercontent.com"
                    data-accesstype="offline"
                    data-callback="onSignInCallback"
                    data-theme="dark"
                    data-cookiepolicy="single_host_origin">Google+ connect</button> 
            <button id="btn_register_twitter" type="button" class="btn btn-twitter">Twitter connect</button>
            <button id="btn_register"  type="button" class="btn btn-primary">Register</button>
        </td>
    </tr>
</table>   
</fieldset>
    <input type='hidden' value='1' name='type' id='type'/>
    <input type="hidden" id="register_facebook_id" name="register_facebook_id" />
</form>
</body>
</html>
