<html>
<head>
<title><?=$name?></title>

<!-- meta tag-->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<meta property="og:title" content="<?=$name?>" />
<meta property="og:type" content="music.song" />
<meta property="og:image" content="" id="facebook_sharing_thumb"/>
<meta property="og:url" content="<?=$share_url?>" />
<meta property="og:description" content="Nghe nhạc Online - Tổng hợp nhạc trên Internet" />
<meta name="description" content="Nghe nhạc online - Tổng hợp nhạc trên Internet">

<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/music.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|fire" type="text/css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|emboss" type="text/css">
<link href="http://myweb.pro.vn/css/video-js.css" rel="stylesheet" type="text/css" id="videojs_font_path"/>
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/music-web-kit-3d.css" type="text/css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="canonical" href="<?=$share_url?>" />

<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<?=$vis?>
<script src="http://myweb.pro.vn/js/video.js"></script>
<script src="http://myweb.pro.vn/js/videojs_youtube.js"></script>
<script>videojs.options.flash.swf = "http://myweb.pro.vn/include/video-js.swf";</script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/music-web-kit-3d.js"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery.countdown.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>
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

<!-- google analytic-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50476937-1', 'myweb.pro.vn');
  ga('send', 'pageview');
</script>


<div id="music_header_search" class="pull-left navbar-form">     
	<i style="color:yellow" class="fa close_header_search fa-close fa-1x"></i>
	<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
	<input type="text" required name="search"  placeholder="Nhập từ khóa và gõ Enter để tìm trong số 418554 bài hát, video, phim" id="search"/>
</div>   

<ul class="main_category">

<li class="dropdown ">
<i style="color:yellow" class="fa fa-search fa-1x"></i> 
</li>

<li class="dropdown ">
	<a class="font-effect-emboss"  data-id="2"> Nhạc trẻ</a>
</li>

<li class="dropdown">
	<a class="font-effect-emboss" data-id="3"> Trữ tình</a>
</li>

<li class="dropdown">
	<a class="font-effect-emboss" data-id="6"> Không lời</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" data-id="9">Pop</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" data-id="5"> Nhạc Trịnh</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" data-id="16">Âu Mỹ</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" data-id="17">Hàn Quốc</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" data-id="18">Nhạc Hoa</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" href="http://myweb.pro.vn/music/tinhkhucbathu/">Tình khúc bất hủ</a>
</li>

<li class="dropdown"> 
	<a class="font-effect-emboss" href="http://myweb.pro.vn/music/dance">Nhạc Dance</a>
</li>

</ul>

<div class="wrapper">
<div class="fetch_pagination"></div>
<div class="social_link">

<div class="fb-share-button" data-layout="button_count" data-width="200px" data-data-id="<?=$share_url?>" data-height="100px"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>

<div class="music_content"><?=$content?></div>

<div class="LeftPanel related_video">
<div class="DisplayArea" style="background-color:white;z-index: 1000;">
<div class="advertisement_text" style="margin-top:20px"></div>
<div class="left_advertisement"></div>

<div class="advertisement_text">
<ul id="nhaccuatui_related">
	<h4 style="font-weight:100;margin-left:-30px;margin-top:-2px;">Bài hát liên quan</h4>
	<li><script type="text/javascript" src="//e-vcdn.anthill.vn/delivery-ants/zone/522972114.js"></script></li>
	<div style="clear:both;height:5px"></div>
	<?php foreach($related as $key):?>
	<?php
	if(preg_match('/nhaccuatui.com/',$key['fetch_link'])){
	$path=str_replace('nhaccuatui.com','myweb.pro.vn/nhaccuatui/baihat',$key['fetch_link']);
	$path=$path.'/nhaccuatui';
	}
	if(preg_match('/nhacso.net/',$key['fetch_link'])){
	$path=str_replace('nhacso.net','www.myweb.pro.vn/nhaccuatui/baihat',$key['fetch_link']);
	$path=$path.'/nhacsonet';
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
	$path=str_replace('watch?v=','',$key['fetch_link']);
	$path='http://www.myweb.pro.vn/nhaccuatui/baihat/muviza'.$path.'/youtube';	
	}
	if(preg_match('/nhackhongloivn.com/',$key['fetch_link'])){
	$path=str_replace('song/','',$key['fetch_link']);
	$path=str_replace('album/','',$path);
	$path=str_replace('nhackhongloivn.com','www.myweb.pro.vn/nhaccuatui/baihat',$path);
	$path=$path.'/nhackhongloivn';
	}
	if(preg_match('/zing/',$key['fetch_link'])){
	$path=str_replace('mp3.zing.vn/bai-hat','www.myweb.pro.vn/nhaccuatui/baihat',$key['fetch_link']);
	$path=str_replace('mp3.zing.vn/album','www.myweb.pro.vn/nhaccuatui/baihat',$path);
	$path=str_replace('mp3.zing.vn/video-clip','www.myweb.pro.vn/nhaccuatui/baihat',$path);
	$path=$path.'/zing';
	}
	if(preg_match('/www.keeng.vn/',$key['fetch_link'])){
	$path=str_replace('www.keeng.vn','www.myweb.pro.vn/nhaccuatui/baihat',$key['fetch_link']);
	$path=str_replace('index.php/video/','',$path);
	$path=str_replace('index.php/audio/','',$path);
	$path=str_replace('home.php/audio/','',$path);
	$path=str_replace('home.php/video/','',$path);
	$path=str_replace('home.php/album/','',$path);
	$path=str_replace('index.php/album/','',$path);
	$path=$path.'/keeng';
	}
	?>
	<li>
	<a href="<?=$path?>">
		<?php if(strlen($key['name'])<45){echo $key['name'];}?>
		<?php if(strlen($key['name'])>=45){echo substr($key['name'],0,43)."...";}?>
	</a>
	</li>
	<?php endforeach;?>
	</ul>
</div>

</div>

</div>

<div class="RightPanel">
<div class="DisplayArea" style="width:300px !important" tabindex="1">
<div class="advertisement_text"></div>
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div style="position:absolute;margin-top:0px" class="517324837" data-ants-zone-id="517324837"></div>
	<!--- end ANTS Script -->
</div>

</div>

<div id="music_pagination_ajax_loading">
<h3 id="text_ajax_loading" class="font-effect-emboss">Đang tải...</h3>
<div class="cssload-wrap">
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
	<div class="cssload-circle"></div>
</div>
</div>

<div class="music_data" style="display:none"><?=$music_data?></div>

<input type="hidden" id="referer" value="<?=$referer?>">
</body></html>