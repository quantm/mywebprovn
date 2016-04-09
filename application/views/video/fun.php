<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?=$name?></title>
<!-- start meta -->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta property="og:title" content="<?=$name?>" />
<meta property="og:image" content="<?=$thumbs?>" />
<meta property="og:url" content="http://myweb.pro.vn/video/fun?id=<?=$id?>" />
<meta property="og:type" content="video" />
<meta property="og:description" content="" />
<meta name="keywords" content="Xem phim online"/>
<meta name="description" content="Xem phim online"/>
<meta property="og:autho r" content="100004257586816"/>
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<!-- end meta  -->

<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"/>
<link href="/css/dropdown.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire"/>	
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
<link href="/css/film.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire-animation"/>		
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=neon"/>	
<link rel="canonical" href="http://myweb.pro.vn/video/fun?id=<?=$id?>" />

<script type="text/javascript"  src="/js/jquery-2.1.0.min.js"></script>
<script src="/js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/js/film.js" ></script>
<script type="text/javascript"  src="/js/bootstrap.js"></script>
<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="/js/login.js"></script> 
<script type="text/javascript"  src="/js/validate.js" ></script>
<script type="text/javascript"  src="/js/social/facebook.js" ></script>	 

<script type="text/javascript" >
$(document).ready(function(){
	$('#modal_film_intro').modal('show')
})
</script>

<style>
#modal_film_intro {
  margin-top: -8%!important;
  margin-left: -38%!important;
}
#info-film a {
display:none;
}
.col1{
width: 300px;
text-align: justify;
}
.info div {
text-align: justify;
}
body {
background: url("/images/background/phim.jpg");
background-color: black;
overflow:hidden!important;
}
#___plusone_0 {
margin-left: 115px !important;
margin-top: -20px !important;
}
.font-effect-neon {
  z-index: 1000;
  margin-top: 4%;
  font-size: 16px;
  float: left;
  margin-left: 20%;
}
.dinfo .col2 {
margin-left:10%;
text-align: justify;
}
#page-info p, .dinfo{
display: inline-flex;
}
.like-stats,.blocktitle {
display:none;
}
#mega_main_menu_ul {
	margin-left: 345px;
	position: absolute;
	margin-top: -20px;
}
.ads_micro_footer {
position:absolute;
margin-left: 6%;
display:none;
}

.eclick_left { 
	position: absolute;
	margin-left: 88.4%;
	margin-top: 28px;
}
.eclick_right { 
	position: absolute;
	margin-left: 0.5%;
	margin-top: 28px;
}
#video-wrapper {
  margin-left: 20%;
  margin-top: 7%;
  position:absolute;
}
.adv_bottom {
  position: fixed;
  margin-top: 435px;
  z-index: 9999996;
  margin-left: 20%;
  width: 809px;
  background-color: white;
  display:none;
}
.adv_bottom * {
  border:none!important;
  background-color:white!important;
  color:black!important;
}
.adv_midle {
	display:none;
}
</style>

</head>

<body>
<div class='modal hide fade' id="adv_temp"></div>

<!-- start adv right -->
<div class="eclick_right">
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2569.js"></script>
</div>
<!-- end adv right -->

<!-- start adv left -->
<div class="eclick_left">
<script type="text/javascript" src="http://e.eclick.vn/delivery/zone/2568.js"></script>
</div>
<!-- end adv right -->

<div data-advertisement="0" class="adv_bottom">
<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16556.ads"></script>
</div>

<span class="font-effect-neon video_title"><?=$name?></span>
<?=$content?>


<!-- start social like -->
<div style="display:none!important" class="social_like">

<div class="fb-share-button" data-layout="button_count" data-width="200px" data-height="100px"   data-href="http://myweb.pro.vn/video/fun?id=<?=$id?>"></div>
<div class="clr"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>

<div class="clr"></div>

<!-- start twitter shared-->
<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<!-- end twitter shared-->

</div>
<!-- end social like -->

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


<!-- start modal add_to_my_lib -->
<div class="modal hide fade" style="margin-left:-15%" id="modal_add_to_my_lib">
<button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
</div>
<!-- end modal add_to_my_lib -->

<!-- login modal -->
<form id="frmlogin" method="post" name="frmlogin">
<div class="modal hide fade" style="margin-left:-15%" id="modal_login">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4>Đăng nhập</h4>
<div class="clr"></div>
<span class="alert_register">Nếu chưa có tài khoản vui lòng đăng ký tại đây <a href="#" >đăng ký tại đây</a></span>
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
<!-- end login modal -->

<!-- start -->
<div class="modal hide fade" id="modal_film_intro">
<div class="modal-header">
	<div style="cursor:pointer;font-size:15px;margin-left:15px;" class="intro_close_adv">Đóng quảng cáo</div>
</div>

<div class="modal-body">
	<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_16619.ads"></script>
</div>

</div>
<!--//-->

<header id="default_header" class="navbar navbar-fixed-top">
<div id="mega_main_menu" class="custom_header navbar-inner navbar-green ">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">
<a title="Xem phim HD Online" href="http://myweb.pro.vn/video/index/" class="brand animated fadeInDown"> 
<!--<img class="header_logo" src="/images/hat-512.png" /> -->
<i style="color:yellow" class="fa fa-home fa-2x"></i>
</a>
</div>

<form id="game_header_search" class="pull-left navbar-form" action="" method="post">  
<textarea required class="tagged_text_ex2" placeholder="Nhập tên phim..." title="" name="search" id="search"></textarea>    
<i class="fa fa-search fa-2x" data-original-title="" title=""></i>                    
<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
</form>   

<form name="toefl_overview" method="post" id="toefl_overview" action="/video/">
</form>

<input type="hidden" name="is_logged" id="is_logged" value="<?=$is_logged?>"/>  
<input type="hidden" name="video_id" id="video_id" value="<?=$id?>"/>  

 <ul id="mega_main_menu_ul"  class="nav pull-right">

<!--start categorize -->
<li class="dropdown " id="film_type_li" style="width:165px">
<a role="button" data-toggle="dropdown"  href="#" id="film_type"><i class="fa fa-film fa-2x"></i> Thể loại

<ul style="width:480px;left:-245px!important;top:45px" class="dropdown-menu" role="menu" aria-labelledby="film_type">
<li style="width:150px">
<a role="button" class="item_link"></a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-hanh-dong/">Hành động</a>               
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-vo-thuat/">Võ thuật</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-tam-ly/">Tâm lý</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-hai-huoc/">Hài hước</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-hoat-hinh/">Hoạt hình</a>
</li>
<li style="width:150px;margin-top:-142.9px;margin-left:150px;display:block;position:absolute">
<a role="button" class="item_link"></a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-phieu-luu/">Phiêu lưu</a>             
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-kinh-di/">Kinh dị</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-than-thoai/">Thần thoại</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-chien-tranh/">Chiến tranh</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-hinh-su/">Hình sự</a>
</li>
<li style="width:150px;margin-top:-142.5px;margin-left:300px;display:block;position:absolute">
<a role="button" class="item_link"></a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-vien-tuong/">Viễn tưởng</a>             
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-co-trang/">Cổ trang</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-khoa-hoc-tai-lieu/">Khoa học</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-am-nhac/">Âm nhạc</a>
<a class="a_cate_news" href="/video/?type=main_body&link=the-loai/phim-tv-show/">TV Show</a>
</li>
</ul>    
</a>
</li>
<!--end categorize-->

<!--start country -->
<li class="dropdown " id="film_country_li" style="width:165px">
<a  role="button" data-toggle="dropdown" href="#" id="film_country"><i class="fa fa-film fa-2x"></i> Quốc gia
	<ul style="width:350px;left:-170px!important;top:45px" class=" dropdown-menu" role="menu" aria-labelledby="film_country">
	<li style="width:150px">
	<a role="button" class="item_link"></a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-my/">Phim Mỹ</a>               
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-hong-kong/">Phim Hồng Kông</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-han-quoc/">Phim Hàn Quốc</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-trung-quoc/">Phim Trung Quốc</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-viet-nam/">Phim Việt Nam</a>
	</li>
	<li style="width:150px;margin-top:-142.9px;margin-left:150px;display:block;position:absolute">
	<a role="button" class="item_link"></a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-phap/">Phim Pháp</a>             
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-anh/">Phim Anh</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-thai-lan/">Phim Thái Lan</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-nhat-ban/">Phim Nhật Bản</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=quoc-gia/phim-an-do/">Phim Ấn Độ</a>
	</li>
	</ul>    
</a>
</li>
<!--end country -->

<!--start film collection -->
<li class="dropdown " id="phim_bo_li" style="width:111px">
<a style="margin-left:-30%" class="item_link" href="#"  data-toggle="dropdown" id="phim_bo"><i class="fa fa-film fa-2x"></i> Phim bộ
	<ul style="left:-10%;top:45px;width:150px;" class="dropdown-menu" role="menu" aria-labelledby="phim_bo">
	<li style="width:150px">
	<a role="button" class="item_link"></a>
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2014"><i class="fa fa-film fa-2x"> </i> Phim bộ 2014</a>               
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2013"><i class="fa fa-film fa-2x"> </i> Phim bộ 2013</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2012"><i class="fa fa-film fa-2x"> </i> Phim bộ 2012</a>
	</li>
	</ul>    
</a>
</li>
<!--end film collection -->

<!--start film hall-->
<li class="dropdown " style="width:200px"> 
<a role="button" data-toggle="dropdown" class="item_link" id="giai_tri"><i class="fa fa-film fa-2x"></i> Phim chiếu rạp
	<ul class=" dropdown-menu" role="menu" aria-labelledby="giai_tri">
	<li>
	<a role="button" class="item_link"></a>
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2012"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2012</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2013"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2013</a>
	<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2014"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2014</a>
	</li>
	</ul>
</a>
</li>
<!--end film hall-->


<?php if($user_data == "-1"):?>	
<li class="dropdown " "="" style="width:145px">						
<a class="item_link" data-toggle="modal" href="#modal_login" id="show_login">
<i class="fa fa-sign-in fa-2x"></i> Đăng nhập
</a>
</li>

<li class="dropdown ">
<a class="item_link" href="#modal_register" data-toggle="modal">
<i class="fa fa-check-square-o fa-2x"></i> Đăng ký
</a>
</li>						
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
<li class="dropdown " id="user_account">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
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
</div>
</header>

<!-- start header search-->
<div style="display:none" class="film_header_search">
<style type="text/css">
@import url(//www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:transparent;color:#000000">
<div class="cse-branding-form">
<form action="http://myweb.pro.vn/video/" id="cse-search-box">
<div>
<input type="hidden" name="cx" value="partner-pub-1996742103012878:7826021080" />
<input type="hidden" name="ie" value="UTF-8" />
<input type="hidden" name="cof" value="FORID:10" />
<input placeholder="Enter để tìm phim..." type="text" style="margin-left: 30px;height:30px;width:375px" id="query-cse-search-box" name="q" size="55" />
</div>
</form>
</div>
<div class="cse-branding-logo">
<img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
</div>
</div>
</div>
</div>
<!--end header search-->

<!---render search result-->
<div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 900;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
<script type="text/javascript" src="http://www.google.com/cse/query_renderer.js"></script>
<div id="queries"></div>
<script src="http://www.google.com/cse/api/partner-pub-1996742103012878/cse/4800332684/queries/js?oe=UTF-8&amp;callback=(new+PopularQueryRenderer(document.getElementById(%22queries%22))).render"></script>
<!--//-->
</body>
</html>


