<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?=$title?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content=""/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="publisher" href="https://plus.google.com/+MywebProVnsocial">
<link rel="alternate" hreflang="en" href="http://en.myweb.pro.vn" />
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/book.css" media="screen"/> 
<style>	
@font-face {
font-family: 'FontAwesome';
src: url('../fonts/fontawesome-webfont.eot?v=4.0.3');
src: url('../fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('../fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('../fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('../fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
font-weight: normal;
font-style: normal;
}
.navbar .nav>li>.dropdown-menu:before {
border-bottom: 7px solid #FFF7F7;
border-bottom-color:none!important;
}
.navbar .nav>li>.dropdown-menu:after{
border-bottom:none!important;
}
.contentheading span:hover{
	color:red!important;
}
.navbar .nav>li>a {
text-shadow:none!important;
}
.header_user_avatar {
margin-top:-2px!important;
}
.fa-1x {
	font-size:20px!important;
}
header {
position:absolute;
z-index:10000000;
}
header ul {
list-style:none !important;
}
#modal_login {
z-index:-1;
}
#login_body,#modal_login .modal-footer {
margin-left:15px;
}
i{
color: rgba(73, 182, 90, 0.98);
text-shadow: 1px 1px 1px #613128;
font-size:22px;
font-weight:bold;
}
.font-effect-emboss {
color:#F5252D;
text-shadow: 1px 1px 1px #0F2C33, 0 -1px 1px #8B4949;
}
.header_logo {
height:48px;
width:48px;
margin-top:-14px;
}
#modal_login {
width: 31%!important;
top: 70%;
display: block;
}

#remember_me_wrapper {
float: right;
display: inline-block;
}
#header_btn_login{
float: left;
display: inline-block;
}
.modal-header .close {
margin-top: -8px;
}
.alert_register {
display:none;
color:red;
font-size:13px;
margin-left:15px;
}
.a_cate_news {
font-size:13px!important;
}
a:hover {
color:red!important;
}
.language a {
	margin-top: -10px !important;
	font-size: 20px;
	color: #EDEFEE  !important;;
	text-shadow: 1px 1px 1px #9EA39E !important;;
}

.language p {
	margin-top: -30px;
	margin-left: 30%;
	width: 100%;
}

.pull-left {
	margin-left:20% !important;
}
.nav a {
font-size:14px!important;
} 
.fa-home {
	margin-top: -12px !important;
}
</style>

</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">
<a title="Prepare for TOEFL" href="" class="brand animated fadeInDown"> 
		<i class="fa fa-home fa-2x"></i>
		<p></p>
</a>
</div>   
<ul class='nav pull-left'>

<li id="header_reading" class="dropdown" style="width:auto">			
	<a class="item_link" title="Reading" href="#Reading">
	<i class="fa fa-coffee fa-1x"></i> HTML/CSS 
	</a>
</li>


<li id="header_listening" class="dropdown" style="width:auto">			
	<a class="item_link" title="Listening" href="#Listening">
	<i class="fa fa-coffee fa-1x"></i> Javascript
	</a>
</li>


<li id="header_practice" class="dropdown" style="width:auto">			
	<a class="item_link" title="Practice" href="#Practice">
	<i class="fa fa-coffee fa-1x"></i> Graphics
	</a>
</li>


<li id="header_essay" class="dropdown" style="width:auto">			
	<a class="item_link" title="Essay" href="#Essay">
	<i class="fa fa-coffee fa-1x"></i> Server Side
	</a>
</li>

<li id="header_vocabulary" class="dropdown" style="width:auto">			
	<a class="item_link" title="Vocabulary" href="#Vocabulary">
	<i class="fa fa-coffee fa-1x"></i> XML
	</a>
</li>

</ul>
<ul class="nav pull-right">

<?php if($user_data == "-1"):?>	
<li class="dropdown" style="width:auto">			
	<a class="item_link" data-toggle="modal" href="#modal_login" id="show_login">
	<i class="fa fa-sign-in fa-1x"></i> Đăng nhập
	</a>
</li>

<li class="dropdown">
	<a class="item_link" href="#modal_register" data-toggle="modal">
	<i class="fa fa-check-square-o fa-1x"></i> Đăng ký
	</a>
</li>					
<?php endif;?>
<?php if($user_data != "-1"):?>
<li class="header_user_avatar">
<?php foreach ($user_data as $key):?>
<img class="user_avatar" src="<?php 
if($key['facebook_id']!=''&& $key['USER_IMAGE'] =='') echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
if($key['facebook_id']=='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE'];
if($key['facebook_id']=='' && $key['USER_IMAGE'] =='') echo '/images/no_avatar.png';
if($key['facebook_id']!='' && $key['USER_IMAGE'] !='' &&  $key['facebook_id'] != $key['USER_IMAGE']) echo $key['USER_IMAGE']; 
if($key['facebook_id'] == $key['USER_IMAGE'] && $key['USER_IMAGE'] !='')  echo 'https://graph.facebook.com/'.$key['facebook_id'].'/picture'; 
?>" 
alt="<?=$key['NAME']?>"/>
<?php endforeach;?>
</li>
<li class="dropdown" id="user_account">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
</a>
<ul class="dropdown-menu" style="margin-top:15%;" role="menu" aria-labelledby="dLabel">
   <li class="dropdown-divider"></li>                    
   <li>
		<a href="/user/account?tab=profile"><i class="fa fa-user fa-2x"></i> Tài khoản</a>	
   </li>
   <li>
		<a href="/user/account?tab=mylib"><i class="fa fa-book fa-fw fa-2x"></i>Thư viện của tôi</a>	
   </li>
   <li>
		<a href="/user/account?tab=mygame"><i class="fa fa-gamepad fa-2x"></i>Game của tôi</a>	
   </li>
   <li>
		<a href="/user/account?tab=myvid"><i class="fa fa-film fa-2x"></i> Phim của tôi</a>	
   </li>
   <li>
		<a href="/user/logout/"><i class="fa fa-sign-out fa-2x"></i> Thoát</a>		
   </li>
   <li class="dropdown-divider"></li>                    
</ul>
</li>
<?php endif;?>

<li><!--Mua bán--> </li>
</ul> 
</div>                
</div>
</header>

<!-- register -->
<div class="modal hide fade" id="modal_register">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
<iframe src="http://xahoihoctap.net.vn/user/register?lang=vn" ></iframe> 
</div>       
</div>
<!-- end register -->	

<div class="modal hide fade" id="login_process" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="/public/images/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang đăng nhập vào hệ thống...</span>
</div>

<div class="modal hide fade" id="book_loading" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="/public/images/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang tải sách, bạn vui lòng chờ tý...</span>
</div>

<!-- login -->
<form id="frmlogin" method="post" name="frmlogin">
<div class="modal hide fade" id="modal_login">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4>Đăng nhập</h4>
<div class="clr"></div>
<span class="alert_register">Vui lòng đăng nhập để làm bài, nếu bạn chưa có tài khoản thì <a href="#" >đăng ký tại đây</a></span>
</div>
<div id="login_body" class="modal-body">
<div class="input-group margin-bottom-sm" id="default_login">
<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw fa-2x"></i></span>
<input class="form-control" type='text' id='username' name='username' placeholder="Tên đăng nhập hoặc Email">
<div class="clr"></div>
<span id="ERRusername" class="box_erro_area"></span>
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key fa-fw fa-2x"></i></span>
<input class="form-control" type="password" name='password' id='password' placeholder="Mật khẩu">
<div class="clr"></div>
<span class="box_erro_area" id="ERRpassword"></span>
<div class="clr"></div>
<span class="box_erro_area" id="ERRlogin"></span>
</div>	
</div>
<div class="modal-footer">
<span id="remember_me_wrapper">
<!--Nhớ tôi--> <input id="remember_me" type="hidden" value="0">
</span>
<div id="header_btn_login">
<button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Facebook</button>       
<!--
<button href="#" class="btn btn-twitter" id="header_face_book_login" data-dismiss="modal">Twitter</button>
<button href="#" class="g-signin btn btn-google" 
data-dismiss="modal" 
data-scope="https://www.googleapis.com/auth/plus.login"
data-requestvisibleactions="http://schemas.google.com/AddActivity"
data-clientId="940667944641.apps.googleusercontent.com"
data-accesstype="offline"
data-callback="onSignInCallback"
data-theme="dark"
data-cookiepolicy="single_host_origin">Google+</button>        
-->
<button data-redirect="" id="btn_login" type="button" class="btn btn-primary">Đăng nhập</button>
</div>
</div>
</div>
</form>
<!-- end login -->

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>

<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script src="http://xahoihoctap.net.vn/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/login.js"></script> 
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/validate.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/social/facebook.js" ></script>	   
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/header.js"></script>  
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/advertisement.js"></script>
</body>
</html>