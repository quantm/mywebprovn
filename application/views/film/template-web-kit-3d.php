<html><head>
<title><?=$name?></title>
<!--meta tag social sharing-->
<meta charset="UTF-8">
<meta property="og:title" content="<?=$name?>" />
<meta property="og:type" content="video.movie" />
<meta property="og:image" content="<?=$thumb?>" />
<meta id="social_sharing" property="og:url"  content="" />
<meta property="og:	description" content="Tổng hợp video trên Internet" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/video-play.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|fire" type="text/css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|emboss" type="text/css">
<script type="text/javascript" src="http://myweb.pro.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" async src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
<script src="http://myweb.pro.vn/js/video.js"></script>
<script src="http://myweb.pro.vn/js/videojs_youtube.js"></script>
<script>videojs.options.flash.swf = "http://myweb.pro.vn/include/video-js.swf";</script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/countdown/jquery.plugin.js" charset="utf-8"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/countdown/jquery.countdown.js" charset="utf-8"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/film-webkit-3d.js"></script>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>
<link href="http://myweb.pro.vn/css/video-js.css" rel="stylesheet" type="text/css" id="videojs_font_path"/>
<link rel='stylesheet' href='http://xahoihoctap.net.vn/css/film-webkit-3d.css'></link>
<style type="text/css">
	@font-face {
		font-family: 'FontAwesome';
		src: url('/fonts/fontawesome-webfont.eot?v=4.0.3');
		src: url('/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3') format('embedded-opentype'), url('/fonts/fontawesome-webfont.woff?v=4.0.3') format('woff'), url('/fonts/fontawesome-webfont.ttf?v=4.0.3') format('truetype'), url('/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular') format('svg');
		font-weight: normal;
		font-style: normal;
	}
</style>
<?=$base?>
</head>

<body style='background: url("http://xahoihoctap.net.vn/images/background/music/slide<?=$id_image?>.jpg") 50% 50% / cover no-repeat !important;'>

<div id="fb-root"></div>

<!-- facebook javascript sdk-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<form id="video_header_search" accept-charset="UTF-8"
enctype="application/x-www-form-urlencoded" autocomplete="off class="pull-left navbar-form" action="http://www.myweb.pro.vn/video/" method="get">     
	<i style="color:red" class="fa close_header_search fa-close fa-1x"></i>
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
	<input type="text" style="height:30px" required name="search"  placeholder="Nhập từ khóa và gõ Enter để tìm trong số <?=$count?> bộ phim." id="search"/>
</form>   

<div id="film_data" style="display:none"><?=$content?></div>

<div class="wrapper">
<ul class="main_category sky-mega-menu sky-mega-menu-anim-flip sky-mega-menu-response-to-icons">

<li class="dropdown ">
<i class="fa fa-search fa-2x icon_search_header"></i> 
</li>

<li class="dropdown" onmouseenter='$(".ads_bottom").show("slow")'>
<a  href="http://myweb.pro.vn/video?id_category=6"> Thể thao</a>
</li>

<li class="dropdown" onmouseenter='$(".ads_bottom").show("slow")'>
<a href="http://myweb.pro.vn/video?id_category=7"> Âm nhạc</a>
</li>

<li class="dropdown" onmouseenter='$(".ads_bottom").show("slow")'>
<a href="http://myweb.pro.vn/video?id_category=9"> Công nghệ</a>
</li>

<li class="dropdown" onmouseenter='$(".ads_bottom").show("slow")'> 
<a href="http://myweb.pro.vn/video?id_category=12"> Game</a>
</li>

<li class="dropdown" onmouseenter='$(".ads_bottom").hide("slow")'> 
<a href="http://myweb.pro.vn/video?id_category=11">Phim</a>
	<div class="grid-container3" style="z-index:100000" onmouseleave='$(".ads_bottom").show("slow")'>
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

<li class="dropdown" onmouseenter='$(".ads_bottom").show("slow")'> 
<a href="http://myweb.pro.vn/video?id_category=4">Clip</a>
</li>

</ul>
<!--left panel -->
<div class="LeftPanel related_video">
<div class="DisplayArea" style="background-color:white;z-index:1000;overflow:auto;margin-left:3px;">
	<ul id="muviza_related" style="display:none">
	<h3>Phim liên quan</h3>
	<li>
		<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js"></script>
	</li>
	<?php foreach($muviza_related as $key):?>
	<? if(preg_match('/m-viet.com/',$key['fetch_link'])){
	$path=str_replace('http://m-viet.com/','',$key['fetch_link']);
	$path='mvietcom/'.$path;	
	}
	if(preg_match('/chatvl.com/',$key['fetch_link'])){
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
	if(preg_match('/nguoibanviet.com/',$key['referer'])){
		$path=str_replace('http://nguoibanviet.com/','',$key['fetch_link']);
		$path='nguoibanviet/'.$path;	
	}
	if(preg_match('/tv.zing.vn/',$key['referer'])){
		$path=str_replace('http://tv.zing.vn/','',$key['fetch_link']);
		$path='zingtv/'.$path;	
	}
	if(preg_match('/megabox.vn/',$key['referer'])){
		$path=str_replace('http://phim.megabox.vn/','',$key['fetch_link']);
		$path='megabox/'.$path;	
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
	<li>
		<a href="http://myweb.pro.vn/xem-video-tong-hop/<?=$path?>">
			<?=$key['name']?>
		</a>
	</li>
	<?php endforeach;?>
	</ul>
</div>

</div>
<!-- end left panel-->

<!-- right panel -->
<div class="RightPanel">
	<div class="DisplayArea" tabindex="1">
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="517324837" data-ants-zone-id="517324837"></div>
	<!--- end ANTS Script -->
	</div>
</div>
<!-- end right panel-->

<div class="video_content"></div>
</div>
<!-- end wrapper-->

<div class="ads_bottom">
<!--- Script ANTS - 728x90 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="517324894" data-ants-zone-id="517324894"></div>
<!--- end ANTS Script -->
</div>

<!-- start loading film advertisement -->
<div class="modal hide fade" data-advertisement="1"  id="adv_temp" style="height: 400px;width: 80%;margin-left: -43%;">

<div class="modal-header" style="border-bottom:none!important">
	<p>Quảng cáo sẽ đóng sau : 	<span class="intro_close_adv"></span> giây</p>
</div>

<div class="modal-body">
	<script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/517324908.js"></script>
	<div class="ads_box_18500" style="margin-left: 16px;margin-top: 3px;">
		<script type="text/javascript" src="//admicro1.vcmedia.vn/ads_codes/ads_box_18500.ads"></script>
	</div>
</div>

</div>
<!-- end loading film advertisement  -->

<span class="close_bottom_adv fa fa-close fa-2x"></span>
<input type='hidden' id="hidden_countdown"/>
<input type='hidden'  id="film_link" value="<?=$film_link?>"/>
<input type='hidden'  id="referer" value="<?=$referer?>"/>
</body></html>