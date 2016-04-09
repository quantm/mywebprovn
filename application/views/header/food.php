<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title><?= $title ?></title>
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="Author" content="Tran Minh Quan"/>
<meta name="keywords" content="myweb.pro.vn"/>
<meta name="description" content="Hướng dẫn nấu ăn | Nghệ thuật ẩm thực"/>
<!--<meta property="og:author" content="100004257586816"/>-->
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<meta name='robots' content='index,follow'>

<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=emboss"/>	
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/game.css" media="screen"/> 
<style type="text/css">
@font-face {
font-family: 'FontAwesome';
src: url('http://myweb.pro.vn/fonts/fontawesome-webfont.eot?v=4.0.3');
src: url('http://myweb.pro.vn/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('http://myweb.pro.vn/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('http://myweb.pro.vn/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('http://myweb.pro.vn/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
font-weight: normal;
font-style: normal;
}
</style>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<!--<script type="text/javascript"  src="/js/social/google.js" ></script>-->
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/AjaxEngine.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/login.js"></script> 
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/validate.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/social/facebook.js" ></script>	   
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/header.js"></script>  
<script type="text/javascript">
$(document).ready(function(){
	$('.dropdown').hover(function() {
			 $(this).toggleClass('open');
	});
})
</script>
</head>
<body>
<header id="default_header" class="navbar navbar-fixed-top">
<div class="navbar-inner navbar-green">
<div class="nav-collapse account-collapse">
<div class="container-fluid">
<div class="language">
<a title="" href="http://myweb.pro.vn/nau-ngon?id_cat=1" class="brand animated fadeInDown"> 
<!--<img class="header_logo" src="/images/hat-512.png" /> -->
</a>
</div>

<form id="cse-search-box" class="pull-left navbar-form" action="http://myweb.pro.vn/amthuc/cse/">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1996742103012878:7143619488">
    <input type="hidden" name="cof" value="FORID:10">
    <input type="hidden" name="ie" value="UTF-8">
    <input type="text" class="cse_box" name="q" size="115" placeholder="Enter để tìm...">
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
  </div>
</form> 

<ul style="margin-left:375px;position:absolute" class="nav pull-right">
<li class="dropdown">
<a class="lesson_plan" title="Công thức nấu ăn - Nghệ thuật ẩm thực" href="http://myweb.pro.vn/amthuc/danhmuc/mon-kho">Công thức nấu ăn</a>
	<ul class="dropdown-menu" style="width:245px" role="menu">
		<div>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-kho">Món kho</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-xao">Món xào</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-canh">Món canh</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-hap">Món luộc/hấp</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-chien">Món chiên</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-nuong">Món nướng</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-chay">Món chay</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-lau">Món lẩu</a></li>
		</div>
		<div style="margin-left:90px;margin-top:-210px;">
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-tron-goi">Món trộn/gỏi</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-nhau">Món nhậu</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-trang-mieng">Món tráng miệng</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-an-cua-be">Món ăn cho mẹ và bé</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/mon-ngon-cuoi-tuan">Món ngon cuối tuần</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/lam-banh-ngon">Làm bánh ngon</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/am-thuc-cac-nuoc">Ẩm thực các nước</a></li>
			<li><a href="http://myweb.pro.vn/amthuc/danhmuc/meo-nau-an">Mẹo nấu ăn</a></li>
		</div>
	</ul>
</li>

<li class="dropdown">
<a class="lesson_plan" title="Công thức nấu ăn - Nghệ thuật ẩm thực" href="http://myweb.pro.vn/amthuc/danhmuc/mon-kho">Danh mục món ăn</a>
	<ul class="dropdown-menu" style="width:520px" role="menu">
		<div>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=1">Ăn chơi</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=15">Bánh trái</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=18">Chè mứt kẹo</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=13">Gỏi - Salat</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=3">Khai vị</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=65">Bún, phở</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=6">Món chay</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=10">Món cơm</a></li>
		</div>
		<div style="margin-left:90px;margin-top:-210px;">
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=69">Món cuốn</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=67">Món lạ hiếm</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=12">Món lẩu</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=5">Món nhậu</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=9">Món nước</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=68">Món sốt</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=11">Món Súp Cháo</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=86">Món tráng miệng</a></li>
		</div>
		<div style="margin-left:225px;margin-top:-210px;">
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=64">Món ăn nước ngoài</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=26">Món xào</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=22">Món quay</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=23">Món nướng</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=70">Món muối chua</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=31">Món luộc</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=27">Món kho</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=25">Món hấp</a></li>
		</div>
		<div style="margin-left:360;margin-top:-210px;">
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=71">Món xôi</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=72">Người già và trẻ em</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=14">Nước chấm</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=7">Món phổ thông</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=85">Món ngon theo dịp</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=17">Thức uống - Coctail</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=63">Món ăn Miền Bắc</a></li>
			<li><a href="http://myweb.pro.vn/nau-ngon?id_cat=61">Món ăn Miền Trung</a></li>
		</div>
	</ul>
</li>
<li class="dropdown">
	<a class="lesson_plan" title="Làm sao & Mẹo vặt" href="http://myweb.pro.vn/lam-sao" target="_new">
		Làm sao & Mẹo vặt
	</a>
</li>
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
<iframe src="http://xahoihoctap.net.vn/user/register?lang=vn" ></iframe> 
</div>       
</div>
<!-- end register -->	

<div class="modal hide fade" id="login_process" style="margin-top:5%">
<!--<img src="/images/spinningDisc.gif"/>-->
<img alt="Ajax Loading" src="http://xahoihoctap.net.vn/public/images/ajax_load_green.gif"/>
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