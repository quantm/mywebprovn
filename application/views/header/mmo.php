<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?=$title?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content="Tổng hợp kiếm tiền Online"/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="alternate" hreflang="en" href="http://en.myweb.pro.vn" />
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/book.css" media="screen"/> 
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/header_mmo.css" media="screen"/> 
<style type="text/css" media="screen">	
	@font-face {
	font-family: 'FontAwesome';
	src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
	src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
	font-weight: normal;
	font-style: normal;
}
</style>

</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">
<a title="" href="http://myweb.pro.vn/kiemtien/danhmuc?id=1" class="brand animated fadeInDown"> 
<i style="color:rgb(223, 199, 197);margin-top:-17px" class="fa fa-dollar  fa-2x"></i>
</a>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/kiemtien/cse/">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:2484701081">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" placeholder="Enter để tìm kiếm bài viết...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
</form>   

<ul class="nav pull-right">

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/kiemtien/danhmuc?id=1">
	<i class="fa fa-dollar fa-1x"></i> Kiếm tiền online
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="#">
	<i class="fa fa-dollar fa-1x"></i> Youtube
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/kiemtien/danhmuc?id=3">
	<i class="fa fa-dollar fa-1x"></i>WorldPress
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/kiemtien/danhmuc?id=2">
	<i class="fa fa-dollar fa-1x"></i> SEO
	</a>
</li>

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
<iframe src="/user/register?lang=vn" ></iframe> 
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
<button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal">Kết nối Facebook</button>       
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

<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="/js/login.js"></script> 
<script type="text/javascript"  src="/js/validate.js" ></script>
<script type="text/javascript"  src="/js/social/facebook.js" ></script>	   
<script type="text/javascript"  src="/js/header.js"></script>  
<script type="text/javascript" src="http://myweb.pro.vn/js/advertisement.js"></script>
</body>
</html>