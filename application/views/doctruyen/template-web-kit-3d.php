<html>
<head>
<title><?=$name?></title>

<!-- meta tag-->
<meta content="text/html" charset="UTF-8" http-equiv="Content-Type"/>
<meta property="og:title" content="<?=$name?>" />
<meta property="og:type" content="book" />
<meta property="og:image" content="<?=$thumb?>" />
<meta property="og:url" content="<?=$share_url?>" />
<meta property="og:description" content="Đọc truyện Online - Tổng hợp truyện trên Internet" />
<meta name="description" content="Đọc truyện Online - Tổng hợp truyện trên Internet">
<link rel="shortcut icon" href="http://xahoihoctap.net.vn/images/icons/story_book.png" type="image/x-icon"/>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rancho&effect=putting-green|3d-float" type="text/css">
<link rel="stylesheet" href="http://xahoihoctap.net.vn/css/story-web-kit-3d.css" type="text/css">
<link rel="stylesheet" type="text/css" href="http://xahoihoctap.net.vn/css/bootstrap.min.css" />
<link rel="canonical" href="<?=$share_url?>" />

<script type="text/javascript" src="http://xahoihoctap.net.vn/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="http://xahoihoctap.net.vn/js/story-web-kit-3d.js"></script>
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

<div class="wrapper">
<ul class="main_category">

<li class="dropdown ">
<i style="color:yellow" class="fa fa-search fa-1x"></i> 
</li>

<li class="dropdown ">
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=4">Tiên hiệp</a>
</li>

<li class="dropdown">
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=3">Kiếm hiệp</a>
</li>

<li class="dropdown">
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=7">Truyện Teen</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=8">Xuyên không</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=10"> Trinh thám</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=12">Tiểu thuyết</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=13">Quân sự</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=14">Võng du</a>
</li>

<li class="dropdown"> 
	<a href="http://myweb.pro.vn/doctruyen/danhmuc?id_category=11">Truyện Full</a>
</li>

</ul>
	<div class="story_content"><?=$content?></div>
</div>

<!--start social_link-->
<div class="social_link">

<div class="fb-share-button" data-layout="button_count" data-width="200px" data-href="<?=$share_url?>" data-height="100px"></div>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'vi'}
</script>
<!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->

<div class="g-plusone" data-size="medium"></div>
</div>
<!--end social_link-->

<div class="LeftPanel related_video">
<div class="DisplayArea" style="background-color:white;z-index: 1000;">
<div class="advertisement_text">
<img class="icon_home" src="http://xahoihoctap.net.vn/images/icon/story_icon_home.jpg">
</div>
<div class="advertisement_text" style="margin-top:20px">Danh sách chương</div>
<?=$story_chapter?>
</div>

<div class="RightPanel">
<div class="DisplayArea" style="width:300px !important" tabindex="1">
<div class="advertisement_text"></div>
	<!--- Script ANTS - 300x600 --> 
	<script async src="//e-vcdn.anthill.vn/delivery-ants/asset/1.0/ants.js"></script>
	<div class="521621655" data-ants-zone-id="521621655"></div>
	<!--- end ANTS Script -->
</div>

</div>

</body></html>