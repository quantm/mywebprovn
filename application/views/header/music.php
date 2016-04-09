<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?=$title?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content="Nghe nhạc Online"/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="alternate" hreflang="en" href="" />
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=3d-float"/>	
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<link rel="stylesheet" href="/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/css/book.css" media="screen"/> 
<style>	
@font-face {
	font-family: 'FontAwesome';
	src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
	src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
	font-weight: normal;
	font-style: normal;
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
.a_cate_news {
font-size:13px!important;
}
a:hover, a:link, a:visited {
color: #3fbf79;
}
#ui-id-1 {
padding-top: 15px;
}
.fa-search {
margin-left:230px;
margin-top:-36px;
display:inline-block !important;
}
.fa-home {
margin-top: -20px;
margin-left: -10px;
}
.tagged_text_ex2 {
height: 25px;
resize: none;
margin-top: 8px;
width:245px;
overflow:hidden;
}
#game_header_search{
position:absolute;z-index:1000;margin-left:65px;
}

.header_text_logo{
width: 525px!important;
font-size: 20px!important;
margin-top: 7px!important;
position: relative!important;
}
</style>

</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div  id="mega_main_menu" class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">

<ul class="nav pull-right">
<li class="header_text_logo"><span style="color: #DBCFCF;" class="font-effect-3d-float"></span></li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/music/nhacphap">
		 Nhạc pháp
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" data-toggle="modal" href="http://myweb.pro.vn/music/tinhkhucbathu/" id="show_login">
		Tình khúc bất hủ
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" href="http://myweb.pro.vn/music/nhackhongloi/">
		Nhạc không lời
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="" href="http://myweb.pro.vn/video" target="_blank">
		Xem phim
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto" target="_blank">			
	<a class="item_link" title="" href="http://myweb.pro.vn/game/">
		Chơi game
	</a>
</li>
	
</ul> 
</div>                
</div>
</header>

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>

<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="/js/game.js"></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript"  src="/js/analytic.js"></script>
<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="/js/login.js"></script> 
<script type="text/javascript"  src="/js/validate.js" ></script>
<script type="text/javascript"  src="/js/social/facebook.js" ></script>	   
<script type="text/javascript"  src="/js/header.js"></script>  
</body>
</html>