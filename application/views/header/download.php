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

<link rel="alternate" hreflang="en" href="" />
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icon/down.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=3d-float"/>	
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/jquery-ui.css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/header/download.css">
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
<div class="adv_ants_header">
	<!--- Script ANTS - 980x90 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324908" data-ants-zone-id="517324908"></div>
	<!--- end ANTS Script -->
</div>

<div class="adv_micro_left">
	<!--- Script ANTS - 120x600 -->
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324793.js"></script>
	<!--- end ANTS Script -->
</div>

<div class="ads_ants_right">
	<!--- Script ANTS - 300x250 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="530580154" data-ants-zone-id="530580154"></div>
	<!--- end ANTS Script -->
</div>

<header id="default_header" style="display:none" class="navbar navbar-fixed-top">
<div  id="mega_main_menu" class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">
<a title="" href="http://myweb.pro.vn/download/index/" class="brand animated fadeInDown"> 
<i style="color:rgb(63, 228, 45);margin-top:-17px" class="fa fa-home fa-2x"></i>
<i style="color:rgb(63, 228, 45)" class="fa fa-search fa-2x"></i>
</a>
</div>
<script>
  (function() {
    var cx = '017261593032333106217:y_ix0mw_peo';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//www.google.com/cse/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>

<ul id="mega_main_menu_ul" class="nav pull-right mega_main_menu_ul">
<li class="header_text_logo"><span style="color: #DBCFCF;" class="font-effect-3d-float"></span></li>

<li id="header_video" class="dropdown" style="width:auto">			
	<a class="item_link" title="Danh mục Ebook" data-toggle="modal" href="#">

	</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="Danh mục Ebook" data-toggle="modal" href="#">

	</a>
</li>

<?php if($user_data == "-1"):?>	
			
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
<ul class="dropdown-menu" style="margin-left:-165%;margin-top:40%;" role="menu" aria-labelledby="dLabel">
   <li class="dropdown-divider"></li>                    
   <li>
		<a href="http://xahoihoctap.net.vn/user/account?tab=profile"><i class="fa fa-user fa-2x"></i> Tài khoản</a>	
   </li>
   <li>
		<a href="http://xahoihoctap.net.vn/user/account?tab=mylib"><i class="fa fa-book fa-fw fa-2x"></i>Thư viện của tôi</a>	
   </li>
   <li>
		<a href="http://xahoihoctap.net.vn/user/account?tab=mygame"><i class="fa fa-gamepad fa-2x"></i>Game của tôi</a>	
   </li>
   <li>
		<a href="http://xahoihoctap.net.vn/user/account?tab=myvid"><i class="fa fa-film fa-2x"></i> Phim của tôi</a>	
   </li>
   <li>
		<a href="http://xahoihoctap.net.vn/user/logout/"><i class="fa fa-sign-out fa-2x"></i> Thoát</a>		
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

<div class="b_ads" style="display:none">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16563.ads"></script>
</div>

<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>

<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script src="http://xahoihoctap.net.vn/js/jquery-ui.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/game.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/download.js"></script>
</body>
</html>