<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?= $title ?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="Author" content="Tran Minh Quan"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content="Play game online | Tổng hợp những game mới nhất"/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/Flappy_Bird_icon.png" type="image/x-icon"/>
<link rel="stylesheet" href="/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=emboss"/>	
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/css/game.css" media="screen"/> 
<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="/js/game.js"></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="/js/login.js"></script> 
<script type="text/javascript"  src="/js/validate.js" ></script>
<script type="text/javascript"  src="/js/social/facebook.js" ></script>	   
<script type="text/javascript"  src="/js/header.js"></script>  
<script type="text/javascript"  src="http://myweb.pro.vn/js/advertisement.js"></script>
<script type="text/javascript"  src="/js/swfobject.js"></script>
<script type="text/javascript" src="http://myweb.pro.vn/js/advertisement.js"></script>
</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse">
<div class="container-fluid">
<div class="language">
<a title="Mạng xã hội học tập giải trí" href="/game/" class="brand animated fadeInDown"> 
<!--<img class="header_logo" src="/images/hat-512.png" /> -->
<i class="fa fa-home fa-2x"></i>
</a>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/book/cse/">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:2556923084">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" placeholder="Enter để tìm game...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
</form> 

<ul style="margin-left:300px;position:absolute" class="nav pull-right">

<!--start categorize -->
<li class="dropdown" id="3d_unity_li" style="width:165px">
<a style="margin-left:25%" class="item_link" href="/game?id_category=21" id="3d_unity">
		<i class="fa fa-gamepad fa-2x"></i> 3D Unity
</a>
</li>
<!--end categorize-->

<!--start country -->
<li class="dropdown" id="learn_english_li" style="width:165px">
<a class="item_link" href="/game?id_category=3"><i class="fa fa-gamepad fa-2x"></i> Chiến thuật</a>
</li>
<!--end country -->

<!--start film collection -->
<li class="dropdown" style="width:111px">
<a style="margin-left:-30%" class="item_link" href="/game?id_category=5" ><i class="fa fa-gamepad fa-2x"></i> Hành động</a>
</li>
<!--end film collection -->

<!--start film hall-->
<li class="dropdown" style="width:120px"> 
<a role="button" class="item_link" href="/game?id_category=18&type=webgame" ><i class="fa fa-gamepad fa-2x"></i> Trí tuệ</a>
</li>
<!--end film hall-->

<!--start film hall-->
<li class="dropdown"> 
<a role="button" class="item_link" href="/game?id_category=17" ><i class="fa fa-gamepad fa-2x"></i> Văn phòng</a>
</li>
<!--end film hall-->


<?php if($user_data == "-1"):?>	

<?php endif;?>
<?php if($user_data != "-1"):?>
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
<li class="dropdown" id="user_account">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
<ul class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="dLabel">
<li class="dropdown-divider"></li>                    
<li>
<a href="/user/account?tab=profile"> <i class="fa fa-user fa-2x"></i> Tài khoản</a>	
</li>

<li>
<a href="/user/account?tab=mylib"> <i class="fa fa-book fa-fw fa-2x"></i> Thư viện của tôi</a>	
</li>
<li>
<a href="/user/account?tab=mygame"> <i class="fa fa-gamepad fa-2x"></i> Game của tôi</a>	
</li>
<li>
<a href="/user/account?tab=myvid"> <i class="fa fa-film fa-2x"></i> Phim của tôi</a>	
</li>
<li>
<a href="/user/logout/"><i class="fa fa-sign-out fa-2x"></i> Thoát</a>		
</li>
<li class="dropdown-divider"></li>                    
</ul>
</a>
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
<iframe src="/user/register?lang=vn" ></iframe> 
</div>       
</div>
<!-- end register -->	

<div class="modal hide fade" id="login_process" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="/public/images/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang đăng nhập vào hệ thống...</span>
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
<button data-redirect="" id="btn_login" type="button" class="btn btn-primary">Đăng nhập</button>
</div>
</div>
</div>
</form>
<!-- end login -->

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>
<input type='hidden' id='id_category' name='id_category' value='<?=$id_category?>'/>
</body>
</html>