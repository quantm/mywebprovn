<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?=$title?></title>
<meta content="text/html" http-equiv="Content-Type"/>
<meta charset="UTF-8"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content=""/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="www.myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="publisher" href="https://plus.google.com/+MywebProVnsocial">
<!--<link rel="alternate" hreflang="en" href="http://en.www.myweb.pro.vn" />-->
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/graduate_hat.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" async href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/book.css" media="screen"/> 
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/header_book.css"  media="screen">
<style type="text/css">
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
<a title="Chia sẻ tài liệu - Lan tỏa tri thức" href="http://myweb.pro.vn/book/category" class="brand animated fadeInDown"> 
<i style="color:rgb(158, 93, 181);margin-top:-17px" class="fa fa-graduation-cap fa-2x"></i>
</a>
<span class='header_text_search fa fa-search'></span>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/home/sitemap">
  <div>
  	<span id="header_cse_close" title="Click để đóng">×</span>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" placeholder="Enter để tìm luận văn, đề tài...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
  <div style="clear:both;height:15px"></div>
</form>   

<ul class="nav pull-right">

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=10">
	 Ngoại ngữ
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=22">
	 Y - Dược
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=11">
	 Luật
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=6">
	 Kinh tế
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=18">
	 Khoa học xã hội
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=26">
	 Kiến trúc
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=13">
	 Điện tử 
	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="sách tham khảo thuộc các ngành  CNTT - Tin học văn phòng, Quản trị-Marketing, Kỹ năng mềm,…" data-toggle="modal" href="book/?id_category=21">
	 Khoa học kỹ thuật
	</a>
</li>

<li class="dropdown" style="width:auto">			
	<a class="item_link" title="Danh mục Ebook" data-toggle="modal" href="http://myweb.pro.vn/book/?id_category=9">
	 CNTT
	</a>
</li>


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
		<a href="http://www.myweb.pro.vn/user/account?tab=profile"><i class="fa fa-user fa-1x"></i>  Tài khoản</a>	
   </li>
   <li>
		<a href="http://www.myweb.pro.vn/book/mybook/"><i class="fa fa-book fa-fw fa-1x"></i> Thư viện của tôi</a>	
   </li>
   <li>
		<a href="http://www.myweb.pro.vn/user/account?tab=mygame"><i class="fa fa-gamepad fa-1x"></i> Game của tôi</a>	
   </li>
   <li>
		<a href="http://www.myweb.pro.vn/user/account?tab=myvid"><i class="fa fa-film fa-1x"></i>  Phim của tôi</a>	
   </li>
   <li>
		<a href="http://www.myweb.pro.vn/user/logout/"><i class="fa fa-sign-out fa-1x"></i> Thoát</a>		
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

</div>       
</div>
<!-- end register -->	

<div class="modal hide fade" id="login_process" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="http://xahoihoctap.net.vn/images/ajax/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang đăng nhập vào hệ thống...</span>
</div>

<div class="modal hide fade" id="book_loading" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="http://xahoihoctap.net.vn/images/ajax/ajax_load_green.gif"/>
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
<button href="#" class="btn btn-facebook" id="header_face_book_login" data-dismiss="modal" title="Đăng nhập bằng tài khoản Facebook">Facebook</button>      
<button data-redirect="" id="btn_login" type="button" class="btn btn-primary">Đăng nhập</button>
</div>
</div>
</div>
</form>
<!-- end login -->

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>

<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//redirect to mobile page when user using mobile browser
	if(window.innerWidth <= "800" && window.innerHeight <= "640") {
		window.open('http://m.myweb.pro.vn/','_parent')
	}
	//end
})
</script>
<script src="http://xahoihoctap.net.vn/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/AjaxEngine.js" ></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/login.js"></script> 
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/validate.js" ></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/social/facebook.js" ></script>	   
</body>
</html>