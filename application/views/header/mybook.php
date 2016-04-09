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
.user_register_login {
position: fixed;
margin-left: 85%;
z-index: 1000000000;
margin-top:40px;
}
</style>
</head>

<body>
<div class="user_register_login">
<?php if($user_data == "-1"):?>	
<span class="user_login">Đăng nhập</span> hoặc
<span class="user_register">Đăng ký</span>				
<?php endif;?>
<?php if($user_data != "-1"):?>
<ul class="user_logged_in">
<li class="header_divider">
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
<li class="dropdown"  id="user_account">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
</a>
<ul class="dropdown-menu" style="margin-top:15%;"  role="menu" aria-labelledby="dLabel">
<li class="dropdown-divider"></li>                    
<li><a href="/user/account?tab=profile"> <i class="fa fa-user"></i> Tài khoản</a>	</li>
<li><a href="/user/account?tab=profile"> <i class="fa fa-user"></i> Tường nhà tôi</a>	</li>
<li>
<a href="/book/mybook"> <i class="fa fa-book fa-fw "></i> Tủ sách của tôi</a>	
<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=4"> 
	<i class="fa fa-book fa-fw"></i> Tủ truyện của tôi
</a>	
</li>
<li>
<a href="/user/account?tab=mygame"> <i class="fa fa-gamepad"></i> Game của tôi</a>	
</li>
<li>
<a href="/user/account?tab=myvid"> <i class="fa fa-film"></i> Phim của tôi</a>	
</li>
<li>
<a href="/user/logout/"><i class="fa fa-sign-out"></i> Thoát</a>		
</li>
<li class="dropdown-divider"></li>                    
</ul>

</li>
</ul>
<?php endif;?>
</div>
<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>

<script type="text/javascript" src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<script src="http://raovatnhanh.net.co/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript" async src="http://raovatnhanh.net.co/js/bootstrap.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/AjaxEngine.js" ></script>
<script type="text/javascript" async src="http://raovatnhanh.net.co/js/login.js"></script> 
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/validate.js" ></script>
<script type="text/javascript" src="http://raovatnhanh.net.co/js/social/facebook.js" ></script>	   
</body>
</html>