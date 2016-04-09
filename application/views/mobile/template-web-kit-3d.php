<html>
<head>
<title><?=$name?></title>

<!-- meta tag-->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<meta property="og:title" content="<?=$name?>" />
<meta property="og:type" content="music" />
<meta property="og:image" content="" id="facebook_sharing_thumb"/>
<meta property="og:url" content="<?=$share_url?>" />
<meta property="og:description" content="Nghe nhạc Online - Tổng hợp nhạc trên Internet" />
<meta name="description" content="Nghe nhạc Online - Tổng hợp nhạc trên Internet">
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/music.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|fire" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/music-mobile-kit.css" type="text/css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="canonical" href="<?=$share_url?>" />
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/font-awesome.css"/>

<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/music-mobile-kit.js"></script>
<script type="text/javascript"  src="http://xahoihoctap.net.vn/js/bootstrap.js"></script>

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

<div id="music_pagination_ajax_loading">
<img src="http://xahoihoctap.net.vn/images/ajax-loader.gif">
</div>

<div class="navbar-header">
	<div id="music_header_search" class="pull-left navbar-form">     
		<input type="hidden" name="csrf_test_name" id="csrf_test_name" value="<?=$csrf_test_name?>">
		<input type="text" required name="search"  placeholder="Từ khóa và chạm nút Tìm" id="search"/>
		<input type="button" class="btn btn-danger search" value="Tìm">
	</div> 
	<div style="clear:both"></div>
	<ul>
		<li>Bài hát</li>
		<li>Nghệ sĩ</li>
		<li>Playlist</li>
		<li><a href="http://myweb.pro.vn/video?id_category=9" target="_blank">Video</a></li>
	</ul>
</div>

<div style="clear:both;height:10px"></div>

<div class="music_content"><?=$content?></div>

<div style="clear:both;height:10px"></div>

<div class="fetch_pagination"></div>

<div class="music_related">
<ul id="nhaccuatui_related">
	<?php foreach($related as $key):?>
	<?php
	if(preg_match('/nhaccuatui.com/',$key['fetch_link'])){
	$path=str_replace('nhaccuatui.com','myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=$path.'/nhaccuatui';
	}
	if(preg_match('/nhacso.net/',$key['fetch_link'])){
	$path=str_replace('nhacso.net','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=$path.'/nhacsonet';
	}
	if(preg_match('/www.muviza.com/',$key['referer'])){
	$path=str_replace('watch?v=','',$key['fetch_link']);
	$path='http://www.myweb.pro.vn/mobile/baihat/muviza'.$path.'/youtube';	
	}
	if(preg_match('/nhackhongloivn.com/',$key['fetch_link'])){
	$path=str_replace('song/','',$key['fetch_link']);
	$path=str_replace('album/','',$path);
	$path=str_replace('nhackhongloivn.com','www.myweb.pro.vn/mobile/baihat',$path);
	$path=$path.'/nhackhongloivn';
	}
	if(preg_match('/zing/',$key['fetch_link'])){
	$path=str_replace('mp3.zing.vn/bai-hat','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
	$path=str_replace('mp3.zing.vn/album','www.myweb.pro.vn/mobile/baihat',$path);
	$path=str_replace('mp3.zing.vn/video-clip','www.myweb.pro.vn/mobile/baihat',$path);
	$path=$path.'/zing';
	}
	if(preg_match('/www.keeng.vn/',$key['fetch_link'])){
	$path=str_replace('www.keeng.vn','www.myweb.pro.vn/mobile/baihat',$key['fetch_link']);
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
		<?=$key['name']?>
	</a>
	</li>
	<?php endforeach;?>
	</ul>
</div>

<!--- Script ANTS - 300x250 --> 
<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
<div class="530052041" data-ants-zone-id="530052041"></div>
<!--- end ANTS Script -->

<div class="ads_redirect" style="display:none"></div>

<div class="music_data" style="display:none"><?=$music_data?></div>

<input type="hidden" id="referer" value="<?=$referer?>">
</body></html>