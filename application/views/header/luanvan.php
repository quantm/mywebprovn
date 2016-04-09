<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html style="background:none!important">
<head>
<? include_once 'include/analyticstracking.php';?>
<title id="mywebprovn_title"><?=$title?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content="Thư viện luận văn & tài liệu tham khảo"/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name='robots' content='index,follow'>

<link rel="publisher" href="https://plus.google.com/+MywebProVnsocial">
<!--<link rel="alternate" hreflang="en" href="http://en.www.myweb.pro.vn" />-->
<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/graduate_hat.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://raovatnhanh.net.co/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=3d-float"/>	
<link rel="stylesheet" type="text/css" href="http://raovatnhanh.net.co/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://raovatnhanh.net.co/css/book.css" media="screen"/> 
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire|emboss"/> 
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/header/luanvan.css"  media="screen">
<link href="https://plus.google.com/100585555255542998765" rel="publisher">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
<link href="https://www.google.com/intl/en/chrome/assets/common/css/chrome.min.css" rel="stylesheet">
<link rel="stylesheet" href="http://raovatnhanh.net.co/css/google/voice_search.css"/>

<script type="text/javascript" async="" src="https://ssl.google-analytics.com/ga.js"></script>
<script src="//www.google.com/js/gweb/analytics/autotrack.js"></script>
<style type="text/css">
	.fa-graduation-cap {
		color: rgb(80, 69, 84) !important;
	}
	.navbar-inner {
		background-image: linear-gradient(to bottom, #3B9893, #3B9893) !important;
	}
	@font-face {
		font-family: 'FontAwesome';
		src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
		src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	#mega_main_menu {
		border-radius: 6px 6px 6px 6px;
		--margin-right:90px;
	}
	#mega_main_menu_ul .dropdown {
		background:transparent!important;
		margin-top: 2px;
	}
	#modal_login a {cursor:pointer;}
</style>

</head>
<img src="http://xahoihoctap.net.vn/images/fb/child_read_the_whole_world.jpg" style="display:none">
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div id="mega_main_menu" class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">
<div class="language">

<?php if($user_data == "-1"):?>	
<a title="Thư viện luận văn" href="http://myweb.pro.vn/luanvan/index/" id="user_logo_header" class="brand animated fadeInDown"> 
	<i style="color:rgb(158, 93, 181);margin-top:-17px" class="fa fa-graduation-cap fa-2x"></i>
</a>
<?php endif;?>

<?php if($user_data != "-1"):?>
<ul class="user_logged_in" style="margin-top: -12%;margin-left:-15%;">
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
<li class="dropdown"  id="user_account" style="background:none">	
<a id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="#">						   
<?php foreach ($user_data as $key):?>						   
<span id="header_username" style="color:white"><?=$key['NAME']?></span>
<span class="label label-important">1</span>
<?php endforeach;?>
</a>
<ul class="dropdown-menu" style="margin-top:15%;"  role="menu" aria-labelledby="dLabel">
   <li class="dropdown-divider"></li>                    
   <li>
		<a href="/user/account?tab=profile"> <i class="fa fa-user"></i> Tài khoản</a>	
   </li>
   <li>
		<a href="/book/mybook"> <i class="fa fa-book fa-fw"></i> Tủ sách của tôi</a>	
		<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=4"> <i class="fa fa-book fa-fw"></i> Tủ truyện của tôi</a>	
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

<span class='header_voice_search fa fa-microphone' style="margin-left:40px;color:black" title='Tìm kiếm bằng giọng nói'></span>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:3476546681">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" required placeholder="Enter để tìm trong số <?=$count ?> luận văn, đề tài...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
</form>  

<ul id="mega_main_menu_ul" class="nav pull-right sky-mega-menu sky-mega-menu-anim-flip sky-mega-menu-response-to-icons">

<li id="header_ebook" class="dropdown" style="width:auto">			
<a class="item_link" title="Luật" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=20">
	Kỹ năng mềm
</a>
</li>

<li id="header_video" class="dropdown" style="width:auto">			
	<a class="item_link" title="Khoa học tự nhiên" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=31">
	Tự nhiên
	</a>
	<div class="grid-container3">
	<ul>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=37">Toán học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=53">Vật lý</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=35">Hóa học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=36">Sinh học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=33">Địa chất</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=34">Hải dương học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=54">Khí tượng thủy văn</a></li>
	</ul>
	</div>
</li>

<li class="dropdown" >
	<a class="item_link" title="Giáo dục đại cương" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=19">
	Đại cương
	</a>
	<div class="grid-container3">
	<ul>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=38">CNXH khoa học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=39">Kinh tế chính trị</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=49">Tư tưởng HCM</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=50">Triết học Mác - Lênin</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=51">Pháp luật đại cương</a></li>
	</ul>
	</div>
</li>

<li class="dropdown" >
<a class="item_link" title="cao học" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=38">
	Cao học
</a>
</li>

<li class="dropdown" >
<a class="item_link" title="Ngoại ngữ" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=10">
	Ngoại ngữ
</a>
</li>

<li id="header_video" class="dropdown" style="width:auto">			
<a class="item_link" title="Công nghệ môi trường" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=36">
	Môi trường
</a>

</li>
<li id="header_video" class="dropdown" style="width:auto">			
<a class="item_link" title="Y - Dược" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=22">
	Y - Dược
</a>
</li>

<li  class="dropdown">
	<a class="item_link" title="Công nghệ thông tin" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=9">
	CNTT
	</a>
	<div class="grid-container3">
	<ul>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=1">Phần cứng</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=2">Hệ điều hành</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=3">Quản trị mạng</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=5">Cơ sở dữ liệu</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=9">Thiết kế đồ họa</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=6">Tin học văn phòng</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=8">Bảo mật</a></li>
		<li><a href="http://myweb.pro.vn/html" target="_blank">Lập trình web</a></li>
	</ul>
	</div>
</li>

<li id="header_video" class="dropdown" style="width:auto">			
<a class="item_link" title="Kiến trúc" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=26">
	Kiến trúc
</a>

<li id="header_video" class="dropdown" style="width:auto">			
<a class="item_link" title="Cơ khí " data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=39">
	Cơ khí
</a>

</li>
<li id="header_video" class="dropdown" style="width:auto">			
<a class="item_link" title="Điện tử - Viễn thông " data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=13">
	Điện tử 
</a>
</li>

<li class="dropdown">
<a class="item_link" title="Ngân hàng" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=21">
	Kỹ thuật 
</a>
</li>

<li class="dropdown">
<a class="item_link" title="Ngân hàng" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=35">
	Ngân hàng
</a>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
	<a class="item_link" title="Kinh tế" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=6">
		Kinh tế
	</a>
	<div class="grid-container3">
	<ul>
		<li><a href="http://www.myweb.pro.vn/luanvan/index?id_category=27">QTDK</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan/index?id_category=24">Kế toán</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=40">Chứng khoán</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=41">Tài chính thuế</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=42">Xuất nhập khẩu</a></li>
	</ul>
	</div>
</li>

<li id="header_ebook" class="dropdown" style="width:auto">			
<a class="item_link" title="Luật" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=11">
	Luật
</a>
</li>

<li id="header_video" class="dropdown" style="width:auto">			
	<a class="item_link" title="Khoa học xã hội" data-toggle="modal" href="http://www.myweb.pro.vn/luanvan/index?id_category=18">
		Xã hội
	</a>
	<div class="grid-container3">
	<ul>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=43">Báo chí</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=44">Dân tộc học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=45">Đông phương học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=46">Ngôn ngữ học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=47">Tâm lý học</a></li>
		<li><a href="http://www.myweb.pro.vn/luanvan?id_sub_category=48">Văn hóa học</a></li>
	</ul>
	</div>
</li>

</ul> 
</div>                
</div>
</header>

	
<div class="modal hide fade" id="login_process" style="margin-top:5%">
<img alt="Ajax Loading" src="http://raovatnhanh.net.co/images/ajax_load_green.gif"/>
<span style="margin-left:5px">Đang đăng nhập vào hệ thống...</span>
</div>

<div class="modal hide fade" id="user_category">
	<div class="modal-header">Nhập danh mục cho <span style="color:red">'<?=$title?>'</span>
		<p style="float:right;color:red;cursor:pointer;font-size:20px;" data-dismiss="modal">×</p>
	</div>
	<i class="fa fa-tags fa-2x" style="margin-left:15px"></i>
	<input class="form-control" type='text' id='user_custom_category' name='user_custom_category' placeholder="Nhập một danh mục">
	<span title="Click để thêm mới danh mục" class="btn btn-primary btn-add-to-my-bookcase" style="cursor: pointer !important">Thêm mới</span>
	<span title="Click để xem tủ sách của bạn" class="btn btn-success btn-go-to-my-bookcase" style="cursor: pointer !important">Xem tủ sách của bạn</span>
</div>

<!-- user login-->
<form id="frmlogin" method="post" name="frmlogin">
<div class="modal hide fade" id="modal_login">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h4>Đăng nhập</h4>
<div class="clr"></div>
<span class="alert_register">Nếu bạn chưa có tài khoản thì  <a data-dismiss="modal"onclick="$('.btn').hide();$('#modal_register').modal('show')"> đăng ký tại đây</a></span>
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
<button id="btn_login" type="button" class="btn btn-primary">Đăng nhập</button>
</div>
</div>
</div>
</form>
<!--- end user login-->


<!-- register -->
<div class="modal hide fade" id="modal_register">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
</div>
<div class="modal-body">
<iframe src="/user/thesis_reader_register" ></iframe> 
</div>       
</div>
<!-- end register -->	

<div class="modal hide fade" id="google_voice_search">
    <div class="browser-landing" id="main">
      <div class="compact marquee">
        <div id="info" style="visibility: visible;">
          <p id="info_start" style="display: inline;">
			Click vào biểu tượng microphone và cho phép hệ thống sử dụng micro của bạn (Click vào nút 'Allow' hoặc 'Cho phép') để tìm kiếm
          </p>
          <p id="info_speak_now" style="display: none;">
			Nói để tìm kiếm... <button class="btn btn-inverse btn-search-in-voice-mode" style="display:block!important;position:fixed;margin-top:-35px;margin-left:60%">Tìm kiếm</button>
          </p>
          <p id="info_no_speech" style="display: none;">
            No speech was detected. You may need to adjust your <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">microphone
            settings</a>.
          </p>
          <p id="info_no_microphone" style="display: none;">
            No microphone was found. Ensure that a microphone is installed and that
            <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
            microphone settings</a> are configured correctly.
          </p>
          <p id="info_allow" style="display: none;">
            Click the "Allow" button above to enable your microphone.
          </p>
          <p id="info_denied" style="display: none;">
            Permission to use microphone was denied.
          </p>
          <p id="info_blocked" style="display: none;">
            Permission to use microphone is blocked. To change, go to
            chrome://settings/contentExceptions#media-stream
          </p>
          <p id="info_upgrade" style="display: none;">
            Web Speech API is not supported by this browser. Upgrade to <a href="//www.google.com/chrome">Chrome</a> version 25 or later.
          </p>
        </div>
        <div id="div_start">
          <button id="start_button" onclick="startButton(event)">
			  <img alt="Start" id="start_img" src="https://www.google.com/intl/en/chrome/assets/common/images/content/mic.gif">
		  </button>
        </div>
        <div id="results">
          <span class="final" id="final_span"></span> <span class="interim" id="interim_span"></span>
        </div>
        <div class="compact marquee" id="div_language">
		  <span>Tùy chọn ngôn ngữ</span>
			<select id="select_language" onchange="updateCountry()">
			</select>
			<select id="select_dialect" style="visibility: hidden;">
            <option value="vi-VN"></option>
			</select>
        </div>
      </div>
    </div>
	<div class="ants_ads_bottom_voice_search" style="margin-left: 50px;">
			<!--- Script ANTS - 980x90 --> 
			<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
			<div class="517324908" data-ants-zone-id="517324908"></div>
			<!--- end ANTS Script -->
	</div>
	<script src="https://www.google.com//intl/en/chrome/assets/common/js/chrome.min.js"></script> 
	<script type="text/javascript"  src="http://raovatnhanh.net.co/js/google/voice_search.js"></script>
</div>

<div id="search_pending" style="display:none;position:fixed;margin-left:40%;margin-top:4%">
		<img src="http://xahoihoctap.net.vn/images/ajax-loader.gif">
</div>

</body>

<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery-2.1.0.min.js"></script>
<link rel="stylesheet" href="http://raovatnhanh.net.co/css/jquery-ui.css">
<script src="http://raovatnhanh.net.co/js/jquery-ui.js"></script>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery.plugin.js" charset="utf-8"></script>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/jquery.countdown.js" charset="utf-8"></script>
<script type="text/javascript"  src="/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/thesis/validate.js" ></script>	  
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/thesis/login.js" ></script>	  
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/thesis/facebook.js" ></script>	  
<script type="text/javascript"  src="http://raovatnhanh.net.co/js/thesis_autocomplete_search.js" ></script>	
<input type='hidden' id="hidden_countdown"/>
<input type="hidden" id="is_logged" value="<?=$is_logged?>"/>
<input type="hidden" id="fb_connected"/>
</html>


