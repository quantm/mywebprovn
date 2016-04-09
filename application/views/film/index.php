<html>
<head>
<? include_once 'include/analyticstracking.php';?>
<title>Tổng hợp Video</title>
<!-- start meta -->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta property="og:title" content="Xem phim online" />
<meta property="og:image" content="http://myweb.pro.vn/images/fb/HD_ONLINE.jpg" />
<meta property="og:type" content="video" />
<meta property="og:description" content="Xem phim online" />
<meta name="Author" content="Tran Dang Khoa"/>
<meta name="keywords" content="Xem phim online"/>
<meta name="description" content="Xem phim online"/>
<meta property="og:author" content="100004257586816"/>
<meta property="fb:app_id" content="1375147869435383" />
<meta property="og:site_name" content="myweb.pro.vn"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="viewport" content="width=device-width, user-scalable=yes"/>-->
<meta name='yandex-verification' content='58ae1921a8e56928' />
<!-- end meta  -->

<link rel="author" href="https://plus.google.com/+TranKing" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/dropdown.css"/>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Rancho&effect=fire"/>	
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link href="http://xahoihoctap.net.vn/css/film.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/jquery-ui.css">

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
 
<div id="film_scroll_loading">
<h3 style="color:red;margin-left: -50px;">Đang tải thêm film...</h3>
<img src="http://www.xahoihoctap.net.vn/images/ajax_loading.GIF">
</div>

<table id="film_wrapper_table">					  			
<?php $condition = empty($content) || !is_array($content) ? 0 : count($content); ?>
<?php if ($condition) {
$loop = -1;
foreach ($content as $key) {                    
$loop++;
	 if(preg_match('/m-viet.com/',$key['referer'])){
		$path=str_replace('http://m-viet.com/','',$key['fetch_link']);
		$path='mvietcom/'.$path;	
	}
	if(preg_match('/chatvlcom/',$key['referer'])){
		$path=str_replace('http://chatvl.com/','',$key['fetch_link']);
		$path='chatvlcom/'.$path;	
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
		$path=str_replace('watch?v=','',$key['fetch_link']);
		$path='muviza'.$path.'/youtube';	
	}
	if(preg_match('/clipvn/',$key['referer'])){
		$path=str_replace('http://clip.vn/','',$key['fetch_link']);
		$path=str_replace('http://phim.clip.vn/','',$path);
		$path='clipvn/'.$path;	
	}
	if(preg_match('/memevn/',$key['referer'])){
		$path=str_replace('http://www.meme.vn/','',$key['fetch_link']);
		$path='memevn/'.$path;	
	}
	if(preg_match('/v.nhaccuatui.com/',$key['referer'])){
		$path=str_replace('http://v.nhaccuatui.com/','',$key['fetch_link']);
		$path='vnhaccuatui/'.$path;	
	}
	if(preg_match('/megabox.vn/',$key['referer'])){
		$path=str_replace('http://phim.megabox.vn/','',$key['fetch_link']);
		$path='megabox/'.$path;	
	}
	if(preg_match('/nguoibanviet.com/',$key['referer'])){
		$path=str_replace('http://nguoibanviet.com/','',$key['fetch_link']);
		$path='nguoibanviet/'.$path;	
	}
	if(preg_match('/tv.zing.vn/',$key['referer'])){
		$path=str_replace('http://tv.zing.vn/','',$key['fetch_link']);
		$path='zingtv/'.$path;	
	}
	if(preg_match('/phimbathu.com/',$key['referer'])){
		$path=str_replace('http://phimbathu.com/','',$key['fetch_link']);
		$path='phimbathu/'.$path;	
	}
	if(preg_match('/vietsubhd.com/',$key['referer'])){
		$path=str_replace('http://www.vietsubhd.com/','',$key['fetch_link']);
		$path='vietsubhd/'.$path;	
	}
	if(preg_match('/direct_link/',$key['referer'])){
		$path=str_replace('http://','',$key['fetch_link']);
		$path='direct_link/'.$path;	
	}
?>
<?php if ($loop && $loop % 5 == 0) { ?>
<tr>
<?php } ?>
<td style="cursor: pointer"  align="center" valign="top" width="<?php echo 100 / 5 ?>%">
<?php if ($key["thumb"]) { ?>

<a href='http://myweb.pro.vn/xem-video-tong-hop/<?=$path?>'>
	<div class="film_div_item" id="ebook_div_item_<?= $key['id'] ?>">                        
	<button id="ebook_item_<?= $key['id'] ?>"  class="game_list btn btn-primary" >Xem ngay</button>
	<img  onerror="this.src='http://myweb.pro.vn/images/fb/HD_ONLINE.jpg'" class="film_cover" data-id="<?=$key['id']?>" src="<?=$key['thumb']?>" alt="<?=$key['film_name']?>"/>
	<div style="clear:both;height:15px"></div>
	<span><?= $key['film_name'] ?></span>
	</div>
</a>
<?php } ?>
</td>
<?php }
} ?>
</tr>		
</table>  

<ul class="breadcrumb" style="margin-top: 10px;width: 80%;margin-left: 10%;">
			<li class="active footer_pagination"><?=$pagination?></li>
</ul>

<div class="film_wrapper"></div>

<header id="default_header" class="navbar navbar-fixed-top">
<div id="mega_main_menu" class="custom_header navbar-inner navbar-green">
<div class="nav-collapse account-collapse menu_holder">
<div class="container-fluid menu_inner">

<form id="video_header_search" class="pull-left navbar-form" action="" method="get" charset="UTF-8">     
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
	<input type="text" required name="search" placeholder="Nhập từ khóa và gõ Enter để tìm phim" id="search"/>
</form>   

<div class="language">
<a title="Mạng xã hội học tập giải trí" href="http://myweb.pro.vn/video/index/" class="brand animated fadeInDown"> 
<!--<img class="header_logo" src="/images/hat-512.png" /> -->
<i style="color:yellow" class="fa fa-search fa-2x"></i>
</a>
</div>

<ul id="mega_main_menu_ul"  class="nav pull-right sky-mega-menu sky-mega-menu-anim-flip sky-mega-menu-response-to-icons">

<li class="dropdown ">
<a  href="/video?id_category=6"> Thể thao</a>
</li>

<li class="dropdown">
<a href="/video?id_category=7"> Âm nhạc</a>
</li>

<li class="dropdown"> 
<a href="/video?id_category=14"> Showbiz
</a>
</li>

<li class="dropdown"> 
<a href="/video?id_category=5"> Tin tức
</a>
</li>

<li class="dropdown"> 
<a href="/video?id_category=16"> Đời sống
</a>
</li>

<li class="dropdown">
<a href="/video?id_category=10"> Ảo thuật</a>
</li>

<li class="dropdown">
<a href="/video?id_category=9"> Công nghệ</a>
</li>

<li class="dropdown"> 
<a href="/video?id_category=12"> Game</a>
</li>

<li class="dropdown"> 
	<a href="/video?id_category=11">Phim</a>
	<div class="grid-container3">
		<ul>
			<li><a href="/video?id_category=1">Hài hước</a></li>
			<li><a href="/video?id_sub_category=2">Võ thuật</a></li>
			<li><a href="/video?id_sub_category=4">Hành động</a></li>
			<li><a href="/video?id_sub_category=8">Phiêu lưu</a></li>
			<li><a href="/video?id_sub_category=10">Hình sự</a></li>
			<li><a href="/video?id_sub_category=9">Khoa học viễn tưởng</a></li>
			<li><a href="/video?id_sub_category=11">Thần thoại</a></li>
			<li><a href="/video?id_sub_category=4">Lịch sử</a></li>
			<li><a href="/video?id_sub_category=13">Cổ trang</a></li>
			<li><a href="/video?id_category=8">Hoạt hình</a></li>
			<li><a href="/video?id_sub_category=15">Tâm lý xã hội</a></li>
			<li><a href="/video?id_sub_category=24">Phim Mỹ</a></li>
			<li><a href="/video?id_sub_category=17">Phim Hồng Kông</a></li>
			<li><a href="/video?id_sub_category=16">Phim Trung Quốc</a></li>
			<li><a href="/video?id_sub_category=22">Phim Hàn Quốc</a></li>
			<li><a href="/video?id_sub_category=23">Phim Thái Lan</a></li>
			<li><a href="/video?id_sub_category=18">Phim Việt Nam</a></li>
			<li><a href="/video?id_sub_category=25">Phim mới</a></li>
			<li><a href="/video?id_sub_category=19">Phim lẻ</a></li>
			<li><a href="/video?id_sub_category=20">Phim bộ</a></li>
			<li><a href="/video?id_sub_category=21">Phim thuyết minh</a></li>
			<li><a href="/video?id_sub_category=7">Phim truyền hình</a></li>
		</ul>
	</div>
</li>

<li class="dropdown"> 
<a href="/video?id_category=13"> Động vật</a>
</li>

<li class="dropdown"> 
<a href="/video?id_category=4">Clip tổng hợp
</a>
</li>

</ul> 

</div>                
</div>
</div>
</header>

<input type="hidden" id="id_category" name="id_category" value="<?=$id_category_pagination?>">
<input type="hidden" id="id_sub_category" name="id_sub_category" value="<?=$id_sub_category_pagination?>">
<input type="hidden" id="id_search" value="<?=$search?>">
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/film.js" ></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/social/facebook.js"   ></script>	 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50476937-1', 'myweb.pro.vn');
  ga('send', 'pageview');

</script>

</body>
</html>


