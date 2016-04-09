<html>
  <head>
    <title>Video.js Test</title>
    <link href="//vjs.zencdn.net/4.7/video-js.css" rel="stylesheet">
    <link rel="stylesheet" href="../../src/videojs.ads.css" />
    <link rel="stylesheet" href="../../src/videojs.ima.css" />
    <link rel="stylesheet" href="../style.css" />
	<link href="/css/dropdown.css" rel="stylesheet" type="text/css">
  </head>

  <body>
  <header id="default_header" class="navbar navbar-fixed-top">
<div id="mega_main_menu" class="custom_header navbar-inner navbar-green side_menu primary_style-flat icons-left first-lvl-align-left first-lvl-separator-none direction-horizontal fullwidth-enable mobile_minimized-enable dropdowns_animation-anim_5 no-buddypress responsive-enable mega_main_menu">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">
<a title="Mạng xã hội học tập giải trí" href="http://myweb.pro.vn/video/index/" class="brand animated fadeInDown"> 
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
<ul id="mega_main_menu_ul" style="margin-left: 375px;position: absolute;margin-top: -20px;" class="nav pull-right mega_main_menu_ul">

<!--start categorize -->
<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width" id="learn_english_li" style="width:165px">
<a style="margin-left:25%" class="item_link" id="learn-english"><i class="fa fa-film fa-2x"></i> Thể loại</a>
<ul style="width:480px;margin-left:-125%" class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="learn-english">
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

</li>
<!--end categorize-->

<!--start country -->
<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width" id="learn_english_li" style="width:165px">
<a class="item_link" id="learn-english"><i class="fa fa-film fa-2x"></i> Quốc gia</a>
<ul style="width:350px;margin-left:-75%" class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="learn-english">
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

</li>
<!--end country -->

<!--start film collection -->
<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width" id="learn_english_li" style="width:111px">
<a style="margin-left:-30%" class="item_link" id="learn-english"><i class="fa fa-film fa-2x"></i> Phim bộ</a>
<ul style="width:150px;margin-left:5%" class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="learn-english">
<li style="width:150px">
<a role="button" class="item_link"></a>
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2014"><i class="fa fa-film fa-2x"> </i> Phim bộ 2014</a>               
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2013"><i class="fa fa-film fa-2x"> </i> Phim bộ 2013</a>
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-bo/?year=2012"><i class="fa fa-film fa-2x"> </i> Phim bộ 2012</a>
</li>
</ul>    

</li>
<!--end film collection -->

<!--start film hall-->
<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width" style="width:200px"> 
<a role="button" class="item_link"><i class="fa fa-film fa-2x"></i> Phim chiếu rạp</a>
<ul class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="giai_tri">
<li>
<a role="button" class="item_link"></a>
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2012"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2012</a>
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2013"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2013</a>
<a class="a_cate_news" href="/video/?type=main_body&link=danh-sach/phim-chieu-rap/?year=2014"><i class="fa fa-film fa-2x"> </i> Phim chiếu rạp 2014</a>
</li>
</ul>

</li>
<!--end film hall-->

<?php if($user_data == "-1"):?>	
<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width" "="" style="width:145px">						
<a class="item_link" data-toggle="modal" href="#modal_login" id="show_login">
<i class="fa fa-sign-in fa-2x"></i> Đăng nhập
</a>
</li>

<li class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width">
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
<li  class="dropdown menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children default_dropdown default_style drop_to_right submenu_default_width"  id="user_account">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
<ul class="mega_dropdown dropdown-menu" role="menu" aria-labelledby="dLabel">
<li class="dropdown-divider"></li>                    
<li>
<a href="/user/account?tab=profile"> <i class="fa fa-user fa-2x"></i>  Tài khoản</a>	
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
<a href="/user/logout/"><i class="fa fa-sign-out fa-2x"></i>  Thoát</a>		
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

    <video src="http://rmcdn.2mdn.net/Demo/vast_inspector/android.mp4" autoplay id="content_video" class="video-js vjs-default-skin"
        poster = "../posters/android.png" controls preload="auto" width="640"
        height="360">
    </video>

    <script src="//vjs.zencdn.net/4.7/video.js"></script>
    <script src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script src="../../src/videojs.ads.js"></script>
    <script src="../../src/videojs.ima.js"></script>
    <script src="ads.js"></script>
  </body>
</html>
