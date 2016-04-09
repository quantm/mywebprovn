<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>
<title>Công ty cổ phần thương mại dược phẩm PVN</title>
<meta name="description" content="Công ty cổ phần dược phẩm PVN">
<meta name="keywords" content="Công ty cổ phần dược phẩm PVN">
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8">
<meta name="generator" content="PrestaShop">
<meta name="robots" content="index,follow">
<link rel="icon" type="image/vnd.microsoft.icon" href="http://demo.myweb.pro.vn/images/fav.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="http://demo.myweb.pro.vn/images/fav.ico">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css">

<link href="/css/global.css" rel="stylesheet" type="text/css" media="all">
<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/jquery.min.js"></script>
<script type="text/javascript" src="http://demo.myweb.pro.vn/js/bootstrap.js"></script>
<script type="text/javascript">
$(document).ready(function(){
      $('#slider').carousel({
			interval: 100
			pause:'click'
	  });
})
</script>
</head>
<body id="index">
<!--[if lt IE 8]><div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div><![endif]-->
<p id="back-top" style="display: none;"> <a href="#top"><span></span></a> </p>
<div id="wrapper1">
<div id="wrapper2">
<div id="wrapper3">
 
<div id="header">
<a id="header_logo" href="/" title="DRUGS store">
<img class="logo" src="http://demo.myweb.pro.vn/images/logo_left.png" alt="DRUGS store">
</a>
<img class="logo_header" src="http://demo.myweb.pro.vn/images/logo.png" alt="DRUGS store">
<div id="header_right">
  
<div id="search_block_top">
<form method="get" action="/search.php" id="searchbox">
<input class="search_query ac_input" placeholder="Tìm kiếm sản phẩm" type="text" id="search_query_top" name="search_query" autocomplete="off">
<a href="javascript:document.getElementById('searchbox').submit();">Search</a>
<input type="hidden" name="orderby" value="position">
<input type="hidden" name="orderway" value="desc">
</form>
</div>

 <div class="clearblock"></div>
<ul id="tmheaderlinks">
<li><a href="" class="active">Trang chủ</a></li>
<li><a href="">Giới thiệu</a></li>
<li><a href="">Tin tức - Sự kiện</a></li>
<li><a href="">Sản phẩm</a></li>
<li><a href="">Liên hệ</a></li>
</ul> 
 
<div id="tmcategories">
<ul id="cat" class="sf-menu sf-js-enabled">

<li class="sub">
	<a href="">Sức khỏe tổng quát</a>
</li> 

<li class="">
<a href="">Sức khỏe phụ nữ</a>
</li> 

<li class="">
<a href="">Sức khỏe người già</a>
</li> 

<li class="">
<a href="">Sức khỏe trẻ em</a>
</li> 

<li class="">
<a href="">Chăm sóc da</a>
</li> 

<li class="">
<a href="">Xương và khớp</a>
</li> 

<li class=" last">
<a href="">Tiêu hóa - Gan mật</a>
</li> 

</ul>
</div>
 
</div>
</div>
<div id="columns">
 
<div id="center_column" class="center_column">

<!-- header silder -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <?php foreach($product as $indicator):?>
	<li data-target="#carousel-example-generic" data-slide-to="<?=$indicator['id']?>" class="active"></li>
	<?php endforeach;?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
	
	<div class="item active">
		<img class="logo_slider" src="http://demo.myweb.pro.vn/images/logo_slider.png" alt="Công ty cổ phần thương mại dược phẩm PVN">
		<a href="/">
			<div class="carousel-caption" style="font-size:15px;margin-bottom:-60px!important;">Công ty cổ phần thương mại dược phẩm PVN</div>
		</a>
	</div> 

	<?php foreach($product as $header_slider):?>
    <div class="item">
      <img style="width:900px!important;height:275px!important" src="<?=$header_slider['thumb']?>" alt="<?=$header_slider['name']?>">
	  	<div class="carousel-caption">
			<a href="/"><?=$header_slider['name']?></a>
      </div>
    </div>
	<?php endforeach;?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--//-->

<!-- MODULE Home Featured Products -->
<div id="featured_products">
	<h4>Featured products</h4>
		<div class="block_content">
<ul>
	<?php foreach($product as $key):?>
	<li class="ajax_block_product">
	<a class="product_image" href="#" title="<?=$key['name']?>">
	<img src="<?=$key['thumb']?>" alt="<?=$key['name']?>"></a>
	<div>
	<h5>
	<a class="product_link" href="#" title="<?=$key['name']?>">
	<?=$key['name']?>
	</a>
	</h5>

	<p class="product_desc">
	<a class="product_descr" href="#" title="<?=$key['description']?>"><?=$key['description']?></a>
	</p>
	<span class="price"><?=number_format($key['price'])?> VNĐ</span>
	<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_1" href="#" title="Đặt hàng">Đặt hàng</a>
	</div>
	</li>
	<?php endforeach;?>
</ul>
	</div>
	</div>
<!-- /MODULE Home Featured Products -->		</div>
<!-- Right -->
		<div class="clearblock"></div>
	</div>
</div>

<!-- Footer -->
	<div id="footer_wrapper">
		<div id="footer">
			<div id="tmfooterlinks">
	<div>
		<h4>Information</h4>
		<ul>
			<li><a href="/contact-form.php">Contact</a></li>
			<li><a href="/sitemap.php">Sitemap</a></li>
			<li><a href="/cms.php?id_cms=2">Legal Notice</a></li>
			<li><a href="/cms.php?id_cms=3">Terms and conditions</a></li>
			<li><a href="/cms.php?id_cms=4">About us</a></li>
		</ul>
	</div>
	<div>
		<h4>Our offers</h4>
		<ul>
			<li><a href="/new-products.php">New products</a></li>
			<li><a href="/best-sales.php">Top sellers</a></li>
			<li><a href="/prices-drop.php">Specials</a></li>
			<li><a href="/manufacturer.php">Manufacturers</a></li>
			<li><a href="/supplier.php">Suppliers</a></li>
		</ul>
	</div>
	<div>
		<h4>Your Account</h4>
		<ul>
			<li><a href="/my-account.php">Your Account</a></li>
			<li><a href="/identity.php">Personal information</a></li>
			<li><a href="/addresses.php">Addresses</a></li>
			<li><a href="/discount.php">Discount</a></li>
			<li><a href="/history.php">Order history</a></li>
		</ul>
	</div>
	<p>© 2015 Powered by <a href="http://www.prestashop.com">PrestaShop</a>™. All rights reserved</p>
</div><div id="tmtextblock">
	<h2>About us</h2>
	<h3>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </h3>
</div>
<div id="tmtextblock2">
	<h2>Contacts</h2>
	<h3>8901 Marmora Road, Glasgow,   D04 89GR </h3>
	<h4>+1 (234) 567-8901</h4>
</div>
			<!-- [[%FOOTER_LINK]] -->		</div>
	</div>
</div>
</div>
</body></html>