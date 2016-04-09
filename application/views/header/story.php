<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?= $title ?></title>
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
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/story_book.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=emboss"/>	
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/game.css" media="screen"/> 
<style type="text/css">	

@font-face {
font-family: 'FontAwesome';
src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
font-weight: normal;
font-style: normal;

::selection {
  background-color: #1e1e1e;
  color: #fff;
}

/* style scroll bar*/
::-webkit-scrollbar {width: 16px; height:16px; }
::-webkit-scrollbar-thumb{background-color:red !important;}

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
width: 30%!important;
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

a:hover, a:link, a:visited {
color: #3fbf79;
}
#ui-id-1 {
padding-top:15px;
}
.fa-search {
margin-left:220px;
margin-top:-25px;
display:inline-block !important;
}
.fa-home {
margin-top: -20px;
margin-left: -10px;
}
#game_header_search{
position:absolute;z-index:1000;margin-left:25px;
}
.cse_box {
width:260px;
margin-left:60px;
height:30px!important;
background:white url('http://www.google.com/cse/intl/en/images/google_custom_search_watermark.gif') right no-repeat !important;
margin-top:5px!important;
color:black!important;
}
.header_search {
background:none!important;
color:white;
width: 400px;
margin-top: 2px!important;
}
.navbar-inner {
background-image: linear-gradient(to bottom, #0b8040, #0b8040);
}
.header_icon {
  width: 32px;
  height: 32px;
  margin-top: -4%
}
</style>

</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse">
<div class="container-fluid">
<div class="language">
<a title="Mạng xã hội học tập giải trí" href="/doctruyen/danhmuc?id=3" class="brand animated fadeInDown"> 
<!--<img class="header_logo" src="/images/hat-512.png" /> -->
</a>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/doctruyen/danhmuc">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:2351552689">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" placeholder="Enter để tìm truyện.">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
</form> 

<ul style="margin-left:375px;position:absolute" class="nav pull-right">

<li class="dropdown" onclick="window.location.href='http://myweb.pro.vn/doctruyen/danhmuc?id_category=1'">
<a class="item_link" data-toggle="dropdown" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=1">
	 Truyện ngắn
</a>
</li>

<li class="dropdown">
<a class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=2">
	 Truyện cười
</a>
</li>

<li class="dropdown">
<a class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=3">
	 Kiếm hiệp
</a>
</li>

<li class="dropdown"> 
<a role="button" class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=4">
	 Tiên hiệp
</a>
</li>

<li class="dropdown"> 
<a role="button" class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=5">
	Ngôn tình
</a>
</li>

<li class="dropdown"> 
<a role="button" class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=6">
	Đô thị
</a>
</li>

<li class="dropdown"> 
<a role="button" class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=7">
	Truyện Teen
</a>
</li>

<li class="dropdown"> 
<a role="button" class="item_link" href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=8">
	Xuyên không
</a>
</li>

</ul> 
</div>                
</div>
</header>

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>
</body>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/game.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/login.js"></script> 
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/validate.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/social/facebook.js" ></script>	   
</html>